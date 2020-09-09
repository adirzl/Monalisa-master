<?php
/**
 * Created by PhpStorm.
 * User: TantanSuryana
 * Date: 2/22/2020
 * Time: 1:28 PM
 */

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

if (!function_exists('setupModel')) {
    /**
     * @param \App\Models\Master\Page $page
     * @param array $arguments
     * @param array $request
     * @return void
     */
    function setupModel(\App\Models\Master\Page $page, $arguments, $request = [])
    {
        $currentPK = getPrimaryKeyFromSpecificTable($request['table_name']);

        if(!isModelExist($page->uri)){
            Artisan::call('make:model', $arguments);
            $filePath = base_path('app/Models/'.ucwords($page->uri).'.php');
            $content = file($filePath);
            //$jobs = [ anchorName => [ contentName => [ position, array_splice] ] ]
            $jobs = [
                'modelName' => [
                    'use' => ['-1', false],
                    'name' => ['0', false],
                    'body' => ['2', true],
                ],
            ];

            $x = 0;
            foreach ($content as $item){
                foreach ($jobs as $key => $value){
                    if(str_contains($item, getFileAnchor(ucwords($page->uri),$key))){
                        foreach ($value as $valueKey => $valueItem){
                            $attribute = [
                                'pageName' => ucwords($page->uri),
                                'primaryKey' => $currentPK,
                                'keyType' => DB::connection()->getDoctrineColumn($request['table_name'], $currentPK)->getType()->getName()
                            ];
                            $subContent = getDefaultModelContent($attribute, $valueKey, $request);
                            $y = $x+floatval($valueItem[0]);
                            foreach ($subContent as $keySubContent => $valueSubContent){
                                if($valueItem[1]){
                                    array_splice($content,$y,0,$valueSubContent);
                                }else{
                                    $content[$y] = $valueSubContent;
                                }
                                $y++;
                            }
                        }
                    }
                }
                $x++;
            }

            $content = injectRelationshipToModel($page,$request,$content);
//            dd($content);
            $allContent = implode("", $content);
            file_put_contents($filePath, $allContent);
//            dd($content);
        }
    }
}

if (!function_exists('getDefaultModelContent')) {
    /**
     * @param array $attribute
     * @param string $key
     * @param array $request
     * @return array
     */
    function getDefaultModelContent($attribute, $key = null, $request = [])
    {
        $fillable = '';
        if($key == 'body'){
            $listAllFields = Schema::getColumnListing($request['table_name']);
            foreach ($listAllFields as $item){
                $fillable .= "'".$item."',";
            }
        }
        $modelContent = [
            'use' => [
                "use App\Models\Master\BaseModel;\n\n"
            ],
            'name' => [
                "class ".$attribute['pageName']." extends BaseModel\n"
            ],
            'body' => [
                "\tProtected \$table = '".$request['table_name']."';\n",
                "\tProtected \$primaryKey = '".$attribute['primaryKey']."';\n",
                "\tProtected \$keyType = '".(in_array($attribute['keyType'],['integer']) ? $attribute['keyType'] : 'string')."';\n",
                "\tPublic \$incrementing = ".($attribute['keyType'] == 'integer' ? 'true' : 'false').";\n",
                "\tProtected \$fillable = [".$fillable."];\n",
                "\tProtected \$hidden = ['".$attribute['primaryKey']."'];\n",
                "\tpublic \$fieldOnGrid = [".$fillable."];\n",
                "\tpublic \$fieldOnForm = [".$fillable."];\n",
                "\tpublic \$defaultSortBy = 'name';\n",
                "\tpublic \$defaultSortType = 'Desc';\n\n",
                // "\tpublic function scopeFetch(\$query, \$request){\n",
                // "\t\treturn \$this->scopeBaseFetch(\$query,\$request,['orderBy' => \$this->primaryKey]);\n",
                // "\t}\n",
            ]
        ];

        $finalContent = verifyModelContent($attribute, $request, $modelContent);

        return $key ? $finalContent[$key] : null;
    }
}

if (!function_exists('verifyModelContent')) {
    /**
     * @param array $attribute
     * @param array $request
     * @param array $modelContent
     * @return array
     */
    function verifyModelContent($attribute, $request, $modelContent)
    {
        if(strtolower($attribute['pageName'].'s') == $request['table_name']){
            unset($modelContent['body'][0]);
        }

        if($attribute['primaryKey'] == 'id'){
            unset($modelContent['body'][1]);
        }

        if($attribute['keyType'] == 'integer'){
            $removeArrKey = [2,3];
            foreach ($removeArrKey as $item){
                unset($modelContent['body'][$item]);
            }
        }

        return $modelContent;
    }
}

if (!function_exists('isModelExist')) {
    /**
     * @param string $modelName
     * @return bool
     */
    function isModelExist($modelName)
    {
        return file_exists(base_path('app/Models/'.ucwords($modelName).'.php'));
    }
}

if (!function_exists('getPrimaryKeyFromSpecificTable')) {
    /**
     * @param string $modelName
     * @return bool
     */
    function getPrimaryKeyFromSpecificTable($tableName)
    {
        return DB::select(DB::raw("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_NAME = '".$tableName."'"))[0]->column_name;
    }
}

if(!function_exists('getForeignKey')){
    /**
     * @param  string $tableName
     */
    function getForeignKey($tableName){
        return DB::table('information_schema.table_constraints AS tc')
            ->select('tc.table_name', 'tc.constraint_type', 'kcu.column_name', 'ccu.table_name AS destination_table_name', 'ccu.column_name AS destination_column_name')
            ->join('information_schema.key_column_usage AS kcu','tc.constraint_name', 'kcu.constraint_name')
            ->join('information_schema.constraint_column_usage AS ccu', 'kcu.constraint_name', 'ccu.constraint_name')
            ->where('tc.constraint_type','FOREIGN KEY')
            ->where('tc.table_name','ncov1')
            ->get();
    }
}

if(!function_exists('injectRelationshipToModel')){
    /**
     *
     */
    function injectRelationshipToModel($page, $request, $content){
        $foreign = getForeignKey($request['table_name']);

        $template = [
            "\tpublic function :name(){\n",
            "\t\treturn \$this->:type(:class, :key, :foreign);\n",
            "\t}\n\n",
        ];

        $script = '';
        foreach ($foreign as $item){
            $tempScript = $template;
            $before = [':name', ':type', ':class', ':key', ':foreign'];
            $after = [$item->destination_table_name, 'hasOne', $item->destination_table_name.'::class',"'".$item->destination_column_name."'","'". $item->column_name."'"];

            foreach ($tempScript as $templateItem){
                $script .= str_replace($before, $after, $templateItem);
            }
        }

        for($x=count($content)-1;$x>=0; $x--){//dd($content[$x]);
            if(str_contains($content[$x],'}')){
                array_splice($content,$x,0,$script);
                break;
            }
        }
//dd($content);
        return $content;
    }
}
