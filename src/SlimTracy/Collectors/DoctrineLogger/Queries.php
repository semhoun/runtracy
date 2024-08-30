<?php

declare(strict_types=1);

namespace SlimTracy\Collectors\DoctrineLogger;

use Doctrine\DBAL\ParameterType;

final class Queries
{
    private array $queries = [];

    /**
     * Logs a SQL statement somewhere.
     *
     * @param string $sql SQL statement
     * @param list<mixed>|array<string, mixed>|null $params Statement parameters
     * @param ?array<ParameterType> $types
     */
    public function addQuery(
        float $duration,
        string $sql,
        ?array $params = null,
        ?array $types = null
    ): void {
        $this->queries[] = [
            'sql' => $sql,
            'params' => $params,
            'types' => $types,
            'executionMS' => $duration,
        ];
    }

    public function getQueries(): array
    {
        return $this->queries;
    }
}
