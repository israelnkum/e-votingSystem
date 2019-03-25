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
    return view('auth.login');
});

Route::get('/w', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//* Positions Route

Route::resource('positions','PositionsController');

//* Voting Route

Route::resource('voting','VotingController');

//* Nominees Route

Route::resource('nominees','NomineesController');



//* Levels Route

Route::resource('levels','LevelsController');

//* Department Route

Route::resource('departments','DepartmentController');


//*Nominee Tokens Route

Route::resource('nominee_token','NomineeTokenController');


//* Users Route

Route::resource('users','UsersController');

//* Voters Route

Route::resource('voters','VotersController');

/*
 * upload Voters Route
 */

Route::post('/upload-voters','VotersController@uploadVoters')->name('upload-voters');


/*
 *  cast-voting Route
 */

Route::resource('cast-voting','CastVotingController');

Route::resource('change-password','ChangePasswordController');


/**
 * select voting type
 */
Route::get('select-candidates/{id}','CastVotingController@selectCandidates')->name('select-candidates');


//Start or End Voting

Route::post('startOrEndVoting/{id}','VotingController@startOrEndVoting')->name('startOrEndVoting');


//Make Candidate

Route::post('makeCandidate/{id}','NomineesController@makeCandidate')->name('makeCandidate');




Route::post('language-chooser','LanguageController@changeLanguage');

Route::post('/language/',array(
    'before' => 'csrf',
    'as' => 'language-chooser',
    'uses' => 'LanguageController@changeLanguage'
));

