<?php
$lang = App()->getLocale();
?>
@extends('layouts.corparative.index')
<!-- @section('title', 'Список аффилированных') -->
@section('content')
    <main class="text-light-black fs-14 fs-12-responsive overflow-hidden dr-text">
        <div class="container text-grey d-flex align-items-center py-3">
            <span>Все услуги</span>
            <span><i class="fa-solid fa-chevron-right fs-10 mx-2"></i></span>
            <span>Страхование спортсменов</span>
            <span><i class="fa-solid fa-chevron-right fs-10 mx-2"></i></span>
            <span>1 этап</span>
        </div>
        <div class="bg-main-sport drop-shadow-3">
            <div class="container h-100">
                <div class="h-100 col-lg-6 d-flex flex-column justify-content-between dsago-main-section">
                    <p class="fw-bold">Спорт</p>
                    <div class="mt-4 mt-lg-0">
                        <h2 class="dr-text  fw-bold display-5 mb-3">
                            Страхование <br class="d-block d-md-none" />
                            спортсменов
                        </h2>
                        <p class="mb-4">
                            Заполните всю необходимую <br class="d-lg-none" />
                            информацию онлайн не посещая офис
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4 position-relative">
            <div class="col-12 bg-light-grey rounded-10-10 pt-4 ps-3 pb-3 pe-3">
                <h4 class="dr-text  fw-bold">5 минут и Ваш полис готов</h4>
                <p>Пройдите 4 простых шага, узнайте оценочную стоимость, введите данные, оплатите и получите полис</p>
            </div>
            <div class="d-flex tabs rounded-bottom-3 drop-shadow-4 m-0 w-100 tabs-responsive">
                <div data-bs-target="#count" class="nav-link dr-text   p-4 rounded-start-3 border-2 position-relative">
                    <i style="color: #203046; background-color: transparent" id="icon"
                       class="fa-solid fa-caret-up position-absolute top-0 start-50 translate-middle display-4 text-dark-blue"></i>
                    <p class="fw-bold">1. Название</p>
                    <p class="mb-0">Здесь будет краткое описание данного пункта</p>
                    <div class="triangle"></div>
                </div>
                <div data-bs-target="#data_entry" class="nav-link dr-text  active p-4 stick_for_tabs border-2 position-relative">
                    <i style="color: #203046; background-color: transparent" id="icon"
                       class="fa-solid fa-caret-up position-absolute top-0 start-50 translate-middle display-4 text-dark-blue"></i>
                    <p class="fw-bold">2. Название</p>
                    <p class="mb-0">Добавьте данные о количестве водителей</p>
                </div>
                <div data-bs-target="#data_verification" class="nav-link dr-text  p-4 stick_for_tabs border-2 position-relative">
                    <i style="color: #203046; background-color: transparent" id="icon"
                       class="fa-solid fa-caret-up position-absolute top-0 start-50 translate-middle display-4 text-dark-blue"></i>
                    <p class="fw-bold">3. Название</p>
                    <p class="mb-0">Проверьте все введенные данные</p>
                </div>
                <div data-bs-target="#payment" class="nav-link dr-text  p-4 rounded-end-3 position-relative stick_for_tabs">
                    <i style="color: #203046; background-color: transparent" id="icon"
                       class="fa-solid fa-caret-up position-absolute top-0 start-50 translate-middle display-4 text-dark-blue"></i>
                    <p class="fw-bold">4. Название</p>
                    <p class="mb-0">Оплатите полис удобным для вас способом</p>
                </div>
            </div>
            <div class="space"></div>
            <div class="col-12">
                <div class="mt-4 tab-content align-items-start justify-content-start">
                    <div class="row">
                        <div class="col-lg-9 tab-content mb-lg-3 mb-0">
                            <div id="data_entry">
                                <!--  sug'rtalanuvchini qidirish -->
                                <form class="rounded-10 form row" id="travelForm">
                                    @csrf
                                    <div id="person_search_1" class="rounded-10 p-4 bg-light-grey mb-4">
                                        <h4 class="dr-text  fw-bold">Персональные данные путешественника </h4>
                                        <div class="row align-items-end m-0 mt-4">
                                            <label
                                                class="d-flex flex-column col-12 col-sm-12 col-lg-3 fs-14 p-0 pe-3 mb-3 mb-lg-0 mb-sm-3">
                                                Загранпаспорт (серия)
                                                <input id="passport_seria" value="AC" maxlength="2" minlength="2"
                                                       class="input border-0 p-1 rounded-5-main text-uppercase drop-shadow-2 mt-2 text-center w-100"
                                                       required />
                                            </label>
                                            <label
                                                class="d-flex flex-column col-12 col-sm-12 col-lg-3 fs-14 p-0 pe-3 mb-3 mb-lg-0 mb-sm-3">
                                                Загранпаспорт (номер)
                                                <input id="passport_number" value="2557223" maxlength="7" minlength="7"
                                                       class="input border-0 p-1 rounded-5-main drop-shadow-2 mt-2 text-center w-100"
                                                       required oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                                            </label>
                                            <label          class="d-flex flex-column col-12 col-sm-12 col-lg-3 fs-14 p-0 pe-3 mb-3 mb-lg-0 mb-sm-3"> Tug'ilgan sana
                                                <input type="date"
                                                       name="birthDate"
                                                       value="2004-10-28"
                                                       class="birthDate w-100 text-center border-0 rounded-5-main drop-shadow-2 h-30 px-1 mt-2" />
                                            </label>
                                            <div class="col-lg-3 p-0">
                                                <button type="button" id="search_1"
                                                        class="mt-2 pad-inline-btn px-5 rounded-5-main border-0 h-30 w-100 bg-main-orange text-white">
                                                    поиск
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="person_data">

                                    </div>
                                    <button type="button" id="go"
                                            class="btn border-0 d-flex align-items-center gap-3 w-100 justify-content-end my-4">
                                        <div class="text-start">
                                            <div class="fs-14 fw-bold">Перейти</div>
                                            <div class="fs-14 fw-regular">к следующему разделу</div>
                                        </div>
                                        <img src="/page/assets/images/submit-arrow.svg" alt="" />
                                    </button>
                                </form>

                            </div>
                        </div>
                        {{--                    calc start--}}
                        @include('components.page.insurance.sport.calculator')
                        {{--                    calc end--}}
                    </div>
                </div>
                {{--                Boshqa sug'urtalar start--}}
                @include('components.page.insurance.sport.other-insurance')
                {{--                Boshqa sug'urtalar end--}}

            </div>
        </div>

        <div class="container">
            {{-- Почему именно «Impex Insurance»? --}}
            @include('components.page.corparative.why_impex')

        </div>
        {{-- phone --}}
        @include('components.page.corparative.app')

    </main>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
    <script>
        let maxCount = 1;
        let personCount = 1;

        const wrapper = document.getElementById('person_data');
        const search = document.getElementById('search_1');

        //  --- bazada bor sug'rtalanuvchini ko'rsatish  ----
        let isPhoneInputAdded = false;

        function addNewPersonForm() {
            if (personCount <= maxCount) {
                let newPerson = document.createElement('div');
                newPerson.className = "rounded-10 p-4 bg-light-grey mb-4";
                newPerson.setAttribute('id', `person_information_${personCount}`)
                newPerson.innerHTML = `
                <h4 class="dr-text  fw-bold">Информация о путешественнике ${personCount}</h4>
                <div class="d-flex align-items-end m-0 mt-4">
                    <div class="row m-0 col-12 align-items-end">
                        <label class="d-flex flex-column col-lg-3 fs-14 p-0 pe-3 mb-3 mb-lg-0 mb-sm-3">
                            Фамилия
                            <input disabled class="input border-0 p-1 bg-dark-gray rounded-5-main drop-shadow-2 mt-2 text-center w-100">
                        </label>
                        <label class="d-flex flex-column col-lg-3 fs-14 p-0 pe-3 mb-3 mb-lg-0 mb-sm-3">
                            Имя
                            <input disabled class="input border-0 p-1 bg-dark-gray rounded-5-main drop-shadow-2 mt-2 text-center w-100">
                        </label>
                        <label class="d-flex flex-column col-lg-3 fs-14 p-0 pe-3 mb-3 mb-lg-0 mb-sm-3">
                            Отчество
                            <input disabled class="input border-0 p-1 bg-dark-gray rounded-5-main drop-shadow-2 mt-2 text-center w-100">
                        </label>
                        <button id="close_${personCount}" type="button"
                            class="mt-2 pad-inline-btn px-5 rounded-5-main border-0 h-30 bg-main-orange text-white col-lg-3 ">Очистить</button>
                    </div>
                </div>
                <div class="d-flex align-items-end m-0 mt-lg-4">
                    <div class="row m-0 col-12">
                        <label class="d-flex flex-column col-lg-3 fs-14 p-0 pe-3 mb-3 mb-lg-0 mb-sm-3">
                            Дата рождения
                            <input disabled  class="input border-0 p-1 bg-dark-gray rounded-5-main drop-shadow-2 mt-2 text-center w-100">
                        </label>
                        <label class="d-flex flex-column col-lg-6 fs-14 p-0 pe-3 mb-3 mb-lg-0 mb-sm-3">
                            Адрес проживания
                            <input disabled  class="input border-0 p-1 bg-dark-gray rounded-5-main drop-shadow-2 mt-2 text-center w-100">
                        </label>
                        ${!isPhoneInputAdded ? `
                                    <label class="d-flex flex-column col-lg-3 fs-14 p-0 mb-3 mb-lg-0 mb-sm-3">
                                        Номер телефона
                                        <input class="input border-0 p-1  rounded-5-main drop-shadow-2 mt-2 text-center w-100">
                                    </label>` : ''}
                    </div>
                </div>
                  <!--            hidden inputs start -->
        <input type="hidden" id="hidden_pinfl_${personCount}" placeholder="pinfl">
        <input type="hidden" id="hidden_seria_${personCount}" placeholder="seria">
        <input type="hidden" id="hidden_number_${personCount}" placeholder="number">
        <input type="hidden" id="hidden_issueDate_${personCount}" placeholder="issueDate">
        <input type="hidden" id="hidden_issuedBy_${personCount}" placeholder="issuedBy">
        <input type="hidden" id="hidden_gender_${personCount}" placeholder="gender">

                 <!--       hidden inputs end-->
         `;
                wrapper.insertBefore(newPerson, wrapper.firstChild);

                // PİNFL ni saqlash
                const pinflInput = document.getElementById('pinfl');
                const hiddenPinfl = document.getElementById(`hidden_pinfl_${personCount}`);
                hiddenPinfl.value = pinflInput.value || '';

                if (!isPhoneInputAdded) {
                    isPhoneInputAdded = true;
                }

                const delButton = document.getElementById(`close_${personCount}`);
                delButton.addEventListener('click', () => {
                    document.getElementById('search_1').removeAttribute('disabled');
                    newPerson.remove();
                    isPhoneInputAdded = false;
                    personCount = 1;
                });

                personCount++;
                if (personCount > maxCount) {
                    search.setAttribute('disabled', 'disabled');
                }
            }
        }


        const existingPersons = new Set();
        // ----  sug'rtalanuvchini ma'lumotlari bazadan olib kelish  ----
        search.addEventListener('click', () => {
            const passportSeries = document.getElementById('passport_seria').value;
            const passportNumber = document.getElementById('passport_number').value;
            const birthDate = document.querySelector('.birthDate')?.value?.trim();

            const info = {
                transactionId: Date.now(),
                isConsent: "Y",
                senderPinfl: "50101005690010",
                passport_series: passportSeries.toUpperCase(),
                passport_number: passportNumber,
                birthDate: birthDate,
            };
            const url = "https://impex-insurance.uz/api/fetch-brith-date-v2";
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(info)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.result) {
                        const personInfo = data.result;
                        console.log("Fetched data:", personInfo); // Check the response structure

                        addNewPersonForm();

                        const inputs = document.querySelectorAll(
                            `#person_information_${personCount - 1} input`);
                        inputs[0].value = personInfo.lastNameLatin || '';
                        inputs[1].value = personInfo.firstNameLatin || '';
                        inputs[2].value = personInfo.middleNameLatin || '';
                        inputs[3].value = personInfo.birthDate || '';
                        inputs[4].value = personInfo.address || '';
                        inputs[5].value = personInfo.phoneNumber || '998910739373';
                        // pinfl start
                        const pinflInput = document.getElementById('pinfl');
                        const hiddenPinfl = document.getElementById(`hidden_pinfl_${personCount - 1}`);
                        hiddenPinfl.value = pinflInput.value || '';
                        inputs[6].value = hiddenPinfl.value || '';
                        // pinfl end
                        // seria and number start
                        const documentValue = personInfo.document || '';
                        const seria = documentValue.match(/[A-Za-z]+/g)?.[0] || ''; // Extracts "AC"
                        const number = documentValue.match(/\d+/g)?.[0] || '';
                        // seria and number end
                        inputs[7].value = seria || '';
                        inputs[8].value = number || '';

                        inputs[9].value = personInfo.startDate || '';
                        inputs[10].value = personInfo.issuedBy || '';
                        inputs[11].value = personInfo.gender || '';




                        // Clear form input fields
                        document.getElementById('passport_seria').value = '';
                        document.getElementById('passport_number').value = '';
                        document.getElementById('pinfl').value = '';
                    } else {
                        alert("Ma'lumotlar topilmadi. Iltimos, passport ma'lumotlarini tekshiring.");
                    }
                })

                .catch(error => {
                    console.error("Xato:", error);
                    // alert("Bir xato yuz berdi. Iltimos, qaytadan urinib ko'ring.");
                });
        });
        // ---- ma'lumotlarni saqlab jo'natish  ----
        document.getElementById('go').addEventListener('click', (event) => {
            event.preventDefault();

            const travelersData = [];
            for (let i = 0; i < personCount; i++) {
                const personInfoDiv = document.getElementById(`person_information_${i}`);
                if (personInfoDiv) {
                    const inputs = personInfoDiv.querySelectorAll('input');
                    const travelerInfo = {
                        lastName: inputs[0].value || null,
                        firstName: inputs[1].value || null,
                        middleName: inputs[2].value || null,
                        birthDate: inputs[3].value || null,
                        address: inputs[4].value || null,
                        phoneNumber: inputs[5].value || null,
                        pinfl: inputs[6]?.value || null, // Hidden input for PINFL
                        seria: inputs[7]?.value || null, // Hidden input for passport seria
                        number: inputs[8]?.value || null, // Hidden input for passport number
                        issueDate: inputs[9]?.value || null, // Hidden input for issue date
                        issuedBy: inputs[10]?.value || null, // Hidden input for issued by
                        gender: inputs[11]?.value || null // Hidden input for gender
                    };
                    travelersData.push(travelerInfo);
                }
            }

            if (travelersData.length === 0) {
                alert("Iltimos, kamida bitta sayohatchining ma'lumotlarini qo'shing.");
                return;
            }

            // Hidden inputlar va asosiy ma'lumotlarni saqlash
            localStorage.setItem('formData', JSON.stringify(travelersData));

            // Keyingi sahifaga o'tish
            window.location.href = '/insurance/sport/application-form';
        });
    </script>
@endsection
