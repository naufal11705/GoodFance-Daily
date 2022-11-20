@extends('layouts.template')
@section('content')
@guest
<div class="mt-2 pb-2 bg-light" style="margin-left: 55px; margin-right: 50px;">
    <div class="mx-3">
        <h2 class="pt-3">Shopping Cart</h2>
        <p class="fw-normal fs-6 fst-italic">Your cart is empty.</p>
        <hr>
        <div style="align-items: center;" class="btn-group row row-cols-1 row-cols-lg-2 shadow-none mt-2 mt-lg-0 mt-md-0 mt-xl-0">
            <a style="width: 200px; font-size: 14px;" href="{{ route('login') }}" class="btn btn-outline-dark btn-sm align-self-center mx-2 mx-lg-3 mx-md-2 mx-xl-3 rounded fw-semibold">Sign in to your account</a>
            <a style="width: 120px; font-size: 14px;" href="{{ route('register') }}" class="btn btn-dark btn-sm align-self-center mt-1 mt-lg-0 mt-md-0 mt-xl-0 mx-2 mx-lg-0 mx-md-0 mx-xl-0 rounded fw-semibold">Sign up now</a>
        </div>
        <hr>
    </div>
</div>
@endguest

@auth
<div class="mt-2 pb-2 bg-light" style="margin-left: 55px; margin-right: 50px;">
    <h2 class="pt-3">Shopping Cart</h2>
    <div class="card-body">
        <table class="table table-stripped">
          <thead>
            <tr>
              <th>No</th>
              <th>Produk</th>
              <th>Harga</th>
              <th>Diskon</th>
              <th>Qty</th>
              <th>Subtotal</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($itemcart->detail as $detail)
            <tr>
              <td>
              {{ $no++ }}
              </td>
              <td>
              {{ $detail->produk->nama_produk }}
              <br />
              {{ $detail->produk->kode_produk }}
              </td>
              <td>
              {{ number_format($detail->harga, 2) }}
              </td>
              <td>
              {{ number_format($detail->diskon, 2) }}
              </td>
              <td>
                <div class="btn-group" role="group">
                  <form action="{{ route('cartdetail.update',$detail->id) }}" method="post">
                  @method('patch')
                  @csrf()
                    <input type="hidden" name="param" value="kurang">
                    <button class="btn btn-primary btn-sm">
                    -
                    </button>
                  </form>
                  <button class="btn btn-outline-primary btn-sm" disabled="true">
                  {{ number_format($detail->qty, 2) }}
                  </button>
                  <form action="{{ route('cartdetail.update',$detail->id) }}" method="post">
                  @method('patch')
                  @csrf()
                    <input type="hidden" name="param" value="tambah">
                    <button class="btn btn-primary btn-sm">
                    +
                    </button>
                  </form>
                </div>
              </td>
              <td>
              {{ number_format($detail->subtotal, 2) }}
              </td>
              <td>
              <form action="{{ route('cartdetail.destroy', $detail->id) }}" method="post" style="display:inline;">
                @csrf
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-sm btn-danger mb-2">
                  Hapus
                </button>                    
              </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</div>

<div class="bg-light rounded-bottom py-4 mt-2" id="zero-pad" style="margin-left: 55px; margin-right: 50px;">
  <div class="row d-flex justify-content-center">
      <div class="col-lg-10 col-12">
          <div class="d-flex justify-content-between align-items-center">
              <div>
                <form action="{{ url('kosongkan').'/'.$itemcart->id }}" method="post">
                  @method('patch')
                  @csrf()
                  <button type="submit" class="btn btn-warning btn-sm px-lg-5 px-1 btn-block">Kosongkan</button>
                </form>
              </div>
              <div class="px-md-0 px-1 fs-6" id="footer-font">
                  <b class="pl-md-4">SUBTOTAL: <span class="pl-md-4">Rp. {{ number_format($detail->subtotal, 2) }}</span></b>
              </div>
              <div>
                  <a href="/checkout" class="btn btn-sm btn-info text-dark px-lg-5 px-1">Checkout</a>
              </div>
          </div>
      </div>
  </div>
</div>
@endauth
@endsection
