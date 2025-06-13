@extends('layouts.admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <div class="card shadow-sm p-4">
                    <h4 class="card-title mb-4 text-center">Yangi Provider Ro‘yxatdan O‘tkazish</h4>
                    <form action="{{ route('admin.register.provider') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <!-- To‘liq ism -->
                            <div class="col-md-6">
                                <label for="full_name" class="form-label">To‘liq ism</label>
                                <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name') }}" required>
                                @error('full_name')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Telefon raqam -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Telefon raqam</label>
                                <input type="text" name="phone" id="phone" class="form-control"      required>
                                @error('phone')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Parol -->
                            <div class="col-md-6">
                                <label for="password" class="form-label">Parol</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Parolni tasdiqlash -->
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Parolni tasdiqlash</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>

                            <!-- Rol -->
                            <div class="col-md-6">
                                <label for="role" class="form-label">Rol</label>
                                <select name="role" id="role" class="form-select" required>
                                    <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Provider</option>
                                    <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Oddiy foydalanuvchi</option>
                                </select>
                                @error('role')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="Aktiv" {{ old('status') == 'Aktiv' ? 'selected' : '' }}>Aktiv</option>
                                    <option value="Faol emas" {{ old('status') == 'Bloklangan' ? 'selected' : '' }}>Faol emas</option>
                                </select>
                                @error('status')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tugma -->
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary px-5">Ro‘yxatdan o‘tkazish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
