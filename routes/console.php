<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::call(function () {
    $lastRunDate = Cache::get('last_inactive_incremented');

    if ($lastRunDate !== now()->toDateString()) {
        DB::table('subprojects')
            ->whereDate('updated_at', '<', now()->toDateString())
            ->increment('inactiveDays', 1);

        Log::info('Inactive days updated for subprojects');

        // Update the last run date
        Cache::put('last_inactive_incremented', now()->toDateString());
    }
})->everyMinute();

