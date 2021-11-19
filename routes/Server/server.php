<?php


use Illuminate\Support\Facades\Route;

Route::get('/show_all_tables', function () {
    $tables = DB::select('SHOW TABLES');
    dd($tables);
//    echo '[';
//    foreach ($tables as $table) {
//        print_r($table);
//    }
//    echo ']';
});

Route::get('/show_table/{table_name}', function ($table_name) {

    return Schema::getColumnListing($table_name);

});

Route::get('/add_clients', function () {

    Artisan::call('passport:install');

});

Route::get('/seed', function () {

    Artisan::call('db:seed');

});

Route::get('/storage_link', function () {

    Artisan::call('storage:link');

});

Route::get('config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<h1>cache config cleared!</h1>';
});

Route::get('/migrate', function () {
    Artisan::call('migrate',
        array(
            '--path' => 'database/migrations',
            //'--database' => 'dynamicdb',
            //  '--force' => true
        )
    );
});

Route::get('get_table_data/{table_name}',function(Request $request){
    $items = DB::table(\request()->route()->table_name)->get();
    $ths = "";
    foreach ($items[0] as $key=>$value){
        $ths .= "<th style='border: 1px solid #aaaaaa'>$key</th>";
    }
    $head = "<thead><tr>$ths</tr></thead>";
    $trs = "";
    for($i=1 ; $i < $items->count(); $i++){
        $tds = "";
        foreach ($items[$i] as $value)
            $tds .= "<td style='border: 1px solid #aaaaaa'>$value</td>";
        $trs .= "<tr>$tds</tr>";
    }
    $body = "<tbody>$trs</tbody>";
    return "<table style='border: 1px solid #aaaaaa'>$head $body</table>";
});
