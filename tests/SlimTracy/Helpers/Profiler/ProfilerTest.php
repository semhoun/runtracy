<?php

namespace Tests\SlimTracy\Helpers\Profiler;

use Tests\BaseTestCase;
use SlimTracy\Helpers\Profiler\Profiler;
use SlimTracy\Helpers\Profiler\ProfilerService;

/**
 * @runTestsInSeparateProcesses
 * Class ProfilerTest
 * @package Tests\SlimTracy\Helpers\Profiler
 */
class ProfilerTest extends BaseTestCase
{
    /**
     * @runTestsInSeparateProcesses
     */
    public function testEnableCallsProfilerServiceInit()
    {
        Profiler::enable();

        Profiler::start();
        Profiler::finish();

        /** @noinspection PhpInternalEntityUsedInspection */
        $this->assertCount(1, ProfilerService::getInstance()->getProfiles());
        /** @noinspection PhpInternalEntityUsedInspection */
        $this->assertTrue(ProfilerService::hasInstance());
    }

    public function testProfilerPanel()
    {
        $panel = new \SlimTracy\Helpers\ProfilerPanel($this->cfg['settings']['tracy']['configs']['ProfilerPanel']);
        $this->assertInstanceOf('\Tracy\IBarPanel', $panel);

        // test Tracy tab
        $this->assertRegexp('#Profiler info#', $panel->getTab());
        // without SlimTracy config 'Profiling is disabled' by default
        $this->assertRegexp('#Profiling is disabled#', $panel->getPanel());
    }
}
