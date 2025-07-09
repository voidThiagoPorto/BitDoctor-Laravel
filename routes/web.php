<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PedidoController;
use \App\Http\Controllers\ListaController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserActionsController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isUser;
use \App\Http\Controllers\AdminActionsController;

// isAdmin::class middleware pra bloquear acesso a usuarios
// isUser::class middleware pra bloquear acesso a admins

Route::get('/', function () {
    return view('index');
})->name("index");


//pedidos table control pra usuario? 😶

Route::middleware(["auth", isUser::class])->group(function () {
   Route::get('/pedido', [PedidoController::class, 'create'])->name("pedido.create");
   Route::post("/pedido", [PedidoController::class, 'store'])->name("pedido.store");
   Route::get("/myList", [ListaController::class, "userShow"])->name("list.user");
   Route::get("/userEdit/{id}", [UserActionsController::class, "create"])->name("user.edit");
   Route::post("/userUpdate/{id}", [UserActionsController::class, "store"])->name("user.update");
   Route::get("/cancel/{id}", [UserActionsController::class, "cancel"])->name("user.cancel");
});

//admin middleware controlled routes

Route::middleware(["auth", isAdmin::class])->group(function (){
    Route::get('/users-list', [AdminActionsController::class, "viewUsers"])->name("admin.users");
    Route::get('/users-delete/{id}', [AdminActionsController::class, "deleteUsers"])->name("delete.users");
    Route::get("/pedidos-list/{id}", [AdminActionsController::class, "viewRequests"])->name("requests-viewId");
    Route::get("/delete-request/{id}", [AdminActionsController::class, "deleteRequests"])->name("delete.requests");
    Route::get("/edit-request/{id}", [AdminActionsController::class, "editRequests"])->name("edit.requests");
    Route::post("/update-request/{id}", [AdminActionsController::class, "updateRequests"])->name("update.requests");
    Route::get("/status-request/{id}/{pageId?}", [AdminActionsController::class, "nextStatusRequests"])->name("nextStatus.requests");
    Route::get("/pedidos-list", [AdminActionsController::class, "viewAllRequests"])->name("requests-view");
});



require __DIR__.'/auth.php';
