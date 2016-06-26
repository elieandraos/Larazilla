<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::group(['prefix' => '', 'middleware' => [], 'namespace' => 'Front' ], function () {
  Route::get('/', ['uses' => 'HomeController@index']);
  Route::get('/official/{postTypeSlug}/category/{categorySlug}', ['uses' => 'OfficialLifeController@index', 'as' => 'official.category']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'Admin' ], function () {

  Route::get('/dashboard', ['uses' => 'DashboardController@index', 'as' => 'admin.dashboard' ]);
  
  //post types 
  Route::get('/post-types', ['uses' => 'PostTypeController@index', 'as' => 'admin.post-types']);
  Route::get('/post-types/create', ['uses' => 'PostTypeController@create', 'as' => 'admin.post-types.create']);
  Route::post('/post-types/store', ['uses' => 'PostTypeController@store', 'as' => 'admin.post-types.store']);
  Route::get('/post-types/{postTypeSlug}/edit', ['uses' => 'PostTypeController@edit', 'as' => 'admin.post-types.edit']);
  Route::post('/post-types/{postTypeSlug}/update', ['uses' => 'PostTypeController@update', 'as' => 'admin.post-types.update']);
  Route::post('/post-types/{postTypeSlug}/delete', ['uses' => 'PostTypeController@delete', 'as' => 'admin.post-types.delete']);
  Route::get('/post-types/{postTypeSlug}/settings', ['uses' => 'PostTypeController@settings', 'as' => 'admin.post-types.settings']);
  Route::post('/post-types/{postTypeSlug}/settings/store', ['uses' => 'PostTypeController@storeSettings', 'as' => 'admin.post-types.settings.store']);
  Route::post('/post-types/{postTypeSlug}/conversions/store', ['uses' => 'PostTypeController@storeConversions', 'as' => 'admin.post-types.conversions.store']);
  Route::post('/post-types/{postTypeSlug}/hidden-fields/store', ['uses' => 'PostTypeController@storeHiddenFields', 'as' => 'admin.post-types.hidden-fields.store']);

  //post types panels
  Route::get('/post-types/{postTypeSlug}/panels', ['uses' => 'PanelController@index', 'as' => 'admin.post-types.panels']);
  Route::get('/post-types/{postTypeSlug}/panels/create', ['uses' => 'PanelController@create', 'as' => 'admin.post-types.panels.create']);
  Route::post('/post-types/{postTypeSlug}/panels/store', ['uses' => 'PanelController@store', 'as' => 'admin.post-types.panels.store']);
  Route::get('/post-types/{postTypeSlug}/panels/{panelId}/edit', ['uses' => 'PanelController@edit', 'as' => 'admin.post-types.panels.edit']);
  Route::post('/post-types/{postTypeSlug}/panels/{panelId}/update', ['uses' => 'PanelController@update', 'as' => 'admin.post-types.panels.update']);
  Route::post('/panels/{panelId}/delete', ['uses' => 'PanelController@delete', 'as' => 'admin.post-types.panels.delete']);
  
  //post types panels components
  Route::get('/post-types/{postTypeSlug}/panels/{panelId}/components', ['uses' => 'ComponentController@index', 'as' => 'admin.post-types.panels.components']);
  Route::get('/post-types/{postTypeSlug}/panels/{panelId}/components/create', ['uses' => 'ComponentController@create', 'as' => 'admin.post-types.panels.components.create']);
  Route::post('/post-types/{postTypeSlug}/panels/{panelId}/components/store', ['uses' => 'ComponentController@store', 'as' => 'admin.post-types.panels.components.store']);
  Route::get('/post-types/{postTypeSlug}/panels/{panelId}/components/{componentId}/edit', ['uses' => 'ComponentController@edit', 'as' => 'admin.post-types.panels.components.edit']);
  Route::post('/post-types/{postTypeSlug}/panels/{panelId}/components/{componentId}/update', ['uses' => 'ComponentController@update', 'as' => 'admin.post-types.panels.components.update']);
  Route::post('/components/{componentId}/delete', ['uses' => 'ComponentController@delete', 'as' => 'admin.post-types.panels.components.delete']);

  //posts
  Route::get('/posts/{postTypeSlug}', ['uses' => 'PostController@index', 'as' => 'admin.posts']);
  Route::get('/posts/{postTypeSlug}/create', ['uses' => 'PostController@create', 'as' => 'admin.posts.create']);
  Route::post('/posts/{postTypeSlug}/store', ['uses' => 'PostController@store', 'as' => 'admin.posts.store']);
  Route::get('/posts/{postTypeSlug}/{postId}/edit', ['uses' => 'PostController@edit', 'as' => 'admin.posts.edit']);
  Route::post('/posts/{postTypeSlug}/{postId}/update', ['uses' => 'PostController@update', 'as' => 'admin.posts.update']);
  Route::post('/posts/{postId}/delete', ['uses' => 'PostController@delete', 'as' => 'admin.posts.delete']);

  //dropzone
  Route::post('/dropzone/upload', ['uses' => 'DropzoneController@upload', 'as' => 'admin.dropzone.upload']);
  Route::post('/dropzone/delete', ['uses' => 'DropzoneController@delete', 'as' => 'admin.dropzone.delete']);

  //categories
  Route::get('/categories', ['uses' => 'CategoryController@index', 'as' => 'admin.categories']);
  Route::get('/categories/create', ['uses' => 'CategoryController@create', 'as' => 'admin.categories.create']);
  Route::post('/categories/store', ['uses' => 'CategoryController@store', 'as' => 'admin.categories.store']);
  Route::get('/categories/{categoryId}/edit', ['uses' => 'CategoryController@edit', 'as' => 'admin.categories.edit']);
  Route::post('/categories/{categoryId}/update', ['uses' => 'CategoryController@update', 'as' => 'admin.categories.update']);
  Route::post('/categories/{categoryId}/delete', ['uses' => 'CategoryController@delete', 'as' => 'admin.categories.delete']);
  Route::post('/categories/sort', ['uses' => 'CategoryController@sort', 'as' => 'admin.categories.sort']);


});

Route::get('/home', 'HomeController@index');
