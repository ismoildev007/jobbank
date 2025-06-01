@extends('layouts.admin')

@section('content')
    <form method="POST" action="{{ route('brands.update', $brand->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline mt-2">
                                <div class="px-4 py-2 border d-flex justify-content-between align-items-center">
                                    <div>
                                        <h3 class="card-title">Создать обновить бренд</h3>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-plus-circle"></i> обновить бренд
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
                                                            <a class="nav-link active" id="uzbek-tab" data-toggle="pill" href="#uzbek" role="tab" aria-controls="uzbek" aria-selected="true">Узбекский</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="russian-tab" data-toggle="pill" href="#russian" role="tab" aria-controls="russian" aria-selected="false">Русский</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="english-tab" data-toggle="pill" href="#english" role="tab" aria-controls="english" aria-selected="false">Английский</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="turkish-tab" data-toggle="pill" href="#turkish" role="tab" aria-controls="turkish" aria-selected="false">Турецкий</a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content" id="languageTabsContent">
                                                        <!-- Узбекский -->
                                                        <div class="tab-pane fade show active" id="uzbek" role="tabpanel" aria-labelledby="uzbek-tab">
                                                            <div class="form-group">
                                                                <label for="name_uz">Название (Узбекский)</label>
                                                                <input type="text" class="form-control" id="name_uz" name="name_uz" value="{{ old('name_uz', $brand->name_uz) }}" placeholder="Введите название бренда на узбекском">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description_uz">Описание (Узбекский)</label>
                                                                <textarea id="summernote_uz" class="form-control" name="description_uz" placeholder="Введите описание бренда на узбекском">{{ old('description_uz', $brand->description_uz) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <!-- Русский -->
                                                        <div class="tab-pane fade" id="russian" role="tabpanel" aria-labelledby="russian-tab">
                                                            <div class="form-group">
                                                                <label for="name_ru">Название (Русский)</label>
                                                                <input type="text" class="form-control" id="name_ru" name="name_ru" value="{{ old('name_ru', $brand->name_ru) }}" placeholder="Введите название бренда на русском">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description_ru">Описание (Русский)</label>
                                                                <textarea id="summernote_ru" class="form-control" name="description_ru" placeholder="Введите описание бренда на русском">{{ old('description_ru', $brand->description_ru) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <!-- Английский -->
                                                        <div class="tab-pane fade" id="english" role="tabpanel" aria-labelledby="english-tab">
                                                            <div class="form-group">
                                                                <label for="name_en">Название (Английский)</label>
                                                                <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en', $brand->name_en) }}" placeholder="Введите название бренда на английском">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description_en">Описание (Английский)</label>
                                                                <textarea id="summernote_en" class="form-control" name="description_en" placeholder="Введите описание бренда на английском">{{ old('description_en', $brand->description_en) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <!-- Турецкий -->
                                                        <div class="tab-pane fade" id="turkish" role="tabpanel" aria-labelledby="turkish-tab">
                                                            <div class="form-group">
                                                                <label for="name_tr">Название (Турецкий)</label>
                                                                <input type="text" class="form-control" id="name_tr" name="name_tr" value="{{ old('name_tr', $brand->name_tr) }}" placeholder="Введите название бренда на турецком">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description_tr">Описание (Турецкий)</label>
                                                                <textarea id="summernote_tr" class="form-control" name="description_tr" placeholder="Введите описание бренда на турецком">{{ old('description_tr', $brand->description_tr) }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row mt-3">
                                                    <div class="form-group col-md-6">
                                                        <label for="image">Изображение</label>
                                                        <input type="file" class="form-control-file" id="image" name="image">
                                                        @if($brand->image)
                                                            <div class="mt-2">
                                                                <img src="{{ asset('storage/' . $brand->image) }}" alt="Brand Image" class="img-thumbnail" width="150">
                                                            </div>
                                                        @endif
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
</style>
