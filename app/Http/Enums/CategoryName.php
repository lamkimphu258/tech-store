<?php

namespace App\Http\Enums;

class CategoryName
{
    public const SMARTPHONE = 'smartphone';
    public const TABLET = 'tablet';
    public const LAPTOP = 'laptop';
    public const PC = 'pc';
    public const ACCESSORY = 'accessory';

    public const SMARTPHONES = 'smartphones';
    public const TABLETS = 'tablets';
    public const LAPTOPS = 'laptops';
    public const PCS = 'pcs';
    public const ACCESSORIES = 'accessories';

    public static function all(): array
    {
        return [
            self::SMARTPHONE,
            self::TABLET,
            self::LAPTOP,
            self::PC,
            self::ACCESSORY,
        ];
    }

    public static function plural(string $name): string
    {
        $plurals = [
            self::SMARTPHONE => self::SMARTPHONES,
            self::TABLET => self::TABLETS,
            self::LAPTOP => self::LAPTOPS,
            self::PC => self::PCS,
            self::ACCESSORY => self::ACCESSORIES,
        ];

        return $plurals[$name];
    }
}
