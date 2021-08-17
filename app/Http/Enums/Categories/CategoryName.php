<?php

namespace App\Http\Enums\Categories;

class CategoryName
{
    public const SMARTPHONE = 'smartphone';
    public const TABLET = 'tablet';
    public const LAPTOP = 'laptop';
    public const PC = 'PC';
    public const ACCESSORY = 'accessory';

    public const SMARTPHONES = 'smartphones';
    public const TABLETS = 'tablets';
    public const LAPTOPS = 'laptops';
    public const PCS = 'PCs';
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
        $plural = [
            self::SMARTPHONE => self::SMARTPHONES,
            self::TABLET => self::TABLETS,
            self::LAPTOP => self::LAPTOPS,
            self::PC => self::PCS,
            self::ACCESSORY => self::ACCESSORIES,
        ];

        return $plural[$name];
    }

    public static function singular(string $name): string
    {
        $singular = [
            self::SMARTPHONES => self::SMARTPHONE,
            self::TABLETS => self::TABLET,
            self::LAPTOPS => self::LAPTOP,
            self::PCS => self::PC,
            self::ACCESSORIES => self::ACCESSORY,
        ];

        return $singular[$name];
    }
}
