@extends('layouts.backend.app')
@section('title','Data Kosan')
@section('content')
  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @elseif($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @endif

<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Data List Kamar
                <a href="{{route('kamar.create')}}" class="btn btn-primary btn-sm">Tambah Kamar</a>
              </h4>
          </div>
          <div class="card-content">
            <div class="card-body card-dashboard">
              <div class="table-responsive">
                <table class="table zero-configuration">
                  <thead>
                    <tr>
                      <th width="1%">No</th>
                      <th class="text-nowrap">Nama Kamar</th>
                      <th class="text-nowrap">Type Kamar</th>
                      <th class="text-nowrap">Jenis Kamar</th>
                      <th class="text-nowrap">Tersedia</th>
                      <th class="text-nowrap">Harga Kamar</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($kamar as $item)
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{$item->nama_kamar}}</td>
                        <td>{{$item->kategori}}</td>
                        <td>{{$item->jenis_kamar}}</td>
                        <td>{{$item->stok_kamar}}</td>
                        <td>{{$item->harga_kamar}}</td>
                        <td class="text-center">
                          <a href="{{route('kamar.show', $item->slug)}}" class="btn btn-info btn-sm">Show</a>
                          <a href="{{route('kamar.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                      </tr>
                      @php
                        $no++;
                      @endphp
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>

@endsection