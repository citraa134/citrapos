@extends('layouts.app')

@section('title', 'Jenis Produk')

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

    .card-soft {
        background: #ffffff;
        border-radius: 18px;
        padding: 1.5rem;
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.08);
        border: 1px solid #f1eafe;
    }

    .table-soft thead {
        background: #f5f3ff;
        color: #4c1d95;
    }

    .table-soft {
        border-radius: 12px;
        overflow: hidden;
    }

    .btn-soft-success {
        display: inline-block;
        background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 100%);
        border: none;
        color: #fff;
        font-weight: 600;
        border-radius: 12px;
        padding: 8px 20px;
        text-decoration: none;
        box-shadow: 0 4px 14px rgba(139, 92, 246, 0.35);
        transition: all 0.15s ease;
    }

    .btn-soft-success:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(139, 92, 246, 0.45);
    }

    .btn-soft-edit {
        display: inline-block;
        background: #eef2ff;
        border: 1px solid #c7d2fe;
        color: #4338ca;
        font-weight: 600;
        border-radius: 8px;
        padding: 5px 14px;
        text-decoration: none;
        font-size: 0.85rem;
        transition: all 0.15s ease;
    }

    .btn-soft-edit:hover {
        background: #e0e7ff;
        color: #3730a3;
    }

    .btn-soft-delete {
        background: #fff1f2;
        border: 1px solid #fda4af;
        color: #be123c;
        font-weight: 600;
        border-radius: 8px;
        padding: 5px 14px;
        font-size: 0.85rem;
        transition: all 0.15s ease;
    }

    .btn-soft-delete:hover {
        background: #ffe4e6;
        color: #9f1239;
    }
</style>

<div class="page-bg-full"></div>

<div class="content-wrapper-soft">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Jenis Produk</h4>
        <a href="{{ route('jenis.create') }}" class="btn-soft-success">Tambah Jenis</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card-soft">
        <table class="table table-bordered table-soft mb-0">
            <thead>
                <tr>
                    <th>Nama Jenis</th>
                    <th style="width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jenis as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <a href="{{ route('jenis.edit', $item->id) }}" class="btn-soft-edit">Edit</a>
                            <form method="POST" action="{{ route('jenis.destroy', $item->id) }}"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus jenis ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-soft-delete">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center text-muted">Belum ada data jenis</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection