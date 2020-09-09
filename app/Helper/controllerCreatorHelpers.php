<?php
/**
 * Created by PhpStorm.
 * User: TantanSuryana
 * Date: 2/22/2020
 * Time: 1:28 PM
 */

if (!function_exists('setupController')) {
    /**
     * @param \App\Models\Master\Page $page
     * @param array $arguments
     * @param array $request
     * @return void
     */
    function setupController(\App\Models\Master\Page $page, $arguments = null)
    {
        if(isControllerExist($page->uri)){
            $filePath = base_path('app/Http/Controllers/'.ucwords($page->uri).'Controller.php');
            $content = file($filePath);
            //$jobs = [ anchorName => [ contentName => [ position, array_splice] ] ]
            $jobs = [
                'className' => [
                    'use' => ['-1', true],
                    'body' => ['4', true],
                ],
            ];

            $x = 0;
            foreach ($content as $item){
                foreach ($jobs as $key => $value){
                    if(str_contains($item, getFileAnchor(ucwords($page->uri),$key))){
                        foreach ($value as $valueKey => $valueItem){
                            $attribute = [
                                'pageName' => ucwords($page->uri),
                            ];
                            $subContent = getDefaultControllerContent($attribute, $valueKey);
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

            $allContent = implode("", $content);
            file_put_contents($filePath, $allContent);
        }
    }
}

if (!function_exists('getDefaultControllerContent')) {
    /**
     * @param array $attribute
     * @param string $key
     * @return array
     */
    function getDefaultControllerContent($attribute, $key = null)
    {
        $controllerContent = [
            'use' => [
                "use App\Models\\".$attribute['pageName'].";\n",
            ],
            'body' => [
                "\tpublic function index(Request \$request){\n",
                "\t\t\$data = ".$attribute['pageName']."::fetch(\$request);\n",
                "\t\t\$fieldOnGrid = ".$attribute['pageName']."::getFieldOnGrid();\n",
                "\t\treturn view('".strtolower($attribute['pageName']).".default', compact('data','fieldOnGrid'));\n",
                "\t}\n",

                "\tpublic function create(){\n",
                "\t\t\$data = new ".$attribute['pageName'].";\n",
                "\t\t\$fieldOnForm = ".$attribute['pageName']."::getFieldOnForm();\n",
                "\t\treturn view('".strtolower($attribute['pageName']).".form', compact('data','fieldOnForm'));\n",
                "\t}\n",

                "\tpublic function store(Request \$request){\n",
                "\t\t\$values = \$request->except('_token', 'save');\n",
                "\t\t\$result = \$this->baseStore(new ".$attribute['pageName']."(), \$values, '".$attribute['pageName']."');\n",
                "\t\treturn \$this->baseRedirect(\$request, '".strtolower($attribute['pageName']).".index',\$result);\n",
                "\t}\n",

                "\tpublic function show(\$id){\n",
                "\t\t\$data = ".$attribute['pageName']."::findOrFail(\$id);\n",
                "\t\t\$fieldOnForm = ".$attribute['pageName']."::getFieldOnForm();\n",
                "\t\treturn view('".strtolower($attribute['pageName']).".show', compact('data','fieldOnForm'));\n",
                "\t}\n",

                "\tpublic function edit(\$id){\n",
                "\t\t\$data = ".$attribute['pageName']."::findOrFail(\$id);\n",
                "\t\t\$fieldOnForm = ".$attribute['pageName']."::getFieldOnForm();\n",
                "\t\treturn view('".strtolower($attribute['pageName']).".form', compact('data','fieldOnForm'));\n",
                "\t}\n",

                "\tpublic function update(Request \$request, \$id){\n",
                "\t\t\$values = \$request->except('_token', '_method');\n",
                "\t\t\$result = \$this->baseStore(".$attribute['pageName']."::findOrFail(\$id), \$values, '".$attribute['pageName']."');\n",
                "\t\treturn \$this->baseRedirect(\$request, '".strtolower($attribute['pageName']).".index',\$result);\n",
                "\t}\n",

                "\tpublic function destroy(Request \$request, \$id){\n",
                "\t\t\$result = \$this->baseDestroy(".$attribute['pageName']."::findOrFail(\$id), true);\n",
                "\t\treturn \$this->baseRedirect(\$request, '".strtolower($attribute['pageName'])."',\$result);\n",
                "\t}\n",

                "\tpublic function softdelete(\$id){\n",
                "\t\t\$result = \$this->baseStore(".$attribute['pageName']."::findOrFail(\$id), ['deleted_at' => Carbon::now()]);\n",
                "\t\treturn \$this->baseRedirect(new Request(), '".strtolower($attribute['pageName'])."', \$result);\n",
                "\t}\n",
            ],
        ];

        $finalContent = verifyControllerContent($attribute, $controllerContent);

        return $key ? $finalContent[$key] : null;
    }
}

if (!function_exists('verifyControllerContent')) {
    /**
     * @param array $attribute
     * @param array $modelContent
     * @return array
     */
    function verifyControllerContent($attribute, $modelContent)
    {
        //write controller verification here
        return $modelContent;
    }
}

if (!function_exists('isControllerExist')) {
    /**
     * @param string $controllerName
     * @return bool
     */
    function isControllerExist($controllerName)
    {
        return file_exists(base_path('app/Http/Controllers/'.ucwords($controllerName).'Controller.php'));
    }
}


if(!function_exists('injectRelationshipToController')){
    /**
     *
     */
    function injectRelationshipToController($page, $request, $content){
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

        return $content;
    }
}
