<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRequest;
use App\Models\Merchant;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SiteController extends Controller
{
    public function checkSsl()
    {
        $exitCode = Artisan::call('check:ssl');
        return redirect()->back()->with(['result'=>$exitCode]);
    }
}
