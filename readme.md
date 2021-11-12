# Pipeline

WIP

## Usage
```php
$result = (new Pipeline)
    ->pipe(fn($subject) => ($subject + 1))
    ->handle(1);
```

### Phase Interface

Instead of passing a callback you can instead implement the `PhaseInterface` and pass it into `pipe` method.

```php
class AddPhase implements PhaseInterface
{
    public function __invoke(mixed $subject): mixed 
    {
        return $subject + 1;
    }
}

$result = (new Pipeline)->pipe(new AddPhase)->handle(1);
```

### Custom Handler

Implement the `HandlerInterface` and inject it into the pipeline constructor.

The `DefaultHandler` will attempt to process each phase without handling any exceptions.

@todo docs

## @todo
- Better docs
- Builder class
- Tests
- More built in handlers
  - i.e. ReverseHandler (process the pipe in reverse)
  - i.e. Stop if subject is "x" handler