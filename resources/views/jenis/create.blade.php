@extends('layouts.app')

@section('title', 'Tambah Jenis')

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
        margin-bottom: 1.5rem;
    }

    .card-form-soft {
        background: #ffffff;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.08);
        border: 1px solid #f1eafe;
        max-width: 600px;
    }

    .card-form-soft .form-control {
        border: 1.5px solid #e0d7f5;
        border-radius: 12px;
        padding: 10px 14px;
    }

    .card-form-soft .form-control:focus {
        border-color: #a78bfa;
        box-shadow: 0 0 0 4px rgba(167, 139, 250, 0.15);
    }

    .btn-soft-success {
        background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 100%);
        border: none;
        color: #fff;
        font-weight: 600;
        border-radius: 12px;
        padding: 10px 26px;
        box-shadow: 0 4px 14px rgba(139, 92, 246, 0.35);
        transition: all 0.15s ease;
    }

    .btn-soft-success:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(139, 92, 246, 0.45);
    }

    .btn-soft-secondary {
        display: inline-block;
        background: #ffffff;
        border: 1.5px solid #e0d7f5;
        color: #6b21a8;
        font-weight: 600;
        border-radius: 12px;
        padding: 10px 26px;
        text-decoration: none;
        transition: all 0.15s ease;
    }

    .btn-soft-secondary:hover {
        background: #f3e8ff;
        border-color: #c4b5fd;
        color: #581c87;
        text-decoration: none;
    }
</style>

<div class="page-bg-full"></div>

<div class="content-wrapper-soft">
    <h4>Tambah Jenis</h4>

    <div class="card-form-soft">
        <form method="POST" action="{{ route('jenis.store') }}">
            @include('jenis._form')
        </form>
    </div>
</div>
@endsection