<?php
namespace Tesis\LaravelParseUserAgent\Tests\Feature;

use Tesis\LaravelParseUserAgent\Tests\TestCase;
use Tesis\LaravelParseUserAgent\Services\UserAgentParser;
use Tesis\LaravelParseUserAgent\Services\OperatingSystemParser;
use Tesis\LaravelParseUserAgent\Services\BrowserParser;
use Tesis\LaravelParseUserAgent\Services\DeviceTypeParser;

class UserAgentParserTest extends TestCase
{
    /** @test */
    public function it_can_parse_user_agent()
    {
        $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3';

        // Create real services (full integration)
        $osParser = new OperatingSystemParser();
        $browserParser = new BrowserParser();
        $deviceTypeParser = new DeviceTypeParser();

        // Create the main UserAgentParser and inject dependencies
        $userAgentParser = new UserAgentParser($osParser, $browserParser, $deviceTypeParser);

        // Parse user agent
        $parsed = $userAgentParser->parse($userAgent);

        $this->assertEquals('Desktop', $parsed['device_type']);
        $this->assertEquals('Windows', $parsed['os']);
        $this->assertEquals('Chrome', $parsed['browser']);
        $this->assertEquals('58.0.3029.110', $parsed['browser_version']);
    }
}
