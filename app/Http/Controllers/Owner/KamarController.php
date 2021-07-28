<?php

namespace App\Http\Controllers\Owner;
use ErrorException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Owner\KamarService;
use App\Http\Requests\KamarRequest;
class KamarController extends Controller
{
    protected $kamar;

    public function __construct(KamarService $kamar)
    {
      $this->kamar = $kamar;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try {
        $result = $this->kamar->index();
        return $result;
      } catch (ErrorException $e) {
        throw new ErrorException($e->getMessage());
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      try {
        $result = $this->kamar->create();
        return $result;
      } catch (ErrorException $e) {
        throw new ErrorException($e->getMessage());
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KamarRequest $request)
    {
      try {
        $result = $this->kamar->store($request->all());
        return $result;
      } catch (ErrorException $e) {
        throw new ErrorException($e->getMessage());
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $show = kamar::where('slug', $slug)->where('user_id',auth::id())->first();
      return view('pemilik.kamar.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $edit = kamar::where('id', $id)->first();
      // dd($edit);
      $provinsi = provinsi::select('kode','nama')->get();
      return view('pemilik.kamar.edit', compact('edit','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $kamar = Kamar::findOrFail($id);
      $kamar->user_id = auth::id();
      $kamar->nama_kamar = $request->nama_kamar;
      $kamar->jenis_kamar = $request->jenis_kamar;
      $kamar->luas_kamar = $request->luas_kamar;
      $kamar->stok_kamar = $request->stok_kamar;
      $kamar->sisa_kamar = $kamar->stok_kamar;
      $kamar->harga_kamar = $request->harga_kamar;
      $kamar->ket_lain = $request->ket_lain;
      $kamar->ket_biaya = $request->ket_biaya;
      $kamar->desc = $request->desc;
      $kamar->kategori = $request->kategori;
      $kamar->book = $request->book;
      $kamar->provinsi_id = $request->provinsi_id;
      $kamar->save();

       if ($kamar) {
        if ($request->addmore) {
          foreach($request->addmore as $value){
            $fkamar = new fkamar;
            $fkamar->kamar_id = $id;
            $fkamar->name = $value['name'];
            $fkamar->save();
          }
        }
      }

      if ($kamar ) {
        if ($request->addkm) {
          foreach ($request->addkm as $value) {
            $fkamar_mandi = new fkamar_mandi;
            $fkamar_mandi->kamar_id = $id;
            $fkamar_mandi->name = $value['name'];
            $fkamar_mandi->save();
          }
        }
      }

      if ($kamar ) {
        if ($request->addbersama) {
          foreach ($request->addbersama as $value) {
            $fbersama = new fbersama;
            $fbersama->kamar_id = $id;
            $fbersama->name = $value['name'];
            $fbersama->save();
          }
        }
      }

      if ($kamar) {
        if ($request->addparkir) {
          foreach ($request->addparkir as $value) {
            $fparkir = new fparkir;
            $fparkir->kamar_id = $id;
            $fparkir->name = $value['name'];
            $fparkir->save();
          }
        }
      }

      if ($kamar) {
        if ($request->addarea) {
          foreach ($request->addarea as $value) {
            $area = new area;
            $area->kamar_id =  $id;
            $area->name = $value['name'];
            $area->save();
          }
        }
      }

      Session::flash('success','Kamar Berhasil Di Update !');
      return redirect('pemilik/kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
