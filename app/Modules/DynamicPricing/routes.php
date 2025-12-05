<?php
Route::post('/lead', [LeadController::class, 'store']);
Route::get('/price', [PriceController::class, 'getPrice']);
