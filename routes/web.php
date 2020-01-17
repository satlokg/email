<?php
use App\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\User;


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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('markasread', function () {
   \Auth::user()->notifications->markAsRead();
   return redirect()->back();
})->name('markAsRead');
Route::get('markasunread', function () {
   \Auth::user()->notifications->markAsUnRead();
});




Auth::routes();

//chat
Route::get('/', 'HomeController@index')->name('home');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
Route::get('/unsubscribe/{email?}', 'UnsubController@index')->name('unsubscribe');

//mail
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mail-list', 'HomeController@mailList')->name('mailList');
Route::post('/mail-list', 'HomeController@mailListPost')->name('mailList.post');
Route::get('/list-detail/{id?}', 'HomeController@listDetail')->name('listDetail');
Route::get('/mail-delete/{id?}', 'HomeController@listDetail')->name('email.delete');
Route::get('/mail-edit/{id?}', 'HomeController@listDetail')->name('email.edit');
Route::get('/mail-block/{id?}', 'HomeController@listDetail')->name('email.block');

//campaign
Route::get('/campaign', 'user\CampaignController@campaign')->name('campaign');
Route::post('/campaign', 'user\CampaignController@campaignPost')->name('campaign.post');
Route::get('/campaign-desplay/{id?}', 'user\CampaignController@campaignDesplay')->name('campaign.detail');
Route::post('/send-email', 'user\CampaignController@sendEmail')->name('sendEmail');
Route::get('/campaignList', 'user\CampaignController@campaignList')->name('campaignList');
Route::get('/campaign-send-detail', 'user\CampaignController@sendingEmail')->name('campaign.sendin.detail');




Route::get('/notify', 'HomeController@notify')->name('notify');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/home', 'Admin\AdminController@index')->name('admin.home');
    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
    Route::get('/mail-server', 'Admin\AdminController@mailserver')->name('admin.mailserver');
    Route::post('/mail-server', 'Admin\AdminController@mailserverPost')->name('admin.mailserver.post');
    Route::get('/ses-server', 'Admin\AdminController@sesserver')->name('admin.sesserver');
    Route::post('/ses-server', 'Admin\AdminController@sesserverPost')->name('admin.sesserver.post');

   

});

Route::prefix('vendor')->group(function() {
    Route::get('/login', 'Auth\VendorLoginController@showLoginForm')->name('vendor.login');
    Route::post('/login', 'Auth\VendorLoginController@login')->name('vendor.login.submit');
    Route::get('/home', 'Vendor\VendorController@index')->name('vendor.home');
    Route::get('/dashboard', 'Vendor\VendorController@dashboard')->name('vendor.dashboard');
    Route::get('/profile', 'Vendor\VendorController@profile')->name('vendor.profile');
});
