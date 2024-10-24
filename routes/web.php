<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ai-todo-list', App\Livewire\AiToDoList::class)->name('ai-todo-list');
//Add your routes here
