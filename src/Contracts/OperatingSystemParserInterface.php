<?php

namespace Tesis\LaravelParseUserAgent\Contracts;

interface OperatingSystemParserInterface
{
    public function getOS(string $userAgent): string;
}
