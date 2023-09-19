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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;


Route::get('/',function (){
    return redirect(url('dashboard'));
})->middleware('auth');
Route::group(['middleware' => ['auth', 'roles'],'roles' => App\Role::get()->pluck('name')->toArray()], function () {

    //usman



    Route::resource('client/client', 'Client\\ClientController');




    Route::get('/dashboard', 'Admin\AdminController@index');
    Route::get('account-settings','UsersController@getSettings');
    Route::post('account-settings','UsersController@saveSettings');
    Route::get('user/edit/{id}','UsersController@edit');
    Route::post('user/edit/{id}','UsersController@update');

    //Admin Dashboard Pages
    Route::get('attorney_associates','Admin\AdminController@attorneyAssociates')->name('attorney_associates');
    Route::get('attorney_associates_create','Admin\AdminController@attorneyAssociatesCreate')->name('attorney_associates_create');
    Route::get('clients','Admin\AdminController@clients')->name('clients');
    Route::get('create_clients','Admin\AdminController@createClients')->name('create_clients');
    Route::get('create_case_file','Admin\AdminController@createCaseFile')->name('create_case_file');
    Route::get('case_management','Admin\AdminController@caseManagement')->name('case_management');
    Route::get('account','Admin\AdminController@account')->name('account');
    Route::get('bill_of_cost/{slug?}/{id?}','Admin\AdminController@billOfCost')->name('bill_of_cost');
    Route::get('case_accounting/{id?}','Admin\AdminController@caseAccounting')->name('case_accounting');
    Route::get('case_order/{id?}','Admin\AdminController@caseOrder')->name('case_order');
    Route::get('case_letter/{id?}','Admin\AdminController@caseLetter')->name('case_letter');
    Route::get('reminder_email', 'Admin\AdminController@reminderEmail')->name('reminder_email');
    Route::get('case_cheque/{id?}','Admin\AdminController@caseCheque')->name('case_cheque');
    Route::get('case_allocatur/{id?}','Admin\AdminController@caseAllocatur')->name('case_allocatur');
    Route::post('case_accounts', 'Admin\AdminController@caseAccounts')->name('case_accounts');
    Route::get('case_detail','Admin\AdminController@caseDetail')->name('case_detail');
    Route::get('create_invoice/{id?}','Admin\AdminController@createInvoice')->name('create_invoice');
    Route::get('download_invoice','Admin\AdminController@invoice')->name('download_invoice');
    Route::get('create_court_attendants_notes/{id?}','Admin\AdminController@createCourtAttendantsNote')->name('create_court_attendants_notes');
    Route::get('court_attendants_notes/{id?}','Admin\AdminController@courtAttendantsNotes')->name('court_attendants_notes');
    Route::get('create_employee_profile','Admin\AdminController@createEmployeeProfile')->name('create_employee_profile ');
    Route::get('attorney_dashboard','Admin\AdminController@attorneyDashboard')->name('attorney_dashboard ');
    Route::get('assigned_cases','Admin\AdminController@assignedCases')->name('assigned_cases ');
    Route::get('assigned_case_attorney/{id?}/{caseId?}','Admin\AdminController@assignedCaseAttorney')->name('assigned_case_attorney');
    Route::get('/invoicee/{id?}','Admin\AdminController@invoicePdf')->name('invoice_pdf');
    // Route::get('cost/{id?}','Admin\AdminController@billOfCostPdf')->name('cost_pdf');
    Route::post('cost/{id?}', 'Admin\AdminController@billOfCostPdf')->name('cost_pdf');
    Route::get('cost/{id?}', 'Admin\AdminController@billOfCostPdf')->name('cost_pdf');
    Route::get('case_status','Admin\AdminController@caseStatus')->name('case_status');
    Route::get('have_invoice/{id?}','Admin\AdminController@haveInvoice')->name('have_invoice');
    Route::get('have_billofcost/{id?}','Admin\AdminController@haveBillOfCost')->name('have_billofcost');
    Route::get('get_count_noti_case','WebsiteController@getCountNotiCase')->name('get_count_noti_case');
    Route::get('get_case_notification','WebsiteController@getCaseNotification')->name('get_case_notification');
    Route::get('view_remove/{id?}','WebsiteController@viewRemove')->name('view_remove');
    Route::get('view_remove_invoice/{id?}','WebsiteController@viewRemoveInvoice')->name('view_remove_invoice');
    Route::get('view_remove_cost/{id?}','WebsiteController@viewRemoveCost')->name('view_remove_cost');
    Route::get('view_remove_accounting/{id?}','WebsiteController@viewRemoveAccounting')->name('view_remove_accounting');
    Route::get('get_count_assign_attorney','WebsiteController@getCountAssignAttorney')->name('get_count_assign_attorney');
    Route::get('get_attorney_notification','WebsiteController@getAttorneyNotification')->name('get_attorney_notification');
    Route::get('view_remove_assign_attorney/{id?}','WebsiteController@viewRemoveAssignAttorney')->name('view_remove_assign_attorney');
    Route::get('view_remove_event/{id?}','WebsiteController@viewRemoveEvent')->name('view_remove_event');
    Route::get('view_remove_junior_counsel/{id?}','WebsiteController@viewRemoveJuniorCounsel')->name('view_remove_junior_counsel');
    Route::get('view_remove_king_counsel/{id?}','WebsiteController@viewRemoveKingCounsel')->name('view_remove_king_counsel');
    Route::get('view_remove_senior_counsel/{id?}','WebsiteController@viewRemoveSeniorCounsel')->name('view_remove_senior_counsel');
    Route::get('view_remove_paralegal/{id?}','WebsiteController@viewRemoveParalegalCounsel')->name('view_remove_paralegal');
//    Route::get('bill_of_cost_ajax','WebsiteController@billOfCostAjax')->name('bill_of_cost_ajax');
    Route::get('bill_of_cost_ajax','WebsiteController@billOfCostAjax')->name('bill_of_cost_ajax');
    Route::post('originating_ajax','WebsiteController@originatingAjax')->name('originating_ajax');
    Route::post('file_mail','WebsiteController@fileMail')->name('file_mail');
    Route::post('originating_update_ajax','WebsiteController@originatingUpdateAjax')->name('originating_update_ajax');
    Route::post('/check_email', 'WebsiteController@checkEmail')->name('check_email');
    Route::get('case_senior_counsel','WebsiteController@caseSeniorCounsel')->name('case_senior_counsel');
    Route::get('case_junior_counsel','WebsiteController@caseJuniorCounsel')->name('case_junior_counsel');
    Route::get('case_king_counsel','WebsiteController@casekingCounsel')->name('case_king_counsel');
    Route::get('case_paralegal','WebsiteController@caseParalegal')->name('case_paralegal');

    Route::get('users','UsersController@getIndex');

    Route::resource('attorneyAssociate/attorney-associate', 'AttorneyAssociate\\AttorneyAssociateController');
    Route::get('get_role_details_attorney/{id?}','AttorneyAssociate\\AttorneyAssociateController@getRoleDetails')->name('get_role_details_attorney');

    Route::get('/attorneyAssociate_status/{slug?}/{id?}','WebsiteController@attorneyAssociateStatus')->name('attorneyAssociate_status');
    Route::get('/attorneyAssociate_delete/{slug?}/{id?}','WebsiteController@attorneyAssociateDelete')->name('attorneyAssociate_delete');

    Route::get('filter/{name?}','WebsiteController@filter')->name('filter');
    Route::get('all_filter/{name?}','WebsiteController@allFilter')->name('all_filter');
    Route::resource('paymentMethod/payment-method', 'PaymentMethod\\PaymentMethodController');
    Route::resource('firm/firm', 'Firm\\FirmController');
    Route::resource('clientAttitude/client-attitude', 'ClientAttitude\\ClientAttitudeController');
    Route::resource('seniorCounsel/senior-counsel', 'SeniorCounsel\\SeniorCounselController');
    Route::resource('kingCounsel/king-counsel', 'KingCounsel\\KingCounselController');
    Route::resource('typeOfMatter/type-of-matter', 'TypeOfMatter\\TypeOfMatterController');
    Route::resource('caseFile/case-file', 'CaseFile\\CaseFileController');

    Route::resource('caseTag/case-tag', 'CaseTag\\CaseTagController');

    Route::post('originating_processedsss', 'WebsiteController@originatingProcessed')->name('originating_processedsss');
    Route::get('create_case_file/{id?}', 'WebsiteController@createCaseFile')->name('create_case_file');
    Route::get('edit_case_file/{id?}', 'WebsiteController@editCaseFile')->name('edit_case_file');
    Route::post('update_case_file', 'WebsiteController@updateCaseFile')->name('update_case_file');
    Route::get('originating_process/{id?}','WebsiteController@originatingProcess')->name('originating_process');
    Route::resource('originate/originate', 'Originate\\OriginateController');
    Route::resource('caseOriginate/case-originate', 'CaseOriginate\\CaseOriginateController');
    Route::resource('originatingProcessed/originating-processed', 'OriginatingProcessed\\OriginatingProcessedController');

    Route::resource('category/category', 'Category\\CategoryController');
    Route::resource('courtAttendantsNote/court-attendants-note', 'CourtAttendantsNote\\CourtAttendantsNoteController');

    Route::post('process_bill_of_cost','WebsiteController@processBillOfCost')->name('process_bill_of_cost');

    Route::get('/originating_processed_destory/{slug?}/{id?}', 'WebsiteController@originatingProcessedDestory')->name('originating_processed_destory');
    Route::get('financial_report','WebsiteController@financialReport')->name('financial_report');
    Route::resource('caseInvoice/case-invoice', 'CaseInvoice\\CaseInvoiceController');
    Route::resource('billOfCost/bill-of-cost', 'BillOfCost\\BillOfCostController');

    Route::get('generate_master_file/{case_file_id?}','WebsiteController@generateMasterFile')->name('generate_master_file');
    Route::get('get_client/{client_id?}','WebsiteController@getClient')->name('get_client');
    Route::get('get_case/{case_id?}','WebsiteController@getCase')->name('get_case');
    Route::get('demo','Admin\AdminController@demo')->name('demo');
    Route::post('master_file','WebsiteController@previewMasterFiles')->name('master_file');
    Route::resource('accounting/accounting', 'Accounting\\AccountingController');
    Route::resource('expertise/expertise', 'Expertise\\ExpertiseController');
    Route::resource('caseTypeOfMatter/case-type-of-matter', 'CaseTypeOfMatter\\CaseTypeOfMatterController');
    Route::resource('caseSeniorCounsel/case-senior-counsel', 'CaseSeniorCounsel\\CaseSeniorCounselController');
    Route::resource('caseKingCounsel/case-king-counsel', 'CaseKingCounsel\\CaseKingCounselController');
    Route::resource('caseJuniorAttorney/case-junior-attorney', 'CaseJuniorAttorney\\CaseJuniorAttorneyController');

});

