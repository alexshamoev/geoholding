<?php
use App\Models\Page;
use App\Models\Language;
use App\Models\Module;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PhotoGalleryController;

use App\Mail\WelcomeMail;

// Line 12-13 makes sure that migrations run without error 
// [error is when running migration and table doesn't exists]
if(Schema :: hasTable('languages')) {
	if(Language :: where('like_default_for_admin', '1') -> first()) {
		// A.
			Route :: prefix('admin') -> group(function() {
				Route :: get('/login', 'AAdminController@getLogin') -> name('adminLogin');
				Route :: post('/login', 'AAdminController@login') -> name('adminLoginUpdate');
			});

			Route :: group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
				App :: setLocale(Language :: where('like_default_for_admin', '1') -> first() -> title);

				Route :: get('/', 'AController@getDefaultPage') -> name('adminDefaultPage');

				Route :: get('/logout', 'AAdminController@logout') -> name('aLogout');
				
				
				Route :: prefix('modules') -> group(function() {
					Route :: get('', 'AModuleController@getStartPoint') -> name('moduleStartPoint');
					Route :: get('/add', 'AModuleController@add') -> name('moduleAdd');
					Route :: get('/{id}', 'AModuleController@edit') -> name('moduleEdit');
					Route :: post('/{id}', 'AModuleController@update') -> name('moduleUpdate');
					Route :: get('/{id}/delete', 'AModuleController@delete') -> name('moduleDelete');
					
					Route :: get('/{moduleId}/add', 'AModuleStepController@add') -> name('moduleStepAdd');
					Route :: get('/{moduleId}/{id}', 'AModuleStepController@edit') -> name('moduleStepEdit');
					Route :: post('/{moduleId}/{id}', 'AModuleStepController@update') -> name('moduleStepUpdate');
					Route :: get('/{moduleId}/{id}/delete', 'AModuleStepController@delete') -> name('moduleStepDelete');
					
					
					Route :: get('/{moduleId}/{stepId}/add', 'AModuleBlockController@add') -> name('moduleBlockAdd');
					Route :: get('/{moduleId}/{stepId}/{id}', 'AModuleBlockController@edit') -> name('moduleBlockEdit');
					Route :: post('/{moduleId}/{stepId}/{id}', 'AModuleBlockController@update') -> name('moduleBlockUpdate');
					Route :: get('/{moduleId}/{stepId}/{id}/delete', 'AModuleBlockController@delete') -> name('moduleBlockDelete');
				});


				Route :: prefix('bsc') -> group(function() {
					Route :: get('', 'ABscController@getStartPoint') -> name('bscStartPoint');
					Route :: get('/add', 'ABscController@add') -> name('bscAdd');
					Route :: get('/{id}', 'ABscController@edit') -> name('bscEdit');
					Route :: post('/{id}', 'ABscController@update') -> name('bscUpdate');
					Route :: get('/{id}/delete', 'ABscController@delete') -> name('bscDelete');
				});


				Route :: prefix('bsw') -> group(function() {
					Route :: get('', 'ABswController@getStartPoint') -> name('bswStartPoint');
					Route :: get('/add', 'ABswController@add') -> name('bswAdd');
					Route :: get('/{id}', 'ABswController@edit') -> name('bswEdit');
					Route :: post('/{id}', 'ABswController@update') -> name('bswUpdate');
					Route :: get('/{id}/delete', 'ABswController@delete') -> name('bswDelete');
				});
				
				
				Route :: prefix('languages') -> group(function() {
					Route :: get('', 'ALanguageController@getStartPoint') -> name('languageStartPoint');
					Route :: post('', 'ALanguageController@updateStartPoint') -> name('languageStartPointPost');
					Route :: get('/add', 'ALanguageController@add') -> name('languageAdd');
					Route :: get('/{id}', 'ALanguageController@edit') -> name('languageEdit');
					Route :: post('/{id}', 'ALanguageController@update') -> name('languageUpdate');
					Route :: get('/{id}/delete', 'ALanguageController@delete') -> name('languageDelete');
				});

				// Modulis without core
					Route :: prefix('admins') -> group(function() {
						Route :: get('', 'AAdminController@getStartPoint') -> name('adminStartPoint');
						Route :: get('/add', 'AAdminController@add') -> name('adminAdd');
						Route :: get('/{id}', 'AAdminController@edit') -> name('adminEdit');
						Route :: post('/{id}', 'AAdminController@update') -> name('adminUpdate');
						Route :: get('/{id}/delete', 'AAdminController@delete') -> name('adminDelete');
					});

					Route :: prefix('users') -> group(function() {
						Route :: get('', 'AUsersController@getStartPoint') -> name('userStartPoint');
						Route :: get('/{id}', 'AUsersController@edit') -> name('userEdit');
						Route :: get('/{id}/delete', 'AUsersController@delete') -> name('userDelete');
					});

					Route :: get('/contacts', 'AContactsController@edit') -> name('contactsEdit');
					Route :: post('/contacts', 'AContactsController@update') -> name('contactsUpdate');
				//

				Route :: get('/{moduleAlias}', 'ACoreControllerStep0@get') -> name('coreGetStep0');
				Route :: get('/{moduleAlias}/add', 'ACoreControllerStep0@add') -> name('coreAddStep0');
				Route :: get('/{moduleAlias}/{id}', 'ACoreControllerStep0@edit') -> name('coreEditStep0');
				Route :: post('/{moduleAlias}/{id}', 'ACoreControllerStep0@update') -> name('coreUpdateStep0');
				Route :: post('/{moduleAlias}/{id}/addImageStep0', 'ACoreControllerStep0@addMultImages') -> name('coreAddMultImagestep0');
				Route :: post('/{moduleAlias}/{id}/addImage', 'ACoreControllerStep0@addMultImagesStep0') -> name('coreAddMultImageForstep0');
				Route :: get('/{moduleAlias}/{id}/delete', 'ACoreControllerStep0@delete') -> name('coreDeleteStep0');

				Route :: get('/{moduleAlias}/{parent}/add', 'ACoreControllerStep1@add') -> name('coreAddStep1');
				Route :: get('/{moduleAlias}/{parent}/{id}', 'ACoreControllerStep1@edit') -> name('coreEditStep1');
				Route :: post('/{moduleAlias}/{parent}/{id}', 'ACoreControllerStep1@update') -> name('coreUpdateStep1');
				Route :: post('/{moduleAlias}/{parent}/{id}/addImage', 'ACoreControllerStep1@addMultImages') -> name('coreAddMultImagestep1');
				Route :: get('/{moduleAlias}/{parent}/{id}/delete', 'ACoreControllerStep1@delete') -> name('coreDeleteStep1');

				Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/add', 'ACoreControllerStep2@add') -> name('coreAddStep2');
				Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{id}', 'ACoreControllerStep2@edit') -> name('coreEditStep2');
				Route :: post('/{moduleAlias}/{parentFirst}/{parentSecond}/{id}', 'ACoreControllerStep2@update') -> name('coreUpdateStep2');
				Route :: post('/{moduleAlias}/{parentFirst}/{parentSecond}/{id}/addImage', 'ACoreControllerStep2@addMultImages') -> name('coreAddMultImagestep2');
				Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{id}/delete', 'ACoreControllerStep2@delete') -> name('coreDeleteStep2');

				Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{parentThird}/add', 'ACoreControllerStep3@add') -> name('coreAddStep3');
				Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{parentThird}/{id}', 'ACoreControllerStep3@edit') -> name('coreEditStep3');
				Route :: post('/{moduleAlias}/{parentFirst}/{parentSecond}/{parentThird}/{id}', 'ACoreControllerStep3@update') -> name('coreUpdateStep3');
				Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{parentThird}/{id}/delete', 'ACoreControllerStep3@delete') -> name('coreDeleteStep3');


				// Ajax
					Route :: post('/set-rangs', 'ARangController@set');
				// 
			});
		//


		// react test
			Route :: post('/get-react', 'ReactTestController@get');
		//  


		// Auth routes
			// Route :: get('/ge/registration', 'auth/RegisterController@create') -> name('register');

			// Registration Routes...
			Route :: get('/ge/register', 'Auth\RegisterController@showRegistrationForm') -> name('register');
			Route :: post('/ge/register', 'Auth\RegisterController@register');

			Route :: get('login', 'Auth\LoginController@showLoginForm') -> name('login');
			Route :: post('login', 'Auth\LoginController@login');
			Route :: get('logout', 'Auth\LoginController@logout') -> name('logout');
		// 


		// Default routes.
			Route :: get('/', function() {
				$language = Language :: firstWhere('like_default', 1);

				App :: setLocale($language -> title);

				$page = Page :: firstWhere('slug', 'home');

				return redirect('/'.$language -> title.'/'.$page -> alias);
			}) -> name('main');

			Route :: get('/{lang}', function($lang) {
				App :: setLocale($lang);

				$page = Page :: firstWhere('slug', 'home');

				return redirect('/'.$lang.'/'.$page -> alias);
			}) -> where('lang', '[a-z]+');
		// 


		// Check if this page is attached with module.
			foreach(Module :: where('page_id', '>', '0') -> get() as $module) {
				$moduleTitleForControllerArray = explode('_', $module -> alias);
				
				$moduleTitleForController = '';

				foreach($moduleTitleForControllerArray as $data) {
					$moduleTitleForController .= ucfirst($data);
				}

				foreach(Language :: where('disable', '0') -> get() as $language) {
					Route :: get('/{lang}/'.$module -> page -> { 'alias_'.$language -> title }, $moduleTitleForController.'Controller@getStep0') -> where(['lang' => '[a-z]+']);
					Route :: get('/{lang}/'.$module -> page -> { 'alias_'.$language -> title }.'/{step0Alias}', $moduleTitleForController.'Controller@getStep1') -> where(['lang' => '[a-z]+', 'step0Alias' => '[a-zა-ჰа-яё0-9-]+']);
					Route :: get('/{lang}/'.$module -> page -> { 'alias_'.$language -> title }.'/{step0Alias}/{step1Alias}', $moduleTitleForController.'Controller@getStep2') -> where(['lang' => '[a-z]+', 'step0Alias' => '[a-zა-ჰа-яё0-9-]+', 'step1Alias' => '[a-zა-ჰа-яё0-9-]+']);
					Route :: get('/{lang}/'.$module -> page -> { 'alias_'.$language -> title }.'/{step0Alias}/{step1Alias}/{step2Alias}', $moduleTitleForController.'Controller@getStep3') -> where(['lang' => '[a-z]+', 'step0Alias' => '[a-zა-ჰа-яё0-9-]+', 'step1Alias' => '[a-zა-ჰа-яё0-9-]+', 'step2Alias' => '[a-zა-ჰа-яё0-9-]+']);
					Route :: get('/{lang}/'.$module -> page -> { 'alias_'.$language -> title }.'/{step0Alias}/{step1Alias}/{step2Alias}/{step3Alias}', $moduleTitleForController.'Controller@getStep4') -> where(['lang' => '[a-z]+', 'step0Alias' => '[a-zა-ჰа-яё0-9-]+', 'step1Alias' => '[a-zა-ჰа-яё0-9-]+', 'step2Alias' => '[a-zა-ჰа-яё0-9-]+', 'step3Alias' => '[a-zა-ჰа-яё0-9-]+']);
				}
			}
		// Else show static page.
			Route :: get('/{lang}/{pageAlias}', 'FrontController@getPage') -> where(['lang' => '[a-z]+', 'pageAlias' => '[a-zა-ჰа-яё0-9-]+']);
		//



		// Auth :: routes();


		// Route :: get('/email', function() {
		// 	Mail :: to('email@email.com') -> send(new WelcomeMail());

		// 	return new WelcomeMail();
		// });f
	}
}