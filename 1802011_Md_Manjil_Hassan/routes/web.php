<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\QuestionGenerator;

Route::get('/question-generator', QuestionGenerator::class);
