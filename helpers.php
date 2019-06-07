<?php

use App\Setting;
use Illuminate\Support\Facades\Cache;

function getSetting($key) {
    return Cache::get('settings.' . $key, function () use ($key) {
        return Setting::query()
            ->where('key', $key)
            ->first()->toArray()['value'];
    });
}
