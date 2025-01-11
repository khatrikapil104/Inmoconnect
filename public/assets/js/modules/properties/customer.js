var myModal ='';
var propertyData ='';
var customerId ='';
document.addEventListener('click', function (e) {
    if (e.target && e.target.id === 'contactagent_modal'){
        openModal(e);
    }
});
function openModal(e){
    myModal = new bootstrap.Modal(document.getElementById('contact_agent_from_customer'));
    myModal.show();
    const agentName = $(e.target).data('agentname');
    const messagefrom = $(e.target).data('messagefrom');
    const agentImage = $(e.target).data('agentimage');
    const propertyId = $(e.target).data('propertyid');
    const agentEmail = $(e.target).data('agentemail');
    const agentPhone = $(e.target).data('agentphone');
    const agentCity = $(e.target).data('agentcity');
    const agentid = $(e.target).data('agentid');

    propertyData = $(e.target).data('propertydata');

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
    $('.messagefromtext').text(messagefrom);
    $('.propertyId').text(propertyId);
    $('#agentEmail').text(agentEmail);
    $('#agentImage').attr('src', agentImage || '/img/default-user.jpg');
    $('#agentPhone').text(agentPhone);
    $('#agentCity').text(agentCity);
    $('#agentid').val(agentid);
    $('#propertyDetails').attr('data-propertyDetails', propertyDetailsString);
}
/*document.getElementById('contactagent_modal').addEventListener('click', function () {
    myModal = new bootstrap.Modal(document.getElementById('contact_agent_from_customer'));
    myModal.show();
    const agentName = $(this).data('agentname');
    const agentImage = $(this).data('agentimage');
    const propertyId = $(this).data('propertyid');
    const agentEmail = $(this).data('agentemail');
    const agentPhone = $(this).data('agentphone');
    const agentCity = $(this).data('agentcity');
    const agentid = $(this).data('agentid');

    propertyData = $(this).data('propertydata');

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
});*/

