@extends('layouts.template')
@section('content')

<style>
    .checked {
        color: orange;
    }
</style>

<!-- As a heading -->
<nav class="navbar py-1" style="background-color: #DEFCE5; padding-right: 57px; padding-left: 57px;">
    <div class="container-fluid" style="background-color: #DEFCE5;">
        <span class="navbar-brand text-black fs-6">
            <i class="fa-solid fa-circle-info me-1"></i>Hasil pencarian untuk '{{ $search }}'
        </span>
        <div class="">
            <!--<button class="btn btn-info text-white" style="padding: 3px 10px 3px 10px; background-color: #00E833; border: none;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                <i class="fa-solid fa-filter me-1"></i>Filter
            </button>-->

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

<div class="container-fluid mt-4" style="padding-right: 65px; padding-left: 65px;">
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
            @foreach($promo as $promos)
            @if($produks->id == $promos->produk_id)
                <div>
                    <span>Rp. {{ number_format($promos->harga_akhir, 2) }}</span>
                </div>
                <div>
                    <span class="text-muted text-decoration-line-through">Rp. {{ number_format($promos->harga_awal, 2) }}</span>
                </div>              
            @else
                <div>
                    <span>Rp. {{ number_format($produks->harga, 2) }}</span>
                </div>
            @endif
            @endforeach            
          </div>
        </div>
        </a>
      </div>
      @endforeach
        
    </div>
</div>
 <div class="text-center text-white py-3 mt-4" style="background-color: #00E833; margin-left: auto; margin-right: auto;"><p><h4><b>GoodFance</b> Daily</h4></p></div>

@endsection