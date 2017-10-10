<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::get('books', function() {
    return Parser::xml(file_get_contents(public_path('xml/books.xml')));
});

Route::get('topup', function() {
    $top = file_get_contents(public_path('xml/books.xml'));
    $xml = new SimpleXMLElement($top);
    header('Content-Type: application/xml');
    echo $xml->asXML();
});
