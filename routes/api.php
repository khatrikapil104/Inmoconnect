<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AgentLeadController;
use App\Http\Controllers\Api\XmlFeedController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/xml-feeds', [XmlFeedController::class, 'generateXml'])->name('api.xml.generate');
Route::get('/xml-feed/imports', [XmlFeedController::class, 'importXml'])->name('api.xml.import');

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('store-agent-lead-details',[AgentLeadController::class, 'storeAgentLeadDetails']);
    // Route::get('xml-feed',[XmlFeedController::class, 'generateXml']);
    Route::get('/xml-feed', [XmlFeedController::class, 'Xmlfeeds']);
});



// Passport::routes();
