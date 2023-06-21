<?php
use App\Models\Page;
use App\Models\Module;
use App\Models\Language;

use Admin\BscController;
use Admin\BswController;
use Admin\AdminController as AdminControllerForResource;
use Admin\LanguageController as LanguageControllerForResource;
use Admin\UsersController;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\FrontController;
use App\Models\CompanyStep0;

// Google Login URL
	Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
	Route::get('callback/google', [GoogleController::class, 'handleCallback']);
//

// Facebook Login URL
	Route::get('auth/facebook', [FacebookController::class, 'redirectToFB']);
	Route::get('callback/facebook', [FacebookController::class, 'handleCallback']);
//

// Makes sure that migrations run without error [error is when running migration and table doesn't exists]
	if(Schema::hasTable('languages')) {
		if(Language::where('like_default_for_admin', '1')->first()) {
			// A.
				Route::prefix('admin')->group(function() {
					Route::get('/login', [AdminController::class, 'getLogin'])->name('adminLogin');
					Route::post('/login', [AdminController::class, 'login'])->name('adminLoginUpdate');
				
					Route::group(['middleware' => 'admin'], function() {
						App::setLocale(Language::where('like_default_for_admin', '1')->first()->title);

						Route::get('/', 'AController@getDefaultPage')->name('adminDefaultPage');
						Route::get('/logout', [AdminController::class, 'logout'])->name('aLogout');

						Route::get('/{moduleAlias}/{moduleStepId}/{id}/{moduleBlockId}/delete-image', 'ACoreController@deleteFile')->name('deleteFile');

						Route::prefix('modules')->group(function() {
							Route::get('', 'AModuleController@getStartPoint')->name('moduleStartPoint');
							Route::get('/add', 'AModuleController@add')->name('moduleAdd');
							Route::post('/add', 'AModuleController@insert')->name('moduleInsert');
							Route::get('/{id}', 'AModuleController@edit')->name('moduleEdit');
							Route::post('/{id}', 'AModuleController@update')->name('moduleUpdate');
							Route::delete('/{id}/delete', 'AModuleController@delete')->name('moduleDelete');


							Route::get('/{moduleId}/add', 'AModuleStepController@add')->name('moduleStepAdd');
							Route::post('/{moduleId}/add', 'AModuleStepController@insert')->name('moduleStepInsert');
							Route::get('/{moduleId}/{id}', 'AModuleStepController@edit')->name('moduleStepEdit');
							Route::post('/{moduleId}/{id}', 'AModuleStepController@update')->name('moduleStepUpdate');
							Route::delete('/{moduleId}/{id}/delete', 'AModuleStepController@delete')->name('moduleStepDelete');
							
							
							Route::get('/{moduleId}/{stepId}/add', 'AModuleBlockController@add')->name('moduleBlockAdd');
							Route::post('/{moduleId}/{stepId}/add', 'AModuleBlockController@insert')->name('moduleBlockInsert');
							Route::get('/{moduleId}/{stepId}/{id}', 'AModuleBlockController@edit')->name('moduleBlockEdit');
							Route::post('/{moduleId}/{stepId}/{id}', 'AModuleBlockController@update')->name('moduleBlockUpdate');
							Route::delete('/{moduleId}/{stepId}/{id}/delete', 'AModuleBlockController@delete')->name('moduleBlockDelete');
						});


						Route::resource('bsc', BscController::class)->except([
							'show'
						]);

						Route::resource('bsw', BswController::class)->except([
							'show'
						]);

						Route::resource('admins', AdminControllerForResource::class)->except([
							'show'
						]);

						Route::post('languages/multi-update', [LanguageController::class, 'updateStartPoint'])->name('languages.multiUpdate');
						
						Route::resource('languages', LanguageControllerForResource::class)->except([
							'show'
						]);

						Route::resource('users', UsersController::class)->except([
							'show', 'create', 'store'
						]);
						

						// Modules without core
							Route::get('/contacts', 'AContactsController@edit')->name('contactsEdit');
							Route::post('/contacts', 'AContactsController@update')->name('contactsUpdate');

							Route::get('/orders', 'AOrdersController@get')->name('getOrders');
						//


						// Core
							Route::get('/{moduleAlias}', 'ACoreController@get')->name('coreGetStartPoint');
							Route::get('/{moduleAlias}/{moduleStepId}/{parentId}/add', 'ACoreController@add')->name('coreAdd');
							Route::post('/{moduleAlias}/{moduleStepId}/{parentId}/add', 'ACoreController@insert')->name('coreInsert');
							Route::get('/{moduleAlias}/{moduleStepId}/{id}', 'ACoreController@edit')->name('coreEdit');
							Route::post('/{moduleAlias}/{moduleStepId}/{id}/addImage', 'ACoreController@addMultImages')->name('coreAddMultImage');
							Route::post('/{moduleAlias}/{moduleStepId}/{id}', 'ACoreController@update')->name('coreUpdate');
							Route::get('/{moduleAlias}/{moduleStepId}/{id}/delete', 'ACoreController@delete')->name('coreDelete');
							Route::post('/{moduleAlias}/{moduleStepId}/{id}/{parentModuleStepId}/multi-delete', 'ACoreController@multiDelete')->name('coreMultiDelete');
						// 


						// Ajax
							Route::post('/set-rangs', 'ARangController@set');
						// 
					});
				});
			//
		

			// React axios queries
				Route::post('/get-translation-strings', 'ReactTranslationStringsController@get');
				Route::post('/get-react-search', 'ReactSearchController@get');
			//  


			// Auth routes
				// Login-Logout!
					Route::get('/{lang}/login', 'AuthController@getLogin')->name('getLogin');
					Route::post('/{lang}/login', 'AuthController@login')->name('login');
					Route::get('/{lang}/logout', 'AuthController@logout')->name('logout');
				//

				// Register
					Route::get('/{lang}/register', 'AuthController@getRegistration')->name('getRegister');
					Route::post('/{lang}/register', 'AuthController@registration')->name('register');
				//

				// Email Verification
					Route::get('/{lang}/verify/{id}', 'AuthController@emailVerification')->name('verifyEmail');
				//

				// Recover
					Route::get('/{lang}/recover', 'AuthController@getRecover')->name('getRecover');
					Route::post('/{lang}/recover', 'AuthController@recover')->name('recover');
					Route::get('/{lang}/reset/{email}', 'AuthController@getReset')->name('getReset');
					Route::post('/{lang}/reset/{email}', 'AuthController@reset')->name('reset');
				//

				//getVerify
					Route::get('/{lang}/get-verify/{id}', 'AuthController@getVerify')->name('getVerify');
				//

				// // Resend
				// 	Route::post('/resend', 'MailController@emailVerification')->name('resendEmail');
				// //
			// 


			// Cabinet
				// $cabinetPage = Page::firstWhere('slug', 'cabinet');
				// Route::get('/{lang}/'.$cabinetPage->alias.'/edit', 'CabinetController@edit')->name('editCabinet');
				// Route::post('/{lang}/'.$cabinetPage->alias.'/update', 'CabinetController@update')->name('updateCabinet');
			//


			// Order 
				// Route::post('/{lang}/order/order', 'OrdersController@order')->name('orderProducts');
			//


			// Default routes.
				// Route::get('/', function() {
				// 	$language = Language::firstWhere('like_default', 1);
				// 	$companies = CompanyStep0::get();
				// 	App::setLocale($language->title);

				// 	$page = Page::firstWhere('slug', 'home');

				// 	return redirect('/'.$language->title.'/'.$page->alias);
				// })->name('main');

				Route::get('/', [FrontController::class, 'main'])->name('main');

				// Route::get('/{lang}/{company}', function($lang, $company) {
				// 	App::setLocale($lang);
					
				// 	$page = Page::firstWhere('slug', 'home');

				// 	return redirect('/'.$lang.'/'.$company.'/'.$page->alias);
				// })->where('lang', '[a-z]+');
			// 


			// Check if this page is attached with module.
				foreach(Module::where('page_id', '>', '0')->get() as $module) {
					$moduleTitleForControllerArray = explode('_', $module->alias);
					
					$moduleTitleForController = '';
					
					foreach($moduleTitleForControllerArray as $data) {
						$moduleTitleForController .= ucfirst($data);
					}

					$loginAlias = Page::firstWhere('slug', 'login');
					$registrationAlias = Page::firstWhere('slug', 'registration');
					$recoverAlias = Page::firstWhere('slug', 'passRecover');
					
					foreach(Language::where('disable', '0')->get() as $language) {
						if($module->page->{ 'alias_'.$language->title } !== $loginAlias->alias
							&& $module->page->{ 'alias_'.$language->title } !== $registrationAlias->alias
							&& $module->page->{ 'alias_'.$language->title } !== $recoverAlias->alias) {

							$controllerName = 'App\Http\Controllers\\'.$moduleTitleForController.'Controller';

							if(method_exists($controllerName, 'getStep0')){
								Route::get('/{lang}/'.$module->page->{ 'alias_'.$language->title }, $moduleTitleForController.'Controller@getStep0')->where(['lang' => '[a-z]+'])->name($module->page->{ 'alias_'.$language -> title });
							}

							if(method_exists($controllerName, 'getStep1')){
								Route::get('/{lang}/'.$module->page->{ 'alias_'.$language->title }.'/{step0Alias}', $moduleTitleForController.'Controller@getStep1')->where(['lang' => '[a-z]+', 'step0Alias' => '[a-zა-ჰа-яё0-9-]+']);
							}
							
							if(method_exists($controllerName, 'getStep2')){
								Route::get('/{lang}/'.$module->page->{ 'alias_'.$language->title }.'/{step0Alias}/{step1Alias}', $moduleTitleForController.'Controller@getStep2')->where(['lang' => '[a-z]+', 'step0Alias' => '[a-zა-ჰа-яё0-9-]+', 'step1Alias' => '[a-zა-ჰа-яё0-9-]+']);
							}
							
							if(method_exists($controllerName, 'getStep3')){
								Route::get('/{lang}/'.$module->page->{ 'alias_'.$language->title }.'/{step0Alias}/{step1Alias}/{step2Alias}', $moduleTitleForController.'Controller@getStep3')->where(['lang' => '[a-z]+', 'step0Alias' => '[a-zა-ჰа-яё0-9-]+', 'step1Alias' => '[a-zა-ჰа-яё0-9-]+', 'step2Alias' => '[a-zა-ჰа-яё0-9-]+']);
							}
							
							if(method_exists($controllerName, 'getStep4')){
								Route::get('/{lang}/'.$module->page->{ 'alias_'.$language->title }.'/{step0Alias}/{step1Alias}/{step2Alias}/{step3Alias}', $moduleTitleForController.'Controller@getStep4')->where(['lang' => '[a-z]+', 'step0Alias' => '[a-zა-ჰа-яё0-9-]+', 'step1Alias' => '[a-zა-ჰа-яё0-9-]+', 'step2Alias' => '[a-zა-ჰа-яё0-9-]+', 'step3Alias' => '[a-zა-ჰа-яё0-9-]+']);
							}
						}
					}
				}
			// Else show static page.
				Route::get('/{lang}/{pageAlias}', 'FrontController@getPage')->where(['lang' => '[a-z]+', 'pageAlias' => '[a-zა-ჰа-яё0-9-]+']);
			//

			Route::post('/basket/get-data', 'BasketController@getProducts');


			Route::post('/{lang}/make-order', 'OrdersController@order')->name('makeOrder');
		}
	}
// 