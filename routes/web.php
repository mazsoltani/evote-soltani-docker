<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'vote'], function(){
    Route::get('create', function (){
        return view('title.create');
    })->name('vote/create');
    Route::post('create1','VoteController@CreateElection' )->name('vote/create1');
    Route::get('vote', function (){
        $votes=\App\vote::pluck("title","vid");
        $choices=\App\choice::all();
        return view('title.vote', compact('votes','choices'));
    })->name('vote/vote');
    Route::post('vote1','VoteController@IncrementNumberOfVotes' )->name('vote/vote1');
    Route::get('result', function (){
        $votes=\App\vote::pluck("title","vid");
        $choices=\App\choice::pluck("ListOfChoices","id");
        return view('title.result', compact('votes','choices'));
    })->name('vote/vote');
    Route::post('getElectionDetails','VoteController@getElectionDetails' )->name('vote/getElectionDetails');

});
Route::post('getElectionDetails1','VoteController@getElectionDetails1' )->name('vote/getElectionDetails1');
Route::get('/findchoices/{vid}','VoteController@findchoices');



Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/pages', 'Admin\PagesController');
Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);
Route::resource('admin/settings', 'Admin\SettingsController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
