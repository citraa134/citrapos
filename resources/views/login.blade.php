@vite(['resources/css/app.css', 'resources/js/app.js'])

<!--memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke title untuk ditampilkan -->
@section('title', 'Login')

<!-- batas awal isi konten -->
@section('content')

<style>
  html, body {
    margin: 0;
    padding: 0;
    height: 100%;
    background: #F1F0FA;
  }

  .login-wrapper {
    min-height: 100vh;
    width: 100vw;
    margin-left: calc(50% - 50vw);
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(180deg, #F7F6FC 0%, #F1F0FA 100%);
  }

  .login-card {
    width: 100%;
    max-width: 360px;
    background: #FFFFFF;
    border: 1px solid #ECEAF7;
    border-radius: 18px;
    box-shadow: 0 1px 2px rgba(124, 108, 219, 0.04), 0 16px 36px -16px rgba(124, 108, 219, 0.18);
    overflow: hidden;
  }

  .login-card .card-header {
    background: #FBFAFE;
    border-bottom: 1px solid #ECEAF7;
    padding: 22px 28px 18px;
    text-align: left;
  }

  .login-icon {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    background: #C9CFF7;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 12px;
  }

  .login-icon svg { width: 20px; height: 20px; }

  .login-card h5 {
    font-size: 18px;
    font-weight: 700;
    color: #3D3A56;
    margin: 0;
  }

  .login-card .card-body {
    padding: 24px 28px 28px;
  }

  .login-card .form-label {
    font-size: 13px;
    font-weight: 600;
    color: #5C5A75;
  }

  .login-card .form-control {
    background: #FAF9FD;
    border: 1px solid #E9E7F4;
    border-radius: 12px;
    padding: 10px 14px;
    font-size: 14.5px;
    color: #3D3A56;
  }

  .login-card .form-control::placeholder {
    color: #B7B4CC;
  }

  .login-card .form-control:focus {
    background: #FFFFFF;
    border-color: #B7BEF2;
    box-shadow: 0 0 0 3px rgba(140, 152, 240, 0.15);
  }

  .login-card .badge.text-bg-danger {
    background-color: transparent !important;
    color: #E08A9B !important;
    font-weight: 500;
    font-size: 12px;
    padding: 6px 0 0;
  }

  .login-card .btn-primary {
    background-color: #A9B2F0;
    border-color: #A9B2F0;
    color: #3D3A56;
    border-radius: 12px;
    font-weight: 600;
    padding: 10px;
    width: 100%;
    transition: background-color 0.15s ease, border-color 0.15s ease;
  }

  .login-card .btn-primary:hover {
    background-color: #939EEC;
    border-color: #939EEC;
    color: #2E2C42;
  }
</style>

<div class="login-wrapper">
  <div class="login-card">
    <div class="card-header">
      <div class="login-icon">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3 9L12 3L21 9V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V9Z" stroke="#3D3A56" stroke-width="1.8" stroke-linejoin="round"/>
          <path d="M9 21V13H15V21" stroke="#3D3A56" stroke-width="1.8" stroke-linejoin="round"/>
        </svg>
      </div>
      <h5>Login POS</h5>
    </div>
    <div class="card-body">

      <form action="{{ route('auth') }}" method="POST">
        @csrf
        <div class="mb-3 text-start">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
          @error('email')
            <div class="badge text-bg-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3 text-start">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          @error('password')
            <div class="badge text-bg-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
  </div>
</div>

<!-- batas akhir isi konten -->
@endsection