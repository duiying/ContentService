<?php

namespace App\Kernel\Util;

/**
 * 常用工具类
 *
 * @author Yaxian <wangyaxiandev@gmail.com>
 * @package App\Kernel\Util
 */
class Util
{
    /**
     * 对象转数组
     *
     * @param $obj
     * @return array
     */
    public static function object2Array($obj)
    {
        return json_decode(json_encode($obj), true);
    }

    /**
     * 格式化查找接口结果
     *
     * @param $p
     * @param $size
     * @param $total
     * @param $list
     * @return array
     */
    public static function formatSearchRes($p, $size, $total, $list)
    {
        return [
            'p'         => $p,
            'size'      => $size,
            'total'     => $total,
            'next'      => $p * $size < $total ? 1 : 0,
            'list'      => $list
        ];
    }

    /**
     * 一个字符串中是否包含另外一个字符串
     *
     * @param $haystack
     * @param $needle
     * @return bool
     */
    public static function contain($haystack, $needle)
    {
        return strstr($haystack, $needle) !== false;
    }
}