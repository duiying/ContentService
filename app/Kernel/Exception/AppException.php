<?php

namespace App\Kernel\Exception;

use App\Constant\AppErrorCode;
use Hyperf\Server\Exception\ServerException;
use Throwable;

/**
 * 应用异常类
 *
 * @author Yaxian <wangyaxiandev@gmail.com>
 * @package App\Kernel\Exception
 */
class AppException extends ServerException
{
    public function __construct(int $code = 0, string $message = null, Throwable $previous = null)
    {
        if (is_null($message)) {
            $message = AppErrorCode::getMessage($code);
        }

        parent::__construct($message, $code, $previous);
    }
}