<?php

namespace Tesis\LaravelParseUserAgent\Services;

use Tesis\LaravelParseUserAgent\Contracts\BrowserParserInterface;
use Tesis\LaravelParseUserAgent\Enums\Browsers;

class BrowserParser implements BrowserParserInterface
{
    public function getBrowserInfo(string $userAgent): array
    {
        $browser = 'Unknown';
        $browserVersion = 'Unknown';

        foreach (Browsers::cases() as $browserEnum) {
            $pattern = '/' . $browserEnum->getPattern() . '[\/\s]?([\d\.]*)/';
            if (preg_match($pattern, $userAgent, $matches)) {
                $browser = $browserEnum->value;
                $browserVersion = isset($matches[1]) && $matches[1] !== '' ? $matches[1] : 'Unknown';
                break;
            }
        }

        return [$browser, $browserVersion];
    }
}

