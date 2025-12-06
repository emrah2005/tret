<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\DeliverableController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MatchingController;

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me',     [AuthController::class, 'me']);
    Route::post('/logout',[AuthController::class, 'logout']);

    Route::apiResource('campaigns', CampaignController::class)
        ->only(['index', 'store', 'show']);

    Route::post('/campaigns/{campaign}/offers', [OfferController::class, 'store']);
    Route::post('/offers/{offer}/accept',       [OfferController::class, 'accept']);

    Route::post('/deliverables/submit', [DeliverableController::class, 'submit']);
    Route::post('/deliverables/{id}/approve', [DeliverableController::class, 'approve']);

    Route::post('/threads/{thread}/messages', [MessageController::class, 'send']);
    Route::get('/threads/{thread}/messages',  [MessageController::class, 'threadMessages']);

    Route::get('/campaigns/{id}/match', [MatchingController::class, 'matchCampaign']);
});

