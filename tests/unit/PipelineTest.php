<?php

namespace Tests;

use Ayala\Pipeline\PhaseInterface;
use Ayala\Pipeline\Pipeline;
use PHPUnit\Framework\TestCase;

class PipelineTest extends TestCase
{
    public function testItInstantiates()
    {
        $pipeline = new Pipeline;

        $this->assertInstanceOf(Pipeline::class, $pipeline);
    }

    public function testPipeResultIsNewInstance()
    {
        $pipeline = new Pipeline;

        $after = $pipeline->pipe(fn() => true);

        $this->assertNotEquals($pipeline, $after);
    }

    public function testItExecutesPipeLine()
    {
        $phase = new class () implements PhaseInterface {
            public function __invoke(mixed $subject): mixed
            {
                return ($subject - 1);
            }
        };

        $result = (new Pipeline)
            ->pipe($phase)
            ->handle(2);

        $this->assertEquals(1, $result);
    }
}
