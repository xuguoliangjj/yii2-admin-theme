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
                ['label' => '主页',
                    'items' => [
                        ['label' => '主页概览', 'url' => ['/site']],
                        ['label' => '主页概览', 'url' => ['/site/xxx']]
                    ]
                ]
            ]
        ],
        'setting'=> ['label'=>'系统设置', 'items'=>[
                ['label' => '权限管理',
                    'items' => [
                        ['label' => '用户管理', 'url' => ['/admin/user']],
                        ['label' => '角色管理', 'url' => ['/admin/roles']],
                        ['label' => '权限列表', 'url' => ['/admin/permission']],
                        ['label' => '路由列表', 'url' => ['/admin/route']],
                        ['label' => '规则列表', 'url' => ['/admin/rule']]
                    ]
                ],
                ['label' => '个人中心',
                    'items' => [
                        ['label' => '修改密码', 'url' => ['/admin/personal/reset-password']],
                    ]
                ]
            ]
        ]
    ]
];
