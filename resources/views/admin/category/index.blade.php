
@extends('layouts.admin')
@php
    $lang = app()->getLocale();
 @endphp
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Categories</h5>
                <a href="{{route('categories.create')}}" class="btn btn-primary">
                    <i class="ri ri-add-line me-1"></i> Create
                </a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Category title</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$category->image) }}" alt="Image" width="100">
                            </td>
                            <td><span>{{ $category->{'title_' . $lang} }}</span></td>

                            <td>
                                <a href="{{route('categories.edit', $category->id)}}" class="text-primary me-2"><i class="icon-base ri ri-pencil-line icon-18px me-1"></i> Edit</a>
                                <a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i> Delete
                                </a>

                                <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <!-- / Content -->
@endsection
