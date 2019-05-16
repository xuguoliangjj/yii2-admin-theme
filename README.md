<p align="center">
    <a href="http://admin.loadata.com" target="_blank">
        <img src="http://admin.loadata.com/img/logo.png" height="100px">
    </a>
    <h1 align="center">Yii2-Admin-Theme 基于layui的通用后台模板</h1>
    <br>
</p>

[![Build Status](https://img.shields.io/badge/yii2--admin--theme-1.0.0-brightgreen.svg)]()


* 后台示例：http://admin.loadata.com  测试账号：demo  测试密码：123456
* 交流群：<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=74519f0048158d183bfa52a3d56255d2e897f891bfe4348a32d444532a290aab"><img border="0">953021758</a>
* 我的博客：http://blog.loadata.com
* 数据库：`admin.sql` 自己倒入mysql，然后修改`config/db.php`配置

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=admin',
    'username' => 'root',
    'password' => '123456',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
```

系统截图：

<img src="https://raw.githubusercontent.com/xuguoliangjj/yii2-admin-theme/master/web/img/screenshot/1.png">
<img src="https://raw.githubusercontent.com/xuguoliangjj/yii2-admin-theme/master/web/img/screenshot/2.png">
<img src="https://raw.githubusercontent.com/xuguoliangjj/yii2-admin-theme/master/web/img/screenshot/3.png">
<img src="https://raw.githubusercontent.com/xuguoliangjj/yii2-admin-theme/master/web/img/screenshot/4.png">
<img src="https://raw.githubusercontent.com/xuguoliangjj/yii2-admin-theme/master/web/img/screenshot/5.png">
<img src="https://raw.githubusercontent.com/xuguoliangjj/yii2-admin-theme/master/web/img/screenshot/6.png">
<img src="https://raw.githubusercontent.com/xuguoliangjj/yii2-admin-theme/master/web/img/screenshot/7.png">
<img src="https://raw.githubusercontent.com/xuguoliangjj/yii2-admin-theme/master/web/img/screenshot/8.png">
<img src="https://raw.githubusercontent.com/xuguoliangjj/yii2-admin-theme/master/web/img/screenshot/9.png">
<img src="https://raw.githubusercontent.com/xuguoliangjj/yii2-admin-theme/master/web/img/screenshot/10.png">

菜单配置：`config/menu.php`

```php
return [
    'menu'=>[
        'data'=> ['label'=>'主页','items'=>[
                ['label' => '主页',
                    'items' => [
                        ['label' => '主页概览', 'url' => ['/site']]
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
```

权限配置：`config/permission.php`

```php
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
                        ['url'=>'/site/main','label'=>'首页-关键报表'],
                        ['url'=>'/filter','label'=>'筛选'],
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
                            ['url'=>'/admin/user','label'=>'首页'],
                            ['url'=>'/admin/user/create','label'=>'新增用户'],
                            ['url'=>'/admin/user/view', 'label'=>'用户授权'],
                            ['url'=>'/admin/user/delete','label'=>'删除用户'],
                            ['url'=>'/admin/user/update','label'=>'修改用户'],
                            ['url'=>'/admin/user/change-name','label'=>'快捷修改用户名'],
                            ['url'=>'/admin/user/change-time','label'=>'快捷修改创建时间'],
                        ]
                    ],
                    ['label'=>'角色管理','items' => [
                        ['url'=>'/admin/roles','label'=>'首页'],
                        ['url'=>'/admin/roles/create','label'=>'添加角色'],
                        ['url'=>'/admin/roles/view', 'label'=>'修改角色权限'],
                        ['url'=>'/admin/roles/delete','label'=>'删除角色'],
                        ['url'=>'/admin/roles/update','label'=>'修改角色名'],
                    ]],
                    [
                        'label' =>  '权限组管理',
                        'items' =>  [
                            ['url'=>'/admin/permission','label'=>'首页'],
                            ['url'=>'/admin/permission/create','label'=>'新增权限组'],
                            ['url'=>'/admin/permission/view', 'label'=>'修改权限组权限'],
                            ['url'=>'/admin/permission/delete','label'=>'删除权限组'],
                            ['url'=>'/admin/permission/update','label'=>'修改权限组名称'],
                        ]
                    ],
                    [
                        'label' =>  '路由管理',
                        'items' =>  [
                            ['url'=>'/admin/route','label'=>'首页'],
                            ['url'=>'/admin/route/delete','label'=>'路由删除'],
                            ['url'=>'/admin/route/update','label'=>'路由修改'],
                        ]
                    ],
                    [
                        'label' =>  '规则管理',
                        'items' =>  [
                            ['url'=>'/admin/rule','label'=>'首页'],
                            ['url'=>'/admin/rule/delete','label'=>'删除规则'],
                            ['url'=>'/admin/rule/update','label'=>'修改规则'],
                            ['url'=>'/admin/rule/create','label'=>'新增规则'],
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
                            ['url'=>'/admin/personal/reset-password','label'=>'首页']
                        ]
                    ]
                ]
            ]
        ]
    ]
];

```
