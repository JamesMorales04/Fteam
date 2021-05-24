<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ExternalApi extends Controller
{

    public function requestApi()
    {

        $url = 'https://jsonplaceholder.typicode.com/posts';

        $response = file_get_contents($url);
        $externalData = json_decode($response);

        return view('externalApi.showAllSeeds')->with('data', $externalData);
    }
}