<?php

namespace Admilabs\PhpstanIsolation\Plugin;

use Psalm\Plugin\EventHandler\AfterFileAnalysisInterface;
use Psalm\Plugin\EventHandler\Event\AfterFileAnalysisEvent;

class PsalmPlugin implements AfterFileAnalysisInterface
{
    public static function afterAnalyzeFile(AfterFileAnalysisEvent $event): void
    {
        xdebug_break();
    }
}
