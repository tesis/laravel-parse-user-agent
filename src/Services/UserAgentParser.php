<?php

namespace Tesis\LaravelParseUserAgent\Services;

use Tesis\LaravelParseUserAgent\Contracts\DeviceTypeParserInterface;
use Tesis\LaravelParseUserAgent\Contracts\OperatingSystemParserInterface;
use Tesis\LaravelParseUserAgent\Contracts\BrowserParserInterface;

class UserAgentParser
{
    private OperatingSystemParserInterface $osParser;
    private BrowserParserInterface $browserParser;
    private DeviceTypeParserInterface $deviceTypeParser;

    public function __construct(
        OperatingSystemParserInterface $osParser,
        BrowserParserInterface $browserParser,
        DeviceTypeParserInterface $deviceTypeParser
    ) {
        $this->osParser = $osParser;
        $this->browserParser = $browserParser;
        $this->deviceTypeParser = $deviceTypeParser;
    }

    /**
     * @see: https://phpstan.org/blog/solving-phpstan-no-value-type-specified
     * -in-iterable-type
     * @return array<string, mixed>
     */
    public function parse(string $userAgent): array
    {
        return [
            'device_type' => $this->deviceTypeParser->getDeviceType($userAgent),
            'os' => $this->osParser->getOS($userAgent),
            'browser' => $this->browserParser->getBrowserInfo($userAgent)[0],
            'browser_version' => $this->browserParser->getBrowserInfo($userAgent)[1],
        ];
    }
}

