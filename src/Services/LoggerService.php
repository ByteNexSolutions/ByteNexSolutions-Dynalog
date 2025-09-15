<?php

namespace ByteNexSolutions\DynaLog\Services;

use Illuminate\Support\Facades\Log;
use Psr\Log\LoggerInterface;
use ByteNexSolutions\DynaLog\Logging\DynamicLogger;

class LoggerService
{
    protected LoggerInterface $logger;
    protected string | null $level;
    protected int | null  $days;
    public function __construct(string $category, string $source, string $level, int $days)
    {
        $this->logger = Log::build([
            'driver'   => 'custom',
            'via'      => DynamicLogger::class,
            'category' => $category,
            'source'   => $source,
            'level'    => $level ?? config('dynalog.default_level'),
            'days'     => $days ?? config('dynalog.default_days'),
        ]);
    }

    public function info(string $message, array $context = []): void { $this->logger->info($message, $context); }
    public function debug(string $message, array $context = []): void { $this->logger->debug($message, $context); }
    public function warning(string $message, array $context = []): void { $this->logger->warning($message, $context); }
    public function error(string $message, array $context = []): void { $this->logger->error($message, $context); }
    public function critical(string $message, array $context = []): void { $this->logger->critical($message, $context); }

    public function getLogger(): LoggerInterface { return $this->logger; }
}
