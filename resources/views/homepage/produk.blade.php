@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row mt-4">
    <div class="col col-lg-3 col-md-3 mb-2">
      <div class="card">
        <div class="card-header fw-bold">
          <h3>Category</h3>
        </div>
        <ul class="list-group list-group-flush">
          @foreach($listkategori as $kategori)
          <a href="{{ URL::to('category/'.$kategori->slug_kategori) }}" class="text-decoration-none">
            <li class="list-group-item">{{ $kategori->nama_kategori }}</li>
          </a>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="col col-lg-9 col-md-9 mb-2">
      @if(isset($itemkategori))
      <span>Menampilkan hasil pencarian dari kategori "{{ $itemkategori->nama_kategori }}"</span>
      @else
      <h3>Semua Kategori</h3>
      @endif
      <div class="row mt-4">
      @foreach($itemproduk as $produk)
      @foreach($itempromo as $promo)
      <div class="col-md-3">
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
      @endforeach
      </div>
      <div class="row">
        <div class="col">
          {{ $itemproduk->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection