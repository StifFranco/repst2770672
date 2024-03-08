<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sayhello', function () {
    return "<h1> Hello TCO 2770672 </h1>";
});

Route::get('/pets/show', function () {
    $pets = App\Models\Pet::all();
    //echo var_dump($pet);
    //dd($pets); //Dump & Die
    dd($pets->toArray()); //Dump & Die Fixed
});

Route::get('/petview', function () {
    $pets = App\Models\Pet::all();
    return view('petsview')->with('pets', $pets);
});




Route::get('/user/elemet', function () {
    $users = App\Models\User::all();
    //return view('usersview')->with('users', $users);
    dd($users->toArray());
});


Route::get('/userview', function () {
    $users = App\Models\User::all();
    //return view('usersview')->with('users', $users);
    //dd($users->toArray());
    return view('usersview')->with('users', $users);
});