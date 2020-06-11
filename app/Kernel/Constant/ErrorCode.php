<?php

namespace App\Kernel\Constant;

use Hyperf\Constants\AbstractConstants;

/**
 * 基础错误码类
 *
 * @author Yaxian <wangyaxiandev@gmail.com>
 * @package App\Kernel\Constant
 */
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("Server Error！")
     */
    const SERVER_ERROR = 500;

    /**
     * @Message("参数错误")
     */
    const PARAMS_INVALID = 1001;
}