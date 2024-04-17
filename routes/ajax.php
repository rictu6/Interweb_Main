<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'ajax','as'=>'ajax.'],function(){



    Route::get('get_fta_by_name','AjaxController@get_fta_by_name')->name('get_fta_by_name');
    Route::get('get_weekday_by_name','AjaxController@get_weekday_by_name')->name('get_weekday_by_name');
    Route::get('get_filecategory_by_name','AjaxController@get_filecategory_by_name')->name('get_filecategory_by_name');
    Route::get('get_module_by_name','AjaxController@get_module_by_name')->name('get_module_by_name');
    Route::get('get_folder_by_name','AjaxController@get_folder_by_name')->name('get_folder_by_name');

    //invetory
    Route::get('get_property_type','AjaxController@get_property_type')->name('get_property_type');

 //get lce
 Route::get('get_lce','AjaxController@get_lce')->name('get_lce');
 Route::get('get_lces','AjaxController@get_lces')->name('get_lces');
 Route::get('get_lce_by_name','AjaxController@get_lce_by_name')->name('get_lce_by_name');
//payee
Route::get('get_payee_by_name','AjaxController@get_payee_by_name')->name('get_payee_by_name');
//get dv type
 Route::get('get_dv_type','AjaxController@get_dv_type')->name('get_dv_type');
 //get ors
 Route::get('get_orsheaders','AjaxController@get_orsheaders')->name('get_orsheaders');
 Route::get('get_orsheaders_by_filter','AjaxController@get_orsheaders_by_filter')->name('get_orsheaders_by_filter');
 Route::get('get_orsdetails','AjaxController@get_orsdetails')->name('get_orsdetails');

//allotment class
Route::get('get_alot_by_desc','AjaxController@get_alot_by_desc')->name('get_alot_by_desc');
//fund cluster
Route::get('get_fund_cluster_by_desc','AjaxController@get_fund_cluster_by_desc')->name('get_fund_cluster_by_desc');
// authorization budget type
Route::get('get_budget_type_by_desc','AjaxController@get_budget_type_by_desc')->name('get_budget_type_by_desc');
//fundsource
Route::get('get_fundsource_by_auth','AjaxController@get_fundsource_by_auth')->name('get_fundsource_by_auth');
Route::get('get_fundsource','AjaxController@get_fundsource')->name('get_fundsource');
//ors details
//rescenter
Route::get('get_res_center','AjaxController@get_res_center')->name('get_res_center');
//pap by funsource select2 slect
Route::get('get_paps','AjaxController@get_paps')->name('get_paps');
Route::get('get_paps_by_fundsource','AjaxController@get_paps_by_fundsource')->name('get_paps_by_fundsource');
Route::get('get_pap_by_id','AjaxController@get_pap_by_id')->name('get_pap_by_id');
//uacs subobject code
Route::get('get_uacs_subobject_code','AjaxController@get_uacs_subobject_code')->name('get_uacs_subobject_code');
//suballotment by pap
Route::get('get_sub_allotment_by_pap','AjaxController@get_sub_allotment_by_pap')->name('get_sub_allotment_by_pap');
//uacs by suballotment
Route::get('get_uacs_by_sub_allotment','AjaxController@get_uacs_by_sub_allotment')->name('get_uacs_by_sub_allotment');
//uacs by pap
Route::get('get_uacs_by_pap','AjaxController@get_uacs_by_pap')->name('get_uacs_by_pap');
//services
Route::get('get_services','AjaxController@get_services')->name('get_services');

    //delete option
    Route::get('delete_option/{option_id}','AjaxController@delete_option')->name('delete_option');
        //delete uacs
        Route::get('delete_uacs/{dtl_id}','AjaxController@delete_uacs')->name('delete_uacs');




    //get modules
    Route::get('get_modules','AjaxController@get_modules')->name('get_modules');
    //create modules
    Route::post('create_module','AjaxController@create_module')->name('create_module');



    //get divisions
    Route::get('get_divisions','AjaxController@get_divisions')->name('get_divisions');
    //create divisions
    Route::post('create_division','AjaxController@create_division')->name('create_division');


    //get schedules
    Route::get('get_schedules','AjaxController@get_schedules')->name('get_schedules');
    //create schedules
    Route::post('create_schedule','AjaxController@create_schedule')->name('create_schedule');

    //get nationality
    Route::get('get_nationalities','AjaxController@get_nationalities')->name('get_nationalities');
    //create nationality
    Route::post('create_nationality','AjaxController@create_nationality')->name('create_nationality');



    //get files
    Route::get('get_files','AjaxController@get_files')->name('get_files');
    //create file
    Route::post('create_file','AjaxController@create_file')->name('create_file');
 //get filecategories
 Route::get('get_filecategories','AjaxController@get_filecategories')->name('get_filecategories');
 //create filecategory
 Route::post('create_filecategory','AjaxController@create_filecategory')->name('create_filecategory');

 Route::get('get_schedule_view','AjaxController@schedule_view')->name('schedule_view');
 Route::get('get_schedules','AjaxController@get_schedules')->name('get_schedules');
 Route::get('get_schedules_encoder','AjaxController@get_schedules_encoder')->name('get_schedules_encoder');

    //get agendass
    Route::get('get_agendas','AjaxController@get_agendas')->name('get_agendas');
    //create agendas
    Route::post('create_agenda','AjaxController@create_agenda')->name('create_agenda');



      //get permission
      Route::get('get_permissions','AjaxController@get_permissions')->name('get_permissions');
    Route::post('create_permission','AjaxController@create_permission')->name('create_permission');

    //get users
    Route::get('get_users','AjaxController@get_users')->name('get_users');
    //create users
    Route::post('create_user','AjaxController@create_user')->name('create_user');


    //get positions
    Route::get('get_positions','AjaxController@get_positions')->name('get_positions');
    Route::get('get_attendees_by_pos','AjaxController@get_attendees_by_pos')->name('get_attendees_by_pos');
    //create positions
    Route::post('create_position','AjaxController@create_position')->name('create_position');

    //get section
    Route::get('get_sections','AjaxController@get_sections')->name('get_sections');
    Route::get('get_sections_by_div','AjaxController@get_sections_by_div')->name('get_sections_by_div');
    //create section
    Route::post('create_section','AjaxController@create_section')->name('create_section');

    //get employees
    Route::get('get_employees','AjaxController@get_employees')->name('get_employees');

    //create employees
    Route::post('create_employee','AjaxController@create_employee')->name('create_employee');




    //get offices
    Route::get('get_offices','AjaxController@get_offices')->name('get_offices');
    //create offices
    Route::post('create_office','AjaxController@create_office')->name('create_office');


    //get empstatuss
    Route::get('get_empstatuss','AjaxController@get_empstatuss')->name('get_empstatuss');
    //create empstatus
    Route::post('create_empstatus','AjaxController@create_empstatus')->name('create_empstatus');


      //get muncit
      Route::get('get_muncits','AjaxController@get_muncits')->name('get_muncits');
      Route::get('get_muncits_by_prov','AjaxController@get_muncits_by_prov')->name('get_muncits_by_prov');

    //create empstatus
    Route::post('create_muncit','AjaxController@create_muncit')->name('create_muncit');



      //get provinces
      Route::get('get_provinces','AjaxController@get_provinces')->name('get_provinces');
      Route::get('get_province','AjaxController@get_province')->name('get_province');
      //create provinces
      Route::post('create_province','AjaxController@create_province')->name('create_province');


    //get roles
    Route::get('get_roles','AjaxController@get_roles')->name('get_roles');

    //get online users
    Route::get('online','AjaxController@online')->name('online')->middleware('Admin');

    //get chat
    Route::get('get_chat/{id}','AjaxController@get_chat')->name('get_chat')->middleware('Admin');
    Route::get('chat_unread/{id}','AjaxController@chat_unread')->name('chat_unread')->middleware('Admin');
    Route::post('send_message/{id}','AjaxController@send_message')->name('send_message')->middleware('Admin');


    //get unread messages
    Route::get('get_unread_messages','AjaxController@get_unread_messages')->name('get_unread_messages')->middleware('Admin');
    Route::get('get_unread_messages_count/{id}','AjaxController@get_unread_messages_count')->name('get_unread_messages_count')->middleware('Admin');

    //get my messages
    Route::get('get_my_messages/{id}','AjaxController@get_my_messages')->name('get_my_messages')->middleware('Admin');



    //load more messages
    Route::get('load_more/{user_id}/{message_id}','AjaxController@load_more')->name('load_more')->middleware('Admin');



});

?>
