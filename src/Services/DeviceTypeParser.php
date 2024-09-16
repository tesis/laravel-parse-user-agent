<?php

namespace Tesis\LaravelParseUserAgent\Services;

use Tesis\LaravelParseUserAgent\Contracts\DeviceTypeParserInterface;

class DeviceTypeParser implements DeviceTypeParserInterface
{
    public function getDeviceType(string $userAgent): string
    {
        if (strpos($userAgent, 'iPad') !== false) {
            return 'Tablet';
        } elseif (strpos($userAgent, 'Mobile') !== false) {
            return 'Mobile';
        } elseif (strpos($userAgent, 'Tablet') !== false ||
            (strpos($userAgent, 'Android') !== false && strpos($userAgent, 'Mobile') === false)) {
            return 'Tablet';
        } else {
            return 'Desktop';
        }
    }
}

