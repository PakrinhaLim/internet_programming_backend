<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
// $router->group(['prefix' => 'api/v1'], function ($router) {
//     $router->get('student', 'StudentController@getAllData');
// });
$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('students', 'StudentsController@getAllData');
    $router->get('students/subject/{id}', 'StudentsController@getRegisteredSubject');
    $router->post('students/add', 'StudentsController@insertData');
    // $router->get('getAll', 'CRUDController@getAllData');
    $router->get('students/getID/{id}', 'StudentsController@getID');
    // $router->post('insertData', 'CRUDController@insertData');
    $router->put('students/updateData/{id}', 'StudentsController@updateData');
    $router->delete('students/deleteData/{id}', 'StudentsController@deleteData');
});