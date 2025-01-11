    @extends('layouts.app')
    @section('content')

    @section('title')
        {{ trans('messages.properties.View_Property') }} Inmoconnect
    @endsection
    <style>
        .select_commission_main {
            background-color: #3831921A;
        }

        .select_commission_logo {
            height: 30px;
            border-right: 2px solid var(--b_primary);
        }

        .select_commission_logo img {
            height: 100%;
            object-fit: contain;
        }

        .select_commission_breadcrumb {
            background-color: #e3e2f478;
        }

        .signature_button {
            color: #17213A4D;
            border: 1px solid #17213A4D;
        }

        .select_commission_main span {
            display: block;
            height: 6px;
            width: 100%;
            background-color: #383192;
            border-radius: 0px 0px 30px 30px;
        }

        .sign_img {
            height: 64px;
            border: 1px solid #d3d3d3;
            border-radius: 10px;
        }

        .checkbox_sign {
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%);
        }

        .sign_degital {
            width: 100%;
            height: 200px;
            margin-bottom: 20px;
        }

        .reject_reason {
            background-color: #e1e0ef;
            border-radius: 10px;
        }
    </style>



    <button type="button"
        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white mt-60"
        data-bs-toggle="modal" data-bs-target="#agreement">Add Document</button>

    <div class="modal fade" id="agreement" tabindex="-1" role="dialog" aria-labelledby="agreementLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_one" role="document">
            <div class="modal-content modal-content-file">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="dataFilterModalLabel"></h5>
                    <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>
                </div>
                <div class="modal-body modal-header_file">
                    <div class="modal_body_text">
                        <div class="justify-content-between">
                            <div class="modal-body-card-left-progress d-flex align-items-center gap-4">
                                <div class="min-vh-100 bg-white">
                                    <div class="select_commission">
                                        <div class="select_commission_main h-85">
                                            <span></span>
                                            <div class="row d-flex justify-content-between h-100 align-items-center">
                                                <div
                                                    class="col-md-6 select_commission_logo h-85 d-flex align-items-center ps-4  justify-content-center justify-content-md-between">
                                                    <img src="{{ asset('img/login-logo.png') }}"alt="image"
                                                        class="">
                                                </div>
                                                <div class="col-md-6 pe-4">
                                                    <h5 class="modal-title text-end text-14 text-md-18 font-weight-700 lineheight-22 color-primary w-100 pb-1 pb-md-auto"
                                                        id="dataFilterModalLabel">Percentage Split Commission Agreement
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="select_commission_scroll px-0 px-md-4">
                                                <div class="row">
                                                    <div
                                                        class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-3 pt-2 d-flex">
                                                        <div class="company-image">
                                                            <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                                alt="Default Image" class="border-r-12" width="80"
                                                                height="80">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center ps-2">
                                                            <p class="text-20 font-weight-700 lineheight-18">
                                                                James Henry
                                                            </p>
                                                            <p class="text-16 font-weight-400 lineheight-18 pt-2">
                                                                Agent
                                                            </p>
                                                            <p
                                                                class="text-14 color-primary font-weight-400 lineheight-18 pt-2">
                                                                Realinmo
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-3 pt-2 d-flex justify-content-end flex-row-reverse flex-md-row">
                                                        <div
                                                            class="d-flex flex-column justify-content-center pe-2 ps-2">
                                                            <p class="text-20 font-weight-700 lineheight-18">
                                                                James Henry
                                                            </p>
                                                            <p class="text-16 font-weight-400 lineheight-18 pt-2">
                                                                Agent
                                                            </p>
                                                            <p
                                                                class="text-14 color-primary font-weight-400 lineheight-18 pt-2">
                                                                Realinmo
                                                            </p>
                                                        </div>
                                                        <div class="company-image">
                                                            <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                                alt="Default Image" class="border-r-12" width="80"
                                                                height="80">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                        <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                            id="dataFilterModalLabel">Primary Agent’s Details</h5>
                                                    </div>
                                                    <div class="col-12 mt-3 pt-2 d-flex">
                                                        <div class="company-image">
                                                            <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                                alt="Default Image" class="border-r-12" width="80"
                                                                height="80">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center ps-2">
                                                            <p
                                                                class="text-20 color-primary font-weight-700 lineheight-18">
                                                                James Henry
                                                            </p>
                                                            <p
                                                                class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Agent
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Email
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                henrytom@gmail.com
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Mobile Number:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                +34 2345678123
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Date of Birth:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                21/07/1994</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Gender
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Male</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Languages Spoken:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Spanish</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Qualification Type:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Engineer</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Professional Certifications:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Cer_henry_realestate
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Government ID:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Upload_Goverment_Approved_ID.Pdf</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Address
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Bellavista 79, Santibáñez De Vidriales, Barcelona,
                                                                Spain, 49610
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                A Message to Collaborator Agents:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Lorem ipsum dolor sit amet consectetur. Sed malesuada
                                                                sem ullamcorper tincidunt
                                                                netus dignissim consequat aliquet libero. Diam a libero
                                                                dui at vitae. At
                                                                pulvinar eros semper lectus vestibulum. Lacus molestie
                                                                phasellus urna ut id.
                                                                Lorem ipsum dolor sit amet consectetur. Sed malesuada
                                                                sem ullamcorper tincidunt
                                                                netus dignissim consequat aliquet libero. Diam a libero
                                                                dui at vitae. At
                                                                pulvinar eros semper lectus vestibulum. Lacus molestie
                                                                phasellus urna ut id.
                                                                Lorem ipsum dolor sit amet consectetur. Sed malesuada
                                                                sem ullamcorper tincidunt
                                                                netus dignissim consequat aliquet libero. Diam a libero
                                                                dui at vitae. At
                                                                pulvinar eros semper lectus vestibulum. Lacus molestie
                                                                phasellus urna ut id.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 mt-3 pt-2 d-flex">
                                                        <div class="company-image">
                                                            <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                                alt="Default Image" class="border-r-12"
                                                                width="80" height="80">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center ps-2">
                                                            <p
                                                                class="text-20 color-primary font-weight-700 lineheight-18">
                                                                James Henry
                                                            </p>
                                                            <p
                                                                class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Agent
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                        <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                            id="dataFilterModalLabel">Primary Agent’s Company Details
                                                        </h5>
                                                    </div>
                                                    <div class="col-12 mt-3 pt-2 d-flex">
                                                        <div class="company-image">
                                                            <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                                alt="Default Image" class="border-r-12"
                                                                width="80" height="80">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center ps-2">
                                                            <p
                                                                class="text-20 color-primary font-weight-700 lineheight-18">
                                                                Realinnmo
                                                            </p>
                                                            <p
                                                                class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Agent
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Email
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                realinmo@gmail.com
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Company Mobile Number:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                +31 2345678912
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Tax Number:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                123456789123456789
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Company Website:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                realinmo.com</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Primary Service Area:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Spanish</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Professional Title/Role:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Project Manager</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Number of Current Customers:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                500+ Customers
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Numbers of sub-agents:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                11-50 Sub-Agent</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Property Types Specialized In:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Apartment, Apartment Duplex</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Properties in Portfolio:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                101-1000 Properties </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Years of Experience in Real Estate:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                0-10 Years</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Average Number of Properties Managed/Listed:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                3000+ Properties
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                        <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                            id="dataFilterModalLabel">Secondary Agent’s Details</h5>
                                                    </div>
                                                    <div class="col-12 mt-3 pt-2 d-flex">
                                                        <div class="company-image">
                                                            <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                                alt="Default Image" class="border-r-12"
                                                                width="80" height="80">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center ps-2">
                                                            <p
                                                                class="text-20 color-primary font-weight-700 lineheight-18">
                                                                Ivana Tinkle
                                                            </p>
                                                            <p
                                                                class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Agent
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Email
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                ivanatinkle@gmail.com
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Company Mobile Number:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                +56 679 890 123
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Date of Birth:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                24/03/1994</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Gender:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Female</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Languages Spoken:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Spanish, English
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Qualification Type:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Real Estate Broker
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Professional Certifications:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Ivana_Broker_realestate
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Government ID:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Upload_Goverment_Approved_ID.Pdf</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Property Types Specialized In:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Apartment, Apartment Duplex</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Address:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Bellavista 79, Santibáñez De Vidriales, Málaga, Spain,
                                                                49610
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                        <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                            id="dataFilterModalLabel">Secondary Agent’s Details</h5>
                                                    </div>
                                                    <div class="col-12 mt-3 pt-2 d-flex">
                                                        <div class="company-image">
                                                            <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                                alt="Default Image" class="border-r-12"
                                                                width="80" height="80">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center ps-2">
                                                            <p
                                                                class="text-20 color-primary font-weight-700 lineheight-18">
                                                                Email:
                                                            </p>
                                                            <p
                                                                class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                ogdenvalley@gmail.com
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Tax Number:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                123456789123456789
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Company Mobile Number:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                +56 2345678912
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Tax Number:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                123456789123456789
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Company Website:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                realinmo.com
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Primary Service Area:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Spanish</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Professional Title/Role:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Property Manager</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Number of Current Customers:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                0-10 Years </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Numbers of sub-agents:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                11-50 Sub-Agent</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Property Types Specialized In:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Apartment, Apartment Duplex
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Properties in Portfolio:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                101-1000 Properties </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Years of Experience in Real Estate:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                0-10 Years</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Average Number of Properties Managed/Listed:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                3000+ Properties
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                        <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                            id="dataFilterModalLabel">Property Details</h5>
                                                    </div>
                                                    <div class="col-12 mt-3 pt-2 d-flex">
                                                        <div class="company-image">
                                                            <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                                alt="Default Image" class="border-r-12"
                                                                width="80" height="80">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center ps-2">
                                                            <p
                                                                class="text-20 color-primary font-weight-700 lineheight-18">
                                                                Awesome Interior Apartment
                                                            </p>
                                                            <p
                                                                class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Apartment
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Property Listed As:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                For Sale
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Property Price:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                €458,000.00
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Property Type:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Apartment</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Property Subtype:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Ground Floor
                                                                Apartment</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Total Size:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                4556 m2</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Bedroom:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                3</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Bathroom:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                3
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Property Status/Completion:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Completed Construction </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Commission:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                1%
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Listing Agent:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                50%
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Listing Agent:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Є2,290.00
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2"></div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Selling Agent:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                50%
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Selling Agent:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Є2,290.00
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Address:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                C09t5, Santibáñez De Vidriales, Madrid, Málaga, Spain,
                                                                49610
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Description:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                This 3-bed with a loft, 2-bath home in the gated
                                                                community of The Hideout has it
                                                                all. From the open floor plan to the abundance of light
                                                                from the windows, this home
                                                                is perfect for entertaining. The living room and dining
                                                                room have vaulted ceilings
                                                                and a beautiful fireplace. You will love spending time
                                                                on the deck taking in the
                                                                beautiful views. In the kitchen, you'll find stainless
                                                                steel appliances and a tile
                                                                backsplash, as well as a breakfast bar.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                        <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                            id="dataFilterModalLabel">Proposed commission terms</h5>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Templet Type:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Percentage Split
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Percentage:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                5%
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Commission:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                €22,900.00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Agreement Start Date:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                30/07/2024</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Agreement End Date:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                15/08/2024</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2 pb-4">
                                                        <div>
                                                            <p
                                                                class="text-14 color-primary font-weight-700 lineheight-18">
                                                                Additional Terms/Notes:
                                                            </p>
                                                            <p
                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                                Lorem ipsum dolor sit amet consectetur. Quis proin
                                                                egestas adipiscing nisi maecenas
                                                                fusce malesuada urna. Aenean nibh dolor ac mattis ut
                                                                lectus. Pharetra luctus
                                                                scelerisque viverra egestas fermentum fringilla id.
                                                                Massa ornare sociis faucibus
                                                                tellus ut iaculis scelerisque ultricies. Lorem ipsum
                                                                dolor sit amet consectetur.
                                                                Quis proin egestas adipiscing nisi maecenas fusce
                                                                malesuada urna. Aenean nibh dolor
                                                                ac mattis ut lectus. Pharetra luctus scelerisque viverra
                                                                egestas fermentum fringilla
                                                                id. Massa ornare sociis faucibus tellus ut iaculis
                                                                scelerisque ultricies.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row border-top ">
                                                    <div class="col-12 mt-3 ">
                                                        <h5 class="pt-1 text-end text-16 font-weight-700 lineheight-22 color-primary w-100 "
                                                            id="dataFilterModalLabel">Ivana Tinkle Signature:</h5>
                                                    </div>
                                                </div>

                                                <div class="text-end pt-2">
                                                    <button type="button"
                                                        class="w-auto border-r-8 text-16 font-weight-400 p-4 bg-white signature_button"
                                                        data-bs-toggle="modal" data-bs-target="#signature">Add Your
                                                        Signature</button>
                                                </div>


                                                <div class="text-end pt-4">
                                                    <button type="button"
                                                        class="w-auto border-r-8 b-color-Gradient color-white text-16 font-weight-400 line-height-24 small-button gardient-button">
                                                        Send Agreement
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="signature" tabindex="-1" role="dialog" aria-labelledby="signatureLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-width-change_five modal-dialog-centered" role="document">
            <div class="modal-content modal-content-file">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="dataFilterModalLabel">Select Your Signature</h5>
                    <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>
                </div>
                <div class="modal-body modal-header_file">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="sign_img">
                                <div class="d-flex gap-2">
                                    <label class="customcb ms-2"><input type="checkbox" name="userAccessArr[]"
                                            value="1">
                                        <span class="checkmark checkbox_sign"></span>
                                    </label>
                                    <img src="/img/sign.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 common-label-css">
                            <div class="form-group position-relative">
                                <button type="button"
                                    class="border-button small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#newsignature">Add New Signature</button>
                            </div>
                        </div>
                        <div
                            class="col-6 col-sm-6 col-md-6 col-lg-6 common-label-css d-flex justify-content-end align-items-end">
                            <div class="form-group position-relative">
                                <button type="button"
                                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                                    data-bs-toggle="modal" data-bs-target="#agreement">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="newsignature" tabindex="-1" role="dialog" aria-labelledby="newsignatureLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_four" role="document">
            <div class="modal-content modal-content-file">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="dataFilterModalLabel">Draw Digital Signature</h5>
                    <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>
                </div>
                <div class="modal-body modal-header_file">
                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 p-0" style="width: 100%;">
                                        <canvas class="border sign_degital" id="efb-canvas"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 col-sm-6 col-md-6 col-lg-6 common-label-css d-flex justify-content-start align-items-end">
                            <div class="form-group position-relative">
                                <button type="button"
                                    class="border-button small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center">Clear</button>
                            </div>
                        </div>
                        <div
                            class="col-6 col-sm-6 col-md-6 col-lg-6 common-label-css d-flex justify-content-end align-items-end">
                            <div class="form-group position-relative">
                                <button type="button"
                                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                                    data-bs-toggle="modal" data-bs-target="#signature">Add Signature</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- ----------Select Commission Template Start---------- --}}
    {{-- ----------Select Commission Template Button Start---------- --}}
    <div class="col-6 col-sm-6 col-md-6 col-lg-6 common-label-css mt-40">
        <div class="form-group position-relative">
            <button type="button"
                class="border-button small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                data-bs-toggle="modal" data-bs-target="#selectcommission">Select Commission Template</button>
        </div>
    </div>
    {{-- ----------Select Commission Template Button End---------- --}}

    <div class="modal fade" id="selectcommission" tabindex="-1" role="dialog"
        aria-labelledby="selectcommissionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_three justify-content-center"
            role="document">
            <div class="modal-content modal-content-file">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="dataFilterModalLabel">Select Commission Template</h5>
                    <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>
                </div>
                <div class="modal-body modal-header_file">
                    <div class="row selectcommission_row border-primary rounded">
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                            <div>
                                <p class="text-14 color-primary font-weight-700 lineheight-18">
                                    Property Price:
                                </p>
                                <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    €458,000.00
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                            <div>
                                <p class="text-14 color-primary font-weight-700 lineheight-18">
                                    Commission(%):
                                </p>
                                <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    1%
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                            <div>
                                <p class="text-14 color-primary font-weight-700 lineheight-18">
                                    Commission(€):
                                </p>
                                <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    €4,580.00
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                            <div>
                                <p class="text-14 color-primary font-weight-700 lineheight-18">
                                    Listing Agent Commission(%):
                                </p>
                                <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    50%
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                            <div>
                                <p class="text-14 color-primary font-weight-700 lineheight-18">
                                    Listing Agent Commission(€):
                                </p>
                                <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    €2,290.00
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2"></div>
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                            <div>
                                <p class="text-14 color-primary font-weight-700 lineheight-18">
                                    Selling Agent Commission(%):
                                </p>
                                <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    50%
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2 pb-2 mb-3">
                            <div>
                                <p class="text-14 color-primary font-weight-700 lineheight-18">
                                    Selling Agent Commission(€):
                                </p>
                                <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    €2,290.00
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3 common-label-css position-relative">
                            <label for="" class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                Profit-Sharing Terms:</label>
                            <div class="d-flex flex-column flex-sm-row">
                                <label class="customcb mt-1 font-weight-400">Percentage Split
                                    <input type="checkbox" name="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="customcb mt-1 font-weight-400 ms-0 ms-sm-4">Fixed Amount
                                    <input type="checkbox" name="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="customcb mt-1 font-weight-400 ms-0 ms-sm-4">Tiered Commission
                                    <input type="checkbox" name="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 common-label-css position-relative">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'Percentage:',
                                'hasLabel' => true,
                                'label' => 'Percentage' . ':',
                                'id' => 'Percentage:',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'Please enter your name',
                                'value' => '0',
                            ]" />
                            <div class="input-group-append property_per">
                                <span class="input-group-text">%</span>
                            </div>
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                        <div class="col-md-6 common-label-css position-relative">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'Commission:',
                                'hasLabel' => true,
                                'label' => 'Commission' . ':',
                                'id' => 'Commission:',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'Please enter your name',
                                'value' => '',
                            ]" />
                            <div class="input-group-append property_per">
                                <span class="input-group-text">€</span>
                            </div>
                            <div class="invalid-feedback fw-bold"></div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add-event">
                            <x-forms.crm-datepicker :fieldData="[
                                'name' => 'due_date',
                                'hasLabel' => true,
                                'label' => 'Agreement Start Date:*' . ':',
                                'inputId' => 'due_date',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'isInputMask' => true,
                                'startDate' => date('m-d-Y'),
                                'value' => !empty($user->due_date) ? $user->due_date : '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add-event">
                            <x-forms.crm-datepicker :fieldData="[
                                'name' => 'due_date',
                                'hasLabel' => true,
                                'label' => 'Agreement End Date' . ':',
                                'inputId' => 'due_date',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'isInputMask' => true,
                                'startDate' => date('m-d-Y'),
                                'value' => !empty($user->due_date) ? $user->due_date : '',
                            ]" />
                        </div>

                        <div class="col-md-12 common-label-css">
                            <div class="form-group crm-textarea-container position-relative mt-3">
                                <label class="text-14 font-weight-400 lineheight-18 color-b-blue">Additional
                                    Terms/Notes:</label>
                                <textarea
                                    class="crm-textarea form-control form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue"
                                    name="m_primary_agent" style="height: 80px;" id="m_primary_agent" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white mt-4">Confirm</button>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- ----------Select Commission Template End---------- --}}

    {{-- ----------Reason for this action Start---------- --}}
    {{-- ----------Reason for this action Button Start---------- --}}
    <div class="col-6 col-sm-6 col-md-6 col-lg-6 common-label-css mt-40">
        <div class="form-group position-relative">
            <button type="button"
                class="border-button small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                data-bs-toggle="modal" data-bs-target="#rejectaction">Reason for this action</button>
        </div>
    </div>
    {{-- ----------Reason for this action Button End---------- --}}


    <div class="modal fade" id="rejectaction" tabindex="-1" role="dialog" aria-labelledby="reject_actinLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_two justify-content-center"
            role="document">
            <div class="modal-content modal-content-file row d-flex flex-row">
                <div
                    class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 reject_reason p-0 d-flex align-items-center justify-content-center">
                    <img src="/img/reject_reason.png" alt="">
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-3">
                    <div class="modal-header border-0 modal-header_file pb-0 pt-3">
                        <span></span>
                        <div class="text-center">
                            <img src="/img/login-logo.png" alt="image" class="company-login-logo h-auto">
                        </div>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true"> <i
                                    class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file ps-md-2">
                        <div class="common-label-css position-relative">
                            <p class="text-18 color-primary font-weight-700 lineheight-18">
                                Please
                                mention the reason for this action?
                            </p>
                            <label class="customcb mt-3">
                                <span class="font-weight-400">Proposed commission price is to High.</span>
                                <input type="checkbox" name="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcb mt-3 font-weight-400">
                                <span class="font-weight-400">Property is sold out just recently.</span>
                                <input type="checkbox" name="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcb mt-3 font-weight-400">
                                <span class="font-weight-400">Not available for a viewing on selected date.</span>
                                <input type="checkbox" name="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcb mt-3 font-weight-400">
                                <span class="font-weight-400">Have a better offer than proposed one.</span>
                                <input type="checkbox" name="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcb mt-3 font-weight-400">
                                <span class="font-weight-400">Other</span>
                                <input type="checkbox" name="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-12 common-label-css">
                            <div class="form-group crm-textarea-container position-relative mt-3">
                                <textarea
                                    class="crm-textarea form-control form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue"
                                    name="m_primary_agent" style="height: 80px;" id="m_primary_agent" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white mt-4">Reject</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ----------Reason for this action End---------- --}}


    <script>
        // signature pad
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
            const canvas = document.getElementById("efb-canvas");
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
    </script>
@endsection
