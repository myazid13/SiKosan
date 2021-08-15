<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{kamar,provinsi,Testimoni,User};

class FrontendsController extends Controller
{
<<<<<<< HEAD

    // Homepage
    public function homepage(Request $request)
    {
      $cari = $request->cari;

      $kamar = kamar::whereHas('provinsi', function($q) use ($cari) {
        $q->where('name', 'like', "%".$cari."%")
        ;
      })
      ->orwhereHas('regencies', function($q) use ($cari){
        $q->where('name', 'like', "%".$cari."%");
      })
      ->orwhereHas('district', function($q) use ($cari){
        $q->where('name', 'like', "%".$cari."%");
      })
      ->orwhere('nama_kamar', 'like', "%".$cari."%")
      ->paginate(12);
=======
    // Homepage
    public function homepage()
    {
      $kamar = kamar::paginate(8);
>>>>>>> cc2ddec464216fc15090fb94e626982ae160a8ca
      return view('front.index', \compact('kamar'));
    }

    // Show Kamar
    public function showkamar($slug)
    {
      $kamar = kamar::where('slug', $slug)->first();
<<<<<<< HEAD

      return view('front.show', compact('kamar'));
    }

    // Show semua kamar
    public function showAllKamar(Request $request)
    {
      $cari = $request->cari;
      $allKamar = kamar::whereHas('provinsi', function($q) use ($cari) {
=======
      return view('front.show', compact('kamar'));
    }

    public function cariKamar(Request $request)
    {
      $cari = $request->cari;

      $kamar = kamar::whereHas('provinsi', function($q) use ($cari) {
>>>>>>> cc2ddec464216fc15090fb94e626982ae160a8ca
        $q->where('name', 'like', "%".$cari."%")
        ;
      })
      ->orwhereHas('regencies', function($q) use ($cari){
        $q->where('name', 'like', "%".$cari."%");
      })
      ->orwhereHas('district', function($q) use ($cari){
        $q->where('name', 'like', "%".$cari."%");
      })
      ->orwhere('nama_kamar', 'like', "%".$cari."%")
      ->paginate(12);
<<<<<<< HEAD

      $provinsi = Kamar::with('provinsi')->select('province_id')->groupby('province_id')->get();
      $select = [];
      $select['jenis_kamar'] = $request->jenis_kamar;
      $select['name']        = $request->nama_provinsi;
      return view('front.allCardContent', \compact('allKamar','select','provinsi'));
    }

    // Filter kamar
    public function filterKamar(Request $request)
    {
      if ($request->nama_provinsi != 'all' && $request->jenis_kamar != 'all') {
        $allKamar = kamar::whereHas('provinsi', function($q) use ($request) {
          $q->where('name', $request->nama_provinsi);
        })
        ->where('jenis_kamar', $request->jenis_kamar)
        ->paginate(20);
      } elseif($request->nama_provinsi == 'all' && $request->jenis_kamar != 'all') {
        $allKamar = kamar::where('jenis_kamar', $request->jenis_kamar)->paginate(20);
      } elseif($request->nama_provinsi != 'all' && $request->jenis_kamar == 'all') {
          $allKamar = kamar::whereHas('provinsi', function($q) use ($request) {
          $q->where('name', $request->nama_provinsi);
        })
        ->paginate(20);
      } else {
        $allKamar = kamar::paginate(20);
      }


      $select = [];
      $select['jenis_kamar'] = $request->jenis_kamar;
      $select['name']        = $request->nama_provinsi;

      // select provinsi
      $provinsi = Kamar::with('provinsi')->select('province_id')->groupby('province_id')->get();
      return view('front.allCardContent', \compact('allKamar','select','provinsi'));
    }

    // Show by kota
    public function showByKota(Request $request)
    {
      $kota = $request->kota;
      $kamar = kamar::whereHas('provinsi', function($q) use ($kota) {
        $q->where('name', 'like', "%".$kota."%");
      })
      ->orwhereHas('regencies', function($q) use ($kota){
        $q->where('name', 'like', "%".$kota."%");
      })
      ->paginate(12);
      return view('front.showByKota', \compact('kamar','kota'));
=======
      return view('front.index', \compact('kamar'));
>>>>>>> cc2ddec464216fc15090fb94e626982ae160a8ca
    }

}
