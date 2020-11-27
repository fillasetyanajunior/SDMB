<?php

use Illuminate\Support\Facades\Route;
use App\Role;

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

Auth::routes();
Route::get('/', 'UtamaController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index');
Route::get('/user', 'UserController@index');

// Detail Content
Route::get('/detail/postaisyiyah/{postaisyiyah}', 'DetailController@aisyiyah');
Route::get('/detail/postartikel/{postartikel}', 'DetailController@artikel');
Route::get('/detail/posttokoh/{posttokoh}', 'DetailController@tokoh');
Route::get('/detail/postinfopersyarikatan/{postinfopersyarikatan}', 'DetailController@infopersyarikatan');
Route::get('/detail/postkiprah/{postkiprah}', 'DetailController@kiprah');
Route::get('/detail/postkultum/{postkultum}', 'DetailController@kultum');
Route::get('/detail/postmilenial/{postmilenial}', 'DetailController@milenial');
Route::get('/detail/postsaudagar/{postsaudagar}', 'DetailController@saudagar');
Route::get('/detail/postseni/{postseni}', 'DetailController@seni');
Route::get('/detail/postsejarah/{postsejarah}', 'DetailController@sejarah');
Route::get('/detail/post/{post}', 'DetailController@post');

// Comment
Route::post('/coment', 'DetailController@store');

// Content 
Route::get('/aisyiyah', 'ContentController@aisyiyah');
Route::get('/artikel', 'ContentController@artikel');
Route::get('/tokoh', 'ContentController@tokoh');
Route::get('/infopersyarikatan', 'ContentController@infopersyarikatan');
Route::get('/kiprah', 'ContentController@kiprah');
Route::get('/kultum', 'ContentController@kultum');
Route::get('/milenial', 'ContentController@milenial');
Route::get('/saudagar', 'ContentController@saudagar');
Route::get('/seni', 'ContentController@seni');
Route::get('/sejarah', 'ContentController@sejarah');

