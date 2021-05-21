<?php

namespace App\Util;

use App\Interfaces\Billing;
use PDF;
use Mail;
use App\Mail\Payment;
use Illuminate\Support\Facades\Auth;


class Bill implements Billing
{

    public function billPDF($request)
    {

        $data = $request->get('data');
        set_time_limit(300);

        view()->share($data);

        $pdf = PDF::loadView('shopping.pdf');

        return $pdf->download('payment.pdf');
    }

    public function billMail($request)
    {

        $data = $request->get('data');
        set_time_limit(300);

        Mail::to(Auth::user()->getEmail())->send(new Payment($data));
    }

}
