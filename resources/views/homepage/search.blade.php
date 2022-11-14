@extends('layouts.template')
@section('content')

<style>
    .checked {
        color: orange;
    }
</style>

<!-- As a heading -->
<nav class="navbar bg-success shadow py-1">
    <div class="container-fluid">
        <span class="navbar-brand text-white fs-6">
            <i class="fa-solid fa-circle-info me-1"></i>Hasil pencarian untuk '{{ $search }}'
        </span>
        <div class="">
            <button class="btn btn-info text-white" style="padding: 3px 10px 3px 10px" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                <i class="fa-solid fa-filter me-1"></i>Filter
            </button>

            <div class="offcanvas offcanvas-top" style="height: 210px;" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header pb-2">
                    <h3 class="offcanvas-title fw-bold" id="offcanvasTopLabel">Filter</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <hr class="my-0 mb-2">
                <div class="offcanvas-body pt-0">
                    <div class="container-fluid">
                        <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
                            <div class="col">
                                <p class="mb-0">Urutkan berdasarkan:</p>

                                <select class="form-select form-select-sm" aria-label="Default select example">
                                    <option value="Terkait" selected>Terkait</option>
                                    <option value="Harga: Terendah - Tertinggi">Harga: Terendah - Tertinggi</option>
                                    <option value="Harga: Tertinggi - Terendah">Harga: Tertinggi - Terendah</option>
                                </select>
                            </div>

                            <div class="col">
                                <p class="mb-0">Batas Harga</p>

                                <div class="row g-2">
                                    <div class="input-group col">
                                        <span class="input-group-text bg-white border border-end-0" id="basic-addon1">Rp</span>
                                        <input type="text" class="form-control bg-white border border-start-0" placeholder="Min" aria-label="First name">
                                    </div>
                                    <div class="input-group col">
                                        <span class="input-group-text bg-white border border-end-0" id="basic-addon1">Rp</span>
                                        <input type="text" class="form-control bg-white border border-start-0" placeholder="Max" aria-label="Last name">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-info mt-2 w-100 shadow">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid mt-4">
    <h4 class="fw-semibold">Hasil</h4>
    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
        @foreach($produk as $produks)
        <div class="col">
        <a href="{{ URL::to('produk/'.$produks->slug_produk ) }}" style="all: unset;">
        <div class="card" style="height: 315px; margin-top: 30px; border-radius: 20px">
          <div style="height: 190px; max-width: 270px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
            <img src="{{ Storage::url($produks->foto) }}" class="card-img-top" style="max-height: 190px; width: 100%;" alt="...">
          </div>
          <div class="card-body">
            <div>
              <p class="card-text fw-bold">{{ $produks->nama_produk }}</p>
            </div>              
          </div>
        </div>
        </a>
      </div>
      @endforeach
        
    </div>
</div>

@endsection