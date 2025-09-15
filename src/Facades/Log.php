<?php

namespace ByteNexSolutions\DynaLog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \ByteNexSolutions\DynaLog\Services\LoggerService make(string $category, string $source, string $level = 'debug', int $days = 7)
 * @method static void info(string $message, array $context = [])
 * @method static void debug(string $message, array $context = [])
 * @method static void warning(string $message, array $context = [])
 * @method static void error(string $message, array $context = [])
 * @method static void critical(string $message, array $context = [])
 * @method static \Psr\Log\LoggerInterface getLogger()
 */
class DynaLog extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return 'dynalog';
    }
}
