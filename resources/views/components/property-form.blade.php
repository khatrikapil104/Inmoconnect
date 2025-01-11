<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <!-- bootstrap css  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="empty-search-header" style="max-width:1045px ; margin-left:auto; margin-right:auto; height:100vh; display:block; align-items:center; width:100%;"> {{-- i add this class for my view --}}
    <div class="card-description py-50 box-shadow-one border-r-8 b-color-white mb-30">
          <div class="card-text-header text-16 font-weight-700 line-height-20 color-primary px-15"> Basic Information</div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group pb-24">
                <label for="phone" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Property Category<span class="color-red">*</span></label>
                <div class="wrapper-dropdown position-relative form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50 d-flex align-items-center justify-content-between" id="dropdown">
                  <span class="selected-display " id="destination"></span>
                    <svg class="arrow float-end" id="drp-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="none">
                     <path d="M1 1L7 7L13 1" stroke="#17213A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <ul class="dropdown box-shadow-one position-absolute start-0 end-0 m-0 p-0 b-color-white">
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 1</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 2</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 3</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 4</li>
                    </ul>
                 </div>
               </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group pb-24">
                <label for="phone" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Property Situation<span class="color-red">*</span></label>
                <div class="wrapper-dropdown position-relative form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50 d-flex align-items-center justify-content-between" id="dropdown">
                  <span class="selected-display " id="destination"></span>
                    <svg class="arrow float-end" id="drp-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="none">
                     <path d="M1 1L7 7L13 1" stroke="#17213A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <ul class="dropdown box-shadow-one position-absolute start-0 end-0 m-0 p-0 b-color-white">
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 1</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 2</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 3</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 4</li>
                    </ul>
                 </div>
               </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group pb-24">
                    <label for="fax" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Property Reference<span class="color-red">*</span></label>
                    <input type="text" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="fax">
                </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group pb-24">
                <label for="phone" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Property Type<span class="color-red">*</span></label>
                <div class="wrapper-dropdown position-relative form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50 d-flex align-items-center justify-content-between" id="dropdown">
                  <span class="selected-display " id="destination"></span>
                    <svg class="arrow float-end" id="drp-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="none">
                     <path d="M1 1L7 7L13 1" stroke="#17213A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <ul class="dropdown box-shadow-one position-absolute start-0 end-0 m-0 p-0 b-color-white">
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 1</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 2</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 3</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 4</li>
                    </ul>
                 </div>
               </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group pb-24">
                    <label for="email" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Property Type<span class="color-red">*</span></label>
                    <input type="email" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="email">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group pb-24">
                    <label for="address" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Property Owner Name (If Different From Vendor)</label>
                    <input type="text" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="address">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group pb-24">
                    <label for="address" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Description<span class="color-red">*</span></label>
                    <textarea name="textarea" rows="5" cols="30" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue h-149" id="address"></textarea>
                    </textarea>
                </div>
            </div>
          </div>
    </div>
    <div class="card-description py-50 box-shadow-one border-r-8 b-color-white mb-30">
          <div class="card-text-header text-16 font-weight-700 line-height-20 color-primary px-15">Vendor Information</div>
          <div class="row">
            <div class="col-lg-6">
                <div class="form-group pb-24">
                    <label for="name" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Vendor Name<span class="color-red">*</span></label>
                    <input type="text" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="name">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group pb-24">
                    <label for="phone" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Vendor Phone</label>
                    <input type="tel" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="phone">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group pb-24">
                    <label for="fax" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Vendor FAX</label>
                    <input type="text" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="fax">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group pb-24">
                    <label for="phone1" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Vendor Mobile</label>
                    <input type="tel" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="phone1">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group pb-24">
                    <label for="email" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Vendor Email Address<span class="color-red">*</span></label>
                    <input type="email" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="email">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group pb-24">
                    <label for="address" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Vendor Address<span class="color-red">*</span></label>
                    <input type="text" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="address">
                </div>
            </div>
          </div>
    </div>
    <div class="card-description py-50 box-shadow-one border-r-8 b-color-white mb-30">
          <div class="card-text-header text-16 font-weight-700 line-height-20 color-primary px-15">Additional  Information</div>
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group pb-24">
                <label for="phone" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Number Bedroom<span class="color-red">*</span></label>
                <div class="wrapper-dropdown position-relative form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50 d-flex align-items-center justify-content-between" id="dropdown">
                  <span class="selected-display " id="destination"></span>
                    <svg class="arrow float-end" id="drp-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="none">
                     <path d="M1 1L7 7L13 1" stroke="#17213A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <ul class="dropdown box-shadow-one position-absolute start-0 end-0 m-0 p-0 b-color-white">
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 1</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 2</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 3</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 4</li>
                    </ul>
                 </div>
               </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group pb-24">
                <label for="phone" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Number Bathroom<span class="color-red">*</span></label>
                <div class="wrapper-dropdown position-relative form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50 d-flex align-items-center justify-content-between" id="dropdown">
                  <span class="selected-display " id="destination"></span>
                    <svg class="arrow float-end" id="drp-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="none">
                     <path d="M1 1L7 7L13 1" stroke="#17213A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <ul class="dropdown box-shadow-one position-absolute start-0 end-0 m-0 p-0 b-color-white">
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 1</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 2</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 3</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 4</li>
                    </ul>
                 </div>
               </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group pb-24">
                <label for="phone" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Number Floors<span class="color-red">*</span></label>
                <div class="wrapper-dropdown position-relative form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50 d-flex align-items-center justify-content-between" id="dropdown">
                  <span class="selected-display " id="destination"></span>
                    <svg class="arrow float-end" id="drp-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="none">
                     <path d="M1 1L7 7L13 1" stroke="#17213A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <ul class="dropdown box-shadow-one position-absolute start-0 end-0 m-0 p-0 b-color-white">
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 1</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 2</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 3</li>
                        <li class="item line-hight-32 p-15 overflow-hidden">Option 4</li>
                    </ul>
                 </div>
               </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group pb-24">
                    <label for="phone1" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Size in Sqft<span class="color-red">*</span></label>
                    <input type="tel" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="phone1">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group pb-24">
                    <label for="phone1" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Price in $<span class="color-red">*</span></label>
                    <input type="tel" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="phone1">
                </div>
            </div>
          </div>
    </div>
    <div class="card-description py-50 box-shadow-one border-r-8 b-color-white mb-30">
          <div class="card-text-header text-16 font-weight-700 line-height-20 color-primary px-15">Location</div>
          <div class="row">
            <div class="col-lg-4">
                <div class="form-group pb-24">
                    <label for="name" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Property Street Number<span class="color-red">*</span></label>
                    <input type="text" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="name">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group pb-24">
                    <label for="phone" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Property Street<span class="color-red">*</span></label>
                    <input type="tel" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="phone">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group pb-24">
                    <label for="fax" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Postcode<span class="color-red">*</span></label>
                    <input type="text" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="fax">
                </div>
            </div>
            <div class="col-lg-12 pb-3">
                <label for="fax" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Property address <span>*</span></label>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-header">
                                <input type="text" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue height-50" id="fax">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-header">
                                <button href="#" class="form_property_button form-address border-r-8 b-color-Gradient text-12 line-height-15 font-weight-400 color-white w-100 height-50">To Locate</button>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-12 mb-3">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus"
                            width="100%" height="330" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-12">
                <div class="form-group pb-24">
                    <label for="address" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Vendor Address<span class="color-red">*</span></label>
                    <textarea name="textarea" rows="5" cols="30" class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue h-138" id="address"></textarea>
                    </textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-description py-50 box-shadow-one border-r-8 b-color-white mb-30">
          <div class="card-text-header text-16 font-weight-700 line-height-20 color-primary px-15">Media</div>
          <div class="row">
            <div class="col-lg-12">
                <div class="form-group pb-24">
                    <label for="name" class="text-14 font-weight-400 line-height-18 color-b-blue pb-2">Vendor Name<span class="color-red">*</span></label>
                    <div class="upload-files-container border-r-8 d-flex align-items-center justify-content-center cursor-pointer flex-column border-dashed  b-blue-opacity">
                            <div class="drag-file-area text-center w-100">
                                <label class="label px-50 display-block w-100"> <span class="browse-files"> <input type="file"
                                            class="default-file-input" />
                                        <span class="material-icons-outlined upload-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="36"
                                                viewBox="0 0 37 36" fill="none">
                                                <g clip-path="url(#clip0_1731_80805)">
                                                    <path
                                                        d="M29.2296 26.9228C33.2445 26.9228 36.4929 23.6673 36.5 19.6524C36.5 15.6376 33.2445 12.3892 29.2296 12.3821H27.6125V13.9993L29.1875 14.3509C29.3351 13.6899 29.4054 13.029 29.4054 12.3751C29.4054 10.0478 28.4914 7.86104 26.9726 6.17354C25.4468 4.479 23.3093 3.25557 20.8132 2.80557C20.1101 2.679 19.414 2.61572 18.7179 2.61572C16.264 2.61572 13.9367 3.38916 12.0734 4.74619C10.2101 6.10322 8.79683 8.07197 8.26948 10.4204L9.84448 10.772L9.90776 9.16182L9.52808 9.15479C7.13745 9.15479 4.93667 10.0548 3.30542 11.5524C1.67417 13.0431 0.598389 15.1524 0.49292 17.5079L0.499951 17.8735C0.499951 21.3118 2.60229 24.4196 5.81558 25.8188C6.6312 26.1774 7.58745 25.8048 7.93901 24.9821C8.29761 24.1665 7.92495 23.2103 7.10229 22.8587C5.00698 21.9446 3.72026 19.9829 3.72026 17.8735L3.73433 17.6485C3.79761 16.186 4.45151 14.8923 5.49917 13.936C6.54683 12.9798 7.96714 12.3892 9.54214 12.3892L9.79526 12.3962C10.5757 12.4243 11.2648 11.897 11.4335 11.1376C11.7781 9.61885 12.6851 8.31807 13.9859 7.36885C15.2867 6.41963 16.9601 5.85713 18.732 5.85713C19.2312 5.85713 19.7375 5.89932 20.2437 5.99072C22.0507 6.32119 23.5414 7.19307 24.575 8.33916C25.6085 9.49228 26.1851 10.9056 26.1851 12.3821C26.1851 12.797 26.1429 13.2259 26.0445 13.6548C25.939 14.1329 26.0515 14.6321 26.3609 15.0188C26.6703 15.3985 27.1343 15.6235 27.6195 15.6235H29.2367C31.4656 15.6306 33.2726 17.4306 33.2726 19.6595C33.2656 21.8884 31.4656 23.6954 29.2367 23.6954C28.3437 23.6954 27.6195 24.4196 27.6195 25.3126C27.6195 26.1985 28.3437 26.9228 29.2296 26.9228Z"
                                                        fill="#17213A" />
                                                    <path
                                                        d="M16.3132 17.2339V31.7675C16.3132 32.6604 17.0375 33.3847 17.9304 33.3847C18.8234 33.3847 19.5476 32.6604 19.5476 31.7675V17.2339C19.5476 16.3409 18.8234 15.6167 17.9304 15.6167C17.0375 15.6167 16.3132 16.3409 16.3132 17.2339Z"
                                                        fill="#17213A" />
                                                    <path
                                                        d="M11.9398 28.062L16.7843 32.9065C17.0867 33.2089 17.5015 33.3776 17.9234 33.3776C18.3453 33.3776 18.7671 33.2019 19.0624 32.9065L23.907 28.062C24.5398 27.4292 24.5398 26.4097 23.907 25.7769C23.2742 25.144 22.2546 25.144 21.6218 25.7769L17.9164 29.4823L14.2109 25.7769C13.5781 25.144 12.5585 25.144 11.9257 25.7769C11.2929 26.4097 11.314 27.4362 11.9398 28.062Z"
                                                        fill="#17213A" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1731_80805">
                                                        <rect width="36" height="36" fill="white"
                                                            transform="translate(0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                        <h3 class="dynamic-message text-16 font-weight-700 line-height-20 color-b-blue"> Drop files here or click to upload</h3>
                                        <span class="browse-files-text text-12 color-b-blue font-weight-400 line-height-15 position-relative">You can upload
                                            up to 30 photos </span> </label>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-description py-50 box-shadow-one border-r-8 b-color-white mb-30">
          <div class="card-text-header text-16 font-weight-700 line-height-20 color-primary px-15">Media</div>
          <div class="row">
                    <div class="col-lg-2">
                        <div class="property_icon d-flex gap-3 flex-column">
                            <div class="property_top-icon text-14 font-weight-400 lineheight-18 color-b-blue ">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.7045 12.2642C4.72798 11.4305 4.74755 11.3562 4.97456 11.2035C5.13112 11.1018 5.46771 11.1018 5.63601 11.2074C5.8865 11.364 5.90215 11.4305 5.87867 12.499C5.8591 13.5479 5.81996 13.775 5.53816 14.4834C5.15069 15.454 4.42661 16.2642 3.44031 16.8434C3.21331 16.9765 3.13894 17 2.95499 17C2.58317 17 2.36791 16.7847 2.36791 16.4207C2.36791 16.1389 2.45401 16.0059 2.73973 15.8376C3.36204 15.4736 3.78865 15.0783 4.12524 14.5499C4.54012 13.908 4.67319 13.3836 4.7045 12.2642ZM0.125245 1.57534C0.348337 1.12133 0.692759 0.808218 1.15851 0.639921C1.36595 0.565557 1.56164 0.565557 10.0587 0.573383L18.7476 0.581213L19.0215 0.714285C19.3816 0.890409 19.6908 1.19961 19.8669 1.55969L20 1.83366V5.25832V8.68297L19.8669 8.95695C19.6908 9.31702 19.3816 9.62622 19.0215 9.80235L18.7476 9.93542L10.0783 9.94716C1.51859 9.95499 1.40509 9.95499 1.17808 9.87671C0.704501 9.71624 0.35225 9.40704 0.125245 8.94129L0 8.68297V5.25832V1.83366L0.125245 1.57534ZM15.2838 4.67123C15.2838 4.47162 15.1937 4.31115 15.0254 4.19765C14.7828 4.04109 14.3757 4.14677 14.2466 4.40117C14.1644 4.55381 14.1722 4.82387 14.2622 4.96086C14.4305 5.21526 14.7867 5.30137 15.0254 5.14481C15.1937 5.03131 15.2838 4.87084 15.2838 4.67123ZM17.6321 4.67123C17.6321 4.47162 17.5421 4.31115 17.3738 4.19765C17.1311 4.04109 16.7241 4.14677 16.5949 4.40117C16.5127 4.55381 16.5205 4.82387 16.6106 4.96086C16.7789 5.21526 17.135 5.30137 17.3738 5.14481C17.5421 5.03131 17.6321 4.87084 17.6321 4.67123ZM17.6321 7.01957C17.6321 6.81605 17.5147 6.61252 17.3464 6.51859C17.229 6.45597 16.7632 6.45205 10.0783 6.44423C6.14873 6.44423 2.88063 6.45205 2.818 6.46771C2.53229 6.53816 2.36791 6.73777 2.36791 7.02348C2.36791 7.22309 2.47358 7.40313 2.64971 7.50881C2.77886 7.58708 2.84932 7.58708 10 7.58708H17.2211L17.3581 7.50098C17.5382 7.39139 17.6321 7.22309 17.6321 7.01957ZM7.3229 11.2035C7.26419 11.2427 7.17808 11.3288 7.13894 11.3875C7.06849 11.4971 7.06458 11.6184 7.06458 14.0646C7.06458 16.5108 7.06849 16.6321 7.13894 16.7417C7.26027 16.9217 7.409 17 7.65166 17C7.89432 17 8.04305 16.9217 8.16438 16.7417C8.23483 16.6321 8.23875 16.5108 8.23875 14.0646C8.23875 11.6184 8.23483 11.4971 8.16438 11.3875C8.04305 11.2074 7.89432 11.1292 7.65166 11.1292C7.50685 11.1292 7.40117 11.1526 7.3229 11.2035ZM9.48728 11.3875C9.52642 11.3288 9.61252 11.2427 9.67123 11.2035C9.74951 11.1526 9.85519 11.1292 10 11.1292C10.2427 11.1292 10.3914 11.2074 10.5127 11.3875C10.5832 11.4971 10.5871 11.6184 10.5871 14.0646C10.5871 16.5108 10.5832 16.6321 10.5127 16.7417C10.3914 16.9217 10.2427 17 10 17C9.75734 17 9.60861 16.9217 9.48728 16.7417C9.41683 16.6321 9.41292 16.5108 9.41292 14.0646C9.41292 11.6184 9.41683 11.4971 9.48728 11.3875ZM12.0196 11.2035C11.9609 11.2427 11.8748 11.3288 11.8356 11.3875C11.7652 11.4971 11.7613 11.6184 11.7613 14.0646C11.7613 16.5108 11.7652 16.6321 11.8356 16.7417C11.9569 16.9217 12.1057 17 12.3483 17C12.591 17 12.7397 16.9217 12.8611 16.7417C12.9315 16.6321 12.9354 16.5108 12.9354 14.0646C12.9354 11.6184 12.9315 11.4971 12.8611 11.3875C12.7397 11.2074 12.591 11.1292 12.3483 11.1292C12.2035 11.1292 12.0978 11.1526 12.0196 11.2035ZM14.1096 12.3229C14.1096 11.4188 14.1213 11.3679 14.3679 11.2035C14.5166 11.1057 14.8571 11.1018 15.0176 11.1957C15.2485 11.3327 15.272 11.4266 15.2955 12.2642C15.3268 13.3836 15.4599 13.908 15.8748 14.5499C16.2114 15.0783 16.638 15.4736 17.2603 15.8376C17.546 16.0059 17.6321 16.1389 17.6321 16.4207C17.6321 16.7847 17.4168 17 17.045 17C16.8611 17 16.7867 16.9765 16.5597 16.8434C15.4599 16.2016 14.7162 15.2935 14.3288 14.1233C14.1566 13.591 14.1096 13.2231 14.1096 12.3229Z"
                                        fill="#17213A" />
                                </svg>
                                Air conditioning
                            </div>
                            <div class="property_bottom_icon text-14 font-weight-400 lineheight-18 color-b-blue ">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.7663 13.8832C2.64506 13.6996 3.43008 13.602 4.27759 13.5707C4.64471 13.5551 5.03917 13.5473 5.15634 13.5551C5.21975 13.5572 5.34722 13.5628 5.49664 13.5693C5.62333 13.5748 5.7658 13.581 5.8984 13.5864C6.90213 13.6254 7.69496 13.7387 9.87037 14.1683C12.409 14.6682 13.3463 14.7854 14.8226 14.7893C16.1661 14.7893 17.2949 14.6643 18.5915 14.3636C19.3765 14.1839 19.5132 14.1683 19.6851 14.2581C20.0717 14.4573 20.1108 15.0705 19.7554 15.3009C19.5991 15.3985 18.5329 15.6446 17.6346 15.7891C16.6309 15.9492 15.9552 16 14.9007 16C13.3073 16 12.3738 15.8867 9.6868 15.3634C7.03492 14.8479 6.21475 14.7541 4.6408 14.7893C3.34806 14.8166 2.42244 14.9455 1.17266 15.2697C0.61416 15.4181 0.430598 15.422 0.250942 15.3048C-0.081032 15.09 -0.0849376 14.5081 0.247036 14.2894C0.348581 14.2269 1.15703 14.0082 1.7663 13.8832ZM3.39883 10.8915C2.3248 11.0126 0.489183 11.3992 0.250943 11.5555C-0.0849364 11.7742 -0.0810309 12.3522 0.250943 12.5709C0.430599 12.6881 0.614161 12.6842 1.17266 12.5358C2.42244 12.2116 3.34806 12.0827 4.64081 12.0554C6.21475 12.0202 7.03492 12.114 9.6868 12.6295C12.3738 13.1528 13.3073 13.2661 14.9007 13.2661C15.9552 13.2661 16.6309 13.2153 17.6346 13.0552C18.5329 12.9107 19.5991 12.6646 19.7554 12.567C20.0795 12.3561 20.0756 11.7703 19.7515 11.5555C19.5718 11.4383 19.4078 11.4422 18.7829 11.5906C16.3614 12.1491 14.3422 12.2077 11.7763 11.7898C11.456 11.739 10.5656 11.5711 9.80397 11.4227C7.25363 10.9228 6.8123 10.8681 5.15634 10.8486C4.25415 10.8407 3.74643 10.8525 3.39883 10.8915ZM13.1042 0.698014C12.4754 0.838614 7.53875 2.29539 7.34347 2.40084C6.74201 2.7211 6.35145 3.29131 6.246 4.01384C6.19523 4.35363 6.246 4.75981 6.37879 5.08788C6.42956 5.20895 6.83184 5.89242 7.27707 6.60714C7.72231 7.32186 8.08553 7.91942 8.08553 7.93504C8.08553 7.95066 7.46845 8.34122 6.71858 8.80207C5.96871 9.26293 5.35553 9.65349 5.35163 9.66911C5.35163 9.68864 5.48051 9.70036 5.63673 9.70036C6.57798 9.70036 7.81995 9.88001 10.2922 10.3643C11.5771 10.6182 11.9638 10.6846 12.5769 10.7705C13.1511 10.8486 14.0962 10.9306 14.1235 10.8994C14.1392 10.8877 14.0962 10.79 14.0337 10.6885C13.9969 10.6321 13.9288 10.5216 13.8507 10.3951L13.8506 10.3949L13.8505 10.3948C13.788 10.2934 13.7191 10.1816 13.6549 10.0792L13.3932 9.65349L13.6393 9.82924C14.0923 10.1495 14.4985 10.3018 15.0218 10.3448C16.2833 10.4502 17.4667 9.59881 17.7909 8.35293C17.8729 8.0483 17.8729 7.37264 17.7909 7.0641C17.6386 6.46654 17.2128 5.85727 16.7168 5.52139C15.8107 4.90822 14.6469 4.91213 13.7252 5.52921C12.9753 6.03302 12.5301 6.95474 12.5887 7.88817C12.6043 8.08345 12.6316 8.29044 12.655 8.35293C12.6785 8.41152 12.6902 8.4662 12.6824 8.47401C12.6668 8.49354 10.5851 5.14255 10.5851 5.09959C10.5851 5.08006 11.3623 4.84183 12.3153 4.56844C13.2643 4.29504 14.1353 4.02947 14.2485 3.97869C14.5024 3.86153 14.8734 3.51393 15.0101 3.26397C15.5842 2.20556 14.975 0.897198 13.8033 0.682391C13.5221 0.627714 13.401 0.631618 13.1042 0.698014Z"
                                        fill="#17213A" />
                                </svg>
                                Swimming pool
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="property_icon d-flex gap-3 flex-column">
                            <div class="property_top-icon text-14 font-weight-400 lineheight-18 color-b-blue ">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.449219 14.7852C0.554688 15.3594 1.18359 15.9102 1.78516 15.9609L2.03125 15.9805V16.875V17.7734L2.14453 17.8867L2.25781 18H2.83203H3.40625L3.51953 17.8867L3.63281 17.7734V16.8711V15.9688H7.20703H10.7813V16.8711V17.7734L10.8945 17.8867L11.0078 18H11.582H12.1562L12.2695 17.8867L12.3828 17.7734V16.875V15.9805L12.6094 15.957C13.0664 15.918 13.5547 15.5859 13.7773 15.1602C13.8906 14.9492 13.9805 14.6406 13.9297 14.6406C13.918 14.6406 13.8281 14.6914 13.7266 14.7578C13.625 14.8203 13.4258 14.9141 13.2852 14.9609L13.0273 15.0508H7.20703H1.38672L1.11328 14.9648C0.964844 14.918 0.753906 14.8242 0.652344 14.7578C0.550781 14.6953 0.457031 14.6406 0.445313 14.6406C0.429688 14.6406 0.433594 14.707 0.449219 14.7852ZM14.7383 1.33594C15.1484 0.941404 15.6328 0.683592 16.1914 0.554686C16.3516 0.519531 16.6016 0.507811 16.9727 0.515623C17.4336 0.527342 17.5703 0.542967 17.832 0.632811C18.3516 0.800779 18.6875 1.01172 19.1016 1.43359C19.4141 1.75 19.5039 1.86719 19.6602 2.17969C19.9141 2.6875 20 3.05469 20 3.625C20 4.14062 19.918 4.53516 19.7305 4.94141C19.3008 5.85547 18.4336 6.53125 17.4531 6.71094L17.1875 6.75781V11.5195V16.2812H16.875H16.5625V11.5234V6.76953L16.2578 6.70312C15.6016 6.57031 15.1641 6.32812 14.6484 5.8125C14.332 5.5 14.2461 5.38281 14.0898 5.07031C13.8359 4.5625 13.75 4.19531 13.75 3.625C13.75 2.69922 14.0625 1.97656 14.7383 1.33594ZM18.1758 2.62891C18.0664 2.41406 17.9336 2.28125 17.7305 2.17578C17.5703 2.08984 17.5039 2.08594 16.6719 2.07031L15.7812 2.05469V3.77734V5.5H16.0938H16.4062V4.87891V4.26172L16.9844 4.24219C17.6094 4.22265 17.7891 4.16797 17.9961 3.94531C18.1992 3.72656 18.2539 3.55469 18.2539 3.15625C18.2539 2.85547 18.2383 2.75391 18.1758 2.62891ZM16.4062 3.625V3.15625V2.6875H16.9531C17.6445 2.6875 17.6562 2.69531 17.6562 3.15625C17.6562 3.61719 17.6445 3.625 16.9531 3.625H16.4062ZM4.07031 6.82812C3.3125 7.02734 2.63281 7.58203 2.29687 8.27344C2.10938 8.65625 1.99219 9.08203 1.99219 9.37891V9.54687L2.29297 9.64453L2.59766 9.73828H7.1875H11.7773L12.082 9.64453L12.3828 9.54687V9.37891C12.3828 9.08203 12.2656 8.65625 12.0781 8.27344C11.7383 7.57422 11.0586 7.02344 10.2891 6.82812C10.0039 6.75391 9.84766 6.75 7.17187 6.75391C4.53125 6.75391 4.33594 6.75781 4.07031 6.82812ZM0.0742187 9.17965C0.167969 8.99996 0.292969 8.88277 0.46875 8.80464C0.566406 8.76168 0.75 8.74605 1.11719 8.74214H1.63281L1.59766 8.90621L1.59345 8.92639C1.57486 9.01567 1.55386 9.11656 1.54297 9.16011C1.53125 9.20699 1.40625 9.3359 1.26172 9.44918C0.910156 9.72261 0.648437 9.97261 0.484375 10.1953C0.335937 10.3984 0.265625 10.4062 0.0976562 10.2382C0.00390625 10.1445 0 10.1132 0 9.73043C0 9.41011 0.015625 9.29683 0.0742187 9.17965ZM12.7969 9.00386C12.8281 9.1484 12.8594 9.26558 12.8633 9.26949C12.8672 9.26949 12.9844 9.35543 13.125 9.4609C13.4531 9.70699 13.7227 9.9648 13.8906 10.1953C14.0391 10.3984 14.1094 10.4062 14.2773 10.2382C14.3711 10.1445 14.375 10.1132 14.375 9.73043C14.375 9.29293 14.3242 9.12496 14.1328 8.94918C13.9531 8.78121 13.7852 8.74214 13.25 8.74214H12.7422L12.7969 9.00386ZM0.5 11.2305C0.644532 10.8359 0.832031 10.5312 1.09375 10.2578C1.23438 10.1133 1.37891 9.99218 1.41406 9.99218C1.44531 9.99218 1.66797 10.0547 1.89844 10.1289C2.13281 10.2031 2.40234 10.2851 2.5 10.3086C2.73047 10.3711 10.9141 10.4062 11.5039 10.3476C11.7578 10.3203 12.0781 10.25 12.4141 10.1484C12.6992 10.0586 12.9648 9.99999 13.0078 10.0117C13.125 10.0508 13.5312 10.5156 13.668 10.7734C13.9531 11.3047 13.957 11.3437 13.9766 12.5625L13.9922 13.6719L13.8867 13.832C13.6719 14.1523 13.3672 14.3594 12.9766 14.4414C12.6875 14.5 1.75391 14.5039 1.42578 14.4414C1.02344 14.3672 0.710938 14.1641 0.488282 13.832L0.382813 13.6719L0.398438 12.5625C0.414063 11.5508 0.421875 11.4375 0.5 11.2305ZM3.55469 12.5742C3.55469 12.2422 3.41797 12.0195 3.11719 11.8633C2.625 11.6094 2.03125 12 2.03125 12.582C2.03125 13.0742 2.53516 13.4609 2.99219 13.3125C3.34375 13.1992 3.55469 12.9219 3.55469 12.5742ZM8.95703 12.5976C9.05859 12.1875 9.14062 11.8359 9.14062 11.8164C9.14062 11.8008 8.26172 11.7891 7.1875 11.7891C6.11328 11.7891 5.23438 11.8008 5.23438 11.8164C5.23438 11.8359 5.31641 12.1875 5.41797 12.5976L5.60156 13.3516H7.1875H8.77344L8.95703 12.5976ZM12.2617 12.9101C12.4531 12.5156 12.3008 12.0664 11.9062 11.8633C11.7422 11.7773 11.4453 11.7695 11.2812 11.8437C11.1289 11.9101 10.9375 12.1016 10.875 12.2461C10.7969 12.4297 10.8047 12.7422 10.8984 12.918C11.1836 13.4805 11.9883 13.4766 12.2617 12.9101ZM15.9375 17.5781C15.9375 17.1055 15.9883 16.9687 16.2188 16.8281C16.332 16.7617 16.418 16.75 16.875 16.75C17.375 16.75 17.4102 16.7539 17.5508 16.8477C17.7734 17 17.8125 17.1133 17.8125 17.5898V18H16.875H15.9375V17.5781Z"
                                        fill="#17213A" />
                                </svg>
                                Parking
                            </div>
                            <div class="property_bottom_icon text-14 font-weight-400 lineheight-18 color-b-blue ">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.245957 12.636C1.39517 11.86 2.66312 11.3087 3.73176 11.1179C4.13886 11.0458 5.05908 11.0712 5.40681 11.1645C6.05563 11.3384 6.74261 11.7794 7.69675 12.6445C8.86293 13.7004 9.23611 13.9803 9.91885 14.3238C10.5761 14.6503 11.1444 14.8157 11.9671 14.9175C12.1706 14.9429 12.3699 14.9726 12.4081 14.9896C12.5226 15.032 12.5608 15.2059 12.5056 15.4603C12.3954 15.9904 11.8695 16.2915 10.6864 16.4908C10.5125 16.5205 10.169 16.5417 9.92309 16.5417C9.27851 16.5374 8.87141 16.4229 8.03601 16.0073C7.23453 15.6087 6.53058 15.3034 6.26766 15.2313C6.11076 15.1931 5.68669 15.1507 5.23719 15.1295C4.47387 15.0914 4.36786 15.1041 4.36786 15.2355C4.36786 15.3628 4.5078 15.3967 5.23719 15.4306C5.65701 15.4518 6.09379 15.4942 6.24646 15.5366C6.39064 15.5705 6.95888 15.8165 7.50593 16.0837C8.58305 16.601 8.99015 16.7494 9.54567 16.8258C10.3259 16.936 11.649 16.6731 12.2427 16.2915C12.582 16.0752 12.7558 15.8038 12.8279 15.3712C12.8534 15.2228 12.8915 15.1889 13.4979 14.7818C14.8422 13.887 16.0975 12.9668 16.9244 12.2671C17.6962 11.6183 18.4468 11.2366 18.8581 11.2833C19.0871 11.3087 19.155 11.3638 19.2101 11.5759C19.4052 12.2883 18.133 14.1754 15.966 16.3975C14.5581 17.8393 12.7049 19.1496 11.3649 19.6543C10.7288 19.896 10.3556 19.9681 9.67713 19.9935C8.43463 20.0402 7.86214 19.8493 6.45001 18.9334C4.71983 17.8096 4.33817 17.6654 3.09566 17.6697C2.73521 17.6697 2.20937 17.6993 1.92949 17.7375C1.38245 17.8096 0.195069 18.0004 0.0763315 18.0386C0.00424064 18.0598 0 17.9156 0 15.4306V12.8014L0.245957 12.636ZM10.8348 9.1036C10.186 9.29018 9.70682 9.71425 9.36333 10.4012C9.16826 10.7871 9.14706 10.7871 8.86294 10.4309C8.6509 10.1553 8.26501 9.90084 7.95968 9.8245C7.63315 9.74393 7.18788 9.76514 6.89952 9.87115C6.60268 9.98141 6.21254 10.3291 6.05563 10.6217C6.05058 10.6311 6.04564 10.6403 6.04084 10.6492C5.95137 10.8148 5.90563 10.8994 5.92456 10.9656C5.94437 11.0348 6.03496 11.0838 6.22031 11.184C6.23151 11.19 6.24305 11.1963 6.25494 11.2027C6.73414 11.4571 7.26422 11.86 7.9936 12.5258C9.07921 13.5139 9.5796 13.8701 10.3302 14.1924C10.7755 14.3874 11.4412 14.5571 11.9968 14.6207C12.4123 14.6673 12.5099 14.7012 12.6668 14.8454L12.7643 14.9302L13.1333 14.6843C14.4479 13.8149 15.8515 12.7887 16.6827 12.0975L17.1873 11.6734L17.1619 11.3596C17.1152 10.7193 16.742 10.2146 16.1696 9.99837C15.3978 9.71001 14.5539 9.87539 14.0916 10.4012C13.9771 10.5285 13.8542 10.6345 13.816 10.6345C13.7694 10.6345 13.6845 10.5157 13.5616 10.2825C13.252 9.68032 12.7728 9.26898 12.1749 9.09087C11.8611 8.99758 11.1741 9.00606 10.8348 9.1036ZM11.895 5.49477C12.5184 4.58304 13.0442 3.96814 13.7142 3.37445C13.9475 3.1709 14.1425 3.00976 14.1552 3.01824C14.1637 3.03096 13.9814 3.29388 13.7481 3.60345C12.9043 4.73146 12.3954 5.60503 12.1197 6.39803L12.1162 6.4085C11.984 6.7968 11.9797 6.80936 11.9671 7.75927L11.9501 8.7219H11.5812H11.208L11.1826 7.9289C11.1529 7.0214 11.0893 6.66943 10.8815 6.24536C10.5846 5.64319 9.88916 4.82899 9.06224 4.11657C8.82476 3.91302 8.62121 3.73915 8.61273 3.73491C8.60425 3.72643 8.60425 3.70946 8.61697 3.69674C8.65514 3.66282 9.44814 4.14625 9.89764 4.48126C10.415 4.86292 10.873 5.2997 11.1783 5.69832C11.331 5.89763 11.4455 6.01213 11.4879 6.00365C11.526 5.99517 11.7084 5.76617 11.895 5.49477ZM5.23294 1.11422C5.0718 1.14391 4.8216 1.19903 4.68166 1.24144C4.38906 1.32625 3.92683 1.55949 3.97347 1.60189C3.99044 1.61886 4.10493 1.6655 4.21943 1.70791C4.56292 1.83089 4.90641 2.05988 5.2075 2.36521C5.48314 2.64085 5.68245 2.93769 6.30158 3.99785C6.82318 4.88839 7.41263 5.46087 7.98936 5.63898C8.38798 5.75772 9.02407 5.73227 9.52871 5.57113C9.71954 5.50752 9.88916 5.43967 9.90612 5.41423C9.97397 5.29973 8.55336 4.01482 7.58226 3.31087C7.30661 3.11156 7.08186 2.92497 7.08186 2.89529C7.08186 2.8656 7.11155 2.81896 7.14971 2.78503C7.20484 2.74263 7.25573 2.74687 7.45504 2.81472C7.87486 2.95466 9.0792 3.57379 9.58384 3.90456C9.851 4.08267 10.0757 4.21837 10.0842 4.20989C10.1139 4.1802 9.78739 3.27271 9.64745 3.00554C8.95622 1.69943 7.75188 1.04213 6.06835 1.05485C5.77574 1.05485 5.39833 1.08454 5.23294 1.11422ZM16.8989 0.295742C16.1568 0.808857 15.6734 1.02089 14.6048 1.28381C13.2562 1.61458 12.8279 1.77572 12.3487 2.1277C11.649 2.64505 11.2928 3.56951 11.5133 4.2989C11.5769 4.49821 11.8399 4.90955 11.9077 4.90955C11.9247 4.90955 12.0985 4.71024 12.2936 4.46429C12.9806 3.5992 13.939 2.72563 14.7744 2.20403C15.0797 2.00896 15.1476 1.98351 15.2196 2.02592C15.2705 2.05136 15.3087 2.09801 15.3087 2.1277C15.3087 2.15738 15.1476 2.36517 14.9482 2.58992C14.2655 3.36596 13.604 4.23953 13.1714 4.93924C12.9424 5.30393 12.9382 5.31241 13.0315 5.35058C13.2096 5.42267 13.9559 5.40571 14.1934 5.3209C15.2027 4.96892 16.1738 3.61616 16.9413 1.49584C17.1195 0.995447 17.3866 0.130356 17.3866 0.0370617C17.3866 -0.0392704 17.3442 -0.0180664 16.8989 0.295742Z"
                                        fill="#17213A" />
                                </svg>
                                Near Green Zone
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="property_icon d-flex gap-3 flex-column">
                            <div class="property_top-icon text-14 font-weight-400 lineheight-18 color-b-blue ">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.73269 7.56602C7.18932 6.64363 8.07061 5.93585 9.08433 5.67101C9.56836 5.54772 10.404 5.54772 10.8926 5.67101C11.92 5.92672 12.7922 6.62536 13.2625 7.56602C13.5502 8.13681 13.6506 8.57061 13.6506 9.23272C13.6506 10.2236 13.3173 11.0866 12.6734 11.7533L12.468 11.9679L12.7693 12.1323C13.847 12.7259 14.7922 13.8173 15.2488 14.9908C15.4954 15.6301 15.5776 16.105 15.6004 17.073L15.6278 18H14.8698H14.1164L14.0936 17.1644C14.0662 16.0502 13.9292 15.5433 13.4406 14.7899C11.8287 12.3013 8.16194 12.3058 6.55004 14.799C6.06601 15.5479 5.88793 16.2146 5.88793 17.3014V18H5.12992H4.36735L4.39475 17.073C4.42215 16.105 4.46781 15.8082 4.68242 15.178C5.11622 13.9177 6.08428 12.7625 7.22585 12.1323L7.52723 11.9634L7.36284 11.799C6.68703 11.1095 6.34456 10.2419 6.34456 9.23272C6.34456 8.57517 6.44501 8.14137 6.73269 7.56602ZM11.4405 7.64365C11.1666 7.38794 10.9519 7.26464 10.5912 7.16419C9.76928 6.93587 9.02497 7.14136 8.44048 7.7578C8.02952 8.18704 7.85143 8.62997 7.85143 9.23272C7.85143 9.8172 8.02952 10.2738 8.40852 10.6757C8.85145 11.146 9.37657 11.3834 9.98389 11.388C11.1803 11.3926 12.1437 10.4337 12.1437 9.23272C12.1437 8.60257 11.92 8.09571 11.4405 7.64365ZM0.207456 6.25549C0.280517 6.19157 7.51353 1.98601 9.19849 1.03165C9.8606 0.652651 10.0341 0.616121 10.372 0.78964C10.7328 0.972292 19.564 6.09567 19.7192 6.20983C20.0069 6.42445 20.0891 6.89021 19.8927 7.18245C19.7147 7.4473 19.5092 7.55232 19.2215 7.53406C18.9841 7.51579 18.7055 7.36054 14.5 4.9267C12.0433 3.50202 10.0159 2.33761 9.99759 2.33761C9.97932 2.33761 7.95189 3.50202 5.49522 4.9267C1.28967 7.36054 1.01112 7.51579 0.773677 7.53406C0.486 7.55232 0.280517 7.4473 0.102432 7.18245C-0.0710876 6.92674 -0.0162921 6.45641 0.207456 6.25549Z"
                                        fill="#17213A" />
                                </svg>
                                Balcony
                            </div>
                            <div class="property_bottom_icon text-14 font-weight-400 lineheight-18 color-b-blue ">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.38766 0.125C9.28609 0.222656 8.61031 1.55078 6.49703 5.80078C4.98141 8.85156 3.73141 11.4141 3.71969 11.4922C3.68844 11.6836 3.82125 11.9609 3.99312 12.0703C4.11812 12.1445 4.18062 12.1484 6.18062 12.1484C7.45016 12.1484 8.23531 12.1641 8.23531 12.1836C8.23531 12.207 8.05172 13.8633 7.82516 15.8711C7.80376 16.0609 7.78338 16.2415 7.764 16.4131C7.43148 19.3586 7.39277 19.7015 7.54259 19.839C7.56232 19.8572 7.58533 19.8717 7.61138 19.8882C7.62222 19.895 7.63359 19.9022 7.64547 19.9102C7.74312 19.9766 7.83297 20 7.98922 20C8.17281 20 8.21578 19.9844 8.32906 19.8711C8.43062 19.7773 9.165 18.3672 11.1728 14.418C12.6611 11.4883 13.9111 9.01172 13.9502 8.91406C14.0439 8.67578 14.0087 8.5 13.8408 8.33203L13.7119 8.20312H11.5673H9.42281L9.86422 4.40234C10.1337 2.07812 10.2939 0.542969 10.2783 0.449219C10.2627 0.339844 10.2119 0.25 10.1103 0.148438C9.97359 0.0117188 9.94625 0 9.74312 0C9.54781 0 9.50875 0.015625 9.38766 0.125ZM7.12203 1.30469C6.02437 1.53126 5.06734 1.90626 4.17672 2.46876C1.95406 3.86719 0.481405 6.10157 0.0868742 8.67188C0.000936718 9.21485 -0.026407 10.3867 0.0282805 10.8906C0.387655 14.0391 2.21969 16.6484 5.01266 17.9922C5.56344 18.2578 6.43453 18.5742 6.4775 18.5273C6.49312 18.5078 6.55172 18.0391 6.61031 17.4805C6.66891 16.9219 6.71969 16.4414 6.72359 16.4141C6.7275 16.3828 6.63375 16.3242 6.49312 16.2695C3.73141 15.2227 1.94625 12.4258 2.18062 9.50391C2.37594 7.10547 3.79391 5.02344 5.95016 3.97657L6.36812 3.77344L6.98922 2.53126C7.32906 1.84766 7.61031 1.27344 7.61031 1.25001C7.61031 1.24734 7.61041 1.24481 7.61051 1.24243C7.61078 1.23558 7.61101 1.22999 7.60861 1.22595C7.59796 1.20796 7.53552 1.22066 7.19534 1.2898C7.17221 1.2945 7.1478 1.29946 7.12203 1.30469ZM10.997 3.54687C11.0244 3.24608 11.208 1.60546 11.2236 1.53515C11.2431 1.44921 11.247 1.44921 11.4502 1.5078C11.5595 1.54296 11.8564 1.64843 12.1025 1.74608C15.0673 2.91796 17.1337 5.5078 17.6377 8.69139C17.7236 9.23046 17.7353 10.6133 17.6533 11.1914C17.4228 12.8789 16.6923 14.4961 15.5712 15.8008C14.4697 17.0859 12.9658 18.0547 11.3486 18.5195C10.8955 18.6484 10.1533 18.8047 10.122 18.7734C10.1103 18.7617 10.3916 18.1875 10.7431 17.4922L11.3837 16.2305L11.8252 16.0078C15.7978 13.9766 16.7978 8.88671 13.8681 5.5664C13.1884 4.79296 12.3408 4.19921 11.3408 3.78124C11.0361 3.65624 10.9892 3.62499 10.997 3.54687Z"
                                        fill="#17213A" />
                                </svg>
                                Electricity
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="property_icon d-flex gap-3 flex-column">
                            <div class="property_top-icon text-14 font-weight-400 lineheight-18 color-b-blue ">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.37891 13.2486C8.64844 12.6783 9.23828 12.2525 9.83203 12.1939C10.8086 12.0962 11.6406 12.608 11.9219 13.4869C12.0352 13.8267 12.0313 14.3853 11.918 14.7017C11.5547 15.7134 10.4727 16.2408 9.46094 15.8931C8.39063 15.5259 7.88281 14.2876 8.37891 13.2486ZM9.60937 8.26424C8.40234 8.41659 7.29296 8.95174 6.45703 9.78768C6.28906 9.95565 6.13281 10.1549 6.08984 10.2564C5.7539 11.0103 6.27343 11.8385 7.04687 11.7877C7.36718 11.7642 7.5039 11.69 7.91406 11.3228C8.29296 10.983 8.82812 10.6822 9.27734 10.5611C9.6289 10.4674 10.3867 10.4439 10.75 10.5221C11.3867 10.651 11.9805 10.9596 12.4961 11.4244C12.8164 11.7096 13 11.7916 13.3047 11.7955C13.8789 11.7955 14.3086 11.3463 14.3086 10.7408C14.3086 10.3424 14.2031 10.1471 13.75 9.71346C13.0039 8.99471 12.1523 8.54549 11.1523 8.33846C10.8516 8.27596 9.89062 8.22909 9.60937 8.26424ZM6.81641 4.78377C7.50782 4.52596 8.52735 4.30721 9.31641 4.24471C9.40235 4.2369 9.71094 4.22908 10 4.22518C12.4492 4.19393 14.8477 5.15487 16.6172 6.86971C16.9883 7.23299 17.1094 7.45565 17.1094 7.79549C17.1094 8.3658 16.6797 8.78377 16.0898 8.78768C15.7656 8.78768 15.6289 8.71737 15.1523 8.2994C14.0234 7.30721 12.7891 6.70955 11.2891 6.43612C10.6445 6.31893 9.39454 6.31893 8.75001 6.43612C7.22657 6.71346 5.98047 7.33455 4.84766 8.37362C4.50001 8.69783 4.31641 8.78768 4.00391 8.78768C3.2461 8.78768 2.75391 7.99862 3.09376 7.32284C3.24219 7.03377 4.11719 6.26033 4.86329 5.76034C5.31251 5.45955 6.2461 4.9908 6.81641 4.78377ZM0.613281 3.94784C2.82031 1.88925 5.58594 0.619718 8.56641 0.295499C9.23047 0.221281 10.7891 0.221281 11.4648 0.291594C14.4883 0.611906 17.2344 1.88534 19.4336 3.98691C19.8945 4.43222 20 4.61191 20 4.98691C20 5.30722 19.9102 5.51425 19.668 5.73691C19.3672 6.01425 18.9141 6.08066 18.5547 5.89706C18.4805 5.858 18.2148 5.63925 17.9688 5.40878C16.4219 3.96737 14.5039 2.96347 12.4609 2.52206C11.5352 2.32284 11.1484 2.28378 10 2.28378C8.85156 2.28378 8.46484 2.32284 7.53906 2.52206C5.49609 2.96347 3.57813 3.96737 2.03125 5.40878C1.78516 5.63925 1.51953 5.858 1.44531 5.89706C1.08594 6.08066 0.632812 6.01425 0.332031 5.73691C0.0898437 5.51425 0 5.30722 0 4.98691C0 4.60019 0.101562 4.42441 0.613281 3.94784Z"
                                        fill="#17213A" />
                                </svg>
                                Internet
                            </div>
                            <div class="property_bottom_icon text-14 font-weight-400 lineheight-18 color-b-blue ">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.35417 15.6684C5.85502 15.7912 5.45095 16.12 5.22118 16.5835C5.09046 16.8529 5.08649 16.8727 5.08649 17.3362C5.08649 17.7957 5.09046 17.8195 5.22118 18.077C5.38361 18.4018 5.70845 18.7227 6.03725 18.8851C6.25909 18.9921 6.30663 19 6.75032 19C7.21381 19 7.23362 18.996 7.503 18.8653C8.70333 18.2711 8.79841 16.6152 7.66938 15.8863C7.297 15.6446 6.78993 15.5614 6.35417 15.6684ZM0.443628 -0.332067C0.146517 -0.18153 0.0197491 0.0205059 0.00390318 0.377039C-0.00798129 0.614729 0.00390318 0.686037 0.0870944 0.836573C0.138594 0.93561 0.257438 1.06634 0.348553 1.13368L0.518897 1.25253L1.49342 1.27234C2.57491 1.2961 2.6581 1.31591 2.80864 1.55756C2.84825 1.62491 3.52963 3.62546 4.31796 6.00235L5.75598 10.3243V10.6809C5.75202 10.9661 5.72033 11.1681 5.5896 11.6871C5.35191 12.618 5.36776 13.0102 5.67279 13.6322C5.84314 13.9808 6.26702 14.4007 6.61959 14.575C6.6395 14.5847 6.65831 14.5941 6.67639 14.6031C6.71944 14.6245 6.75833 14.6438 6.79805 14.6613C7.1689 14.8243 7.6118 14.8234 12.1903 14.8138C12.3624 14.8135 12.5403 14.8131 12.7242 14.8127C13.1189 14.8119 13.4846 14.8112 13.8237 14.8106C17.8059 14.8034 18.1096 14.8029 18.2677 14.6509C18.2808 14.6384 18.2929 14.6248 18.3059 14.6101C18.3198 14.5945 18.3349 14.5775 18.3535 14.5592C18.5357 14.3769 18.5912 14.2304 18.5952 13.9491C18.5952 13.6124 18.4605 13.3668 18.1871 13.2083L18.0009 13.0974L12.7124 13.0776C9.80463 13.0657 7.39208 13.0419 7.35643 13.0261C7.2772 12.9865 7.19004 12.8557 7.15835 12.7329C7.13062 12.622 7.33266 11.8059 7.41981 11.6712C7.45546 11.6158 7.53073 11.5405 7.59015 11.5049C7.68919 11.4375 7.99423 11.4336 12.4549 11.4137C12.8504 11.412 13.2143 11.4105 13.549 11.4091C17.0108 11.3951 17.3563 11.3937 17.4972 11.2232C17.5128 11.2043 17.5259 11.1833 17.5405 11.16C17.5533 11.1395 17.5672 11.1172 17.585 11.0929C17.6682 10.974 18.0009 10.0272 18.8487 7.47603L18.901 7.31913C19.9526 4.16463 20.0682 3.81764 19.9735 3.54333C19.9618 3.50942 19.9468 3.47663 19.9301 3.43977L19.9262 3.43135C19.851 3.26497 19.6648 3.07878 19.4905 3.00351C19.4152 2.96785 17.5375 2.95201 12.3479 2.93616L5.30834 2.91635L5.16968 2.78166C5.04292 2.65886 4.98746 2.51624 4.58735 1.31987C4.10801 -0.114185 4.06047 -0.213223 3.73959 -0.355837C3.59697 -0.42318 3.44644 -0.431105 2.11142 -0.431105H0.645664L0.443628 -0.332067ZM15.3626 16.5835C15.5924 16.12 15.9964 15.7912 16.4956 15.6684C16.9313 15.5614 17.4384 15.6446 17.8108 15.8863C18.9398 16.6152 18.8447 18.2711 17.6444 18.8653C17.375 18.996 17.3552 19 16.8917 19C16.448 19 16.4005 18.9921 16.1787 18.8851C15.8499 18.7227 15.525 18.4018 15.3626 18.077C15.2319 17.8195 15.2279 17.7957 15.2279 17.3362C15.2279 16.8727 15.2319 16.8529 15.3626 16.5835Z"
                                        fill="#17213A" />
                                </svg>
                                Shop
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="property_icon d-flex gap-3 flex-column">
                            <div class="property_top-icon text-14 font-weight-400 lineheight-18 color-b-blue ">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.438596 16.4342C0.438596 15.8904 0.495614 15.7368 0.754386 15.5789C0.894737 15.4956 0.982456 15.4912 3.64035 15.4912C6.29825 15.4912 6.38597 15.4956 6.52632 15.5789C6.78509 15.7368 6.84211 15.8904 6.84211 16.4342V16.9211L6.9693 16.9956C7.03947 17.0351 7.14035 17.1579 7.1886 17.2588C7.26754 17.4254 7.2807 17.5307 7.2807 18.1096C7.2807 18.7105 7.27193 18.7807 7.1886 18.886L7.10088 19H3.64912H0.201754L0.100877 18.9035C0.00438596 18.8114 0 18.7851 0 18.1096C0 17.3202 0.0394737 17.1754 0.289474 17.0132L0.438596 16.9167V16.4342ZM8.25438 11.4386C8.49123 10.9649 8.63158 10.8202 8.92544 10.7544C9 10.7368 9.11842 10.7325 9.1886 10.7456C9.35088 10.7719 14.5877 13.4868 14.7325 13.6184C14.864 13.7412 14.9561 13.9561 14.9561 14.1491C14.9561 14.2456 14.8816 14.4474 14.7588 14.6886L14.5614 15.0746L14.6491 15.2807C14.7982 15.6228 14.7719 15.7281 14.3991 16.4254C14.1272 16.9342 14.0395 17.0263 13.8421 17.0263C13.7412 17.0263 12.7193 16.5175 10.3246 15.2719C8.4693 14.307 6.92544 13.4825 6.89912 13.443C6.78947 13.2982 6.8421 13.1053 7.14035 12.5307C7.46491 11.9079 7.57895 11.7895 7.92105 11.7368C8.10965 11.7105 8.12281 11.6974 8.25438 11.4386ZM11.2149 8.51754C10.5175 9.46053 9.94298 10.2588 9.92982 10.2851C9.91228 10.3333 14.5351 12.7719 14.6404 12.7719C14.6754 12.7719 16.0526 8.77632 16.0526 8.66667C16.0526 8.62281 12.6754 6.84211 12.5439 6.81579C12.5 6.80702 12.0482 7.38597 11.2149 8.51754ZM1.02632 8.3421C1.26754 7.38158 2.01754 6.61403 2.92983 6.39474C3.23684 6.31579 3.7807 6.30702 4.08772 6.37281C5.6886 6.71052 6.63158 8.54386 5.92983 9.9693L5.76754 10.3026L5.85526 10.4518C5.91667 10.557 5.94298 10.7018 5.95614 11C5.97807 11.4781 5.92983 11.6491 5.7193 11.8553L5.56579 12.0044L3.67105 12.0175C1.84211 12.0263 1.77193 12.0263 1.63158 11.9386C1.37281 11.7807 1.31579 11.6272 1.31579 11.1053C1.32018 10.8333 1.34211 10.5921 1.37719 10.5132C1.42544 10.3947 1.42105 10.364 1.30702 10.1842C1 9.68859 0.881579 8.91667 1.02632 8.3421ZM13.0044 4.53947C12.864 4.61842 12.7939 4.71053 12.636 5.00877C12.4649 5.34211 12.4474 5.4079 12.4649 5.62719C12.4657 5.63931 12.4665 5.65107 12.4672 5.66249L12.4673 5.66331C12.4726 5.74454 12.4768 5.80903 12.4961 5.86858C12.5707 6.09797 12.8707 6.25407 14.326 7.01152C14.3973 7.04861 14.4713 7.08714 14.5482 7.12719C15.8509 7.80702 16.5395 8.12281 16.7193 8.12281C16.9737 8.12281 17.193 7.95614 17.3772 7.63158C17.6009 7.23246 17.6579 7.01316 17.5921 6.77631C17.5044 6.45614 17.3596 6.36842 14.75 5.02632C13.7412 4.50877 13.5746 4.4386 13.3904 4.4386C13.2544 4.4386 13.1184 4.47368 13.0044 4.53947ZM14.8509 0.368422C14.7105 0.504385 14.6667 0.622807 14.2281 2.11403C14.0524 2.71236 13.895 3.24603 13.8092 3.5368L13.8088 3.53832L13.8084 3.53949L13.8078 3.54173L13.8066 3.5456L13.8042 3.55379L13.8014 3.56341C13.7654 3.68515 13.7439 3.75833 13.7412 3.76754C13.7281 3.79825 13.9868 3.95175 14.3947 4.1579C14.7632 4.3421 15.6842 4.81579 16.4342 5.21053C17.1886 5.60526 17.8158 5.92982 17.8246 5.92982C17.8509 5.92982 19.8947 3.32456 19.9518 3.21491C19.9781 3.16667 20 3.04825 20 2.95175C20 2.71053 19.8509 2.54824 19.4211 2.33333C18.864 2.05702 18.6228 2.10526 18.3772 2.53947C18.3254 2.63151 18.2774 2.71411 18.2493 2.76255L18.2491 2.76279L18.2491 2.76283L18.2489 2.76328C18.2343 2.78829 18.2252 2.80403 18.2237 2.80702C18.2061 2.82895 17.9386 2.6886 17.9386 2.65789C17.9386 2.64912 17.9868 2.53947 18.0482 2.42105C18.1886 2.14474 18.193 1.86403 18.0658 1.70175C18.0132 1.63597 17.8158 1.50439 17.6272 1.41228C17.0702 1.13158 16.8202 1.18421 16.5833 1.62719L16.443 1.89035L16.2939 1.82018C16.2105 1.7807 16.1404 1.72807 16.1404 1.71053C16.1404 1.6886 16.1886 1.57456 16.25 1.45614C16.4868 0.986841 16.364 0.736843 15.7412 0.421053C15.25 0.175438 15.0658 0.166666 14.8509 0.368422ZM1.56579 13.7368C1.45175 14.3026 1.35965 14.7807 1.35965 14.7982C1.35965 14.8202 2.38597 14.8333 3.64474 14.8333C5.79825 14.8333 5.92544 14.8289 5.90351 14.7544C5.89391 14.7256 5.84466 14.4775 5.77957 14.1497C5.75541 14.028 5.72906 13.8953 5.70175 13.7588L5.69643 13.7319C5.59781 13.2345 5.51293 12.8064 5.5 12.7719C5.48684 12.7105 5.25877 12.7018 3.62719 12.7061H1.77193L1.56579 13.7368Z"
                                        fill="#17213A" />
                                </svg>
                                Games Room
                            </div>
                            <div class="property_bottom_icon text-14 font-weight-400 lineheight-18 color-b-blue ">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="12" viewBox="0 0 20 12"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.43359 0.104552C4.28906 0.167052 4.11328 0.366271 4.07031 0.510801C4.05469 0.569395 4.04297 3.0694 4.04297 6.06549C4.04297 6.50175 4.04285 6.90411 4.04274 7.27529V7.27664V7.27789V7.27906V7.28014C4.04153 11.3184 4.04142 11.6609 4.2086 11.7953C4.22409 11.8077 4.24102 11.8184 4.25951 11.8301C4.27924 11.8425 4.30076 11.856 4.32422 11.8741C4.46094 11.9796 4.48828 11.9835 4.97656 11.9952C5.45312 12.0069 5.5 12.003 5.66016 11.9171C5.78125 11.8506 5.86328 11.7686 5.92578 11.6514L6.01562 11.4835V6.02643V0.569395L5.92578 0.401427C5.77734 0.120176 5.59766 0.0498648 5.02344 0.0498648C4.71875 0.053771 4.50781 0.0733023 4.43359 0.104552ZM14.3398 0.135801C14.2188 0.202209 14.1367 0.28424 14.0742 0.401427L13.9844 0.569395V6.02643V11.4835L14.0742 11.6514C14.1367 11.7686 14.2188 11.8506 14.3398 11.9171C14.5 12.003 14.5469 12.0069 15.0234 11.9952C15.5117 11.9835 15.5391 11.9796 15.6758 11.8741C15.6989 11.8563 15.7202 11.8427 15.7397 11.8303L15.7398 11.8303L15.7398 11.8302L15.7398 11.8302C15.7587 11.8182 15.776 11.8072 15.7918 11.7944C15.9594 11.6582 15.96 11.3163 15.9667 7.34389L15.9667 7.34111C15.9673 6.99052 15.9679 6.61167 15.9688 6.20221C15.9766 3.28033 15.9688 0.799864 15.957 0.686583C15.9297 0.463927 15.8242 0.280334 15.6523 0.151427C15.5547 0.0811138 15.4766 0.069396 15.0273 0.0576763C14.5469 0.0459585 14.5 0.0498648 14.3398 0.135801ZM1.77344 2.76861C1.83984 2.60455 2.01562 2.44049 2.16797 2.39752C2.23438 2.37799 2.5625 2.35846 2.90234 2.35846L3.51562 2.35455V6.03033V9.70611L2.83984 9.69049C2.19141 9.67877 2.15625 9.67486 2.01953 9.58111C1.9375 9.52643 1.83984 9.41314 1.79688 9.3233C1.72266 9.17096 1.71875 9.07721 1.71875 6.03424C1.71875 3.4483 1.72656 2.87799 1.77344 2.76861ZM16.4844 6.02252V9.6983H17.082C17.4062 9.6983 17.7383 9.67877 17.8125 9.65924C17.9727 9.61627 18.1797 9.42096 18.2383 9.2569C18.2695 9.18268 18.2812 8.12799 18.2812 6.01861C18.2812 2.97565 18.2773 2.8819 18.2031 2.72955C18.1602 2.63971 18.0625 2.52643 17.9805 2.47174C17.8438 2.37799 17.8086 2.37408 17.1602 2.36236L16.4844 2.35065V6.02252ZM0 7.15924V6.02643V4.89361H0.585938H1.17188V6.02643V7.15924H0.585938H0ZM6.5625 6.02643V7.15924H10H13.4375V6.02643V4.89361H10H6.5625V6.02643ZM18.8281 7.15924V6.02643V4.89361H19.4141H20V6.02643V7.15924H19.4141H18.8281Z"
                                        fill="#17213A" />
                                </svg>
                                Gym
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <button href="#" class="form_property_button form-address border-r-8 b-color-Gradient text-12 line-height-15 font-weight-400 color-white">Add New Property</button>
        </div>
    </div>


     <!-- bootstrap-js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<script>
    const selectedAll = document.querySelectorAll(".wrapper-dropdown");

