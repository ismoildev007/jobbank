@extends('layouts.provider')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid pb-0">
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-md-6">
                    <div class="row flex-fill">
                        <div class="col-12">
                            <div class="card prov-widget">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <p class="mb-1 real-label">Kelgusi buyurtmalar</p>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <h5><span class="counter upcomingcount real-label">0</span></h5>
                                        </div>
                                        <span class="prov-icon bg-info d-flex justify-content-center align-items-center rounded">
                                        <i class="ti ti-calendar-check"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card prov-widget">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <p class="mb-1 real-label">Bajarilgan buyurtmalar</p>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <h5><span class="counter completecount real-label">0</span></h5>
                                        </div>
                                        <span class="prov-icon bg-success d-flex justify-content-center align-items-center rounded">
                                        <i class="ti ti-calendar-check"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card prov-widget">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <p class="mb-1 real-label">Bekor qilingan buyurtmalar</p>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <h5><span class="counter cancelcount real-label">0</span></h5>
                                        </div>
                                        <span class="prov-icon bg-danger d-flex justify-content-center align-items-center rounded">
                                        <i class="ti ti-calendar-check"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-center flex-column mb-3">
                                    <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                    <h6 class="text-center real-label">Umumiy daromad</h6>
                                    <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                    <h5 class="text-center totalincome real-label">So'm0</h5>

                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <div>
                                        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                        <p class="mb-0 real-label">Umumiy daromad</p>
                                        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                        <h5 class="completeincome real-label">So'm0</h5>
                                    </div>
                                    <div>
                                        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                        <p class="mb-0 real-label">To`lanishi kerak bo`lgan summa</p>
                                        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                        <h5 class="totaldue real-label">So'm0</h5>
                                    </div>
                                </div>
                                <div id="daily-chart"></div>
                                <div class="d-flex justify-content-center flex-column">
                                    <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                    <a href="https://jobbank.uz/provider/transaction" class="btn btn-dark real-label">Barcha daromadlarni ko`rish</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                            <h6 class="mb-3 real-label">Obuna</h6>
                            <div class="d-flex gap-3 flex-warp">
                                <div class="bg-light-300 rounded p-3 w-50">
                                    <div class="d-flex justify-content-between flex-wrap row-gap-2 mb-2 nosubscribe" style="display: none;">
                                        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                        <p class="mb-0 text-dark fw-medium subscribeplan real-label" style="display: none;">Siz hali hech qanday reja obunasiga yozilmadingiz.</p>
                                    </div>
                                    <div class="subscribedpack" style="">
                                        <div class="d-flex justify-content-between flex-wrap row-gap-2 mb-2">
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <span class="badge badge-success real-label">
                                            <i class="ti ti-point-filled"></i>Joriy reja
                                        </span>
                                        </div>
                                        <div class="mb-2">
                                            <p class="mb-0 text-dark fw-medium subscribedplantitle">Free</p>
                                            <span class="description"></span>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="me-2 subprice"></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light-300 rounded p-3 w-50 topup" style="display: none;">
                                    <div class="d-flex justify-content-between flex-wrap row-gap-2 mb-2">
                                        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                        <span class="badge badge-success real-label">
                                        <i class="ti ti-point-filled"></i>Top-Up
                                    </span>
                                    </div>
                                    <div class="mb-2">
                                        <p class="mb-0 text-dark fw-medium topupplantitle" style="display: none;"></p>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="me-2 topupprice" style="display: none;"></h5>
                                    </div>
                                </div>
                                <div class="bg-light-500 rounded p-3 popularplan" style="">
                                    <div class="d-flex justify-content-between align-items-center gap-3 mb-2">
                                        <div class="">
                                            <p class="mb-0 text-dark fw-medium plantitle">Silver</p>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <span class="d-block mb-2 real-label fs-12">Kichik jamoalar uchun eng mashhur rejalarimiz.</span>
                                            <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                            <a href="https://jobbank.uz/provider/subscription" class="text-info d-block real-label fs-10">Barcha rejalarni ko`rish</a>
                                        </div>
                                        <div class="d-flex">
                                            <h5 class="planprice">So'm50.00</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                <h6 class="real-label">Eng yaxshi xizmatlar</h6>
                                <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                <a href="https://jobbank.uz/provider/service" class="btn border serviceview real-label" style="display: none;">Barchasini ko`rish</a>
                            </div>
                            <div class="servicecard"><div class="text-center">No Data Found</div></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                <h6 class="real-label">Buyurtmalar</h6>
                                <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                <a href="https://jobbank.uz/provider/bookinglist" class="btn border bookview real-label" style="display: none;">Barchasini ko`rish</a>
                            </div>
                            <div class="bookcard"><div class="text-center">No Data Found</div></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                <h6 class="real-label">Eng so`nggi sharhlar</h6>
                            </div>
                            <div class="ratecard"><div class="text-center">No Data Found</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div id="message-loader" class="loader-wrapper hidden">
            <div class="spinner"></div>
        </div> -->
    </div>
@endsection
