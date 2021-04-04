<?php

// Route::get('csat', function(){
// 	echo 'Hello from the csat package!';
// });

// Route::get('add/{a}/{b}', 'Rlc\Csat\CsatController@add');
// Route::get('subtract/{a}/{b}', 'Rlc\Csat\CsatController@subtract');

Route::get('csat', 'Rlc\Csat\Controllers\CsatController@index');

Route::post('csat/submit', 'Rlc\Csat\Controllers\CsatController@store');