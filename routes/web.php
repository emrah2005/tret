<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfluencerOnboardingController;
use App\Http\Controllers\BusinessOnboardingController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

// INFLUENCER ONBOARDING
Route::prefix('onboarding/influencer')->name('influencer.')->middleware('auth')->group(function () {

    Route::get('/step-1', [InfluencerOnboardingController::class, 'step1'])->name('step1');
    Route::post('/step-1', [InfluencerOnboardingController::class, 'submitStep1'])->name('step1.submit');

    Route::get('/step-2', [InfluencerOnboardingController::class, 'step2'])->name('step2');
    Route::post('/step-2', [InfluencerOnboardingController::class, 'submitStep2'])->name('step2.submit');

    Route::get('/step-3', [InfluencerOnboardingController::class, 'step3'])->name('step3');
    Route::post('/step-3', [InfluencerOnboardingController::class, 'submitStep3'])->name('step3.submit');

    Route::get('/step-4', [InfluencerOnboardingController::class, 'step4'])->name('step4');
    Route::post('/step-4', [InfluencerOnboardingController::class, 'submitStep4'])->name('step4.submit');

    Route::get('/step-5', [InfluencerOnboardingController::class, 'step5'])->name('step5');
    Route::post('/step-5', [InfluencerOnboardingController::class, 'submitStep5'])->name('step5.submit');

    Route::get('/step-6', [InfluencerOnboardingController::class, 'step6'])->name('step6');
});
