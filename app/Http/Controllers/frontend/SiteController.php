<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){

        $langs = ['English' , 'Arabic' , 'Franche' , 'Span'];
        $collection = collect($langs);

        $numbers = [60,150,300];
        $coll = collect($numbers)->count();

        return view('frontend.course.index' , compact(['collection','coll']));
    }
}
















//        $collection = collect(['dell', 'hp' , 'mac', null])->map(function ($name) {
//            return strtoupper($name);
//        })
//            ->reject(function ($name) {
//                return empty($name);
//            });
