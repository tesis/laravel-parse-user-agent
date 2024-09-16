<?php

namespace Tesis\LaravelParseUserAgent\Enums;

enum OperatingSystem: string
{
    case WINDOWS = 'Windows';
    case MAC_OS = 'Mac OS';
    case IOS = 'iOS';
    case ANDROID = 'Android';
    case LINUX = 'Linux';
    case UNIX = 'UNIX';
    case BLACKBERRY = 'BlackBerry';
    case WINDOWS_PHONE = 'Windows Phone';
    case SYMBIAN = 'Symbian';
    case WEBOS = 'webOS';
    case CHROME_OS = 'Chrome OS';
    case TIZEN = 'Tizen';
    case FIRE_OS = 'Fire OS';
    case FREEBSD = 'FreeBSD';
    case NETBSD = 'NetBSD';
    case OPENBSD = 'OpenBSD';
    case SOLARIS = 'Solaris';
    case AIX = 'AIX';
    case HP_UX = 'HP-UX';
    case BEOS = 'BeOS';
    case QNX = 'QNX';
    case OS2 = 'OS/2';

    /**
     * For phpstan, define exact
     * @return array<int, string>
     */
    public function getSubstrings(): array
    {
        return match ($this) {
            self::WINDOWS => ['Windows NT'],
            self::MAC_OS => ['Macintosh', 'Mac OS X'],
            self::IOS => ['iPhone', 'iPad', 'iPod'],
            self::ANDROID => ['Android'],
            self::LINUX => ['Linux'],
            self::UNIX => ['UNIX'],
            self::BLACKBERRY => ['BlackBerry'],
            self::WINDOWS_PHONE => ['Windows Phone'],
            self::SYMBIAN => ['Symbian'],
            self::WEBOS => ['webOS'],
            self::CHROME_OS => ['CrOS'],
            self::TIZEN => ['Tizen'],
            self::FIRE_OS => ['Fire OS'],
            self::FREEBSD => ['FreeBSD'],
            self::NETBSD => ['NetBSD'],
            self::OPENBSD => ['OpenBSD'],
            self::SOLARIS => ['Solaris'],
            self::AIX => ['AIX'],
            self::HP_UX => ['HP-UX'],
            self::BEOS => ['BeOS'],
            self::QNX => ['QNX'],
            self::OS2 => ['OS/2'],
        };
    }
}

