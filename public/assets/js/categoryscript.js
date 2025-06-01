var pageValue = $('body').data('page');

var frontendValue = $('body').data('frontend');

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

function initTooltip() {
    $('[data-tooltip="tooltip"]').tooltip({
        trigger: 'hover',
    });
}

$(document).on('click', '#save_category_modal', function (e) {
    e.preventDefault();

    $('#save_category_id').val('');

    $('.droplang').hide();

    $('#language_dropdown').val('');
});
//categories
if(pageValue == 'admin.servicecategories') {

    $(document).on('change', '.category_order_btn', function () {
        let category_parent_id = $('.category_parent_id').val();
        let order_by_value = $(this).val();
        let search_by = $('.category_search').val();
        let count_per_page = $('.category_sort_btn').val();
        var langCode = $('body').data('lang');
        loadCategories(category_parent_id,count_per_page, order_by_value, search_by, langCode);
    });

    $(document).on('change', '.category_sort_btn', function () {
        let category_parent_id = $('.category_parent_id').val();
        let count_per_page = $(this).val();
        let search_by = $('.category_search').val();
        let order_by_value = $('.category_order_btn').val();
        var langCode = $('body').data('lang');
        loadCategories(category_parent_id, count_per_page, order_by_value, search_by, langCode);
    });

    $(document).on('keyup', '.category_search', function () {
        let category_parent_id = $('.category_parent_id').val();
        let search_by = $(this).val();
        let count_per_page = $('.category_sort_btn').val();
        let order_by_value = $('.category_order_btn').val();
        var langCode = $('body').data('lang');
        loadCategories(category_parent_id, count_per_page, order_by_value, search_by, langCode);
    });

    async function init() {
        let category_parent_id = $('.category_parent_id').val();
        let count_per_page = $('.category_sort_btn').val();
        let order_by_value = $('.category_order_btn').val();
        let search_by = $('.category_search').val();
        var langCode = $('body').data('lang');
        await loadCategories(category_parent_id, count_per_page, order_by_value, search_by, langCode);
    }

    init().catch((error) => {
        toastr.error('Error during initialization:', error);
    });

    async function loadCategories(parent_id, page, order_by_value, search_by, lang_code) {
        const response = await $.ajax({
            url: '/api/categories/list',
            type: 'POST',
            data: {
                'user_id': localStorage.getItem('user_id'),
                'parent_id': parent_id,
                'source_type': 'service',
                'order_by': order_by_value,
                'count_per_page' : page,
                'sort_by' : '',
                'search' : search_by,
                'language_code': lang_code
            },
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (response.code == 200) {
            if(Array.isArray(response.data) && (response.data.length != 0)) {
                let currency_data = response.data;
                let currency_table_body = $('.categories_list');
                let response_data;
                let category_parent_id = $('#category_parent_id');
                currency_table_body.empty();
                $.each(currency_data, (index, val) => {
                    response_data = `
                                <tr>
                                    <td>
                                        <div ${val.parent_id == 0 ? 'class="d-flex align-items-center flex-wrap subcategory_list" data-id="' + val.id + '" style="cursor: pointer !important;"' : ''}>
                                        <div class="d-flex align-items-center flex-wrap">
                                            <img src="/storage/${val.image}" class="category_table_img mx-2 my-2 ms-2" alt="image">
                                            <span class="mx-2 my-2 ms-2" >${val.name}</span>
                                        </div>
                                        </div>
                                    </td>
                                    <td>${val.slug}</td>
                                    <td>
                                        <span
                                            class="badge ${(val.status == 1)? 'badge-soft-success' : 'badge-soft-danger'} d-inline-flex align-items-center"><i
                                                class="ti ti-circle-filled fs-5 me-1"></i>${(val.status == 1)? 'Active' : 'In-active'}</span>
                                    </td>
                                    ${ $('#has_permission').data('edit') == 1 ?
                                    `<td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input category_featured" ${(val.featured == 1)? 'checked' : ''} type="checkbox"
                                                role="switch" id="switch-sm" data-id="${val.id}">
                                        </div>
                                    </td>` : ''
                                    }
                                    ${ $('#has_permission').data('visible') == 1 ?
                                    `<td>
                                        <li style="list-style: none;">
                                            ${ $('#has_permission').data('edit') == 1 ?
                                            `<a href="javascript:void(0);" class="save_category_modal"
                                            data-id="${val.id}" data-parent-id="${val.parent_id}" data-name="${val.name}"
                                            data-description="${val.description}" data-slug="${val.slug}"
                                            data-status="${val.status}" data-language_id="${val.language_id}" data-featured="${val.featured}"
                                            data-image="${val.image}" data-icon="${val.icon}">
                                            <i class="ti ti-pencil fs-20"></i>
                                            </a>` : ''
                                            }
                                            ${val.parent_id === 0 ? `
                                            <a href="javascript:void(0);" class="new_icon_class subcategory_list" data-id="${val.id}">
                                                <i class="ti ti-list fs-20 m-1"></i>
                                            </a>
                                            ` : ''}
                                            ${ $('#has_permission').data('delete') == 1 ?
                                            `<a href="javascript:void(0);" class=" delete_category_modal" data-bs-toggle="modal" data-bs-target="#delete-modal"
                                            data-id="${val.id}">
                                                <i class="ti ti-trash fs-20 m-1"></i>
                                            </a>` : ''
                                            }
                                            ${val.parent_id === 0 && $('#has_permission').data('view') == 1 ? `
                                                <a href="javascript:void(0);" class="manage_forms_input" data-id="${val.id}">
                                                    <i class="ti ti-settings fs-20 m-1"></i>
                                                </a>
                                            ` : ''}
                                        </li>
                                    </td>` : ''
                                    }
                                </tr>`;
                    category_parent_id.val(val.parent_id);
                    if (val.parent_id == 0) {
                        if ($('#save_parent_id option[value="' + val.id + '"]').length === 0) {
                            let parent_category = `
                                <option value="${val.id}">${val.name}</option>
                            `;
                            $('#save_parent_id').append(parent_category);
                        }
                    }
                    currency_table_body.append(response_data);
                });
                setupPagination(response.meta);
            } else {
                let currency_table_body = $('.categories_list');
                currency_table_body.empty();
                let data = `
                            <tr class="text-center">
                                <td colspan="5">No data found</td>
                            </tr>
                                `;
                currency_table_body.append(data);
                $('#pagination').html('');
            }

            $('#loader-table').addClass('d-none');
            $(".label-loader, .input-loader").hide();
            $('#categories_table, .real-label, .real-input').removeClass('d-none');
        } else {
            toastr.error('Error fetching settings:', response.message);
        }
    }

    $(document).on('click', '.manage_forms_input', function () {
        var categoryId = $(this).data('id');

        // Make an AJAX POST request to store the category ID in the session
        $.ajax({
            url: '/admin/set-category-id',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Ensure CSRF token is included
            },
            data: {
                category_id: categoryId
            },
            success: function(response) {
                if (response.success) {
                    // Redirect to the form categories page without the ID in the URL
                    window.location.href = "/admin/form-categories";
                }
            },
            error: function(xhr) {
                toastr.log('Error:', xhr.responseText);
            }
        });
    });


    $(document).on('click', '.subcategory_list', function(e) {
        e.preventDefault();
        let parent_id = $(this).attr('data-id');
        var langCode = $('body').data('lang');
        loadCategories(parent_id, 10, 'asc', '', langCode);
        $('.subcategories_title').text('Subcategories');
        $('.subcategory_title').text('Subcategory');
        $('.parent_id').val(parent_id);
    });

    function setupPagination(meta) {
        let paginationHtml = '';
        for (let i = 1; i <= meta.last_page; i++) {
            paginationHtml += `<li class="page-item ${meta.current_page === i ? 'active' : ''}"><a class="page-link" href="#">${i}</a></li>`;
        }

        $('#pagination').html(paginationHtml);

        // Handle click event for pagination
        $('#pagination').on('click', '.page-link', function (e) {
            e.preventDefault();
            const page = $(this).text();
            let order_by_value = $('.category_order_btn').val();
            let category_parent_id = $('.category_parent_id').val();
            let search_by = $('.category_search').val();
            loadCategories(category_parent_id, page, order_by_value, search_by); // Fetch languages for the selected page
        });
    }

    $('#save_category_image').on('change', function (event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#save_category_image_view').attr('src', e.target.result); // Set the image source
            };

            reader.readAsDataURL(input.files[0]);
        }
    });
    $('#save_category_icon').on('change', function (event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#save_category_icon_view').attr('src', e.target.result); // Set the image source
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

    $('#language_dropdown').on('change', function () {
        var langId = $(this).val();
        languageTranslate(langId);
    });

    function languageTranslate(lang_id) {
        $.ajax({
            url: "/api/translate",
            type: "POST",
            dataType: "json",
            data: {
                language_id: lang_id,
            },
            headers: {
                Authorization: "Bearer " + localStorage.getItem("admin_token"),
                Accept: "application/json",
            },
            success: function (response) {
                const trans = response.translated_values;

                if (response.code === 200 && Object.keys(trans).length > 0) {
                    $('.form-control').removeClass('is-invalid').removeClass('is-valid');
                    $('.invalid-feedback').text('');
                    // toastr.success(response.message);

                    $('select option').each(function () {
                        var translateKey = $(this).data('translate');
                        if (trans.hasOwnProperty(translateKey)) {
                            $(this).text(trans[translateKey]);
                        }
                    });

                    $('.translatable').each(function () {
                        var translateKey = $(this).data('translate');

                        if (trans.hasOwnProperty(translateKey)) {
                            var translatedText = trans[translateKey];

                            if ($(this).is('input, textarea')) {
                                $(this).attr('placeholder', translatedText);

                                if ($(this).data('role') === 'tagsinput') {
                                    $(this).tagsinput('destroy');
                                    $(this).attr('placeholder', translatedText);
                                    $(this).tagsinput();
                                }
                            }
                            else if ($(this).hasClass('invalid-feedback')) {
                                $(this).text('');
                                $(this).text(translatedText);
                            }
                            else {
                                $(this).text(translatedText);
                            }
                        }
                    });

                }
            },
            error: function (error) {
                toastr.error(error.responseJSON.message);
            },
        });
    }

    $(document).on('change', '#language_dropdown', function (e) {
        // Get the selected language ID from the dropdown
        let selected_language_id = $(this).val();

        // Get the data-id from the currently selected category, if any
        let data_id = $('#save_category_id').val();

        // Only trigger API if a category is being edited (i.e., data_id is not empty)
        if (data_id) {
            // Fetch category details with the selected language ID
            $.ajax({
                url: `/api/categories/${data_id}`,
                type: 'GET',
                data: { language_id: selected_language_id }, // Send the selected language id
                success: function (response) {
                    if (response.code === '200') {
                        const category = response.data;

                        // Populate the modal fields with the category data
                        // $('.category_modal_title').text('Edit ' + (category.parent_id == 0 ? 'Category' : 'Subcategory'));
                        $('#save_parent_id').val(category.parent_id || '');
                        $('#save_category_name').val(category.name || '');
                        $('#save_category_slug').val(category.slug || '');
                        $('#save_category_description').val(category.description || '');
                        $('#save_category_status').prop('checked', category.status === 1);
                        $('#save_category_featured').prop('checked', category.featured === 1);
                        $('#save_category_image_view').attr('src', '/storage/' + (category.image || ''));
                        $('#save_category_icon_view').attr('src', '/storage/' + (category.icon || ''));

                        $('#save_category').modal('show');
                    } else {
                        console.error('Failed to fetch category details:', response.message);
                    }
                },
                error: function (xhr) {
                    console.error('An error occurred:', xhr.responseText);
                }
            });
        }
    });

    $(document).on('click', '.save_category_modal', function (e) {
        e.preventDefault();

        let data_id = $(this).attr('data-id');
        let category_parent_id = $('#category_parent_id').val();
        let category_text = (category_parent_id == 0) ? $('.category_modal_title').data('category') : $('.category_modal_title').data('subcategory');

        // Get the language_id from the clicked element
        let default_language_id = $(this).attr('data-language_id');

        // Get the selected language_id from the dropdown
        let selected_language_id = $('#language_dropdown').val();

        // Use selected_language_id if it has a value, otherwise use default_language_id
        let language_id = selected_language_id ? selected_language_id : default_language_id;

        if (!data_id) {
            let lang =  $('#userLangId').val();
            languageTranslate(lang);
            // Clear fields for adding a new category
            $('#save_parent_id').val('');
            $('#save_category_name').val('');
            $('#save_category_slug').val('');
            $('#save_category_description').val('');
            $('#save_category_status').prop('checked', false);
            $('#save_category_featured').prop('checked', false);
            $('#save_category_image_view').attr('src', ''); // Clear image preview
            $('#save_category_icon_view').attr('src', ''); // Clear icon preview
            $('.category_modal_title').text($('.category_modal_title').data('add') + category_text);
            $('#save_category').modal('show');
        } else {
            // Fetch category details via AJAX and pass the selected or default language
            $('.droplang').show();

            let language_id = $(this).attr('data-language_id');
            fetchLanguagesForModal(language_id);
            languageTranslate(language_id);
            $.ajax({
                url: `/api/categories/${data_id}`,
                type: 'GET',
                data: { language_id: language_id }, // Send the selected or default language id
                success: function (response) {
                    if (response.code === '200') {
                        const category = response.data;

                        $('.category_modal_title').text($('.category_modal_title').data('edit') + category_text);
                        $('#save_parent_id').val(category.parent_id || '');
                        $('#save_category_name').val(category.name || '');
                        $('#save_category_id').val(category.id || '');
                        $('#save_category_slug').val(category.slug || '');
                        $('#save_category_description').val(category.description || '');
                        $('#save_category_status').prop('checked', category.status === 1);
                        $('#save_category_featured').prop('checked', category.featured === 1);
                        $('#save_category_image_view').attr('src', '/storage/' + (category.image || ''));
                        $('#save_category_icon_view').attr('src', '/storage/' + (category.icon || ''));

                        $('#save_category').modal('show');
                    } else {
                        console.error('Failed to fetch category details:', response.message);
                    }
                },
                error: function (xhr) {
                    console.error('An error occurred:', xhr.responseText);
                }
            });
        }
    });

    function fetchLanguagesForModal(selectedLanguageId = null) {
        if (selectedLanguageId === null) {
            selectedLanguageId = 1;
        }
        $.ajax({
            url: '/api/languages', // API route to fetch languages
            type: 'GET',
            success: function (response) {
                if (response.success) {
                    let languageDropdown = $('#language_dropdown');
                    languageDropdown.empty(); // Clear existing options

                    if (response.data.length > 0) {
                        languageDropdown.append('<option value="">Select Language</option>'); // Default option
                        $.each(response.data, function (index, language) {
                            languageDropdown.append(
                                `<option value="${language.id}" ${
                                    selectedLanguageId == language.id ? 'selected' : ''
                                }>
                                    ${language.name}
                                </option>`
                            );
                        });
                    } else {
                        languageDropdown.append('<option value="">No Languages Available</option>');
                    }
                }
            },
            error: function (xhr) {
                console.error('Error fetching languages:', xhr.responseText);
            }
        });
    }

    function languageTranslate(lang_id) {
        $.ajax({
            url: "/api/translate",
            type: "POST",
            dataType: "json",
            data: {
                language_id: lang_id,
            },
            headers: {
                Authorization: "Bearer " + localStorage.getItem("admin_token"),
                Accept: "application/json",
            },
            success: function (response) {
                const trans = response.translated_values;

                if (response.code === 200 && Object.keys(trans).length > 0) {

                    $('.translatable').each(function () {
                        var translateKey = $(this).data('translate');

                        if (trans.hasOwnProperty(translateKey)) {
                            var translatedText = trans[translateKey];

                            if ($(this).is('input, textarea')) {
                                $(this).attr('placeholder', translatedText);

                                if ($(this).data('role') === 'tagsinput') {
                                    $(this).tagsinput('destroy');
                                    $(this).attr('placeholder', translatedText);
                                    $(this).tagsinput();
                                }
                            }
                            else if ($(this).hasClass('invalid-feedback')) {
                                $(this).text('');
                                $(this).text(translatedText);
                            }
                            else {
                                $(this).text(translatedText);
                            }
                        }
                    });
                }
            },
            error: function (error) {
                toastr.error(error.responseJSON.message);
            },
        });
    }



    $(document).on('click', '.category_save_btn', function (e) {
        e.preventDefault();
        let category_name = $('#save_category_name').val();

        if (category_name == '') {
            $('#save_category_name').addClass('is-invalid');
            toastr.error('Please enter name');
        } else {
            $('#save_category_name').removeClass('is-invalid');
            let parent_id = $('#parent_id').val();
            let category_id = $('#save_category_id').val();
            let category_imge_check = $('#save_category_image')[0].files[0];
            let category_imge;
            if (category_imge_check) {
                category_imge = category_imge_check;
            } else {
                category_imge = '';
            }
            let category_icon_check = $('#save_category_icon')[0].files[0];
            let category_icon;
            if (category_icon_check) {
                category_icon = category_icon_check;
            } else {
                category_icon = '';
            }
            let category_slug = $('#save_category_slug').val();
            let category_description = $('#save_category_description').val();
            let language_id = $('#language_dropdown').val();
            let userLangId = $('#userLangId').val();
            let category_status = $('#save_category_status').is(':checked')? 1 : 0;
            let category_featured = $('#save_category_featured').is(':checked')? 1 : 0;

            let formData = new FormData();
            formData.append('id', category_id);
            formData.append('source_type', 'service');
            formData.append('parent_id', parent_id);
            formData.append('name', category_name);
            formData.append('image', category_imge);
            formData.append('icon', category_icon);
            formData.append('slug', category_slug);
            formData.append('description', category_description);
            formData.append('status', category_status);
            formData.append('featured', category_featured);
            formData.append('language_id', language_id);
            formData.append('userLangId', userLangId);
            $.ajax({
                url: '/api/categories/save',
                type: 'POST',
                data : formData,
                contentType: false,
                processData: false,
                cache: false,
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.code === 200) {
                        $('#save_category').modal('hide');
                        let count_per_page = $('.category_sort_btn').val();
                        let order_by_value = $('.category_order_btn').val();
                        let search_by = $('.category_search').val();
                        let category_parent_id = $('.category_parent_id').val();
                        loadCategories(category_parent_id, count_per_page, order_by_value, search_by)
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    toastr.error(error.responseJSON.message);
                }
            });
        }
    });
    $(document).on('click', '.delete_category_modal', function(e) {
        e.preventDefault();

        var categoryId = $(this).data('id');
        $('.category_delete_btn').data('id', categoryId);
    });

    $(document).on('click', '.category_delete_btn', function (e) {
        e.preventDefault();
        var categoryId = $(this).data('id');

        var formData = {
            'id' : categoryId
        };

        $.ajax({
            url: '/api/categories/delete',
            type: 'POST',
            data : formData,
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#delete-modal').modal('hide');
                if (response.code === 200) {
                    let count_per_page = $('.category_sort_btn').val();
                    let order_by_value = $('.category_order_btn').val();
                    let search_by = $('.category_search').val();
                    let category_parent_id = $('.category_parent_id').val();
                    loadCategories(category_parent_id, count_per_page, order_by_value, search_by)
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                toastr.error('An error occurred while logging out.');
            }
        });
    });


}

