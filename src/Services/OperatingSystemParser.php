<?php

namespace Tesis\LaravelParseUserAgent\Services;

use Tesis\LaravelParseUserAgent\Contracts\OperatingSystemParserInterface;
use Tesis\LaravelParseUserAgent\Enums\OperatingSystem;

class OperatingSystemParser implements OperatingSystemParserInterface
{
    public function getOS(string $userAgent): string
    {
        foreach (OperatingSystem::cases() as $os) {
            foreach ($os->getSubstrings() as $substring) {
                if (str_contains($userAgent, $substring)) {
                    return $os->value;
                }
            }
        }

        return 'Unknown';
    }
}
