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

    .form-produk-wrapper .form-control {
        border: 1.5px solid #e0d7f5;
        border-radius: 12px;
        padding: 10px 14px;
        background-color: #ffffff;
        transition: all 0.2s ease;
    }

    .form-produk-wrapper .form-control:focus {
        border-color: #a78bfa;
        box-shadow: 0 0 0 4px rgba(167, 139, 250, 0.15);
        outline: none;
    }

    .form-produk-wrapper .field-group {
        margin-bottom: 1.3rem;
    }

    .form-produk-wrapper .img-thumbnail {
        border-radius: 14px;
        border: 2px solid #ede9fe;
        padding: 4px;
        background: #fff;
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

    .preview-box {
        border: 2px dashed #ddd6fe;
        border-radius: 14px;
        padding: 10px;
        background: #faf9ff;
        min-height: 60px;
    }
</style>

<div class="page-bg-full"></div>

<div class="content-wrapper-soft">

    <div class="form-produk-wrapper">

        @if (!empty($produk->foto))
            <div class="field-group">
                <label>Foto Saat Ini</label><br>
                <img src="{{ asset('storage/' .$produk->foto) }}"
                     width="150"
                     class="img-thumbnail">
            </div>
        @endif

        <div class="row">
          <div class="col">
            <div class="field-group">
              <label>Gambar</label>
              <input type="file"
                 name="foto"
                 onchange="previewImage(this)"
                 class="form-control @error('foto') is-invalid @enderror">
              @error('foto')
                  <div class="invalid-feedback d-block">
                       {{ $message }}
                  </div>
              @enderror
            </div>
          </div>
          <div class="col">
            <div class="field-group">
              <label>Preview Foto</label><br>
              <div class="preview-box">
                  <img id="preview" class="img-thumbnail mt-2" style="display:none" width="150">
              </div>
            </div>
          </div>
        </div>

        <div class="field-group">
            <label>Nama Produk</label><br>
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $produk->nama ?? '') }}">
              @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
        </div>

        <div class="field-group">
            <label>Harga Beli</label><br>
            <input type="number" name="purchase_price"
                   class="form-control @error('purchase_price') is-invalid @enderror"
                   value="{{ old('purchase_price', $produk->harga_beli ?? '') }}">
                @error('purchase_price')
                  <div class="invalid-feedback">
                       {{ $message }}
                  </div> 
                @enderror
        </div>

        <div class="field-group">
            <label>Harga Jual</label><br>
            <input type="number" name="selling_price"
                   class="form-control @error('selling_price') is-invalid @enderror"
                   value="{{ old('selling_price', $produk->harga_jual ?? '') }}">
                @error('selling_price')
                  <div class="invalid-feedback">
                       {{ $message }}
                  </div> 
                @enderror
        </div>

        <div class="field-group">
            <label>Stok</label><br>
            <input type="number" name="stock"
                   class="form-control @error('stock') is-invalid @enderror"
                   value="{{ old('stock', $produk->stok ?? '') }}">
                @error('stock')
                  <div class="invalid-feedback">
                       {{ $message }}
                  </div> 
                @enderror
        </div>

        <button class="btn-soft-success mt-3" type="submit">Simpan</button>
        <a href="{{ route('produk.index') }}" class="btn-soft-secondary mt-3">Kembali</a>

    </div>

</div>

<script>
  function previewImage(input) {
    const preview = document.getElementById('preview');
    const file = input.files[0];

    if (file) {
      preview.src = URL.createObjectURL(file);
      preview.style.display = 'block';
    }
}
</script>