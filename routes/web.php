<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware("guest")->group(function(){
    Route::view("login", "guest.login")->name("login");
    Route::view("register", "guest.register")->name("register");

    Route::post("register", [UserController::class, "register"])->name("user.register");
    Route::post("authenticate", [AuthController::class, "authenticate"])->name("authenticate");

    Route::view("forgot_password", "guest.forgot-password")->name("forgot_password");
    Route::post("password-request", [PasswordResetController::class, 'password_request'])->name('password.request');
    Route::get('password-reset/{token}', [PasswordResetController::class, 'password_reset'])->name('password.reset');
    Route::put("password-update", [PasswordResetController::class, 'password_update'])->name('password.update');
});

Route::middleware("auth")->group(function(){
    Route::post("logout", [AuthController::class, "logout"])->name("logout");

    Route::get("/", [ContactController::class, "index"])->name("home");
    Route::post("contacts/{contact}/restore", [ContactController::class, "restore"])->name("contacts.restore");
    Route::get("contacts/export", [ContactController::class, "export_csv"])->name("contacts.export");
    Route::resource("contacts", ContactController::class)->names("contacts")->except(["index", "create", "edit"]);
});