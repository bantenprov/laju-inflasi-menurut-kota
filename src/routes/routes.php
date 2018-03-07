<?php

Route::group(['prefix' => 'api/laju-inflasi-kota', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\LajuInflasiKota\Http\Controllers\LajuInflasiKotaController@index',
        'create'    => 'Bantenprov\LajuInflasiKota\Http\Controllers\LajuInflasiKotaController@create',
        'show'      => 'Bantenprov\LajuInflasiKota\Http\Controllers\LajuInflasiKotaController@show',
        'store'     => 'Bantenprov\LajuInflasiKota\Http\Controllers\LajuInflasiKotaController@store',
        'edit'      => 'Bantenprov\LajuInflasiKota\Http\Controllers\LajuInflasiKotaController@edit',
        'update'    => 'Bantenprov\LajuInflasiKota\Http\Controllers\LajuInflasiKotaController@update',
        'destroy'   => 'Bantenprov\LajuInflasiKota\Http\Controllers\LajuInflasiKotaController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('laju-inflasi-kota.index');
    Route::get('/create',       $controllers->create)->name('laju-inflasi-kota.create');
    Route::get('/{id}',         $controllers->show)->name('laju-inflasi-kota.show');
    Route::post('/',            $controllers->store)->name('laju-inflasi-kota.store');
    Route::get('/{id}/edit',    $controllers->edit)->name('laju-inflasi-kota.edit');
    Route::put('/{id}',         $controllers->update)->name('laju-inflasi-kota.update');
    Route::delete('/{id}',      $controllers->destroy)->name('laju-inflasi-kota.destroy');
});
