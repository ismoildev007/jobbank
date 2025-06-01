@extends('layouts.admin')

@section('content')
    <form method="POST" action="{{ route('partners.update', $partner->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline mt-2">
                                <div class="px-4 py-2 border d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">Редактировать партнера</h3>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fas fa-save"></i> Сохранить изменения
                                    </button>
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
                                                    <div class="tab-pane fade show active" id="uzbek" role="tabpanel" aria-labelledby="uzbek-tab">
                                                        <div class="form-group">
                                                            <label for="name_uz">Название (Узбекский)</label>
                                                            <input type="text" class="form-control" id="title_uz" name="title_uz" value="{{ $partner->title_uz }}" placeholder="Введите название продукта на узбекском">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description_uz">Описание (Узбекский)</label>
                                                            <textarea id="summernote_uz" class="form-control" name="description_uz" placeholder="Введите описание продукта на узбекском">{{ $partner->description_uz }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="russian" role="tabpanel" aria-labelledby="russian-tab">
                                                        <div class="form-group">
                                                            <label for="name_ru">Название (Русский)</label>
                                                            <input type="text" class="form-control" id="title_ru" name="title_ru" value="{{ $partner->title_ru }}" placeholder="Введите название продукта на русском">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description_ru">Описание (Русский)</label>
                                                            <textarea id="summernote_ru" class="form-control" name="description_ru" placeholder="Введите описание продукта на русском">{{ $partner->description_ru }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="english" role="tabpanel" aria-labelledby="english-tab">
                                                        <div class="form-group">
                                                            <label for="name_en">Название (Английский)</label>
                                                            <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $partner->title_en }}" placeholder="Введите название продукта на английском">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description_en">Описание (Английский)</label>
                                                            <textarea id="summernote_en" class="form-control" name="description_en" placeholder="Введите описание продукта на английском">{{ $partner->description_en }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="turkish" role="tabpanel" aria-labelledby="turkish-tab">
                                                        <div class="form-group">
                                                            <label for="name_tr">Название (Турецкий)</label>
                                                            <input type="text" class="form-control" id="title_tr" name="title_tr" value="{{ $partner->title_tr }}" placeholder="Введите название продукта на турецком">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description_tr">Описание (Турецкий)</label>
                                                            <textarea id="summernote_tr" class="form-control" name="description_tr" placeholder="Введите описание продукта на турецком">{{ $partner->description_tr }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card p-4">
                                                <div class="form-group">
                                                    <label for="type">Тип</label>
                                                    <select class="form-control" id="type" name="type">
                                                        <option value="partner" {{ $partner->type == 'partner' ? 'selected' : '' }}>Partner</option>
                                                        <option value="banner" {{ $partner->type == 'banner' ? 'selected' : '' }}>Banner</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_id">Продукт</label>
                                                    <select class="form-control" id="product_id" name="product_id">
                                                        @foreach($products as $product)
                                                            <option value="{{ $product->id }}" {{ $partner->product_id == $product->id ? 'selected' : '' }}>{{ $product->name_ru }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Изображение</label>
                                                    <input type="file" class="form-control-file" id="image" name="image">
                                                    @if($partner->image)
                                                        <img src="{{ asset('storage/' . $partner->image) }}" alt="Partner Image" class="img-thumbnail mt-2" width="100">
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

<style>
    .form-group {
        margin-bottom: 20px;
    }

    .nav-pills .nav-link {
        font-size: 13px;
        border-radius: 5px;
    }

    .nav-pills .nav-link.active {
        background-color: #68798c;
        color: white;
    }

    .form-control {
        padding: 12px;
        font-size: 16px;
        border-radius: 5px;
    }
</style>
