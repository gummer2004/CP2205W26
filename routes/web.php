<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Index
Route::get('/jobs', function () {

    return view('jobs.index', [
        // 'jobs'=>Job::anpaginate(5),
        'jobs' => Job::with('employer')->paginate(10),
    ]);
});

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Store
Route::post('/jobs', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);


    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);
    return redirect('/jobs');
});


// show
Route::get('/jobs/{job}', function (Job $job) {  //Route model binding

    return view('jobs.show', [
        'job' => $job,
    ]);
});
// job create can't go here Route::get('/jobs/create')....


// Edit
Route::get('/jobs/{job}/edit', function (Job $job) {

    // get the job --- done with route model binding

    // show the form
    return view('jobs.edit', [
        'job' => $job,
    ]);
    // form to hold default data -- happens in the form
    // send to persist -- happens in the form

});
// Update
Route::patch('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);


    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/'. $job->id);
});

// destroy
Route::delete('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);
    $job->delete();
    return redirect("/jobs");

});

Route::get('/contact', function () {
    return view('contact');
});