selectedAll.forEach((selected) => {
  const optionsContainer = selected.children[2];
  const optionsList = selected.querySelectorAll("div.wrapper-dropdown li");

  selected.addEventListener("click", () => {
    let arrow = selected.children[1];

    if (selected.classList.contains("active")) {
      handleDropdown(selected, arrow, false);
    } else {
      let currentActive = document.querySelector(".wrapper-dropdown.active");

      if (currentActive) {
        let anotherArrow = currentActive.children[1];
        handleDropdown(currentActive, anotherArrow, false);
      }

      handleDropdown(selected, arrow, true);
    }
  });

  // update the display of the dropdown
  for (let o of optionsList) {
    o.addEventListener("click", () => {
      selected.querySelector(".selected-display").innerHTML = o.innerHTML;
    });
  }
});

// check if anything else ofther than the dropdown is clicked
window.addEventListener("click", function (e) {
  if (e.target.closest(".wrapper-dropdown") === null) {
    closeAllDropdowns();
  }
});

// close all the dropdowns
function closeAllDropdowns() {
  const selectedAll = document.querySelectorAll(".wrapper-dropdown");
  selectedAll.forEach((selected) => {
    const optionsContainer = selected.children[2];
    let arrow = selected.children[1];

    handleDropdown(selected, arrow, false);
  });
}

// open all the dropdowns
function handleDropdown(dropdown, arrow, open) {
  if (open) {
    arrow.classList.add("rotated");
    dropdown.classList.add("active");
  } else {
    arrow.classList.remove("rotated");
    dropdown.classList.remove("active");
  }
}

</script>

</body>
</html>