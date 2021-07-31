<?php


namespace App\Enums;


class Composer extends BaseEnum
{
    const INSTALL = 1;
    const UPDATE = 2;
    const AUTO_LOADED = 3;

    protected static function labels(): array
    {
        return [
            self::INSTALL => __('Install'),
            self::UPDATE  => __('Update'),
            self::AUTO_LOADED   => __('Auto Loaded'),
        ];
    }

    public static function getCommand($status): string
    {
        switch ($status) {
            case self::INSTALL:
                return 'composer install';
            case self::UPDATE:
                return 'composer update';
            case self::AUTO_LOADED:
                return 'composer dump-autoload';
            default:
                return '';
        }
    }
}
