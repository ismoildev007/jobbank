@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline mt-2">
                            <div class=" px-4 py-2 border d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="card-title">Создать новый продукт</h3>
                                </div>
                                <div>
                                    <!-- Кнопка создания продукта с иконкой -->
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('products.create') }}" type="submit" class="btn btn-sm btn-primary">
                                            <i class="fas fa-plus-circle"></i> Создать продукт
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table  table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Название</th>
                                        <th>Категория</th>
                                        <th>Бренд</th>
                                        <th>Цена</th>
                                        <th>Скидка</th>
                                        <th>Запас</th>
                                        <th class="d-flex justify-content-end">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name_ru }}</td>
                                            <td>{{ $product->category->name ?? 'Без категории' }}</td>
                                            <td>{{ $product->brand->name ?? 'Без бренда' }}</td>
                                            <td>{{ $product->price }} сум</td>
                                            <td>{{ $product->discount }}%</td>
                                            <td>{{ $product->stock }}</td>
                                            <td class="d-flex justify-content-end " >
                                                <a href="{{ route('products.show', $product->id) }}" class="d-none" style="color: black!important;">
                                                    <i class="fas fa-eye text-black"></i>
                                                </a>
                                                <a href="{{ route('products.edit', $product->id) }}" class="mx-2 text-b" >
                                                    <i class="fas fa-edit text-black"></i>
                                                </a>
                                                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger  " style="border: none ; background:none;" onclick="return confirm('Вы уверены, что хотите удалить продукт?');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Нет доступных продуктов</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer">
                                {{--                                {{ $products->links() }} <!-- Пагинация -->--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
