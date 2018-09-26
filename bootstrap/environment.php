<?php

/*
|--------------------------------------------------------------------------
| Code in bootstrap/environment.php
|--------------------------------------------------------------------------
| Detect The Application Environment
|--------------------------------------------------------------------------
|
| Dotenv package is not accessible in the file so we will use the other way around.
| Create an instance of Dotenv class which takes two parameters:
| $dotenv = new Dotenv\Dotenv(path_to_env_file, name_of_file);
|
*/
$app->detectEnvironment(function () use ($app) {
    if (!isset($_SERVER['HTTP_HOST'])) {
        $file = $app->environmentFile();
        //Dotenv::load($app['path.base'], $app->environmentFile());
        //$dotenv->load();
    } else {
        $pos = mb_strpos($_SERVER['HTTP_HOST'], '.');
        $prefix = '';
        if ($pos) {
            $prefix = mb_substr($_SERVER['HTTP_HOST'], 0, $pos);
        }
        $file = '.' . $prefix . '.env';

        if (!file_exists($app['path.base'] . '/' . $file)) {
            $file = '.env';
        }
    }

    $dotenv = new Dotenv\Dotenv($app['path.base'], $file);

    $dotenv->load();
});

//$app->afterLoadingEnvironment(function () use ($app) {
//    //$subdomain = explode('.', $_SERVER['HTTP_HOST'])[0];
//    //$app->make(\Illuminate\Http\Request::class);
//    $subdomain = $app->make('router')->current()->parameter('subdomain');
//    dd($subdomain);
//    if (file_exists(__DIR__ . '/../.' . $subdomain . '.env')) {
//        $dotenv = new Dotenv\Dotenv(__DIR__ . '/../', '.' . $subdomain . '.env');
//        $dotenv->overload();
//    }
//});
