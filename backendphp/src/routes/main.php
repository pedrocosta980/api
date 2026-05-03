<?php

use App\Http\Route;

Route::get("/api/v1/medico", "MedicoController@index");
Route::get("/api/v1/medico/{id}", "MedicoController@show");
Route::post("/api/v1/medico", "MedicoController@create");
Route::put("/api/v1/medico/{id}", "MedicoController@update");
Route::delete("/api/v1/medico/{id}", "MedicoController@destroy");