<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/5
 * Time: 23:41
 */
namespace admin\components\rule;

use yii\rbac\Rule;

/**
 * Class RouteRule
 * @package app\modules\admin\components\rule
 */
class RouteRule extends Rule{

    const RULE_NAME = 'route_rule';

    /**
     * @param int|string $user
     * @param \yii\rbac\Item $item
     * @param array $params
     * @return bool
     */
    public function execute($user, $item, $params)
    {
        $routeParams = isset($item->data['params']) ? $item->data['params'] : [];
        $allow = true;
        $queryParams = \Yii::$app->request->getQueryParams();
        foreach ($routeParams as $key => $value) {
            $allow = $allow && (!isset($queryParams[$key]) || $queryParams[$key]==$value);
        }

        return $allow;
    }
}