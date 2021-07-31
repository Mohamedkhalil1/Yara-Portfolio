<?php


namespace App\Enums;


class SocialStatus extends BaseEnum
{
    const Single = 1;
    const Married = 2;

    protected static function labels(): array
    {
        return [
            self::Single  => __('Single'),
            self::Married => __('Married'),
        ];
    }
}
