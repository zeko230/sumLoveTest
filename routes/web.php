<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');

});


Route::get('profile/' , [App\Http\Controllers\ProfilesController::class , 'index'])->name('main');
Route::get('profile/create/' , [App\Http\Controllers\ProfilesController::class , 'create'])->name('create');
Route::get('profile/edit/{id}' , [App\Http\Controllers\ProfilesController::class , 'edit'])->name('edit');
Route::post('profile/store/' , [App\Http\Controllers\ProfilesController::class , 'store'])->name('store');
Route::get('profile/show/{id}' , [App\Http\Controllers\ProfilesController::class , 'show'])->name('show');
Route::post('profile/update/{id}' , [App\Http\Controllers\ProfilesController::class , 'update'])->name('update');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



#######################################################################  الصفحة الرئيسية ##########################################################/
Route::get('/Rtl', [App\Http\Controllers\HomeController::class, 'Rtl'])->name('Rtl');
####################################################################### نهاية الصفحة الرئيسية ##########################################################/


####################################################################  الاعدادات العامة ##########################################################/
Route::get('/sittings', [App\Http\Controllers\dashboard\sittingController::class, 'getDataSittings'])->name('sittings');
Route::post('/setter', [App\Http\Controllers\dashboard\sittingController::class, 'setSittings'])->name('setSittings');
#######################################################################  نهاية الاعدادات العامة ##########################################################/




####################################################################  الاعلانات  ##########################################################/
Route::post('/setAdd', [App\Http\Controllers\dashboard\setAddsController::class, 'setAdd'])->name('setAdd');
Route::get('/AddControl', [App\Http\Controllers\dashboard\setAddsController::class, 'AddControl'])->name('AddControl');
####################################################################  انهاية الاعلانات ##########################################################/



####################################################################  حاسبة الحب  ##########################################################/
Route::get('/HomePageLove', [App\Http\Controllers\sumLove\sumLoveController::class, 'showHomePage'])->name('showHomePage');
Route::get('/HomeLove', [App\Http\Controllers\sumLove\HomeLoveController::class, 'HomeLove'])->name('HomeLove');
Route::post('/HomePageLove/control', [App\Http\Controllers\sumLove\controlController::class, 'setAndShowResults'])->name('setAndShowResults');
Route::get('/pindPagesData/{id}', [App\Http\Controllers\sumLove\sumLoveController::class, 'pindPagesData'])->name('pindPagesData');


####################################################################  نهاية حاسبة الحب  ##########################################################/
Route::get('/home/pages/all', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'index'])->name('main.pages');
Route::get('/home/create/page/', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'create'])->name('createPage');
Route::post('/home/store/page/', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'store'])->name('create.store');
Route::get('/home/edit/page/{id}', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'edit'])->name('edit');
Route::post('/home/update/page/{id}', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'update'])->name('update');
Route::get('/home/delete/page/{id}', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'destroy'])->name('delete');



####################################################################  حروف لوحة التحكم  ##########################################################/
Route::get('/showLetters', [App\Http\Controllers\sumLove\setGetDataDashbordController::class, 'showLetters'])->name('showLetters');
Route::get('/deleteLetter/{id}', [App\Http\Controllers\sumLove\setGetDataDashbordController::class, 'deleteLetter'])->name('deleteLetter');
Route::get('/updateLetter/{id}', [App\Http\Controllers\sumLove\setGetDataDashbordController::class, 'updateLetter'])->name('updateLetter');


#################################################################### نهاية حروف لوحة التحكم  ##########################################################/




#################################################################### إدخال حروف لوحة التحكم  ##########################################################/

Route::get('/setLetters', [App\Http\Controllers\sumLove\setGetDataDashbordController::class, 'setLetter'])->name('setLetter');
Route::post('setletter', [App\Http\Controllers\sumLove\setGetDataDashbordController::class, 'setLetterIntoDatabase'])->name('setLetterIntoDatabase');



#################################################################### نهاية إدخال حروف لوحة التحكم  ##########################################################/

####################################################################  إدخال نسبة لوحة التحكم  ##########################################################/
Route::get('/setRatio', [App\Http\Controllers\sumLove\setGetDataDashbordController::class, 'setRatio'])->name('setRatio');
Route::post('setRatios', [App\Http\Controllers\sumLove\setGetDataDashbordController::class, 'setRatioIntoDatabase'])->name('setRatioIntoDatabase');


####################################################################  نهاية إدخال نسبة لوحة التحكم  ##########################################################/

####################################################################  عرض نسبة لوحة التحكم  ##########################################################/
Route::get('/showRatios', [App\Http\Controllers\sumLove\setGetDataDashbordController::class, 'showRatios'])->name('showRatio');

Route::get('/updateRatio/{id}', [App\Http\Controllers\sumLove\setGetDataDashbordController::class, 'updateRatio'])->name('updateRatio');

Route::get('/deleteRatio/{id}', [App\Http\Controllers\sumLove\setGetDataDashbordController::class, 'deleteRatio'])->name('deleteRatio');

####################################################################  نهاية عرض نسبة لوحة التحكم  ##########################################################/


####################################################################  إظهار النتيجة  ##########################################################

// Route::get('/showResult', [App\Http\Controllers\sumLove\sumLoveController::class, 'updateRatio'])->name('updateRatio');


####################################################################   نهاية إظهار النتيجة  ##########################################################/
