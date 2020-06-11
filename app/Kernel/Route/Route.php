<?php

namespace App\Kernel\Route;

/**
 * 路由封装类
 *
 * @author Yaxian <wangyaxiandev@gmail.com>
 * @package App\Kernel\Route
 */
class Route
{
    /**
     * 路由装饰
     *
     * @param string $route
     * @return string
     */
    public static function decoration($route = '')
    {
        return sprintf('App\Module\%s@handle', $route);
    }
}