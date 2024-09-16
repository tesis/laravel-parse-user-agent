<?php
namespace Tesis\LaravelParseUserAgent\Tests\Feature;

use Tesis\LaravelParseUserAgent\Tests\TestCase;
use Tesis\LaravelParseUserAgent\Services\DeviceTypeParser;

class DeviceTypeParserTest extends TestCase
{
    /** @test */
    public function it_can_parse_device_type()
    {
        $deviceTypeParser = new DeviceTypeParser();

        $userAgentMobile = 'Mozilla/5.0 (Linux; Android 10; SM-G970F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36';
        $userAgentDesktop = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3';
        $userAgentTablet = 'Mozilla/5.0 (iPad; CPU OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0 Safari/605.1.15';
        $userAgentIpadSafari = 'Mozilla/5.0 (iPad; CPU OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0 Safari/605.1.15';
        $userAganetIpadChrome = 'Mozilla/5.0 (iPad; CPU OS 12_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/77.0.3865.103 Mobile/15E148 Safari/605.1';
        $userAganetAndroidSamsungGalaxyChromeTabS4 = 'Mozilla/5.0 (Linux; Android 9; SM-T835) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36';
        $userAganetAndroidSamsungGalaxyChromeTabA = 'Mozilla/5.0 (Linux; Android 8.1.0; SM-T380) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.137 Safari/537.36';
        $userAganetAndroidGoogleNexus = 'Mozilla/5.0 (Linux; Android 8.1.0; SM-T380) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.137 Safari/537.36';

        $this->assertEquals('Mobile', $deviceTypeParser->getDeviceType($userAgentMobile));
        $this->assertEquals('Desktop', $deviceTypeParser->getDeviceType($userAgentDesktop));
        $this->assertEquals('Tablet', $deviceTypeParser->getDeviceType($userAgentTablet));
        $this->assertEquals('Tablet', $deviceTypeParser->getDeviceType($userAgentIpadSafari));
        $this->assertEquals('Tablet', $deviceTypeParser->getDeviceType($userAganetIpadChrome));
        $this->assertEquals('Tablet', $deviceTypeParser->getDeviceType($userAganetAndroidSamsungGalaxyChromeTabS4));
        $this->assertEquals('Tablet', $deviceTypeParser->getDeviceType($userAganetAndroidSamsungGalaxyChromeTabA));
        $this->assertEquals('Tablet', $deviceTypeParser->getDeviceType($userAganetAndroidGoogleNexus));
    }

    /** @test */
    public function it_can_parse_unknown_device_type()
    {
        $unknownUA = 'SomeUnknownUserAgent/1.0';

        $deviceTypeParser = new DeviceTypeParser();

        $this->assertEquals('Desktop', $deviceTypeParser->getDeviceType($unknownUA));
    }
}