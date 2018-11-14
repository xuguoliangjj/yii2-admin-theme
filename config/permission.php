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
                        ['url'=>'/admin','label'=>'首页'],
                    ]]
                ]
            ]
        ]
    ],
    [
        'label' => '游戏管理',
        'items' => [
            [
                'label' =>  '游戏配置',
                'items' =>  [
                    ['label'=>'游戏配置','items' => [
                        ['url'=>'/admin/game','label'=>'首页'],
                        ['url'=>'/admin/game/view','label'=>'查看详情'],
                        ['url'=>'/admin/game/update','label'=>'更新游戏'],
                        ['url'=>'/admin/game/delete','label'=>'删除游戏'],
                        ['url'=>'/admin/game/create','label'=>'添加新游戏'],
                        ['url'=>'/admin/game/download','label'=>'下载参数'],
                        ['url'=>'/admin/game/clean','label'=>'清空缓存'],
                    ]],
                    ['label'=>'渠道配置','items' => [
                        ['url'=>'/admin/partner','label'=>'首页'],
                        ['url'=>'/admin/partner/view','label'=>'查看详情'],
                        ['url'=>'/admin/partner/update','label'=>'更新渠道'],
                        ['url'=>'/admin/partner/delete','label'=>'删除渠道'],
                        ['url'=>'/admin/partner/create','label'=>'添加新渠道'],
                        ['url'=>'/admin/partner/config','label'=>'查看配置字段'],
                        ['url'=>'/admin/partner/para-create','label'=>'添加参数'],
                        ['url'=>'/admin/partner/para-update','label'=>'更新参数'],
                        ['url'=>'/admin/partner/para-delete','label'=>'删除参数'],
                    ]],
                    ['url'=>'/admin/app-partner-para','label'=>'参数配置','items' => [
                        ['url'=>'/admin/app-partner-para/view','label'=>'配置'],
                        ['url'=>'/admin/app-partner-para/clean','label'=>'清空缓存'],
                    ]]
                ]
            ],
            [
                'label' =>  '数据管理',
                'items' =>  [
                    ['label'=>'用户数据','items' => [
                        ['url'=>'/admin/sdk-user','label'=>'首页'],
                        ['url'=>'/admin/deny-login','label'=>'禁止登录'],
                        ['url'=>'/admin/deny-pay','label'=>'禁止充值'],
                    ]],
                    ['label'=>'充值数据','items' => [
                        ['url'=>'/admin/pay-order','label'=>'首页'],
                        ['url'=>'/admin/pay-order/push-order','label'=>'补单/补发'],
                    ]],
                    ['label'=>'对账日报','items' => [
                        ['url'=>'/admin/daily','label'=>'首页'],
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
