<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LeadController::class, 'index']);
Route::post('/submit', [LeadController::class, 'store'])->name('lead.store');
