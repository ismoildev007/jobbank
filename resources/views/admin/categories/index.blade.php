@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline mt-2">
                            <div class="px-4 py-2 border d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="card-title">Список категорий</h3>
                                </div>
                                <div>
                                    <!-- Кнопка создания категории с иконкой -->
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-plus-circle"></i> Создать категорию
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Название (RU)</th>
                                        <th>Описание</th>
                                        <th>Продукты</th>
                                        <th class="d-flex justify-content-end">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->name_ru }}</td>
                                            <td>{{ Str::limit($category->description_ru, 50) }}</td>
                                            <td>{{ $category->products->count() }}</td>
                                            <td class="d-flex justify-content-end">
                                                <a href="{{ route('categories.show', $category->id) }}" class="mr-2 d-none">
                                                    <i class="fas fa-eye text-black"></i>
                                                </a>
                                                <a href="{{ route('categories.edit', $category->id) }}" class="mx-2">
                                                    <i class="fas fa-edit text-black"></i>
                                                </a>
                                                <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger" style="border: none; background: none;" onclick="return confirm('Вы уверены, что хотите удалить категорию?');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Нет доступных категорий</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                {{-- {{ $categories->links() }} <!-- Пагинация --> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<style>
    .card-title {
        font-size: 18px;
        font-weight: bold;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }

    .btn {
        font-size: 14px;
    }
</style>
