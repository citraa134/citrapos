@extends('layouts.app')

@section('title', 'User')

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

  .role-badge {
    display: inline-block;
    padding: 0.3em 0.75em;
    border-radius: 999px;
    font-size: 0.8rem;
    font-weight: 600;
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

  .btn-sm.btn-danger {
    background-color: #E3A9B4 !important;
    border-color: #E3A9B4 !important;
    color: #4A2530 !important;
    font-weight: 600;
    border-radius: 8px;
  }

  .btn-sm.btn-danger:hover {
    background-color: #D992A0 !important;
    border-color: #D992A0 !important;
  }
</style>

@include('layouts.navbar')

<div class="container mt-4">

  <div class="page-header">
    <h1>Halaman Users</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create</a>
  </div>

  <form action="{{ route('admin.users') }}" method="GET" class="content-card">
    <div class="input-group">
      <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        class="form-control"
        placeholder="Search username or email"
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
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
        <tr>
          <td>{{ $users->firstItem() + $loop->index }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td><span class="role-badge">{{ $user->role->name }}</span></td>
          <td class="d-flex gap-1">
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning">
              Edit Akun
            </a>
            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus user ini?')">
                Hapus
                </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="empty-state">Data tidak tersedia.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

</div>

@endsection