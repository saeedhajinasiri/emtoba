<?php

namespace App\Menus;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class BaseMenu
{
    public function getMenus($user)
    {
        $list = collect($this->getList());

        if (!isset($user)) {
            $user = Auth::user();
        }

//        dd($user->getPermissions());

        $rendered = '';

        foreach ($list as $rootItem) {
            if (isset($rootItem['children'])) {
                foreach ($rootItem['children'] as $index => $child) {
                    $permission = substr_replace($child['route'], '.*', strrpos($child['route'], '.'));
                    if ($user) {
                        if (!$user->can($permission)) {
                            unset($rootItem['children'][$index]);
                        }
                    }
                }
                if (count($rootItem['children'])) {
                    $rendered .= $this->renderMenu($rootItem)[0];
                }
            } else {
                $rendered .= $this->renderMenu($rootItem)[0];

            }
        }


        return $rendered;
    }

    private function renderMenu($node)
    {
        $routeName = Route::currentRouteName();
        $childrenRendered = '';
        $childrenIsOpen = false;

        if (isset($node['children'])) {
            $childrenRendered .= '<ul class="treeview-menu">';
            foreach ($node['children'] as $child) {
                list($childRendered, $childIsOpen) = $this->renderMenu($child);
                $childrenRendered .= $childRendered;

                $childrenIsOpen = ($childIsOpen || $childrenIsOpen);
            }
            $childrenRendered .= '</ul>';
        }

        if (isset($node['route'])) {
            $nodeRoute = substr_replace($node['route'], '.*', strrpos($node['route'], '.'));
            $currentRoute = substr_replace($routeName, '.*', strrpos($routeName, '.'));
            $isOpen = $currentRoute == $nodeRoute;
        } else {
            $isOpen = false;
        }

        $rendered = '';
        $rendered .= '<li class="' . (isset($node['children']) ? 'treeview' : '') . (($isOpen || $childrenIsOpen) ? ' active' : '') . '">';
        $rendered .= ' <a href="' . $node['link'] . '">';
        $rendered .= (isset($node['icon']) ? ' <i class="' . $node['icon'] . '"></i>' : '');
        $rendered .= ' <span class="title">' . $node['title'] . '</span>';
        if (isset($node['children'])) {
            $rendered .= ' <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> ';
        }
        $rendered .= ' </a>';
        $rendered .= $childrenRendered . '</li>';
        return [$rendered, $isOpen];
    }
}