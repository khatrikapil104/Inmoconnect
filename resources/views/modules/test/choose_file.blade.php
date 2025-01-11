<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link  rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <style>
        .input-file_choose{
    height: 42px;
    width: 150px;
    color: #565A90;
    border-radius: 8px;
border: 1px solid var(--Black-Colour, #17213A);
background: #FCFCFC;
}
.input-file_choose::file-selector-button{
    border: none;
    border-radius: 4px;
    color: white;
    height: 42px;
    cursor: pointer;
    transition: all .25s ease-in;
    cursor: pointer;
    border-radius: 8px 0px 0px 8px;
border-right: 1px solid var(--Black-Colour, #17213A);
background: #F6FAFF;
color: var(--Black-Colour, #17213A);
font-size: 14px;
font-weight: 400;
line-height: 18px;
text-transform: capitalize;
width:150px;
}
.form-group_file{
    background-color: #FCFCFC;
    border: 1px solid red;
    border-radius: 8px;
    display:flex;
    align-items:center;
}

/* .input-file::file-selector-button:hover{
    background-color: #fff;
    color: #565A90;
    transition: all .25s ease-in;
} */
    </style>
</head>
<body>
  
<div class="row">
    <div class="col-lg-12">
    <label>Add Attachments</label>
    <!-- <input type="file" class="input-file_choose"> -->
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative form-group_file gap-3">
                                            <input type="file" class="input-file_choose">
                                            <div class="d-flex align-tems-center gap-3 flex-wrap w-100">
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>

                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    </div>
</div>

</body>
</html>