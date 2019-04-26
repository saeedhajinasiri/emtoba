<?php

namespace App\Menus;


use App\Page;

class AdminMenu extends BaseMenu
{

    /**
     * @return array
     */
    protected function getList()
    {
        $pageList = Page::query()
            ->whereNotNull('page_name')
            ->get()
            ->map(function ($item) {
                if ($item) {
                    return [
                        'title' => trans('admin.pages.' . $item->page_name),
                        'link' => route('admin.pages.edit', $item->id),
                        'route' => 'admin.pages.edit'
                    ];
                }
            });
        $pageMenu = ($pageList->count() > 0 ? array_merge(
            [
                'posts' => [
                    'title' => trans('admin.posts.index'),
                    'link' => route('admin.posts.index'),
                    'route' => 'admin.posts.index',
                ],
                'pages' => [
                    'title' => trans('admin.pages.index'),
                    'link' => route('admin.pages.index'),
                    'route' => 'admin.pages.index',
                ]
            ], $pageList->toArray()) : [
            'posts' => [
                'title' => trans('admin.posts.index'),
                'link' => route('admin.posts.index'),
                'route' => 'admin.posts.index',
            ], 'pages' => [
                'title' => trans('admin.pages.index'),
                'link' => route('admin.pages.index'),
                'route' => 'admin.pages.index',
            ]
        ]
        );

        $list = [
            [
                'title' => trans('admin.aside.dashboard'),
                'link' => route('admin.dashboard.index'),
                'route' => 'admin.dashboard.index',
                'icon' => 'ti-home',
            ],
            [
                'title' => trans('admin.content.menuTitle'),
                'link' => 'javascript:;',
                'icon' => 'ti-pencil-alt',
                'children' => $pageMenu
            ],
            [
                'title' => trans('admin.info.menuTitle'),
                'link' => 'javascript:;',
                'icon' => 'ti-pencil-alt',
                'children' => [
                    [
                        'title' => trans('admin.locations.index'),
                        'link' => route('admin.locations.index'),
                        'route' => 'admin.locations.index',
                    ],
                    [
                        'title' => trans('admin.links.index'),
                        'link' => route('admin.links.index'),
                        'route' => 'admin.links.index',
                    ],
                    [
                        'title' => trans('admin.comments.index'),
                        'link' => route('admin.comments.index'),
                        'route' => 'admin.comments.index',
                    ],
                    [
                        'title' => trans('admin.sliders.index'),
                        'link' => route('admin.sliders.index'),
                        'route' => 'admin.sliders.index',
                    ],
                ]
            ],
            [
                'title' => trans('admin.contacts.menuTitle'),
                'link' => 'javascript:;',
                'route' => 'admin.content.parent.route',
                'icon' => 'ti-menu',
                'children' => [
                    [
                        'title' => trans('admin.contacts.index'),
                        'link' => route('admin.contacts.index'),
                        'route' => 'admin.contacts.index',
                    ],
                    [
                        'title' => trans('admin.departments.index'),
                        'link' => route('admin.departments.index'),
                        'route' => 'admin.departments.index',
                    ],
                ]
            ],
            [
                'title' => trans('admin.users.menuTitle'),
                'link' => 'javascript:;',
                'route' => 'admin.content.parent.route',
                'icon' => 'ti-user',
                'children' => [
                    [
                        'title' => trans('admin.customers.index'),
                        'link' => route('admin.customers.index'),
                        'route' => 'admin.customers.index',
                    ],
                    [
                        'title' => trans('admin.admins.index'),
                        'link' => route('admin.admins.index'),
                        'route' => 'admin.admins.index',
                    ],
                    [
                        'title' => trans('admin.roles.index'),
                        'link' => route('admin.roles.index'),
                        'route' => 'admin.roles.index',
                    ],
                    [
                        'title' => trans('admin.permissions.index'),
                        'link' => route('admin.permissions.index'),
                        'route' => 'admin.permissions.index',
                    ],
                ]
            ],
            [
                'title' => trans('admin.settings.menuTitle'),
                'link' => 'javascript:;',
                'route' => 'admin.settings.route',
                'icon' => 'ti-settings',
                'children' => [
                    [
                        'title' => trans('admin.settings.index'),
                        'link' => route('admin.settings.index'),
                        'route' => 'admin.settings.index',
                    ],
                    /*[
                        'title' => trans('admin.menus.index'),
                        'link' => route('admin.menus.index'),
                        'route' => 'admin.menus.index',
                    ],*/
                    [
                        'title' => trans('admin.translations.index'),
                        'link' => route('admin.translations.index'),
                        'route' => 'admin.translations.index',
                    ],
                ]
            ],
            /*[
                'title' => trans('admin.databases.menuTitle'),
                'link' => 'javascript:;',
                'route' => 'admin.databases.route',
                'icon' => 'ti-server',
                'children' => [
                    [
                        'title' => trans('admin.databases.index'),
                        'link' => route('admin.databases.index'),
                        'route' => 'admin.databases.index',
                    ],
                ]
            ],*/
        ];
        return $list;
    }
}