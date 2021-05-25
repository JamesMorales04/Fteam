<?php

namespace App\Http\Controllers;

class ExternalApi extends Controller
{
    public function requestApi()
    {
        $url = 'http://matildalamatita.tk/matilda_la_matita/public/api/seeds';

        $response = file_get_contents($url);

        $externalData = json_decode($response);

        return view('externalApi.showAllSeeds')->with('data', $externalData->data);
    }
}