Route::middleware(['auth','adminuser'])->group(function(){

    // Profile
    Route::get('/profile', 'ProfileController@edit');
    Route::patch('/profile/{user}', 'ProfileController@update');

    // Post Artikel
    Route::get('/postartikel' ,'PostartikelController@index');
    Route::get('/postartikel/create' ,'PostartikelController@create');
    Route::post('/postartikel' ,'PostartikelController@store');
    Route::get('/postartikel/edit/{postartikel}' ,'PostartikelController@edit');
    Route::patch('/postartikel/{postartikel}' ,'PostartikelController@update');
    Route::delete('/postartikel/{postartikel}' ,'PostartikelController@destroy');

    // Post Aisyiyah
    Route::get('/postaisyiyah' ,'PostaisyiyahController@index');
    Route::get('/postaisyiyah/create' ,'PostaisyiyahController@create');
    Route::post('/postaisyiyah' ,'PostaisyiyahController@store');
    Route::get('/postaisyiyah/edit/{postaisyiyah}' ,'PostaisyiyahController@edit');
    Route::patch('/postaisyiyah/{postaisyiyah}' ,'PostaisyiyahController@update');
    Route::delete('/postaisyiyah/{postaisyiyah}' ,'PostaisyiyahController@destroy');

    // Post Info Persyarikatan
    Route::get('/postinfopersyarikatan' ,'PostinfopersyarikatanController@index');
    Route::get('/postinfopersyarikatan/create' ,'PostinfopersyarikatanController@create');
    Route::post('/postinfopersyarikatan' ,'PostinfopersyarikatanController@store');
    Route::get('/postinfopersyarikatan/edit/{postinfopersyarikatan}' ,'PostinfopersyarikatanController@edit');
    Route::patch('/postinfopersyarikatan/{postinfopersyarikatan}' ,'PostinfopersyarikatanController@update');
    Route::delete('/postinfopersyarikatan/{postinfopersyarikatan}' ,'PostinfopersyarikatanController@ddestroy');

    // Post Milenial
    Route::get('/postmilenial' ,'PostmilenialController@index');
    Route::get('/postmilenial/create' ,'PostmilenialController@create');
    Route::post('/postmilenial' ,'PostmilenialController@store');
    Route::get('/postmilenial/edit/{postmilenial}' ,'PostmilenialController@edit');
    Route::patch('/postmilenial/{postmilenial}' ,'PostmilenialController@update');
    Route::delete('/postmilenial/{postmilenial}' ,'PostmilenialController@destroy');

    // Post Kiprah
    Route::get('/postkiprah' ,'PostkiprahController@index');
    Route::get('/postkiprah/create' ,'PostkiprahController@create');
    Route::post('/postkiprah' ,'PostkiprahController@store');
    Route::get('/postkiprah/edit/{postkiprah}' ,'PostkiprahController@edit');
    Route::patch('/postkiprah/{postkiprah}' ,'PostkiprahController@update');
    Route::delete('/postkiprah/{postkiprah}' ,'PostkiprahController@destroy');

    // Post Info Persyarikatan
    Route::get('/postseni' ,'PostseniController@index');
    Route::get('/postseni/create' ,'PostseniController@create');
    Route::post('/postseni' ,'PostseniController@store');
    Route::get('/postseni/edit/{postseni}' ,'PostseniController@edit');
    Route::patch('/postseni/{postseni}' ,'PostseniController@update');
    Route::delete('/postseni/{postseni}' ,'PostseniController@destroy');

    // Post Info Persyarikatan
    Route::get('/posttokoh' ,'PosttokohController@index');
    Route::get('/posttokoh/create' ,'PosttokohController@create');
    Route::post('/posttokoh' ,'PosttokohController@store');
    Route::get('/posttokoh/edit/{posttokoh}' ,'PosttokohController@edit');
    Route::patch('/posttokoh/{posttokoh}' ,'PosttokohController@update');
    Route::delete('/posttokoh/{posttokoh}' ,'PosttokohController@destroy');

    // Post Info Persyarikatan
    Route::get('/postsaudagar' ,'PostsaudagarController@index');
    Route::get('/postsaudagar/create' ,'PostsaudagarController@create');
    Route::post('/postsaudagar' ,'PostsaudagarController@store');
    Route::get('/postsaudagar/edit/{postsaudagar}' ,'PostsaudagarController@edit');
    Route::patch('/postsaudagar/{postsaudagar}' ,'PostsaudagarController@update');
    Route::delete('/postsaudagar/{postsaudagar}' ,'PostsaudagarController@destroy');

    // Post Kultum
    Route::get('/postkultum' ,'PostkultumController@index');
    Route::get('/postkultum/create' ,'PostkultumController@create');
    Route::post('/postkultum' ,'PostkultumController@store');
    Route::get('/postkultum/edit/{postkultum}' ,'PostkultumController@edit');
    Route::patch('/postkultum/{postkultum}' ,'PostkultumController@update');
    Route::delete('/postkultum/{postkultum}' ,'PostkultumController@destroy');

    // Post Sponsor
    Route::get('/sponsor' ,'SponsorController@index');
    Route::get('/sponsor/create' ,'SponsorController@create');
    Route::post('/sponsor' ,'SponsorController@store');
    Route::get('/sponsor/edit/{sponsor}' ,'SponsorController@edit');
    Route::patch('/sponsor/{sponsor}' ,'SponsorController@update');
    Route::delete('/sponsor/{sponsor}' ,'SponsorController@destroy');
    
    // Post Sejerah
    Route::get('/postsejarah' ,'PostsejarahController@index');
    Route::get('/postsejarah/create' ,'PostsejarahController@create');
    Route::post('/postsejarah' ,'PostsejarahController@store');
    Route::get('/postsejarah/edit/{postsejarah}' ,'PostsejarahController@edit');
    Route::patch('/postsejarah/{postsejarah}' ,'PostsejarahController@update');
    Route::delete('/postsejarah/{postsejarah}' ,'PostsejarahController@destroy');
});
Route::middleware(['auth','admin'])->group(function(){
    
    // Manuadmin
    Route::get('/menuadmin' ,'MenuadminController@index');
    Route::get('/menuadmin/create' ,'MenuadminController@create');
    Route::post('/menuadmin' ,'MenuadminController@store');
    Route::get('/menuadmin/edit/{menuadmin}' ,'MenuadminController@edit');
    Route::patch('/menuadmin/{menuadmin}' ,'MenuadminController@update');
    Route::delete('/menuadmin/{menuadmin}' ,'MenuadminController@ddestroy');

    // Manuuser
    Route::get('/menuuser' ,'MenuuserController@index');
    Route::get('/menuuser/create' ,'MenuuserController@create');
    Route::post('/menuuser' ,'MenuuserController@store');
    Route::get('/menuuser/edit/{menuuser}' ,'MenuuserController@edit');
    Route::patch('/menuuser/{menuuser}' ,'MenuuserController@update');
    Route::delete('/menuuser/{menuuser}' ,'MenuuserController@destroy');

    // Subadmin
    Route::get('/subadmin' ,'SubadminController@index');
    Route::get('/subadmin/create' ,'SubadminController@create');
    Route::post('/subadmin' ,'SubadminController@store');
    Route::get('/subadmin/edit/{subadmin}' ,'SubadminController@edit');
    Route::patch('/subadmin/{subadmin}' ,'SubadminController@update');
    Route::delete('/subadmin/{subadmin}' ,'SubadminController@destroy');

    // Subuser
    Route::get('/subuser' ,'SubuserController@index');
    Route::get('/subuser/create' ,'SubuserController@create');
    Route::post('/subuser' ,'SubuserController@store');
    Route::get('/subuser/edit/{subuser}' ,'SubuserController@edit');
    Route::patch('/subuser/{subuser}' ,'SubuserController@update');
    Route::delete('/subuser/{subuser}' ,'SubuserController@destroy');

    // Accessuser
    Route::get('/accessuser' ,'AccessuserController@index');
    Route::get('/accessuser/create' ,'AccessuserController@create');
    Route::post('/accessuser' ,'AccessuserController@store');
    Route::get('/accessuser/edit/{accessuser}' ,'AccessuserController@edit');
    Route::patch('/accessuser/{accessuser}' ,'AccessuserController@update');
    Route::delete('/accessuser/{accessuser}' ,'AccessuserController@destroy');

    // Accessadmin
    Route::get('/accessadmin' ,'AccessadminController@index');
    Route::get('/accessadmin/create' ,'AccessadminController@create');
    Route::post('/accessadmin' ,'AccessadminController@store');
    Route::get('/accessadmin/edit/{accessadmin}' ,'AccessadminController@edit');
    Route::patch('/accessadmin/{accessadmin}' ,'AccessadminController@update');
    Route::delete('/accessadmin/{accessadmin}' ,'AccessadminController@destroy');

    // Manager User
    Route::get('/users' ,'ManageruserController@index');
    Route::get('/users/show' ,'ManageruserController@show');
    Route::patch('/users/{users}' ,'ManageruserController@update');
    Route::patch('/users/belum/{users}' ,'ManageruserController@update2');
    Route::delete('/users/{users}' ,'ManageruserController@destroy');

    // RoleUser
    Route::get('/roleuser' ,'RoleuserController@index');
    Route::get('/roleuser/edit/{roleuser}' ,'RoleuserController@edit');
    Route::patch('/roleuser/{roleuser}' ,'RoleuserController@update');

    
});