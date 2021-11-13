<?php

namespace Ayala\Pipeline;

use Throwable;

class StopOnExceptionHandler implements PhaseHandlerInterface
{
    public function handle(mixed $subject, callable ...$phases): mixed
    {
        foreach ($phases as $phase) {
            try {
                $subject = $phase($subject);
            } catch (Throwable $exception) {
                break;
            }
        }
        return $subject;
    }
}
