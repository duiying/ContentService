<?php

namespace App\Constant;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * 应用错误码类
 *
 * @author Yaxian <wangyaxiandev@gmail.com>
 * @package App\Constant
 */

/**
 * @Constants
 */
class AppErrorCode extends AbstractConstants
{
    /**
     * @Message("请求参数错误")
     */
    const REQUEST_PARAMS_INVALID = 10001;
}