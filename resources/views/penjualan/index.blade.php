@extends('layouts.app')

@section('title', 'Penjualan')

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
  h1 {
    color: #3D3A56;
    font-weight: 700;
  }

  .page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.25rem;
  }

  .page-header h1 {
    margin: 0;
    font-size: 1.6rem;
  }

  /* ---- Card wrapper ---- */
  .content-card {
    background-color: #FFFFFF;
    border: 1px solid #ECEAF7;
    border-radius: 16px;
    box-shadow: 0 4px 14px rgba(124, 108, 219, 0.06);
    padding: 1.25rem;
    margin-bottom: 1.25rem;
  }

  /* ---- Create button ---- */
  .btn-primary {
    background-color: #A9B2F0 !important;
    border-color: #A9B2F0 !important;
    color: #2E2C42 !important;
    font-weight: 600;
    border-radius: 10px;
  }

  .btn-primary:hover {
    background-color: #939EEC !important;
    border-color: #939EEC !important;
  }

  /* ---- Search form ---- */
  .form-control {
    background-color: #FAF9FD;
    border: 1px solid #E9E7F4;
    color: #3D3A56;
  }

  .form-control::placeholder {
    color: #B7B4CC;
  }

  .form-control:focus {
    background-color: #FFFFFF;
    border-color: #B7BEF2;
    box-shadow: 0 0 0 3px rgba(140, 152, 240, 0.15);
  }

  .btn-outline-secondary {
    color: #6E6B8A;
    border-color: #E9E7F4;
    font-weight: 500;
  }

  .btn-outline-secondary:hover {
    background-color: #EFEDFA;
    border-color: #D9D5F4;
    color: #3D3A56;
  }

  /* ---- Table ---- */
  .table {
    background-color: #FFFFFF;
    border: 1px solid #ECEAF7;
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 0;
  }

  .table thead th {
    background-color: #FBFAFE;
    color: #6E6B8A;
    border-bottom: 1px solid #ECEAF7 !important;
    font-weight: 600;
  }

  .table tbody tr:hover {
    background-color: #FBFAFE;
  }

  .table td, .table th {
    border-color: #F1F0FA;
    vertical-align: middle;
  }

  .table a {
    color: #7C6FE8;
    text-decoration: none;
  }

  .table a:hover {
    color: #5F52D6;
    text-decoration: underline;
  }

  .empty-state {
    text-align: center;
    padding: 2rem 0;
    color: #B7B4CC;
    font-style: italic;
    font-weight: 500;
  }

  .status-badge {
    display: inline-block;
    padding: 0.3em 0.75em;
    border-radius: 999px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: capitalize;
  }

  .status-lunas {
    background-color: #DCEFE0;
    color: #2F6B45;
  }

  .status-pending {
    background-color: #FBEFD0;
    color: #8A6A1F;
  }

  .status-default {
    background-color: #E4E1FA;
    color: #5B52A8;
  }

  /* ---- Action buttons ---- */
  .btn-warning {
    background-color: #F0D9A9 !important;
    border-color: #F0D9A9 !important;
    color: #5C4A1F !important;
    font-weight: 600;
    border-radius: 8px;
  }

  .btn-warning:hover {
    background-color: #E8C888 !important;
    border-color: #E8C888 !important;
  }

  .btn-danger {
    background-color: #E3A9B4 !important;
    border-color: #E3A9B4 !important;
    color: #4A2530 !important;
    font-weight: 600;
    border-radius: 8px;
  }

  .btn-danger:hover {
    background-color: #D992A0 !important;
    border-color: #D992A0 !important;
  }

  .btn-info {
    background-color: #A9D6F0 !important;
    border-color: #A9D6F0 !important;
    color: #1F4A5C !important;
    font-weight: 600;
    border-radius: 8px;
  }

  .btn-info:hover {
    background-color: #88C6E8 !important;
    border-color: #88C6E8 !important;
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
</style>

@include('layouts.navbar')

<div class="container mt-4">

    @if (session('errors'))
        <div class="alert alert-danger">
            {{ session('errors') }}
        </div>
    @endif

    <div class="page-header">
        <h1>Halaman Penjualan</h1>
        <a href="{{ route('penjualan.create') }}" class="btn btn-primary">Create</a>
    </div>

    <form action="{{ route('penjualan.index') }}" method="GET" class="content-card">
        <div class="input-group">
            <input
                type="text"
                name="search"
                value="{{ request()->search }}"
                class="form-control"
                placeholder="Search penjualan"
            >
            <button class="btn btn-outline-secondary" type="submit">
                Search
            </button>
        </div>
    </form>

    <div class="content-card">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Kasir</th>
                    <th scope="col">Total Pembayaran</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sales as $sale )
                <tr>
                    <th scope="row">{{$sales->firstItem() + $loop->index}}</th>
                    <td>{{$sale->created_at->translatedFormat('d-m-Y H:i:s')}}</td>
                    <td>{{$sale->user->name}}</td>
                    <td>Rp.{{number_format($sale->total_pembayaran)}}</td>
                    <td>{{$sale->metode_pembayaran}}</td>
                    <td>
                        <span class="status-badge {{ $sale->status == 'lunas' ? 'status-lunas' : ($sale->status == 'pending' ? 'status-pending' : 'status-default') }}">
                            {{$sale->status}}
                        </span>
                    </td>
                    <td class="d-flex gap-1">
                        <a href="" class="btn btn-sm btn-info">Detail</a>
                        @can('view', $sale)
                        <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-sm btn-warning">Edit</a>
                        @endcan
                        @can('delete', $sale)
                        <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                                Hapus
                            </button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty-state">Data Tidak Ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $sales->links() }}
    </div>

</div>
@endsection