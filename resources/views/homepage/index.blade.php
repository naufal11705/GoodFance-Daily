@extends('layouts.template')
@section('content')
<div style="margin-left: 65px; margin-right: 65px; margin-top: 30px;">
  <!-- carousel -->
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="tales" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="tales" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="tales" alt="...">
      </div>
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
<div class="bg-transparent" style="margin-left: 50px; margin-right: 50px; margin-top: 30px;">
  <h4 style="margin-left: 15px;" class="fw-bolder">Categories</h4>
  <div class="btn-group d-flex flex-wrap shadow-none mt-1 mt-lg-1 mt-md-1 mt-xl-1 ms-2 ms-lg-2 ms-md-2 ms-xl-2">
    <a style="width: 150px; font-size: 13px;" href="#" class="btn btn-outline-secondary rounded-3 align-self-center mt-1 mt-lg-1 mt-md-1 mt-xl-1 mx-2 mx-lg-2 mx-md-2 mx-xl-2 rounded">
      <i class="fa-solid fa-person" style="margin-right: 10px;"></i>
      Pria</span>
    </a>
    <a style="width: 150px; font-size: 13px;" href="#" class="btn btn-outline-secondary rounded-3 align-self-center mt-1 mt-lg-1 mt-md-1 mt-xl-1 mx-2 mx-lg-2 mx-md-2 mx-xl-2 rounded">
      <i class="fa-solid fa-person-dress" style="margin-right: 10px;"></i>
      Wanita</span>
    </a>
    <a style="width: 150px; font-size: 13px;" href="#" class="btn btn-outline-secondary rounded-3 align-self-center mt-1 mt-lg-1 mt-md-1 mt-xl-1 mx-2 mx-lg-2 mx-md-2 mx-xl-2 rounded">
      <i class="fa-solid fa-volleyball" style="margin-right: 10px;"></i>
      Olahraga</span>
    </a>
    <a style="width: 150px; font-size: 13px;" href="#" class="btn btn-outline-secondary rounded-3 align-self-center mt-1 mt-lg-1 mt-md-1 mt-xl-1 mx-2 mx-lg-2 mx-md-2 mx-xl-2 rounded">
      <i class="fa-solid fa-child" style="margin-right: 10px;"></i>
      Anak</span>
    </a>
    <a style="width: 150px; font-size: 13px;" href="#" class="btn btn-outline-secondary rounded-3 align-self-center mt-1 mt-lg-1 mt-md-1 mt-xl-1 mx-2 mx-lg-2 mx-md-2 mx-xl-2 rounded">
      <i class="fa-solid fa-shirt" style="margin-right: 10px;"></i>
      Rumahan</span>
    </a>
  </div>
