# LaravelUserAgentParser

A Laravel package for parsing user-agent strings to identify device type, operating system, and browser details.

## Features

- Identifies operating system (OS) from the user-agent string.
- Identifies the browser and its version.
- Determines the device type (Desktop, Mobile, Tablet).

## Installation

You can install the package via Composer:

```bash
composer require tesis/laravel-user-agent-parser
```

## Configuration

If you're using Laravel 5.5 or later, the service provider will automatically be registered. For earlier versions, you'll need to add the service provider manually.

Add the service provider to the `providers` array in `config/app.php`:

```php
'providers' => [
    // Other service providers...
    Tesis\LaravelUserAgentParser\Providers\UserAgentParserServiceProvider::class,
],
```

## Usage

### Parsing User-Agent Strings

You can use the `LaravelUserAgentParser` service to parse a user-agent string and get details about the device, OS, and browser.

### Handling Requests in a Controller

You can integrate the parser directly into your Laravel controllers to handle HTTP requests:

```php
use Illuminate\Http\Request;
use Tesis\LaravelUserAgentParser\Services\UserAgentParser;

class UserAgentController extends Controller
{
    protected UserAgentParser $userAgentParser;

    public function __construct(UserAgentParser $userAgentParser)
    {
        $this->userAgentParser = $userAgentParser;
    }

    public function index()
    {
        $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3';
        $parsedData = $this->userAgentParser->parse($userAgent);

        return response()->json($parsedData);
    }
}
```

### Testing

To ensure everything is working correctly, you can run the package's tests using PHPUnit.

First install Orchestra
```bash
composer require --dev orchestra/testbench:"^7.0" --with-all-dependencies
```

then install phpunit on top of it (later version seems not to be working):
```bash
composer require --dev phpunit/phpunit
```

```bash
vendor/bin/phpunit
```

As we are building a Laravel package, the first thing we will need is Laravels Support package, so install that using the following composer command:

```bash
composer require illuminate/support
```
> Note: only add it after installing orchestra and phpunit with particular version, otherwise it will be the last version and orchestra and phpunit might have conflicts.

and then in tests you can use it:
```php
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
abstract class TestCase extends BaseTestCase
{
    //
}
```

### Feature Tests

If your package includes HTTP endpoints, you can test them using feature tests.

```php
public function testUserAgentParsingEndpoint()
{
    $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3';

    $response = $this->postJson('/parse-user-agent', [
        'user_agent' => $userAgent,
    ]);

    $response->assertStatus(200)
             ->assertJson([
                 'device_type' => 'Desktop',
                 'os' => 'Windows',
                 'browser' => 'Chrome',
                 'browser_version' => '58.0.3029.110',
             ]);
}
```
### Static analysis with PHPStan

```bash
composer require --dev phpstan/phpstan
```

Add phpstan.neon:

```neon
parameters:
    level: 9

    paths:
        - src
```

and run:
```bash
./vendor/bin/phpstan analyse
```

## Contributing

Contributions are welcome! Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you discover a security vulnerability within this package, please send an email to [your-email@example.com](mailto:tereza@tesispro.eu). All security vulnerabilities will be promptly addressed.

## License

This package is open-sourced software licensed under the [MIT license](LICENSE.md).