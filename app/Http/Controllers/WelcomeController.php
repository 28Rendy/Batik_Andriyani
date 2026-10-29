<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        $news = Berita::latest()->take(4)->get();
        return view('welcome', compact('news'));


    }


}
