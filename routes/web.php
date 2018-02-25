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

Route::get('/', 'LoginController@index');
Route::post('login', 'LoginController@Auth');


Route::group(['middleware' => ['preventbackbutton','auth']], function(){

    Route::get('dashboard', 'HomeController@index');
    Route::get('logout', 'LoginController@logout');
    Route::resource('user','UserController',['parameters'=> ['user'=>'user_id']]);
    Route::resource('userRole','RoleController',['parameters'=> ['userRole'=>'role_id']]);
    Route::resource('rolePermission','RolePermissionController',['parameters'=> ['rolePermission'=>'id']]);
    Route::post('rolePermission/get_all_menu', 'RolePermissionController@getAllMenu');
    Route::resource('changePassword','ChangePasswordController',['parameters'=> ['changePassword'=>'id']]);


    Route::group(['prefix' => 'physiotherapist'], function () {
        Route::get('/',['as' => 'physiotherapist.index', 'uses'=>'PhysiotherapistController@index']);
        Route::get('/create',['as' => 'physiotherapist.create', 'uses'=>'PhysiotherapistController@create']);
        Route::post('/store',['as' => 'physiotherapist.store', 'uses'=>'PhysiotherapistController@store']);
        Route::get('/{physiotherapist}/edit',['as'=>'physiotherapist.edit','uses'=>'PhysiotherapistController@edit']);
        Route::put('/{physiotherapist}',['as' => 'physiotherapist.update', 'uses'=>'PhysiotherapistController@update']);
        Route::delete('/{physiotherapist}/delete',['as'=>'physiotherapist.destroy','uses'=>'PhysiotherapistController@destroy']);
    });

    Route::group(['prefix' => 'centre'], function () {
        Route::get('/',['as' => 'centre.index', 'uses'=>'CentreController@index']);
        Route::get('/create',['as' => 'centre.create', 'uses'=>'CentreController@create']);
        Route::post('/store',['as' => 'centre.store', 'uses'=>'CentreController@store']);
        Route::get('/{centre}/edit',['as'=>'centre.edit','uses'=>'CentreController@edit']);
        Route::put('/{centre}',['as' => 'centre.update', 'uses'=>'CentreController@update']);
        Route::delete('/{centre}/delete',['as'=>'centre.destroy','uses'=>'CentreController@destroy']);
    });

    Route::group(['prefix' => 'instruction'], function () {
        Route::get('/',['as' => 'instruction.index', 'uses'=>'InstructionController@index']);
        Route::get('/create',['as' => 'instruction.create', 'uses'=>'InstructionController@create']);
        Route::post('/store',['as' => 'instruction.store', 'uses'=>'InstructionController@store']);
        Route::get('/{instruction}/edit',['as'=>'instruction.edit','uses'=>'InstructionController@edit']);
        Route::put('/{instruction}',['as' => 'instruction.update', 'uses'=>'InstructionController@update']);
        Route::delete('/{instruction}/delete',['as'=>'instruction.destroy','uses'=>'InstructionController@destroy']);
    });

    Route::group(['prefix' => 'dataOperator'], function () {
        Route::get('/',['as' => 'dataOperator.index', 'uses'=>'DataOperatorController@index']);
        Route::get('/create',['as' => 'dataOperator.create', 'uses'=>'DataOperatorController@create']);
        Route::post('/store',['as' => 'dataOperator.store', 'uses'=>'DataOperatorController@store']);
        Route::get('/{dataOperator}/edit',['as'=>'dataOperator.edit','uses'=>'DataOperatorController@edit']);
        Route::put('/{dataOperator}',['as' => 'dataOperator.update', 'uses'=>'DataOperatorController@update']);
        Route::delete('/{dataOperator}/delete',['as'=>'dataOperator.destroy','uses'=>'DataOperatorController@destroy']);
    });

    Route::group(['prefix' => 'referral'], function () {
        Route::get('/',['as' => 'referral.index', 'uses'=>'ReferralController@index']);
        Route::get('/create',['as' => 'referral.create', 'uses'=>'ReferralController@create']);
        Route::post('/store',['as' => 'referral.store', 'uses'=>'ReferralController@store']);
        Route::get('/{referral}/edit',['as'=>'referral.edit','uses'=>'ReferralController@edit']);
        Route::put('/{referral}',['as' => 'referral.update', 'uses'=>'ReferralController@update']);
        Route::delete('/{referral}/delete',['as'=>'referral.destroy','uses'=>'ReferralController@destroy']);
    });

    Route::group(['prefix' => 'patient'], function () {
        Route::get('/',['as' => 'patient.index', 'uses'=>'PatientController@index']);
        Route::get('/create',['as' => 'patient.create', 'uses'=>'PatientController@create']);
        Route::post('/store',['as' => 'patient.store', 'uses'=>'PatientController@store']);
        Route::get('/{patient}/edit',['as'=>'patient.edit','uses'=>'PatientController@edit']);
        Route::get('/{id}',['as'=>'patient.show','uses'=>'PatientController@show']);
        Route::put('/{patient}',['as' => 'patient.update', 'uses'=>'PatientController@update']);
        Route::delete('/{patient}/delete',['as'=>'patient.destroy','uses'=>'PatientController@destroy']);
        Route::post('/getThana',['as' => 'patient.getThana', 'uses'=>'PatientController@getThana']);
    });

    Route::group(['prefix' => 'treatment'], function () {
        Route::get('/',['as' => 'treatment.index', 'uses'=>'TreatmentController@index']);
        Route::post('/store',['as' => 'treatment.store', 'uses'=>'TreatmentController@store']);
        Route::get('/edit/{id}',['as'=>'treatment.edit','uses'=>'TreatmentController@edit']);
        Route::put('/{treatment}',['as' => 'treatment.update', 'uses'=>'TreatmentController@update']);
    });

    Route::group(['prefix' => 'payment'], function () {
        Route::get('/',['as' => 'payment.index', 'uses'=>'PaymentController@index']);
        Route::post('/store',['as' => 'payment.store', 'uses'=>'PaymentController@store']);
        Route::get('/edit/{id}',['as'=>'payment.edit','uses'=>'PaymentController@edit']);
        Route::put('/{payment}',['as' => 'payment.update', 'uses'=>'PaymentController@update']);
    });

    Route::group(['prefix' => 'prescription'], function () {
        Route::get('/',['as' => 'prescription.index', 'uses'=>'PrescriptionController@index']);
        Route::post('/store',['as' => 'prescription.store', 'uses'=>'PrescriptionController@store']);
        Route::post('/getInstruction',['as' => 'prescription.getInstruction', 'uses'=>'PrescriptionController@getInstruction']);
        Route::get('/edit/{id}',['as'=>'prescription.edit','uses'=>'PrescriptionController@edit']);
        Route::put('/{prescription}',['as' => 'prescription.update', 'uses'=>'PrescriptionController@update']);
    });

    Route::group(['prefix' => 'appointment'], function () {
        Route::get('/',['as' => 'appointment.index', 'uses'=>'AppointmentController@index']);
        Route::get('/create',['as' => 'appointment.create', 'uses'=>'AppointmentController@create']);
        Route::post('/store',['as' => 'appointment.store', 'uses'=>'AppointmentController@store']);
        Route::get('/{appointment}/edit',['as'=>'appointment.edit','uses'=>'AppointmentController@edit']);
        Route::put('/{appointment}',['as' => 'appointment.update', 'uses'=>'AppointmentController@update']);
        Route::delete('/{appointment}/delete',['as'=>'appointment.destroy','uses'=>'AppointmentController@destroy']);
    });

});

