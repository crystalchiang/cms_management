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

Route::group(['middleware' => ['get.menu']], function () {
    Route::get('/', function () {           return view('dashboard.homepage'); })->middleware(['auth']);;

    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/colors', function () {     return view('dashboard.colors'); });
        Route::get('/typography', function () { return view('dashboard.typography'); });
        Route::get('/charts', function () {     return view('dashboard.charts'); });
        Route::get('/widgets', function () {    return view('dashboard.widgets'); });
        Route::get('/google-maps', function(){  return view('dashboard.googlemaps'); });
        Route::get('/404', function () {        return view('dashboard.404'); });
        Route::get('/500', function () {        return view('dashboard.500'); });
        Route::prefix('base')->group(function () {  
            Route::get('/breadcrumb', function(){   return view('dashboard.base.breadcrumb'); });
            Route::get('/cards', function(){        return view('dashboard.base.cards'); });
            Route::get('/carousel', function(){     return view('dashboard.base.carousel'); });
            Route::get('/collapse', function(){     return view('dashboard.base.collapse'); });

            Route::get('/jumbotron', function(){    return view('dashboard.base.jumbotron'); });
            Route::get('/list-group', function(){   return view('dashboard.base.list-group'); });
            Route::get('/navs', function(){         return view('dashboard.base.navs'); });
            Route::get('/pagination', function(){   return view('dashboard.base.pagination'); });

            Route::get('/popovers', function(){     return view('dashboard.base.popovers'); });
            Route::get('/progress', function(){     return view('dashboard.base.progress'); });
            Route::get('/scrollspy', function(){    return view('dashboard.base.scrollspy'); });
            Route::get('/switches', function(){     return view('dashboard.base.switches'); });

            Route::get('/tabs', function () {       return view('dashboard.base.tabs'); });
            Route::get('/tooltips', function () {   return view('dashboard.base.tooltips'); });
        });
        Route::prefix('buttons')->group(function () {  
            Route::get('/buttons', function(){          return view('dashboard.buttons.buttons'); });
            Route::get('/button-group', function(){     return view('dashboard.buttons.button-group'); });
            Route::get('/dropdowns', function(){        return view('dashboard.buttons.dropdowns'); });
            Route::get('/brand-buttons', function(){    return view('dashboard.buttons.brand-buttons'); });
            Route::get('/loading-buttons', function(){  return view('dashboard.buttons.loading-buttons'); });
        });
        Route::prefix('editors')->group(function () {  
            Route::get('/code-editor', function(){          return view('dashboard.editors.code-editor'); });
            Route::get('/markdown-editor', function(){      return view('dashboard.editors.markdown-editor'); });
            Route::get('/text-editor', function(){          return view('dashboard.editors.text-editor'); });
        });

        Route::prefix('forms')->group(function () {  
            Route::get('/basic-forms', function(){          return view('dashboard.forms.basic-forms'); });
            Route::get('/advanced-forms', function(){       return view('dashboard.forms.advanced-forms'); });
            Route::get('/validation', function(){           return view('dashboard.forms.validation'); });
        });

        Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
            Route::get('/coreui-icons', function(){         return view('dashboard.icons.coreui-icons'); });
            Route::get('/flags', function(){                return view('dashboard.icons.flags'); });
            Route::get('/brands', function(){               return view('dashboard.icons.brands'); });
        });
        Route::prefix('notifications')->group(function () {  
            Route::get('/alerts', function(){               return view('dashboard.notifications.alerts'); });
            Route::get('/badge', function(){                return view('dashboard.notifications.badge'); });
            Route::get('/modals', function(){               return view('dashboard.notifications.modals'); });
            Route::get('/toastr', function(){               return view('dashboard.notifications.toastr'); });
        });
        Route::prefix('plugins')->group(function () {  
            Route::get('/calendar', function(){             return view('dashboard.plugins.calendar'); });
            Route::get('/draggable-cards', function(){      return view('dashboard.plugins.draggable-cards'); });
            Route::get('/spinners', function(){             return view('dashboard.plugins.spinners'); });
        });
        Route::prefix('tables')->group(function () { 
            Route::get('/tables', function () {             return view('dashboard.tables.tables'); });
            Route::get('/datatables', function () {         return view('dashboard.tables.datatables'); });
        });

        Route::prefix('apps')->group(function () { 
            Route::prefix('invoicing')->group(function () { 
                Route::get('/invoice', function () {        return view('dashboard.apps.invoicing.invoice'); });
            });
            Route::prefix('email')->group(function () {
                Route::get('/inbox', function () {          return view('dashboard.apps.email.inbox'); });
                Route::get('/message', function () {        return view('dashboard.apps.email.message'); });
                Route::get('/compose', function () {        return view('dashboard.apps.email.compose'); });
            });
        });
        Route::resource('notes', 'NotesController');
    });
    Auth::routes();

    Route::resource('resource/{table}/resource', 'ResourceController')->names([
        'index'     => 'resource.index',
        'create'    => 'resource.create',
        'store'     => 'resource.store',
        'show'      => 'resource.show',
        'edit'      => 'resource.edit',
        'update'    => 'resource.update',
        'destroy'   => 'resource.destroy'
    ]);

    Route::group(['middleware' => ['get.menu']], function () {
        Route::resource('bread',  'BreadController');  
        Route::resource('users',  'UsersController'); 
        Route::resource('schools', 'SchoolsController');
        Route::resource('schoolsBranch', 'SchoolsBranchController');
        Route::resource('classInfo', 'ClassInfoController');
        Route::resource('classPrice', 'ClassPriceController');
        Route::resource('firstCategory', 'FirstCategoryController');
        Route::resource('secondCategory', 'SecondCategoryController');
        Route::resource('thirdCategory', 'ThirdCategoryController');
        Route::resource('service', 'ServiceController');
        Route::resource('topics', 'TopicsController');
        Route::resource('roles',  'RolesController');
        Route::resource('mail',   'MailController');
        Route::get('prepareSend/{id}',        'MailController@prepareSend')->name('prepareSend');
        Route::post('mailSend/{id}',        'MailController@send')->name('mailSend');
        Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
        Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');
        Route::prefix('menu/element')->group(function () { 
            Route::get('/',             'MenuElementController@index')->name('menu.index');
            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
            Route::get('/create',       'MenuElementController@create')->name('menu.create');
            Route::post('/store',       'MenuElementController@store')->name('menu.store');
            Route::get('/get-parents',  'MenuElementController@getParents');
            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'MenuElementController@update')->name('menu.update');
            Route::get('/show',         'MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
        });
        Route::prefix('menu/menu')->group(function () { 
            Route::get('/',         'MenuController@index')->name('menu.menu.index');
            Route::get('/create',   'MenuController@create')->name('menu.menu.create');
            Route::post('/store',   'MenuController@store')->name('menu.menu.store');
            Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
            Route::post('/update',  'MenuController@update')->name('menu.menu.update');
            Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
        });
        Route::prefix('media')->group(function () {
            Route::get('/',                 'MediaController@index')->name('media.folder.index');
            Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
            Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
            Route::get('/folder',           'MediaController@folder')->name('media.folder');
            Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
            Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

            Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
            Route::get('/file',             'MediaController@file');
            Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
            Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
            Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
            Route::post('/file/cropp',      'MediaController@cropp');
            Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');
        });
    });
});