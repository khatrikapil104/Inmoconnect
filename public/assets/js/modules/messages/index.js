$(document).on('click', '#viewPropertyRef', function (e) {
    // var role = $("#customerrole").attr("value");
    var role = $(".header").data("loggedinrole");
    var refproperty = $(this).attr("data-propertyRef");
    if(role == "agent"){
        var fullUrl = `/${role}/messages/view/${refproperty}`;
    }else{
        var fullUrl = `/${role}/properties/view/${refproperty}`;
    }
    window.open(fullUrl, '_self');
});
let rejectModalpopup ='';
let projectId ='';
let commissionData ='';
let propertyData ='';
let primaryAgent = '';
let secondaryAgent = '';
let companyDetails = '';
let secondarycompanyDetails = '';
let pdfName = '';
let project_id = '';

$(document).on('click', '#rejectAgreement', function (e) {
    projectId = $(this).data('projectid');
    console.log("Project ID:", projectId);
    $('#rejectaction').data('projectid', projectId);
    rejectModalpopup = new bootstrap.Modal(document.getElementById("rejectaction"), {});
    rejectModalpopup.show();
});
$(document).on('click', '#AcceptAgreement', function (e) {
    const data = $(this).data();
    project_id = $(this).data("project_id");
    let commission = $(this).data("commissiondata");
    commissionData = commission;
    console.log(commissionData);
    getPdfWithsign(data);
});
function getPdfWithsign(data){
    const attributes = {
        hasButton: false,
        handleSuccess: function () {
            show_message(datas['message'], 'success');
        }
    };
    const ajaxOptions = {
        url: getProjectData,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        data: JSON.stringify({ data }),
        processData: false,
        success: function (data) {
            console.log(data);
            showAgreement(data);
            //show_message(data.msg, 'success');
            //pdfName = data.filename;
            //newsignature.hide();
            //uploadSignature(data.filename);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            attributes.handleError();
        }
    };
    makeAjaxRequest(ajaxOptions, attributes);
}
function showAgreement(data){
    console.log("data");
    console.log(commissionData);
     propertyData = data.propertydata;
     // commissionDatas = JSON.parse(commissionData);
     primaryAgent = data.primaryAgent;
     secondaryAgent = data.secondaryAgent;
     companyDetails = data.companyDetails;
     secondarycompanyDetails = data.secondarycompanyDetails;

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
        $('#dataFilterModalLabel').text(secondaryAgent.name);
    }
    $(".primarySection").css("display","block");
    $(".secondarySection").css("display","none");

    if(primaryAgent.signature){
        $("#onlyForPrimaryAgent").css("display","block");
        //$('#mySavedSignature').html('<img src="/storage/signatures/'+primaryAgent.signature+'" width="200" height="100" />');
        $('#dataFilterModalLabelPrimary').text(primaryAgent.name);
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

    // const propertyJson = JSON.parse(propertyData);
    const propertyJson = propertyData;
    $(".propertyName").text(propertyJson.name);
    $(".propertyImage").attr('src',propertyJson.cover_image);
    $(".viewProperty").attr('data-reference',propertyJson.reference);
    $(".propertyId").text(propertyJson.id);
    $(".propertyListed").text(propertyJson.listed_as);
    $(".propertyprice").text("€"+propertyJson.price);
    $(".propertyType").text(propertyJson.property_type);
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
    $(".commisionPer").text(commissionData.percentage);
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
function rejectModal(form) {
    event.preventDefault();

    const reason = $("#rejectaction input[name='checkbox']:checked").val();
    const otherReason = $("#rejectaction textarea[name='other_reason']").val();


    if (!reason) {
        alert("Please select a reason.");
        return false;
    }


    const attributes = {
        hasButton: false,
        handleSuccess: function () {
            show_message(datas['message'], 'success');
        }
    };
    const ajaxOptions = {
        url: cancleAgreement,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        data: JSON.stringify({
        reason: reason === "other" ? otherReason : reason,
        project_id: projectId
     }),
        processData: false,
        success: function (data) {
            rejectModalpopup.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            attributes.handleError();
        }
    };
    makeAjaxRequest(ajaxOptions, attributes);
}

function openSidebar() {
    document.getElementById("mySidebar_one").style.width = "755px";
    document.getElementById("main").style.marginLeft = "0px";
}

function closeSidebar() {
    document.getElementById("mySidebar_one").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}
$(document).on('click', '.closeSidebar', function (e) {
    closeSidebar();
});
$(document).on('click', '#LeadPropertyid', function (e) {
    let propertyId = $(this).attr("data-id");
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
        url: routeToGetPpproperty.replace(':id', propertyId),
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },

        success: function (data) {
            openLeadView(data);
            /*let myModal = new bootstrap.Modal(document.getElementById('property_lead'), {});
            myModal.show();*/
            openSidebar();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            attributes.handleError();
        }
    };
    makeAjaxRequest(ajaxOptions, attributes);

    const openLeadView = (response) => {
        console.log("openLeadView");
        console.log(response);
        secondaryAgentDetail = response.secondaryAgentDetail;
        primaryAgentDetail = response.primaryAgentDetail;
        data = response.property;

        if(secondaryAgentDetail && secondaryAgentDetail[0]){
            secondaryAgentDetail = secondaryAgentDetail[0];
            primaryAgentDetail = primaryAgentDetail[0];
        }

        // let myModal = new bootstrap.Modal(document.getElementById('property_lead'), {});
        const modalBody = document.querySelector('#leadBody');
        modalBody.innerHTML = '';
        modalBody.innerHTML +=`
                <div class="fixed_sidebar">
                    <div class="sidebar_one-content">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="text-18 font-weight-700 lineheight-22 color-b-blue" id="propertyName">${primaryAgentDetail.name}</div>
                            <div class="text-18 font-weight-700 lineheight-22 color-b-blue" id="ownerName">${primaryAgentDetail.email}</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Type:<span
                                    class="font-weight-400" id="typeofproperty">${data.property_type}</span>
                            </div>
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue" >Agent</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue"><i
                                    class="icon-property_id text-14"></i> <span id="propertyRef"> ${data.reference}</span>
                            </div>
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue" id="CollaborateTime"></div>
                        </div>
                    </div>
                    <div class="sidebar_one-content-card-four p-30 pb-0">
                        <div class="modal_customer-details mt-0">
                            <div class="  modal_margin-detail">
                                <div class="cat_box-small-i">
                                    <h6 class="text-16 font-weight-700 color-primary text-center">Lead Details</h6>
                                </div>
                                <div class="d-flex align-items-start justify-content-between pt-20">
                                    <img src="${secondaryAgentDetail.image || 'http://127.0.0.1:8000/img/default-user.jpg'} width="60" height="60"
                                        alt="image" class="border-r-8">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">View
                                        Profile</button>
                                </div>
                                <div class="row text-start">
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Lead Name:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${secondaryAgentDetail.name}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Account Type:</p>
                                            <p class="text-14 color-b-blue font-weight-400">Agent</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Email Id:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${secondaryAgentDetail.email}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Mobile Number:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${secondaryAgentDetail.phone}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Gender:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${secondaryAgentDetail.gender}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Languages Spoken:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${secondaryAgentDetail.languages_spoken}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">

                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Government ID:</p>
                                            <div class="d-flex gap-2 align-items-start">
                                                <img src= "{{ asset('img/certificate.svg') }}" />
                                                <p class="text-14 color-b-blue font-weight-400">
                                                    <span></span>${secondaryAgentDetail.government_certification}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Preferred Location:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${secondaryAgentDetail.preferred_locale}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Budget Range:
                                            </p>
                                            <p class="text-14 color-b-blue font-weight-400">€3000.00 - €5000.00 </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Address:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${secondaryAgentDetail.address}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Description:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${secondaryAgentDetail.msg_to_collaborator_agents}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal_customer-details mb-0">
                            <div class="  modal_margin-detail ">
                                <div class="cat_box-small-i">
                                    <h6 class="text-16 font-weight-700 color-primary text-center">Property Details</h6>
                                </div>
                                <div class="d-flex align-items-start justify-content-between pt-20">
                                    <img src="${data.image || 'http://127.0.0.1:8000/img/default-user.jpg'}" width="60" height="60"
                                        alt="image" class="border-r-8">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">View property</button>
                                </div>
                                <div class="row text-start">
                                    <div class="col-lg-12 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Property Name</p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.name}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Property Reference:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.reference}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Property Listed As:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.listed_as}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Property Price:</p>
                                            <p class="text-14 color-b-blue font-weight-400">€${data.price}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Property Type:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.property_type}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Property Subtype:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.subtype_name}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Total Size:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.size}M</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Bedroom:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.bedrooms}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Bathroom:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.bathrooms}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Property Status/Completion:
                                            </p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.status} </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Commission:
                                            </p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.percentage}% </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Listing Agent(%):
                                            </p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.list_agent_per}% </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Listing Agent(€):
                                            </p>
                                            <p class="text-14 color-b-blue font-weight-400">€${data.list_agent_com} </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Selling Agent(%):
                                            </p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.sell_agent_per}% </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Selling Agent(€):
                                            </p>
                                            <p class="text-14 color-b-blue font-weight-400">€${data.sell_agent_com} </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 pt-12">
                                    </div>
                                    <div class="col-lg-12 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Address:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.address}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-12">
                                        <div class="d-flex flex-column">
                                            <p class="text-14 color-primary font-weight-700">Description:</p>
                                            <p class="text-14 color-b-blue font-weight-400">${data.description}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-center pt-30 py-30">
                    <div class="form-group position-relative gap-12 d-flex align-items-center">
                        <button type="button"
                            class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                            data-toggle="modal" data-target="#cancelbutton">
                            <i class=" icon-message me-2 icon-20"></i>
                            Send Message
                        </button>
                    </div>
                </div>
           `;
    }
});
let canvas = '';
var signature = new bootstrap.Modal(document.getElementById("signature"), {});
var newsignature = new bootstrap.Modal(document.getElementById("newsignature"), {});
function addSelectedSign(){
    var selectedimage = $('#mysign').attr('src');
    console.log(selectedimage);
    $('#mySavedSignaturePrimary').html('<img src="'+selectedimage+'" width="200" height="100" />');
    $("#addYourSignatureprimary").css("display","none");
    signature.hide();

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
    console.log(propertyData);
    const propertyJson = propertyData;

    const ajaxOptions = {
        url: generatepdfurl,
        method: "POST",
        headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        data: JSON.stringify({ data: {primaryAgent:primaryAgent,secondaryAgent:secondaryAgent,companyDetails:companyDetails,secondarycompanyDetails:secondarycompanyDetails,propertyJson:propertyJson,commissionData:commissionData,from:"primaryAgent",project_id:project_id} }),
        success: function(response) {

            if(response.success){
                // window.open(response.file_path, '_blank');


                window.location.href = '/agent/calender';
            }
            attributes.handleSuccess();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            attributes.handleError();
        }
    };
    makeAjaxRequest(ajaxOptions, attributes);
}
function uploadSignature(imagename=''){
    signature.show();

    if(imagename){
        $('#mysign').attr('src', '/storage/signatures/'+imagename);
    }else{
        $('#mysign').attr('src', '/storage/signatures/'+primaryAgent.signature);
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