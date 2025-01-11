var form = '';
var confirmModal = '';
function openConfirm() {
    form = document.getElementById("initiateCollaborate");
    confirmModal = new bootstrap.Modal(document.getElementById("add_to_do_list"), {});
    if (form.checkValidity()) {
        confirmModal.show();
    } else {
        form.reportValidity();
    }
}
function clickedYes() {
    confirmModal.hide();
    sendCollaborationMessage();
    saveInitiateCollaboration();
    // form.submit();


}
// function saveInitiateCollaboration() {
const saveInitiateCollaboration = () => {
    const attributes = {
        hasButton: false,
        handleSuccess: function () {
            console.log("success");
        },
        handleError: function () {
            console.log("error");
        }
    };
    //const  formdata = initiateCollaborate
    let formData = new FormData();
    formData.append("agent",$("#agentid").val());
    formData.append("fromagent",$("#confirmYesButton").data("currentuser"));
    formData.append("message",$("#message").val());
    formData.append("propertyId",$(".propertyId").text());

    const ajaxOptions = {
        url: makeCollaborateUrl,
        method: "POST",
        data: formData,
        success: function (data) {
            var fullUrl = `/agent/messages`;
            window.open(fullUrl, '_self');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            attributes.handleError();
        }
    };
    makeAjaxRequest(ajaxOptions, attributes);
}
function clickedNo() {
    confirmModal.hide();
}
function htmlCollaborateMessage(){
    var dataString = $('#propertyDetails').attr('data-propertyDetails');
    var customer = $('#propertyDetails').attr('data-customer');

    var data = JSON.parse(dataString);
    const link = `onclick="`+data.link+`"`;

    var message =`<div class="cat_box-small-i chat-box-blue">
                <h6 class="text-16 font-weight-700 color-white text-center">Inquiry Details</h6>
            </div>
            <div class="d-flex gap-1 pt-2">
                <p class="text-14 color-white font-weight-700">Customer Name: </p>
                <p class="color-white font-weight-400 flex-grow-1 flex-shrink-1 text-start "> `+customer+`
                </p>
            </div>
            <div class="d-flex gap-1 pt-2">
                <p class="text-14 color-white font-weight-700">Property Name: <span
                        class="color-white font-weight-400 flex-grow-1 flex-shrink-1 text-start"> `+data.name+`</span></p>
            </div>
            <div class="d-flex gap-1 pt-2">
                <p class="text-14 color-white font-weight-700">Property ID: <span
                        class="color-white font-weight-400 flex-grow-1 flex-shrink-1 text-start">
                        `+data.id+`</span></p>
            </div>
            <div class="d-flex gap-1 pt-2">
                <p class="text-14 color-white font-weight-700">Property Price: <span
                        class="color-white font-weight-400 flex-grow-1 flex-shrink-1 text-start">
                        Є`+data.price+`</span></p>
            </div>
            <div class="d-flex gap-1 pt-2">
                <p class="text-14 color-white font-weight-700">Location:</p><a href=""
                    class="color-white font-weight-400 text-decoration-underline text-start flex-grow-1 flex-shrink-1">
                    `+data.location+`</a>
            </div>
            <div class="d-flex justify-content-center pt-20 gap-3">
                <button type="button" id="viewPropertyRef" data-propertyRef="${data.link}"
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
        custom_title: 'Collaborate Request'
    }
    $socket.emit('msg', requestData)
}
