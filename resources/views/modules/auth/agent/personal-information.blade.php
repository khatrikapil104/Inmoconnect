
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @stack('styles')  

    <!-- Main CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link  rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link  rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">  

    <div class="profile-setup b-color-background vh-100 step-form-pading">
    <a href="#" class="d-flex align-items-center pb-20"><img src="http://crmtest.local/img/left-side.svg" alt="image"
            class="pe-2"><span class="text-14 font-weight-400 lineheight-16  color-b-blue">Go to
            Back</span></a>

    <div class="step-form-agent">
        <div class="row row-height-agent">
            <div class="col-lg-5 pe-0">
                <div
                    class="left-fixed-agent justify-content-center align-items-center h-100 d-flex flex-column b-color-Gradient">
                    <div class="text-32 font-weight-700 color-white-grey text-capitalize lineheight-42">Profile
                        Setup</div>
                    <div class="agent-slider pb-3 mt-30">
                        <div class="slick-slider">
                            <div class="element element-1">
                                <div class="slider-img d-flex justify-content-center">
                                    <img src="/img/slider-1.svg" alt="image" class="">
                                </div>
                                <div
                                    class="pt-20 text-18 font-weight-700 text-capitalize letter-s-36 lineheight-22 color-white text-center">
                                    Connect with trusted professionals</div>
                                <div class="pt-12 text-center color-white text-14 lineheight-18 font-weight-400">InmoConnect ensures
                                    confidential agent connections with a robust lock-and-key mechanism.</div>
                            </div>
                            <div class="element element-2">
                                <div class="slider-img d-flex justify-content-center">
                                    <img src="/img/slider-2.svg" alt="image" class="">
                                </div>
                                <div
                                    class="pt-20 text-18 font-weight-700 text-capitalize letter-s-36 lineheight-22 color-white text-center">
                                    Next-Gen Property Management</div>
                                <div class="pt-12 text-center color-white text-14 lineheight-18 font-weight-400">Experience
                                    cutting-edge design and performance with our property management platform</div>
                            </div>
                            <div class="element element-3">
                                <div class="slider-img d-flex justify-content-center">
                                    <img src="/img/slider-3.svg" alt="image" class="">
                                </div>
                                <div
                                    class="pt-20 text-18 font-weight-700 text-capitalize letter-s-36 lineheight-22 color-white text-center">
                                    Your Real Estate Journey Starts Here</div>
                                <div class="pt-12 text-center color-white text-14 lineheight-18 font-weight-400">Embark on a
                                    connected journey at InmoConnect, fostering relationships for a fulfilling real
                                    estate experiences</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 ps-2 ps-lg-0">
                <div class="right-fixed-agent d-flex flex-column">
                    <div class="crm-image text-center mt-60">
                        <img src="http://crmtest.local/img/login-logo.png" alt="image" class="logo-step-form h-auto">
                    </div>
                    <form action="#" id="booking-form">

                        <div class="tab-content">
                            <div class="tab-pane" id="step1">
                                <h2
                                    class="text-24 font-weight-700 text-capitalize color-primary text-center lineheight-30 mt-30">
                                    Personal Information</h2>
                                <div class="form-group crm-profile-image-upload-container position-relative mt-30">
                                    <div class="image-container  common-label-css text-center">
                                        <label for="image" class="position-relative image-labelimage cursor-pointer">
                                            <img src="asset('img/default-user.jpg') }}" alt="Default Image"
                                                class=" border-r-20" id="image_image" height="120" width="120">
                                            <div
                                                class="badge-overlay position-absolute b-blue-opacity w-100 edit-profile-img">
                                                <span
                                                    class="badge badge-pill badge-add d-block color-white text-14 line-height-20 font-weight-400">Edit</span>
                                            </div>
                                        </label>
                                        <input type="file" id="image_file" name="image" class="d-none mt-3"
                                            accept="image/*" onchange="updateImage(this,'image')">
                                        <div class="invalid-feedback fw-bold"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="first_name"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">First
                                                Name:<span class="required">*</span></label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="first_name" id="first_name" value="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="last_name"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Last
                                                Name:<span class="required">*</span></label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="last_name" id="last_name" value="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Reference
                                                <span class="required">*</span></label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 common-label-css mt-3">
                                        <label for="files"
                                            class="text-14 font-weight-400 lineheight-18 color-b-blue">Property
                                            Files <span class="required">*</span></label>
                                        <div class="form-group dynamic-dropzone-container position-relative">
                                            <!-- <label for="files" class="text-14 font-weight-400 lineheight-18 color-b-blue">Property Files <span class="required">*</span></label> -->
                                            <input type="hidden" name="removedUploadedFilesIds"
                                                id="removedUploadedFilesIds">
                                            <div class="dropzone dz-clickable" id="files">
                                                <div class="dz-default dz-message"><button class="dz-button"
                                                        type="button"><img src="http://crmtest.local/img/upload.svg"
                                                            class="upload"> Drop files here or click to upload..
                                                        <br><small>You can upload up to 30 files. Each file should
                                                            not be larger than 10 MB.</small></button></div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback fw-bold"></div>
                                    </div>
                                </div>
                                <div style="list-style: none; display: block" class="text-end">
                                    <button type="button"
                                        class="next-btn next-btn1 w-150 border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  h-42 gardient-button locateAddressBtn">next
                                    </button>
                                </div>
                            </div>
                            <div class="tab-pane" id="step2">
                                <!-- <ul>
                  <li>
                      <label>Which date and time are you looking to book on?</label>
          <div class="errorTxt"></div>
                      <input type="text" class="datepicker" name="bf_date">
                  </li>
                  <li>
          <label>Which time of day?</label>
          <div class="errorTxt"></div>
          <select name="bf_time">
            <option value="">Select</option>
            <option value="Morning">Morning</option>
            <option value="Midday">Midday</option>
            <option value="Late afternoon, ending with a sunset">Late afternoon, ending with a sunset</option>
                    </select>
                </li>
                  <li>
          <label>How many hours would you like to charter for?</label>
          <div class="errorTxt"></div>
          <select name="bf_hours">
            <option value="">Select</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="Overnight (24 hours)">Overnight (24 hours)</option>
                    </select>
                  </li>
                  <li>
                      <button class="next-btn next-btn2" type="button">Next</button>
                  </li>
              </ul> -->
                                <h2
                                    class="text-24 font-weight-700 text-capitalize color-primary text-center lineheight-30 mt-30">
                                    Personal Information</h2>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Reference
                                                <span class="required">*</span></label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Reference
                                                <span class="required">*</span></label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Reference
                                                <span class="required">*</span></label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="vendor_mobile"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number </label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group crm-radio-container position-relative mt-3">
                                            <label
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">How
                                                Many Properties Are in Your Portfolio?<span
                                                    class="required">*</span></label>
                                            <div class="d-flex crm-radio-custom-filter">
                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="radiopropertyListingFilterData[bathrooms]0" value="0">
                                                    <label class="form-check-label"
                                                        for="radiopropertyListingFilterData[bathrooms]0">
                                                        1-100
                                                    </label>
                                                </div>
                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="100_1000" value="0">
                                                    <label class="form-check-label" for="100_1000">
                                                        101-1000
                                                    </label>
                                                </div>
                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="100_1000_1" value="0">
                                                    <label class="form-check-label" for="100_1000_1">
                                                        1000+
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group crm-radio-container position-relative mt-3">
                                            <label
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">How
                                                Many Properties Are in Your Portfolio?<span
                                                    class="required">*</span></label>
                                            <div class="d-flex crm-radio-custom-filter">
                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="radiopropertyListingFilterData[bathrooms]0" value="0">
                                                    <label class="form-check-label"
                                                        for="radiopropertyListingFilterData[bathrooms]0">
                                                        1-100
                                                    </label>
                                                </div>
                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="100_1000" value="0">
                                                    <label class="form-check-label" for="100_1000">
                                                        101-1000
                                                    </label>
                                                </div>
                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="100_1000_1" value="0">
                                                    <label class="form-check-label" for="100_1000_1">
                                                        1000+
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                        <div class="form-group crm-radio-container position-relative mt-3">
                                            <label
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">How
                                                Many Properties Are in Your Portfolio?<span
                                                    class="required">*</span></label>
                                            <div class="d-flex crm-radio-custom-filter">
                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="radiopropertyListingFilterData[bathrooms]0" value="0">
                                                    <label class="form-check-label"
                                                        for="radiopropertyListingFilterData[bathrooms]0">
                                                        1-100
                                                    </label>
                                                </div>
                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="100_1000" value="0">
                                                    <label class="form-check-label" for="100_1000">
                                                        101-1000
                                                    </label>
                                                </div>
                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="100_1000_1" value="0">
                                                    <label class="form-check-label" for="100_1000_1">
                                                        1000+
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-2">
                                        <div class="form-group crm-radio-container position-relative mt-3">
                                            <label
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">How
                                                Many Properties Are in Your Portfolio?<span
                                                    class="required">*</span></label>
                                            <div class="d-flex crm-radio-custom-filter">
                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="radiopropertyListingFilterData[bathrooms]0" value="0">
                                                    <label class="form-check-label"
                                                        for="radiopropertyListingFilterData[bathrooms]0">
                                                        1-100
                                                    </label>
                                                </div>
                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="100_1000" value="0">
                                                    <label class="form-check-label" for="100_1000">
                                                        101-1000
                                                    </label>
                                                </div>
                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="100_1000" value="0">
                                                    <label class="form-check-label" for="100_1000">
                                                        101-1000
                                                    </label>
                                                </div>

                                                <div class="input-group radio-group w-100">
                                                    <input class="h-4 w-4 text-primary-600 border-gray-300 "
                                                        type="radio" name="propertyListingFilterData[bathrooms]"
                                                        id="100_1000_1" value="0">
                                                    <label class="form-check-label" for="100_1000_1">
                                                        1000+
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="text-end">
                                    <button type="button"
                                        class="next-btn small-button next-btn2 border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 small-button gardient-button locateAddressBtn mt-2">next
                                    </button>
                                </div>
                                <!-- <button type="button" class="next-btn next-btn2 border-r-8 b-color-Gradient color-white text-12 font-weight-400 line-height-15 w-100 h-42 gardient-button locateAddressBtn mt-2">next
      </button> -->
                            </div>
                            <div class="tab-pane" id="step3">
                                <h2
                                    class="text-24 font-weight-700 text-capitalize color-primary text-center lineheight-30 mt-30">
                                    Personal Information</h2>
                                <div class="border-r-12 b-color-white box-shadow-one  p-15">
                                    <div class="row row-border">
                                        <div class="col-lg-12 px-0">
                                            <div
                                                class="text-16 font-weight-700 lineheight-20 text-capitalize color-primary pb-3">
                                                Personal Information:</div>
                                        </div>
                                    </div>
                                    <div class="pt-3 pb-2">
                                        <img src="asset('img/default-user.jpg') }}" alt="Default Image"
                                            class=" border-r-20" id="image_image" height="100" width="100">
                                    </div>
                                    <div class="row row-border">
                                        <div class="col-lg-6 d-flex align-items-center px-0 py-10">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1 me-1">
                                                Name:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">Henry
                                                Tom</div>
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Email:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">
                                                henrytom@gmail.com</div>
                                        </div>
                                    </div>
                                    <div class="row row-border">
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Mobile Number:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">+31
                                                23456789</div>
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Date of Birth:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">
                                                12/7/1994</div>
                                        </div>
                                    </div>
                                    <div class="row row-border">
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Gender:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">Male
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Street Address:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">
                                                Bellavista 79</div>
                                        </div>
                                    </div>
                                    <div class="row row-border">
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                City:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">
                                                Santibáñez De Vidriales</div>
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                State/Province:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">Málaga
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-border">
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Country:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">Spain
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Zip Code:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">49610
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-border">
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Languages Spoken:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">Spanish,
                                                German</div>
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Qualification Type:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">Engineer
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-border">
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Field of Study/Major:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">Lorem
                                                Ipsum</div>
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Professional Certifications: </div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">
                                                <span class="me-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.6956 2.15016C10.5481 2.14449 10.3372 2.14293 10.0102 2.14293H7.21737C6.46965 2.14293 5.97162 2.14377 5.58896 2.17587C5.21849 2.20695 5.04896 2.26191 4.94157 2.3181C4.64705 2.47218 4.40761 2.71804 4.25754 3.02044C4.20282 3.13072 4.14929 3.30478 4.11902 3.68518C4.08776 4.07809 4.08695 4.58946 4.08695 5.3572V14.6429C4.08695 15.4106 4.08776 15.922 4.11902 16.3149C4.14929 16.6953 4.20282 16.8694 4.25754 16.9796C4.40761 17.282 4.64705 17.5279 4.94157 17.682C5.04896 17.7382 5.21849 17.7931 5.58896 17.8242C5.97162 17.8563 6.46965 17.8571 7.21737 17.8571H12.7826C13.5303 17.8571 14.0283 17.8563 14.411 17.8242C14.7814 17.7931 14.951 17.7382 15.0584 17.682C15.3529 17.5279 15.5923 17.282 15.7424 16.9796C15.7971 16.8694 15.8506 16.6953 15.8809 16.3149C15.9122 15.922 15.913 15.4106 15.913 14.6429V8.20382C15.913 7.86802 15.9115 7.65155 15.9059 7.50005L13.0993 7.50006C12.8829 7.50009 12.6626 7.50013 12.4743 7.48433C12.2648 7.46675 12.0048 7.4244 11.7401 7.28596C11.3802 7.09764 11.0875 6.79714 10.9041 6.42754C10.7693 6.15583 10.728 5.88888 10.7109 5.67374C10.6955 5.48036 10.6956 5.25414 10.6956 5.03195C10.6956 5.02131 10.6956 5.01068 10.6956 5.00006V2.15016ZM12.1457 0.325056C11.9415 0.231596 11.7291 0.157438 11.5111 0.103697C11.088 -0.000608923 10.6506 -0.000318609 10.108 4.15721e-05C10.0758 6.29019e-05 10.0432 8.44873e-05 10.0102 8.44873e-05L7.17546 8.38486e-05C6.48064 6.78832e-05 5.89679 5.43464e-05 5.41902 0.040136C4.91948 0.0820427 4.44474 0.17305 3.99411 0.408808C3.30692 0.768332 2.74821 1.34201 2.39806 2.04761C2.16845 2.51031 2.07982 2.99777 2.03901 3.51068C1.99997 4.00126 1.99999 4.60075 2 5.31418V14.6859C1.99999 15.3993 1.99997 15.9988 2.03901 16.4894C2.07982 17.0023 2.16845 17.4898 2.39806 17.9525C2.74821 18.6581 3.30692 19.2318 3.99411 19.5913C4.44474 19.827 4.91948 19.918 5.41902 19.9599C5.89679 20 6.48063 20 7.17544 20H12.8245C13.5193 20 14.1031 20 14.5809 19.9599C15.0804 19.918 15.5552 19.827 16.0058 19.5913C16.693 19.2318 17.2517 18.6581 17.6019 17.9525C17.8315 17.4898 17.9201 17.0023 17.9609 16.4894C17.9999 15.9988 17.9999 15.3993 17.9999 14.6859V8.20382C17.9999 8.16996 17.9999 8.13651 18 8.10343C18.0003 7.54629 18.0006 7.09717 17.899 6.66271C17.8467 6.43886 17.7744 6.22077 17.6834 6.01114C17.6763 5.99394 17.6688 5.97697 17.6609 5.96024C17.6018 5.82944 17.5353 5.70206 17.4617 5.57876C17.2344 5.19779 16.9249 4.88042 16.5409 4.48671C16.5182 4.46334 16.4951 4.4397 16.4718 4.41577L13.6994 1.56915C13.6761 1.54521 13.6531 1.52154 13.6303 1.49813C13.2469 1.10392 12.9378 0.786139 12.5668 0.552681C12.4467 0.477128 12.3226 0.408879 12.1953 0.348209C12.179 0.340064 12.1624 0.332342 12.1457 0.325056ZM12.7826 3.65815V5.00006C12.7826 5.12752 12.7826 5.22776 12.7839 5.31436C12.7841 5.3287 12.7844 5.34224 12.7847 5.35504C12.7971 5.35533 12.8103 5.35559 12.8243 5.35582C12.9086 5.35718 13.0062 5.3572 13.1304 5.3572H14.4373L12.7826 3.65815Z"
                                                            fill="#17213A" />
                                                    </svg>
                                                </span>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none">
                                                        <g clip-path="url(#clip0_580_15541)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5.23518 0.833252H14.7648C15.4966 0.833241 16.1006 0.833231 16.5926 0.873764C17.1036 0.915862 17.5733 1.00621 18.0145 1.2329C18.6987 1.58443 19.255 2.14536 19.6037 2.83529C19.8285 3.28018 19.9181 3.75382 19.9598 4.26908C20 4.76517 20 5.37416 20 6.11204V12.749C20 12.7496 20 12.7502 20 12.7508V13.8878C20 14.6257 20 15.2347 19.9598 15.7308C19.9181 16.246 19.8285 16.7197 19.6037 17.1645C19.255 17.8545 18.6987 18.4154 18.0145 18.7669C17.5733 18.9936 17.1036 19.084 16.5926 19.1261C16.1006 19.1666 15.4966 19.1666 14.7648 19.1666H5.23516C4.50338 19.1666 3.89942 19.1666 3.40743 19.1261C2.89643 19.084 2.4267 18.9936 1.98549 18.7669C1.30126 18.4154 0.744971 17.8545 0.396341 17.1645C0.171531 16.7197 0.081927 16.246 0.0401768 15.7308C-2.07397e-05 15.2347 -1.12037e-05 14.6257 3.92083e-07 13.8878V6.11206C-1.12037e-05 5.37417 -2.07397e-05 4.76517 0.0401768 4.26908C0.081927 3.75382 0.171531 3.28018 0.396341 2.83529C0.744971 2.14536 1.30126 1.58443 1.98549 1.2329C2.4267 1.00621 2.89643 0.915862 3.40743 0.873764C3.89943 0.833231 4.50339 0.833241 5.23518 0.833252ZM18.1818 10.5369V6.14992C18.1818 5.36472 18.1811 4.83095 18.1477 4.41837C18.1151 4.01649 18.0561 3.81097 17.9836 3.6676C17.8093 3.32264 17.5312 3.04218 17.1891 2.86641C17.0469 2.79336 16.8431 2.73384 16.4445 2.70101C16.0353 2.6673 15.506 2.66659 14.7273 2.66659H5.27273C4.49402 2.66659 3.96466 2.6673 3.55549 2.70101C3.15693 2.73384 2.95311 2.79336 2.81093 2.86641C2.46881 3.04218 2.19067 3.32264 2.01635 3.6676C1.94391 3.81097 1.88488 4.01649 1.85232 4.41837C1.81889 4.83095 1.81818 5.36472 1.81818 6.14992V13.8499C1.81818 14.6351 1.81889 15.1689 1.85232 15.5815C1.88488 15.9833 1.94391 16.1889 2.01635 16.3322C2.16152 16.6195 2.37869 16.8621 2.64486 17.0367L8.34914 11.2848C8.51137 11.1212 8.66935 10.9619 8.8141 10.838C8.97305 10.7019 9.17477 10.5556 9.43815 10.4693C9.80332 10.3497 10.1967 10.3497 10.5618 10.4693C10.8252 10.5556 11.0269 10.7019 11.1859 10.838C11.3306 10.9619 11.4886 11.1212 11.6508 11.2848L11.8182 11.4536L13.8037 9.45149C13.9659 9.28788 14.1239 9.12854 14.2686 9.00464C14.4276 8.86857 14.6293 8.7223 14.8927 8.63601C15.2579 8.51637 15.6512 8.51637 16.0164 8.63601C16.2798 8.7223 16.4815 8.86857 16.6404 9.00464C16.7852 9.12852 16.9431 9.28784 17.1053 9.45142L18.1818 10.5369ZM10.3857 12.6019C10.1951 12.4097 10.0903 12.305 10.0092 12.2356C10.006 12.2328 10.0029 12.2302 10 12.2278C9.99709 12.2302 9.99402 12.2328 9.99079 12.2356C9.90972 12.305 9.80492 12.4097 9.61431 12.6019L4.92219 17.3331C5.03317 17.3332 5.14984 17.3333 5.27273 17.3333H14.7273C14.8502 17.3333 14.9668 17.3332 15.0778 17.3331L10.3857 12.6019ZM17.3551 17.0367L13.1038 12.7499L15.0689 10.7685C15.2595 10.5763 15.3643 10.4717 15.4453 10.4023C15.4486 10.3995 15.4516 10.3969 15.4545 10.3945C15.4575 10.3969 15.4605 10.3995 15.4638 10.4023C15.5448 10.4717 15.6496 10.5763 15.8402 10.7685L18.1818 13.1296V13.8499C18.1818 14.6351 18.1811 15.1689 18.1477 15.5815C18.1151 15.9833 18.0561 16.1889 17.9836 16.3322C17.8385 16.6195 17.6213 16.8621 17.3551 17.0367ZM6.36364 6.33325C5.86156 6.33325 5.45455 6.74366 5.45455 7.24992C5.45455 7.75618 5.86156 8.16659 6.36364 8.16659C6.86571 8.16659 7.27273 7.75618 7.27273 7.24992C7.27273 6.74366 6.86571 6.33325 6.36364 6.33325ZM3.63636 7.24992C3.63636 5.73114 4.85741 4.49992 6.36364 4.49992C7.86987 4.49992 9.09091 5.73114 9.09091 7.24992C9.09091 8.7687 7.86987 9.99992 6.36364 9.99992C4.85741 9.99992 3.63636 8.7687 3.63636 7.24992Z"
                                                                fill="#17213A" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_580_15541">
                                                                <rect width="20" height="20" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-r-12 b-color-white box-shadow-one  mt-20 p-10">
                                    <div class="row row-border">
                                        <div class="col-lg-12 px-0">
                                            <div
                                                class="text-16 font-weight-700 lineheight-20 text-capitalize color-primary pb-3">
                                                Personal Information:</div>
                                        </div>
                                    </div>
                                    <div class="row row-border">
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Company Name:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">Lorem
                                                Ipsum</div>
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Professional Title/Role:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">Property
                                                Management </div>
                                        </div>
                                    </div>
                                    <div class="row row-border">
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Primary Service Area:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">Spanish
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Properties in Portfolio: </div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">101-1000
                                                Properties </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row row-border">
                                        <div class="col-lg-12 d-flex align-items-center py-2 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Property Specialization:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">
                                                <span>Henry Tom</span>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="row row-border">
                                        <div class="col-lg-12 d-flex align-items-center py-2 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Property Types Specialized In:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">
                                                Apartment, Apartment Duplex </div>
                                        </div>
                                    </div>
                                    <div class="row row-border">
                                        <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Years of Experience in Real Estate:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">0-10
                                                Years</div>
                                        </div>
                                        <!-- <div class="col-lg-6 d-flex align-items-center py-10 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                                                Number of Current Customers:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">500+
                                                Customers </div>
                                        </div> -->
                                    </div>
                                    <div class="row row-border">
                                        <div class="col-lg-12 d-flex align-items-center py-2 px-0">
                                            <div class="text-14 color-primary font-weight-700 lineheight-18">Average
                                                Number of Properties Managed/Listed:</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18">3000+
                                                Properties</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit"
                                        class="submit-btn w-150 next-btn next-btn2 border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 h-42 gardient-button locateAddressBtn mt-2">conform
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="progress-wrap">
                            <div class="line-progress-bar">
                                <ul class="checkout-bar">
                                    <li class="progressbar-dotss_zero">
                                        <span class="progressbar-dots active"></span>
                                        <span
                                            class="color-light-grey-two text-14 font-weight-400 lineheight-18 text-capitalize pt-10">step
                                            01</span>
                                        <span
                                            class="color-b-blue text-14 font-weight-700 lineheight-18 text-capitalize pt-1">Personal
                                            Information</span>
                                        <span
                                            class="color-primary text-14 font-weight-400 lineheight-18 text-capitalize pt-2"
                                            id="change-text">In progress</span>
                                    </li>
                                    <li class="progressbar-dotss_one">
                                        <span class="progressbar-dots"></span>
                                        <span
                                            class="color-light-grey-two text-14 font-weight-400 lineheight-18 text-capitalize pt-10">step
                                            02</span>
                                        <span
                                            class="color-b-blue text-14 font-weight-700 lineheight-18 text-capitalize pt-1">Professional
                                            Information</span>
                                        <span
                                            class="color-light-grey-three text-14 font-weight-400 lineheight-18 text-capitalize pt-2"
                                            id="change-text_one">Pending</span>
                                    </li>
                                    <li class="progressbar-dotss_two">
                                        <span class="progressbar-dots final-dots"></span>
                                        <span
                                            class="color-light-grey-two text-14 font-weight-400 lineheight-18 text-capitalize pt-10">step
                                            03</span>
                                        <span
                                            class="color-b-blue text-14 font-weight-700 lineheight-18 text-capitalize pt-1">Profile
                                            Overview</span>
                                        <span
                                            class="color-light-grey-three text-14 font-weight-400 lineheight-18 text-capitalize pt-2"
                                            id="change-text_two">Pending</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div id="loader" style="display: none;">
                            <img src="//d2erq0e4xljvr7.cloudfront.net/assets/img/ring.svg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script>
   $(".slick-slider").slick({
   slidesToShow: 1,
   infinite:true,
   slidesToScroll: 1,
   autoplay: false,
   dots: true,
   arrows: false,
   autoplaySpeed: 3000
     // dots: false, Boolean
    // arrows: false, Boolean
  });
  </script>
