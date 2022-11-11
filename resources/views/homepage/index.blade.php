@extends('layouts.template')
@section('content')
<div>
  <!-- carousel -->
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach($itemslide as $index => $slide )
          @if($index == 0)
          <div class="carousel-item active">
              <img src="{{ \Storage::url($slide->foto) }}" class="d-block w-100" alt="{{ $slide->caption_title }}">
              <div class="carousel-caption d-none d-md-block">
                <h5 class="invisible">{{ $slide->caption_title }}</h5>
                <p class="invisible">{{ $slide->caption_content }}</p>
              </div>
          </div>
          @else
          <div class="carousel-item">
              <img src="{{ \Storage::url($slide->foto) }}" class="d-block w-100" alt="{{ $slide->caption_title }}">
              <div class="carousel-caption d-none d-md-block">
                <h5 class="invisible">{{ $slide->caption_title }}</h5>
                <p class="invisible">{{ $slide->caption_content }}</p>
              </div>
          </div>
          @endif
          @endforeach    
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- end carousel -->
</div>
<!-- kategori produk -->
<div class="bg-transparent" style="margin-left: 60px; margin-right: 60px; margin-top: 30px;">
  <div class="btn-group d-flex flex-wrap shadow-none mt-1 mt-lg-1 mt-md-1 mt-xl-1 ms-2 ms-lg-2 ms-md-2 ms-xl-2">
    @foreach($itemkategori as $kategori)
    <a style="width: 150px; font-size: 13px; background-color: white;" href="category/{{ $kategori->slug_kategori }}" class="btn btn-outline-secondary rounded-3 align-self-center mt-1 mt-lg-1 mt-md-1 mt-xl-1 mx-2 mx-lg-2 mx-md-2 mx-xl-2 rounded">
      {{ $kategori->nama_kategori }}</span>
    </a>
    @endforeach
  </div>
</div>
<!-- end kategori produk -->
  <!-- produk Promo-->
  <div style="margin-left: 50px; margin-right: 50px; margin-top: 30px;">
    <div style="margin-left: 15px; margin-right: 15px; height: 40px; background-color: #00E833;" class="input-group-text text-white border-0" type="submit"><span><a>Produk Promo</a></span></div>
    <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3 ms-2 ms-lg-2 ms-md-2 ms-xl-2">
      @foreach($itempromo as $promo)
      <div class="col">
      <a href="{{ URL::to('produk/'.$promo->produk->slug_produk ) }}" style="all: unset;">
        <div class="card" style="height: 315px; margin-top:30px; border-radius: 20px"">
          <div style="height: 190px; max-width: 270px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
            <img src="{{ Storage::url($promo->produk->foto) }}" class="card-img-top" style="max-height: 190px; width: 100%;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text">{{ $promo->produk->nama_produk }}</p>
            </div>
            <div>
              <span>Rp. {{ number_format($promo->harga_akhir, 2) }}</span>
            </div>
            <div>
              <span class="text-muted text-decoration-line-through">Rp. {{ number_format($promo->harga_awal, 2) }}</span>
            </div>
          </div>
        </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
  <!-- end produk promo -->
  <!-- produk Terbaru-->
  <div style="margin-left: 50px; margin-right: 50px; margin-top: 30px;">
  <div style="margin-left: 15px; margin-right: 15px; height: 40px; background-color: #00E833;" class="input-group-text text-white border-0" type="submit"><span><a>Produk Terbaru</a></span></div>
    <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3 ms-2 ms-lg-2 ms-md-2 ms-xl-2">
      @foreach($itemproduk as $produk)
      <div class="col">
      <a href="{{ URL::to('produk/'.$produk->slug_produk ) }}" style="all: unset;">
        <div class="card" style="height: 315px; margin-top: 30px; border-radius: 20px">
          <div style="height: 190px; max-width: 270px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
            <img src="{{ Storage::url($produk->foto) }}" class="card-img-top" style="max-height: 190px; width: 100%;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text fw-bold">{{ $produk->nama_produk }}</p>
            </div>
            @if($produk->id == $promo->produk_id)
              <div>
                <span>Rp. {{ number_format($promo->harga_akhir, 2) }}</span>
              </div>
              <div>
                <span class="text-muted text-decoration-line-through">Rp. {{ number_format($promo->harga_awal, 2) }}</span>
              </div>              
          @else
              <div>
                <span>Rp. {{ number_format($produk->harga, 2) }}</span>
              </div>
          @endif
          </div>
        </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
  <!-- end produk terbaru -->
  <!-- tentang toko -->
  <hr>
  <div class="text-center text-white py-1 mt-4" style="background-color: #00E833; margin-left: auto; margin-right: auto;"><p><h4><b>GoodFance</b> Daily</h4></p></div>
  <!-- end tentang toko -->
  @endsection