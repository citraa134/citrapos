@csrf

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

    .form-produk-wrapper {
        background: #ffffff;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.08);
        border: 1px solid #f1eafe;
    }

    .form-produk-wrapper label {
        font-weight: 600;
        color: #4c1d95;
        margin-bottom: 6px;
        display: inline-block;
        font-size: 0.9rem;
    }

    .form-produk-wrapper .form-control,
    .form-produk-wrapper .form-select {
        border: 1.5px solid #e0d7f5;
        border-radius: 12px;
        padding: 10px 14px;
        background-color: #ffffff;
        transition: all 0.2s ease;
    }

    .form-produk-wrapper .form-control:focus,
    .form-produk-wrapper .form-select:focus {
        border-color: #a78bfa;
        box-shadow: 0 0 0 4px rgba(167, 139, 250, 0.15);
        outline: none;
    }

    .form-produk-wrapper .invalid-feedback {
        color: #e11d48;
        font-size: 0.8rem;
        margin-top: 4px;
    }

    .form-produk-wrapper .is-invalid {
        border-color: #fca5a5 !important;
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

    .btn-soft-success:active {
        transform: translateY(0);
        box-shadow: 0 2px 8px rgba(139, 92, 246, 0.35);
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

    .btn-soft-secondary:active {
        background: #e9d5ff;
        border-color: #a78bfa;
    }
</style>

<div class="page-bg-full"></div>

<div class="content-wrapper-soft">

    <div class="form-produk-wrapper">

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name"
                  class="form-control @error('name') is-invalid @enderror"
                  value="{{ old('name', $user->name ?? '') }}">
            @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email"
                  class="form-control @error('email') is-invalid @enderror"
                  value="{{ old('email', $user->email ?? '') }}">
            @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password"
                  class="form-control @error('password') is-invalid @enderror">
            @error('password')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role_id"
                    class="form-select @error('role_id') is-invalid @enderror">
                <option value="">-- Pilih Role --</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}"
                        @selected(old('role_id', $user->role_id ?? '') == $role->id)>
                        {{ ucfirst($role->name) }}
                    </option>
                @endforeach
            </select>
            @error('role_id')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
        </div>

        <button type="submit" class="btn-soft-success">Simpan</button>
        <a href="{{ route('admin.users') }}" class="btn-soft-secondary">Kembali</a>

    </div>

</div>