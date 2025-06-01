@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">00
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline mt-2">
                            <div class="px-4 py-2 border d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="card-title">Список заказов</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Имя клиента</th>
                                        <th>Email</th>
                                        <th>Телефон</th>
                                        <th>Общая сумма</th>
                                        <th>Статус</th>
                                        <th>Продукты</th>
                                        <th class="d-flex justify-content-end">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->full_name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ number_format($order->total_amount, 2) }} ₽</td>
                                            <td>{{ ucfirst($order->status) }}</td>
                                            <td>
                                                <ul>
                                                    @foreach($order->items as $item)
                                                        <li>{{ $item->product->name_ru }} => ({{ $item->quantity }} x {{ number_format($item->price, 2) }} $)</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="d-flex justify-content-end">
                                                <a href="{{ route('orders.edit', $order->id) }}" class="mx-2">
                                                    <i class="fas fa-edit text-black"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Нет доступных заказов</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                {{ $orders->links() }} <!-- Pagination links -->
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

    .table ul {
        list-style-type: none;
        padding: 0;
    }

    .table ul li {
        padding-left: 0;
    }
</style>
