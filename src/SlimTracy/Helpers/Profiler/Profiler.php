<?php

declare(strict_types=1);

namespace SlimTracy\Helpers\Profiler;

class Profiler extends AdvancedProfiler
{
    protected static bool $enabled = false;

    /**
     * @var array<Profile>
     */
    protected static array $stack = [];

    /**
     * @var callable
     */
    protected static $postProcessor;

    /**
     * {@inheritdoc}
     */
    public static function enable($realUsage = false): void
    {
        ProfilerService::init();
        parent::enable($realUsage);
    }

    /**
     * {@inheritdoc}
     *
     * @internal
     */
    public static function setPostProcessor(callable $postProcessor): void
    {
        parent::setPostProcessor($postProcessor);
    }
}
