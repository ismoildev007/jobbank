@extends('layouts.admin')
@php
    $lang = app()->getLocale();
@endphp

@section('content')
    <!-- Kontent -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kategoriyalar</h5>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                    <i class="ri ri-add-line me-1"></i> Yangi qo‘shish
                </a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Rasm</th>
                        <th>Kategoriya nomi</th>
                        <th>Ota kategoriya</th>
                        <th>Amallar</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($categories as $category)
                        <tr>
                            <td>
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="Rasm" width="100">
                                @else
                                    <span class="text-muted">Rasm yo‘q</span>
                                @endif
                            </td>
                            <td>
                                <span>{{ $category->{'title_uz'} }}</span>
                            </td>
                            <td>
                                    <span>
                                        {{ $category->parent ? $category->parent->{'title_uz'} : 'Asosiy kategoriya' }}
                                    </span>
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="text-primary me-2">
                                    <i class="icon-base ri ri-pencil-line icon-18px me-1"></i> Tahrirlash
                                </a>
                                <a href="#" class="text-danger"
                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i> O‘chirish
                                </a>

                                <form id="delete-form-{{ $category->id }}"
                                      action="{{ route('categories.destroy', $category->id) }}"
                                      method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Hech qanday kategoriya topilmadi</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- / Kontent -->
@endsection
