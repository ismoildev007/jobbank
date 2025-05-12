@extends('layouts.front')

@section('content')
    @section('title')
        {{ __('main.travel.count') }} @endsection

    @section('desc') @endsection

    <!-- ======== Loading Start ======== -->
    <section class="loading-splint bg-dark position-fixed top-0 start-0 w-100 h-100 bg-opacity-75 d-none" id="loading"
             style="z-index: 10000;">
        <div class="position-fixed top-50 start-50 spinner-border text-light" role="status">
            <span class="visually-hidden">{{ __('main.insurance.check_payment_status') }}</span>
        </div>
    </section>

    <!-- Toast div -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div class="toast bg-white" role="alert" aria-live="assertive" aria-atomic="true" id="errorsToast" data-bs-autohide="true">
            <div class="toast-header">
                <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#dc3545"></rect>
                </svg>
                <strong class="me-auto">KAFIL SUG'URTA</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" id="closeToast"></button>
            </div>
            <div class="toast-body" id="errorMessage"></div>
        </div>
    </div>


    <div class="about" style="background-image:url({{ asset('assets/foto/travel-img.jpg') }});">
        <section class="container">
            <div class="about__cart">
                <ul class="about__menu">
                    <li>
                        <a href="{{ route('homepage') }}" class="about__menu__link">{{ __('main.homepage') }}</a>
                    </li>

                    <li>
                        <a class="about__menu__link">{{ __('main.travel.count') }}</a>
                    </li>
                </ul>

                <h2 class="online_services__title__h2">{{ __('main.travel.count') }}</h2>
            </div>
        </section>
    </div>

    <section class="mb">
        <div class="container">
            <div class="row mb-5">
                <div class="steps">
                    <div class="steps-body">
                        <div class="step text-center step-wrap">
						<span class="step-icon mb-4">
							<span class="circle_box_active">1</span>
						</span>
                            {{ __('main.fill_the_form') }}
                        </div>
                        <div class="step text-center step-wrap d-none d-sm-none d-lg-table-cell">
						<span class="step-icon mb-4">
							<span class="circle_box">2</span>
						</span>
                            {{ __('main.check_the_form') }}
                        </div>
                        <div class="step text-center step-wrap d-none d-sm-none d-lg-table-cell">
						<span class="step-icon mb-4">
							<span class="circle_box">3</span>
						</span>
                            {{ __('main.insurance.payment') }}
                        </div>
                    </div>

                    <div class="steps-header">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 33.3%" aria-valuenow="50" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-9">


                    <div class="row">

                        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>
                        <style>
                            .select2-selection__rendered {
                                border: 1px solid #ccc;
                                border-radius: 6px;
                                padding: .375rem 2.25rem .375rem .75rem;
                                font-size: 1rem;
                                margin-top: 10px;
                            }
                            .select2-search__field {
                                border-radius: 6px;
                                border: 1px solid #d7d7d7;
                                margin-top: 8px;
                            }
                            .select2-selection__clear {
                                display: none;
                            }

                            .select2-search__field:focus-visible {
                                border: 1px solid #832124 !important;
                            }

                            .select2-results__options {
                                height: 400px;
                                overflow: scroll;
                            }
                        </style>

                        <script>

                            document.addEventListener("DOMContentLoaded", function () {
                                $('.select2').select2({
                                    theme: 'bootstrap-5',
                                    placeholder: '{{ __("main.travel.choose_country") }}',
                                    allowClear: true
                                });
                            });
                        </script>
                    </div>

                    <div class="row ">

                        <!-- ============ Assosiy ma'lumoylar ============ -->
                        <div>
                            <h4 class="pb-3 mx-1">{{__('main.travel.main')}}</h4>
                            <div class="row border rounded p-3 white">
                                <div class="col-12 mb-3">

                                    <label for="visited_countries" class="form-label" style="width: 100%;">
                                        {{__('main.travel.country')}}
                                        <select required class="form-control select2 mt-2" id="visited_countries">
                                            <option value="">{{ __('main.travel.choose_country') }}</option>
                                            @php use Illuminate\Support\Str; @endphp
                                            @foreach ($countries as $country)
                                                <option
                                                    value="{{ $country['name_en'] }}"
                                                    data-name_uz="{{ $country['name_uz'] }}"
                                                    data-name_ru="{{ $country['name_ru'] }}"
                                                    data-name_en="{{ $country['name_en'] }}">
                                                    {{ Str::ucfirst(Str::lower($country['name_' . app()->getLocale()])) }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <span id="country_error" style="color: red; display: none;">@lang('main.travel.fill_fields')</span>
                                    </label>
                                    <div id="country_Label" class="d-none"></div>
                                </div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        const lang = '{{ app()->getLocale() }}'; // Laravel locale

                                        let translations = {
                                            uz: {
                                                noResults: function () {
                                                    return 'Hech narsa topilmadi';
                                                }
                                            },
                                            ru: {
                                                noResults: function () {
                                                    return 'Ничего не найдено';
                                                }
                                            },
                                            en: {
                                                noResults: function () {
                                                    return 'No results found';
                                                }
                                            }
                                        };

                                        $('.select2').select2({
                                            theme: 'bootstrap-5',
                                            placeholder: '{{ __("main.travel.choose_country") }}',
                                            allowClear: true,
                                            language: translations[lang] || translations.en
                                        });
                                    });
                                </script>


                                <div class="col-sm-6 col-lg-4 mb-3 align-self-end">
                                    <label for="select_dastur" class="form-label" data-title="Выберите пункт" style="display: -webkit-box;
																												 -webkit-line-clamp: 1;
																												 -webkit-box-orient: vertical;
																												 overflow: hidden;">
                                        {{__('main.travel.program')}}
                                    </label>
                                    <select required class="form-select" id="select_dastur">
                                        <option selected disabled hidden value="">1</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-lg-4 mb-3 align-self-end">
                                    <label for="select_repitation" class="form-label" data-title="Выберите пункт">
                                        {{__('main.travel.travel_repaet')}}
                                    </label>
                                    <select required class="form-select" id="select_repitation">
                                        <option value="1">{{__('main.travel.one_time')}}</option>
                                        <option value="2">{{__('main.travel.many_time')}}</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 col-lg-4 align-self-end">
                                    <div class="mb-3">
                                        <label for="" class="form-label">
                                            {{__('main.travel.travel_period_from')}}
                                        </label>
                                        <input onChange="calculateTime(this)" maxlength="10" id="start_date" type="date" value=""
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-3 col-lg-4 align-self-end trip_time_box">
                                    <div class="mb-3">
                                        <label for="" class="form-label">
                                            {{__('main.travel.travel_period_up')}}
                                        </label>
                                        <input maxlength="10" id="end_date" type="date" value="" class="form-control"
                                               onChange="calculateTime(this)">
                                    </div>
                                </div>
                                <div class="col-sm-3 col-lg-4 align-self-end trip_time_box">
                                    <div class="mb-3">
                                        <label for="" class="form-label">
                                            {{__('main.travel.number_day')}}
                                        </label> <br>
                                        <input maxlength="10" id="trip_time" onChange="calculateTime(this)" type="number" value="" min="1"
                                               class="form-control">
                                    </div>
                                </div>

                                <div id="multi_travel" class="col-sm-3 col-lg-4 align-self-end d-none">
                                    <div class="mb-3">
                                        <label for="Agreement_PeriodEndDateTypeId" class="form-label">
                                            {{__('main.travel.number_day')}}
                                        </label>
                                        <select class="form-control" id="Agreement_PeriodEndDateTyname" name="Agreement.PeriodEndDateTypeId">

                                            <option value="Multi One"> {{__('main.travel.1')}} </option>
                                            <option value="Multi Two">{{__('main.travel.2')}}</option>
                                            <option value="Multi Thee">{{__('main.travel.3')}}</option>
                                            <option value="Multi Four">{{__('main.travel.4')}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4 mb-3 align-self-end">
                                    <label for="travel_purpose" class="form-label" data-title="Выберите пункт">
                                        {{__('main.travel.purpose')}}
                                    </label>
                                    <select required class="form-select" id="travel_purpose">
                                        <option value="TOURISM">{{__('main.travel.tourism')}}</option>
                                        <option id="STUDY" value="STUDY">{{__('main.travel.study')}}</option>
                                        <option id="WORK" value="WORK">{{__('main.travel.work')}}</option>
                                        <option value="SPORT">{{__('main.travel.sport')}}</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-lg-4 mb-3 align-self-end">
                                    <label for="group_or_alone" class="form-label" data-title="Выберите пункт">
                                        {{__('main.travel.group')}}
                                    </label>
                                    <select required class="form-select" id="group_or_alone" onChange="toggleSelects()">
                                        <option value="">{{__('main.travel.select')}}</option>
                                        <option id="group_or_1" value="a1307e77-7836-45eb-a66b-d394b7ad6074">1-10
                                        </option>
                                        <option id="group_or_2" value="2a11f2f9-c242-4100-ac77-3e41405b4635">11-20
                                        </option>
                                        <option id="group_or_3" value="57ca1a3e-c839-4647-9c38-f454b9a64293">21-50
                                        </option>
                                        <option id="group_or_4" value="e9d71a30-6e6f-4199-a8bf-36ee00ce9639">51-70
                                        </option>
                                        <option id="group_or_5" value="3dd8895a-b2f3-44dd-9309-9159d1f16646">71-100
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-lg-4 mb-3 align-self-end">
                                    <label for="family_or_alone" class="form-label" data-title="Выберите пункт">
                                        {{__('main.travel.family')}}
                                    </label>
                                    <select required class="form-select" id="family_or_alone" onChange="toggleSelects()">
                                        <option value="">{{__('main.travel.select')}}</option>
                                        <option value="fa8dc4f4-6b54-46ed-bcdb-812b31f560c9">3-8
                                            {{__('main.travel.person')}} </option>
                                    </select>
                                </div>

                                <div class="col-sm-3 col-lg-4 mb-3 d-flex align-self-end d-none ">
                                    <input class="form-check-input" type="checkbox" id="voyage_insurance">
                                    <label for="voyage_insurance" class="mb-2">Юкни суғурталаш</label>
                                </div>
                                <div class="col-sm-12 col-lg-4 flex-column" id="getPersonalInfo" style="display: flex;"
                                     bis_skin_checked="1">
                                    <label for="this_is_btn" class="form-label" style="opacity: 0;">
                                        This is button
                                    </label>
                                    <button class="btn btn-danger" onClick="calculate()" id="form1_button">
                                        {{__('main.travel.btn_count')}} <span><i class="fas fa-long-arrow-alt-right"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <!-- Kerakmi ? -->
                        <div id="SearchpersonMain" style="display: none;">
                            <h4 class="py-3  ">@lang('main.insurance.applicant_details')</h4>
                            <div class="row p-3 bg-white border rounded">
                                <div id="SearchpersonInformationapplicant_pinfl">

                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="row ">
                                                <label for="applicant_applicant_passport_seria" class="form-label">
                                                    @lang('main.insurance.ID_passport')
                                                    <!--- Pasport raqami / Avtomobil egasining ID raqami --->
                                                </label>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 col-lg-4 mb-2">
                                                            <input type="text" maxlength="2" id="applicant_passport_seria" value="" placeholder="AA"
                                                                   class="form-control text-uppercase col-2" required>
                                                        </div>
                                                        <div class="col-sm-8 col-lg-8 mb-2">
                                                            <input maxlength="7" id="applicant_passport_number" type="text" placeholder="1234567"
                                                                   pattern="[0-9]+"
                                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                   value='' class="form-control col-4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="mb-3">
                                                <label onclick="renderDriversInHTML()" for="insured_pinfl" class="form-label active">
                                                    @lang('main.insurance.pinfl')
                                                </label>
                                                <input maxlength="14" value=""
                                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                       id="applicant_pinfl" placeholder="01234567891011" type="text" class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-sm-12 col-lg-2" id="getApplicantData">
                                            <div class="mb-2 d-flex flex-column">
                                                <label for="" class="form-label" data-title="Data" style="opacity: 0;">Get</label>
                                                <button type="button" class="btn btn-danger"
                                                        onclick="applicantData()">

                                                    <i id="refreshInput" class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-lg-2" style="display: none;" id="clearApplicantData">
                                            <div class="w-100">
                                                <label for="" class="form-label active" data-title="Clear" style="opacity: 0;">
                                                    Clear
                                                </label>
                                                <button type="button" class="btn btn-dark w-100" onclick="clearApplicantData()">
                                                    <i id="refreshInput" class="fa-solid fa-xmark"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div id="ApplicantDataBox" class="pb-3 mt-3" style="display: none;">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="mb-2 accident-phone">
                                                <label class="form-label mx-1 mt-2" for="applicant_lastName">@lang('main.accidents.firstname')
                                                </label>
                                                <input id="applicant_lastName" name="applicant_lastName" type="text" class="form-control mask-phone" disabled
                                                       value="" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="mb-2 accident-phone">
                                                <label class="form-label mx-1 mt-2" for="applicant_firstName">@lang('main.accidents.lastname')</label>
                                                <input id="applicant_firstName" name="applicant_firstName" type="text" class="form-control mask-phone" disabled
                                                       value="" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4 mt-2 ">
                                            <div class="mb-2 accident-phone">
                                                <label class="form-label mx-" for="applicant_middleName">@lang('main.accidents.midllename')</label>
                                                <input id="applicant_middleName" name="applicant_middleName" type="text" class="form-control mask-phone"
                                                       disabled value="" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-lg-8" id="applicant_address_box">
                                            <div class="mb-2 accident-phone">
                                                <label class="form-label mx-1" for="applicant_address">@lang('main.accidents.location')</label>
                                                <input id="applicant_address" name="applicant_address" type="text" class="form-control mask-phone white" disabled
                                                       value="" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-lg-8" id="applicant_region_box" style="display: none;">
                                            <div class="mb-2">
                                                <label class="form-label">{{ __('messages.region') }}</label>

                                                <select id="applicant_region" name="applicant_region" class="form-select"
                                                        onchange="updateApplicantRegionId()">
                                                    <option value="" disabled>@lang('main.select_region')</option>
                                                    <option value="23">@lang('main.regions.republic_of_karakalpakstan')</option>
                                                    <option value="15">@lang('main.regions.fergana_region')</option>
                                                    <option value="22">@lang('main.regions.khorezm_region')</option>
                                                    <option value="12">@lang('main.regions.syrdarya_region')</option>
                                                    <option value="20">@lang('main.regions.bukhara_region')</option>
                                                    <option value="10" selected>@lang('main.regions.tashkent_city')</option>
                                                    <option value="17">@lang('main.regions.andijan_region')</option>
                                                    <option value="11">@lang('main.regions.tashkent_region')</option>
                                                    <option value="13">@lang('main.regions.jizzakh_region')</option>
                                                    <option value="16">@lang('main.regions.namangan_region')</option>
                                                    <option value="21">@lang('main.regions.navoi_region')</option>
                                                    <option value="19">@lang('main.regions.surkhandarya_region')</option>
                                                    <option value="14">@lang('main.regions.samarkand_region')</option>
                                                    <option value="18">@lang('main.regions.kashkadarya_region')</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-lg-4">
                                            <div class="mb-2 accident-phone">
                                                <label class="form-label mx-1" for="applicant_phone">@lang('main.accidents.phone_number')</label>
                                                <input id="applicant_phone" oninput="phoneSet()" name="applicant_phone" maxlength="15" minlenght="9" type="text"
                                                       class="form-control mask-phone" value="+998" required>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="insured_checkbox" class="col-sm-12 col-lg-12" style="display: none;">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" id="acceptIncurer" checked>
                                        <label class="form-check-label" for="acceptIncurer">
                                            @lang('main.accidents.confirm')
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Kerakmi ? -->

                        <div id="getInsuredPersonBox" style="display: none;">
                            <h4 class="my-3">{{__('main.travel.add')}}</h4>
                            <div class="row border rounded p-3 white ">

                                <div id="SearchpersonInformationapplicant_pinfl">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="row ">
                                                <label for="applicant_applicant_passport_seria" class="form-label">
                                                    @lang('main.insurance.ID_passport')
                                                    <!--- Pasport raqami / Avtomobil egasining ID raqami --->
                                                </label>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 col-lg-4 mb-3">
                                                            <input type="text" maxlength="2" id="insured_seria" value="" placeholder="AA" class="form-control text-uppercase col-2" required>
                                                        </div>
                                                        <div class="col-sm-8 col-lg-8 mb-3">
                                                            <input maxlength="7" value="" id="insured_number" type="text" required
                                                                   placeholder="1234567" pattern="[0-9]+"
                                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                   value='' class="form-control col-4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-12 col-lg-4">
                                            <div class="mb-3">
                                                <label for="insured_pinfl" class="form-label">
                                                    @lang('main.insurance.pinfl')
                                                </label>
                                                <input maxlength="14" value=""
                                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                       id="insured_pinfl" placeholder="01234567891011" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2" style="display: block;" id="">
                                            <div class="mb-3 d-flex flex-column">
                                                <label for="" class="form-label" data-title="Data" style="opacity: 0;">Get</label>
                                                <button type="button" class="btn btn-danger" id="" onclick="addInsurencePerson()">
                                                    <i id="refreshInput" class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="emptySearch">
                                    <ul id="insurencePersonList" class="row">
                                        <li class="col-md-6"> <span id="insurPersName">  </span> </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="row">
                                    <div class=" col-sm-12 col-lg-12 text-end">
                                        <button class="btn btn-danger mt-3" onClick="send_data()">
                                            @lang('main.accidents.check_data_btn') <span><i class="fas fa-long-arrow-alt-right"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <x-insurance.travel.parts.amount />
            </div>
        </div>
    </section>

    <style>
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;

            padding: 15px 20px;
            background-color: #f44336;
            /* Error color */
            color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .notification.show {
            opacity: 1;
            transform: translateY(0);
        }

        #notification-error {
            font-size: 11px;
            text-align: start;


        }

        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-left: auto;
        }

        .notification i {
            font-size: 20px;
        }

        .clothe-icon {
            font-size: 14px;
            padding-left: 5px;
        }

        #jismoniybox {
            margin-left: 1px;
        }

        #insurencePersonList {
            display: flex;
            gap: 10px;
            padding-left: 0;
            justify-content: space-between;
        }

        #insurencePersonList li {
            border-radius: 10px;
            padding: 10px 10px;
            display: flex;
            align-items: center;

        }

        .mb {
            margin-bottom: 60px;
        }


        .white {
            background: white;
        }

        .lime {
            display: flex;
            text-align: center;
        }

        .lime-p-1 {
            padding: 0;
            margin: 0;
            font-size: 12px;
            font-weight: 700;

        }

        .lime-p-2 {
            padding: 0;
            margin: 0;
            color: #a7a1a1;
            font-size: 12px;
            font-weight: 600;

        }
    </style>

    <!-- ?? -->
    <script>
        const formatter = new Intl.NumberFormat('uzs', {
            style: 'currency',
            currency: 'UZS',

        });

        // ??
        function showToast(message, delay = 5000) {
            let toastElement = document.getElementById("errorsToast");
            let toastBody = document.getElementById("errorMessage");
            let closeButton = document.getElementById("closeToast");

            if (!toastElement || !toastBody || !closeButton) {
                console.error("Toast elementlari topilmadi!");
                return;
            }

            toastBody.innerText = message;

            let toast = new bootstrap.Toast(toastElement, { delay: delay });

            closeButton.addEventListener("click", function () {
                toast.hide();
            });

            toast.show();
        }

        function currency(value, curren) {

            const currencyRespon = new Intl.NumberFormat(curren, {
                style: 'currency',
                currency: curren,
            });
            // console.log(currencyRespon.format(value));
            return currencyRespon.format(value);
        }

        function toggleSelects() {
            const groupSelect = document.getElementById('group_or_alone');
            const familySelect = document.getElementById('family_or_alone');

            if (groupSelect.value !== "") {
                familySelect.parentElement.classList.add('d-none');
            } else {
                familySelect.parentElement.classList.remove('d-none');
            }

            if (familySelect.value !== "") {
                groupSelect.parentElement.classList.add('d-none');
            } else {
                groupSelect.parentElement.classList.remove('d-none');
            }
        }

        // ??

        function checkDublicatePerson(data, personPinfl) {
            let result = 1;
            if (data.length > 0) {
                data.map((person) => {
                    // console.log(person.pinfl, personPinfl, 'dws', person.pinfl === personPinfl)
                    if (person.pinfl === personPinfl) {
                        const notification = document.getElementById('notification');
                        document.getElementById('notification-error').textContent = "ma`lumot kiritilgan";
                        notification.classList.add('show');
                        return result = 0;
                        // bir xil malumotlar kiritlish oldini olish uchun result ni 0 ga tenglang
                    }

                })
            }
            return result
        }

        // ??

        function renderInsuredPerson(data) {
            if (data.length > 0) {
                document.getElementById('emptySearch').classList.remove('d-none');
            } else {
                document.getElementById('emptySearch').classList.add('d-none');
            }
            let insurencePersonList = document.getElementById('insurencePersonList');
            // console.log(insurencePersonList);
            insurencePersonList.innerHTML = '';
            data.forEach((person, index) => {
                let li = document.createElement('li');
                let name = document.createElement('span');
                let remove = document.createElement('button');
                li.classList.add('col-lg-5', 'border', 'justify-content-between', 'my-3');
                remove.classList.add('btn', 'btn-outline-danger', 'h-100');
                remove.textContent = "{{__('main.insurance.delete_driver')}}";

                remove.id = person.pinfl;
                remove.addEventListener('click', (e) => {
                    insuredPersons = insuredPersons.filter(function (item) {
                        if (e.target.id === document.getElementById('applicant_pinfl').value) {
                            document.getElementById('acceptIncurer').checked = false
                        }
                        return item.pinfl != e.target.id;
                    });
                    calculate();
                    li.remove();
                    renderInsuredPerson(insuredPersons)
                    // checkInsuredPerson(insuredPersons);
                });
                name.id = "insurPersName";
                name.innerHTML = `
            <div class="px-3">
                <div class='lime'><p class='lime-p-2'>Ism Familyasi</p> </div>
                <span class=''>${person.lastNameEn} ${person.firstNameEn}</span>
	</div>
        		`;
                li.append(name);
                li.append(remove);

                insurencePersonList.append(li);
            });
        }

        // ??

        document.addEventListener('DOMContentLoaded', function() {
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            // Bugungi sanani olish
            const today = new Date();
            const formattedToday = today.toISOString().split('T')[0];

            // Start date qiymatini bugungi sanaga o'rnatish
            startDateInput.value = formattedToday;
            startDateInput.setAttribute('min', formattedToday);

            // Start date qiymatini yangilanganda end date uchun min va max qiymatlarni o'rnatish
            startDateInput.addEventListener('change', function() {
                const selectedDate = new Date(this.value);

                // Minimal sana: startDate dan 1 kun keyingi sana
                const minEndDate = new Date(selectedDate);
                minEndDate.setDate(minEndDate.getDate() + 1); // 1 kun qo'shish

                // Maksimal sana: startDate dan 1 yil keyingi sana
                const maxEndDate = new Date(selectedDate);
                maxEndDate.setFullYear(maxEndDate.getFullYear() + 1); // 1 yil qo'shish

                // End date uchun min va max qiymatlarni o'rnatish
                endDateInput.setAttribute('min', minEndDate.toISOString().split('T')[0]);
                endDateInput.setAttribute('max', maxEndDate.toISOString().split('T')[0]);

                // End date ni avtomatik ravishda minimal qiymatga o'rnatish
                endDateInput.value = minEndDate.toISOString().split('T')[0];
            });
            // Dastlabki start date qiymatini yangilash (minimal va maksimal end date qiymatlarini o'rnatish)
            startDateInput.dispatchEvent(new Event('change'));
        });


        // ??

        // ??
        function yoshHisoblash(tugilganSana) {
            // Bugungi sanani olamiz
            var bugun = new Date();
            // Tug'ilgan sanani obyektga aylantiramiz
            var tugilgan = new Date(tugilganSana);

            // Yoshni hisoblash
            var yosh = bugun.getFullYear() - tugilgan.getFullYear();

            // Agar hozirgi oy-tuning < tug'ilgan sanasi bo'lsa, yoshi bittadan kamayadi
            if (bugun.getMonth() < tugilgan.getMonth() || (bugun.getMonth() === tugilgan.getMonth() && bugun.getDate() <
                tugilgan.getDate())) {
                yosh--;
            }

            // Natijani qaytarish
            return yosh;
        }
        // ??

        var csrfToken = '{{ csrf_token() }}';



        // multiTarif
        // ??
        function multiTarif(event) {
            let davr = document.querySelectorAll('.trip_time_box');
            if (event.value === "1") {

                document.getElementById('multi_travel').classList.add('d-none');
                document.getElementById('multi_travel').classList.remove('d-block');

                davr[0].classList.remove('d-none');
                davr[0].classList.add('d-block');

                davr[1].classList.remove('d-none');
                davr[1].classList.add('d-block');

            } else {
                document.getElementById('multi_travel').classList.remove('d-none');
                document.getElementById('multi_travel').classList.add('d-block');

                davr[0].classList.remove('d-block');
                davr[0].classList.add('d-none');

                davr[1].classList.remove('d-block');
                davr[1].classList.add('d-none');
            }
            calculate()
        }
        // ??

        // calcaulator hisob kitob

        let start_date = document.getElementById('start_date');
        let today = new Date();
        document.getElementById('start_date').setAttribute('min', today.toISOString().split('T')[0]);
        // start_date.value = today.toISOString().split('T')[0];
        // today.setDate(today.getDate() + 1)
        let enddate = today
        enddate.setDate(today.getDate() + 4)
        let end_date = document.getElementById('end_date');
        // end_date.value = enddate.toISOString().split('T')[0];

        document.getElementById('end_date').setAttribute('min', document.getElementById('start_date').value);

        function calculate_trips_day(start, end) {

            var start_ml = new Date(start).getTime();
            var end__ml = new Date(end).getTime();
            var one_day = 1000 * 60 * 60 * 24;
            var day_dis = Math.abs(Math.round((end__ml - start_ml) / one_day));

            document.getElementById('trip_time').value = day_dis + 1;
        }

        function calculateTime(event) {
            const trip_time = document.getElementById('trip_time');
            document.getElementById('end_date').setAttribute('min', document.getElementById('start_date').value);
            if (event.id === "start_date") {
                let currentTime = new Date(event.value);
                currentTime.setDate(currentTime.getDate() + Number(trip_time.value) - 1)
                end_date.value = currentTime.toISOString().split('T')[0];
            } else if (event.id === "end_date") {
                calculate_trips_day(document.getElementById('start_date').value, event.value)
            } else if (event.id === "trip_time") {
                let currentTime = new Date(document.getElementById('start_date').value);
                currentTime.setDate(currentTime.getDate() + Number(event.value) - 1)
                end_date.value = currentTime.toISOString().split('T')[0];
            }
        }


        let programmTravel = 3;

        function select_dastur_function(programmTravel) {
            if (programmTravel === 1) {
                document.getElementById('select_dastur').innerHTML = ('<option value="LUXURY"> LUXURY </option>')
            } else if (programmTravel === 2) {
                document.getElementById('select_dastur').innerHTML = (
                    '<option value="OPTIMAL"> OPTIMAL </option> <option value="LUXURY"> LUXURY </option> ')
            } else if (programmTravel === 3) {
                document.getElementById('select_dastur').innerHTML = (
                    ' <option value="BASIC"> BASIC </option>  <option value="OPTIMAL"> OPTIMAL </option> <option value="LUXURY"> LUXURY </option>'
                )
            }
        }

        select_dastur_function(programmTravel)


        let countries = @json($countries);

        // Laravel orqali tilni olish
        let lang = document.documentElement.lang || 'uz'; // Agar HTML'da `<html lang="uz">` bo‘lsa, shu til olinadi

        // Foydalanuvchi tanlagan tilga mos keladigan nomni olish funksiyasi
        function getLocalizedCountryName(product) {
            if (lang === 'uz') return product.name_uz;
            if (lang === 'ru') return product.name_ru;
            if (lang === 'en') return product.name_en;
            return product.name_uz; // Default o‘zbekcha
        }

        let product = {

        }

        //new code
        let client = {}

        function validateInputs() {
            const requiredFields = [
                { id: 'visited_countries', name: "@lang('main.travel.country')" },
                { id: 'start_date', name: "@lang('main.travel.travel_period_from')" },
                { id: 'end_date', name: "@lang('main.travel.travel_period_up')" },
                { id: 'trip_time', name: "@lang('main.travel.number_day')" },
                { id: 'select_dastur', name: "@lang('main.travel.program')" },
                { id: 'select_repitation', name: "@lang('main.travel.travel_repaet')" },
                { id: 'travel_purpose', name: "@lang('main.travel.purpose')" },
            ];

            let emptyFields = [];

            for (let field of requiredFields) {
                const input = document.getElementById(field.id);
                if (!input || input.value.trim() === "") {
                    emptyFields.push(field.name);
                }
            }

            // ✅ maxsus tekshiruv: kamida bitta tanlangan bo‘lishi kerak
            const group = document.getElementById('group_or_alone');
            const family = document.getElementById('family_or_alone');

            const groupValue = group?.value.trim();
            const familyValue = family?.value.trim();

            if (groupValue === "" && familyValue === "") {
                emptyFields.push("@lang('main.travel.group')");
            }

            if (emptyFields.length > 0) {
                let msg = emptyFields.join(',\n') + " - @lang('main.travel.required_field')";
                showToast(msg, 15000);
                return false;
            }

            // 🔔 Maxsus ogohlantirish
            const groupSelect = document.getElementById('group_or_alone');
            const selectedOption = groupSelect.options[groupSelect.selectedIndex];
            const selectedValue = groupSelect.value;
            const selectedText = selectedOption.textContent.trim(); // "11-20"

            if (selectedValue === '2a11f2f9-c242-4100-ac77-3e41405b4635') {
                const warningMessage = `@lang('main.travel.you_must_add') ${selectedText} @lang('main.travel.people_warning')`;
                showToast(warningMessage);
            }

            return true;
        }


        let selectedCountries = [];

        // Laravel tilini olish
        const currentLocale = '{{ app()->getLocale() }}';
        document.getElementById('visited_countries').addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];

            if (selectedOption && selectedOption.value !== "") {
                // HTMLda data-name_uz, data-name_en, data-name_ru bor
                const countryName = selectedOption.getAttribute(`data-name_${currentLocale}`) || selectedOption.value;

                selectedCountries = [{
                    [`name_${currentLocale}`]: countryName
                }];

                console.log("Tanlangan mamlakat:", selectedCountries);
            } else {
                selectedCountries = [];
            }
        });

        function calculate() {
            if (!validateInputs()) {
                return; // inputlar to‘ldirilmagan, funksiyani to‘xtatamiz
            }
            const button = document.querySelector('.loading-splint');
            button.classList.remove('d-none');
            button.classList.add('d-block');
            button.querySelector('span').innerHTML = "{{ __('main.insurance.loading') }}...";

            const groupSelect = document.getElementById('group_or_alone');
            const purposeSelect = document.getElementById('travel_purpose');

            // group_or_alone select tanlangan qiymatni tekshirish
            if (purposeSelect.value === 'STUDY' || purposeSelect.value === 'WORK') {
                document.getElementById('group_or_1').classList.add('d-none');
                document.getElementById('group_or_2').classList.add('d-none');
                document.getElementById('group_or_3').classList.add('d-none');
                document.getElementById('group_or_4').classList.add('d-none');
                document.getElementById('group_or_5').classList.add('d-none');
            } else {
                document.getElementById('group_or_1').classList.remove('d-none');
                document.getElementById('group_or_2').classList.remove('d-none');
                document.getElementById('group_or_3').classList.remove('d-none');
                document.getElementById('group_or_4').classList.remove('d-none');
                document.getElementById('group_or_5').classList.remove('d-none');
            }

            // travel_purpose select tanlangan qiymatni tekshirish
            if (groupSelect.value === 'a1307e77-7836-45eb-a66b-d394b7ad6074' ||
                groupSelect.value === '2a11f2f9-c242-4100-ac77-3e41405b4635' ||
                groupSelect.value === '57ca1a3e-c839-4647-9c38-f454b9a64293' ||
                groupSelect.value === 'e9d71a30-6e6f-4199-a8bf-36ee00ce9639' ||
                groupSelect.value === '3dd8895a-b2f3-44dd-9309-9159d1f16646') {
                document.getElementById('STUDY').classList.add('d-none');
                document.getElementById('WORK').classList.add('d-none');
            } else {
                document.getElementById('STUDY').classList.remove('d-none');
                document.getElementById('WORK').classList.remove('d-none');
            }


            let countrys = "";

            const visitedSelect = document.getElementById('visited_countries');
            const selectedOption = visitedSelect.options[visitedSelect.selectedIndex];

            if (selectedOption && selectedOption.value !== "") {
                const countryName = selectedOption.getAttribute(`data-name_${currentLocale}`) || selectedOption.value;
                countrys = countryName;
            } else {
                showToast("{{ __('main.travel.country') }} - {{ __('main.travel.required_field') }}", 5000);
                return;
            }


            const agreement = {
                "agreementDate": new Date().toISOString().split('T')[0],
                "periodStartDate": document.getElementById('start_date').value,
                "periodEndDate": document.getElementById('end_date').value,
                "daysCount": document.getElementById('trip_time').value,
                "isBaggageInsured": 0,
                "isShengen": "false",
                "daysCountForSchengen": "0",
                "destinationCountries": countrys,
                "travelMultipleTypeId": document.getElementById('select_repitation').value,
                "periodEndDateTypeId": null,
                "periodEndDateTypeName": document.getElementById('Agreement_PeriodEndDateTyname').value,
                "travelProgramId": null,
                "travelProgramName": document.getElementById('select_dastur').value,
                "travelTargetTariffId": null,
                "travelTargetTariffName": document.getElementById('travel_purpose').value,
                "travelFamilyTariffId": document.getElementById('family_or_alone').value,
                "travelFamilyTariffName": "",
                "travelGroupTariffId": document.getElementById('group_or_alone').value,
                "travelGroupTariffName": "",
                "travelHealthProtectionTariffId": null,
                "travelHealthProtectionTariffName": ""
            }
            var data = {
                data: {
                    agreement
                },
                _token: csrfToken // If CSRF protection is enabled
            };
            console.log(data)
            // Ma'lumotlarni Laravel route-ga yuborish
            fetch('{{ route('travel.calculate') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    "agreement": agreement,
                    "insuredPersons": insuredPersons
                })
            })
                .then(response => response.json())
                .then(res => {
                    button.classList.remove('d-block');
                    button.classList.add('d-none');
                    let data = JSON.parse(res)
                    // console.log(data.operationResult)
                    if (!data.operationResult.result) {

                        document.getElementById("SearchpersonInformationapplicant_pinfl").classList.remove('d-none');
                        document.getElementById("SearchpersonMain").style.display = "block";
                        document.getElementById("calculatedAmount").textContent = formatter.format(data.operationResult.data
                            .premiumAmount);
                        document.getElementById("sumInsured").textContent = currency(data.operationResult.data.insuredAmount, data.operationResult.data.insuredAmountCurrency);
                        product = {
                            ...agreement,
                            "insuredAmount": data.operationResult.data.insuredAmount,
                            "premiumAmount": data.operationResult.data.premiumAmount,
                            "premiumAmountInSum": data.operationResult.data.premiumAmount,
                            "premiumCurrencyName": data.operationResult.data.premiumAmountCurrency,
                            "insuredAmountCurrencyName": data.operationResult.data.insuredAmountCurrency
                        }

                        if (data.operationResult.data.insuredPersons.length > 0) {

                            data.operationResult.data.insuredPersons.map((data, index) => {
                                let pers = insuredPersons[index];
                                pers.coefficient = data.coefficient;
                                pers.premiumAmount = data.minPremiumAmount;
                            })
                        }
                    }

                })
                .catch((error) => {
                    console.error('Error:', error);
                });

        }

        function phoneSet() {
            let input = document.getElementById("applicant_phone");

            // "+998" ni saqlab qolish
            if (!input.value.startsWith("+998")) {
                input.value = "+998";
            }

            // "+998" ni o‘chirib tashlashning oldini olish
            if (input.value.length < 4) {
                input.value = "+998";
            }

            // Faqat raqam va "+" belgisiga ruxsat berish
            input.value = input.value.replace(/[^0-9+]/g, "");

            // Maksimal uzunlikni cheklash (faqat 9 ta raqam kiritish mumkin)
            if (input.value.length > 13) {
                input.value = input.value.substring(0, 13);
            }

            // **client.phone ga qiymatni saqlaymiz**
            client.phone = input.value;
        }

        function send_data() {
            let phone = document.getElementById('applicant_phone').value;

            // Faqat raqamlarni ajratib olish (faqat 9ta raqam bo'lishi kerak "+998" dan keyin)
            const digitsOnly = phone.replace(/\D/g, ''); // faqat raqamlar, masalan: 998901234567

            // Raqamlar soni 12 dan kichik bo‘lsa (998 + 9 ta raqam = 12)
            if (digitsOnly.length < 12) {
                showToast("@lang('main.phone_format')");
                return;
            }
            // Ma'lumotlarni Laravel route-ga yuborish
            fetch('{{ route('travel.create') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    "agreement": product,
                    client,
                    insuredPersons
                })
            })
                .then(response => response.json())
                .then(res => {
                    if (res.id === null) {
                        let data = JSON.parse(res.message);
                        //alert(data.operationResult.errorMessage)
                        if (data.operationResult.errorMessage) {
                            showToast(data.operationResult.errorMessage);
                        }

                    } else {
                        let noIdurl = "{{ route('travel.application', ['id' => 'PLACEHOLDER_ID']) }}";
                        let url = noIdurl.replace('PLACEHOLDER_ID', res.id);
                        window.location.href = url;
                    }
                    //let data = JSON.parse(res)
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        function legalSend() {

            client.settlementAccount = document.getElementById("hisob_raqam").value
            client.mfoCode = document.getElementById("code_mfo").value
            client.phone = document.getElementById("phone_number").value
            client.innNumber = document.getElementById("inn").value

            // Ma'lumotlarni Laravel route-ga yuborish
            fetch('{{ route('travel.create') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    "agreement": product,
                    client,
                    insuredPersons
                })
            })
                .then(response => response.json())
                .then(res => {
                    let data = JSON.parse(res)
                    if (data.operationResult.result) {
                        alert(data.operationResult.errorMessage)
                    }

                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }
    </script>
    <!-- ?? -->

    <script>
        // document.getElementById('form1_button').addEventListener('click', () => {
        //     //document.getElementById("form1").classList.add('d-block');
        //     //document.getElementById("form1").classList.remove('d-none');
        //
        // });

        // Application Information
        let applicant;

        async function applicantData() {
            const button = document.querySelector('.loading-splint');

            let applicant_passportSeries = document.querySelector('#applicant_passport_seria');
            let applicant_passportNumber = document.querySelector('#applicant_passport_number');
            let applicant_pinfl = document.querySelector('#applicant_pinfl');

            // Inputlar to'liq kiritilganligini tekshirish
            let isValid = true;

            if (applicant_passportSeries.value.length !== 2) {
                applicant_passportSeries.classList.add('is-invalid');
                applicant_passportSeries.style.borderColor = "red";
                isValid = false;
            } else {
                applicant_passportSeries.classList.remove('is-invalid');
                applicant_passportSeries.style.borderColor = "green";
            }

            if (applicant_passportNumber.value.length !== 7) {
                applicant_passportNumber.classList.add('is-invalid');
                applicant_passportNumber.style.borderColor = "red";
                isValid = false;
            } else {
                applicant_passportNumber.classList.remove('is-invalid');
                applicant_passportNumber.style.borderColor = "green";
            }

            if (applicant_pinfl.value.length !== 14) {
                applicant_pinfl.classList.add('is-invalid');
                applicant_pinfl.style.borderColor = "red";
                isValid = false;
            } else {
                applicant_pinfl.classList.remove('is-invalid');
                applicant_pinfl.style.borderColor = "green";
            }

            if (!isValid) {
                showToast(`@lang('main.fill_in_all_fields')`, 20000);
                return;
            }

            try {
                button.classList.remove('d-none');
                button.classList.add('d-block');
                button.querySelector('span').innerHTML = "{{ __('main.insurance.loading') }}...";

                let data = {
                    transactionId: 23456788765,
                    isConsent: "Y",
                    senderPinfl: applicant_pinfl.value,
                    document: applicant_passportSeries.value + applicant_passportNumber.value,
                    pinfl: applicant_pinfl.value
                };

                let response = await fetch("{{ route('api.pinfl.application') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                })

                let res = await response.json();

                button.classList.remove('d-block');
                button.classList.add('d-none');

                if (res.error > 0) {
                    showToast(`@lang('main.errorNapp')`, 20000);

                    // alert("Yagona axborot tizimidan xatolik qaytdi, iltimos birozdan keyin urinib ko'ring.");

                    button.classList.remove('d-block');
                    button.classList.add('d-none');
                    return;
                }

                if (!res.result) {
                    showToast(`@lang('main.errorNapp')`, 20000);
                    button.classList.remove('d-block');
                    button.classList.add('d-none');
                    return;
                }

                if (res.error === 0) {
                    applicant = res.result;
                    let personClientInfo = res.result;

                    // Buttons
                    document.getElementById('getApplicantData').style.display = "none";
                    document.getElementById('clearApplicantData').style.display = "flex";

                    // Information div
                    document.getElementById("ApplicantDataBox").style.display = "block";
                    document.getElementById("getInsuredPersonBox").style.display = "block";
                    document.getElementById("insured_checkbox").style.display = "block";

                    document.getElementById("applicant_firstName").value = personClientInfo.firstNameLatin;
                    document.getElementById("applicant_lastName").value = personClientInfo.lastNameLatin;
                    document.getElementById("applicant_middleName").value = personClientInfo.middleNameLatin;

                    if (!res.result.regionId) {
                        document.getElementById('applicant_region_box').style.display = "block";
                        document.getElementById('applicant_address_box').style.display = "none";
                    } else {
                        document.getElementById('applicant_address').value = personClientInfo.address;
                        document.getElementById('applicant_address_box').style.display = "block";
                        document.getElementById('applicant_region_box').style.display = "none";
                    }

                    // Inputlarni disabled qilish
                    applicant_passportSeries.disabled = true;
                    applicant_passportNumber.disabled = true;
                    applicant_pinfl.disabled = true;

                    client = {
                        "residentTypeId": 1,
                        "firstName": personClientInfo.firstNameLatin,
                        "lastName": personClientInfo.lastNameLatin,
                        "surName": personClientInfo.middleNameLatin,
                        "legalTypeId": 3,
                        "firstNameEn": personClientInfo.firstEng,
                        "lastNameEn": personClientInfo.lastNameEng,
                        "gender": personClientInfo.gender === '1' ? true : false,
                        "birthday": personClientInfo.birthDate,
                        "applicant_passportSeries": personClientInfo.document.slice(0, 2),
                        "applicant_passportNumber": personClientInfo.document.slice(2, 9),
                        "passportIssueDate": personClientInfo.startDate,
                        "passportExpirationDate": personClientInfo.endDate,
                        "passportAuthority": personClientInfo.issuedBy,
                        "phone": document.getElementById('applicant_phone').value,
                        "pinfl": personClientInfo.pinfl,
                        "address": personClientInfo.address
                            ? personClientInfo.address
                            : document.getElementById("applicant_region")?.options[
                            document.getElementById("applicant_region").selectedIndex
                            ]?.text || "",
                        "regionIdForEosgoUz": personClientInfo.regionId
                            ? personClientInfo.regionId
                            : document.getElementById("applicant_region")?.value || "",
                        "districtIdForEosgoUz": personClientInfo.districtId,
                        "countryId": 170,
                        "age": null,
                        "specialConditions": "",
                    }

                    localStorage.setItem("applicantInfo", JSON.stringify(client));
                    // Hisoblash

                    document.getElementById('acceptIncurer').checked = true;
                    handleApplicantAsInsured(true);
                }

            } catch (error) {
                button.classList.remove('d-block');
                button.classList.add('d-none');
            }
        }

        let insuredPersons = [];

        function removeInsuredPersons(pinfl) {
            insuredPersons = insuredPersons.filter(item => item.pinfl !== pinfl);
        }

        function handleApplicantAsInsured(isChecked) {
            const pinfl = document.getElementById('applicant_pinfl').value;

            if (Object.keys(client).length === 0) {
                showToast('Ma`lumot yo‘q');
                document.getElementById('acceptIncurer').checked = false;
                return;
            }

            const combinedObject = Object.assign({}, client, {
                pinfl: pinfl, // Inputdan olamiz
                premiumAmount: 0,
                coefficient: 0
            });

            if (isChecked) {
                document.getElementById('ApplicantDataBox').style.display = 'block';

                // Avval o‘chir, so‘ng qo‘sh
                removeInsuredPersons(pinfl);
                insuredPersons.push(combinedObject);
                renderInsuredPerson(insuredPersons);

                // Saqlash
                const insuredInfo = {
                    document: client.document,
                    firstName: client.firstName,
                    lastName: client.lastName,
                    middleName: client.middleName,
                    birthDate: client.birthDate,
                    birthPlace: client.birthPlace,
                    pinfl: pinfl,
                    phone: client.phone,
                    address: client.address,
                    regionId: client.regionId,
                };
                localStorage.setItem("insuredInfoFromCheck", JSON.stringify(insuredInfo));
            } else {
                removeInsuredPersons(pinfl);
                renderInsuredPerson(insuredPersons);
                localStorage.removeItem("insuredInfoFromCheck");
            }

            console.log("Current insuredPersons:", insuredPersons);
            calculate();
        }

        document.getElementById('acceptIncurer').addEventListener('change', function () {
            handleApplicantAsInsured(this.checked);
        });

        function renderInsuredPerson(data) {
            const insurencePersonList = document.getElementById('insurencePersonList');
            const emptySearch = document.getElementById('emptySearch');

            // Bo‘sh ro‘yxatni ko‘rsatish
            if (data.length > 0) {
                emptySearch.classList.remove('d-none');
            } else {
                emptySearch.classList.add('d-none');
            }

            // Tozalash
            insurencePersonList.innerHTML = '';

            // Har bir sayohatchini chiqarish
            data.forEach((person, index) => {
                let li = document.createElement('li');
                li.classList.add('col-lg-5', 'border', 'justify-content-between', 'my-3', 'd-flex');

                let name = document.createElement('div');
                name.classList.add('px-3', 'flex-grow-1');
                name.innerHTML = `
				<div class="lime">
					<p class="lime-p-2">Ism Familyasi</p>
	</div>
				<span>${person.lastNameEn || person.lastName || ''} ${person.firstNameEn || person.firstName || ''}</span>
			`;

                let remove = document.createElement('button');
                remove.classList.add('btn', 'btn-outline-danger', 'h-100');
                remove.textContent = "{{ __('main.insurance.delete_driver') }}";
                remove.dataset.pinfl = person.pinfl;

                // O‘chirish tugmasi hodisasi
                remove.addEventListener('click', () => {
                    // Ro‘yxatdan o‘chirish
                    insuredPersons = insuredPersons.filter(item => item.pinfl !== person.pinfl);

                    // Agar o‘chirilgan odam applicant bo‘lsa — checkboxni false qilish
                    if (person.pinfl === document.getElementById('applicant_pinfl').value) {
                        document.getElementById('acceptIncurer').checked = false;
                        localStorage.removeItem("insuredInfoFromCheck");
                    }

                    // Qayta hisoblash va render qilish
                    calculate();
                    renderInsuredPerson(insuredPersons);
                });

                li.appendChild(name);
                li.appendChild(remove);
                insurencePersonList.appendChild(li);
            });
        }

        function updateApplicantRegionId() {
            const regionId = document.getElementById("applicant_region")?.value;
            if (!regionId) return;

            let applicantInfo = JSON.parse(localStorage.getItem("applicantInfo")) || {};

            applicantInfo.address = document.getElementById("applicant_region")?.options[
                document.getElementById("applicant_region").selectedIndex
                ]?.text;

            applicantInfo.regionId = regionId;

            localStorage.setItem("applicantInfo", JSON.stringify(applicantInfo));
        }

        // End Application Iformation

        async function addInsurencePerson() {
            // Ma'lumot get bo'lganda loading ishlashi uchun
            const button = document.querySelector('.loading-splint');

            button.classList.remove('d-none');
            button.classList.add('d-block');
            button.querySelector('span').innerHTML = "{{ __('main.insurance.loading') }}...";

            let insured_pinfl = document.getElementById('insured_pinfl');
            let insured_seria = document.getElementById('insured_seria');
            let insured_number = document.getElementById('insured_number');

            // Inputlar to'liq kiritilganligini tekshirish
            let isValid = true;

            if (insured_pinfl.value.length !== 14) {
                insured_pinfl.style.borderColor = "red";
                insured_pinfl.classList.add('is-invalid');
                isValid = false;
            } else {
                insured_pinfl.style.borderColor = "green";
                insured_pinfl.classList.remove('is-invalid');
            }

            if (insured_seria.value.length !== 2) {
                insured_seria.style.borderColor = "red";
                insured_seria.classList.add('is-invalid');
                isValid = false;
            } else {
                insured_seria.style.borderColor = "green";
                insured_seria.classList.remove('is-invalid');
            }

            if (insured_number.value.length !== 7) {
                insured_number.style.borderColor = "red";
                insured_number.classList.add('is-invalid');
                isValid = false;
            } else {
                insured_number.style.borderColor = "green";
                insured_number.classList.remove('is-invalid');
            }

            if (!isValid) {
                button.classList.remove('d-block');
                button.classList.add('d-none');
                showToast('Ma\'lumotlar to\'liq kiritilmadi');
                return;
            }

            let data = {
                transactionId: 23456788765,
                isConsent: "Y",
                senderPinfl: insured_pinfl.value,
                document: insured_seria.value + insured_number.value,
                pinfl: insured_pinfl.value
            };

            try {

                let res = await fetch("{{ route('api.pinfl.application') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                }).then(response => response.json())
                console.log(res);
                if (res.error > 0) {
                    showToast(`@lang('main.errorNapp')`, 20000);

                    // alert("Yagona axborot tizimidan xatolik qaytdi, iltimos birozdan keyin urinib ko'ring.");

                    button.classList.remove('d-block');
                    button.classList.add('d-none');
                    return;
                } else if (!res.result) { // || !res.result.regionId
                    showToast(`@lang('main.errorNapp')`, 20000);

                    button.classList.remove('d-block');
                    button.classList.add('d-none');
                    return;
                }
			{{--else if (!res.result || !res.result.regionId) { // || !res.result.regionId--}}
			{{--	showToast(`@lang('main.errorNappRegionId')`, 20000);--}}

			{{--	button.classList.remove('d-block');--}}
			{{--	button.classList.add('d-none');--}}
			{{--	return;--}}
			{{--}--}}
                else{
                    if (checkDublicatePerson(insuredPersons, insured_pinfl.value)) {
                        document.getElementById('emptySearch').classList.remove('d-none');
                        let responsePerson = res.result;
                        responsePerson.gender = responsePerson.gender === "1" ? true : false;
                        let insured_get = {
                            firstName: responsePerson.firstNameLatin || "",
                            lastName: responsePerson.lastNameLatin || responsePerson.lastNameEng,
                            middleName: responsePerson.middleNameLatin || "",
                            address: responsePerson.address
                                ? responsePerson.address
                                : "Toshkent Shaxar",
                            birthDate: responsePerson.birthDate || "",
                            birthPlace: responsePerson.birthPlace || "",
                            birthCountry: responsePerson.birthCountry || "",
                            gender: responsePerson.gender === "1" ? "Erkak" : "Ayol",
                            document: responsePerson.document || "",
                            startDate: responsePerson.startDate || "",
                            endDate: responsePerson.endDate || "",
                            issuedBy: responsePerson.issuedBy || "",
                            districtId: responsePerson.districtId || "",
                            pinfl: insured_pinfl.value,
                            regionId: responsePerson.regionId
                                ? responsePerson.regionId
                                : "10"
                        };
                        localStorage.setItem("insured_person_info", JSON.stringify(insured_get));

                        insuredPersons.push(insured_get);
                        renderInsuredPerson(insuredPersons);
                        calculate();
                        // tezqayt
                        // document.getElementById('form1').classList.remove('d-none');
                        document.getElementById('insured_pinfl').value = '';
                        document.getElementById('insured_seria').value = '';
                        document.getElementById('insured_number').value = '';
                    } else {
                        showToast('Ma\'lumot kiritilgan');
                    }
                }
            } catch (error) {
                console.log(error);
                showToast(`@lang('main.errorNapp')`, 20000);
            } finally {
                button.classList.remove('d-block');
                button.classList.add('d-none');
            }
        }


        // Clear Owner Box
        function clearBtnOwnerClient() {
            document.querySelector('#applicant_passportSeries').value = "";
            document.querySelector('#applicant_passportNumber').value = "";
            document.querySelector('#pinfl').value = "";

            document.getElementById('getBtnOwner').style.display = "block";
            document.getElementById('clearBtnOwnerClient').style.display = "none";
            document.getElementById('ApplicantDataBoxClient').style.display = "none";
            document.getElementById('finishButton').style.display = "none";

        };

        function clearApplicantData() {
            document.querySelector('#applicant_passport_seria').value = "";
            document.querySelector('#applicant_passport_number').value = "";
            document.querySelector('#applicant_pinfl').value = "";

            document.querySelector('#applicant_passport_seria').style.borderColor = 'red';
            document.querySelector('#applicant_passport_number').style.borderColor = 'red';
            document.querySelector('#applicant_pinfl').style.borderColor = 'red';
            document.querySelector('#applicant_passport_seria').disabled = false;
            document.querySelector('#applicant_passport_number').disabled = false;
            document.querySelector('#applicant_pinfl').disabled = false;
            document.querySelector('#acceptIncurer').checked = false;

            document.getElementById('getApplicantData').style.display = "block";
            document.getElementById('clearApplicantData').style.display = "none";
            document.getElementById('ApplicantDataBox').style.display = "none";
            document.getElementById('getInsuredPersonBox').style.display = "none";
            document.getElementById('insured_checkbox').style.display = "none";

        }

        document.getElementById('visited_countries').addEventListener('change', function () {
            var selectedOptions = [];
            var options = this.selectedOptions;
            for (var i = 0; i < options.length; i++) {
                selectedOptions.push(options[i].value);
            }

            // Agar bo'sh bo'lsa, error ko'rsatish
            var countryError = document.getElementById("country_error");
            if (selectedOptions.length === 0 || (selectedOptions.length === 1 && selectedOptions[0] === "")) {
                countryError.style.display = "inline";
                return;
            } else {
                countryError.style.display = "none";
            }

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/travel/getTerritoryIds/" + selectedOptions, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    var countryLabel = document.getElementById("country_Label");
                }
            };
            xhr.send();
        });


    </script>

@endsection
