<?php

namespace ByteNexSolutions\DynaLog\Logging;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class DynamicLogger
{
    public function __invoke(array $config)
    {
        $level    = Logger::toMonologLevel($config['level'] ?? config('dynalog.default_level'));
        $days     = $config['days'] ?? config('dynalog.default_days');
        $category = $config['category'] ?? 'General';
        $source = $config['source'] ?? 'default';
        $date     = now()->format('Y-m-d');

        $directory = config('dynalog.path') . "/{$category}/{$source}";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $logPath = "{$directory}/{$date}.log";

        $handler = new StreamHandler($logPath, $level);
        $formatter = new LineFormatter(null, null, true, true);
        $handler->setFormatter($formatter);

        $logger = new Logger("{$category}.{$source}");
        $logger->pushHandler($handler);

        return $logger;
    }
}
