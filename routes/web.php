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
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['auth', 'role:AdminAnalystOD']], function () {
        Route::prefix('AdminAnalystOD')->group(function(){
            Route::get('/', function(){
                echo  "masterdata";
            });
            Route::get('/list_bahankerja','bahankerjaController@index');
            Route::get('/fromAddbahankerja','bahankerjaController@fromAdd');
            Route::post('/storebahankerja','bahankerjaController@store'); 
            Route::get('/deletebahankerja/{id?}','bahankerjaController@delete'); 
            Route::get('/editbahankerja/{id?}','bahankerjaController@edit'); 
            Route::post('/updatebahankerja/{id?}','bahankerjaController@update'); 

            Route::get('/list_katakerja','katakerjaController@index');
            Route::get('/fromAddkatakerja','katakerjaController@fromAdd');
            Route::post('/storekatakerja','katakerjaController@store'); 
            Route::get('/deletekatakerja/{id?}','katakerjaController@delete'); 
            Route::get('/editkatakerja/{id?}','katakerjaController@edit'); 
            Route::post('/updatekatakerja/{id?}','katakerjaController@update');

            Route::get('/list_pengalamankerja','pengalamankerjaController@index');
            Route::get('/fromAddpengalamankerja','pengalamankerjaController@fromAdd');
            Route::post('/storepengalamankerja','pengalamankerjaController@store'); 
            Route::get('/deletepengalamankerja/{id?}','pengalamankerjaController@delete');
            Route::get('/editpengalamankerja/{id?}','pengalamankerjaController@edit');
            Route::post('/updatepengalamankerja/{id?}','pengalamankerjaController@update');

            
            Route::get('/list_pendidikan','pendidikanController@index');
            Route::get('/fromAddpendidikan','pendidikanController@fromAdd');
            Route::post('/storependidikan','pendidikanController@store'); 
            Route::get('/deletependidikan/{id?}','pendidikanController@delete'); 
            Route::get('/editpendidikan/{id?}','pendidikanController@edit');
            Route::post('/updatependidikan/{id?}','pendidikanController@update');
                       
            Route::get('/list_matrikindikator','matrikindikatorController@index');
            Route::get('/fromaddmatrikindikator','matrikindikatorController@fromAdd');
            Route::post('/storeresponsibility','matrikindikatorController@store'); 
            Route::get('/deletematrikindikator/{id?}','matrikindikatorController@delete');
            Route::get('/editmatrikindikator/{id?}','matrikindikatorController@edit'); 
            Route::post('/updatematrikindikator/{id?}','matrikindikatorController@update'); 
            
        });
        
    });
    
    Route::group(['middleware'=>['auth', 'role:AdminAnalystOD|ManagerOD']], function () {
        
        Route::prefix('AdminAnalystOD')->group(function(){
            
            Route::get('/', function(){
                echo  "menujobdesk";
            });
            
            Route::get('/listjobdescreate','jobdescreateController@index');
            Route::get('/formjobdescreate','jobdescreateController@fromAdd');
            Route::post('/storejobdescreate','jobdescreateController@store');
            
            Route::get('/formjobdescreate/resjabatan/{gol?}','jobdescreateController@resjabatan');
            Route::get('/formjobdescreate/resunitkerja/{gol?}','jobdescreateController@resunitkerja');
         
            Route::get('/formjobdescreate/resunitindikator/{kode?}','jobdescreateController@resunitindikator');
			Route::get('/formjobdescreate/indikator/{kode?}','jobdescreateController@indikator');

            Route::get('/formjobdescreate/bertangung','jobdescreateController@bertangung');

            Route::get('/formjobdescreate/dimensifinansial/{gol?}','jobdescreateController@dimensifinansial');
            Route::get('/formjobdescreate/dimensinonfinansial/{gol?}','jobdescreateController@dimensinonfinansial');
            
            Route::get('/formjobdescreate/wewenangauthorities/{kode?}','jobdescreateController@wewenangauthorities');
            
            Route::get('/formjobdescreate/Workinternal','jobdescreateController@Workinternal');
            
            Route::get('/formjobdescreate/intermsiternal','jobdescreateController@intermsiternal');
            Route::get('/formjobdescreate/intermsexternal/{kode?}','jobdescreateController@intermsexternal');

            Route::get('/formjobdescreate/tmcalatkerja/{kode?}','jobdescreateController@tmcalatkerja');
            Route::get('/formjobdescreate/tmcbahankerja','jobdescreateController@tmcbahankerja');
            Route::get('/formjobdescreate/tmclingkkerja','jobdescreateController@tmclingkkerja');

            Route::get('/formjobdescreate/pendidikan','jobdescreateController@pendidikan');
            Route::get('/formjobdescreate/pengalaman','jobdescreateController@pengalaman');
            Route::get('/formjobdescreate/fisik','jobdescreateController@fisik');
            Route::get('/formjobdescreate/profil','jobdescreateController@profil');

            Route::get('/formjobdescreate/managerodhcp','jobdescreateController@managerodhcp');
            Route::get('/formjobdescreate/namauser','jobdescreateController@namauser');
            Route::get('/formjobdescreate/analis','jobdescreateController@analis');

            Route::get('/formjobdescreate/AbbrPosition','jobdescreateController@AbbrPosition');
            Route::get('/formjobdescreate/getposition','jobdescreateController@GetPosition');
            Route::get('/formjobdescreate/getjab/{jabatan}','jobdescreateController@getjab');

            Route::get('/formjobdescreate/nojabatan/{jbt}','jobdescreateController@nojabatan');

            Route::get('/formjobdescreate/abb/{fropil}','jobdescreateController@abb');
            Route::get('/formjobdescreate/abbdeletail/{detail}','jobdescreateController@abbdeletail');
            Route::get('/pdf/{id?}','jobdescreateController@pdf');
            Route::get('/konfirmasi/{id?}','jobdescreateController@konfirmasi');

            Route::get('/formjobdescreate/abbdetail/{dbl}','jobdescreateController@abbdetail');
            Route::get('/formjobdescreate/detail/{un}','jobdescreateController@detail');

        });
    });  

    Route::group(['middleware'=>['auth', 'role:AdminAnalystOD']], function () {
        
        Route::prefix('AdminAnalystOD')->group(function(){
            
            Route::get('/', function(){
                echo  "pengaturan";
            });
            
            Route::get('/listpengaturan','pengaturanController@index');
            Route::get('/formpengaturan','pengaturanController@fromAdd');

            Route::get('/listmasteremail','masteremailController@index');
            Route::get('/formmasteremail','masteremailController@fromAdd');
            Route::post('/storemasteremail','masteremailController@store');

        });
        
    });
    
    Route::group(['middleware'=>['auth', 'role:ManagerOD']], function () {
        
        Route::get('/ManagerOD', function(){
            echo  "manager";
        });
        
    });
    Route::group(['middleware'=>['auth', 'role:UserSuptMgrGM']], function () {
        
        Route::prefix('UserSuptMgrGM')->group(function(){
            Route::get('/', function(){
                echo  "UserSuptMgrGM";
            });
            Route::get('/editing','editingJobController@index');
        });
        
    });
    Route::group(['middleware'=>['auth', 'role:SpecialistHCD']], function () {
        
        Route::get('/SpecialistHCD', function(){
            echo  "SpecialistHCD";
        });
        
    });
    Route::group(['middleware'=>['auth', 'role:InternalAuditor']], function () {
        
        Route::get('/InternalAuditor', function(){
            echo  "InternalAuditor";
        });
        
    });
    Route::group(['middleware'=>['auth', 'role:AdministratorSMKS']], function () {
        
        Route::get('/AdministratorSMKS', function(){
            echo  "AdministratorSMKS";
        });
        
    });
    
    Route::get('/debug','debugController@index');