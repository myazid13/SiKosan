@extends('layouts.backend.app')
@section('title','Data Promo Kosan')
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
              <h4 class="card-title">Data List Promo Kamar
                <a href="{{route('kamar.promo.create')}}" class="btn btn-primary btn-sm">Tambah Promo Kamar</a>
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
                      <th class="text-nowrap">Status</th>
                      <th class="text-nowrap">Jenis Kamar</th>
                      <th class="text-nowrap">Tersedia</th>
                      <th class="text-nowrap">Sisa</th>
                      <th class="text-nowrap">Harga Kamar</th>
                      <th class="text-nowrap">Harga Promo</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($promo as $key => $item)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$item->kamar->nama_kamar}}</td>
                      <td>{{$item->status == 1 ? 'Aktif' : 'Expired'}}</td>
                      <td>{{$item->kamar->jenis_kamar}}</td>
                      <td>{{$item->kamar->stok_kamar}}</td>
                      <td>{{$item->kamar->sisa_kamar}}</td>
                      <td>{{rupiah($item->kamar->harga_kamar)}}</td>
                      <td>{{rupiah($item->harga_promo)}}</td>
                      <td class="text-center">
                        <a data-id-inactive="{{$item->id}}" id="inactive" class="btn btn-info btn-sm mr-sm-1 mb-1 mb-sm-0" style="color: black">{{$item->status == 1 ? 'In Active' : 'Active'}}</a>
                      </td>
                    </tr>
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
@section('scripts')
  <script src="{{asset('ctrl/backend/confirm.js')}}"></script>
@endsection