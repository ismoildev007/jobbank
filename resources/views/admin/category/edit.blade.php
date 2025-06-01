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
                    <form action="{{ route('categories.update', [$category->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                        @csrf
                        <div class="col-md-12 mb-4">
                            <div class="form-floating form-floating-outline">
                                <select class="form-select" name="parent_id" id="parent_id">
                                    <option value="">-- No Parent --</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ isset($category) && $category->parent_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->title_uz }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="parent_id">Parent Category</label>
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
                                            <input type="text" id="title_uz" name="title_uz" class="form-control" placeholder="Title (UZ)" value="{{ old('title_uz', $category->title_uz) }}">
                                            <label for="title_uz">Title (UZ)</label>
                                            @error('title_uz') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="description_uz" class="form-label">Description (UZ)</label>
                                    <textarea id="description_uz" name="description_uz" class="form-control editor" rows="5">{{ old('description_uz', $category->description_uz) }}</textarea>
                                    @error('description_uz') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            {{-- Russian Tab --}}
                            <div class="tab-pane fade" id="ru" role="tabpanel">
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="title_ru" name="title_ru" class="form-control" placeholder="Title (RU)" value="{{ old('title_ru', $category->title_ru) }}">
                                            <label for="title_ru">Title (RU)</label>
                                            @error('title_ru') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="description_ru" class="form-label">Description (RU)</label>
                                    <textarea id="description_ru" name="description_ru" class="form-control editor" rows="5">{{ old('description_ru', $category->description_ru) }}</textarea>
                                    @error('description_ru') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            {{-- English Tab --}}
                            <div class="tab-pane fade" id="en" role="tabpanel">
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="title_en" name="title_en" class="form-control" placeholder="Title (EN)" value="{{ old('title_en',$category->title_en) }}">
                                            <label for="title_en">Title (EN)</label>
                                            @error('title_en') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="description_en" class="form-label">Description (EN)</label>
                                    <textarea id="description_en" name="description_en" class="form-control editor" rows="5">{{ old('description_en',$category->description_en) }}</textarea>
                                    @error('description_en') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label>
                                <input type="file" name="image">
                            </label>
                            @if ($category->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="150">
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary inline-block">Save</button>
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
