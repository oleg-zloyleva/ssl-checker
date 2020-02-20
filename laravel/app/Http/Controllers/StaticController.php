<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Jobs\SendContactFormByEmail;
use App\Jobs\SendSmsEmailToUser;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

    public function send_mail(ContactFormRequest $request)
    {
        if (dispatch(new SendContactFormByEmail($request->Email, $request->Subject, $request->Message))){
            return response()->json( [
                'status'=>'success',
                'data'=>'Mail was sent.'
            ]);
        };
    }
}
