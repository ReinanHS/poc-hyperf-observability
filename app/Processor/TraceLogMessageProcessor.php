<?php

namespace App\Processor;

use Hyperf\Context\ApplicationContext;
use Hyperf\Context\Context;
use Monolog\LogRecord;
use OpenTracing\Span;
use OpenTracing\Tracer;
use const OpenTracing\Formats\TEXT_MAP;

class TraceLogMessageProcessor
{
    public function __invoke(LogRecord $record): LogRecord
    {
        $root = Context::get('tracer.root');

        if ($root instanceof Span) {
            $context = [];

            $container = ApplicationContext::getContainer();
            $tracer = $container->get(Tracer::class);

            $tracer->inject($root->getContext(), TEXT_MAP, $context);
            $record['extra']['opentracing-context'] = $context;
        }

        return $record;
    }

}