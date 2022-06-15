<?php
use App\Models\Page;
use App\Models\Language;
use App\Models\Module;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;


Route::get('/cache', function() {
	$clear = Artisan::call('cache:clear');
	return "Cache cleared";
});

// Line 12-13 makes sure that migrations run without error 
// [error is when running migration and table doesn't exists]

// Google Login URL
	Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
	Route::get('callback/google', [GoogleController::class, 'handleCallback']);
//

// Facebook Login URL
	Route::get('auth/facebook', [FacebookController::class, 'redirectToFB']);
	Route::get('callback/facebook', [FacebookController::class, 'handleCallback']);
//

if(Schema::hasTable('languages')) {
	if(Language::where('like_default_for_admin', '1')->first()) {
		// A.
			Route::prefix('admin')->group(function() {
				Route::get('/login', 'AAdminController@getLogin')->name('adminLogin');
				Route::post('/login', 'AAdminController@login')->name('adminLoginUpdate');
			
				Route::group(['middleware' => 'admin'], function() {
					App::setLocale(Language::where('like_default_for_admin', '1')->first()->title);

					Route::get('/', 'AController@getDefaultPage')->name('adminDefaultPage');
					Route::get('/logout', 'AAdminController@logout')->name('aLogout');
					Route::get('/{moduleAlias}/{moduleStepId}/{id}/{moduleBlockId}/deleteImage', 'AController@filePossibilityToDelete')->name('filePossibilityToDelete');

					Route::prefix('modules')->group(function() {
						Route::get('', 'AModuleController@getStartPoint')->name('moduleStartPoint');
						Route::get('/add', 'AModuleController@add')->name('moduleAdd');
						Route::post('/add', 'AModuleController@insert')->name('moduleInsert');
						Route::get('/{id}', 'AModuleController@edit')->name('moduleEdit');
						Route::post('/{id}', 'AModuleController@update')->name('moduleUpdate');
						Route::get('/{id}/delete', 'AModuleController@delete')->name('moduleDelete');


						Route::get('/{moduleId}/add', 'AModuleStepController@add')->name('moduleStepAdd');
						Route::post('/{moduleId}/add', 'AModuleStepController@insert')->name('moduleStepInsert');
						Route::get('/{moduleId}/{id}', 'AModuleStepController@edit')->name('moduleStepEdit');
						Route::post('/{moduleId}/{id}', 'AModuleStepController@update')->name('moduleStepUpdate');
						Route::get('/{moduleId}/{id}/delete', 'AModuleStepController@delete')->name('moduleStepDelete');
						
						
						Route::get('/{moduleId}/{stepId}/add', 'AModuleBlockController@add')->name('moduleBlockAdd');
						Route::post('/{moduleId}/{stepId}/add', 'AModuleBlockController@insert')->name('moduleBlockInsert');
						Route::get('/{moduleId}/{stepId}/{id}', 'AModuleBlockController@edit')->name('moduleBlockEdit');
						Route::post('/{moduleId}/{stepId}/{id}', 'AModuleBlockController@update')->name('moduleBlockUpdate');
						Route::get('/{moduleId}/{stepId}/{id}/delete', 'AModuleBlockController@delete')->name('moduleBlockDelete');
					});


					Route::prefix('bsc')->group(function() {
						Route::get('', 'ABscController@getStartPoint')->name('bscStartPoint');
						Route::get('/add', 'ABscController@add')->name('bscAdd');
						Route::post('/add', 'ABscController@insert')->name('bscInsert');
						Route::get('/{id}', 'ABscController@edit')->name('bscEdit');
						Route::post('/{id}', 'ABscController@update')->name('bscUpdate');
						Route::get('/{id}/delete', 'ABscController@delete')->name('bscDelete');
					});


					Route::prefix('bsw')->group(function() {
						Route::get('', 'ABswController@getStartPoint')->name('bswStartPoint');
						Route::get('/add', 'ABswController@add')->name('bswAdd');
						Route::post('/add', 'ABswController@insert')->name('bswInsert');
						Route::get('/{id}', 'ABswController@edit')->name('bswEdit');
						Route::post('/{id}', 'ABswController@update')->name('bswUpdate');
						Route::get('/{id}/delete', 'ABswController@delete')->name('bswDelete');
					});
					
					
					Route::prefix('languages')->group(function() {
						Route::get('', 'ALanguageController@getStartPoint')->name('languageStartPoint');
						Route::post('', 'ALanguageController@updateStartPoint')->name('languageStartPointPost');
						Route::get('/add', 'ALanguageController@add')->name('languageAdd');
						Route::post('/add', 'ALanguageController@insert')->name('languageInsert');
						Route::get('/{id}', 'ALanguageController@edit')->name('languageEdit');
						Route::post('/{id}', 'ALanguageController@update')->name('languageUpdate');
						Route::get('/{id}/delete', 'ALanguageController@delete')->name('languageDelete');
					});

					// Modules without core
						Route::prefix('admins')->group(function() {
							Route::get('', 'AAdminController@getStartPoint')->name('adminStartPoint');
							Route::get('/add', 'AAdminController@add')->name('adminAdd');
							Route::post('/add', 'AAdminController@insert')->name('adminInsert');
							Route::get('/{id}', 'AAdminController@edit')->name('adminEdit');
							Route::post('/{id}', 'AAdminController@update')->name('adminUpdate');
							Route::get('/{id}/delete', 'AAdminController@delete')->name('adminDelete');
						});

						Route::prefix('users')->group(function() {
							Route::get('', 'AUsersController@getStartPoint')->name('userStartPoint');
							Route::get('/{id}', 'AUsersController@edit')->name('userEdit');
							Route::post('/{id}', 'AUsersController@update')->name('userUpdate');
							Route::get('/{id}/delete', 'AUsersController@delete')->name('userDelete');
						});

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
						Route::post('/{moduleAlias}/{moduleStepId}/{id}/{parentModuleStepId}/multiDelete', 'ACoreController@multiDelete')->name('coreMultiDelete');
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
		// 

		// Cabinet
			$cabinetPage = Page::firstWhere('slug', 'cabinet');
			Route::get('/{lang}/'.$cabinetPage->alias.'/edit', 'CabinetController@edit')->name('editCabinet');
			Route::post('/{lang}/'.$cabinetPage->alias.'/update', 'CabinetController@update')->name('updateCabinet');
		//

		// Order 
			Route::post('/{lang}/order/order', 'OrdersController@order')->name('orderProducts');
		
		//

		// Default routes.
			Route::get('/', function() {
				$language = Language::firstWhere('like_default', 1);

				App::setLocale($language->title);

				$page = Page::firstWhere('slug', 'home');

				return redirect('/'.$language->title.'/'.$page->alias);
			})->name('main');

			Route::get('/{lang}', function($lang) {
				App::setLocale($lang);

				$page = Page::firstWhere('slug', 'home');

				return redirect('/'.$lang.'/'.$page->alias);
			})->where('lang', '[a-z]+');
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

						Route::get('/{lang}/'.$module->page->{ 'alias_'.$language->title }, $moduleTitleForController.'Controller@getStep0')->where(['lang' => '[a-z]+'])->name($module->page->{ 'alias_'.$language -> title });
						Route::get('/{lang}/'.$module->page->{ 'alias_'.$language->title }.'/{step0Alias}', $moduleTitleForController.'Controller@getStep1')->where(['lang' => '[a-z]+', 'step0Alias' => '[a-zა-ჰа-яё0-9-]+']);
						Route::get('/{lang}/'.$module->page->{ 'alias_'.$language->title }.'/{step0Alias}/{step1Alias}', $moduleTitleForController.'Controller@getStep2')->where(['lang' => '[a-z]+', 'step0Alias' => '[a-zა-ჰа-яё0-9-]+', 'step1Alias' => '[a-zა-ჰа-яё0-9-]+']);
						Route::get('/{lang}/'.$module->page->{ 'alias_'.$language->title }.'/{step0Alias}/{step1Alias}/{step2Alias}', $moduleTitleForController.'Controller@getStep3')->where(['lang' => '[a-z]+', 'step0Alias' => '[a-zა-ჰа-яё0-9-]+', 'step1Alias' => '[a-zა-ჰа-яё0-9-]+', 'step2Alias' => '[a-zა-ჰа-яё0-9-]+']);
						Route::get('/{lang}/'.$module->page->{ 'alias_'.$language->title }.'/{step0Alias}/{step1Alias}/{step2Alias}/{step3Alias}', $moduleTitleForController.'Controller@getStep4')->where(['lang' => '[a-z]+', 'step0Alias' => '[a-zა-ჰа-яё0-9-]+', 'step1Alias' => '[a-zა-ჰа-яё0-9-]+', 'step2Alias' => '[a-zა-ჰа-яё0-9-]+', 'step3Alias' => '[a-zა-ჰа-яё0-9-]+']);
					}
				}
			}
		// Else show static page.
			Route::get('/{lang}/{pageAlias}', 'FrontController@getPage')->where(['lang' => '[a-z]+', 'pageAlias' => '[a-zა-ჰа-яё0-9-]+']);
		//

		Route :: post('/basket/get-data', 'BasketController@getProducts');
	}
}