//form-categories
if(pageValue == 'admin.form-categories') {
    $(document).ready(function() {
        $('#addFormInputButton').on('click', function() {
            $('#addFormsInputForm')[0].reset();

            $('#placeholder_select_edit').val('');

            $('#required_status').prop('checked', false);

            $('#placeholder_div, #options-container, #file_size, #other_option').hide();

            $('#placeholder_select_edit_error').text('');
            $(".error-text").text("");
            $(".form-control").removeClass("is-invalid");
        });

        $('#placeholder_select_edit').change(function() {
            const selectedValue = $(this).val();
            const placeholderDiv = $('#placeholder_div');
            const optionsContainer = $('#options-container');
            const fileSize = $('#file_size');
            const otherOption = $('#other_option');

            placeholderDiv.toggle(selectedValue === "text_field" || selectedValue === "number_field" || selectedValue === "textarea" || selectedValue === "timepicker" || selectedValue === "datepicker");
            optionsContainer.toggle(selectedValue === "select" || selectedValue === "checkbox" || selectedValue === "radio");
            fileSize.toggle(selectedValue === "file");
            otherOption.toggle(selectedValue === "select" || selectedValue === "checkbox" || selectedValue === "radio");
        });

        $('#add-option-btn').click(function() {
            // Get the current number of options in the options container
            const optionCount = $('#options-container .option-item').length;

            // Limit the options to 10
            if (optionCount >= 10) {
                toastr.error("You can add a maximum of 10 options.");
                return; // Stop the function if the limit is reached
            }

            const optionDiv = $('<div class="option-item d-flex align-items-center mb-2"></div>');
            const optionName = $('<input type="text" class="form-control me-2 option-name" placeholder="Enter Option">');
            const optionValue = $('<input type="text" class="form-control me-2 option-value" placeholder="Enter Value">');
            const deleteBtn = $('<button type="button" class="btn"><i class="ti ti-trash-x me-2 btn-danger"></i></button>');

            deleteBtn.click(function() {
                optionDiv.remove();
            });

            optionDiv.append(optionName, optionValue, deleteBtn);
            $('#options-container').append(optionDiv);
        });

        $('#addFormsInputForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            formData.set('is_required', $('#required_status').is(':checked') ? 1 : 0);

            const selectedFieldType = $('#placeholder_select_edit').val();
            formData.set('input_type', selectedFieldType);

            if (selectedFieldType === "text_field" || selectedFieldType === "number_field" || selectedFieldType === "textarea" || selectedFieldType === "timepicker" || selectedFieldType === "datepicker") {
                formData.set('form_placeholder', $('#form_placeholder').val());
            }

            if (selectedFieldType === "file") {
                formData.set('file_size', $('#file_size_no').val());
            }

            if (selectedFieldType === "select" || selectedFieldType === "checkbox" || selectedFieldType === "radio") {
                const optionsArray = [];
                $('#options-container .option-item').each(function() {
                    const optionName = $(this).find('.option-name').val();
                    const optionValue = $(this).find('.option-value').val();
                    if (optionName && optionValue) {
                        optionsArray.push({ key: optionName, value: optionValue });
                    }
                });
                if (optionsArray.length > 0) {
                    formData.set('options', JSON.stringify(optionsArray));
                }
                formData.set('has_other_option', $('#status_toggle').is(':checked') ? 1 : 0);
            }

            $.ajax({
                url: '/api/categories/form-inputs',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .done((response) => {
                if (response.code === '200') {
                    toastr.success(response.message);
                    $('#add_language').modal('hide');
                    $('#addFormsInputForm')[0].reset();
                    $('#required_status').prop('checked', false);
                    $('#placeholder_div, #options-container, #file_size, #other_option').hide();
                    loadFormInputList();
                } else {
                    toastr.error(response.message);
                }
            })
            .fail((xhr) => {
                const errorMessage = xhr.responseJSON?.message || 'An error occurred. Please try again.';

                if (xhr.status === 422) {
                    $(".error-text").text("");
                    $(".form-control").removeClass("is-invalid");
                    $.each(xhr.responseJSON.errors, function (key, val) {
                        $("#" + key).addClass("is-invalid");
                        $("#" + key + "_error").text(val[0]);
                    });
                } else {
                    toastr.error(errorMessage, "bg-danger");
                }
            })
        });

        let categoryId = $('#category_id').val();


        function loadFormInputList() {
            $.ajax({
                url: '/api/categories/form-inputs/list',
                type: 'POST',
                data: {
                    category_id: categoryId,
                },
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.code === 200) {
                        $('#draggable-left').empty();

                        response.data.forEach(function(input, index) {
                            var label = $('<label class="form-label col-4"></label>').text(input.label);
                            var inputField = null;

                            switch(input.type) {
                                case 'text_field':
                                    inputField = $('<input>', {
                                        type: 'text',
                                        class: 'form-control',
                                        name: input.name,
                                        placeholder: input.placeholder,
                                        required: input.is_required == 1,
                                        disabled: true
                                    });
                                    break;
                                case 'number_field':
                                    inputField = $('<input>', {
                                        type: 'number',
                                        class: 'form-control',
                                        name: input.name,
                                        placeholder: input.placeholder,
                                        required: input.is_required == 1,
                                        min: input.min_value || '',
                                        max: input.max_value || '',
                                        step: input.step_value || '1',
                                        disabled: true
                                    });
                                    break;
                                case 'textarea':
                                    inputField = $('<textarea>', {
                                        class: 'form-control',
                                        name: input.name,
                                        placeholder: input.placeholder,
                                        required: input.is_required == 1,
                                        disabled: true
                                    });
                                    break;
                                case 'select':
                                    inputField = $('<select>', {
                                        class: 'form-control',
                                        name: input.name,
                                        required: input.is_required == 1,
                                        disabled: true
                                    });
                                    try {
                                        let options = JSON.parse(input.options);
                                        if (typeof options === 'string') {
                                            options = JSON.parse(options);
                                        }
                                        if (Array.isArray(options)) {
                                            options.forEach(function(option) {
                                                var optionElement = $('<option>', {
                                                    value: option.value,
                                                    text: option.key
                                                });
                                                inputField.append(optionElement);
                                            });
                                        }
                                    } catch (e) {
                                        toastr.error('Error parsing options:', e);
                                    }
                                    break;
                                case 'checkbox':
                                    inputField = $('<div class="form-check disabled">');
                                    try {
                                        let options = JSON.parse(input.options);
                                        if (typeof options === 'string') {
                                            options = JSON.parse(options);
                                        }
                                        options.forEach(function(option) {
                                            var checkboxWrapper = $('<div class="form-check">');
                                            var checkbox = $('<input>', {
                                                type: 'checkbox',
                                                class: 'form-check-input',
                                                name: input.name + '[]',
                                                value: option.value
                                            });
                                            var checkboxLabel = $('<label class="form-check-label">').text(option.key);
                                            checkboxWrapper.append(checkbox).append(checkboxLabel);
                                            inputField.append(checkboxWrapper);
                                        });
                                    } catch (e) {
                                        toastr.error('Error parsing options:', e);
                                    }
                                    break;
                                case 'radio':
                                    inputField = $('<div class="form-check disabled">');
                                    try {
                                        let options = JSON.parse(input.options);
                                        if (typeof options === 'string') {
                                            options = JSON.parse(options);
                                        }
                                        options.forEach(function(option) {
                                            var radioWrapper = $('<div class="form-check">');
                                            var radio = $('<input>', {
                                                type: 'radio',
                                                class: 'form-check-input',
                                                name: input.name,
                                                value: option.value
                                            });
                                            var radioLabel = $('<label class="form-check-label">').text(option.key);
                                            radioWrapper.append(radio).append(radioLabel);
                                            inputField.append(radioWrapper);
                                        });
                                    } catch (e) {
                                        toastr.error('Error parsing options:', e);
                                    }
                                    break;
                                case 'datepicker':
                                    inputField = $('<input>', {
                                        type: 'date',
                                        class: 'form-control',
                                        name: input.name,
                                        required: input.is_required == 1,
                                        disabled: true
                                    });
                                    break;
                                case 'timepicker':
                                    inputField = $('<input>', {
                                        type: 'time',
                                        class: 'form-control',
                                        name: input.name,
                                        required: input.is_required == 1,
                                        disabled: true
                                    });
                                    break;
                                case 'file':
                                    inputField = $('<input>', {
                                        type: 'file',
                                        class: 'form-control',
                                        name: input.name,
                                        required: input.is_required == 1,
                                        disabled: true
                                    });
                                    break;
                                case 'location':
                                        var countryDropdown = $('<select>', {
                                            id: 'country',  // Assign an ID to access it in jQuery
                                            class: 'form-control mb-2',
                                            name: input.name + '_country',
                                            required: input.is_required == 1
                                        }).append($('<option>', { value: '', text: 'Select Country' }));

                                        var stateDropdown = $('<select>', {
                                            id: 'state',  // Assign an ID to access it in jQuery
                                            class: 'form-control mb-2',
                                            name: input.name + '_state',
                                            required: input.is_required == 1
                                        }).append($('<option>', { value: '', text: 'Select State', disabled: true, selected: true }));

                                        var cityDropdown = $('<select>', {
                                            id: 'city',  // Assign an ID to access it in jQuery
                                            class: 'form-control',
                                            name: input.name + '_city',
                                            required: input.is_required == 1
                                        }).append($('<option>', { value: '', text: 'Select City', disabled: true, selected: true }));

                                        inputField = $('<div>').append(countryDropdown).append(stateDropdown).append(cityDropdown);

                                        $.getJSON('/countries.json', function(data) {
                                            $.each(data.countries, function(index, country) {
                                                countryDropdown.append($('<option>', { value: country.id, text: country.name }));
                                            });
                                        }).fail(function() {
                                            toastr.error('Error loading country data');
                                        });

                                        countryDropdown.on('change', function() {
                                            const selectedCountry = $(this).val();

                                            $.getJSON('/states.json', function(data) {
                                                stateDropdown.empty();
                                                stateDropdown.append($('<option>', {
                                                    value: '',
                                                    text: 'Select State',
                                                    disabled: true,
                                                    selected: true
                                                }));

                                                $.each(data.states, function(index, state) {
                                                    if (state.country_id === selectedCountry) {
                                                        stateDropdown.append($('<option>', { value: state.id, text: state.name }));
                                                    }
                                                });
                                            }).fail(function() {
                                                toastr.error('Error loading state data');
                                            });
                                        });

                                        stateDropdown.on('change', function() {
                                            const selectedState = $(this).val();

                                            $.getJSON('/cities.json', function(data) {
                                                cityDropdown.empty();
                                                cityDropdown.append($('<option>', {
                                                    value: '',
                                                    text: 'Select City',
                                                    disabled: true,
                                                    selected: true
                                                }));

                                                $.each(data.cities, function(index, city) {
                                                    if (city.state_id === selectedState) {
                                                        cityDropdown.append($('<option>', { value: city.id, text: city.name }));
                                                    }
                                                });
                                            }).fail(function() {
                                                toastr.error('Error loading city data');
                                            });
                                        });

                                    break;

                            }


                            var editIcon = '';
                            var deleteIcon = '';

                            if ($('#has_permission').data('edit')) {
                                editIcon = $('<a>', {
                                    class: ' me-2 edit_data',
                                    href: '#',
                                    'data-bs-toggle': 'modal',
                                    'data-bs-target': '#edit_language',
                                    'data-id': input.id,
                                    'data-label': input.label,
                                    'data-name': input.name,
                                    'data-placeholder': input.placeholder,
                                    'data-required': input.is_required,
                                    'data-type': input.type,
                                    'data-direction': input.direction,
                                    'data-file_size': input.file_size,
                                    'data-options': JSON.stringify(input.options),
                                    'data-other-option': input.other_option
                                }).append($('<i>', { class: 'ti ti-pencil fs-20' }));
                            }

                            if ($('#has_permission').data('delete')) {
                                deleteIcon = $('<a>', {
                                    class: ' delete_data',
                                    href: '#',
                                    'data-bs-toggle': 'modal',
                                    'data-bs-target': '#delete-modal',
                                    'data-id': input.id
                                }).append($('<i>', { class: 'ti ti-trash-x fs-20 me-2' }));
                            }

                            var card = $('<div>', {
                                class: 'card p-3 mb-3 draggable-item',
                                'data-id': input.id,
                                'data-order': index + 1
                            });

                            var cardBody = $('<div>', {
                                class: 'row align-items-center'
                            });

                            cardBody.append($('<div class="col-md-5">').append(label));
                            cardBody.append($('<div class="col-md-5">').append(inputField));
                            cardBody.append($('<div class="col-md-2 text-end">').append(editIcon).append(deleteIcon));

                            card.append(cardBody);
                            $('#draggable-left').append(card);
                        });
                        $('#draggable-left').sortable({
                            placeholder: 'sortable-placeholder',
                            update: function(event, ui) {
                                let orderData = [];
                                $('#draggable-left .draggable-item').each(function(index, element) {
                                    orderData.push({
                                        id: $(element).data('id'),
                                        order: index + 1
                                    });
                                });
                                updateFormOrder(orderData);
                            }
                        }).disableSelection();
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.code === 404) {
                        toastr.error(xhr.responseJSON.message);
                    } else {
                        toastr.error("An unexpected error occurred.");
                    }
                }
            });
        }

        function updateFormOrder(orderData) {
            $.ajax({
                url: '/api/categories/form-inputs/order',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify({ order: orderData }),
                contentType: 'application/json',
                success: function(response) {
                    if (response.code === 200) {
                        toastr.success("Order updated successfully!");
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    toastr.error("Failed to update the order.");
                }
            });
        }


        loadFormInputList();

        //delete
        $(document).on('click', '.delete_data', function(e) {
            e.preventDefault();

            var formInputId = $(this).data('id');
            $('#confirmDelete').data('id', formInputId);
        });


        $(document).on('click', '#confirmDelete', function(e) {
            e.preventDefault();

            var formInputId = $(this).data('id');

            $.ajax({
                url: '/api/categories/form-inputs/delete',
                type: 'POST',
                data: {
                    id: formInputId,
                },
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        $('#delete-modal').modal('hide');
                        loadFormInputList();
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('An error occurred while trying to delete the form input.');
                }
            });
        });


        //edit
        $(document).on('click', '.edit_data', function(e) {
            e.preventDefault();

            var languageId = $(this).data('id');
            var label = $(this).data('label');
            var name = $(this).data('name');
            var placeholder = $(this).data('placeholder');
            var direction = $(this).data('direction');
            var required = $(this).data('required');
            var type = $(this).data('type');
            var options = $(this).data('options');
            var filesize = $(this).data('file_size');
            var otherOption = $(this).data('other-option');

            if (typeof options === 'string') {
                options = JSON.parse(options);
            }

            $('#edit_language').data('id', languageId);
            $('#edit_language').data('type', type);
            $('#edit_form_label').val(label);
            $('#edit_form_description').val(name);
            $('#language_code').val(placeholder);
            $('#rtl_toggle').prop('checked', direction === 'RTL');
            $('#required_status_edit').prop('checked', required == 1);

            $('#edit_placeholder_div').hide();
            $('#edit_options-container').hide();
            $('#edit_other_option').hide();
            $('#edit_file_size').hide();

            if (type === 'text_field' || type === 'number_field' || type === 'textarea' || type === 'datepicker' || type === 'timepicker' ) {
                $('#edit_placeholder_div').show();
                $('#edit_form_placeholder').val(placeholder);
            } else if (type === 'file') {
                $('#edit_file_size').show();
                $('#edit_file_size_no').val(filesize);
            } else if (type === 'select' || type === 'radio' || type === 'checkbox') {
                $('#edit_options-container').show();
                $('#edit_options-container').empty();

                const addOptionBtn = $('<button type="button" id="add-option-btn" class="btn btn-primary mb-3">Add Option</button>');

                $('#edit_options-container').append(addOptionBtn);

                addOptionBtn.click(function() {
                    const optionCount = $('#edit_options-container .edit_option-item').length;

                    // Limit the options to 10
                    if (optionCount >= 10) {
                        toastr.error("You can add a maximum of 10 options.");
                        return; // Stop the function if the limit is reached
                    }
                    const optionDiv = $('<div class="mb-3 edit_option-item d-flex align-items-center"></div>');
                    const optionName = $('<input type="text" class="form-control me-2 edit_option-name" placeholder="Enter Option">');
                    const optionValue = $('<input type="text" class="form-control me-2 edit_option-value" placeholder="Enter Value">');
                    const deleteBtn = $('<button type="button" class="btn "><i class="ti ti-trash-x me-2  btn-danger"></i></button>');

                    deleteBtn.click(function() {
                        optionDiv.remove();
                    });

                    optionDiv.append(optionName, optionValue, deleteBtn);
                    $('#edit_options-container').append(optionDiv);
                });

                if (typeof options === 'string') {
                    options = JSON.parse(options);
                }
                if (typeof options === 'string') {
                    options = JSON.parse(options);
                }

                if (options && Array.isArray(options)) {
                    options.forEach(function(option) {
                        const optionDiv = $('<div id=" edit_option-item" class="mb-3 edit_option-item d-flex align-items-center"></div>');
                        const optionName = $('<input type="text" id="edit_option-name" class="form-control me-2 edit_option-name" value="' + option.value + '" placeholder="Enter Option">');
                        const optionValue = $('<input type="text" id="edit_option-value" class="form-control me-2 edit_option-value" value="' + option.key + '" placeholder="Enter Value">');
                        const deleteBtn = $('<button type="button" class="btn btn-danger">Delete</button>');

                        deleteBtn.click(function() {
                            optionDiv.remove();
                        });

                        optionDiv.append(optionName, optionValue, deleteBtn);
                        $('#edit_options-container').append(optionDiv);
                    });
                }


                if (type === 'radio' || type === 'checkbox' || type === 'select') {
                    $('#edit_other_option').show();
                    $('#rtl_toggle').prop('checked', otherOption === 1);
                }
            }



        });

        $('#editFormsInputForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            var formId = $('#edit_language').data('id');
            var inputType = $('#edit_language').data('type');
            formData.set('id', formId);
            formData.set('form_label', $('#edit_form_label').val());
            formData.set('form_placeholder', $('#edit_form_placeholder').val());

            formData.set('is_required', $('#required_status_edit').is(':checked') ? 1 : 0);

            const selectedFieldType =$('#edit_language').data('type');
            formData.set('input_type', inputType);

            if (selectedFieldType === "text_field" || selectedFieldType === "number_field" || selectedFieldType === "textarea" || selectedFieldType === "timepicker" || selectedFieldType === "datepicker") {
                formData.set('form_placeholder', $('#edit_form_placeholder').val());
            }

            if (selectedFieldType === "file") {
                formData.set('file_size', $('#edit_file_size_no').val());
            }

            if (selectedFieldType === "select" || selectedFieldType === "checkbox" || selectedFieldType === "radio") {
                const optionsArray = [];
                $('#edit_options-container .edit_option-item').each(function() {
                    const optionName = $(this).find('.edit_option-name').val();
                    const optionValue = $(this).find('.edit_option-value').val();
                    if (optionName && optionValue) {
                        optionsArray.push({ key: optionName, value: optionValue });
                    }
                });
                if (optionsArray.length > 0) {
                    formData.set('options', JSON.stringify(optionsArray));
                }
                formData.set('has_other_option', $('#rtl_toggle').is(':checked') ? 1 : 0);
            }

            $.ajax({
                url: '/api/categories/form-inputs',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .done((response) => {
                if (response.code === '200') {
                    toastr.success(response.message);

                    $('#add_language, #edit_language').modal('hide');
                    $('#addFormsInputForm, #editFormsInputForm')[0].reset();
                    $('#required_status, #required_status_edit').prop('checked', false);

                    $('#edit_placeholder_div, #edit_options-container, #edit_file_size, #edit_other_option').hide();
                    $('#placeholder_div, #options-container, #file_size, #other_option').hide();

                    loadFormInputList();
                } else {
                    toastr.error(response.message);
                }
            })
            .fail((xhr) => {
                const errorMessage = xhr.responseJSON?.message || 'An error occurred. Please try again.';

                if (xhr.status === 422) {
                    $(".error-text").text("");
                    $(".form-control").removeClass("is-invalid");

                    $.each(xhr.responseJSON.errors, function (key, val) {
                        $("#" + key).addClass("is-invalid");
                        $("#" + key + "_error").text(val[0]);
                    });
                } else {
                    toastr.error(errorMessage, "bg-danger");
                }
            });

        });

    });

}


