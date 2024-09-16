<?php

namespace Tesis\LaravelParseUserAgent\Tests\Unit;

use Tesis\LaravelParseUserAgent\Services\UserAgentParser;
use Tesis\LaravelParseUserAgent\Contracts\OperatingSystemParserInterface;
use Tesis\LaravelParseUserAgent\Contracts\BrowserParserInterface;
use Tesis\LaravelParseUserAgent\Contracts\DeviceTypeParserInterface;
use Tesis\LaravelParseUserAgent\Tests\TestCase;

class UserAgentParserTest extends TestCase
{
    protected UserAgentParser $parser;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_can_parse()
    {
        $osParserMock = $this->createMock(OperatingSystemParserInterface::class);
        $browserParserMock = $this->createMock(BrowserParserInterface::class);
        $deviceTypeParserMock = $this->createMock(DeviceTypeParserInterface::class);

        $osParserMock->method('getOS')->willReturn('Windows');
        $browserParserMock->method('getBrowserInfo')->willReturn(['Chrome', '90.0']);
        $deviceTypeParserMock->method('getDeviceType')->willReturn('Desktop');

        $userAgentParser = new UserAgentParser($osParserMock, $browserParserMock, $deviceTypeParserMock);

        $result = $userAgentParser->parse('Some user agent string');

        $this->assertEquals('Windows', $result['os']);
        $this->assertEquals('Chrome', $result['browser']);
        $this->assertEquals('90.0', $result['browser_version']);
        $this->assertEquals('Desktop', $result['device_type']);
    }
}
