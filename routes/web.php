<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    return view('jobs.index',[
         // 'jobs'=>Job::anpaginate(5),
       'jobs'=>Job::with('employer')->paginate(10),
    ]);
});
Route::get('/jobs/create', function ( ) {
    return view('jobs.create');
});
Route::post('/jobs', function (){
    //dd(request('title'));
//     $job = new Job();
//     $job->title = request('title');
//     $job->salary = request('salary');
//     $job->employer_id = 1;
//   $job->save();
  Job::create([
    'title' => request('title'),
    'salary' => request('salary'),
    'employer_id'=> 1,
  ]);
  return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {


    $job = Job::findOrFail($id);
    return view('jobs.show',[
        'job'=> $job,
    ]);
});
// job create can't go here Route::get('/jobs/create')....


Route::get('/contact', function () {
    return view('contact');
});