var form = '';
var confirmModal = '';
function openConfirm() {
    form = document.getElementById("customer_contact_agent");
    confirmModal = new bootstrap.Modal(document.getElementById("add_to_do_list"), {});
    if (form.checkValidity()) {
        confirmModal.show();
    } else {
        form.reportValidity();
    }
}
function validateModalFields() {
    const fields = document.querySelectorAll('#checkbox_modal');

    let isValid = true;
    let errorMessage = '';

    fields.forEach(field => {

        if (field.type === 'checkbox') {
            if (!field.checked) { // If checkbox is not checked
                isValid = false;
                showErrorMessage(field, `${field.dataset.label || 'This field'} is required.`);
            } else {
                removeErrorMessage(field);
            }
        } else {
            // Check if text inputs or textareas are empty
            if (field.value.trim() === '') {
                isValid = false;
                showErrorMessage(field, `${field.dataset.label || 'This field'} is required.`);
            } else {
                removeErrorMessage(field);
            }
        }
    });

    if (!isValid) {
        alert(errorMessage);
    }
    return isValid;
}
function showErrorMessage(field, message) {
    const errorMessage = document.createElement('div');
    errorMessage.classList.add('invalid-feedback');
    errorMessage.textContent = message;

    // Insert error message below the field
    if (!field.nextElementSibling || !field.nextElementSibling.classList.contains('invalid-feedback')) {
        field.parentElement.appendChild(errorMessage);
    }

    // Add Bootstrap invalid class
    field.classList.add('is-invalid');
}
function removeErrorMessage(field) {
    // Remove the error message and invalid class if the field is valid
    const errorMessage = field.parentElement.querySelector('.invalid-feedback');
    if (errorMessage) {
        errorMessage.remove();
    }
    field.classList.remove('is-invalid');
}
function clickedYes() {
    sendCollaborationMessage();
    saveInquiryCustomer();
    confirmModal.hide();
    myModal.hide();
    var fullUrl = `/customer/messages`;
    // window.open(fullUrl, '_self');
}
function htmlCollaborateMessage(){
    // var dataString = $('#propertyDetails').attr('data-propertyDetails');
    var customer = $('#propertyDetails').attr('data-customer');
    customerId = $('#propertyDetails').attr('data-customerId');
    var data = propertyData;

    var message =`<div class="cat_box-small-i chat-box-blue">
                <h6 class="text-16 font-weight-700 color-white text-center">Inquiry Details</h6>
            </div>
            <div class="d-flex gap-1 pt-2">
                <div name="role" id="customerrole" value="customer" />
                <p class="text-14 color-white font-weight-700">Customer Name: </p>
                <p class="color-white font-weight-400 flex-grow-1 flex-shrink-1 text-start "> ${customer}
                </p>
            </div>
            <div class="d-flex gap-1 pt-2">
                <p class="text-14 color-white font-weight-700">Property Name: <span
                        class="color-white font-weight-400 flex-grow-1 flex-shrink-1 text-start"> ${data.name}</span></p>
            </div>
            <div class="d-flex gap-1 pt-2">
                <p class="text-14 color-white font-weight-700">Property ID: <span
                        class="color-white font-weight-400 flex-grow-1 flex-shrink-1 text-start">
                        ${data.id}</span></p>
            </div>
            <div class="d-flex gap-1 pt-2">
                <p class="text-14 color-white font-weight-700">Property Price: <span
                        class="color-white font-weight-400 flex-grow-1 flex-shrink-1 text-start">
                        Є${data.price}</span></p>
            </div>
            <div class="d-flex gap-1 pt-2">
                <p class="text-14 color-white font-weight-700">Location:</p><a href=""
                    class="color-white font-weight-400 text-decoration-underline text-start flex-grow-1 flex-shrink-1">
                    ${data.address}</a>
            </div>
            <div class="d-flex justify-content-center pt-20 gap-3">
                <button type="button" id="viewPropertyRef" data-propertyRef="${data.reference}"
                    class="border-r-8 b-color-transparent color-white text-14 font-weight-700 lineheight-18  small-button border-white searchFilterBtn"
                    id="searchFilterBtn">
                    View Property
                </button>
                <button type="button" id="LeadPropertyid" data-id="${data.id}"
                    class="small-button border-white border-r-8 b-color-transparent text-14 font-weight-700 lineheight-18 color-white d-flex align-items-center"
                    data-toggle="modal" data-target="#cancelbutton">
                    View Lead</button>
            </div>
            <div class=" customer_message-icon">
                <i class="icon-agnet-request icon-20 color-white"></i>
            </div>`;
    return message;

}
function saveInquiryCustomer(){
   console.log("propertyData");
   console.log(propertyData);
    const attributes = {
        hasButton: false,
        handleSuccess: function () {
            console.log("success");
        },
        handleError: function () {
            console.log("error");
        }
    };

    // let formData = new FormData(); //use customer_contact_agent
    var formData = new FormData($('#customer_contact_agent')[0]);
    var message = $('#tomessage').val();

    formData.append("owner_id",propertyData.owner_id);
    formData.append("agent_id",propertyData.secondary_agent_id);
    formData.append("property_id",propertyData.id);
    formData.append("message",message);
    formData.append("customer_id",$("#propertyDetails").attr("data-customerId"));

     const ajaxOptions = {
        url: customerInquiry,
        method: "POST",
        data: formData,
        success: function (data) {
            //var fullUrl = `/agent/messages`;
            //window.open(fullUrl, '_self');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            attributes.handleError();
        }
    };
    makeAjaxRequest(ajaxOptions, attributes);
}
function sendCollaborationMessage(){
    requestData = {
        chatfriend_id: $("#agentid").val(),
        userid: $("#confirmYesButton").data("currentuser"),
        profile_image: '',
        attachment: '',
        attachment_url: '',
        msg: encodeURIComponent(htmlCollaborateMessage()),
        is_upload: false,
        message_type: 'custom',
        custom_title: 'Customer Inquiry For Property'
    }
    $socket.emit('msg', requestData)
}