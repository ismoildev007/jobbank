<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function setLocale(Request $request)
    {
        $lang = $request->input('lang');
        if (in_array($lang, ['en', 'uz', 'ru', 'tr'])) {
            session(['locale' => $lang]);
            app()->setLocale($lang);
        }
        return redirect()->back();
    }

}
