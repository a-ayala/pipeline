<?php

namespace Ayala\Pipeline;

final class Pipeline implements PipelineInterface
{
    /** @var callable[] */
    private array $phases;

    private PhaseHandlerInterface $handler;

    public function __construct(
        PhaseHandlerInterface $handler = null,
        callable ...$phases
    ) {
        $this->handler = $handler ?? new DefaultHandler;
        $this->phases = $phases;
    }

    public function pipe(callable $phase): PipelineInterface
    {
        $pipeline = clone $this;
        $pipeline->phases[] = $phase;

        return $pipeline;
    }

    public function handle(mixed $subject): mixed
    {
        return $this->handler->handle($subject, ...$this->phases);
    }
}
