// Function to preview image
$(document).ready(function () {

    initSelect2();
    const selectedCountry = $('#country').data('country');
  //  const selectedState = $('#state').data('state');
  //  const selectedCity = $('#city').data('city');

    getCountries(selectedCountry);

    $('#country').on('change', function () {
        const selectedCountry = $(this).val();
        clearDropdown($('#state'));
     //   clearDropdown($('#city'));
        if (selectedCountry) {
            getStates(selectedCountry);
        }
    });
});

function getCountries(selectedCountry = null) {
  //  alert("Here");
    $.getJSON('/countries.json', function (data) {
        const countrySelect = $('#country');
       // clearDropdown(countrySelect);

        $.each(data.countries, function (index, country) {
            countrySelect.append($('<option>', {
                value: country.id,
                text: country.name,
                selected: country.id == selectedCountry
            }));
        });

       
    }).fail(function () {
        console.error('Error loading country data');
    });
}


$(document).on('change', '.service_default', function(e) {
    e.preventDefault();

    var currencyId = $(this).attr('data-id');

    var formData = {
        'id': currencyId,
    };

    $.ajax({
        url: '/api/services/set-default',
        type: 'POST',
        data: formData,
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
            'Accept': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.success) {
                toastr.success(response.message);
            } else {
                toastr.error(response.message);
            }
        },
        error: function(xhr) {
            alert('Failed to set default currency. Please try again.');
        }
    });
});
function clearDropdown(dropdown) {
    dropdown.empty().append($('<option>', {
        value: '',
        text: 'Select',
        disabled: true,
        selected: true
    }));
}
function getStates(selectedCountry, selectedState = null, selectedCity = null) {
    $.getJSON('/states.json', function (data) {
        const stateSelect = $('#state');
        clearDropdown(stateSelect);

        const states = data.states.filter(state => state.country_id == selectedCountry);
        if (states.length === 1) {
            stateSelect.append($('<option>', {
                value: states[0].id,
                text: states[0].name,
                selected: true
            }));
            getCities(states[0].id, selectedCity);
        } else {
            $.each(states, function (index, state) {
                stateSelect.append($('<option>', {
                    value: state.id,
                    text: state.name,
                    selected: state.id == selectedState
                }));
            });

            if (selectedState) {
                getCities(selectedState, selectedCity);
            }
        }
    }).fail(function () {
        console.error('Error loading state data');
    });
}

function getCities(selectedState, selectedCity = null) {
    $.getJSON('/cities.json', function (data) {
        const citySelect = $('#city');
        clearDropdown(citySelect);

        const cities = data.cities.filter(city => city.state_id == selectedState);
        if (cities.length === 1) {
            citySelect.append($('<option>', {
                value: cities[0].id,
                text: cities[0].name,
                selected: true
            }));
        } else {
            $.each(cities, function (index, city) {
                citySelect.append($('<option>', {
                    value: city.id,
                    text: city.name,
                    selected: city.id == selectedCity
                }));
            });
        }
    }).fail(function () {
        console.error('Error loading city data');
    });
}

function initSelect2() {
    $('.select2').select2({
    });
}
$(document).on('change', '.service-image-input', function () {
    const fileInput = this;
    const file = fileInput.files[0];
    const preview = $(fileInput).siblings('.mt-2').find('.img-preview');

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.attr('src', e.target.result).show();
        };
        reader.readAsDataURL(file);
    } else {
        preview.hide();
    }
});

if (pageValue === 'admin.addservice') {

    $(document).ready(function () {
        // $("#addservice").trigger('click');
    });

}

// $('#addservice').on('click', function () {
//     $("#append_fields").append(`
//         <div class="appended-fields">
//             <div class="d-block d-xl-flex">
//                 <div class="mb-3 flex-fill me-xl-3 me-0">
//                     <label class="form-label">Image</label>
//                     <input type="file" accept="image/*" name="service_image[]" class="form-control service-image-input">
//                     <div class="mt-2">
//                         <img src="#" alt="Preview" class="img-preview" width="100" style="display: none;">
//                     </div>
//                 </div>
//                 <div class="mb-3 flex-fill me-xl-3 me-0">
//                     <label class="form-label">Name</label>
//                     <input type="text" name="service_name[]" class="form-control" required placeholder="Enter Service Name">
//                 </div>
//                 <div class="mb-3 flex-fill">
//                     <label class="form-label">Price</label>
//                     <input type="text" name="service_price[]" class="form-control" maxlength="8" placeholder="Enter Service Price">
//                 </div>
//             </div>
//             <div class="d-block d-xl-flex">
//                 <div class="mb-3 flex-fill">
//                     <label class="form-label">Description</label>
//                     <textarea class="form-control" name="service_desc[]" placeholder="Enter description"></textarea>
//                 </div>
//             </div>
//             <div class="mb-3">
//                 <button type="button" class="btn btn-danger remove-service">Remove</button>
//             </div>
//         </div>
//     `);
// });

// Remove appended fields
$(document).on('click', '.remove-service', function () {
    $(this).closest('.appended-fields').remove();
});


  
if (pageValue === 'admin.productservices') {

    $('#generalTab a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    async function init() {
        await loadProducts();
    }

    init().catch((error) => {
        console.error('Error during initialization:', error);
    });
    $(document).on('click', '.delete_category_modal', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#delte_ser_id').val(id);
    });
    $(document).on('click', '.category_delete_btn', function (e) {
        e.preventDefault();

        var delete_id = $(this).attr('data-id');
        var formData = {
            'id' : $('#delte_ser_id').val()
        };
        $.ajax({
            url: '/api/services/delete',
            type: 'POST',
            data : formData,
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#delete-modal').modal('hide');
                    loadProducts(); // Refresh the language table
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                toastr.error('An error occurred while trying to delete the language.');
            }
        });
    });
    async function loadProducts() {
        const response = await $.ajax({
            url: '/api/services/list',
            type: 'POST',
            data: {
                'order_by': 'asc',
                'count_per_page' : 10,
                'sort_by' : '',
                'search' : ''
            },
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                'Accept': 'application/json'
            }
        });

        if (response.code == 200) {
            if(Array.isArray(response.data)) {
                var currency_data = response.data;
                var currency_table_body = $('.currency_list');
                var response_data;
                currency_table_body.empty();
                $.each(currency_data, (index,val) => {
                    response_data = `
                                <tr>
                                    <td>${val.source_name}</td>
                                    <td>${val.name}</td>
                                    <td>${val.source_code}</td>
                                    <td>
 <div class="form-check form-switch">
                                            <input class="form-check-input service_default" ${(val.status == 1)? 'checked' : ''} type="checkbox"
                                                role="switch" id="switch-sm" data-id="${val.id}">
                                        </div>
                                    </td>
                                    <td>
                                    <a class="" href="editservice/${val.id}" ><i class="ti ti-edit-circle  me-2"></i></a>

                                    <a href="javascript:void(0);" class="delete_category_modal" data-bs-toggle="modal" data-bs-target="#delete-modal" 
                                    data-id="${val.id}">
                                        <i class="ti ti-trash fs-20 m-3"></i>
                                    </a>

                                    </td>
                                </tr>`;
                    currency_table_body.append(response_data);
                });
                if (!$.fn.dataTable.isDataTable('#currency_table')) {
                    $('#currency_table').DataTable({
                        "ordering": true,
                    });
                }
            }
        } else {
            console.error('Error fetching settings:', response.message);
        }

    }
}