Route::group(['middleware' => ['auth', 'roles'],'roles' => 'admin'], function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard.index');
//    });
    Route::get('index2', function (){
        return view('dashboard.index2');
    });
    Route::get('index3', function (){
        return view('dashboard.index3');
    });
    Route::get('index4', function (){
        return view('ecommerce.index4');
    });
    Route::get('products', function (){
        return view('ecommerce.products');
    });
    Route::get('product-detail', function (){
        return view('ecommerce.product-detail');
    });
    Route::get('product-edit', function (){
        return view('ecommerce.product-edit');
    });
    Route::get('product-orders', function (){
        return view('ecommerce.product-orders');
    });
    Route::get('product-cart', function (){
        return view('ecommerce.product-cart');
    });
    Route::get('product-checkout', function (){
        return view('ecommerce.product-checkout');
    });
    Route::get('panels-wells', function (){
        return view('ui-elements.panels-wells');
    });
    Route::get('panel-ui-block', function (){
        return view('ui-elements.panel-ui-block');
    });
    Route::get('portlet-draggable', function (){
        return view('ui-elements.portlet-draggable');
    });
    Route::get('buttons', function (){
        return view('ui-elements.buttons');
    });
    Route::get('tabs', function (){
        return view('ui-elements.tabs');
    });
    Route::get('modals', function (){
        return view('ui-elements.modals');
    });
    Route::get('progressbars', function (){
        return view('ui-elements.progressbars');
    });
    Route::get('notification', function (){
        return view('ui-elements.notification');
    });
    Route::get('carousel', function (){
        return view('ui-elements.carousel');
    });
    Route::get('user-cards', function (){
        return view('ui-elements.user-cards');
    });
    Route::get('timeline', function (){
        return view('ui-elements.timeline');
    });
    Route::get('timeline-horizontal', function (){
        return view('ui-elements.timeline-horizontal');
    });
    Route::get('range-slider', function (){
        return view('ui-elements.range-slider');
    });
    Route::get('ribbons', function (){
        return view('ui-elements.ribbons');
    });
    Route::get('steps', function (){
        return view('ui-elements.steps');
    });
    Route::get('session-idle-timeout', function (){
        return view('ui-elements.session-idle-timeout');
    });
    Route::get('session-timeout', function (){
        return view('ui-elements.session-timeout');
    });
    Route::get('bootstrap-ui', function (){
        return view('ui-elements.bootstrap');
    });
    Route::get('starter-page', function (){
        return view('pages.starter-page');
    });
    Route::get('blank', function (){
        return view('pages.blank');
    });
    Route::get('blank', function (){
        return view('pages.blank');
    });
    Route::get('search-result', function (){
        return view('pages.search-result');
    });
    Route::get('custom-scroll', function (){
        return view('pages.custom-scroll');
    });
    Route::get('lock-screen', function (){
        return view('pages.lock-screen');
    });
    Route::get('recoverpw', function (){
        return view('pages.recoverpw');
    });
    Route::get('animation', function (){
        return view('pages.animation');
    });
    Route::get('profile', function (){
        return view('pages.profile');
    });
    Route::get('invoice', function (){
        return view('pages.invoice');
    });
    Route::get('gallery', function (){
        return view('pages.gallery');
    });
    Route::get('pricing', function (){
        return view('pages.pricing');
    });
    Route::get('400', function (){
        return view('pages.400');
    });
    Route::get('403', function (){
        return view('pages.403');
    });
    Route::get('404', function (){
        return view('pages.404');
    });
    Route::get('500', function (){
        return view('pages.500');
    });
    Route::get('503', function (){
        return view('pages.503');
    });
    Route::get('form-basic', function (){
        return view('forms.form-basic');
    });
    Route::get('form-layout', function (){
        return view('forms.form-layout');
    });
    Route::get('icheck-control', function (){
        return view('forms.icheck-control');
    });
    Route::get('form-advanced', function (){
        return view('forms.form-advanced');
    });
    Route::get('form-upload', function (){
        return view('forms.form-upload');
    });
    Route::get('form-dropzone', function (){
        return view('forms.form-dropzone');
    });
    Route::get('form-pickers', function (){
        return view('forms.form-pickers');
    });
    Route::get('basic-table', function (){
        return view('tables.basic-table');
    });
    Route::get('table-layouts', function (){
        return view('tables.table-layouts');
    });
    Route::get('data-table', function (){
        return view('tables.data-table');
    });
    Route::get('bootstrap-tables', function (){
        return view('tables.bootstrap-tables');
    });
    Route::get('responsive-tables', function (){
        return view('tables.responsive-tables');
    });
    Route::get('editable-tables', function (){
        return view('tables.editable-tables');
    });
    Route::get('inbox', function (){
        return view('inbox.inbox');
    });
    Route::get('inbox-detail', function (){
        return view('inbox.inbox-detail');
    });
    Route::get('compose', function (){
        return view('inbox.compose');
    });
    Route::get('contact', function (){
        return view('inbox.contact');
    });
    Route::get('contact-detail', function (){
        return view('inbox.contact-detail');
    });
    Route::get('calendar', function (){
        return view('extra.calendar');
    });
    Route::get('widgets', function (){
        return view('extra.widgets');
    });
    Route::get('morris-chart', function (){
        return view('charts.morris-chart');
    });
    Route::get('peity-chart', function (){
        return view('charts.peity-chart');
    });
    Route::get('knob-chart', function (){
        return view('charts.knob-chart');
    });
    Route::get('sparkline-chart', function (){
        return view('charts.sparkline-chart');
    });
    Route::get('simple-line', function (){
        return view('icons.simple-line');
    });
    Route::get('fontawesome', function (){
        return view('icons.fontawesome');
    });
    Route::get('map-google', function (){
        return view('maps.map-google');
    });
    Route::get('map-vector', function (){
        return view('maps.map-vector');
    });

    #Permission management
    Route::get('permission-management','PermissionController@getIndex');
    Route::get('permission/create','PermissionController@create');
    Route::post('permission/create','PermissionController@save');
    Route::get('permission/delete/{id}','PermissionController@delete');
    Route::get('permission/edit/{id}','PermissionController@edit');
    Route::post('permission/edit/{id}','PermissionController@update');

    #Role management
    Route::get('role-management','RoleController@getIndex');
    Route::get('role/create','RoleController@create');
    Route::post('role/create','RoleController@save');
    Route::get('role/delete/{id}','RoleController@delete');
    Route::get('role/edit/{id}','RoleController@edit');
    Route::post('role/edit/{id}','RoleController@update');

    #CRUD Generator
    Route::get('/crud-generator', ['uses' => 'ProcessController@getGenerator']);
    Route::post('/crud-generator', ['uses' => 'ProcessController@postGenerator']);

    # Activity log
    Route::get('activity-log','LogViewerController@getActivityLog');
    Route::get('activity-log/data', 'LogViewerController@activityLogData')->name('activity-log.data');

    #User Management routes
    // Route::get('users','UsersController@getIndex');
    Route::get('user/create','UsersController@create');
    Route::post('user/create','UsersController@save');
//    Route::get('user/edit/{id}','UsersController@edit');
//    Route::post('user/edit/{id}','UsersController@update');
    Route::get('user/delete/{id}','UsersController@delete');
    Route::get('user/deleted/','UsersController@getDeletedUsers');
    Route::get('user/restore/{id}','UsersController@restoreUser');
});

