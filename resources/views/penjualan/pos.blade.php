@extends('layouts.app')

@section('title', 'POS')

@section('content')
<style>
    .page-bg-full {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: linear-gradient(135deg, #eef2ff 0%, #fdf2f8 100%);
        z-index: -1;
    }

    .content-wrapper-soft {
        padding: 1rem;
        position: relative;
        z-index: 1;
    }

    .content-wrapper-soft h4 {
        color: #4c1d95;
        font-weight: 700;
    }

    .content-wrapper-soft .card {
        border: 1px solid #f1eafe;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.08);
    }

    .content-wrapper-soft .form-control,
    .content-wrapper-soft .form-select {
        border: 1.5px solid #e0d7f5;
        border-radius: 10px;
    }

    .content-wrapper-soft .form-control:focus,
    .content-wrapper-soft .form-select:focus {
        border-color: #a78bfa;
        box-shadow: 0 0 0 4px rgba(167, 139, 250, 0.15);
    }

    .content-wrapper-soft .btn-outline-primary {
        border-radius: 10px;
        border-color: #ddd6fe;
        color: #6d28d9;
    }

    .content-wrapper-soft .btn-outline-primary:hover {
        background: #f3e8ff;
        border-color: #a78bfa;
        color: #4c1d95;
    }

    .content-wrapper-soft .btn-primary {
        background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 100%);
        border: none;
        border-radius: 10px;
    }

    .content-wrapper-soft .btn-primary:hover {
        opacity: 0.9;
    }

    .content-wrapper-soft .btn-success {
        background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 100%);
        border: none;
        border-radius: 10px;
        font-weight: 600;
    }

    .content-wrapper-soft .btn-success:hover {
        opacity: 0.9;
    }

    .content-wrapper-soft .btn-danger {
        background: #f43f5e;
        border: none;
        border-radius: 8px;
    }

    .content-wrapper-soft .btn-outline-danger {
        border-radius: 10px;
        border-color: #fda4af;
        color: #e11d48;
    }

    .content-wrapper-soft .btn-outline-danger:hover {
        background: #fff1f2;
        border-color: #fb7185;
        color: #be123c;
    }

    .content-wrapper-soft .table {
        border-radius: 12px;
        overflow: hidden;
    }

    .content-wrapper-soft thead {
        background: #f5f3ff;
        color: #4c1d95;
    }

    .content-wrapper-soft .card-footer {
        background: #faf9ff;
        border-top: 1px solid #f1eafe;
    }
</style>

<div class="page-bg-full"></div>

<div class="content-wrapper-soft">

@if (session('errors'))
          <div class="alert alert-danger">
                {{ session('errors') }}
          </div>
@endif

<h4 class="mb-3">
    {{ $mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan' }}
</h4>

<div class="row">

{{-- ================== PRODUK ================== --}}
<div class="col-md-6">
    <div class="card">
        <div class="card-body" style="max-height:70vh; overflow:auto">
             <div class="mb-3">
                <form method="GET" action="{{ route('penjualan.create') }}">
                  <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="Cari produk..."
                    onkeyup="this.form.submit()">
                </form>
              </div>  
              @foreach($products as $product)
                <form method="POST" action="{{ route('itempenjualan.store') }}" class="row mb-2">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="col-7">
                  <button class="btn btn-outline-primary w-100 text-start p-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                    <div class="d-flex align-items-center gap-2">

                      {{-- Gambar produk --}}
                      <img src="{{ asset('storage/'.$product->foto) }}"
                           alt="Gambar"
                           class="rounded-circle"
                           style="width:45px; height:45px; object-fit:cover;">
                      {{-- Nama & harga --}}
                      <div>
                          <div class="fw-semibold">{{ $product->nama }}</div>
                          <small class="text-muted">{{ number_format($product->harga_jual) }}</small>
                      </div>

                    </div>
                  </button>
                </div>

                <div class="col-3">
                  <input type="number" name="quantity" value="1" min="1"
                         class="form-control {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}">
                </div>

                <div class="col-2">
                    <button class="btn btn-primary w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">+</button>
                </div>
              </form>
            @endforeach
          </div>
      </div>
  </div>

{{-- ================== KERANJANG ================== --}}
<div class="col-md-6">
   <div class="card">
       <table class="table table-bordered mb-0">
          <thead>
             <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Aksi</th>
              </tr>  
          </thead>
          <tbody>
            @forelse ($sale->itemPenjualan as $item )
              <tr>
                <td>{{ $item->produk->nama }}</td>
                <td>Rp.{{ number_format($item->produk->harga_jual) }}</td>

                <td>
                   <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}">
                      @csrf @method('PUT')
                      <input type="number" name="quantity"
                             value="{{ $item->kuantitas }}"
                             class="form-control form-control-color-sm">
                    </form>
                </td>
                <td>Rp {{ number_format($item->subtotal) }}</td>
                <td>
                  @can('delete', $item)
                   <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}">
                      @csrf @method('DELETE')
                      <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                  @endcan
                </td>
              </tr>    
              @empty
              <tr>
                <td colspan="4" class="text-center text-muted">
                    Keranjang kosong
                </td>
              </tr>
              @endforelse
          </tbody>
        </table>  

        <div class="card-footer">
            <strong>Rp {{ number_format($sale->total_pembayaran) }}</strong>

            <form method="POST" 
                  action="{{ route('penjualan.update', $sale->id) }}" 
                  onsubmit="return confirm('Yakin ingin checkout?')" class="mt-2">
              @csrf
              @method('PUT')
              <select name="payment_method" class="form-select mb-2">
                <option value="">Pilih Pembayaran</option>
                <option value="CASH">Cash</option>
                <option value="QRIS">QRIS</option>
              </select>

              <button class="btn btn-success w-100 {{ $sale->status === 'COMPLETED' ? 'disable' : '' }}">
                 Checkout
              </button>
            </form>
            @can('delete', $sale)
            <form method="POST"
                  action="{{ route('penjualan.destroy', $sale->id) }}"
                  onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-outline-danger w-100 mt-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                      Batal Transaksi
                  </button>
            </form>
            @endcan
        </div>
      </div>
</div>

</div>

</div>
@endsection