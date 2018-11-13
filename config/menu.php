<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2018/7/6
 * Time: 14:11
 */

return [
    'menu'=>[
        'data'=> ['label'=>'主页','items'=>[
                ['icon'=>'glyphicon glyphicon-cog','label' => '主页',
                    'items' => [
                        ['label' => '主页概览', 'url' => ['/site']],
                        ['label' => '关于我们', 'url' => ['/site/about']],
                        ['label' => '联系我们', 'url' => ['/site/contact']],
                        ['label' => '参数配置', 'url' => ['/admin/app-partner-para']]
                    ]
                ]
            ]
        ],
        'setting'=> ['label'=>'系统设置', 'items'=>[
                ['icon'=>'glyphicon glyphicon-eye-open','label' => '权限管理',
                    'items' => [
                        ['label' => '用户管理', 'url' => ['/admin/user']],
                        ['label' => '角色管理', 'url' => ['/admin/roles']],
                        ['label' => '权限列表', 'url' => ['/admin/permission']],
                        ['label' => '路由列表', 'url' => ['/admin/route']],
                        ['label' => '规则列表', 'url' => ['/admin/rule']]
                    ]
                ],
                ['icon'=>'glyphicon glyphicon-user','label' => '个人中心',
                    'items' => [
                        ['label' => '修改密码', 'url' => ['/admin/site/reset-password']],
                    ]
                ]
            ]
        ]
    ]
];