//Log Viewer
Route::get('log-viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
Route::get('log-viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log-viewers.logs');
Route::delete('log-viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log-viewers.logs.delete');
Route::get('log-viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log-viewers.logs.show');
Route::get('log-viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log-viewers.logs.download');
Route::get('log-viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log-viewers.logs.filter');
Route::get('log-viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log-viewers.logs.search');
Route::get('log-viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');


Route::get('auth/{provider}/','Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback','Auth\SocialLoginController@handleProviderCallback');
Route::get('logout','Auth\LoginController@logout');
Auth::routes();


Auth::routes();




Route::resource('commonSetting/common-setting', 'CommonSetting\\CommonSettingController');
Route::get('/clear-all', function() {
    $exitCodeConfig = Artisan::call('storage:link');
    $exitCodeConfig = Artisan::call('route:clear');
    $exitCodeCache = Artisan::call('cache:clear');
    $exitCodeUpdate = Artisan::call('optimize:clear');
    $exitCodeView = Artisan::call('view:clear');
    // $exitCodePermissionCache = Artisan::call('permission:cache-reset');
    //$exitCodePermissionCache = Artisan::call('cache:forget laravelspatie.permission.cache');
    return '<div style="text-align:center;"> <h1 style="text-align:center;">Cache and Config and permission cache are cleared.</h1><h4><a href="/">Go to home</a></h4></div>';
});


Route::resource('order/order', 'Order\\OrderController');
Route::resource('letter/letter', 'Letter\\LetterController');
Route::resource('cheque/cheque', 'Cheque\\ChequeController');
Route::resource('allocatur/allocatur', 'Allocatur\\AllocaturController');
Route::resource('assignedAttorney/assigned-attorney', 'AssignedAttorney\\AssignedAttorneyController');
Route::resource('assignedCase/assigned-case', 'AssignedCase\\AssignedCaseController');
Route::resource('shortcut/shortcut', 'Shortcut\\ShortcutController');
Route::resource('caseEvent/case-event', 'CaseEvent\\CaseEventController');
Route::resource('caseEventMention/case-event-mention', 'CaseEventMention\\CaseEventMentionController');
Route::resource('clientPaymentMethod/client-payment-method', 'ClientPaymentMethod\\ClientPaymentMethodController');
Route::resource('caseChambersManager/case-chambers-manager', 'CaseChambersManager\\CaseChambersManagerController');
Route::resource('caseParalegal/case-paralegal', 'CaseParalegal\\CaseParalegalController');
Route::resource('caseJuniorCounsel/case-junior-counsel', 'CaseJuniorCounsel\\CaseJuniorCounselController');


Route::get('testing','WebsiteController@testing')->name('testing');
Route::get('access_token','WebsiteController@accessToken')->name('access_token');
Route::get('refresh_token','WebsiteController@refreshToken')->name('refresh_token');
Route::post('testing_post','WebsiteController@testingPost')->name('testing_post');
Route::get('php_check','WebsiteController@phpCheck')->name('php_check');