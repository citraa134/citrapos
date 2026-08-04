@extends('layouts.app')

  @section('title', 'Login')

  @section('content')

<style>
  html, body {
    margin: 0 !important;
    padding: 0 !important;
  }

  html {
    background: #F1F0FA;
  }

  body {
    min-height: 100vh !important;
    background: linear-gradient(180deg, #F7F6FC 0%, #F1F0FA 100%);
    color: #3D3A56;
    display: flow-root;
  }

  /* Cegah margin-bottom elemen terakhir "bocor" keluar dari body
     (margin collapse) yang bikin area putih di paling bawah halaman. */
  .container {
    display: flow-root;
  }

  main, .flex-shrink-0, .min-vh-100 {
    min-height: auto !important;
  }

  footer, .footer {
    background: #F1F0FA !important;
    border-top: 1px solid #ECEAF7 !important;
    color: #6E6B8A !important;
  }

  /* ---- Welcome banner (session success) ---- */
  .alert-success {
    background-color: #E7E5F9 !important;
    border: 1px solid #D9D5F4 !important;
    color: #3D3A56 !important;
    border-radius: 12px;
    font-weight: 500;
  }

  /* ---- Navbar ---- */
  .navbar {
    background-color: #FFFFFF !important;
    border-bottom: 1px solid #ECEAF7;
    box-shadow: 0 1px 2px rgba(124, 108, 219, 0.04);
    padding-top: 0.6rem;
    padding-bottom: 0.6rem;
  }

  .navbar .navbar-brand,
  .navbar-brand {
    color: #3D3A56 !important;
    font-weight: 700;
  }

  .navbar .nav-link {
    color: #6E6B8A !important;
    font-weight: 500;
  }

  .navbar .nav-link:hover,
  .navbar .nav-link.active {
    color: #7C6FE8 !important;
  }

  .navbar .btn-danger {
    background-color: #E3A9B4 !important;
    border-color: #E3A9B4 !important;
    color: #4A2530 !important;
    font-weight: 600;
    font-size: 0.875rem;
    line-height: 1.2;
    padding: 0.4rem 0.9rem;
    border-radius: 8px;
  }

  .navbar .btn-danger:hover {
    background-color: #D992A0 !important;
    border-color: #D992A0 !important;
  }

  /* ---- Headings ---- */
  h1, h3 {
    color: #3D3A56;
    font-weight: 700;
  }

  h1 small.text-muted {
    color: #9490AE !important;
  }

  /* ---- Cards ---- */
  .card {
    border: 1px solid #ECEAF7;
    border-radius: 14px;
    box-shadow: 0 1px 2px rgba(124, 108, 219, 0.04), 0 12px 28px -16px rgba(124, 108, 219, 0.16);
    overflow: hidden;
    margin-bottom: 1.5rem;
  }

  .card-header {
    background-color: #FBFAFE;
    border-bottom: 1px solid #ECEAF7;
    color: #6E6B8A;
    font-weight: 500;
  }

  .card-body {
    background-color: #FFFFFF;
  }

  .card-title {
    color: #3D3A56 !important;
    font-weight: 700;
  }

  /* ---- Tables ---- */
  .table {
    background-color: #FFFFFF;
    border: 1px solid #ECEAF7;
    border-radius: 12px;
    overflow: hidden;
  }

  .table thead th {
    background-color: #FBFAFE;
    color: #6E6B8A;
    border-bottom: 1px solid #ECEAF7 !important;
    font-weight: 600;
  }

  .table td, .table th {
    border-color: #F1F0FA;
    vertical-align: middle;
  }

  .table .text-muted {
    color: #B0ADC7 !important;
  }

  /* ---- Pagination (links()) ---- */
  .pagination .page-link {
    color: #7C6FE8;
    border-color: #ECEAF7;
  }

  .pagination .page-item.active .page-link {
    background-color: #A9B2F0;
    border-color: #A9B2F0;
    color: #FFFFFF;
  }

  /* Sedikit jarak antar section supaya tidak terlalu rapat */
  .row {
    margin-bottom: 0.5rem;
  }
</style>

  @include('layouts.navbar')

  <div class="text-center">
    <h1>
      Ringkasan Hari Ini
      <small class="text-muted">
        ({{ $tanggalHariIni->translatedFormat('l, d F Y') }})
      </small>
    </h1>
    <div class="row">
      @can('viewAny', App\Models\User::class)
      <div class="col-md-12">
        <h1>Today's Sales</h1>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Total Nilai Penjualan Hari ini
          </div>
          <div class="card-body">
            <h5 class="card-title">Rp {{ number_format($ringkasan['total_penjualan']) }}</h5>
          </div>
        </div>
      </div>
      <div class="col-md-6">
         <div class="card">
          <div class="card-header">
            jumlah transaksi hari ini
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $ringkasan['total_transaksi'] }}</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h1>Cash & Payment Status</h1>
      </div>
      <div class="col-md-6">
       <div class="card">
          <div class="card-header">
            Total Pembayaran tunai
          </div>
          <div class="card-body">
            <h5 class="card-title">Rp {{ number_format($ringkasan['total_cash']) }}</h5>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Total pembayaran non-tunai
          </div>
          <div class="card-body">
            <h5 class="card-title">Rp {{ number_format($ringkasan['total_non_tunai']) }}</h5>
          </div>
        </div>
      </div>
    </div>
    @endcan
    <div class="row">
      <div class="col-md-12">
        <h1>Critical Inventory Status</h1>
      </div>
      <div class="col-md-6">
        <h3>Daftar produk stok rendah</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Stok</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($produkStokRendah as $index => $produk)
            <tr>
              <td>{{ $produkStokRendah->firstItem() + $index }}</td>
              <td>{{ $produk->nama }}</td>
              <td>{{ $produk->stok }}</td>
            </tr>
        @empty
        <tr>
          <td colspan="3" class="text-muted text-center">
              Seluruh produk berada dalam kondisi stok aman.
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
    {{ $produkStokRendah->links() }}
      </div>
      <div class="col-md-6">
        <h3>Produk habis stok</h3>
         <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Stok</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($produkStokRendah as $index => $produk)
            <tr>
              <td>{{ $produkStokRendah->firstItem() + $index }}</td>
              <td>{{ $produk->nama }}</td>
              <td>{{ $produk->stok }}</td>
            </tr>
        @empty
        <tr>
          <td colspan="3" class="text-muted text-center">
              Seluruh produk berada dalam kondisi stok aman.
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
    {{ $produkStokRendah->links() }}
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h1>Best Seller Products</h1>
      </div>
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nama</th>
              <th scope="col">Stok</th>
              <th scope="col">Unit Terjual</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($produkTerlaris as $produk)
            <tr>
              <td>{{ $produk->nama }}</td>
              <td>{{ $produk->stok }}</td>
              <td>{{ $produk->total_terjual }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-muted text-center">
                    Seluruh produk berada dalam kondisi stok aman.
                </td>
            </tr>
          @endforelse
          </tbody>
        </table>
        </div>
      </div>
    </div>
  

  
  @endsection