</div>
<!-- end kategori produk -->
  <!-- produk Promo-->
  <div style="margin-left: 50px; margin-right: 50px; margin-top: 30px;">
    <h4 style="margin-left: 15px;" class="fw-bolder">Promo</h4>
    <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3 ms-2 ms-lg-2 ms-md-2 ms-xl-2">
      <div class="col">
        <div class="card" style="height: 405px;">
          <div style="height: 275px; max-width: 270px; display: flex; align-items: center;">
            <img src="img/photo2.png" class="card-img-top" style="max-height: 275px;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text">Nama Produk</p>
            </div>
            <div>
              <p class="card-text fw-bold">Harga Diskon</p>
            </div>
            <div>
              <button type="button" class="btn btn-danger"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" disabled>
                100%
              </button>
              <span class="text-muted text-decoration-line-through">Harga discount</span>
            </div>
            <div>
              <i class="fa-solid fa-star text-warning"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 405px;">
          <div style="height: 275px; max-width: 270px; display: flex; align-items: center;">
            <img src="images/slide2.jpg" class="card-img-top" style="max-height: 275px;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text">Nama Produk</p>
            </div>
            <div>
              <p class="card-text fw-bold">Harga Diskon</p>
            </div>
            <div>
              <button type="button" class="btn btn-danger"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" disabled>
                100%
              </button>
              <span class="text-muted text-decoration-line-through">Harga discount</span>
            </div>
            <div>
              <i class="fa-solid fa-star text-warning"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 405px;">
          <div style="height: 275px; max-width: 270px; display: flex; align-items: center;">
            <img src="images/slide3.jpg" class="card-img-top" style="max-height: 275px;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text">Nama Produk</p>
            </div>
            <div>
              <p class="card-text fw-bold">Harga Diskon</p>
            </div>
            <div>
              <button type="button" class="btn btn-danger"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" disabled>
                100%
              </button>
              <span class="text-muted text-decoration-line-through">Harga discount</span>
            </div>
            <div>
              <i class="fa-solid fa-star text-warning"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 405px;">
          <div style="height: 275px; max-width: 270px; display: flex; align-items: center;">
            <img src="images/slide3.jpg" class="card-img-top" style="max-height: 275px;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text">Nama Produk</p>
            </div>
            <div>
              <p class="card-text fw-bold">Harga Diskon</p>
            </div>
            <div>
              <button type="button" class="btn btn-danger"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" disabled>
                100%
              </button>
              <span class="text-muted text-decoration-line-through">Harga discount</span>
            </div>
            <div>
              <i class="fa-solid fa-star text-warning"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 405px;">
          <div style="height: 275px; max-width: 270px; display: flex; align-items: center;">
            <img src="images/slide3.jpg" class="card-img-top" style="max-height: 275px;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text">Nama Produk</p>
            </div>
            <div>
              <p class="card-text fw-bold">Harga Diskon</p>
            </div>
            <div>
              <button type="button" class="btn btn-danger"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" disabled>
                100%
              </button>
              <span class="text-muted text-decoration-line-through">Harga discount</span>
            </div>
            <div>
              <i class="fa-solid fa-star text-warning"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end produk promo -->
  <!-- produk Terbaru-->
  <div style="margin-left: 50px; margin-right: 50px; margin-top: 30px;">
    <h4 style="margin-left: 15px;" class="fw-bolder">Terbaru</h4>
    <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3 ms-2 ms-lg-2 ms-md-2 ms-xl-2">
      <div class="col">
        <div class="card" style="height: 405px;">
          <div style="height: 275px; max-width: 270px; display: flex; align-items: center;">
            <img src="img/photo2.png" class="card-img-top" style="max-height: 275px;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text">Nama Produk</p>
            </div>
            <div>
              <p class="card-text fw-bold">Harga Diskon</p>
            </div>
            <div>
              <i class="fa-solid fa-star text-warning"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 405px;">
          <div style="height: 275px; max-width: 270px; display: flex; align-items: center;">
            <img src="images/slide2.jpg" class="card-img-top" style="max-height: 275px;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text">Nama Produk</p>
            </div>
            <div>
              <p class="card-text fw-bold">Harga Diskon</p>
            </div>
            <div>
              <i class="fa-solid fa-star text-warning"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 405px;">
          <div style="height: 275px; max-width: 270px; display: flex; align-items: center;">
            <img src="images/slide3.jpg" class="card-img-top" style="max-height: 275px;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text">Nama Produk</p>
            </div>
            <div>
              <p class="card-text fw-bold">Harga Diskon</p>
            </div>
            <div>
              <i class="fa-solid fa-star text-warning"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 405px;">
          <div style="height: 275px; max-width: 270px; display: flex; align-items: center;">
            <img src="images/slide3.jpg" class="card-img-top" style="max-height: 275px;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text">Nama Produk</p>
            </div>
            <div>
              <p class="card-text fw-bold">Harga Diskon</p>
            </div>
            <div>
              <i class="fa-solid fa-star text-warning"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 405px;">
          <div style="height: 275px; max-width: 270px; display: flex; align-items: center;">
            <img src="images/slide3.jpg" class="card-img-top" style="max-height: 275px;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text">Nama Produk</p>
            </div>
            <div>
              <p class="card-text fw-bold">Harga Diskon</p>
            </div>
            <div>
              <i class="fa-solid fa-star text-warning"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end produk terbaru -->
  <!-- tentang toko -->
  <hr>
  <div class="mt-4 px-5">
    <h5 class="text-center">GoodFance</h5>
    <p>
      GoodFance adalah e-commerce baru dari Indonesia yang menjual produk produk tentang fashion. Website ini sangat
    </p>
    <p>
      Toko adalah demo membangun toko online menggunakan laravel framework. Di dalam demo ini terdapat user bisa menginput data kategori, produk dan transaksi.
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum aliquam dolorum sequi nulla maiores quos incidunt veritatis numquam suscipit. Cumque dolore rem obcaecati. Eos quod ad non veritatis assumenda.
    </p>
    <p class="text-center">
      <a href="" class="btn btn-outline-secondary">
        Baca Selengkapnya
      </a>      
    </p>
  </div>
  <!-- end tentang toko -->
  @endsection