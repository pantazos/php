<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Service
    Route::delete('services/destroy', 'ServiceController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServiceController');

    // Status
    Route::delete('statuses/destroy', 'StatusController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusController');

    // Booking
    Route::delete('bookings/destroy', 'BookingController@massDestroy')->name('bookings.massDestroy');
    Route::resource('bookings', 'BookingController', ['except' => ['create', 'store']]);

    // Review
    Route::delete('reviews/destroy', 'ReviewController@massDestroy')->name('reviews.massDestroy');
    Route::resource('reviews', 'ReviewController', ['except' => ['create', 'store']]);

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingsController', ['except' => ['show']]);

    // Commission
    Route::delete('commissions/destroy', 'CommissionController@massDestroy')->name('commissions.massDestroy');
    Route::resource('commissions', 'CommissionController');

    // Earning
    Route::resource('earnings', 'EarningController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Payout
    Route::get('payouts/{provider}', 'PayoutController@create')->name('payouts.create');
    Route::resource('payouts', 'PayoutController', ['except' => ['create', 'edit', 'update', 'show', 'destroy']]);

    // Payments
    Route::resource('payments', 'PaymentsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
