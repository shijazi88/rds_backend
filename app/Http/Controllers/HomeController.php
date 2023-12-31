<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $permissions = Role::findOrFail(1)->permissions();
        $this->middleware('auth');
    }

    public function index()
    {
        
        return view('dashboard', [
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index(Request $request)
    // {
    //     if (view()->exists($request->path())) {
    //         return view($request->path());
    //     }
    //     return abort(404);
    // }

    public function root()
    {
        $permissions = Role::findOrFail(1)->permissions();
        // return view('index');
        return view('dashboard');

    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
       
    }

    public function updatePassword(Request $request, $id)
    {
       
    }

    


    public function landing(Request $request)
    {
        return view('landing');
        
    }
   
}
