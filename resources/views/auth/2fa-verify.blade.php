@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-success">Verifikasi OTP</h3>
                        <p class="text-muted mb-1">Masukkan 6 digit kode dari aplikasi Authenticator Anda</p>
                    </div>

                    <form action="{{ route('2fa.verify.post') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="one_time_password" class="form-label">Kode OTP</label>
                            <input type="text"
                                   name="one_time_password"
                                   id="one_time_password"
                                   maxlength="6"
                                   pattern="\d{6}"
                                   class="form-control form-control-lg text-center @error('one_time_password') is-invalid @enderror"
                                   placeholder="123456"
                                   required>

                            @error('one_time_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-200">
                            Verifikasi
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <small class="text-muted">Belum menerima kode? Coba sinkronisasi waktu di aplikasi Anda.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
