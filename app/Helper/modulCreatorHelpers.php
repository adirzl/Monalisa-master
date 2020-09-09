<?php
/**
 * Created by PhpStorm.
 * User: TantanSuryana
 * Date: 2/22/2020
 * Time: 1:28 PM
 */

use Illuminate\Support\Facades\DB;

if (!function_exists('setup_modul')) {
    /**
     * @param \App\Models\Master\Page $page
     * @param array $arguments
     * @param array $request
     * @return bool
     */
    function setup_modul(\App\Models\Master\Page $page, $arguments, $request = [])
    {
        $saveResult = false;
        DB::transaction(function() use($page, $arguments, $request, &$saveResult){
            setupModel($page, $arguments, $request);
            setupController($page);
            setupView($page->uri);
            $saveResult = true;
        });

        if ($saveResult) {
            $saveResult = true;
        }
        return $saveResult;
    }
}

if (!function_exists('getFileAnchor')) {
    /**
     * @param \Illuminate\Database\Eloquent\Collection|array $collections
     * @param string $key
     * @param string $value
     * @param bool $blank_option
     * @return array
     */
    function getFileAnchor($pageName, $key = null)
    {
        $anchorConst = [
            'className' => 'class '.$pageName.'Controller extends Controller',
            'indexFunction' => 'public function index',
            'modelName' => 'class '.$pageName.' extends',
        ];
        return $key ? $anchorConst[$key] : null;
    }
}
