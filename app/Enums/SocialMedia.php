<?php


namespace App\Enums;


class SocialMedia extends BaseEnum
{
    const BEHANCE = 1;
    const INSTAGRAM = 2;
    const FACEBOOK = 3;
    const TWITTER = 4;
    const YOUTUBE = 5;


    protected static function labels(): array
    {
        return [
            self::BEHANCE   => __('Behance'),
            self::INSTAGRAM => __('Instagram'),
            self::FACEBOOK  => __('Facebook'),
            self::TWITTER   => __('Twitter'),
            self::YOUTUBE   => __('Youtube'),
        ];
    }

    public static function getIcon($title): string
    {
        switch ($title) {
            case self::FACEBOOK:
                return '<i class="fab fa-facebook-f"></i>';
            case self::INSTAGRAM:
                return '<i class="fab fa-instagram"></i>';
            case self::YOUTUBE:
                return '<i class="fab fa-youtube"></i>';
            case self::BEHANCE:
                return '<i class="fab fa-behance-square"></i>';
            case self::TWITTER:
                return '<i class="fab fa-twitter"></i>';
            default:
                return '';
        }
    }
}
