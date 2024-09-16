<?php
namespace Tesis\LaravelParseUserAgent\Tests\Feature;

use Tesis\LaravelParseUserAgent\Tests\TestCase;
use Tesis\LaravelParseUserAgent\Services\OperatingSystemParser;

class OperatingSystemParserTest extends TestCase
{
    /** @test */
    public function it_can_parse_operating_system()
    {
        $osParser = new OperatingSystemParser();

        $windowsUA = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3';
        $iosUA = 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0 Mobile/15E148 Safari/604.1';
        $androidUA = 'Mozilla/5.0 (Linux; Android 9; SM-G960F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.136 Mobile Safari/537.36';

        $this->assertEquals('Windows', $osParser->getOS($windowsUA));
        $this->assertEquals('Mac OS', $osParser->getOS($iosUA));
        $this->assertEquals('Android', $osParser->getOS($androidUA));
    }

    /** @test */
    public function it_can_detect_unknown_operating_system()
    {
        $unknownUA = 'SomeUnknownUserAgent/1.0';

        $osParser = new OperatingSystemParser();

        $this->assertEquals('Unknown', $osParser->getOS($unknownUA));
    }
}