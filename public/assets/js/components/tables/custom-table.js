var intervalIDs = [];

// Function to clear all intervals
function clearAllIntervals() {
    console.log(intervalIDs)
    intervalIDs.forEach(intervalID => {
        clearInterval(intervalID); // Clear each interval
    });
    intervalIDs = []; // Clear the array
}

$(document).on('click', '.page-link', function(e) {
    e.preventDefault();
    var currentPage = parseInt($(this).attr('data-current-page')) || 0;
    loadData(currentPage, { hasLoader: true });
});
$(document).on('keyup', 'input[name=table_search_input]', function(e) {
    loadData(1, {});
});

$(document).on('change', 'select[name=table_sort_by]', function (e) {
    if($(this).val()){
        loadData(1, {sortBy:$(this).val()});
    }
});


// Ajax Request for loading the data

function loadData(page = 1, filterObj = {}) {
    $('#loader-row').show();
    if (!filterObj.hasOwnProperty('hasLoader')) {

        $('.tableData').addClass('loader');
    }
    if (Object.keys(filterObj).length !== 0) {
        var formData = new FormData($("#filterForm")[0]);
    } else {
        var formData = new FormData();
    }
    formData.append('page', page);
    if ($('input[name=table_search_input]') && $('input[name=table_search_input]').length > 0) {
        formData.append('table_search_input', $('input[name=table_search_input]').val());

    }
    let attributes = {};
    if (Object.keys(filterObj).length !== 0) {

        if (filterObj.hasOwnProperty('sortBy')) {
            formData.append('sortBy', filterObj.sortBy);
        }

        attributes = {
            hasButton: true,
            btnSelector: filterObj.hasOwnProperty('btnSelector') ? filterObj.btnSelector : '',
            btnText: filterObj.hasOwnProperty('btnName') ? filterObj.btnName : '',
            handleSuccess: function() {
                $('.tableData').html(datas['tableData']);
                if (datas['listingType'] && datas['listingType'] == 'property-search') {

                    $('.paginationData').html(datas['paginationData']);
                    $('.paginationText').html(datas['paginationText']);
                } else {
                    $('.paginationData').html(datas['paginationData']);

                }
                if (datas['filtersAppliedData']) {
                    $('.filtersAppliedData').html(datas['filtersAppliedData']);
                    if ($('.saveSearchUnfilled').hasClass('d-none')) {
                        $('.saveSearchUnfilled').removeClass('d-none')
                    }
                    if (!$('.saveSearchFilled').hasClass('d-none')) {
                        $('.saveSearchFilled').addClass('d-none')
                    }

                }
                $('#dataFilterModal').modal('hide');
                $('.tableData').removeClass('loader');
                if (filterObj.hasOwnProperty('isFilesSection')) {
                    let hasAnyInprogressRow = ($('.in_progress_row').length > 0) ? true : false;
                    // console.log(hasAnyInprogressRow)
                    if (hasAnyInprogressRow) {
                        if (intervalIDs.length == 0) {

                            var filesSectionInterval = setInterval(() => {

                                loadData(1, { hasLoader: false, isFilesSection: true });
                            }, 2000);
                            intervalIDs.push(filesSectionInterval);
                        }
                    } else {
                        clearAllIntervals();

                    }
                }
            }
        };
    } else {

        attributes = {
            hasButton: false,
            handleSuccess: function() {
                $('.tableData').html(datas['tableData']);
                if (datas['listingType'] && datas['listingType'] == 'property-search') {

                    $('.paginationData').html(datas['paginationData']);
                    $('.paginationText').html(datas['paginationText']);
                } else {
                    $('.paginationData').html(datas['paginationData']);

                }
                $('.tableData').removeClass('loader');
            }
        };
    }

    const ajaxOptions = {
        url: routeUrl,
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);


};

$(document).on('click', '.resetFilterBtn', function() {
    let filterName = $(this).parents('form').attr('data-filter-name');
    const that = this;
    $(this).parents('.modal-content').addClass('loader');
    var formData = new FormData();
    formData.append('filterName', filterName);
    formData.append('sectionName', sectionName);
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(that).parents('.modal-content').removeClass('loader');
            $(that).parents('form').html(datas['data']);
            loadData(1, {});
        }
    };

    const ajaxOptions = {
        url: resetFormRoute,
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);

});



