<?php


namespace App\Enums;


class Commands extends BaseEnum
{
    const CONFIG = 1;
    const CACHE = 2;
    const VIEW = 3;
    const KEY = 4;
    const STORAGE_LINK = 5;

    protected static function labels(): array
    {
        return [
            self::CONFIG       => __('Config'),
            self::CACHE        => __('Cache'),
            self::VIEW         => __('View'),
            self::KEY          => __('Generate Key'),
            self::STORAGE_LINK => __('Storage Link'),

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
            case self::KEY:
                return 'key:generate';
            case self::STORAGE_LINK:
                return 'storage:link';
            default:
                return '';
        }
    }
}
