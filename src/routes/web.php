<?php

Route::group(['namespace' => 'Murugan\Todo\Http\Controllers'], function(){
    Route::get('todo', 'TaskController@index')->name('task');
    Route::post('todo', 'TaskController@store')->name('task.store');
    Route::delete('todo_delete/{id}','TaskController@destroy')->name('task.destroy');
});
