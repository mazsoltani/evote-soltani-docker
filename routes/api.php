<?php

use Illuminate\Http\Request;
use App\vote;
use App\election;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('CreateElection', 'ElectionController@CreateElection');
Route::put('EditElection', 'ElectionController@EditElection');
Route::delete('RemoveElection', 'ElectionController@RemoveElection');
Route::put('IncrementNumberOfVotes', 'ElectionController@IncrementNumberOfVotes');
Route::get('getListOfChoices' , 'ElectionController@getListOfChoices');
Route::get('getAllElections' , 'ElectionController@getAllElections');
Route::get('electionExists' , 'ElectionController@electionExists');
Route::get('getElectionDetails','ElectionController@getElectionDetails');




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
