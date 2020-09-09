<?php
/**
 * Created by PhpStorm.
 * User: I816
 * Date: 25/06/2019
 * Time: 10:40
 */

namespace App\Html;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class Navbar
{
    /**
     * @var array
     */
    protected $navbar = [];

    /**
     * @var array
     */
    protected $routes = [];

    /**
     * @var array
     */
    protected $uri_exceptions = ['home', 'login', 'logout'];

    /**
     * @var string
     */
    protected $nav_format = '<i class="nav-icon fas fa-%s"></i> <p>%s</p>';

    /**
     * @var string
     */
    protected $item_format = '<li %s class="nav-item">%s</li>';

    /**
     * @var string
     */
    protected $anchor_format = '<a class="%s %s" href="%s">%s</a>';

    /**
     * @var string
     */
    protected $child_format = '<div class="collapsible-body" %s><ul class="collapsible collapsible-sub" data-collapsible="accordion">%s</ul></div>';

    /**
     * Navbar constructor.
     */
    public function __construct()
    {
        $this->setAvailableRoutes();
        $this->setUserNavbar();
    }

    /**
     * @param array|null $navbar
     * @param int $level
     * @return string
     */
    public function render(array $navbar = null): string
    {
        $navbar = !is_null($navbar) ? $navbar : $this->navbar;
        $html = '';
        $currentnav = request()->segment(1) . '/' . request()->segment(2);

        $currentnav = substr($currentnav,-1) == '/' ? substr($currentnav,0,-1) : $currentnav;
        $currentnav = $currentnav == 'admin' ? 'dashboard' : $currentnav;
        foreach ($navbar as $nav) {
            $child_html = '';
            $has_childs = count($nav['childs']);
            $uri = Str::contains($nav['uri'], 'index') ? route($nav['uri']) :
                (Str::contains($nav['uri'], 'javascript') ? $nav['uri'] : url('/' . $nav['uri']));
            $title = sprintf(
                $this->nav_format,
                (!is_null($nav['icon']) ? $nav['icon'] : 'radio_button_unchecked'),
                $nav['label']
            );

            $status = $this->isChildActive($currentnav, $nav['id']);

            if ($has_childs)
                $child_html = sprintf($this->child_format, ($status != '' ? 'style="display: block;"' : ''), $this->render($nav['childs']));

//            $anchor = sprintf($this->anchor_format, (is_null($nav['parent_id']) ? ($has_childs ? 'collapsible-header '.$status : $status) : 'collapsible-body '.$status), $uri, $title) . $child_html;
            $anchor = sprintf($this->anchor_format, ($has_childs ? 'nav-link' : 'nav-link'), (($currentnav.'.index' == $nav['uri'] || $currentnav == $nav['uri']) ? 'active' : ''), $uri, $title) . $child_html;

            $html .= sprintf(
                $this->item_format,
                ($has_childs ? 'class="bold"'  : ''),
                $anchor
            );
        }

        return $html;
    }

    /**
     *
     */
    protected function setAvailableRoutes()
    {
        foreach (Route::getRoutes() as $route) {
            $uri = $route->uri();

            if ($route->methods()[0] === 'GET' && !in_array($uri, $this->uri_exceptions) && !Str::startsWith($uri, '/'))
                $this->routes[$uri] = !empty($route->getName()) ? $route->getName() : $uri;
        }
    }

    /**
     *
     */
    protected function setUserNavbar()
    {
        $access = \App\Models\Master\Role::findByName(auth()->user()->roles->first()->name)->pages->where('visible', 1);
//dd($access);
        foreach ($access as $a) {
            if (isset($this->routes[$a->uri]) || Str::contains($a->uri, 'javascript')) {
                $structure = ['id' => $a->id, 'label' => $a->label, 'icon' => $a->icon, 'parent_id' => $a->parent_id, 'childs' => []];
                $structure['uri'] = isset($this->routes[$a->uri]) ? $this->routes[$a->uri] : $a->uri;


                if (!is_null($a->parent_id)) {
                    $childs = \Illuminate\Support\Arr::where($this->navbar, function ($value, $key) use ($a) {
                        if ($value['id'] === $a->parent_id)
                            return $value;
                    });

                    if (!empty($childs))
                        array_push($this->navbar[key($childs)]['childs'], $structure);
                } else {
                    $this->navbar[] = $structure;
                }
            }
        }
    }

    // /**
    //  * @return string
    //  */
    // protected function isChildActive($current, $parentId)
    // {
    //     $access = \App\Models\Master\Role::findByName(auth()->user()->roles->first()->name)->pages->where('visible', 1);
    //     $mappedNav = $access->mapToGroups(function ($item, $key) {
    //         return [
    //             [
    //                 'id' => $item['id'],
    //                 'uri' => Str::contains($item['uri'], 'index') ? str_replace('.index', '', $item['uri']) : $item['uri'],
    //                 'parent_id' => $item['parent_id'],
    //             ]
    //         ];
    //     })[0]->firstWhere('uri', substr($current,-1) == '/' ? substr($current,0,-1) : $current);
    //     $mappedParentId = $mappedNav['parent_id'];

    //     return (!is_null($mappedParentId) && $mappedParentId === $parentId) || (is_null($mappedParentId) && $mappedNav['id'] === $parentId) ? ' active open' : '';
    // }

        /**
     * @return string
     */
    protected function isChildActive($current, $parentId)
    {
        $access = \App\Models\Master\Role::findByName(auth()->user()->roles->first()->name)->pages->where('visible', 1);
        //        $access = \App\Entities\Module::where('visible', 1)->orderBy('sequence')->get();
        $mappedNav = $access->mapToGroups(function ($item, $key) {
            return [
                [
                    'id' => $item['id'],
                    'uri' => Str::contains($item['uri'], 'index') ? str_replace('.index', '', $item['uri']) : $item['uri'],
                    'parent_module' => $item['parent_module'],
                ]
            ];
        })[0]->firstWhere('uri', $current);
        $mappedParentId = isset($mappedNav['parent_module']) ? $mappedNav['parent_module'] : null;

        return !is_null($mappedParentId) && $mappedParentId === $parentId ? ' active' : '';
    }
}
