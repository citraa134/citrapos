@csrf
@if(isset($jenis))
    @method('PUT')
@endif

<div class="mb-3">
    <label class="form-label">Nama Jenis</label>
    <input type="text" name="nama"
           class="form-control @error('nama') is-invalid @enderror"
           value="{{ old('nama', $jenis->nama ?? '') }}">
    @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<button type="submit" class="btn-soft-success">Simpan</button>
<a href="{{ route('jenis.index') }}" class="btn-soft-secondary">Kembali</a>