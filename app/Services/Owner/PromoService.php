<?php

namespace App\Services\Owner;
use ErrorException;
use App\Models\{Promo,kamar};
use Session;
use Auth;


class PromoService {

  // Promo Kamar
  public function promo()
  {
    try {
      $promo = Promo::with('kamar')->where('pemilik_id',Auth::id())->get();
      // return $promo;
      return \view('pemilik.kamar.promo', \compact('promo'));
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage());
    }
  }

  // Promo Create
  public function promoCreate()
  {
    try {
      $kamar = kamar::doesntHave('promo')
      ->where('user_id', Auth::id())
      ->get();

      // $harga
      return view('pemilik.kamar.promoCreate', \compact('kamar'));
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage());
    }
  }

  // Promo Process
  public function promoProces($params)
  {
    try {
      $promo = Promo::create([
        'kamar_id'    => $params['kamar_id'],
        'pemilik_id'  => Auth::id(),
        'harga_promo' => $params['harga_promo'],
        'keterangan'  => $params['keterangan'],
        'status'      => '1'
      ]);
      Session::flash('success','Promo berhasil ditambah');
      return redirect()->route('kamar.promo');
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage());
    }
  }

  // Inactive Promo
  public function inactivePromo($params)
  {
    try {
      $inactive = Promo::find($params);
      $inactive->update([
        'status'  => $inactive->status == '1' ? '0' : '1'
      ]);
      Session::flash('success','Promo berhasil di update');
      return $inactive;
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage());
    }
  }

}