<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HealthController;


Route::get('/health', [HealthController::class, 'index']); // simple health check

Route::get('/tickets', [TicketController::class, 'index']); // list ticket types / purchases
Route::post('/tickets', [TicketController::class, 'store']); // create a ticket (store order)
Route::get('/tickets/{id}', [TicketController::class, 'show']);


/*Route::get('/', function () {
    return response()->json([
        'message' => 'MunichTech Expo 2026 API running 🚀',
        'docs' => '/api/munichexpo',
    ]);
});*/
