<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KProductController;
use App\Http\Controllers\Admin\FilesController;


 //branches
 Route::resource('kproducts','KProductController');
 Route::get('get_kproducts','KProductController@ajax')->name('get_kproducts');

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








//admin controls
Route::group(['prefix'=>'admin','as'=>'admin.','namespace'=>'Admin','middleware'=>'Admin'],function(){
    //dashboard
    Route::get('/','IndexController@index')->name('index');
    // Route::get('/','IndexController@show')->name('show');
    //dashboard
   // Route::resource('tests','TestsController');

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
Route::get('orsheader_list','ORSHeaderController@orsheader_list')->name('orsheader_list');
//Sub Allotment
    Route::resource('suballotments','SubAllotmentController');
    Route::get('get_suballotments','SubAllotmentController@ajax')->name('get_suballotments');
   // Route::get('suballotment_list','SubAllotmentController@sub_list')->name('suballotment_list');
//Allotment
Route::resource('allotments','AllotmentController');
Route::get('get_allotments','AllotmentController@ajax')->name('get_allotments');
//DV
Route::resource('dvreceivings','DVReceivingController');
Route::get('get_dvreceivings','DVReceivingController@ajax')->name('get_dvreceivings');
//Route::get('dvreceiving_list','DVReceivingController@dvreceiving_list')->name('dvreceiving_list');

//citcha
Route::resource('citcha','CitChaController')->except(['show']);
Route::get('get_citcha_list','CitChaController@ajax')->name('get_citcha_list');
Route::get('getSurveyContent','CitChaController@getSurveyContent')->name('getSurveyContent');

Route::resource('citcha_report','CitChaReportController')->except(['show']);
Route::get('citcha_report_list','CitChaController@ajax')->name('citcha_report_list');
//CSS  Reports

  Route::get('citcha_report','CitChaReportController@index')->name('citcha_report.index');
  Route::get('generate_report','CitChaReportController@generate_report')->name('citcha_report.generate_report');
//Inventory
Route::resource('property_issued','PropertyIssuedController')->except(['show']);
Route::get('property_issued_list','PropertyIssuedController@ajax')->name('property_issued_list');
Route::get('getStatusContent','PropertyIssuedController@getStatusContent')->name('getStatusContent');
// Route::get('property_issued_dashboard','PropertyIssuedController@property_issued_dash')->name('property_issued_dashboard');
// Route::get('property_issued_report','PropertyIssuedController@generate_report')->name('property_issued.property_issued_report');
Route::resource('regsepi','RegSepiController')->except(['show']);
Route::get('get_regsepi','RegSepiController@ajax')->name('get_regsepi');
Route::get('regsepi_export','RegSepiController@export')->name('regsepi.export');

Route::resource('sepc','SepcController')->except(['show']);
Route::get('get_sepc','SepcController@ajax')->name('get_sepc');
Route::get('sepc_export','SepcController@export')->name('sepc.export');

Route::resource('ics','ICSController')->except(['show']);
Route::get('get_ics','ICSController@ajax')->name('get_ics');
Route::get('ics_export','ICSController@export')->name('ics.export');

Route::resource('repsepi','RepSepiController')->except(['show']);
Route::get('get_repsepi','RepSepiController@ajax')->name('get_repsepi');
Route::get('repsepi_export','RepSepiController@export')->name('repsepi.export');

Route::resource('seplc','SeplcController')->except(['show']);
Route::get('get_seplc','SeplcController@ajax')->name('get_seplc');
Route::get('seplc_export','SeplcController@export')->name('seplc.export');

//darz

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


Route::get('get_show_files/{id}','SchedulesController@show_files')->name('get_show_files');

Route::get('get_calendar_show_id/{id}','SchedulesController@calendar_show_id')->name('calendar_show_id');
Route::get('get_calendar_show_emp_id/{id}','SchedulesController@calendar_show_emp_id')->name('calendar_show_emp_id');
Route::get('get_calendar_show','SchedulesController@calendar_show')->name('calendar_show');
//end darz

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
 Route::get('get_schedule_list','SchedulesController@schedule_list')->name('schedule_list');
 Route::get('get_calendar_show','SchedulesController@calendar_show')->name('calendar_show');

 Route::get('get_schedules_encoder','SchedulesController@ajax')->name('get_schedules_encoder');
 Route::get('get_schedule_list','SchedulesController@schedule_list')->name('schedule_list');
 Route::get('get_schedule_list_encoder','SchedulesController@schedule_list_encoder')->name('schedule_list_encoder');
 Route::get('get_schedule_list_srmu','SchedulesController@schedule_list_srmu')->name('schedule_list_srmu');
 Route::get('get_schedule_list_rd','SchedulesController@schedule_list_rd')->name('schedule_list_rd');
 Route::get('get_schedule_view/{id}','SchedulesController@schedule_view')->name('schedule_view');

    //   //nationality
    // Route::resource('nationalities','NationalitiesController');
    // Route::get('get_nationalities','NationalitiesController@ajax')->name('get_nationalities');



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


     //sections
     Route::resource('sections','SectionsController');
     Route::get('get_sections','SectionsController@ajax')->name('get_sectionss');



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


    //accounting reports
    Route::get('accounting','AccountingController@index')->name('accounting.index');
    Route::get('accounting/field','AccountingController@field')->name('accounting.field');
    //Route::get('generate_report','AccountingController@generate_report')->name('accounting.generate_report');
    Route::get('accounting/cash_register','AccountingController@cash_register')->name('accounting.cash_register');




    // //reports
    // Route::resource('reports','ReportsController');
    // Route::post('reports/pdf/{id}','ReportsController@pdf')->name('reports.pdf');
    // Route::post('reports/update_culture/{id}','ReportsController@update_culture')->name('reports.update_culture');//update cultures
    // Route::get('get_reports','ReportsController@ajax')->name('get_reports');
    // Route::get('sign_report/{id}','ReportsController@sign')->name('reports.sign');

    //roles
    Route::resource('roles','RolesController');
    Route::get('get_roles','RolesController@ajax')->name('get_roles');




    //chat
    Route::get('chat','ChatController@index')->name('chat.index');

    // //visits
    // Route::resource('visits','VisitsController');
    // Route::get('visits/create_tests/{id}','VisitsController@create_tests')->name('visits.create_tests');
    // Route::get('get_visits','VisitsController@ajax')->name('get_visits');

    //branches
    Route::resource('branches','BranchesController');
    Route::get('get_branches','BranchesController@ajax')->name('get_branches');

    // //contracts
    // Route::resource('contracts','ContractsController');
    // Route::get('get_contracts','ContractsController@ajax')->name('get_contracts');

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
