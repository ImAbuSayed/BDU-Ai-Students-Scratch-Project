<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\TextSummarizer;

Route::get('/', TextSummarizer::class);