<script>
    var v = $("#booking-form").validate({
      rules: {
        bf_totalGuests: {
          required: true
        },
        bf_date: {
          required: true
        },
        bf_time: {
          required: true
        },
        bf_hours: {
          required: true
        },
        bf_fullname: {
          required: true
        },
        bf_email: {
          required: true,
          email: true
        }
 
      },
      errorElement: "span",
      errorClass: "error",
      errorPlacement: function(error, element) {
            error.insertBefore(element); 
      }
});

$(".next-btn1").click(function() {
    console.log('asdasdasdasd')
    if (v.form()) {
      $(".tab-pane").hide();
      $("#step2").fadeIn(1000);
      $('.progressbar-dots').removeClass('active');
      $('li.progressbar-dotss_one .progressbar-dots').addClass('active');
      $('li.progressbar-dotss_zero .progressbar-dots').addClass('active_one');
      $("span#change-text").text("Completed");
      $("span#change-text_one").text("In Progress");
      $("span#change-text_one").addClass("active_three");
      $('span#change-text').addClass('active_two');
    }
    
 });
 const changeText = document.querySelector("#change-text");

// changeText.addEventListener("click", function() {
//   changeText.textContent = "Text has been changed!";
// });
$(".next-btn2").click(function() {
    if (v.form()) {
      $(".tab-pane").hide();
      $("#step3").fadeIn(1000);
      $('li.progressbar-dotss_one .progressbar-dots').removeClass('active');
      $('li.progressbar-dotss_two .progressbar-dots').addClass('active');
      $('li.progressbar-dotss_one .progressbar-dots').addClass('active_one');
      $("span#change-text_one").text("Completed");
      $('span#change-text_one').removeClass('active_three');
      $('span#change-text_one').addClass('active_two');
      $("span#change-text_two").text("In Progress");
      $('span#change-text_two').addClass('active_three');
    }
});

$(".submit-btn").click(function() {
  if (v.form()) {
    $("#loader").show();
     setTimeout(function(){
       $("#booking-form").html("<h2>Your message was sent successfully. Thanks! We'll be in touch as soon as we can, which is usually like lightning (Unless we're sailing or eating tacos!).</h2>");
     }, 1000);
    return false;
  }
});
</script>
</body>
</html>