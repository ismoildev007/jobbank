@extends('layouts.admin')

@section('content')
    <form method="POST" action="{{ route('orders.update', $order->id) }}">
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
                                        <h3 class="card-title">Редактировать заказ</h3>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fas fa-plus-circle"></i> Обновить заказ
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="status">Статус</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="completed" {{ old('status', $order->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="canceled" {{ old('status', $order->status) == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                        </select>
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
