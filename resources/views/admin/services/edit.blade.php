@extends('layouts.admin')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-6 gy-6 p-5">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Basic with Icons</h5>
                    <small class="text-body float-end">Merged input group</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            {{-- Category --}}
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-select" name="category_id" id="category_id" required>
                                        <option value="">Select Parent Category</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ (old('category_id', $service->category_id) == $cat->id) ? 'selected' : '' }}>
                                                {{ $cat->title_uz }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="category_id">Parent Category</label>
                                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            {{-- Provider --}}
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-select" name="provider_id" id="provider_id" required>
                                        <option value="">Select Provider</option>
                                        @foreach ($providers as $provider)
                                            <option value="{{ $provider->id }}" {{ (old('provider_id', $service->provider_id) == $provider->id) ? 'selected' : '' }}>
                                                {{ $provider->full_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="provider_id">Provider</label>
                                    @error('provider_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            {{-- Type Price --}}
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <select name="type_price" id="type_price" class="form-select" required>
                                        <option value="">Narx turi</option>
                                        @foreach (['m2', 'soat'] as $type)
                                            <option value="{{ $type }}" {{ (old('type_price', $service->type_price) == $type) ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="type_price">Narx birligi</label>
                                    @error('type_price') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            {{-- Price --}}
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Narx" value="{{ old('price', $service->price) }}" required>
                                    <label for="price">Narx</label>
                                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <select name="is_active" id="is_active" class="form-select" required>
                                        <option value="1" {{ (old('is_active', $service->is_active) == '1') ? 'selected' : '' }}>Faol</option>
                                        <option value="0" {{ (old('is_active', $service->is_active) == '0') ? 'selected' : '' }}>Faol emas</option>
                                    </select>
                                    <label for="is_active">Status</label>
                                    @error('is_active') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#uz" role="tab" aria-selected="true">O‘zbek</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#ru" role="tab" aria-selected="false">Русский</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#en" role="tab" aria-selected="false">English</a>
                            </li>
                        </ul>

                        <div class="tab-content mb-4">
                            {{-- Uzbek Tab --}}
                            <div class="tab-pane fade show active" id="uz" role="tabpanel">
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="title_uz" name="title_uz" class="form-control" placeholder="Title (UZ)" value="{{ old('title_uz', $service->title_uz) }}">
                                            <label for="title_uz">Title (UZ)</label>
                                            @error('title_uz') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="description_uz" class="form-label">Description (UZ)</label>
                                    <textarea id="description_uz" name="description_uz" class="form-control editor" rows="5">{{ old('description_uz', $service->description_uz) }}</textarea>
                                    @error('description_uz') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            {{-- Russian Tab --}}
                            <div class="tab-pane fade" id="ru" role="tabpanel">
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="title_ru" name="title_ru" class="form-control" placeholder="Title (RU)" value="{{ old('title_ru', $service->title_ru) }}">
                                            <label for="title_ru">Title (RU)</label>
                                            @error('title_ru') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="description_ru" class="form-label">Description (RU)</label>
                                    <textarea id="description_ru" name="description_ru" class="form-control editor" rows="5">{{ old('description_ru', $service->description_ru) }}</textarea>
                                    @error('description_ru') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            {{-- English Tab --}}
                            <div class="tab-pane fade" id="en" role="tabpanel">
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="title_en" name="title_en" class="form-control" placeholder="Title (EN)" value="{{ old('title_en', $service->title_en) }}">
                                            <label for="title_en">Title (EN)</label>
                                            @error('title_en') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="description_en" class="form-label">Description (EN)</label>
                                    <textarea id="description_en" name="description_en" class="form-control editor" rows="5">{{ old('description_en', $service->description_en) }}</textarea>
                                    @error('description_en') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Image section --}}
                        <div class="mb-4">
                            <label class="form-label">Image</label><br>
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image" style="max-width: 150px; margin-bottom: 10px;">
                            @endif
                            <label>
                                <input type="file" name="image">
                            </label>
                            @error('image') <br><small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
    <style>
        .custom-dropzone {
            border: 2px dashed #696cff;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            background-color: #f8f9fa;
            transition: 0.3s;
            position: relative;
            cursor: pointer;
        }

        .custom-dropzone:hover {
            background-color: #eef0ff;
        }

        .custom-dropzone input[type="file"] {
            display: none;
        }

        .custom-dropzone .note {
            font-size: 0.9rem;
            color: #6c757d;
            display: block;
            margin-top: 8px;
        }
    </style>

    <!-- / Content -->
@endsection
