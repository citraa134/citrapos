@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<style>
    .receipt-wrapper {
        max-width: 380px;
        margin: 2rem auto;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(99,102,241,0.08);
        padding: 1.5rem;
        font-family: 'Courier New', monospace;
        color: #3D3A56;
    }
    .receipt-wrapper h4 {
        text-align: center;
        margin-bottom: 0;
        color: #4c1d95;
    }
    .receipt-subtitle {
        text-align: center;
        font-size: 0.8rem;
        color: #6E6B8A;
        margin-bottom: 1rem;
    }
    .receipt-divider {
        border-top: 1px dashed #c7d2fe;
        margin: 0.75rem 0;
    }
    .receipt-row {
        display: flex;
        justify-content: space-between;
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
    }
    .receipt-total-row {
        font-weight: 700;
        font-size: 1rem;
    }
    .receipt-actions {
        text-align: center;
        margin-top: 1rem;
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }
    @media print {
        .no-print { display: none; }
        .receipt-wrapper { box-shadow: none; margin: 0; }
    }
</style>

@include('layouts.navbar')

<div class="receipt-wrapper">
    <h4>Aera Boutique</h4>
    <div class="receipt-subtitle">
        {{ $penjualan->created_at->format('d-m-Y H:i:s') }}
    </div>

    <div class="receipt-divider"></div>

    <div class="receipt-row">
        <span>No. Transaksi</span>
        <span>#{{ $penjualan->id }}</span>
    </div>
    <div class="receipt-row">
        <span>Kasir</span>
        <span>{{ $penjualan->user->name }}</span>
    </div>

    <div class="receipt-divider"></div>

    @foreach ($penjualan->itemPenjualan as $item)
        <div class="receipt-row">
            <strong>{{ $item->produk->nama }}</strong>
        </div>
        <div class="receipt-row">
            <span>{{ $item->kuantitas }} x {{ number_format($item->produk->harga_jual) }}</span>
            <span>{{ number_format($item->subtotal) }}</span>
        </div>
    @endforeach

    <div class="receipt-divider"></div>

    <div class="receipt-row receipt-total-row">
        <span>Total</span>
        <span>Rp {{ number_format($penjualan->total_pembayaran) }}</span>
    </div>
    <div class="receipt-row">
        <span>Metode</span>
        <span>{{ $penjualan->metode_pembayaran }}</span>
    </div>
    <div class="receipt-row">
        <span>Dibayar</span>
        <span>Rp {{ number_format($penjualan->uang_dibayar) }}</span>
    </div>
    <div class="receipt-row">
        <span>Kembalian</span>
        <span>Rp {{ number_format($kembalian) }}</span>
    </div>

    <div class="receipt-divider"></div>
    <div class="receipt-subtitle">Terima kasih telah berbelanja</div>

    <div class="no-print receipt-actions">
        <a href="{{ route('penjualan.index') }}" class="btn btn-outline-primary btn-sm">Kembali</a>
        <button onclick="window.print()" class="btn btn-primary btn-sm">Cetak</button>
    </div>
</div>
@endsection