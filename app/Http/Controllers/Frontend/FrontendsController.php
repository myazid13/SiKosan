<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{kamar,provinsi,Testimoni,User};

class FrontendsController extends Controller
{
    //Homepage
    public function homepage()
    {
      $kamar = kamar::all();
      // $countkamar = kamar::count();
      // $Testimoni = Testimoni::with('User')->get();
      // return view('frontend.index', compact('kamar','countkamar','Testimoni'));
      return view('front.index', \compact('kamar'));
    }

    // Show Kamar
    public function showkamar($slug)
    {
      $kamar = kamar::where('slug', $slug)->first();
      return view('front.show', compact('kamar'));
    }

}
