<?php


Route::group(['prefix' => 'panel', 'as' => 'panel.'], function () {

    Route::get('/', function () {
        return redirect(route('panel.showLogin'));
    });

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('showLogin');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    /*
     * Reset Password Routes
     */

    Route::group(['prefix' => 'password/', 'namespace' => 'Auth', 'as' => 'password.'], function () {
        Route::post('email', ['as' => 'email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
        Route::get('reset/{token}', ['as' => 'reset', 'uses' => 'ResetPasswordController@showResetForm']);
        Route::post('reset', ['as' => 'update', 'uses' => 'ResetPasswordController@reset']);
    });


    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('index', 'HomeController@index')->name('index');


        Route::group(['prefix' => 'admins', 'as' => 'admins.' ], function () {

            Route::get('/', ['as' => 'index', 'middleware' => 'permission:show_admins' , 'uses' => 'AdminController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'middleware' => 'permission:show_admins' , 'uses' => 'AdminController@datatable']);

            Route::group(['prefix' => 'create' , 'middleware' => 'permission:add_admins'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'AdminController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'AdminController@store']);
            });
            Route::group(['prefix' => '{id}' , 'middleware' => 'permission:add_admins'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'AdminController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'AdminController@update']);
                Route::delete('/', ['as' => 'destroy', 'uses' => 'AdminController@destroy']);
            });
        });

        Route::group(['prefix' => 'permission', 'as' => 'permission.' , 'middleware' => ['permission:add_roles']], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'RoleController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'uses' => 'RoleController@datatable']);

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'RoleController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'RoleController@store']);
            });

            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'RoleController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'RoleController@update']);
                Route::delete('/', ['as' => 'destry', 'uses' => 'RoleController@destroy']);
            });
        });


//
//        Route::group(['prefix' => 'pages', 'as' => 'pages.', 'middleware' => ['permission:manage_pages']], function () {
//
//            Route::get('/', ['as' => 'index', 'uses' => 'PageController@index']);
//            Route::get('/datatable', ['as' => 'datatable','uses' => 'PageController@datatable']);
//
//            Route::group(['prefix' => 'create'], function () {
//                Route::get('/', ['as' => 'create', 'uses' => 'PageController@create']);
//                Route::post('/', ['as' => 'store', 'uses' => 'PageController@store']);
//            });
//            Route::group(['prefix' => '{id}'], function () {
//                Route::get('/edit', ['as' => 'edit', 'uses' => 'PageController@edit']);
//                Route::put('/edit', ['as' => 'update', 'uses' => 'PageController@update']);
//                Route::delete('/', ['as' => 'destry', 'uses' => 'PageController@destroy']);
//            });
//
//        });
//


        Route::group(['prefix' => 'faqs', 'as' => 'faqs.', 'middleware' => ['permission:manage_faqs']], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'FaqController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'uses' => 'FaqController@datatable']);

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'FaqController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'FaqController@store']);
            });
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'FaqController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'FaqController@update']);
                Route::delete('/', ['as' => 'destry', 'uses' => 'FaqController@destroy']);
            });
        });
        Route::group(['prefix' => 'items', 'as' => 'items.', 'middleware' => ['permission:manage_items']], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'ItemController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'uses' => 'ItemController@datatable']);

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'ItemController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'ItemController@store']);
            });
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'ItemController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'ItemController@update']);
                Route::delete('/', ['as' => 'destry', 'uses' => 'ItemController@destroy']);
            });
        });


        Route::group(['prefix' => 'about', 'as' => 'about.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'SettingsController@about']);
            Route::post('/', ['as' => 'store', 'uses' => 'SettingsController@storeAbout']);
        });

        Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'SettingsController@slider']);
            Route::post('/', ['as' => 'store', 'uses' => 'SettingsController@storeSlider']);
        });

        Route::group(['prefix' => 'post-type', 'as' => 'post-type.'], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'PostTypeController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'uses' => 'PostTypeController@datatable']);

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'PostTypeController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'PostTypeController@store']);
            });
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'PostTypeController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'PostTypeController@update']);
                Route::delete('/', ['as' => 'destry', 'uses' => 'PostTypeController@destroy']);
            });
        });


        Route::group(['prefix' => 'advocates', 'as' => 'advocates.'], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'AdvocateController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'uses' => 'AdvocateController@datatable']);

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'AdvocateController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'AdvocateController@store']);
            });
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'AdvocateController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'AdvocateController@update']);
                Route::delete('/', ['as' => 'destry', 'uses' => 'AdvocateController@destroy']);
            });
        });



        Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {
            Route::get('/' , ['as' => 'index' , 'uses' => 'ContactController@index']);
            Route::get('datatable' , 'ContactController@datatable');

            Route::group(['prefix' => '{id}'], function () {
                Route::delete('/', ['as' => 'destroy', 'uses' => 'ContactController@destroy']);
            });
        });


        Route::resource('settings', 'SettingsController')->except(['create', 'edit', 'show', 'destroy']);

//        Route::resource('slider' , 'SliderController')->except(['show' , 'edit' , 'update' ]);
//        Route::post('slider/update-visiblity/{id}' , 'SliderController@updateVisiblity')->name('slider.updateVisiblity');

    });


});
