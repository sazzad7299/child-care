<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ChildrenController;
use App\Http\Controllers\Admin\AssignmentController;
use App\Http\Controllers\Admin\PurchaseController;


Route::prefix('admin')->middleware('theme:admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'auth.login')->name('login');
        Route::post('/login', [AuthController::class, 'store']);
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
        Route::view('/home', 'home')->name('home');

      //  Task
        Route::match(['get','post'],'/add-task',[TaskController::class,'addTask'] )->name('addTask');
        Route::match(['get','post'],'/view-task',[TaskController::class,'viewTask'] )->name('viewTask');
        Route::match(['get','post'],'/edit-task/{id}',[TaskController::class,'editTask'] )->name('editTask');
        Route::match(['get','post'],'/update-task',[TaskController::class,'updateTask'] )->name('updateTask');
        Route::match(['get','post'],'/delete-task/{id}',[TaskController::class,'deleteTask'] )->name('deleteTask');

        //Item
        Route::match(['get','post'],'/add-item',[ItemController::class,'addItem'] )->name('addItem');
        Route::match(['get','post'],'/view-item',[ItemController::class,'viewItem'] )->name('viewItem');
        Route::match(['get','post'],'/edit-item/{id}',[ItemController::class,'editItem'] )->name('editItem');
        Route::match(['get','post'],'/update-item',[ItemController::class,'updateItem'] )->name('updateItem');
        Route::match(['get','post'],'/delete-item/{id}',[ItemController::class,'deleteItem'] )->name('deleteItem');
        
        // //CHILDREN
        Route::match(['get','post'],'/view-children',[ChildrenController::class,'viewChildren'] )->name('viewChildren');
        Route::match(['get','post'],'/edit-student/{id}',[ChildrenController::class,'editStudent'] )->name('editStudent');
        Route::match(['get','post'],'/update-children',[ChildrenController::class,'updateChildren'] )->name('updateChildren');
        Route::match(['get','post'],'/delete-children/{id}',[ChildrenController::class,'deleteStudent'] )->name('deleteStudent');
        // View Assignment
        Route::match(['get','post'],'/view-Assignment',[AssignmentController::class,'viewAssignment'] )->name('viewAssignment');
        Route::match(['get','post'],'/assignment_details/{id}',[AssignmentController::class,'assignment_details'] )->name('assignment_details');
        Route::match(['get','post'],'/edit-editStatus/{id}',[AssignmentController::class,'editStatus'] )->name('editStatus');
        Route::match(['get','post'],'/edit-returnStatus/{id}',[AssignmentController::class,'returnStatus'] )->name('returnStatus');
        Route::match(['get','post'],'/add/extra_point',[AssignmentController::class,'add_extra_point'] )->name('add_extra_point');
        // viewPurchase
        
        Route::match(['get','post'],'/view-Purchase',[PurchaseController::class,'viewPurchase'] )->name('viewPurchase');
        Route::match(['get','post'],'/edit-PurchaseStatus/{id}',[PurchaseController::class,'editPurchaseStatus'] )->name('editPurchaseStatus');
       
    });
});