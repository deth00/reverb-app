<?php

use Illuminate\Support\Facades\Route;


Route::get('/', App\Livewire\Auth\LoginComponent::class)->name('login');
Route::get('/live-score/{id}', App\Livewire\Backend\Score\LiveScoreComponent::class)->name('live-score');

Route::group(['middleware'=> 'auth'], function(){
    Route::get('/dashboards', App\Livewire\Backend\DashboardComponent::class)->name('dashboards');

    Route::get('/subjects', App\Livewire\Backend\Subject\SubjectComponent::class)->name('subjects');
    Route::get('/registeds/{id}', App\Livewire\Backend\Registed\RegistedComponent::class)->name('registeds');
    Route::get('/view-score/{id}', App\Livewire\Backend\Score\ViewScoreComponent::class)->name('view-score');
    Route::get('/view/{id}', App\Livewire\Backend\Score\ViewComponent::class)->name('view');

    Route::get('/history/{id}', App\Livewire\Backend\History\HistoryComponent::class)->name('history');

    Route::get('/download-bill/{id}',[App\Livewire\Export\ExportScoreComponent::class,'export_bill'])->name('download-bill');
    Route::get('/download/{id}',[App\Livewire\Export\ExportScoreComponent::class,'export'])->name('download');

    Route::get('/logout', App\Livewire\Auth\LoginComponent::class,'logout')->name('logout');
});
