<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface Billing
{
    public function billPdf(Request $request);

    public function billMail(Request $request);
}
