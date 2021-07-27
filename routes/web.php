<?php
use App\Application;
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
Route::get('/email', function () {
    $applicant = App\Application::first();
    $applicant->notify(new App\Notifications\ApplicationRecieved());
    return $applicant;
});





Auth::routes();

Route::get('/dashboard', 'HomeController@admin')->name('applications.all');
Route::get('/home', 'HomeController@admin')->name('applications.all');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/applicants', 'HomeController@admin')->name('applications.all');
Route::get('/applicants/new', 'HomeController@create')->name('applications.new');
Route::get('/applicants/{id}', 'HomeController@show');
Route::get('/applicants/download/{id}', 'HomeController@applicantDoc');
Route::get('/applicants/download/support_docs1/{id}', 'HomeController@applicantSupportDoc1');	 
Route::get('/applicants/download/support_docs2/{id}', 'HomeController@applicantSupportDoc2');
Route::get('/applicants/download/support_docs3/{id}', 'HomeController@applicantSupportDoc3');

Route::post('/applicants/{id}', 'HomeController@update')->name('applicants.update');

Route::post('/applicants', 'HomeController@store');
Route::get('/query-applicants', 'HomeController@filter');
