<?php

namespace App\Kernel\Log;

use Hyperf\Framework\Logger\StdoutLogger;
use Hyperf\Utils\ApplicationContext;

/**
 * 日志封装类
 *
 * @author Yaxian <wangyaxiandev@gmail.com>
 * @package App\Kernel\Log
 */
class Log
{
    public static function info($message, array $context = [], string $name = 'app')
    {
        $logger = ApplicationContext::getContainer()->get(\Hyperf\Logger\LoggerFactory::class)->get($name, 'info');
        ApplicationContext::getContainer()->get(StdoutLogger::class)->info($message . ' "context:" ' . json_encode($context));
        $logger->info($message, $context);
    }

    public static function error($message, array $context = [], string $name = 'app')
    {
        $logger = ApplicationContext::getContainer()->get(\Hyperf\Logger\LoggerFactory::class)->get($name, 'error');
        ApplicationContext::getContainer()->get(StdoutLogger::class)->error($message . ' "context:" ' . json_encode($context));
        $logger->error($message, $context);
    }

    public static function debug($message, array $context = [], string $name = 'app')
    {
        $logger = ApplicationContext::getContainer()->get(\Hyperf\Logger\LoggerFactory::class)->get($name, 'debug');
        ApplicationContext::getContainer()->get(StdoutLogger::class)->debug($message . ' "context:" ' . json_encode($context));
        $logger->debug($message, $context);
    }

    public static function warning($message, array $context = [], string $name = 'app')
    {
        $logger = ApplicationContext::getContainer()->get(\Hyperf\Logger\LoggerFactory::class)->get($name, 'warning');
        ApplicationContext::getContainer()->get(StdoutLogger::class)->warning($message . ' "context:" ' . json_encode($context));
        $logger->warning($message, $context);
    }

    public static function notice($message, array $context = [], string $name = 'app')
    {
        $logger = ApplicationContext::getContainer()->get(\Hyperf\Logger\LoggerFactory::class)->get($name, 'notice');
        ApplicationContext::getContainer()->get(StdoutLogger::class)->notice($message . ' "context:" ' . json_encode($context));
        $logger->notice($message, $context);
    }
}