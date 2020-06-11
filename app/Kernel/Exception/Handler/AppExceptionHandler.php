<?php

namespace App\Kernel\Exception\Handler;

use App\Kernel\Constant\Constant;
use App\Kernel\Constant\ErrorCode;
use App\Kernel\Exception\AppException;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Validation\ValidationException;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AppExceptionHandler extends ExceptionHandler
{
    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        // 验证器异常
        if ($throwable instanceof ValidationException) {
            // 格式化输出
            $data = json_encode([
                Constant::API_CODE      => ErrorCode::PARAMS_INVALID,
                Constant::API_MESSAGE   => $throwable->validator->errors()->first(),
                Constant::API_DATA      => null
            ], JSON_UNESCAPED_UNICODE);

            // 阻止异常冒泡
            $this->stopPropagation();

            return $response->withStatus(200)->withBody(new SwooleStream($data));
        }

        // 应用异常
        if ($throwable instanceof AppException) {
            // 格式化输出
            $data = json_encode([
                Constant::API_CODE      => $throwable->getCode(),
                Constant::API_MESSAGE   => $throwable->getMessage(),
                Constant::API_DATA      => null
            ], JSON_UNESCAPED_UNICODE);

            // 阻止异常冒泡
            $this->stopPropagation();

            return $response->withStatus(200)->withBody(new SwooleStream($data));
        }

        // 其它异常
        if ($throwable instanceof \Exception) {
            // 格式化输出
            $data = json_encode([
                Constant::API_CODE      => $throwable->getCode(),
                Constant::API_MESSAGE   => $throwable->getMessage(),
                Constant::API_DATA      => null
            ], JSON_UNESCAPED_UNICODE);

            // 阻止异常冒泡
            $this->stopPropagation();

            return $response->withStatus(500)->withBody(new SwooleStream($data));
        }

        // 交给下一个异常处理器
        return $response;
    }

    /**
     * 判断该异常处理器是否要对该异常进行处理
     *
     * @param Throwable $throwable
     * @return bool
     */
    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}