<?php

namespace Kaban\Core\Menus;


class ClientMenu extends BaseMenu
{

    /**
     * @return array
     */
    protected function getList()
    {
        $list = [
            [
                'title' => trans('client.dashboard.home.title'),
                'link' => route('client.dashboard.home.show'),
                'route' => 'client.dashboard.home.show',
                'icon' => 'icon-home',

            ],
            [
                'title' => trans('client.telegram.parent.title'),
                'link' => 'javascript:;',
                'route' => 'client.telegram.parent.route',
                'icon' => 'icon-home',
                'children' => [
                    [
                        'title' => trans('client.telegram.channels.title'),
                        'link' => route('client.telegram.channels.index'),
                        'route' => 'client.telegram.channels.index',
                        'icon' => 'icon-home',
                    ],
                ]
            ]
        ];
        return $list;
    }
}