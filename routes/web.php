<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware("guest")->group(function(){
    Route::view("login", "login")->name("login");
    
    Route::post("authenticate", [AuthController::class, "authenticate"])->name("authenticate");
});

Route::middleware("auth")->group(function(){
    Route::get("/", function(){
        return view("home");
    });
});