<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Public Candidate Routes
Route::get('/', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/candidature', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/candidature/confirmation/{reference}', [ApplicationController::class, 'confirmation'])->name('applications.confirmation');

// Admin Authentication Routes
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Protected Admin Dashboard & Consultation Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', fn() => redirect()->route('admin.applications.index'));
    Route::get('/applications', [AdminApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/export-csv', [AdminApplicationController::class, 'exportCsv'])->name('applications.export-csv');
    Route::get('/applications/{application}', [AdminApplicationController::class, 'show'])->name('applications.show');
    Route::get('/attachments/{attachment}/download', [AdminApplicationController::class, 'downloadAttachment'])->name('attachments.download');
});
