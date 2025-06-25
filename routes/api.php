<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaUploadController;

Route::post('/upload', [MediaUploadController::class, 'store']);
