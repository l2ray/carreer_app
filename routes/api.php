<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$router->get('/companies', function () use ($router) {

        $companies = \DB::table('qgroup_companies')->select('*')->get();

        return response()->json([
        		
        		'data' => $companies
        ]);
});

$router->get('/companies/{id}', function ($id) use ($router) {

        // \Log::info('request from file', ['request' => request()->all() ]);

        $departments = \DB::table('qgroup_departments')
        		->select('*')
        		->where('company_id', $id)
        		->get();


        return response()->json([
        		
        		'data' => $departments
        ]);
});

Route::post('/applications', 'ApplicationsController@store');
