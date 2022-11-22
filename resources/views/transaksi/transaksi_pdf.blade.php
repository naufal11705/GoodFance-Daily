<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-8 col-md-8 mb-2">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Transaksi</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Kode
                  </th>
                  <th>
                    Nama
                  </th>
                  <th>
                    Harga
                  </th>
                  <th>
                    Qty
                  </th>
                  <th>
                    Subtotal
                  </th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemcart->detail as $detail)
                <tr>
                  <td>{{ ++$no }}</td>
                  <td>{{ $detail->produk->kode_produk }}</td>
                  <td>{{ $detail->produk->nama_produk }}</td>
                  <td class="text-right">{{ number_format($detail->produk->harga, 2) }}</td>
                  <td class="text-right">{{ $detail->qty }}</td>
                  <td class="text-right">{{ number_format($detail->subtotal, 2) }}</td>
                </tr>
              @endforeach
                <tr>
                  <td colspan="5">
                    <b>Total</b>
                  </td>
                  <td class="text-right">
                    <b>{{ number_format($itemcart->subtotal, 2) }}</b>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col col-lg-4 col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ringkasan</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    Total
                  </td>
                  <td>
                    {{ number_format($itemcart->total, 2) }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Subtotal
                  </td>
                  <td>
                    {{ number_format($itemcart->subtotal, 2) }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Diskon
                  </td>
                  <td>
                    {{ number_format($itemcart->diskon, 2) }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Ongkir
                  </td>
                  <td>
                    {{ number_format($itemcart->ongkir, 2) }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Ekspedisi
                  </td>
                  <td>
                    {{ $itemcart->ekspedisi }}
                  </td>
                </tr>
                <tr>
                  <td>
                    No. Resi
                  </td>
                  <td>
                    {{ $itemcart->no_resi }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Status Pembayaran
                  </td>
                  <td>
                    {{ $itemcart->status_pembayaran }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Status
                  </td>
                  <td>
                    {{ $itemcart->status_pengiriman }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
