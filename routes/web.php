<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware("guest")->group(function(){
    Route::view("login", "guest.login")->name("login");
    Route::view("register", "guest.register")->name("register");

    Route::post("register", [UserController::class, "register"])->name("user.register");
    Route::post("authenticate", [AuthController::class, "authenticate"])->name("authenticate");
});

Route::middleware("auth")->group(function(){
    Route::post("logout", [AuthController::class, "logout"])->name("logout");

    Route::get("/", [ContactController::class, "index"])->name("home");
    Route::post("contacts/{contact}/restore", [ContactController::class, "restore"])->name("contacts.restore");
    Route::resource("contacts", ContactController::class)->names("contacts")->except("index");
});