@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Barcha Provaiderlarning Obuna Ma'lumotlari</h5>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif

                @if($subscriptions->isEmpty())
                    <div class="alert alert-warning text-center">
                        Hozircha hech qanday obuna mavjud emas.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Provaider</th>
                                <th>Reja</th>
                                <th>Boshlanish Sanasi</th>
                                <th>Tugash Sanasi</th>
                                <th>Holati</th>
                                <th>Ishlatilgan Xizmatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscriptions as $index => $subscription)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $subscription->provider->name ?? 'Noma`lum Provaider' }}</td>
                                    <td>{{ $subscription->sub->name_uz ?? 'Noma`lum Reja' }}</td>
                                    <td>{{ $subscription->start_date->format('d.m.Y H:i') }}</td>
                                    <td>{{ $subscription->end_date->format('d.m.Y H:i') }}</td>
                                    <td>
                                        @if($subscription->status == 'active')
                                            <span class="badge bg-success">Faol</span>
                                        @else
                                            <span class="badge bg-danger">Tugagan</span>
                                        @endif
                                    </td>
                                    <td>{{ $subscription->used_services_count }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
