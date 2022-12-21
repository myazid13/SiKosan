@extends('layouts.front.app')
@section('description')
  SiKosan, cari kos makin mudah hanya di SiKosan. aplikasi pencari kos di indonesia.
@endsection
@section('title')
  Selamat Datang di SiKosan
@endsection


@section('content')
  @include('front.banner')
  <br><br><br>
  @if ($promo->count() > 0)
    @include('front.sliderCard')
  @endif
  <br><br><br>
  @include('front.cardContent')
  <br><br><br>
  @include('front.byKota')

@endsection