<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FileManagerController;

use App\Http\Controllers\Admin\SchedulesController;

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


//login admin
Route::group(['middleware'=>['Install','Locale']],function(){
  include('admin.php');
  include('ajax.php');
 
}); 



Route::post('fetch-attendees/{id}',[SchedulesController::class,'fetchAttendees']);


// Route::get('getUser/{id}', function ($id) {
//   $user = App\Models\User::where('pos_id',$id)->get();
//   return response()->json($user);
// });
Route::get('filemanager', [FileManagerController::class, 'index']);
 Route::get('change_locale/{lang}','HomeController@change_locale')->name('change_locale');
Route::get('clear-cache',function(){
  \Artisan::call('cache:clear');
  \Artisan::call('config:clear');
  \Artisan::call('view:clear');
});

?>

