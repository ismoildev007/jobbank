@extends('layouts.admin')

@section('content')
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="deleted_images" value="">

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline mt-2">
                                <div class="px-4 py-2 border d-flex justify-content-between align-items-center">
                                    <div>
                                        <h3 class="card-title">Создать новый продукт</h3>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-plus-circle"></i> Создать продукт
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card p-2">
                                                <ul class="nav nav-pills mb-3" id="languageTabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="uzbek-tab" data-toggle="pill"
                                                           href="#uzbek" role="tab" aria-controls="uzbek"
                                                           aria-selected="true">Узбекский</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="russian-tab" data-toggle="pill"
                                                           href="#russian" role="tab" aria-controls="russian"
                                                           aria-selected="false">Русский</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="english-tab" data-toggle="pill"
                                                           href="#english" role="tab" aria-controls="english"
                                                           aria-selected="false">Английский</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="turkish-tab" data-toggle="pill"
                                                           href="#turkish" role="tab" aria-controls="turkish"
                                                           aria-selected="false">Турецкий</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content" id="languageTabsContent">
                                                    <!-- Узбекский -->
                                                    <div class="tab-pane fade show active" id="uzbek" role="tabpanel"
                                                         aria-labelledby="uzbek-tab">
                                                        <div class="form-group">
                                                            <label for="name_uz">Название (Узбекский)</label>
                                                            <input type="text" class="form-control" id="name_uz"
                                                                   name="name_uz"
                                                                   value="{{ old('name_uz', $product->name_uz) }}"
                                                                   placeholder="Введите название продукта на узбекском">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description_uz">Описание (Узбекский)</label>
                                                            <textarea id="summernote_uz" class="form-control"
                                                                      name="description_uz"
                                                                      placeholder="Введите описание продукта на узбекском">{{ old('description_uz', $product->description_uz) }}</textarea>
                                                        </div>
                                                    </div>

                                                    <!-- Русский -->
                                                    <div class="tab-pane fade" id="russian" role="tabpanel"
                                                         aria-labelledby="russian-tab">
                                                        <div class="form-group">
                                                            <label for="name_ru">Название (Русский)</label>
                                                            <input type="text" class="form-control" id="name_ru"
                                                                   name="name_ru"
                                                                   value="{{ old('name_ru', $product->name_ru) }}"
                                                                   placeholder="Введите название продукта на русском">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description_ru">Описание (Русский)</label>
                                                            <textarea id="summernote_ru" class="form-control"
                                                                      name="description_ru"
                                                                      placeholder="Введите описание продукта на русском">{{ old('description_ru', $product->description_ru) }}</textarea>
                                                        </div>
                                                    </div>

                                                    <!-- Английский -->
                                                    <div class="tab-pane fade" id="english" role="tabpanel"
                                                         aria-labelledby="english-tab">
                                                        <div class="form-group">
                                                            <label for="name_en">Название (Английский)</label>
                                                            <input type="text" class="form-control" id="name_en"
                                                                   name="name_en"
                                                                   value="{{ old('name_en', $product->name_en) }}"
                                                                   placeholder="Введите название продукта на английском">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description_en">Описание (Английский)</label>
                                                            <textarea id="summernote_en" class="form-control"
                                                                      name="description_en"
                                                                      placeholder="Введите описание продукта на английском">{{ old('description_en', $product->description_en) }}</textarea>
                                                        </div>
                                                    </div>

                                                    <!-- Турецкий -->
                                                    <div class="tab-pane fade" id="turkish" role="tabpanel"
                                                         aria-labelledby="turkish-tab">
                                                        <div class="form-group">
                                                            <label for="name_tr">Название (Турецкий)</label>
                                                            <input type="text" class="form-control" id="name_tr"
                                                                   name="name_tr"
                                                                   value="{{ old('name_tr', $product->name_tr) }}"
                                                                   placeholder="Введите название продукта на турецком">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description_tr">Описание (Турецкий)</label>
                                                            <textarea id="summernote_tr" class="form-control"
                                                                      name="description_tr"
                                                                      placeholder="Введите описание продукта на турецком">{{ old('description_tr', $product->description_tr) }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="form-group col-md-4">
                                                        <label for="stock">Запас</label>
                                                        <input type="number" class="form-control" id="stock"
                                                               name="stock" value="{{ old('stock', $product->stock) }}"
                                                               placeholder="Введите количество на складе" min="0">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="price">Цена</label>
                                                        <input type="number" class="form-control" id="price"
                                                               name="price" value="{{ old('price', $product->price) }}"
                                                               placeholder="Введите цену продукта" min="0">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="discount">Скидка (%)</label>
                                                        <input type="number" class="form-control" id="discount"
                                                               name="discount"
                                                               value="{{ old('discount', $product->discount) }}"
                                                               placeholder="Введите скидку на продукт" min="0"
                                                               max="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card p-4">
                                                <div class="form-group">
                                                    <label for="category_id">Категория</label>
                                                    <select class="form-control" id="category_id" name="category_id">
                                                        <option value="">Выберите категорию</option>
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name_ru }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="brand_id">Бренд</label>
                                                    <select class="form-control" id="brand_id" name="brand_id">
                                                        <option value="">Выберите бренд</option>
                                                        @foreach($brands as $brand)
                                                            <option
                                                                value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                                                {{ $brand->name_ru }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- Display Main Image -->
                                                <div class="form-group">
                                                    <label>Текущее изображение продукта</label>
                                                    @if ($product->image)
                                                        <div class="mb-3">
                                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                                 alt="Product Image" class="img-thumbnail"
                                                                 style="max-width: 200px;">
                                                        </div>
                                                    @endif
                                                    <label for="image">Новое изображение продукта</label>
                                                    <input type="file" class="form-control-file" id="image"
                                                           name="image">
                                                </div>

                                                <div class="form-group">
                                                    <label>Текущие дополнительные изображения</label>
                                                    @if ($product->images)
                                                        <div class="d-flex flex-wrap mb-3">
                                                            @foreach ($product->images as $image)
                                                                <div class="position-relative mr-2">
                                                                    <img src="{{ asset('storage/' . $image) }}"
                                                                         alt="Additional Image"
                                                                         class="img-thumbnail image-preview"
                                                                         style="max-width: 100px; height: 100px; cursor: pointer;"
                                                                         onclick="triggerFileInput('{{ $image }}')">

                                                                    <span class="position-absolute text-danger font-weight-bold"
                                                                          style="top: 5px; right: 5px; cursor: pointer;"
                                                                          onclick="deleteImage(event, '{{ $image }}')">×</span>

                                                                    <input type="file"
                                                                           class="form-control file-input"
                                                                           name="updated_images[{{ $image }}]"
                                                                           accept="image/*"
                                                                           style="display: none;"
                                                                           data-image="{{ $image }}"
                                                                           onchange="previewImage(event, '{{ $image }}')">
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    @endif

                                                    <label for="images">Новые дополнительные изображения</label>
                                                    <input type="file" class="form-control-file" id="images"
                                                           name="images[]" multiple>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </form>
    <script>
        // Trigger the file input when an image is clicked
        function triggerFileInput(imagePath) {
            const fileInput = document.querySelector(`input[data-image="${imagePath}"]`);
            if (fileInput) {
                fileInput.click();
            }
        }

        function previewImage(event, imagePath) {
            const fileInput = event.target;
            const imagePreview = document.querySelector(`img[onclick="triggerFileInput('${imagePath}')"]`);

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        function deleteImage(imagePath) {
            const deleteInput = document.querySelector('input[name="deleted_images"]');
            if (deleteInput) {
                deleteInput.value += `${imagePath},`;
            } else {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'deleted_images';
                input.value = `${imagePath},`;
                document.querySelector('form').appendChild(input);
            }

            event.target.closest('.position-relative').remove();
        }


    </script>
@endsection

{{--@section('scripts')--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            // Инициализация Summernote для всех textarea--}}
{{--            $('#summernote_uz').summernote();--}}
{{--            $('#summernote_ru').summernote();--}}
{{--            $('#summernote_en').summernote();--}}
{{--            $('#summernote_tr').summernote();--}}
{{--        });--}}

{{--    </script>--}}
{{--@endsection--}}


<style>
    .form-group {
        margin-bottom: 20px;
    }

    .nav-pills .nav-link {
        height: 33px !important;
        font-size: 13px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .nav-pills .nav-link.active {
        background-color: #68798c !important;
        color: white;
    }

    .nav-pills .nav-link:hover {
        background-color: #738395;
        color: white!important;
    }
    .tab-content {
        padding: 25px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .form-control {
        padding: 12px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }
    .form-control-file {
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }
    .image-preview {
        border: 1px solid #ddd;
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        object-fit: cover;
    }

    .file-input {
        display: none;
    }

    .position-relative span {
        font-size: 18px;
        background: white;
        border-radius: 50%;
        padding: 0 5px;
        line-height: 20px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

</style>
