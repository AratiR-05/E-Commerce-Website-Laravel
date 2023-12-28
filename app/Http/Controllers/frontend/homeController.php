<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class homeController extends Controller
{

    public function index()
    {
        return view('frontend.home');
    }
    public static function catget()
    {
        $datas = Category::get();
        return $datas;
    }

}