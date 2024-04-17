<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\FilesController;

//login admin
Route::group(['namespace'=>'Auth','prefix'=>'/','middleware'=>'AdminGuest','as'=>'admin.auth.'],function(){
    Route::get('/','AdminController@login')->name('login');
    Route::post('/login','AdminController@login_submit')->name('login_submit');


});
//logout admin
Route::post('admin/logout','Auth\AdminController@logout')->name('admin.logout')->middleware('Admin');

//reset admin users password
Route::group(['namespace'=>'Auth','prefix'=>'admin/reset','as'=>'admin.reset.'],function(){
    Route::get('/mail','AdminController@mail')->name('mail');
    Route::post('/mail_submit','AdminController@mail_submit')->name('mail_submit');
    Route::get('/reset_password_form/{token}','AdminController@reset_password_form')->name('reset_password_form');
    Route::post('/reset_password_submit','AdminController@reset_password_submit')->name('reset_password_submit');
});




//Inventory
Route::resource('property_issued','PropertyIssuedController')->except(['show']);
Route::get('property_issued_list','PropertyIssuedController@ajax')->name('property_issued_list');
Route::get('getStatusContent','PropertyIssuedController@getStatusContent')->name('getStatusContent');
// Route::get('property_issued_dashboard','PropertyIssuedController@property_issued_dash')->name('property_issued_dashboard');
// Route::get('property_issued_report','PropertyIssuedController@generate_report')->name('property_issued.property_issued_report');
Route::resource('inventory_report','InventoryController')->except(['show']);
Route::get('property_issued_registry','InventoryController@generate_report')->name('inventory_report.property_issued_registry');



