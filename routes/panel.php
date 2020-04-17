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


        Route::group(['prefix' => 'profile' , 'as' =>'profile.'], function () {
            Route::get('/' , ['as' => 'show'  , 'uses' => 'AdminController@showProfile']);
            Route::post('/' , ['as' => 'update'  , 'uses' => 'AdminController@updateProfile']);
        });

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

//            Route::group(['prefix' => 'create'], function () {
//                Route::get('/', ['as' => 'create', 'uses' => 'ItemController@create']);
//                Route::post('/', ['as' => 'store', 'uses' => 'ItemController@store']);
//            });
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'ItemController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'ItemController@update']);
//                Route::delete('/', ['as' => 'destry', 'uses' => 'ItemController@destroy']);
            });
        });


        Route::group(['prefix' => 'about', 'as' => 'about.' , 'middleware' => ['permission:manage_about']], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'AboutController@index']);
            Route::post('/', ['as' => 'store', 'uses' => 'AboutController@store']);
        });

        Route::group(['prefix' => 'slider', 'as' => 'slider.', 'middleware' => ['permission:manage_slider']], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'SliderController@index']);
            Route::post('/', ['as' => 'store', 'uses' => 'SliderController@store']);
        });

        Route::group(['prefix' => 'post-type', 'as' => 'post-type.', 'middleware' => ['permission:manage_post_type'] ], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'PostTypeController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'uses' => 'PostTypeController@datatable']);

//            Route::group(['prefix' => 'create'], function () {
//                Route::get('/', ['as' => 'create', 'uses' => 'PostTypeController@create']);
//                Route::post('/', ['as' => 'store', 'uses' => 'PostTypeController@store']);
//            });
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'PostTypeController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'PostTypeController@update']);
//                Route::delete('/', ['as' => 'destry', 'uses' => 'PostTypeController@destroy']);
            });
        });


        Route::group(['prefix' => 'memberships', 'as' => 'memberships.', 'middleware' => ['permission:manage_members']], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'MembershipController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'uses' => 'MembershipController@datatable']);

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'MembershipController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'MembershipController@store']);
            });
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'MembershipController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'MembershipController@update']);
                Route::delete('/', ['as' => 'destry', 'uses' => 'MembershipController@destroy']);
            });
        });


        Route::group(['prefix' => 'expenses', 'as' => 'expenses.', 'middleware' => ['permission:manage_expenses']], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'ExpensesController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'uses' => 'ExpensesController@datatable']);

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'ExpensesController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'ExpensesController@store']);
            });
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'ExpensesController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'ExpensesController@update']);
                Route::delete('/', ['as' => 'destry', 'uses' => 'ExpensesController@destroy']);
            });
        });

        Route::group(['prefix' => 'famous', 'as' => 'famous.', 'middleware' => ['permission:manage_famous']], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'FamousController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'uses' => 'FamousController@datatable']);

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'FamousController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'FamousController@store']);
            });
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'FamousController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'FamousController@update']);
                Route::delete('/', ['as' => 'destry', 'uses' => 'FamousController@destroy']);
            });
        });

        Route::group(['prefix' => 'recommendations', 'as' => 'recommendations.', 'middleware' => ['permission:manage_rec']], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'RecommendationController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'uses' => 'RecommendationController@datatable']);

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'RecommendationController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'RecommendationController@store']);
            });
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'RecommendationController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'RecommendationController@update']);
                Route::delete('/', ['as' => 'destry', 'uses' => 'RecommendationController@destroy']);
            });
        });

        Route::group(['prefix' => 'transactions', 'as' => 'transactions.', 'middleware' => ['permission:manage_transactions']], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'TransactionController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'uses' => 'TransactionController@datatable']);

        });

        Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {
            Route::get('/' , ['as' => 'index' , 'uses' => 'ContactController@index']);
            Route::get('datatable' , 'ContactController@datatable');

            Route::group(['prefix' => '{id}'], function () {
                Route::delete('/', ['as' => 'destroy', 'uses' => 'ContactController@destroy']);
            });
        });


        Route::resource('settings', 'SettingsController')->except(['create', 'edit', 'show', 'destroy']);


    });


});
