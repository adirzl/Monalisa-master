<?php
/**
 * Created by PhpStorm.
 * User: TantanSuryana
 * Date: 2/22/2020
 * Time: 1:28 PM
 */

use Illuminate\Support\Facades\File;

if (!function_exists('setupView')) {
    /**
     * @param string $pageName
     * @return void
     */
    function setupView($pageName)
    {
        $viewPath = resource_path('views/'.$pageName);
        $templatePath = resource_path('views/master/templates/');

        if(!file_exists($viewPath))
            File::makeDirectory($viewPath);

        if(!file_exists($viewPath.'/default.blade.php'))
            $content = str_replace(':name', $pageName, file_get_contents($templatePath.'default.blade.php.txt'));
            File::put($viewPath.'/default.blade.php', $content);

        if(!file_exists($viewPath.'/form.blade.php'))
            $content = str_replace(':name', $pageName, file_get_contents($templatePath.'form.blade.php.txt'));
            File::put($viewPath.'/form.blade.php',$content);

        if(!file_exists($viewPath.'/show.blade.php'))
            $content = str_replace(':name', $pageName, file_get_contents($templatePath.'show.blade.php.txt'));
            File::put($viewPath.'/show.blade.php',$content);

        if(!file_exists($viewPath.'/filter.blade.php'))
            $content = str_replace(':name', $pageName, file_get_contents($templatePath.'filter.blade.php.txt'));
            File::put($viewPath.'/filter.blade.php',$content);
    }
}

