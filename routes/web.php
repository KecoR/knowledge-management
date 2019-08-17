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
    return view('layouts.global');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'KnowledgeController@test');

//Contact
Route::get('contact', 'KnowledgeController@contact')->name('contact');

//Display Knowledge
Route::get('/knowledge', 'KnowledgeController@index')->name('knowledge');
Route::get('/knowledge/info/{id}', 'KnowledgeController@info')->name('knowledge.info');
Route::get('/knowledge/content/{id}', 'KnowledgeController@content')->name('knowledge.content');

//Knowledge Add
Route::get('/knowledge/add', 'KnowledgeController@add')->name('knowledge.add');
Route::post('/knowledge/save', 'KnowledgeController@save')->name('knowledge.save');

Route::get('/knowledge/getFungsi/{id}', 'KnowledgeController@getFungsi');

//Knowledge Ask
Route::get('/knowledge/ask', 'KnowledgeController@ask')->name('knowledge.ask');
Route::post('/knowledge/saveAsk', 'KnowledgeController@saveAsk')->name('knowledge.saveAsk');

//Knowledge Edit
Route::get('/knowledge/getKnowledge/{id}', 'KnowledgeController@getKnowledge');
Route::post('/knowledge/knowledgeSave', 'KnowledgeController@knowledgeSave')->name('knowledge.knowledgeSave');
Route::get('/knowledge/getChild/{id}', 'KnowledgeController@getChild');
Route::post('/knowledge/childSave', 'KnowledgeController@childSave')->name('knowledge.childSave');
Route::get('/knowledge/getInfo/{id}', 'KnowledgeController@getInfo');
Route::post('/knowledge/infoSave', 'KnowledgeController@infoSave')->name('knowledge.infoSave');

//Knowledge Request List
Route::get('/knowledge/request', 'KnowledgeController@requestList')->name('knowledge.requestList');
Route::get('/knowledge/requestDetail/{id}', 'KnowledgeController@requestDetail')->name('knowledge.requestDetail');
Route::post('/knowledge/requestTerima', 'KnowledgeController@requestTerima')->name('knowledge.requestTerima');
Route::get('/knowledge/requestTolak/{id}', 'KnowledgeController@requestTolak')->name('knowledge.requestTolak');

//Manage Knowledge
Route::get('/knowledge/manage', 'KnowledgeController@manage')->name('knowledge.manage');
Route::get('/knowledge/detail/{id}', 'KnowledgeController@detailKnowledge')->name('knowledge.detail');
Route::get('/knowledge/deleteCat/{id}', 'KnowledgeController@deleteKnowledgeCat')->name('knowledge.deleteCat');
Route::get('/knowledge/deleteFungsi/{id}', 'KnowledgeController@deleteKnowledgeFungsi')->name('knowledge.deleteFungsi');
Route::get('/knowledge/detailInfo/{id}', 'KnowledgeController@detailKnowledgeInfo')->name('knowledge.detailInfo');
Route::get('/knowledge/deleteInfo/{id}', 'KnowledgeController@deleteKnowledgeInfo')->name('knowledge.deleteInfo');

//Manage User
Route::post('/users/editUser', 'UserController@editUser')->name('users.editUser');
Route::get('/users/deleteUser/{id}', 'UserController@deleteUser')->name('users.deleteUser');
Route::resource("users", "UserController");

//Knowledge Log
Route::get('/knowledge/logs', 'KnowledgeController@log')->name('knowledge.log');