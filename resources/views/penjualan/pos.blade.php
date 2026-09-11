@extends('layouts.app')

@section('title', 'POS')

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

    .content-wrapper-soft .card {
        border: 1px solid #f1eafe;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.08);
    }

    .content-wrapper-soft .form-control,
    .content-wrapper-soft .form-select {
        border: 1.5px solid #e0d7f5;
        border-radius: 10px;
    }

    .content-wrapper-soft .form-control:focus,
    .content-wrapper-soft .form-select:focus {
        border-color: #a78bfa;
        box-shadow: 0 0 0 4px rgba(167, 139, 250, 0.15);
    }

    .content-wrapper-soft .btn-outline-primary {
        border-radius: 10px;
        border-color: #ddd6fe;
        color: #6d28d9;
    }

    .content-wrapper-soft .btn-outline-primary:hover {
        background: #f3e8ff;
        border-color: #a78bfa;
        color: #4c1d95;
    }

    .content-wrapper-soft .btn-primary {
        background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 100%);
        border: none;
        border-radius: 10px;
    }

    .content-wrapper-soft .btn-primary:hover {
        opacity: 0.9;
    }

    .content-wrapper-soft .btn-success {
        background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 100%);
        border: none;
        border-radius: 10px;
        font-weight: 600;
    }

    .content-wrapper-soft .btn-success:hover {
        opacity: 0.9;
    }

    .content-wrapper-soft .btn-danger {
        background: #f43f5e;
        border: none;
        border-radius: 8px;
    }

    .content-wrapper-soft .btn-outline-danger {
        border-radius: 10px;
        border-color: #fda4af;
        color: #e11d48;
    }

    .content-wrapper-soft .btn-outline-danger:hover {
        background: #fff1f2;
        border-color: #fb7185;
        color: #be123c;
    }

    .content-wrapper-soft .table {
        border-radius: 12px;
        overflow: hidden;
    }

    .content-wrapper-soft thead {
        background: #f5f3ff;
        color: #4c1d95;
    }

        .content-wrapper-soft .card-footer {
        background: #faf9ff;
        border-top: 1px solid #f1eafe;
    }

    #modalConfirmCheckout .btn-primary {
        background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 100%);
        border: none;
        border-radius: 10px;
    }

    #modalConfirmCheckout .btn-primary:hover {
        opacity: 0.9;
    }

    #modalConfirmCheckout .btn-outline-primary {
        border-radius: 10px;
        border-color: #ddd6fe;
        color: #6d28d9;
    }

    #modalConfirmCheckout .btn-outline-primary:hover {
        background: #f3e8ff;
        border-color: #a78bfa;
        color: #4c1d95;
    }

    #modalConfirmDelete .btn-outline-primary {
    border-radius: 10px;
    border-color: #ddd6fe;
    color: #6d28d9;
}

#modalConfirmDelete .btn-outline-primary:hover {
    background: #f3e8ff;
    border-color: #a78bfa;
    color: #4c1d95;
}

#modalConfirmDelete .btn-primary {
    background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 100%);
    border: none;
    border-radius: 10px;
}

#modalConfirmDelete .btn-primary:hover {
    opacity: 0.9;
}
</style>

<div class="page-bg-full"></div>

