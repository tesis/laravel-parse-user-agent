<?php

namespace Tesis\LaravelParseUserAgent\Contracts;

interface DeviceTypeParserInterface
{
    public function getDeviceType(string $userAgent): string;
}

