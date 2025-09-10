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
        $category = $this->sanitizeName($config['category']) ?? 'General';
        $source   = $this->sanitizeName($config['source']) ?? 'Default';
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

    /**
     * Sanitize Name Category or Source. Sanitiza el nombre de la categoría o fuente (category / source).
     */
    protected function sanitizeName(string $name): string
    {
        // 1. Convertir todo a ASCII (quita acentos, ç, ü, etc.)
        $ascii = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $name);

        // 2. Reemplazar cualquier carácter no alfanumérico por espacio
        $clean = preg_replace('/[^A-Za-z0-9]+/', ' ', $ascii);

        // 3. Convertir a PascalCase
        $pascal = str_replace(' ', '', ucwords(strtolower($clean)));

        // 4. Evitar vacío
        return $pascal ?: 'Default';
    }
}