//admin controls
Route::group(['prefix'=>'admin','as'=>'admin.','namespace'=>'Admin','middleware'=>'Admin'],function(){
    //dashboard
    Route::get('/','IndexController@index')->name('index');
    // Route::get('/','IndexController@show')->name('show');
    //dashboard
    Route::resource('tests','TestsController');

    //profile
    Route::group(['prefix'=>'profile','as'=>'profile.'],function(){
        Route::get('edit','ProfileController@edit')->name('edit');
        Route::post('update','ProfileController@update')->name('update');
    });

    Route::group(['prefix'=>'profileaccount','as'=>'profileaccount.'],function(){
        Route::get('edit','ProfileAccountController@edit')->name('edit');
        Route::post('update','ProfileAccountController@update')->name('update');
    });


//fta
Route::resource('ftas','FTAsController');
Route::get('get_ftas','FTAsController@ajax')->name('get_ftas');
Route::get('get_fta_list','FTAsController@fta_list')->name('fta_list');

//ORS
Route::resource('orsheaders','ORSHeaderController');
Route::get('get_orsheaders','ORSHeaderController@ajax')->name('get_orsheaders');
Route::get('get_orsheader_list','ORSHeaderController@orsheader_list')->name('orsheader_list');
//Sub Allotment
Route::resource('suballotments','SubAllotmentController');
//Allotment
Route::resource('allotments','AllotmentController');

Route::resource('menus','MenusController');
Route::get('get_contactus','MenusController@contactus')->name('contactus');
Route::get('get_whoweare','MenusController@whoweare')->name('whoweare');
Route::get('get_mvsv','MenusController@mvsv')->name('mvsv');
Route::get('get_pof','MenusController@pof')->name('pof');
Route::get('get_newsandupdate','MenusController@newsandupdate')->name('newsandupdate');
Route::get('get_seal2021','MenusController@seal2021')->name('seal2021');
Route::get('get_seal2016','MenusController@seal2016')->name('seal2016');
Route::get('get_seal2010','MenusController@seal2010')->name('seal2010');
Route::get('get_ddpn','MenusController@ddpn')->name('ddpn');
Route::get('get_pubandnot','MenusController@pubandnot')->name('pubandnot');
Route::get('get_keyofficials','MenusController@keyofficials')->name('keyofficials');


      //files
      Route::resource('files','FilesController');
      Route::get('get_files','FilesController@ajax')->name('get_files');
      Route::get('get_file_list','FilesController@file_list')->name('file_list');
      Route::get('viewfile','FilesController@viewfile')->name('viewfile');


    Route::resource('permissions','PermissionsController');
    Route::get('get_permissions','PermissionsController@ajax')->name('get_permissions');
    //divisions
    Route::resource('divisions','DivisionsController');
    Route::get('get_divisions','DivisionsController@ajax')->name('get_divisions');
 //schedules
 Route::resource('schedules','SchedulesController');
 Route::get('get_schedules','SchedulesController@ajax')->name('get_schedules');
 Route::get('get_schedules_encoder','SchedulesController@ajax')->name('get_schedules_encoder');
 Route::get('get_schedule_list','SchedulesController@schedule_list')->name('schedule_list');

 Route::get('get_schedule_list_encoder','SchedulesController@schedule_list_encoder')->name('schedule_list_encoder');
 Route::get('get_schedule_list_srmu','SchedulesController@schedule_list_srmu')->name('schedule_list_srmu');
 Route::get('get_schedule_list_rd','SchedulesController@schedule_list_rd')->name('schedule_list_rd');


 Route::get('get_schedule_view/{id}','SchedulesController@schedule_view')->name('schedule_view');

  //attendees

  Route::get('get_attendees','UsersController@ajax')->name('get_attendees');

 //sections


 Route::get('get_calendar_show','SchedulesController@calendar_show')->name('calendar_show');

      //nationality
    Route::resource('nationalities','NationalitiesController');
    Route::get('get_nationalities','NationalitiesController@ajax')->name('get_nationalities');



    Route::resource('filemanagers','FileManagerController');
    // Route::get('get_divisions','DivisionsController@ajax')->name('get_divisions');

    //filecategories
    Route::resource('filecategories','FileCategoriesController');
    Route::get('get_filecategories','FileCategoriesController@ajax')->name('get_filecategories');

    //agendas
    Route::resource('agendas','AgendasController');
    Route::get('get_agendas','AgendasController@ajax')->name('get_agendas');



    //users
    Route::resource('users','UsersController');
    Route::get('get_users','UsersController@ajax')->name('get_users');
   

    //employee
    Route::resource('employees','EmployeesController');
    Route::get('get_employees','EmployeesController@ajax')->name('get_employees');

     //positions
     Route::resource('positions','PositionsController');
     Route::get('get_positions','PositionsController@ajax')->name('get_positions');

    
     Route::resource('sections','SectionsController');
     Route::get('get_sections','SectionsController@ajax')->name('get_sections');



    //modules
    Route::resource('modules','ModulesController');
    Route::get('get_modules','ModulesController@ajax')->name('get_modules');//datatable

     //muncit
     Route::resource('muncits','MuncitsController');
     Route::get('get_muncits','MuncitsController@ajax')->name('get_muncits');


     //provinces
     Route::resource('provinces','ProvincesController');
     Route::get('get_provinces','ProvincesController@ajax')->name('get_provinces');


    //offices
    Route::resource('offices','OfficesController');
    Route::get('get_offices','OfficesController@ajax')->name('get_offices');
    //empstatus
    Route::resource('empstatuss','EmpStatussController');
    Route::get('get_empstatuss','EmpStatussController@ajax')->name('get_empstatuss');










    //reports
    Route::resource('reports','ReportsController');
    Route::post('reports/pdf/{id}','ReportsController@pdf')->name('reports.pdf');
    Route::post('reports/update_culture/{id}','ReportsController@update_culture')->name('reports.update_culture');//update cultures
    Route::get('get_reports','ReportsController@ajax')->name('get_reports');
    Route::get('sign_report/{id}','ReportsController@sign')->name('reports.sign');

    //roles
    Route::resource('roles','RolesController');
    Route::get('get_roles','RolesController@ajax')->name('get_roles');




    //chat
    Route::get('chat','ChatController@index')->name('chat.index');

    //visits
    Route::resource('visits','VisitsController');
    Route::get('visits/create_tests/{id}','VisitsController@create_tests')->name('visits.create_tests');
    Route::get('get_visits','VisitsController@ajax')->name('get_visits');

    //branches
    Route::resource('branches','BranchesController');
    Route::get('get_branches','BranchesController@ajax')->name('get_branches');

    //contracts
    Route::resource('contracts','ContractsController');
    Route::get('get_contracts','ContractsController@ajax')->name('get_contracts');

    //expenses
    Route::resource('expenses','ExpensesController');
    Route::get('get_expenses','ExpensesController@ajax')->name('get_expenses');

    //expense categories
    Route::resource('expense_categories','ExpenseCategoriesController');
    Route::get('get_expense_categories','ExpenseCategoriesController@ajax')->name('get_expense_categories');

    //backups
    Route::resource('backups','BackupsController');

    //activity logs
    Route::resource('activity_logs','ActivityLogsController');
    Route::post('activity_logs_clear','ActivityLogsController@clear')->name('activity_logs.clear');
    Route::get('get_activity_logs','ActivityLogsController@ajax')->name('get_activity_logs');

    //settings
    Route::group(['prefix'=>'settings','as'=>'settings.'],function(){
        Route::get('/','SettingsController@index')->name('index');
        Route::post('info','SettingsController@info_submit')->name('info_submit');
        Route::post('emails','SettingsController@emails_submit')->name('emails_submit');
        Route::post('reports','SettingsController@reports_submit')->name('reports_submit');
        Route::post('sms','SettingsController@sms_submit')->name('sms_submit');
        Route::post('whatsapp','SettingsController@whatsapp_submit')->name('whatsapp_submit');
        Route::post('api_keys','SettingsController@api_keys_submit')->name('api_keys_submit');
    });

    //translations
    Route::resource('translations','TranslationsController');
});

?>
