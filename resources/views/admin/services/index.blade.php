@extends('layouts.admin')
@php
    $lang = app()->getLocale();
@endphp

@section('content')
    <!-- Kontent -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Xizmatlar</h5>
                <a href="{{ route('services.create') }}" class="btn btn-primary">
                    <i class="ri ri-add-line me-1"></i> Yangi qo‘shish
                </a>
            </div>
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Rasm</th>
                        <th>Kategoriya nomi</th>
                        <th>Xizmat nomi</th>
                        <th>Provider ismi</th>
                        <th>Amallar</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($services as $service)
                        <tr>
                            <td>
                                @if($service->image && file_exists(public_path('storage/' . $service->image)))
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="Rasm" width="100">
                                @else
                                    <span class="text-muted">Rasm mavjud emas</span>
                                @endif
                            </td>
                            <td>
                                <span>{{ $service->category->{'title_uz'} ?? 'Asosiy kategoriya' }}</span>
                            </td>
                            <td>
                                <span>{{ $service->{'title_uz'} ?? 'Noma’lum' }}</span>
                            </td>
                            <td>
                                <span>{{ $service->provider->full_name ?? 'Noma’lum' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('services.edit', $service->id) }}" class="text-primary me-2">
                                    <i class="icon-base ri ri-pencil-line icon-18px me-1"></i> Tahrirlash
                                </a>
                                <a href="#" class="text-danger"
                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $service->id }}').submit();">
                                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i> O‘chirish
                                </a>

                                <form id="delete-form-{{ $service->id }}"
                                      action="{{ route('services.destroy', $service->id) }}"
                                      method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Xizmatlar mavjud emas</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- / Kontent -->
@endsection
