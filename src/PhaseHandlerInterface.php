<?php

namespace Ayala\Pipeline;

interface PhaseHandlerInterface
{
    public function handle(mixed $subject, callable ...$phases): mixed;
}
