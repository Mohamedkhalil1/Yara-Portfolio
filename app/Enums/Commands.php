<?php


namespace App\Enums;


class Commands extends BaseEnum
{
    const CONFIG = 1;
    const CACHE = 2;
    const VIEW = 3;

    protected static function labels(): array
    {
        return [
            self::CONFIG => __('Config'),
            self::CACHE  => __('Cache'),
            self::VIEW   => __('View'),
        ];
    }

    public static function getCommand($status): string
    {
        switch ($status) {
            case self::CONFIG:
                return 'config:cache';
            case self::CACHE:
                return 'cache:clear';
            case self::VIEW:
                return 'view:clear';
            default:
                return '';
        }
    }
}
