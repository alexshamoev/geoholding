<?php
Route :: group(['middleware' => 'admin', 'prefix' => '/admin'], function() {
	Route :: get('/', 'AdminController@getDefaultPage');
	Route :: get('/login') -> name('login');


	Route :: get('/modules', 'ModuleController@getStartPoint') -> name('moduleStartPoint');
	Route :: get('/modules/add', 'ModuleController@add') -> name('moduleAdd');
	Route :: get('/modules/{id}', 'ModuleController@edit') -> name('moduleEdit');
	Route :: post('/modules/{id}', 'ModuleController@update') -> name('moduleUpdate');
	Route :: get('/modules/{id}/delete', 'ModuleController@delete') -> name('moduleDelete');


	Route :: get('/modules/{moduleId}/add', 'ModuleStepController@add') -> name('moduleStepAdd');
	Route :: get('/modules/{moduleId}/{id}', 'ModuleStepController@edit') -> name('moduleStepEdit');
	Route :: post('/modules/{moduleId}/{id}', 'ModuleStepController@update') -> name('moduleStepUpdate');
	Route :: get('/modules/{moduleId}/{id}/delete', 'ModuleStepController@delete') -> name('moduleStepDelete');


	Route :: get('/modules/{moduleId}/{stepId}/add', 'ModuleBlockController@add') -> name('moduleBlockAdd');
	Route :: get('/modules/{moduleId}/{stepId}/{id}', 'ModuleBlockController@edit') -> name('moduleBlockEdit');
	Route :: post('/modules/{moduleId}/{stepId}/{id}', 'ModuleBlockController@update') -> name('moduleBlockUpdate');
	Route :: get('/modules/{moduleId}/{stepId}/{id}/delete', 'ModuleBlockController@delete') -> name('moduleBlockDelete');


	Route :: get('/bsc', 'BscController@getStartPoint') -> name('bscStartPoint');
	Route :: get('/bsc/add', 'BscController@add') -> name('bscAdd');
	Route :: get('/bsc/{id}', 'BscController@edit') -> name('bscEdit');
	Route :: post('/bsc/{id}', 'BscController@update') -> name('bscUpdate');
	Route :: get('/bsc/{id}/delete', 'BscController@delete') -> name('bscDelete');


	Route :: get('/bsw', 'BswController@getStartPoint') -> name('bswStartPoint');
	Route :: get('/bsw/add', 'BswController@add') -> name('bswAdd');
	Route :: get('/bsw/{id}', 'BswController@edit') -> name('bswEdit');
	Route :: post('/bsw/{id}', 'BswController@update') -> name('bswUpdate');
	Route :: get('/bsw/{id}/delete', 'BswController@delete') -> name('bswDelete');
	
 
	Route :: get('/languages', 'LanguageController@getStartPoint') -> name('languageStartPoint');
	Route :: get('/language/add', 'LanguageController@add') -> name('languageAdd');
	Route :: get('/language/{id}', 'LanguageController@edit') -> name('languageEdit');
	Route :: post('/language/{id}', 'LanguageController@update') -> name('languageUpdate');
	Route :: get('/language/{id}/delete', 'LanguageController@delete') -> name('languageDelete');
 

	Route :: get('/{moduleAlias}', 'AdminController@getModulePage') -> name('moduleGetData');
	Route :: get('/{moduleAlias}/add', 'AdminController@addModulePage') -> name('moduleDataAdd');
	Route :: get('/{moduleAlias}/{id}', 'AdminController@editModulePage') -> name('moduleDataEdit');
	Route :: post('/{moduleAlias}/{id}', 'AdminController@updateModulePage') -> name('moduleDataUpdate');
	Route :: get('/{moduleAlias}/{id}/delete', 'AdminController@deleteModulePage') -> name('moduleDataDelete');
});
 
 
// Route :: get('/{any}', function($any) {
	// return 'hi';

	// any other url, subfolders also

// }) -> where('any', '.*');


Auth :: routes();

// Route :: get('/home', 'HomeController@index') -> name('home');


Route :: get('/', 'PageController@getDefaultPageWithDefaultLanguage') -> name('main');

Route :: get('/logout', function() {
	Auth :: logout();

	return redirect() -> route('main');
}) -> name('logout');


 


Route :: get('/{lang}', 'PageController@getDefaultPage') -> where('lang', '[a-z]+');
Route :: get('/{lang}/{pageAlias}', 'PageController@getPage') -> where(['lang' => '[a-z]+', 'pageAlias' => '[a-zა-ჰа-я-]+']);
Route :: get('/{lang}/{pageAlias}/{step0Alias}', 'PageController@getStep0') -> where(['lang' => '[a-z]+', 'pageAlias' => '[a-zა-ჰа-я-]+', 'step0Alias' => '[a-zა-ჰа-я-]+']);
// Route :: get('/{lang}/{pageAlias}/{step0Alias}/{step1Alias}', 'PageController@getStep1') -> where(['lang' => '[a-z]+', 'pageAlias' => '[a-zა-ჰа-я-]+', 'step0Alias' => '[a-zა-ჰа-я-]+', 'step1Alias' => '[a-zა-ჰа-я-]+']);

// Route :: get('/{lang}/{pageAlias}', function($lang, $pageAlias) {

// }) -> where(['lang' => '[a-z]+', 'pageAlias' => '[a-zა-ჰа-я-]+']);


// Route::get('/page/create-empty', 'PageController@createEmpty');

// Route :: post('/contact/submit', 'ContactController@submit') -> name('contact-form');

