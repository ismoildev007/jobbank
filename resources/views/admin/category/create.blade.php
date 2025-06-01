@extends('layouts.admin')
@section('content')
    <!-- Content -->
    <div class="row mb-6 gy-6 p-5">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Basic with Icons</h5>
                    <small class="text-body float-end">Merged input group</small>
                </div>
                <div class="card-body">
                    <form  action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="title_uz" name="title_uz" class="form-control"
                                           placeholder="Title (UZ)">
                                    <label for="title_uz">Title (UZ)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="title_ru" name="title_ru" class="form-control"
                                           placeholder="Title (RU)">
                                    <label for="title_ru">Title (RU)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="title_en" name="title_en" class="form-control"
                                           placeholder="Title (EN)">
                                    <label for="title_en">Title (EN)</label>
                                </div>
                            </div>
                        </div>


                        <div class="mb-4">
                            <label for="description_ru" class="form-label">Description (Uz)</label>
                            <textarea id="description_ru" name="description_uz" class="form-control editor"
                                      rows="5"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="description_ru" class="form-label">Description (RU)</label>
                            <textarea id="description_ru" name="description_ru" class="form-control editor"
                                      rows="5"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="description_en" class="form-label">Description (EN)</label>
                            <textarea id="description_en" name="description_en" class="form-control editor"
                                      rows="5"></textarea>
                        </div>
                        <div class="mb-4">

                        <label class="custom-dropzone">
                            <input type="file" name="image">
                        </label>
                        </div>
                        <button type="submit" class="btn btn-primary inline-block">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- / Content -->
@endsection
