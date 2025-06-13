@extends('layouts.admin')
@php
$lang = app()->getLocale();
@endphp

@section('content')
<!-- Kontent -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Buyurtmalar</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foydalanuvchi</th>
                        <th>Telefon</th>
                        <th>Manzil</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->full_name ?? '-' }}</td>
                        <td>{{ $order->user->phone ?? '-' }}</td>
                        <td>{{ $order->address ?? '-' }}</td>
                        <td>
                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="form-control sm">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Jarayonda
                                    </option>
                                    <option value="done" {{ $order->status == 'done' ? 'selected' : '' }}>Tugatilgan</option>
                                    <option value="rejected" {{ $order->status == 'rejected' ? 'selected' : ''
                                        }}>Bekor qilingan</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Buyurtmalar mavjud emas</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $orders->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
@endsection