<?php

namespace App\Http\Controllers;

class LangController extends Controller
{
    public function change($locale)
    {
        \Session::put('locale', $locale);

        return redirect()->back();
    }
}
