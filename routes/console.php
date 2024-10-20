<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::call(function () {
    // Update inactiveDays for records that haven't been updated today
    DB::table('subprojects')
        ->whereDate('updated_at', '<', now()->toDateString()) // Check if updated_at is before today
        ->increment('inactiveDays', 1); // Increment inactiveDays by 1

    Log::info('Inactive days updated for subprojects');
})->dailyAt('16:00'); // Schedule it to run daily
