<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

function isActive(string $route, string $activeClass = 'active', string $notActiveClass = '')
{
    try {
        return request()->routeIs($route);
    } catch (\Throwable $exception) {
        report($exception);
        return false;
    }
}

function formatDate($date): string
{
    try {
        $date = Carbon::parse($date);
        return $date->format('M, d Y');
    } catch (\Throwable $exception) {
        report($exception);
        return $date;
    }
}


function formatMoney($amount)
{
    if (!$amount) {
        return $amount;
    }
    return '$ ' . $amount . ' EGP';
}

function getFile($file): string
{
    if ($file) {
        return Storage::disk('files')->url($file);
    }
    return '';
}
