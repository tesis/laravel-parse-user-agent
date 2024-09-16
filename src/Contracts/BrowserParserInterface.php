<?php

namespace Tesis\LaravelParseUserAgent\Contracts;

interface BrowserParserInterface
{
    /**
     * @return array<int, mixed> Browser name and version.
     */
    public function getBrowserInfo(string $userAgent): array;
}

