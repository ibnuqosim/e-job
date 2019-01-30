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
Auth::routes();

Route::get('/', function () {
    if(!Auth::user()){
        return view('auth.login');
    }else{
        return redirect()->route('home');
    }
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'AdminAnalystOD','middleware'=>['role:AdminAnalystOD']], function () {
        
            Route::get('/', function(){
                return redirect('AdminAnalystOD/listjobdescreate');
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

            Route::get('/list_alatkerja','alatkerjaController@index');
            Route::get('/fromAddalatkerja','alatkerjaController@fromAdd');
            Route::post('/storealatkerja','alatkerjaController@store'); 
            Route::get('/deletealatkerja/{id?}','alatkerjaController@delete');
            Route::get('/editalatkerja/{id?}','alatkerjaController@edit'); 
            Route::post('/updatealatkerja/{id?}','alatkerjaController@update');

            Route::get('/list_lingkungankerja','lingkungankerjaController@index');
            Route::get('/fromAddlingkungankerja','lingkungankerjaController@fromAdd');
            Route::post('/storelingkungankerja','lingkungankerjaController@store'); 
            Route::get('/deletelingkungankerja/{id?}','lingkungankerjaController@delete');
            Route::get('/editlingkungankerja/{id?}','lingkungankerjaController@edit'); 
            Route::post('/updatelingkungankerja/{id?}','lingkungankerjaController@update');
            
            Route::get('/list_persyaratan','persyaratanController@index');
            Route::get('/fromAddpersyaratan','persyaratanController@fromAdd');
            Route::post('/storepersyaratan','persyaratanController@store'); 
            Route::get('/deletepersyaratan/{id?}','persyaratanController@delete');
            Route::get('/editpersyaratan/{id?}','persyaratanController@edit'); 
            Route::post('/updatepersyaratan/{id?}','persyaratanController@update'); 

            //pengaturan
            Route::get('/listpengaturan','pengaturanController@index');
            Route::get('/formpengaturan','pengaturanController@fromAdd');
            Route::get('/listmasteremail','masteremailController@index');
            Route::get('/formmasteremail','masteremailController@fromAdd');
            Route::post('/storemasteremail','masteremailController@store');

            //list jobs create
            Route::get('/listjobdescreate','jobdescreateController@index');
            // Route::get('/listjobdescreate','jobdescreateController@showpopup');
            Route::get('/formjobdescreate','jobdescreateController@fromAdd');
            Route::post('/storejobdescreate','jobdescreateController@store');
            Route::get('/editjobdescreate/{id?}','jobdescreateController@edit');
            Route::get('/deletejobdescreate/{id?}','jobdescreateController@delete');
            Route::post('/storejobdesedit/{id?}','jobdescreateController@storeedit');
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
            Route::get('/formjobdescreate/perfisik','jobdescreateController@perfisik');
            Route::get('/formjobdescreate/profil','jobdescreateController@profil');

            Route::get('/formjobdescreate/managerodhcp','jobdescreateController@managerodhcp');

            Route::get('/formjobdescreate/namauser','jobdescreateController@namauser');
            Route::get('/formjobdescreate/namauser/api/{id}','jobdescreateController@namaUserApi');

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

            Route::get('/formjobdescreate/atasan/{nik?}','jobdescreateController@atasan');
            Route::get('/show-historypesan/{id}','UserListJoblistController@showhistorypesananalis');
            Route::get('/konfirmasipesan/{id}','jobdescreateController@konfirmasipesan');
            Route::get('/getjobdescreate/{id}','jobdescreateController@getjobdescreate');
            
    });
    
    
    Route::group(['middleware'=>['auth', 'role:UserSuptMgrGM']], function () {

        Route::prefix('UserSuptMgrGM')->group(function(){

            Route::get('/', function(){
                return redirect('UserSuptMgrGM/listjobdescreate');
            });
            Route::get('/editing','editingJobController@index');
            Route::get('/listjobdescreate','UserListJoblistController@index');
            Route::get('/show-ajax','UserListJoblistController@ShowAjax');
            Route::post('/kirimpesan','UserListJoblistController@store');
            Route::get('/show-historypesan/{id}','UserListJoblistController@showhistorypesan');
            Route::get('/konfirmasi/{id?}','UserListJoblistController@konfirmasi');
            Route::get('/konfirmasivalidanalis/{id?}','UserListJoblistController@konfirmasivalidanalis');
            Route::get('/getjobdescreate/{id}','jobdescreateController@getjobdescreate'); 
        });
    });

    Route::group(['middleware'=>['auth', 'role:ManagerOD']], function () {
        
        Route::prefix('ManagerOD')->group(function(){
            Route::get('/', function(){
                echo  "ManagerOD";
            });
            Route::get('/Listmanagerod','ManagerController@index');
            Route::get('/show-ajax','ManagerController@ShowAjax');
            Route::get('/show-ajax','ManagerController@ShowAjax');
            Route::post('/kirimpesan','ManagerController@store');
            Route::get('/show-historypesan/{id}','ManagerController@showhistorypesan');
            Route::get('/konfirmasi/{id?}','ManagerController@konfirmasi');
            Route::get('/getjobdescreate/{id}','jobdescreateController@getjobdescreate');
        });
        
    });
    Route::group(['middleware'=>['auth', 'role:SpecialistHCD']], function () {
        
        Route::prefix('SpecialistHCD')->group(function(){
            Route::get('/', function(){
                echo  "SpecialistHCD";
            });
            Route::get('/listSpecialist','SpecialistHCDController@index');
            Route::get('/show-ajax','SpecialistHCDController@ShowAjax');
            Route::get('/show-ajax','SpecialistHCDController@ShowAjax');
            Route::post('/kirimpesan','SpecialistHCDController@store');
            Route::get('/show-historypesan/{id}','SpecialistHCDController@showhistorypesan');
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