$(document).on('change', '.sort_by_property_search', function() {
    if ($(this).val()) {
        loadData(1, { sortBy: $(this).val() });
    }
});

$(document).on('click', '.searchFilterBtn', function() {
    $btnName = $(this).text();
    $btnSelector = '.searchFilterBtn';
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);

    loadData(1, { btnName: $btnName, btnSelector: $btnSelector });

});

$(document).on('click', '.addAgentBtn', function(e) {
    e.preventDefault();
    $agentId = $(this).attr('data-id');
    $btnName = $(this).text();
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;
    var formData = new FormData();
    formData.append('agent_id', $agentId);
    const attributes = {
        hasButton: true,
        btnSelector: '.addAgentBtn',
        btnText: $btnName,
        handleSuccess: function() {
            loadData(1, { btnName: 'crmTestBtn', btnSelector: '.crmTestBtn' });
            show_message(datas['msg'], 'success');
        }
    };
    const ajaxOptions = {
        url: addAgentUrl,
        method: 'post',
        data: formData
    };
    makeAjaxRequest(ajaxOptions, attributes);
});

$(document).ready(function() {
    $('.deletePropertyBtn').on('click', function(e) {
        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');

        show_message3(propertyDeleteConfirmText,
            'confirm', {
                confirmMessage: areYouSureTextConfirmPopup,
                confirmBtnText: deleteTextConfirmPopup,
                confirmSecondaryMessage: deleteTextConfirmPopup + ' ' + name,
                callback: function() {
                    window.location.href = propertyDeleteUrl.replace(':id', id);
                }
            });
    });
    $(document).on('click', '.deleteUserBtn', function(e) {
        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');

        show_message3(userDeleteConfirmText,
            'confirm', {
                confirmMessage: areYouSureTextConfirmPopup,
                confirmBtnText: deleteTextConfirmPopup,
                confirmSecondaryMessage: deleteTextConfirmPopup + ' ' + name,
                callback: function() {
                    window.location.href = userDeleteUrl.replace(':id', id);
                }
            });
    });

    $(document).on('click', '.removeCustomerInviteBtn', function(e) {
        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');

        show_message3(customerDeleteConfirmText1 + " " + name + "<br> " + customerDeleteConfirmText2,
            'confirm', {
                confirmMessage: areYouSureTextConfirmPopup,
                confirmBtnText: removeTextConfirmPopup,
                confirmSecondaryMessage: removeTextConfirmPopup + ' ' + name,
                callback: function() {
                    window.location.href = customerDeleteUrl.replace(':id', id);
                }
            });
    });

    $(document).on('click', '.deleteFileBtn', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('name');
        show_message3(fileDeleteConfirmText,
            'confirm', {
                confirmMessage: areYouSureTextConfirmPopup,
                confirmBtnText: deleteTextConfirmPopup,
                confirmSecondaryMessage: deleteTextConfirmPopup + ' ' + name,
                callback: function() {
                    $.ajax({
                        url: fileDeleteUrl.replace(':id', id),
                        type: 'get',
                        success: function(response) {
                            toastr.success(response.msg)
                            loadData(1, { hasLoader: false, isFilesSection: true });
                        },
                        error: function(xhr, status, error) {
                            alert('Error deleting file: ' + error);
                        }
                    });
                }
            });
    });


    $(document).on('click', '.deleteFilesBtn', function(e) {
        e.preventDefault();
        var $row = $('.table_dashboard tbody');
        console.log($row);

        let selectedCheckboxesArr = [];
        $('.fileCheckbox').each(function(index, element) {
            if ($(element).prop('checked')) {
                selectedCheckboxesArr.push($(element).data('id'));
            }
        });
        if (selectedCheckboxesArr.length > 0) {
            var id = selectedCheckboxesArr.join(',');
            show_message3(filesDeleteConfirmText,
                'confirm', {
                    confirmMessage: areYouSureTextConfirmPopup,
                    confirmBtnText: deleteTextConfirmPopup,
                    confirmSecondaryMessage: '',
                    callback: function() {
                        $.ajax({
                            url: fileDeleteUrl.replace(':id', id),
                            type: 'get',
                            success: function(response) {
                                toastr.success(response.msg)
                                loadData(1, { hasLoader: false, isFilesSection: true });
                                $(".deleteFilesBtn").removeClass("gradiant-button");

                            },
                            error: function(xhr, status, error) {
                                alert('Error deleting file: ' + error);
                            }
                        });
                    }
                });
        }


    });


    $(document).on("click", ".add_property", function(e) {
        e.preventDefault();
        var propertyId = $(this).data('id');
        var $btn = $(this);
        var btnName = $btn.html();

        $btn.prop("disabled", true);
        $btn.html(
            '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
            btnName
        );

        if ($btn.hasClass('fa-solid')) {

            $btn.removeClass('fa-solid').addClass('fa-regular');
        } else {
            $btn.removeClass('fa-regular').addClass('fa-solid');
        }

        const attributes = {
            hasButton: false,
            handleSuccess: function() {
                $btn.prop("disabled", false);
                $btn.html(btnName);
            },
            handleError: function() {
                $btn.prop("disabled", false);
                $btn.html(btnName);
            }
        };

        var propertyAddProperty = propertyAddPropertyUrl.replace(':id', propertyId);
        const ajaxOptions = {
            url: propertyAddProperty,
            method: "GET",
            data: {},
            success: function(response) {
                attributes.handleSuccess();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                attributes.handleError();
            }
        };
        makeAjaxRequest(ajaxOptions, attributes);
    });


    $(document).on('click', '.removeTeamMemberBtn', function (e) {
        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');

        show_message3(teamMemberDeleteConfirmText1 + ' "' + name + '" ' + teamMemberDeleteConfirmText2,
            'confirm', {
            confirmMessage: areYouSureTextConfirmPopup,
            confirmBtnText: removeTextConfirmPopup,
            confirmSecondaryMessage: removeTextConfirmPopup + ' ' + name,
            callback: function () {
                window.location.href = teamMemberDeleteUrl.replace(':id', id);
            }
        });
    });
    $(document).on('click', '.removeDevelopmentBtn', function (e) {
        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');

        show_message3(developmentDeleteConfirmText,
            'confirm', {
            confirmMessage: areYouSureTextConfirmPopup,
            confirmBtnText: deleteTextConfirmPopup,
            confirmSecondaryMessage: deleteTextConfirmPopup + ' ' + name,
            callback: function () {
                window.location.href = developmentDeleteUrl.replace(':id', id);
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function () {
    var openCollaborationBtn = document.getElementById('open-collaboration-btn');
    const selectAllBtn = document.getElementById('select-all-btn');
    let selectedProperties = [];
    if(openCollaborationBtn){
        const updateButtonState = () => {
            const anyChecked = Array.from(document.querySelectorAll('.property-checkbox')).some((checkbox) => checkbox.checked);
            // openCollaborationBtn = document.getElementById('open-collaboration-btn');
            openCollaborationBtn.disabled = !anyChecked;
            if(anyChecked){
                openCollaborationBtn.classList.remove('opacity-3');
            }else{
                openCollaborationBtn.classList.add('opacity-3');
            }
        };
        const updateModal = () => {
            selectedProperties = Array.from(document.querySelectorAll('.property-checkbox:checked')).map((checkbox) => ({
                id: checkbox.dataset.id,
                name: checkbox.dataset.name,
                image: checkbox.dataset.image,
                sqft: checkbox.dataset.sqft,
            }));

            const modalBody = document.querySelector('#property_collaboration_all .modal-body');
            modalBody.innerHTML = '<div class="row">';

            if (selectedProperties.length > 0) {
                selectedProperties.forEach((property) => {
                    modalBody.innerHTML += `
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details mb-2 mt-0">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="d-flex gap-12 align-items-center justify-content-around">
                                        <input type="checkbox" id="property-${property.id}" value="property-${property.id}" data-id="${property.id}"
                                            name="propertycheckbox" class="propertycheckbox" checked>
                                        <img src="${property.image || 'http://127.0.0.1:8000/img/default-user.jpg'}" width="40"
                                            height="40" alt="image" class="border-r-4">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="modal-details-c">
                                        <h6 class="text-14 font-weight-700 color-primary">Property ID</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">${property.id}</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="modal-details-c">
                                        <h6 class="text-14 font-weight-700 color-primary">Property Name</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">${property.name || 'N/A'}</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="modal-details-c">
                                        <h6 class="text-14 font-weight-700 color-primary">Property SQFT</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">${property.sqft || 'N/A'} Sqft</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
            } else {
                modalBody.innerHTML += '<p>No properties selected.</p>';
            }

            modalBody.innerHTML += `
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                    <div class="form-group position-relative">
                        <button type="button" id="collaborationNow"
                            class="collaborationNow Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white">
                            Open Collaboration
                        </button>
                    </div>
                </div>
            </div>`;
        };

        document.addEventListener('change', (e) => {
            if (e.target.classList.contains('property-checkbox')) {
                updateButtonState();
                updateModal();
            }
        });
        $(document).on('click', '#select-all-btn', function (e) {
            const isChecked = e.target.checked;
            document.querySelectorAll('.property-checkbox').forEach((checkbox) => {
                checkbox.checked = isChecked;
            });
            updateButtonState();
            updateModal();
        });
        $(document).on('click', '#collaborationNow', function (e) {
            handleCollaboration();
        });
        $(document).on('click', '[name="propertycheckbox"]', function (e) {
            selectedProperties = Array.from(document.querySelectorAll('.propertycheckbox:checked')).map((checkbox) => ({
                    id: checkbox.dataset.id,
                    name: checkbox.dataset.name,
                    image: checkbox.dataset.image,
                    sqft: checkbox.dataset.sqft,
                }));
        });

        const handleCollaboration = () => {
            if (selectedProperties.length > 0) {
                const attributes = {
                    hasButton: false,
                    handleSuccess: function () {
                        /*$btn.prop("disabled", false);
                        $btn.html(btnName);*/
                        window.location.reload();
                    },
                    handleError: function () {
                        /*$btn.prop("disabled", false);
                        $btn.html(btnName);*/
                    }
                };
                const ajaxOptions = {
                    url: collaborateUrl,
                    method: "POST",
                    headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json',
                        },
                    data: JSON.stringify({ properties: selectedProperties }),
                    success: function (data) {
                        show_message(data.msg, 'success');
                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        attributes.handleError();
                    }
                };
                makeAjaxRequest(ajaxOptions, attributes);
            } else {
                console.warn('No properties selected.');
            }
        };
        updateButtonState();
    }
});

$(document).ready(function () {
    var agentName = '';
    $(document).on('click', 'button[data-target="#initiate_collaboration"]', function (e) {
        agentName = $(this).data('agentname');
        const agentImage = $(this).data('agentimage');
        const messagefrom = $(this).data('messagefrom');
        const propertyId = $(this).data('propertyid');
        const agentEmail = $(this).data('agentemail');
        const agentPhone = $(this).data('agentphone');
        const agentCity = $(this).data('agentcity');
        const agentid = $(this).data('agentid');

        var propertyData = $(this).data('propertydata');

        var propertyDetails = {
            id: propertyData.id,
            name: propertyData.name,
            reference: propertyData.reference,
            price: propertyData.price,
            location: propertyData.address,
            link: propertyData.reference
        };
        var propertyDetailsString = JSON.stringify(propertyDetails);

        $('#initiate_collaboration').on('shown.bs.modal', function () {
            $('#agentName').text(agentName);
            $('.agentName').text(agentName);
            $('.message_from').text(messagefrom);
            $('.propertyId').text(propertyId);
            $('#agentEmail').text(agentEmail);
            $('#agentImage').attr('src', agentImage || '/img/default-user.jpg');
            $('#agentPhone').text(agentPhone);
            $('#agentCity').text(agentCity);
            $('#agentid').val(agentid);
            $('#propertyDetails').attr('data-propertyDetails', propertyDetailsString);
        });
    });
});

$(document).on("click", "#checkbox_modal", function (e) {
    if ($(this).is(':checked')) {
        $('#send_or_initiate_btn').addClass('Gradient_button');
        $('#send_or_initiate_btn').addClass('b-color-Gradient');
        $('#send_or_initiate_btn').addClass('color-white-grey');

        $('#send_or_initiate_btn').removeClass('color-primary');
        $('#send_or_initiate_btn').removeClass('border-primary');
    }else{
        $('#send_or_initiate_btn').removeClass('Gradient_button');
        $('#send_or_initiate_btn').removeClass('b-color-Gradient');
        $('#send_or_initiate_btn').removeClass('color-white-grey');

        $('#send_or_initiate_btn').addClass('color-primary');
        $('#send_or_initiate_btn').addClass('border-primary');

    }
});

