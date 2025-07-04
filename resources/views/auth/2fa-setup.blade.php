@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-primary">Aktivasi 2-Factor Authentication</h2>
                        <p class="text-muted">Scan QR Code berikut untuk menghubungkan akun Anda ke aplikasi Authenticator.</p>
                    </div>

                    <div class="text-center mb-4">
                        @if($QR_Image)
                            <div class="bg-white p-3 rounded shadow-sm d-inline-block">
                                {!! $QR_Image !!}
                            </div>
                        @else
                            <div class="alert alert-danger">QR Code tidak tersedia. Silakan refresh halaman ini.</div>
                        @endif
                    </div>

                    <div class="text-center">
                        <p class="mb-1">Atau masukkan kode ini secara manual ke aplikasi Anda:</p>
                        <div class="alert alert-secondary text-break fw-bold fs-5">
                            {{ $secret }}
                        </div>
                    </div>

                    <form action="{{ route('2fa.setup.store') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100 fw-semibold py-2">
                            Lanjut ke Verifikasi OTP
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <small class="text-muted">Pastikan Anda telah menyimpan kode rahasia dengan aman.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
