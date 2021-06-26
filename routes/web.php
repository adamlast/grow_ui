<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Core\ConfigGenerator;

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
    return redirect('/configList');
});

Route::get(
    '/time',
    function () {
        //return "time";
        return view('time');
    }
);

Route::redirect('/tine', '/time');

Route::get('/config',
    function () {
        $gen = new ConfigGenerator();
        return $gen->getConfig();
    });

Route::get('/diag/test', function () {
    try {
        DB::connection()->getPdo();
        if(DB::connection()->getDatabaseName()){
            echo "Yes! Successfully connected to the DB: " . DB::connection()->getDatabaseName();
        }else{
            echo("Could not find the database. Please check your configuration.");
        }
    } catch (\Exception $e) {
        echo("Could not open connection to database server.  Please check your configuration.");
    }
    echo "<br>";
    echo "App.URL: ".config('app.url');
    echo "<br>";
    echo "Current URL:".url()->current();
});

Route::get('createConfig', function() {
    $config = new App\Models\Config;
    $config->device_id = 'footest';
    $config->config_string = 'Config goes here';
    $config->save();
    Session::flash('message', 'New config created');
    return redirect('/configList');
});

Route::get('/configList', function() {
   $configs = App\Models\Config::orderBy('id','asc')->get();

   return view('config_list', [
       'configs' => $configs
   ]);
});

Route::delete('/config/{id}', function ($id) {
    App\Models\Config::findOrFail($id)->delete();
    Session::flash('message', "Config {$id} deleted");
    return redirect('/configList');
});

Route::get('/config/{id}', function ($id) {
    $config = App\Models\Config::findOrFail($id);
    return view('/config', ['config' => $config]);
});



