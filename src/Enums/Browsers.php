<?php

namespace Tesis\LaravelParseUserAgent\Enums;

enum Browsers: string {
    case EDGE = 'Edge';
    case CHROME = 'Chrome';
    case SAFARI = 'Safari';
    case FIREFOX = 'Firefox';
    case OPERA = 'Opera|OPR';
    case INTERNET_EXPLORER = 'MSIE|Trident';
    case BRAVE = 'Brave';
    case VIVALDI = 'Vivaldi';
    case YANDEX = 'YaBrowser';
    case UC_BROWSER = 'UCBrowser';
    case SAMSUNG_INTERNET = 'SamsungBrowser';
    case QQ_BROWSER = 'QQBrowser';
    case BAIDU_BROWSER = 'Baidu';
    case PALE_MOON = 'PaleMoon';
    case SEAMONKEY = 'SeaMonkey';
    case MAXTHON = 'Maxthon';
    case TOR_BROWSER = 'TorBrowser';
    case SLEIPNIR = 'Sleipnir';
    case LUNASCAPE = 'Lunascape';
    case AVANT_BROWSER = 'Avant Browser';
    case COMODO_DRAGON = 'Comodo_Dragon';
    case EPIC_PRIVACY_BROWSER = 'Epic';
    case SRWARE_IRON = 'Iron';
    case FALKON = 'Falkon';
    case WATERFOX = 'Waterfox';
    case MIDORI = 'Midori';
    case K_MELEON = 'K-Meleon';

    public function getPattern(): string {
        return $this->value;
    }
}

