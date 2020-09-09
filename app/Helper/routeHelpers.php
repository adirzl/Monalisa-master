<?php
/**
 * Created by PhpStorm.
 * User: TantanSuryana
 * Date: 1/30/2020
 * Time: 6:25 PM
 */

use Carbon\Carbon;

if (!function_exists('map_action_uri')) {
    /**
     * @param bool $with_controller
     * @return array
     */
    function map_action_uri(bool $with_controller = false)
    {
        $uri = [];
        $excluded_uris = ['/', 'home', 'login', 'logout'];

        foreach (\Illuminate\Support\Facades\Route::getRoutes() as $route) {
            if ($route->getPrefix() !== 'api' && !in_array($route->uri(), $excluded_uris) && $route->methods()[0] === 'GET') {
                if ($route->getName() && str_contains($route->getName(), '.')) {
                    list($r, $a) = explode('.', $route->getName());

                    if ($a !== 'index') {
                        if ($with_controller) {
                            $uri[$r][] = $a . ' ' . $r;
                        } else {
                            $uri[] = $a . ' ' . $r;
                        }
                    }
                } else {
                    if ($with_controller) {
                        $uri[$route->getName()][] = $route->uri();
                    } else {
                        $uri[] = $route->uri();
                    }
                }
            }
        }

        return $uri;
    }
}

if (!function_exists('default_standard_controll')) {
    /**
     * @param bool $with_controller
     * @return string
     */
    function default_standard_controll($route, $obj, $onlyForToday = false, $dateParam = null, $withChangeStatus = true)
    {
        if(is_object($obj)){
            $id = $obj->{$obj->getKeyName()};
        }else{
            $id = $obj;
        }

        if($onlyForToday){
            if(Carbon::today()->toDateString() == $dateParam){
                $link = '<a href="'.route($route.'.show',[$id]).'" class="btn btn-outline-info" style="margin-left:1%"><i class="fas fa-search"></i></a>' .
                    '<a href="'.route($route.'.edit',[$id]).'" class="btn btn-outline-info" style="margin-left:1%"><i class="fas fa-edit"></i></a>' .
                    '<a href="'.route($route.'.softdelete',[$id]).'" rel="softdelete" title="Are you sure to delete this record?" class="btn btn-outline-info" style="margin-left:1%"><i class="fas fa-trash"></i></a>';
            }else{
                $link = '<a href="'.route($route.'.show',[$id]).'" class="btn btn-outline-info" style="margin-left:1%"><i class="fas fa-search"></i></a>' ;
            }

        }else{
            // $link = '<a href="'.route($route.'.show',[$id]).'" class="mb-3 ml-0 mr-1 btn-floating waves-effect waves-light blue lightrn-1 tooltipped" data-tooltip="View Detail"><i class="material-icons">search</i></a>' .
            //     '<a href="'.route($route.'.edit',[$id]).'" class="mb-3 ml-0 mr-1 btn-floating waves-effect waves-light blue lightrn-1 tooltipped" data-tooltip="Edit"><i class="material-icons">edit</i></a>' .
            //     '<a href="'.route($route.'.softdelete',[$id]).'" rel="softdelete" title="Are you sure to delete this record?" class="mb-3 ml-0 mr-1 btn-floating waves-effect waves-light blue lightrn-1 hide"><i class="material-icons">delete</i></a>' .
            //     '<a href="'.route($route.'.changestatus',[$id]).'" rel="changestatus" class="mb-3 ml-0 mr-1 btn-floating waves-effect waves-light blue lightrn-1 tooltipped '. ($withChangeStatus == false ? 'hide' : '') .'" data-tooltip="Change Status"><i class="material-icons">autorenew</i></a>';
        
            $link = '';

            $linkShow = '<a href="'.route($route.'.show',[$id]).'" class="btn btn-outline-info" data-tooltip="View Detail" style="margin-left:1%"><i class="fas fa-search"></i></a>';
            $linkEdit = '<a href="'.route($route.'.edit',[$id]).'" class="btn btn-outline-info" data-tooltip="Edit" style="margin-left:1%"><i class="fas fa-edit"></i></a>';
            $linkChangeStatus = '<a href="'.route($route.'.changestatus',[$id]).'" rel="changestatus" class="btn btn-outline-info '. ($withChangeStatus == false ? 'hide' : '') .'" data-tooltip="Change Status" style="margin-left:1%"><i class="fas fa-retweet"></i></a>';

            if(auth()->user()->can('show '.$route)){
                $link .= $linkShow;
            }

            if(auth()->user()->can('edit '.$route)){
                $link .= $linkEdit;
            }

            if(auth()->user()->can('changestatus '.$route)){
                $link .= $linkChangeStatus;
            }

            if($link == ''){
                $link = '<i class="material-icons">block</i>';
            }
        
        }

        return $link;
    }
}
