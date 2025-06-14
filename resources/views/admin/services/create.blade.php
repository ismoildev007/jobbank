@extends('layouts.admin')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-6 gy-6 p-5">
            <div class="col-xl">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create service</h5>
                        <small class="text-body float-end">Merged input group</small>
                    </div>

                    <div class="card-body">
                        @if($providers->isEmpty())
                            <div class="alert alert-warning text-center">
                             Xizmat qo‘shish uchun faol obuna talab qilinadi.
                            </div>
                        @else
                        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                {{-- Category --}}
                                <div class="col-md-4 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        <select class="form-select" name="category_id" id="category_id" required>
                                            <option value="">Select Parent Category</option>
                                            @foreach ($categories->whereNull('parent_id') as $cat)
                                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                                    {{ $cat->title_uz }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <label for="category_id">Parent Category</label>
                                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        <select class="form-select" name="sub_category_id" id="sub_category_id">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                        <label for="sub_category_id">Sub Category</label>
                                        @error('sub_category_id') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        @if(auth()->user()->role === '2') {{-- admin bo‘lsa --}}
                                        <select class="form-select" name="provider_id" id="provider_id" required>
                                            <option value="">Select Provider</option>
                                            @foreach ($providers as $provider)
                                                <option value="{{ $provider->id }}" {{ old('provider_id') == $provider->id ? 'selected' : '' }}>
                                                    {{ $provider->full_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="provider_id">Provider</label>
                                        @else {{-- provider bo‘lsa --}}
                                        <input type="hidden" name="provider_id" value="{{ auth()->id() }}">
                                        @endif
                                        @error('provider_id') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        <select name="type_price" id="type_price" class="form-select" required>
                                            <option value="">Narx turi</option>
                                            @foreach (['m2', 'soat','belgilangan','litr','dona'] as $type)
                                                <option value="{{ $type }}" {{ old('type_price') == $type ? 'selected' : '' }}>
                                                    {{ $type }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="type_price">Narx birligi</label>
                                        @error('type_price') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Narx" value="{{ old('price') }}" required>
                                        <label for="price">Narx</label>
                                        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        <select name="is_active" id="is_active" class="form-select" required>
                                            <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Faol</option>
                                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Faol emas</option>
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
                                <div class="tab-pane fade show active" id="uz" role="tabpanel">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="title_uz" name="title_uz" class="form-control" placeholder="Title (UZ)" value="{{ old('title_uz') }}">
                                                <label for="title_uz">Title (UZ)</label>
                                                @error('title_uz') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="description_uz" class="form-label">Description (UZ)</label>
                                        <textarea id="description_uz" name="description_uz" class="form-control editor" rows="5">{{ old('description_uz') }}</textarea>
                                        @error('description_uz') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="ru" role="tabpanel">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="title_ru" name="title_ru" class="form-control" placeholder="Title (RU)" value="{{ old('title_ru') }}">
                                                <label for="title_ru">Title (RU)</label>
                                                @error('title_ru') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="description_ru" class="form-label">Description (RU)</label>
                                        <textarea id="description_ru" name="description_ru" class="form-control editor" rows="5">{{ old('description_ru') }}</textarea>
                                        @error('description_ru') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="en" role="tabpanel">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="title_en" name="title_en" class="form-control" placeholder="Title (EN)" value="{{ old('title_en') }}">
                                                <label for="title_en">Title (EN)</label>
                                                @error('title_en') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="description_en" class="form-label">Description (EN)</label>
                                        <textarea id="description_en" name="description_en" class="form-control editor" rows="5">{{ old('description_en') }}</textarea>
                                        @error('description_en') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Image</label><br>
                                <label class="custom-dropzone">
                                    <input type="file" name="image">
                                </label>
                                @error('image') <br><small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Submit --}}
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categorySelect = document.getElementById('category_id');
            const subCategorySelect = document.getElementById('sub_category_id');

            categorySelect.addEventListener('change', function () {
                const categoryId = this.value;

                // Sub Category select-ni tozalash
                subCategorySelect.innerHTML = '<option value="">Select Sub Category</option>';

                if (categoryId) {
                    // AJAX so‘rov yuborish
                    fetch('{{ route("get.sub.categories") }}?category_id=' + categoryId)
                        .then(response => response.json())
                        .then(data => {
                            // Sub-kategoriyalarni qo‘shish
                            data.forEach(subCategory => {
                                const option = document.createElement('option');
                                option.value = subCategory.id;
                                option.textContent = subCategory.title_uz;
                                subCategorySelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching sub-categories:', error);
                        });
                }
            });
        });
    </script>
    <!-- / Content -->
@endsection