if(pageValue == 'admin.categories') {

    $(document).on('change', '.category_order_btn', function () {
        let category_parent_id = $('.category_parent_id').val();
        let order_by_value = $(this).val();
        let search_by = $('.category_search').val();
        let count_per_page = $('.category_sort_btn').val();
        loadCategories(category_parent_id,count_per_page, order_by_value, search_by);
    });

    $(document).on('change', '.category_sort_btn', function () {
        let category_parent_id = $('.category_parent_id').val();
        let count_per_page = $(this).val();
        let search_by = $('.category_search').val();
        let order_by_value = $('.category_order_btn').val();
        loadCategories(category_parent_id, count_per_page, order_by_value, search_by);
    });

    $(document).on('keyup', '.category_search', function () {
        let category_parent_id = $('.category_parent_id').val();
        let search_by = $(this).val();
        let count_per_page = $('.category_sort_btn').val();
        let order_by_value = $('.category_order_btn').val();
        var langCode = $('body').data('lang');
        loadCategories(category_parent_id, count_per_page, order_by_value, search_by, langCode);
    });

    async function init() {
        let category_parent_id = $('.category_parent_id').val();
        let count_per_page = $('.category_sort_btn').val();
        let order_by_value = $('.category_order_btn').val();
        let search_by = $('.category_search').val();
        await loadCategories(category_parent_id, count_per_page, order_by_value, search_by);
    }

    init().catch((error) => {
        toastr.error('Error during initialization:', error);
    });

    async function loadCategories(parent_id, page, order_by_value, search_by) {
        const response = await $.ajax({
            url: '/api/categories/list',
            type: 'POST',
            data: {
                'parent_id': parent_id,
                'order_by': order_by_value,
                'count_per_page' : page,
                'sort_by' : '',
                'search' : search_by,
            },
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (response.code == 200) {
            if(Array.isArray(response.data) && (response.data.length != 0)) {
                let currency_data = response.data;
                let currency_table_body = $('.categories_list');
                let response_data;
                let category_parent_id = $('#category_parent_id');
                currency_table_body.empty();
                $.each(currency_data, (index, val) => {
                    response_data = `
                                <tr>
                                    <td>
                                        <div ${val.parent_id == 0 ? 'class="d-flex align-items-center flex-wrap subcategory_list" data-id="' + val.id + '" style="cursor: pointer !important;"' : ''}>
                                            <img src="/storage/${val.image}" class="category_table_img mx-2 my-2 ms-2" alt="image">
                                            <span class="mx-2 my-2 ms-2" >${val.name}</span>
                                        </div>
                                    </td>
                                    <td>${val.slug}</td>
                                    <td>
                                        <span
                                            class="badge ${(val.status == 1)? 'badge-soft-success' : 'badge-soft-danger'} d-inline-flex align-items-center"><i
                                                class="ti ti-circle-filled fs-5 me-1"></i>${(val.status == 1)? 'Active' : 'In-active'}</span>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input category_featured" ${(val.featured == 1)? 'checked' : ''} type="checkbox"
                                                role="switch" id="switch-sm" data-id="${val.id}">
                                        </div>
                                    </td>
                                    <td>
                                        <li style="list-style: none;">
                                            <a href="javascript:void(0);" class="save_category_modal"
                                            data-id="${val.id}" data-parent-id="${val.parent_id}" data-name="${val.name}"
                                            data-description="${val.description}" data-slug="${val.slug}"
                                            data-status="${val.status}" data-featured="${val.featured}"
                                            data-image="${val.image}" data-icon="${val.icon}">
                                            <i class="ti ti-pencil fs-20"></i>
                                            </a>
                                            <a href="javascript:void(0);" class=" delete_category_modal" data-bs-toggle="modal" data-bs-target="#delete-modal"
                                            data-id="${val.id}">
                                                <i class="ti ti-trash fs-20 m-3"></i>
                                            </a>
                                            ${val.parent_id === 0 ? `
                                                <a href="javascript:void(0);" class="manage_forms_input" data-id="${val.id}">
                                                    <i class="ti ti-settings fs-20 m-1"></i>
                                                </a>
                                            ` : ''}
                                        </li>
                                    </td>
                                </tr>`;
                    category_parent_id.val(val.parent_id);
                    if (val.parent_id == 0) {
                        if ($('#save_parent_id option[value="' + val.id + '"]').length === 0) {
                            let parent_category = `
                                <option value="${val.id}">${val.name}</option>
                            `;
                            $('#save_parent_id').append(parent_category);
                        }
                    }
                    currency_table_body.append(response_data);
                });
                setupPagination(response.meta);
            } else {
                let currency_table_body = $('.categories_list');
                currency_table_body.empty();
                let data = `
                            <tr class="text-center">
                                <td colspan="5">No data found</td>
                            </tr>
                                `;
                currency_table_body.append(data);
                $('#pagination').html('');
            }
        } else {
            toastr.error('Error fetching settings:', response.message);
        }
    }

    $(document).on('click', '.manage_forms_input', function () {
        var categoryId = $(this).data('id');

        // Make an AJAX POST request to store the category ID in the session
        $.ajax({
            url: '/admin/set-category-id',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Ensure CSRF token is included
            },
            data: {
                category_id: categoryId
            },
            success: function(response) {
                if (response.success) {
                    // Redirect to the form categories page without the ID in the URL
                    window.location.href = "/admin/form-categories";
                }
            },
            error: function(xhr) {
                toastr.log('Error:', xhr.responseText);
            }
        });
    });


    $(document).on('click', '.subcategory_list', function(e) {
        e.preventDefault();
        let parent_id = $(this).attr('data-id');
        loadCategories(parent_id, 10, 'asc', '');
        $('.subcategories_title').text('Subcategories');
        $('.subcategory_title').text('Subcategory');
        $('.parent_id').val(parent_id);
    });

    function setupPagination(meta) {
        let paginationHtml = '';
        for (let i = 1; i <= meta.last_page; i++) {
            paginationHtml += `<li class="page-item ${meta.current_page === i ? 'active' : ''}"><a class="page-link" href="#">${i}</a></li>`;
        }

        $('#pagination').html(paginationHtml);

        // Handle click event for pagination
        $('#pagination').on('click', '.page-link', function (e) {
            e.preventDefault();
            const page = $(this).text();
            let order_by_value = $('.category_order_btn').val();
            let category_parent_id = $('.category_parent_id').val();
            let search_by = $('.category_search').val();
            loadCategories(category_parent_id, page, order_by_value, search_by); // Fetch languages for the selected page
        });
    }

    $('#save_category_image').on('change', function (event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#save_category_image_view').attr('src', e.target.result); // Set the image source
            };

            reader.readAsDataURL(input.files[0]);
        }
    });
    $('#save_category_icon').on('change', function (event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#save_category_icon_view').attr('src', e.target.result); // Set the image source
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

    $(document).on('click', '.save_category_modal', function (e) {
        e.preventDefault();
        let data_id = $(this).attr('data-id');
        let category_parent_id = $('#category_parent_id').val();
        let category_text = (category_parent_id == 0) ? 'Category' : 'Subcategory';

        if (data_id == '') {
            // Clear fields for adding a new category
            $('#save_parent_id').val('');
            $('#save_category_name').val('');
            $('#save_category_slug').val('');
            $('#save_category_description').val('');
            $('#save_category_status').prop('checked', false);
            $('#save_category_featured').prop('checked', false);
            $('#save_category_image_view').attr('src', ''); // Clear image preview
            $('#save_category_icon_view').attr('src', ''); // Clear icon preview
            $('.category_modal_title').text('Add ' + category_text);
            $('#save_category').modal('show');
        } else {
            // Set fields for editing an existing category
            let category_name = $(this).attr('data-name');
            let category_id = $(this).attr('data-id');
            let category_slug = $(this).attr('data-slug');
            let category_description = $(this).attr('data-description');
            let category_status = $(this).attr('data-status');
            let category_featured = $(this).attr('data-featured');
            let category_image = $(this).attr('data-image');
            let category_icon = $(this).attr('data-icon');
            let category_parent_id = $(this).attr('data-parent-id');

            category_status = (category_status == 1) ? true : false;
            category_featured = (category_featured == 1) ? true : false;

            $('.category_modal_title').text('Edit ' + category_text);
            $('#save_parent_id').val(category_parent_id);
            $('#save_category_name').val(category_name);
            $('#save_category_id').val(category_id);
            $('#save_category_slug').val(category_slug);
            $('#save_category_description').val(category_description);
            $('#save_category_status').prop('checked', category_status);
            $('#save_category_featured').prop('checked', category_featured);
            $('#save_category_image_view').attr('src', '/storage/' + category_image);
            $('#save_category_icon_view').attr('src', '/storage/' + category_icon);

            $('#save_category').modal('show');
        }
    });

    $(document).on('click', '.category_save_btn', function (e) {
        e.preventDefault();
        let category_name = $('#save_category_name').val();

        if (category_name == '') {
            $('#save_category_name').addClass('is-invalid');
            toastr.error('Please enter name');
        } else {
            $('#save_category_name').removeClass('is-invalid');
            let parent_id = $('#parent_id').val();
            let category_id = $('#save_category_id').val();
            let category_imge_check = $('#save_category_image')[0].files[0];
            let category_imge;
            if (category_imge_check) {
                category_imge = category_imge_check;
            } else {
                category_imge = '';
            }
            let category_icon_check = $('#save_category_icon')[0].files[0];
            let category_icon;
            if (category_icon_check) {
                category_icon = category_icon_check;
            } else {
                category_icon = '';
            }
            let category_slug = $('#save_category_slug').val();
            let category_description = $('#save_category_description').val();
            let category_status = $('#save_category_status').is(':checked')? 1 : 0;
            let category_featured = $('#save_category_featured').is(':checked')? 1 : 0;

            let formData = new FormData();
            formData.append('id', category_id);
            formData.append('parent_id', parent_id);
            formData.append('name', category_name);
            formData.append('image', category_imge);
            formData.append('icon', category_icon);
            formData.append('slug', category_slug);
            formData.append('description', category_description);
            formData.append('status', category_status);
            formData.append('featured', category_featured);
            $.ajax({
                url: '/api/categories/save',
                type: 'POST',
                data : formData,
                contentType: false,
                processData: false,
                cache: false,
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.code === 200) {
                        $('#save_category').modal('hide');
                        let count_per_page = $('.category_sort_btn').val();
                        let order_by_value = $('.category_order_btn').val();
                        let search_by = $('.category_search').val();
                        let category_parent_id = $('.category_parent_id').val();
                        loadCategories(category_parent_id, count_per_page, order_by_value, search_by)
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    toastr.error(error.responseJSON.message);
                }
            });
        }
    });

    $(document).on('click', '.delete_category_modal', function (e) {
        e.preventDefault();
        var delete_id = $(this).attr('data-id');

        var formData = {
            'id' : delete_id
        };

        $.ajax({
            url: '/api/categories/delete',
            type: 'POST',
            data : formData,
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('admin_token'),
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.code === 200) {
                    let count_per_page = $('.category_sort_btn').val();
                    let order_by_value = $('.category_order_btn').val();
                    let search_by = $('.category_search').val();
                    let category_parent_id = $('.category_parent_id').val();
                    loadCategories(category_parent_id, count_per_page, order_by_value, search_by)
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                toastr.error('An error occurred while logging out.');
            }
        });
    });


}


