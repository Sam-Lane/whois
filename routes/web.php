<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/whois', function (Request $request) {
    $host = $request->query('host', '');
    $whois = shell_exec("whois " . $host);
    $whois = explode("\n", $whois);
    return view('display', [
        'host' => $host,
        'whois' => $whois
        ]);
});