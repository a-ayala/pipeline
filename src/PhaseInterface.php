<?php

namespace Ayala\Pipeline;

interface PhaseInterface
{
    public function __invoke(mixed $subject): mixed;
}
