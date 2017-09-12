<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {

        // TODO:
        // Setup UUID for eagle and events in DB and fix relations

        // Return a list of events
        // $api->get('eagle/{eagle_id}/events', 'App\Api\V1\Controllers\SignUpController@signUp');

        // Add new event for specific eagle
        // $api->post('eagle/{eagle_id}/events', 'App\Api\V1\Controllers\SignUpController@signUp');

        // Get user data

        // Change user

        // Add a new eagle eye

        // Get eagle data

        // Change eagle state



        // =====================================================================

        // THIS IS A TEST ROUTE
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
            ]);
        });

        // This can be used to update the access token, but seriously, don't.
        // It's way better to just log out and log in again
        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);
    });

    $api->get('hello', function() {
        return response()->json([
            'message' => 'Hi, looks like you found our api, that\'s cool! But seriously, there is nothing to see here unless you sign in first!'
        ]);
    });
});
