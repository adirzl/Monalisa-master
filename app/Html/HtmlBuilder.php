<?php
/**
 * Created by PhpStorm.
 * User: TantanSuryana
 * Date: 1/29/2020
 * Time: 6:52 AM
 */

namespace App\Html;

use Illuminate\Support\Str;

class HtmlBuilder extends \Collective\Html\HtmlBuilder
{
    /**
     * @param string $uri
     * @param array $attributes
     * @return \Illuminate\Support\HtmlString
     */
    public function linkCreate(string $uri, array $attributes = null)
    {
        $html = '';

        if (auth()->user()->can('create ' . $uri))
            $html = '<a href="' . route($uri . '.create') . '" class="btn btn-success btn-sm" ' . $this->attributes($attributes) . '><i class="fa fa-plus"></i> ' . __('label.create') . '</a>';

        return $this->toHtmlString($html);
    }
}