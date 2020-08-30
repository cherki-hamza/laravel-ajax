<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($service){
      return Socialite::driver($service)->redirect();
    }

    public function callback($service){
      return  $user = Socialite::with($service)->user();
    }
}
