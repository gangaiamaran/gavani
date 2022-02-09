<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Jobs\Checks\SslCheckerJob;
use App\Models\Monitoring\Site;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    SslCheckerJob::dispatch(Site::query()->find(1));
});
