@extends('layouts.app')

@section('title', 'About')

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

  h1 {
    color: #3D3A56;
    font-weight: 700;
  }

  .content-card {
    background-color: #FFFFFF;
    border: 1px solid #ECEAF7;
    border-radius: 16px;
    box-shadow: 0 4px 14px rgba(124, 108, 219, 0.06);
    padding: 1.5rem;
    margin-bottom: 1.25rem;
  }

  .content-card h5 {
    color: #3D3A56;
    font-weight: 700;
    margin-bottom: 0.75rem;
    margin-top: 1.5rem;
  }

  .content-card h5:first-child {
    margin-top: 0;
  }

  .content-card p, .content-card li {
    color: #6E6B8A;
  }

  .tech-badge {
    display: inline-block;
    padding: 0.35em 0.9em;
    border-radius: 999px;
    background-color: #E4E1FA;
    color: #5B52A8;
    font-size: 0.85rem;
    font-weight: 600;
    margin: 0.2rem 0.3rem 0.2rem 0;
  }
</style>

@include('layouts.navbar')

<div class="container mt-4">

  <h1 class="mb-3">Tentang Aera Boutique</h1>

  <div class="content-card">

    <h5>Tentang Pembuat</h5>
    <p>
      Perkenalkan, nama saya <strong>Citra Ninsih Restami</strong>. Di sini saya membuat
      aplikasi toko bernama <strong>Aera Boutique</strong>, sebuah sistem
      Point of Sale yang saya kembangkan untuk membantu operasional toko,
      mulai dari pencatatan produk, transaksi penjualan, hingga laporan
      harian, agar proses jual beli menjadi lebih mudah dan terorganisir.
    </p>

    <h5>Aera Boutique</h5>
    <p>
      Aera Boutique adalah toko fashion yang menyediakan berbagai pilihan
      atasan, bawahan, dan sepatu untuk kebutuhan gaya sehari-hari.
    </p>

    <h5>Fitur Aplikasi</h5>
    <ul>
      <li>Manajemen data produk (atasan, bawahan, sepatu) beserta stok</li>
      <li>Pencatatan transaksi penjualan</li>
      <li>Laporan penjualan harian</li>
      <li>Manajemen pengguna dengan hak akses (role)</li>
    </ul>

    <h5>Tech Stack</h5>
    <p>Aplikasi ini dibangun menggunakan teknologi berikut:</p>
    <div>
      <span class="tech-badge">PHP 8.3</span>
      <span class="tech-badge">Laravel 12</span>
      <span class="tech-badge">MySQL</span>
      <span class="tech-badge">Bootstrap</span>
    </div>

  </div>

</div>

@endsection