<?php

use App\Models\PasswordReset;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('password_reserts:destroy', function(){
    PasswordReset::where('destroy_at', '<=', now()->toDateTimeString())->delete();
})->purpose("Destorys Password_resets that are ready to be destroyed");
