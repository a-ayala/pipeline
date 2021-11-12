<?php

namespace Ayala\Pipeline;

class DefaultHandler implements PhaseHandlerInterface
{
    public function handle(mixed $subject, callable ...$phases): mixed
    {
        foreach ($phases as $phase) {
            $subject = $phase($subject);
        }
        return $subject;
    }
}
