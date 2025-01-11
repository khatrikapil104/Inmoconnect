
var selectedId = '';
var selectedName = '';
var selectedImage = '';
var selectedSqft = '';
var openCollaborationBtn = '';
var commission = '';
var customers = '';
var projectId = '';
var commissionData = '';
var eventData = {};
//book appointment
let propertyData = '';
let bookappointment = '';
let agentid = '';
let primaryAgent = '';
let secondaryAgent = '';
let companyDetails = '';
let secondarycompanyDetails = '';
let pdfName = '';

$(document).on('change', 'input[name="is_project_base_event"]', function (e) {
    e.preventDefault();
    var selectedId = $(this).attr("data-id");
    $("#property_collaboration_all").modal("show");
    selectedName = $("#property-checkbox-"+selectedId).attr("data-name");
    selectedImage = $("#property-checkbox-"+selectedId).attr("data-image");
    selectedSqft = $("#property-checkbox-"+selectedId).attr("data-sqft");
    updateModal(selectedId,selectedName,selectedImage,selectedSqft);
    openCollaborationBtn = document.getElementById('open-collaboration-btn');
    var selectBtn = document.getElementById('property-' + selectedId);
    //on modal button click event
    selectBtn.addEventListener('click', () => {
    const checkbox = document.querySelector('#property-'+selectedId);
    if (checkbox.checked) {
            updateButtonState(false);
        }else{
            updateButtonState(true);
        }
    });
    $(document).on('click', '.collaborationNow', function (e) {
        var propertyCollaboration = collaborateUrl;
        let selectedProperties = [];

        selectedProperties.push({ id: selectedId });
        const attributes = {
            hasButton: false,
            handleSuccess: function () {
                show_message(datas['message'], 'success');
            }
        };
        const ajaxOptions = {
            url: propertyCollaboration,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            data: JSON.stringify({ properties: selectedProperties }),
            processData: false,
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
    });
});
const updateModal = (id,name,image,sqft) => {

    var collaborationNow = document.querySelectorAll('.collaborationNow');
    const modalBody = document.querySelector('#property_collaboration_all .modal-body');
    modalBody.innerHTML = '<div class="row">';

    if (id) {
        modalBody.innerHTML += `
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details mb-2 mt-0">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="d-flex gap-12 align-items-center justify-content-around">
                                <input type="checkbox" id="property-${id}" value="property-${id}" data-id="${id}"
                                        name="propertycheckbox" class="propertycheckbox" checked>
                                <img src="${image || 'http://127.0.0.1:8000/img/default-user.jpg'}" width="40"
                                    height="40" alt="image" class="border-r-4">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="modal-details-c">
                                <h6 class="text-14 font-weight-700 color-primary">Property ID</h6>
                                <h6 class="text-14 font-weight-400 color-b-blue pt-1">${id}</h6>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="modal-details-c">
                                <h6 class="text-14 font-weight-700 color-primary">Property Name</h6>
                                <h6 class="text-14 font-weight-400 color-b-blue pt-1">${name || 'N/A'}</h6>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="modal-details-c">
                                <h6 class="text-14 font-weight-700 color-primary">Property SQFT</h6>
                                <h6 class="text-14 font-weight-400 color-b-blue pt-1">${sqft || 'N/A'} Sqft</h6>
                            </div>
                        </div>
                    </div>
                </div>`;
    } else {
        modalBody.innerHTML = '<p>No properties selected.</p>';
    }
    modalBody.innerHTML += `<div
                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                    <div class="form-group position-relative">
                        <button type="button" id="open-collaboration-btn"
                            class="collaborationNow Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Open
                            Collaboration</button>
                    </div>
                </div></div>`;

};
const updateButtonState = (disableNow) => {
    openCollaborationBtn.disabled = disableNow;
    if(disableNow){
        openCollaborationBtn.classList.add('opacity-3');
    }else{
        openCollaborationBtn.classList.remove('opacity-3');
    }
};


function openBooking() {
    /*$('#book_appointment .modal-dialog').wrap(`
        <form id="appointmentForm" method="POST" action="/submit-appointment">
            <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
        </form>
    `);*/
    bookappointment = new bootstrap.Modal(document.getElementById("book_appointment"), {});
    bookappointment.show();


    const agentName = $("#book_an_appointment").data('agentname');
    const agentImage = $("#book_an_appointment").data('agentimage');
    const propertyId = $("#book_an_appointment").data('propertyid');
    const agentEmail = $("#book_an_appointment").data('agentemail');
    const agentPhone = $("#book_an_appointment").data('agentphone');
    const agentCity = $("#book_an_appointment").data('agentcity');
    agentid = $("#book_an_appointment").data('agentid');

    propertyData = $("#book_an_appointment").attr('data-propertydata');

    var propertyDetails = {
        id: propertyData.id,
        name: propertyData.name,
        reference: propertyData.reference,
        price: propertyData.price,
        location: propertyData.address,
        link: propertyData.reference
    };
    propertyDetailsString = JSON.stringify(propertyDetails);

    $('#agentName').text(agentName);
    $('.agentName').text(agentName);
    $('.propertyId').text(propertyId);
    $('#agentEmail').text(agentEmail);
    $('#agentImage').attr('src', agentImage || '/img/default-user.jpg');
    $('#agentPhone').text(agentPhone);
    $('#agentCity').text(agentCity);
    $('#agentid').val(agentid);
    $('#propertyDetails').attr('data-propertyDetails', propertyDetailsString);

    getCustomerData();
    const propertyJson = JSON.parse(propertyData);
    $(".propertyName").text(propertyJson.name);
    $(".propertyImage").attr('src',propertyJson.cover_image);
    $(".viewProperty").attr('data-reference',propertyJson.reference);
    $(".propertyId").text(propertyJson.id);
    $(".propertyListed").text(propertyJson.listed_as);
    $(".propertyprice").text("€"+propertyJson.price);
    $(".propertyType").text(propertyJson.type.name);
    $(".propertySubtype").text(propertyJson.subtype);
    $(".propertySize").text(propertyJson.size);
    $(".propertybedroom").text(propertyJson.bedrooms);
    $(".propertybathroom").text(propertyJson.bathrooms);
    $(".propertyStatus").text(propertyJson.status);
    $(".propertycommission").text(propertyJson.commission);
    commission = propertyJson.commission;
    // $(".propertycommission").text(propertyJson.commission);
    $(".propertylist_agent_per").text(propertyJson.list_agent_per);
    $(".propertylist_agent_com").text(propertyJson.list_agent_com);
    $(".propertysell_agent_per").text(propertyJson.sell_agent_per);
    $(".propertysell_agent_com").text(propertyJson.sell_agent_com);
    $(".propertyaddress").text(propertyJson.address);
    $(".propertydescription").text(propertyJson.description);



}
let percentage;
let selectcommission;
function saveEvent(){
    saveBookingData()
    .then(response => {
        //console.log("Booking Saved:", response);
        if(response.status=="success"){
            bookappointment.hide();
            selectcommission = new bootstrap.Modal(document.getElementById("selectcommission"), {});
            selectcommission.show();
            const propertyJson = JSON.parse(propertyData);
            $(".propertycommissionper").text(propertyJson.percentage);
            $(".propertycommission").text(propertyJson.commission);
            commission = propertyJson.commission;
            $(".propertylistagentper").text(propertyJson.list_agent_per);
            $(".propertysellagentper").text(propertyJson.sell_agent_per);
            $(".propertysellagentcom").text(propertyJson.sell_agent_com);
            // console.log("document");
            $('#secondsection').hide();
            $('#thirdsection').hide();
        }else{

            show_message(response.msg, 'error');
        }
    })
    .catch(error => {
        console.error("Booking Failed:", error.jqXHR.responseJSON.msg);
        show_message(error.jqXHR.responseJSON.msg, 'error');
        //handleErrorFunction(error);  // Handle error
    });
    const propertyJson = JSON.parse(propertyData);
    $(document).on('input', 'input[name="Percentage"]', function (e) {
        percentage = parseFloat($(this).val());
        if (!isNaN(percentage) && percentage >= 0) {
            const calculatedValue = (commission * percentage) / 100;
            $('#Commission').val(calculatedValue.toFixed(2));
        } else {
            $('#Commission').val('');
        }
    });
    $('input[name="checkbox"]').on('change', function() {
        $('#firstsection').hide();
        $('#secondsection').hide();
        $('#thirdsection').hide();

        if ($('#percentage-radio').is(':checked')) {
            $('#firstsection').show();
        } else if ($('#fixed-radio').is(':checked')) {
            $('#secondsection').show();
        } else if ($('#tiered-radio').is(':checked')) {
            $('#thirdsection').show();
        }
    });
    $('#saveCommission').on('click', function () {
        $("#Percentage").val(percentage);
        const commissionType = $('input[name="checkbox"]:checked').val();
        let data = commissionData = {
            commission_type: commissionType,
            agreement_start_date: $('#start_date').val(),
            agreement_end_date: $('#end_date').val(),
            /*agreement_start_date: "12-25-2024",
            agreement_end_date: "12-31-2024",*/
            owner_id: propertyJson.owner_id,
            customer_id: customers,
            // project_id: $('#projectId').val(),
            property_id: propertyJson.id,
            additional_note: $('#additional_notes').val(),
        };
        if (commissionType === 'percentage') {
            data.percentage = parseFloat(percentage) || 0;
            data.commission_amount = $('#Commission').val();
        } else if (commissionType === 'fixed') {
            data.fixed_amount = $('#fixedamount').val();
        } else if (commissionType === 'tiered') {
            data.tiered_commissions = [
                {
                    percentage: 5,
                    commission_amount: $('#uptoone').val(),
                },
                {
                    percentage: 7,
                    commission_to_amount: $('#sevenFrom').val(),
                    commissio_from_amount: $('#sevenTo').val(),
                },
                {
                    percentage: 10,
                    commission_to_amount: $('#tenFrom').val(),
                    commission_from_amount: $('#tenTo').val(),
                },
                {
                    percentage: 15,
                    commission_to_amount: $('#fifteenFrom').val(),
                    commission_from_amount: $('#fifteenTo').val(),
                },
            ];
        }

        // console.log("Collected Commissions:", data);

        // Send data to the server
        const attributes = {
            hasButton: false,
            handleSuccess: function () {
                console.log("success");
            },
            handleError: function () {
                console.log("error");
            }
        };
        const ajaxOptions = {
            url: routeUrlCommission,
            method: "POST",
            headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            data: JSON.stringify( data ),
            success: function(response) {
                selectcommission.hide();
                /*var agreement = new bootstrap.Modal(document.getElementById("agreement"), {});
                agreement.show();*/
                showAgreement();
                attributes.handleSuccess();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                attributes.handleError();
            }
        };
        makeAjaxRequest(ajaxOptions, attributes);
    });
}

/*function saveBookingData(){
    const inputFieldsData = {};
    let responseEvent ='';
    $('#book_appointment input').each(function () {
        const fieldName = $(this).attr('name'); // Get the name attribute
        const fieldValue = $(this).val(); // Get the value of the input
        if (fieldName) {
            inputFieldsData[fieldName] = fieldValue; // Add to the object
        }
    });
    customers  =  $('#customer_id').val();
    // Collect all select fields
    $('#book_appointment select').each(function () {
        const fieldName = $(this).attr('name'); // Get the name attribute
        const fieldValue = $(this).val(); // Get the selected value

        if (fieldName) {
            inputFieldsData[fieldName] = fieldValue; // Add to the object
        }
    });
    inputFieldsData['event_name'] = "Property Booking";
    inputFieldsData['action'] = "meeting";
    // const dueDate = new Date("12-31-2024");
    inputFieldsData['due_date']= $("#due_date").val();
    // inputFieldsData['due_date']= "12-31-2024";
    // Collect all textarea fields
    $('#book_appointment textarea').each(function () {
        const fieldName = $(this).attr('name'); // Get the name attribute
        const fieldValue = $(this).val(); // Get the textarea value
        if (fieldName) {
            inputFieldsData[fieldName] = fieldValue; // Add to the object
        }
    });
    eventData = inputFieldsData;
    const attributes = {
        hasButton: false,
        handleSuccess: function () {
            console.log("success");

        },
        handleError: function () {
            console.log("error");
        }
    };
    const formattedData = { ...inputFieldsData };
    const ajaxOptions = {
        url: routeUrlAddEvent,
        method: "POST",
        headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        data: JSON.stringify(formattedData),
        success: function(response) {
            console.log("from success response");
            console.log(response);
            console.log(response.msg);
            responseEvent = response
            //attributes.handleSuccess();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("jqXHR");
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            attributes.handleError();
        }
    };
    makeAjaxRequest(ajaxOptions, attributes);
    return responseEvent;
}*/
/*function startSpinner(modalId){
    var button = $(modalId).find('.Gradient_button');
    let textbutton = button.text();
    button.prop('disabled', true);
    button.html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
                    $btnName);
}*/
/*function resetButton(modalId,text) {
    var button = $(modalId).find('.Gradient_button');
    button.html(text);
}*/
function saveBookingData() {
    // startSpinner("#book_appointment");
    const inputFieldsData = {};
    let responseEvent ='';
    $('#book_appointment input').each(function () {
        const fieldName = $(this).attr('name'); // Get the name attribute
        const fieldValue = $(this).val(); // Get the value of the input
        if (fieldName) {
            inputFieldsData[fieldName] = fieldValue; // Add to the object
        }
    });
    customers  =  $('#customer_id').val();
    // Collect all select fields
    $('#book_appointment select').each(function () {
        const fieldName = $(this).attr('name'); // Get the name attribute
        const fieldValue = $(this).val(); // Get the selected value

        if (fieldName) {
            inputFieldsData[fieldName] = fieldValue; // Add to the object
        }
    });
    inputFieldsData['event_name'] = "Property Booking";
    inputFieldsData['action'] = "meeting";
    // const dueDate = new Date("12-31-2024");
    inputFieldsData['due_date']= $("#due_date").val();
    // inputFieldsData['due_date']= "12-31-2024";
    // Collect all textarea fields
    $('#book_appointment textarea').each(function () {
        const fieldName = $(this).attr('name'); // Get the name attribute
        const fieldValue = $(this).val(); // Get the textarea value
        if (fieldName) {
            inputFieldsData[fieldName] = fieldValue; // Add to the object
        }
    });
    eventData = inputFieldsData;

    const formattedData = { ...inputFieldsData };
    const attributes = {
        hasButton: false,
        handleSuccess: function () {
            console.log("success");
        },
        handleError: function () {
            console.log("error");
        }
    };

    // Return a Promise
    return new Promise((resolve, reject) => {
        const ajaxOptions = {
            url: routeUrlAddEvent,
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            data: JSON.stringify(formattedData),
            success: function (response) {
                //console.log("from success response:", response);
                resolve(response);  // Return response from Promise
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error Details:", jqXHR, textStatus, errorThrown);
                reject({ jqXHR, textStatus, errorThrown });  // Return error
            }
        };
        makeAjaxRequest(ajaxOptions, attributes);
    });
}

function showAgreement(){
    bookappointment.hide();
    var agreement = new bootstrap.Modal(document.getElementById("agreement"), {});
    agreement.show();

    $('.pdfagentImage').attr('src', primaryAgent.image || '/img/default-user.jpg');
    $('.pdfagentName').text(primaryAgent.name);
    $('.pdfagentEmail').text(primaryAgent.email);
    $('.pdfagentPhone').text(primaryAgent.phone);
    $('.pdfagentDOB').text(primaryAgent.date_of_birth);
    $('.pdfagentGender').text(primaryAgent.gender);
    $('.pdfagentLanguage').text(primaryAgent.languages_spoken);
    $('.pdfagentQualification').text(primaryAgent.qualification_type);
    $('.pdfagentGovernmentCertification').text(primaryAgent.government_certification);
    $('.pdfagentAddress').text(primaryAgent.address);

    //primaryagent company detail
    $('.pdfcompanyImage').attr('src', companyDetails.company_image || '/img/default-user.jpg');
    $('.pdfcompanyEmail').text(companyDetails.company_email);
    $('.pdfcompanyPhone').text(companyDetails.company_mobile);
    $('.pdfcompanyTax').text(companyDetails.company_tax_number);
    $('.pdfcompanyWebsite').text(companyDetails.company_website);
    $('.pdfcompanyservicearea').text(companyDetails.primary_service_area);
    $('.pdfcompanyProfessional').text(companyDetails.professional_title);
    $('.pdfcompanycustomer').text(companyDetails.number_of_current_customers);
    $('.pdfcompanynumagent').text(companyDetails.company_sub_agent);
    $('.pdfcompanypropetytypes').text(companyDetails.property_types_specialized);
    $('.pdfcompanypropertyportfolio').text(companyDetails.total_properties_in_portfolio);
    $('.pdfcompanyyearofexp').text(companyDetails.total_years_experiance);

    $('.pdfsecondayagentName').text(secondaryAgent.name);
    $('.pdfsecondayagentImage').attr('src', secondaryAgent.image || '/img/default-user.jpg');
    $('.pdfsecondayagentEmail').text(secondaryAgent.email);
    if(secondaryAgent.signature){
        $('#mySavedSignature').html('<img src="/storage/signatures/'+secondaryAgent.signature+'" width="200" height="100" />');
        $("#addYourSignature").css("display","none");
    }
    $('.pdfsecondayagentPhone').text(secondaryAgent.phone);
    $('.pdfsecondayagentDOB').text(secondaryAgent.date_of_birth);
    $('.pdfsecondayagentGender').text(secondaryAgent.gender);
    $('.pdfsecondayagentLanguage').text(secondaryAgent.languages_spoken);
    $('.pdfsecondayagentQualification').text(secondaryAgent.qualification_type);
    $('.pdfsecondayagentGovernmentCertification').text(secondaryAgent.government_certification);
    $('.pdfsecondayagentAddress').text(secondaryAgent.address);

    //primaryagent company detail
    $('.pdfsecondarycompanyImage').attr('src', companyDetails.company_image || '/img/default-user.jpg');
    $('.pdfsecondarycompanyEmail').text(secondarycompanyDetails.company_email);
    $('.pdfsecondarycompanyPhone').text(secondarycompanyDetails.company_mobile);
    $('.pdfsecondarycompanyTax').text(secondarycompanyDetails.company_tax_number);
    $('.pdfsecondarycompanyWebsite').text(secondarycompanyDetails.company_website);
    $('.pdfsecondarycompanyservicearea').text(secondarycompanyDetails.primary_service_area);
    $('.pdfsecondarycompanyProfessional').text(secondarycompanyDetails.professional_title);
    $('.pdfsecondarycompanycustomer').text(secondarycompanyDetails.number_of_current_customers);
    $('.pdfsecondarycompanynumagent').text(secondarycompanyDetails.company_sub_agent);
    $('.pdfsecondarycompanypropetytypes').text(secondarycompanyDetails.property_types_specialized);
    $('.pdfsecondarycompanypropertyportfolio').text(secondarycompanyDetails.total_properties_in_portfolio);
    $('.pdfsecondarycompanyyearofexp').text(secondarycompanyDetails.total_years_experiance);

    const propertyJson = JSON.parse(propertyData);
    $(".propertyName").text(propertyJson.name);
    $(".propertyImage").attr('src',propertyJson.cover_image);
    $(".viewProperty").attr('data-reference',propertyJson.reference);
    $(".propertyId").text(propertyJson.id);
    $(".propertyListed").text(propertyJson.listed_as);
    $(".propertyprice").text("€"+propertyJson.price);
    $(".propertyType").text(propertyJson.type.name);
    $(".propertySubtype").text(propertyJson.subtype);
    $(".propertySize").text(propertyJson.size);
    $(".propertybedroom").text(propertyJson.bedrooms);
    $(".propertybathroom").text(propertyJson.bathrooms);
    $(".propertyStatus").text(propertyJson.status);
    $(".propertycommission").text(propertyJson.commission);
    commission = propertyJson.commission;
    // $(".propertycommission").text(propertyJson.commission);
    $(".propertylist_agent_per").text(propertyJson.list_agent_per);
    $(".propertylist_agent_com").text(propertyJson.list_agent_com);
    $(".propertysell_agent_per").text(propertyJson.sell_agent_per);
    $(".propertysell_agent_com").text(propertyJson.sell_agent_com);
    $(".propertyaddress").text(propertyJson.address);
    $(".propertydescription").text(propertyJson.description);


    $(".commisionType").text(commissionData.commission_type);
    $(".commisionPer").text(percentage);
    let commission_amount = '';
    if (commissionData.commission_type === 'percentage') {

            commission_amount = commissionData.commission_amount;
        } else if (commissionData.commission_type === 'fixed') {
            commission_amount = data.fixed_amount;
        } else if (commissionData.commission_type === 'tiered') {
            commission_amount = "tiered";
        }
    $(".commissionTotal").text(commission_amount);
    $(".agreementStartdate").text(commissionData.agreement_start_date);
    $(".agreementEnddate").text(commissionData.agreement_end_date);
    $(".additionalNote").text(commissionData.additional_note);
    $(".secondaryAgentNameSignature").text(secondaryAgent.name+" Signature:");
}
function getCustomerData(){
    const attributes = {
        hasButton: false,
        handleSuccess: function () {
            console.log("success");
        },
        handleError: function () {
            console.log("error");
        }
    };

    const ajaxOptions = {
        url: getCustomerUrl,
        method: "POST",
        headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        data: JSON.stringify({ data: {agentid:agentid,propertyData:propertyData} }),
        success: function(response) {
            updateMultiSelectOptions(response.customers);
            updateStartTimeOptions(response.starttime);
            updateEndTimeOptions(response.starttime);
            primaryAgent = response.primaryAgent;
            secondaryAgent = response.secondaryAgent;
            companyDetails = response.companyDetails;
            secondarycompanyDetails = response.secondarycompanyDetails;

            attributes.handleSuccess();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            attributes.handleError();
        }
    };
    makeAjaxRequest(ajaxOptions, attributes);
}
function updateEndTimeOptions(response) {
    const selectField = $('#end_to');
    selectField.empty();
    Object.entries(response).forEach(([key, value]) => {
        const optionElement = $('<option>', {
            value: key,  // The original time (e.g., '08:00:00')
            text: value, // The formatted time (e.g., '08:00')
        });
        selectField.append(optionElement);
    });
    selectField.trigger('change');
}
function updateStartTimeOptions(response) {
    const selectField = $('#start_from');
    selectField.empty();
    Object.entries(response).forEach(([key, value]) => {
        const optionElement = $('<option>', {
            value: key,  // The original time (e.g., '08:00:00')
            text: value, // The formatted time (e.g., '08:00')
        });
        selectField.append(optionElement);
    });
    selectField.trigger('change');
}
function updateMultiSelectOptions(response) {
    const multiSelect = $('#customer_id'); // Your multi-select dropdown ID

    // Clear existing options
    multiSelect.empty();

    // Loop through the object keys
    Object.entries(response).forEach(([key, option]) => {
        // Add each option dynamically
        const optionElement = $('<option>', {
            value: key,  // Use the key as the value
            text: option.label, // Display the label in the dropdown
            'data-image': option.image // Optional: Attach the image URL as a data attribute
        });

        multiSelect.append(optionElement);
    });

    // Trigger change event to reinitialize the dropdown if necessary
    multiSelect.trigger('change');
}

let canvas = '';
var signature = new bootstrap.Modal(document.getElementById("signature"), {});
var newsignature = new bootstrap.Modal(document.getElementById("newsignature"), {});
function addSelectedSign(){
    var selectedimage = $('#mysign').attr('src');
    console.log(selectedimage);
    $('#mySavedSignature').html('<img src="'+selectedimage+'" width="200" height="100" />');
    $("#addYourSignature").css("display","none");

}
function uploadSignature(imagename=''){
    signature.show();

    if(imagename){
        $('#mysign').attr('src', '/storage/signatures/'+imagename);
    }else{
        $('#mysign').attr('src', '/storage/signatures/'+secondaryAgent.signature);
    }
}
//on modal open
$(document).on('shown.bs.modal', '#newsignature', function () {
    initCanvas();
});
function initCanvas(){
    (() => {
        window.requestAnimFrame = ((callback) => {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimaitonFrame ||
                function(callback) {
                    window.setTimeout(callback, 1000 / 60);
                };
        })();

        let mousePostion = {
            x: 0,
            y: 0
        };
        let draw = false;
        canvas = document.getElementById("efb-canvas");
        const c2d = canvas.getContext("2d");
        c2d.lineWidth = 5;
        c2d.strokeStyle = "#000";

        let lastMousePostion = mousePostion;

        canvas.addEventListener("mousedown", (e) => {
            draw = true;
            lastMousePostion = getmousePostion(canvas, e);
        }, false);

        canvas.addEventListener("mouseup", (e) => {
            draw = false;
        }, false);

        canvas.addEventListener("mousemove", (e) => {
            mousePostion = getmousePostion(canvas, e);
        }, false);

        // touch event support for mobile
        canvas.addEventListener("touchmove", (e) => {
            let touch = e.touches[0];
            let ms = new MouseEvent("mousemove", {
                clientY: touch.clientY,
                clientX: touch.clientX
            });
            canvas.dispatchEvent(ms);
        }, false);

        canvas.addEventListener("touchstart", (e) => {
            mousePostion = getTouchPos(canvas, e);
            let touch = e.touches[0];
            let ms = new MouseEvent("mousedown", {
                clientY: touch.clientY,
                clientX: touch.clientX
            });
            canvas.dispatchEvent(ms);
        }, false);

        canvas.addEventListener("touchend", (e) => {
            let ms = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(ms);
        }, false);

        function getmousePostion(canvasDom, mouseEvent) {
            let rct = canvasDom.getBoundingClientRect();
            return {
                y: mouseEvent.clientY - rct.top,
                x: mouseEvent.clientX - rct.left
            }
        }

        function getTouchPos(canvasDom, touchEvent) {
            let rct = canvasDom.getBoundingClientRect();
            return {
                y: touchEvent.touches[0].clientY - rct.top,
                x: touchEvent.touches[0].clientX - rct.left
            }
        }

        function renderCanvas() {
            if (draw) {
                c2d.moveTo(lastMousePostion.x, lastMousePostion.y);
                c2d.lineTo(mousePostion.x, mousePostion.y);
                c2d.stroke();
                lastMousePostion = mousePostion;

                const data = canvas.toDataURL();
                text.innerHTML = data;
                image.setAttribute("src", data);
            }
        }

        // Prevent scrolling when touching the canvas
        document.body.addEventListener("touchstart", (e) => {
            if (canvas == e.target) e.preventDefault();
        }, false);
        document.body.addEventListener("touchend", (e) => {
            if (canvas == e.target) e.preventDefault();
        }, false);
        document.body.addEventListener("touchmove", (e) => {
            if (canvas == e.target) e.preventDefault();
        }, false);

        (function drawLoop() {
            requestAnimFrame(drawLoop);
            renderCanvas();

        })();

        // Set up the UI
        let text = document.getElementById("efb-sig-data");
        let image = document.getElementById("sig-image");
        let clear = document.getElementById("efb-sig-clr");
        let subBtn = document.getElementById("efb-sig-sub");
        clear.addEventListener("click", (e) => {
            //c2d.setTransform(1, 0, 0, 1, 0, 0);
            //c2d.clearRect(0, 0, canvas.width, canvas.height);
            c2d.clearRect(0, 0, canvas.width, canvas.height);
            var w = canvas.width;
            canvas.width = 1;
            canvas.width = w;
            c2d.lineWidth = 5;
            c2d.strokeStyle = "#000";
            c2d.save();
            text.innerHTML = "Base64 of signature";
            image.setAttribute("src",
                "Data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==");
        }, false);
    })();
}
function generatePdf(){
    const attributes = {
        hasButton: false,
        handleSuccess: function () {
            console.log("success");
        },
        handleError: function () {
            console.log("error");
        }
    };

    const propertyJson = JSON.parse(propertyData);

    const ajaxOptions = {
        url: generatepdfurl,
        method: "POST",
        headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        data: JSON.stringify({ data: {primaryAgent:primaryAgent,secondaryAgent:secondaryAgent,companyDetails:companyDetails,secondarycompanyDetails:secondarycompanyDetails,propertyJson:propertyJson,commissionData:commissionData} }),
        success: function(response) {

            if(response.success){
                // window.open(response.file_path, '_blank');
                createProject()
                .then(response => {
                    console.log("createProject Saved:", response);
                    if(response.status=="success"){
                        console.log("from create project response");
                        console.log(response);
                        const propertyJson = JSON.parse(propertyData);
                        customerString = customers.join(',');
                        let commissionDataString = JSON.stringify(commissionData);

                        console.log(propertyJson);
                        console.log(customers);
                        console.log(customerString);
                        console.log(commissionDataString);
                        sendMessageToPrimaryAgent();
                    }else{

                        show_message(response.msg, 'error');
                    }
                })
                .catch(error => {
                    console.error("Booking Failed:", error.jqXHR.responseJSON.msg);
                    show_message(error.jqXHR.responseJSON.msg, 'error');
                });
                // window.location.href = '/agent/messages';
            }
            attributes.handleSuccess();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            attributes.handleError();
        }
    };
    makeAjaxRequest(ajaxOptions, attributes);
}
function createProject() {
    const propertyJson = JSON.parse(propertyData);
    const attributes = {
        hasButton: true,
        handleSuccess: function() {
            /*localStorage.setItem('flashMessage', datas['msg']);
            window.location.reload();*/
        }
    };
    return new Promise((resolve, reject) => {
        const ajaxOptions = {
            url: routeUrlAddProject,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            data: JSON.stringify({
                    project_name: 'Project for '+propertyJson.name,
                    project_description: propertyJson.description,
                    project_type: 'for_sale',
                    project_budget: propertyJson.price,
                    start_date: commissionData.agreement_start_date,
                    end_date: commissionData.agreement_end_date,
                    project_location: 'Project Location',
                    deleted_at: commissionData.agreement_end_date,
                    property_id: propertyJson.id,
                    customer_id: customers,
                    primaryAgent: propertyJson.owner_id,
                    // is_active: 0,
                    status: 'in_progress'
                }),
            processData: false,
            success: function(response) {
                projectId = response.id;
                resolve(response);  // Return response from Promise
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error Details:", jqXHR, textStatus, errorThrown);
                reject({ jqXHR, textStatus, errorThrown });  // Return error
            }
        };

        makeAjaxRequest(ajaxOptions, attributes);
    });
}
function htmlCollaborateMessage(){
    // var dataString = $('#propertyDetails').attr('data-propertyDetails');
    //var customer = $('#propertyDetails').attr('data-customer');
    customerId = $('#propertyDetails').attr('data-customerId');
    const propertyJson = JSON.parse(propertyData);


    var message =`<div class=" modal_customer-details modal_margin-detail">
                    <div class="cat_box-small-i">
                        <h6 class="text-16 font-weight-700 color-primary text-center">Event Details</h6>
                    </div>
                    <div class="row text-start">
                        <div class="col-lg-4 pt-12">
                            <div class="d-flex flex-column">
                                <p class="text-14 color-primary font-weight-700">Customer Association:</p>
                                <img src="http://127.0.0.1:8000/img/default-user.jpg" width="24"
                                    height="24" alt="image" class="border-r-4">
                            </div>
                        </div>
                        <div class="col-lg-4 pt-12">
                            <div class="d-flex flex-column">
                                <p class="text-14 color-primary font-weight-700">Property Listed As:</p>
                                <p class="text-14 color-b-blue font-weight-400">${propertyJson.listed_as}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-12 text-end">
                            <button type="button" id="eventOpen()"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">View
                                Event</button>
                        </div>
                        <div class="col-lg-4 pt-12">
                            <div class="d-flex flex-column">
                                <p class="text-14 color-primary font-weight-700">Action:</p>
                                <p class="text-14 color-b-blue font-weight-400">${eventData.action}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-12">
                            <div class="d-flex flex-column">
                                <p class="text-14 color-primary font-weight-700">Priority Level:</p>
                                <p class="text-14 color-b-blue font-weight-400">${eventData.priority}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-12">
                            <div class="d-flex flex-column">
                                <p class="text-14 color-primary font-weight-700">Add Reminder:</p>
                                <p class="text-14 color-b-blue font-weight-400">${eventData.reminder}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-12">
                            <div class="d-flex flex-column">
                                <p class="text-14 color-primary font-weight-700">Due Date:</p>
                                <p class="text-14 color-b-blue font-weight-400">${eventData.due_date}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-12">
                            <div class="d-flex flex-column">
                                <p class="text-14 color-primary font-weight-700">Start From:</p>
                                <p class="text-14 color-b-blue font-weight-400">${eventData.start_from}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-12">
                            <div class="d-flex flex-column">
                                <p class="text-14 color-primary font-weight-700">Add Reminder:</p>
                                <p class="text-14 color-b-blue font-weight-400">${eventData.end_to}</p>
                            </div>
                        </div>
                    </div>
                </div>`;
    return message;
}
function eventOpen(){
    window.location.href = 'agent/calender';
}
function sendMessageToPrimaryAgent(){
    let requestData = {
        chatfriend_id: primaryAgent.id,
        userid: secondaryAgent.id,
        profile_image: '',
        attachment: '',
        attachment_url: '',
        msg: encodeURIComponent(htmlCollaborateMessage()),
        is_upload: false,
        message_type: 'custom',
        custom_title: 'Event Initiated'
    };
    $socket.emit('msg', requestData);
      requestData =  {
        chatfriend_id: primaryAgent.id,
        userid: secondaryAgent.id,
        profile_image: '',
        attachment: '',
        attachment_url: '',
        msg: encodeURIComponent(htmlAcceptInvitation()),
        is_upload: false,
        message_type: 'custom',
        custom_title: 'Inquiry For Property'

    }
    $socket.emit('msg', requestData);

}
function htmlAcceptInvitation(){
    const propertyJson = JSON.parse(propertyData);
    customerString = customers.join(',');
    // let commissionDataString = JSON.stringify(commissionData);
    let commissionDataString = JSON.stringify(commissionData).replace(/"/g, '&quot;');

    console.log(customers);
    console.log(customerString);
    let html = `<div class="col-lg-12 pt-30">
                    <div class="chat-event-details-small">
                        <div class="cat_box-small-i">
                            <h6 class="text-16 font-weight-700 color-primary text-center">Event Details</h6>
                        </div>
                        <p class="text-14 color-b-blue font-weight-400 pt-12 text-center">Accept Agreement and Confirm
                            Event <br />${secondaryAgent.name}?</p>
                        <div class="d-flex justify-content-center pt-20 gap-3">
                            <button type="button"
                                class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  small-button gardient-button searchFilterBtn"
                                id="AcceptAgreement" data-customer="${customerString}" data-primaryAgent="${primaryAgent.id}" data-secondaryAgent="${secondaryAgent.id}" data-propertyData="${propertyJson.id}" data-projectId="${projectId}" data-commissiondata="${commissionDataString}">
                                Accept
                            </button>
                            <button type="button" id="rejectAgreement" data-projectId="${projectId}"
                                class="small-button border-r-8 b-color-transparent text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center">
                                Reject</button>
                        </div>
                    </div>
                </div>`;

    return html;

}

function savesignature(){
    const imageData = canvas.toDataURL("image/png");
    const attributes = {
        hasButton: false,
        handleSuccess: function () {
            show_message(datas['message'], 'success');
        }
    };

    const ajaxOptions = {
        url: savesignatureUrl,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        data: JSON.stringify({
                image: imageData,
            }),
        processData: false,
        success: function (data) {

            //show_message(data.msg, 'success');
            pdfName = data.filename;
            newsignature.hide();
            uploadSignature(data.filename);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            attributes.handleError();
        }
    };
    makeAjaxRequest(ajaxOptions, attributes);
}
$(document).ready(function(){
    $(document).on('click', '.eventAttachmentChooseBtn', function(event) {
        event.preventDefault();
        $('#uploadDocumentModal').attr('data-current-action', 'event');
        $(".data_file_id").addClass('d-none');
        $(".eventsfolders").prop('disabled', false);
        $('#uploadDocumentModal').find('.justify-content-end').addClass('justify-content-between');
        $('#uploadDocumentModal').find('.justify-content-end').removeClass('justify-content-end');
        $(".custom_width-modal-folder").addClass("d-none");
        $(".uploadDcoumentsModalSubmitBtn").show();
        $('.form_file').hide();
        $('.create_new_folder_btn').show();
        $('#uploadDocumentModal').modal('show');
    });
    $(document).on('click', '.removeEventAttachmentBtn', function() {
        $(this).parents('.attachmentRow').remove();
    });
});

