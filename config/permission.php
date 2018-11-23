<?php
use \yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2016/11/10
 * Time: 11:36
 */
return [
    [
        'label' => 'root 权限',
        'items' => [
            [
                'label' =>  'root',
                'items' =>  [
                    ['url'=>'/*','label'=>Html::tag('b','root',['style'=>'color:red;']),'items' => [
                        ['url'=>'/*','label'=>Html::tag('b','root权限',['style'=>'color:red;'])],
                    ]]
                ]
            ]
        ]
    ],
    [
        'label' => '基础权限',
        'items' => [
            [
                'label' =>  '基础权限',
                'items' =>  [
                    ['label'=>'后台首页','items' => [
                        ['url'=>'/site','label'=>'首页'],
                    ]]
                ]
            ]
        ]
    ],
    [
        'label' => '系统设置',
        'items' => [
            [
                'label' =>  '权限管理',
                'items' =>  [
                    [
                        'label' =>  '用户管理',
                        'items' =>  [
                            ['url'=>'/setting/user','label'=>'首页'],
                            ['url'=>'/setting/user/create','label'=>'新增用户'],
                            ['url'=>'/setting/user/view', 'label'=>'用户授权'],
                            ['url'=>'/setting/user/delete','label'=>'删除用户'],
                            ['url'=>'/setting/user/update','label'=>'修改用户'],
                            ['url'=>'/setting/user/change-name','label'=>'快捷修改用户名'],
                            ['url'=>'/setting/user/change-time','label'=>'快捷修改创建时间'],
                        ]
                    ],
                    ['label'=>'角色管理','items' => [
                        ['url'=>'/setting/roles','label'=>'首页'],
                        ['url'=>'/setting/roles/create','label'=>'添加角色'],
                        ['url'=>'/setting/roles/view', 'label'=>'修改角色权限'],
                        ['url'=>'/setting/roles/delete','label'=>'删除角色'],
                        ['url'=>'/setting/roles/update','label'=>'修改角色名'],
                    ]],
                    [
                        'label' =>  '权限组管理',
                        'items' =>  [
                            ['url'=>'/setting/permission','label'=>'首页'],
                            ['url'=>'/setting/permission/create','label'=>'新增权限组'],
                            ['url'=>'/setting/permission/view', 'label'=>'修改权限组权限'],
                            ['url'=>'/setting/permission/delete','label'=>'删除权限组'],
                            ['url'=>'/setting/permission/update','label'=>'修改权限组名称'],
                        ]
                    ],
                    [
                        'label' =>  '路由管理',
                        'items' =>  [
                            ['url'=>'/setting/route','label'=>'首页'],
                            ['url'=>'/setting/route/delete','label'=>'路由删除'],
                            ['url'=>'/setting/route/update','label'=>'路由修改'],
                        ]
                    ],
                    [
                        'label' =>  '规则管理',
                        'items' =>  [
                            ['url'=>'/setting/rule','label'=>'首页'],
                            ['url'=>'/setting/rule/delete','label'=>'删除规则'],
                            ['url'=>'/setting/rule/update','label'=>'修改规则'],
                            ['url'=>'/setting/rule/create','label'=>'新增规则'],
                        ]
                    ]
                ]
            ],
            [
                'label' => '个人中心',
                'items' => [
                    [
                        'label' =>  '修改密码',
                        'items' =>  [
                            ['url'=>'/site/reset-password','label'=>'首页']
                        ]
                    ]
                ]
            ]
        ]
    ]
];
