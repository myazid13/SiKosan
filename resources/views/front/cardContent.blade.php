<div class="row match-height">
  @foreach ($kamar as $kamars)
    <div class="col-xl-3 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-content">
          <a href="{{url('room', $kamars->slug)}}">
            <img class="card-img-top img-fluid" src="{{asset('images/bg_foto/' .$kamars->bg_foto)}}" alt="Card image cap">
          </a>
          <div class="card-body">
            <a href="{{url('room', $kamars->slug)}}">
              <h5>{{$kamars->nama_kamar}}</h5>
              <div class="d-flex-justify-content-between">
                <span class="badge badge-light">{{$kamars->jenis_kamar}}</span>
                <span class="badge badge-info">Tersisa {{$kamars->sisa_kamar}} Kamar</span>
              </div>
              <p class="card-text mt-1 mb-0"><i class="feather icon-map-pin"></i>{{$kamars->provinsi->name}}</p>
              <span class="card-text" style="color: black"> {{rupiah($kamars->harga_kamar)}} / Bulan</span>
            </a>
            <div class="card-btn d-flex justify-content-between mt-2">
              <a href="#" class="btn gradient-light-{{$kamars->kategori == 'Kost' ? 'primary' : 'info'}} text-white btn-sm">{{$kamars->kategori}}</a>
              <a href="#" class="btn btn-outline-primary btn-sm {{$kamars->book == 0 ? 'hidden' : ''}}">Bisa Booking</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>