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

//categories
if(pageValue == 'admin.productcategories') {

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
        loadCategories(category_parent_id, count_per_page, order_by_value, search_by);
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
                'source_type': 'product',
                'order_by': order_by_value,
                'count_per_page' : page,
                'sort_by' : '',
                'search' : search_by
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
            formData.append('source_type', 'product');
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
        loadCategories(category_parent_id, count_per_page, order_by_value, search_by);
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
                'search' : search_by
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
