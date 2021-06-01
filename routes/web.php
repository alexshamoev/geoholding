<?php
Route :: group(['middleware' => 'admin', 'prefix' => '/admin'], function() {
	Route :: get('/', 'AController@getDefaultPage');
	Route :: get('/login') -> name('login');

	Route :: get('/modules', 'AModuleController@getStartPoint') -> name('moduleStartPoint');
	Route :: get('/modules/add', 'AModuleController@add') -> name('moduleAdd');
	Route :: get('/modules/{id}', 'AModuleController@edit') -> name('moduleEdit');
	Route :: post('/modules/{id}', 'AModuleController@update') -> name('moduleUpdate');
	Route :: get('/modules/{id}/delete', 'AModuleController@delete') -> name('moduleDelete');
	

	Route :: get('/modules/{moduleId}/add', 'AModuleStepController@add') -> name('moduleStepAdd');
	Route :: get('/modules/{moduleId}/{id}', 'AModuleStepController@edit') -> name('moduleStepEdit');
	Route :: post('/modules/{moduleId}/{id}', 'AModuleStepController@update') -> name('moduleStepUpdate');
	Route :: get('/modules/{moduleId}/{id}/delete', 'AModuleStepController@delete') -> name('moduleStepDelete');


	Route :: get('/modules/{moduleId}/{stepId}/add', 'AModuleBlockController@add') -> name('moduleBlockAdd');
	Route :: get('/modules/{moduleId}/{stepId}/{id}', 'AModuleBlockController@edit') -> name('moduleBlockEdit');
	Route :: post('/modules/{moduleId}/{stepId}/{id}', 'AModuleBlockController@update') -> name('moduleBlockUpdate');
	Route :: get('/modules/{moduleId}/{stepId}/{id}/delete', 'AModuleBlockController@delete') -> name('moduleBlockDelete');


	Route :: get('/bsc', 'ABscController@getStartPoint') -> name('bscStartPoint');
	Route :: get('/bsc/add', 'ABscController@add') -> name('bscAdd');
	Route :: get('/bsc/{id}', 'ABscController@edit') -> name('bscEdit');
	Route :: post('/bsc/{id}', 'ABscController@update') -> name('bscUpdate');
	Route :: get('/bsc/{id}/delete', 'ABscController@delete') -> name('bscDelete');


	Route :: get('/bsw', 'ABswController@getStartPoint') -> name('bswStartPoint');
	Route :: get('/bsw/add', 'ABswController@add') -> name('bswAdd');
	Route :: get('/bsw/{id}', 'ABswController@edit') -> name('bswEdit');
	Route :: post('/bsw/{id}', 'ABswController@update') -> name('bswUpdate');
	Route :: get('/bsw/{id}/delete', 'ABswController@delete') -> name('bswDelete');
	
 
	Route :: get('/languages', 'ALanguageController@getStartPoint') -> name('languageStartPoint');
	Route :: post('/languages', 'ALanguageController@updateStartPoint') -> name('languageStartPointPost');
	Route :: get('/language/add', 'ALanguageController@add') -> name('languageAdd');
	Route :: get('/language/{id}', 'ALanguageController@edit') -> name('languageEdit');
	Route :: post('/language/{id}', 'ALanguageController@update') -> name('languageUpdate');
	Route :: get('/language/{id}/delete', 'ALanguageController@delete') -> name('languageDelete');
 

	Route :: get('/{moduleAlias}', 'ACoreController@getStep0') -> name('coreGetStep0');
	Route :: get('/{moduleAlias}/add', 'ACoreController@addStep0') -> name('coreAddStep0');
	Route :: get('/{moduleAlias}/{id}', 'ACoreController@editStep0') -> name('coreEditStep0');
	Route :: post('/{moduleAlias}/{id}', 'ACoreController@updateStep0') -> name('coreUpdateStep0');
	Route :: get('/{moduleAlias}/{id}/delete', 'ACoreController@deleteStep0') -> name('coreDeleteStep0');

	Route :: get('/{moduleAlias}/{parent}/add', 'ACoreController@addStep1') -> name('coreAddStep1');
	Route :: get('/{moduleAlias}/{parent}/{id}', 'ACoreController@editStep1') -> name('coreEditStep1');
	Route :: post('/{moduleAlias}/{parent}/{id}', 'ACoreController@updateStep1') -> name('coreUpdateStep1');
	Route :: get('/{moduleAlias}/{parent}/{id}/delete', 'ACoreController@deleteStep1') -> name('coreDeleteStep1');

	Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/add', 'ACoreController@addStep2') -> name('coreAddStep2');
	Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{id}', 'ACoreController@editStep2') -> name('coreEditStep2');
	Route :: post('/{moduleAlias}/{parentFirst}/{parentSecond}/{id}', 'ACoreController@updateStep2') -> name('coreUpdateStep2');
	Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{id}/delete', 'ACoreController@deleteStep2') -> name('coreDeleteStep2');

	Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{parentThird}/add', 'ACoreController@addStep3') -> name('coreAddStep3');
	Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{parentThird}/{id}', 'ACoreController@editStep3') -> name('coreEditStep3');
	Route :: post('/{moduleAlias}/{parentFirst}/{parentSecond}/{parentThird}/{id}', 'ACoreController@updateStep3') -> name('coreUpdateStep3');
	Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{parentThird}/{id}/delete', 'ACoreController@deleteStep3') -> name('coreDeleteStep3');


	Route :: post('/set-rangs', 'ARangController@set');
});
 

Auth :: routes();


Route :: get('/', 'PageController@getDefaultPageWithDefaultLanguage') -> name('main');

Route :: get('/logout', function() {
	Auth :: logout();

	return redirect() -> route('main');
}) -> name('logout');



Route :: get('/{lang}', 'PageController@getDefaultPage') -> where('lang', '[a-z]+');
Route :: get('/{lang}/{pageAlias}', 'PageController@getPage') -> where(['lang' => '[a-z]+', 'pageAlias' => '[a-zა-ჰа-яё-]+']);
Route :: get('/{lang}/{pageAlias}/{step0Alias}', 'PageController@getStep0') -> where(['lang' => '[a-z]+', 'pageAlias' => '[a-zა-ჰа-яё-]+', 'step0Alias' => '[a-zა-ჰа-яё-]+']);