<div class="content-wrapper-soft">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h4 class="mb-3">
    {{ $mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan' }}
</h4>

<div class="row">

{{-- ================== PRODUK ================== --}}
<div class="col-md-6">
    <div class="card">
        <div class="card-body" style="max-height:70vh; overflow:auto">
             <div class="mb-3">
                <form method="GET" action="{{ route('penjualan.create') }}">
                  <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="Cari produk..."
                    onkeyup="this.form.submit()">
                </form>
              </div>  
              @foreach($products as $product)
                <form method="POST" action="{{ route('itempenjualan.store') }}" class="row mb-2">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="col-7">
                  <button class="btn btn-outline-primary w-100 text-start p-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                    <div class="d-flex align-items-center gap-2">

                      {{-- Gambar produk --}}
                      <img src="{{ asset('storage/'.$product->foto) }}"
                           alt="Gambar"
                           class="rounded-circle"
                           style="width:45px; height:45px; object-fit:cover;">
                      {{-- Nama & harga --}}
                      <div>
                          <div class="fw-semibold">{{ $product->nama }}</div>
                          <small class="text-muted">{{ number_format($product->harga_jual) }}</small>
                      </div>

                    </div>
                  </button>
                </div>

                <div class="col-3">
                  <input type="number" name="quantity" value="1" min="1"
                         class="form-control {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}">
                </div>

                <div class="col-2">
                    <button class="btn btn-primary w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">+</button>
                </div>
              </form>
            @endforeach
          </div>
      </div>
  </div>

{{-- ================== KERANJANG ================== --}}
<div class="col-md-6">
   <div class="card">
       <table class="table table-bordered mb-0">
          <thead>
             <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Aksi</th>
              </tr>  
          </thead>
          <tbody>
            @forelse ($sale->itemPenjualan as $item )
              <tr>
                <td>{{ $item->produk->nama }}</td>
                <td>Rp.{{ number_format($item->produk->harga_jual) }}</td>

                <td>
                   <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}">
                      @csrf @method('PUT')
                      <input type="number" name="quantity"
                             value="{{ $item->kuantitas }}"
                             class="form-control form-control-color-sm">
                    </form>
                </td>
                <td>Rp {{ number_format($item->subtotal) }}</td>
                <td>
                  @can('delete', $item)
                   <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}">
                      @csrf @method('DELETE')
                      <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                  @endcan
                </td>
              </tr>    
              @empty
              <tr>
                <td colspan="4" class="text-center text-muted">
                    Keranjang kosong
                </td>
              </tr>
              @endforelse
          </tbody>
        </table>  

        <div class="card-footer">
            <strong>Rp {{ number_format($sale->total_pembayaran) }}</strong>

            <form method="POST" 
                  id="checkoutForm"
                  action="{{ route('penjualan.update', $sale->id) }}" class="mt-2">
              @csrf
              @method('PUT')

              <select name="payment_method" id="payment_method" class="form-select mb-2" required>
                <option value="" disabled selected>Pilih Pembayaran</option>
                <option value="CASH">Cash</option>
                <option value="QRIS">QRIS</option>
              </select>

              <div id="uang-dibayar-wrapper" class="mb-2" style="display:none;">
                  <input type="number" name="uang_dibayar" id="uang_dibayar" class="form-control"
                         placeholder="Uang dibayar customer" min="0">
              </div>

              <div id="qris-wrapper" class="mb-2 text-center" style="display:none;">
                  <img src="{{ asset('images/qris-dummy.png') }}" alt="QRIS" style="width:180px;">
                  <p class="small text-muted mb-0">Scan QR di atas untuk membayar</p>
              </div>

              <button type="button" onclick="confirmCheckout()" class="btn btn-success w-100 {{ $sale->status === 'COMPLETED' ? 'disable' : '' }}">
                 Checkout
              </button>
            </form>
            @can('delete', $sale)
            <form method="POST" id="batalTransaksiForm"
                  action="{{ route('penjualan.destroy', $sale->id) }}">
                  @csrf
                  @method('DELETE')
                  <button type="button" onclick="confirmDelete('batalTransaksiForm', 'Transaksi ini akan dibatalkan dan tidak bisa dikembalikan.')" class="btn btn-outline-danger w-100 mt-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                      Batal Transaksi
                  </button>
            </form>
            @endcan
        </div>
      </div>
</div>

</div>

</div>

<div class="modal fade" id="modalConfirmCheckout" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 16px; border: none;">
      <div class="modal-body text-center py-4">
        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center"
             style="width:56px;height:56px;border-radius:50%;background:#f3e8ff;">
          <span style="font-size:1.5rem;">🛒</span>
        </div>
        <h5 class="fw-bold mb-2" style="color:#4c1d95;">Yakin ingin checkout?</h5>
        <p class="text-muted small mb-4">Transaksi akan diselesaikan dan tidak bisa diedit lagi setelah ini.</p>
        <div class="d-flex gap-2 justify-content-center">
          <button type="button" class="btn btn-outline-primary px-4" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary px-4" onclick="document.getElementById('checkoutForm').submit()">Ya, Checkout</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalConfirmDelete" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 16px; border: none;">
      <div class="modal-body text-center py-4">
        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center"
             style="width:56px;height:56px;border-radius:50%;background:#f3e8ff;">
          <span style="font-size:1.5rem;">🗑️</span>
        </div>
        <h5 class="fw-bold mb-2" style="color:#4c1d95;">Yakin ingin menghapus?</h5>
        <p class="text-muted small mb-4" id="deleteMessage">Data ini akan dihapus secara permanen.</p>
        <div class="d-flex gap-2 justify-content-center">
          <button type="button" class="btn btn-outline-primary px-4" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary px-4" id="btnConfirmDelete">Ya, Hapus</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    const paymentSelect = document.getElementById('payment_method');
    const uangWrapper = document.getElementById('uang-dibayar-wrapper');
    const uangInput = document.getElementById('uang_dibayar');
    const qrisWrapper = document.getElementById('qris-wrapper');

    function toggleUangDibayar() {
        if (paymentSelect.value === 'CASH') {
            uangWrapper.style.display = 'block';
            uangInput.setAttribute('required', 'required');
            qrisWrapper.style.display = 'none';
        } else if (paymentSelect.value === 'QRIS') {
            uangWrapper.style.display = 'none';
            uangInput.removeAttribute('required');
            uangInput.value = '';
            qrisWrapper.style.display = 'block';
        } else {
            uangWrapper.style.display = 'none';
            qrisWrapper.style.display = 'none';
            uangInput.removeAttribute('required');
        }
    }

    paymentSelect.addEventListener('change', toggleUangDibayar);
    toggleUangDibayar();

    function confirmCheckout() {
        const form = document.getElementById('checkoutForm');
        if (!form.reportValidity()) {
            return;
        }
        new bootstrap.Modal(document.getElementById('modalConfirmCheckout')).show();
    }

    let formToDelete = null;
    function confirmDelete(formId, message) {
        formToDelete = document.getElementById(formId);
        document.getElementById('deleteMessage').textContent = message || 'Data ini akan dihapus secara permanen.';
        new bootstrap.Modal(document.getElementById('modalConfirmDelete')).show();
    }
    document.getElementById('btnConfirmDelete').addEventListener('click', function () {
        if (formToDelete) formToDelete.submit();
    });
</script>
@endsection