<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware("guest")->group(function(){
    Route::view("login", "login")->name("login");
    Route::view("register", "register")->name("register");

    Route::post("register", [UserController::class, "register"])->name("user.register");
    Route::post("authenticate", [AuthController::class, "authenticate"])->name("authenticate");
});

Route::middleware("auth")->group(function(){
    Route::post("logout", [AuthController::class, "logout"])->name("logout");

    Route::get("/", function(){
        return view("home");
    })->name("home");
});