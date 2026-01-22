<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    return view('jobs',[
         // 'jobs'=>Job::anpaginate(5),
       'jobs'=>Job::with('employer')->paginate(10),
    ]);
});

Route::get('/jobs/{id}', function ($id) {


    $job = Job::findOrFail($id);
    return view('job',[
        'job'=> $job,
    ]);
});


Route::get('/contact', function () {
    return view('contact');
});
