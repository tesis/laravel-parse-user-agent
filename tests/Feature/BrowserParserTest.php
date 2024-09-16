<?php
namespace Tesis\LaravelParseUserAgent\Tests\Feature;

use Tesis\LaravelParseUserAgent\Tests\TestCase;
use Tesis\LaravelParseUserAgent\Services\BrowserParser;

class BrowserParserTest extends TestCase
{
    /** @test */
    public function it_can_get_browser_info()
    {
        $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3';

        $browserParser = new BrowserParser();

        list($browser, $version) = $browserParser->getBrowserInfo($userAgent);

        $this->assertEquals('Chrome', $browser);
        $this->assertEquals('58.0.3029.110', $version);
    }

    /** @test */
    public function it_can_get_unknown_browser()
    {
        $userAgent = 'SomeUnknownUserAgent/1.0';

        $browserParser = new BrowserParser();

        list($browser, $version) = $browserParser->getBrowserInfo($userAgent);

        $this->assertEquals('Unknown', $browser);
        $this->assertEquals('Unknown', $version);
    }
}
