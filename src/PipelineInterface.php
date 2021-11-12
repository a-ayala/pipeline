<?php

namespace Ayala\Pipeline;

interface PipelineInterface
{
    public function pipe(callable $phase): PipelineInterface;

    public function handle(mixed $subject);
}
