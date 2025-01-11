<div class="fixed_sidebar">
    <div class="sidebar_one-content">
        <div class="d-flex align-items-center justify-content-between">
            <div class="text-18 font-weight-700 lineheight-22 color-b-blue">{{ $developer->name }}</div>
            <div class="text-18 font-weight-700 lineheight-22 color-b-blue">
                {{ $developer->companyDetails->company_name }}</div>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-2">
            <div class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ $developer->phone }}
            </div>
            <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                {{ $developer->companyDetails->company_mobile }}</div>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-2">
            <div class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ $developer->email }}
            </div>
            <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                {{ $developer->companyDetails->company_email }}</div>
        </div>
    </div>


    <div class="sidebar_one-content-card-four p-30 pb-0">
        <div class="modal_customer-details mt-0">
            <div class="  modal_margin-detail">
                <div class="cat_box-small-i">
                    <h6 class="text-16 font-weight-700 color-primary text-center">Personal Information</h6>
                </div>
                <div class="d-flex align-items-start justify-content-between pt-20">
                    <img src="http://127.0.0.1:8000/img/default-user.jpg" width="60" height="60" alt="image"
                        class="border-r-8">
                </div>
                <div class="row text-start">
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Name:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->name }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Email:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->email }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Mobile Number:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->phone }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Date of Birth:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->date_of_birth }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Gender:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->gender }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Languages Spoken:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->languages_spoken }}</p>
                        </div>
                    </div>
                    <div class="col-lg-12 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Street Address:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->address }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">City:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->city }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">State/Province:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->state }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Country:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->country }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Zip Code:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->zipcode }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Qualification Type:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->qualification_type }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Field of Study/Major:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->field_of_study }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Professional Certifications:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                @if ($certificateData->isNotEmpty())
                                    @foreach ($certificateData as $certificate)
                                        @if ($certificate->type == 'document')
                                            <span class="me-3"
                                                onclick="window.open('{{ $certificate->certificate ?? '' }}','_blank')"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="{{ $certificate->original_name ?? '' }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.6956 2.15016C10.5481 2.14449 10.3372 2.14293 10.0102 2.14293H7.21737C6.46965 2.14293 5.97162 2.14377 5.58896 2.17587C5.21849 2.20695 5.04896 2.26191 4.94157 2.3181C4.64705 2.47218 4.40761 2.71804 4.25754 3.02044C4.20282 3.13072 4.14929 3.30478 4.11902 3.68518C4.08776 4.07809 4.08695 4.58946 4.08695 5.3572V14.6429C4.08695 15.4106 4.08776 15.922 4.11902 16.3149C4.14929 16.6953 4.20282 16.8694 4.25754 16.9796C4.40761 17.282 4.64705 17.5279 4.94157 17.682C5.04896 17.7382 5.21849 17.7931 5.58896 17.8242C5.97162 17.8563 6.46965 17.8571 7.21737 17.8571H12.7826C13.5303 17.8571 14.0283 17.8563 14.411 17.8242C14.7814 17.7931 14.951 17.7382 15.0584 17.682C15.3529 17.5279 15.5923 17.282 15.7424 16.9796C15.7971 16.8694 15.8506 16.6953 15.8809 16.3149C15.9122 15.922 15.913 15.4106 15.913 14.6429V8.20382C15.913 7.86802 15.9115 7.65155 15.9059 7.50005L13.0993 7.50006C12.8829 7.50009 12.6626 7.50013 12.4743 7.48433C12.2648 7.46675 12.0048 7.4244 11.7401 7.28596C11.3802 7.09764 11.0875 6.79714 10.9041 6.42754C10.7693 6.15583 10.728 5.88888 10.7109 5.67374C10.6955 5.48036 10.6956 5.25414 10.6956 5.03195C10.6956 5.02131 10.6956 5.01068 10.6956 5.00006V2.15016ZM12.1457 0.325056C11.9415 0.231596 11.7291 0.157438 11.5111 0.103697C11.088 -0.000608923 10.6506 -0.000318609 10.108 4.15721e-05C10.0758 6.29019e-05 10.0432 8.44873e-05 10.0102 8.44873e-05L7.17546 8.38486e-05C6.48064 6.78832e-05 5.89679 5.43464e-05 5.41902 0.040136C4.91948 0.0820427 4.44474 0.17305 3.99411 0.408808C3.30692 0.768332 2.74821 1.34201 2.39806 2.04761C2.16845 2.51031 2.07982 2.99777 2.03901 3.51068C1.99997 4.00126 1.99999 4.60075 2 5.31418V14.6859C1.99999 15.3993 1.99997 15.9988 2.03901 16.4894C2.07982 17.0023 2.16845 17.4898 2.39806 17.9525C2.74821 18.6581 3.30692 19.2318 3.99411 19.5913C4.44474 19.827 4.91948 19.918 5.41902 19.9599C5.89679 20 6.48063 20 7.17544 20H12.8245C13.5193 20 14.1031 20 14.5809 19.9599C15.0804 19.918 15.5552 19.827 16.0058 19.5913C16.693 19.2318 17.2517 18.6581 17.6019 17.9525C17.8315 17.4898 17.9201 17.0023 17.9609 16.4894C17.9999 15.9988 17.9999 15.3993 17.9999 14.6859V8.20382C17.9999 8.16996 17.9999 8.13651 18 8.10343C18.0003 7.54629 18.0006 7.09717 17.899 6.66271C17.8467 6.43886 17.7744 6.22077 17.6834 6.01114C17.6763 5.99394 17.6688 5.97697 17.6609 5.96024C17.6018 5.82944 17.5353 5.70206 17.4617 5.57876C17.2344 5.19779 16.9249 4.88042 16.5409 4.48671C16.5182 4.46334 16.4951 4.4397 16.4718 4.41577L13.6994 1.56915C13.6761 1.54521 13.6531 1.52154 13.6303 1.49813C13.2469 1.10392 12.9378 0.786139 12.5668 0.552681C12.4467 0.477128 12.3226 0.408879 12.1953 0.348209C12.179 0.340064 12.1624 0.332342 12.1457 0.325056ZM12.7826 3.65815V5.00006C12.7826 5.12752 12.7826 5.22776 12.7839 5.31436C12.7841 5.3287 12.7844 5.34224 12.7847 5.35504C12.7971 5.35533 12.8103 5.35559 12.8243 5.35582C12.9086 5.35718 13.0062 5.3572 13.1304 5.3572H14.4373L12.7826 3.65815Z"
                                                        fill="#17213A" />
                                                </svg></span>
                                        @else
                                            <span
                                                onclick="window.open('{{ $certificate->certificate ?? '' }}','_blank')"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="{{ $certificate->original_name ?? '' }}">
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
                                        @endif
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Government ID:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">


                                <span class="d-flex align-items-center gap-1 downloadGovtCertificateBtn"
                                    data-id={{ $developer->id }}><i class="icon-Mail text-18 color-b-blue"></i>
                                    {{ $developer->original_doc_name }}</span>



                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal_customer-details mb-0">
            <div class="  modal_margin-detail ">
                <div class="cat_box-small-i">
                    <h6 class="text-16 font-weight-700 color-primary text-center">Comapny Information</h6>
                </div>
                <div class="d-flex align-items-start justify-content-between pt-20">
                    <img src="http://127.0.0.1:8000/img/default-user.jpg" width="60" height="60"
                        alt="image" class="border-r-8">
                </div>
                <div class="row text-start">
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Company Name:</p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $developer->companyDetails->company_name }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Company Email:</p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $developer->companyDetails->company_email }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Company Mobile Number:</p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $developer->companyDetails->company_mobile }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">CIF/NIE:</p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->companyDetails->cif_nie }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Company Website:</p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $developer->companyDetails->company_website }}</p>
                        </div>
                    </div>
                    <div class="col-lg-12 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Company Address:</p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $developer->companyDetails->company_address }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">City:</p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $developer->companyDetails->company_city }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">State/Province:</p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $developer->companyDetails->company_state }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Country:</p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $developer->companyDetails->company_country }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Zip Code:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $developer->companyDetails->company_zipcode }} </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Primary Service Area:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $developer->companyDetails->primary_service_area }} </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Professional Title/Role:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $developer->companyDetails->professional_title }} </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Properties in Portfolio:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ !empty($total_properties_in_portfolio[$developer->companyDetails->total_properties_in_portfolio])
                                    ? $total_properties_in_portfolio[$developer->companyDetails->total_properties_in_portfolio] . ' Properties'
                                    : 'N/A' }}

                            </p>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Number of Current Customers:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ !empty($number_of_current_customers[$developer->companyDetails->number_of_current_customers])
                                    ? $number_of_current_customers[$developer->companyDetails->number_of_current_customers] . ' Customers'
                                    : 'N/A' }}
                            </p>
                        </div>
                    </div> -->
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Numbers of Sub-Agents:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ !empty($number_of_sub_agents[$developer->companyDetails->company_sub_agent])
                                    ? $number_of_sub_agents[$developer->companyDetails->company_sub_agent] . ' Sub-Agents'
                                    : 'N/A' }}


                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Property Types Specialized In:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">{{ $developer->typeNames ?? 'N/A' }}</p>

                        </div>
                    </div>
                    <div class="col-lg-8 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Years of Experience in Real Estate:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ !empty($total_years_experiance[$developer->companyDetails->total_years_experiance])
                                    ? $total_years_experiance[$developer->companyDetails->total_years_experiance]
                                    : 'N/A' }}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Average Number of Properties
                                Managed/Listed:</p>
                            <p class="text-14 color-b-blue font-weight-400">

                                {{ !empty($avg_number_properties_managed[$developer->companyDetails->avg_number_properties_managed])
                                    ? $avg_number_properties_managed[$developer->companyDetails->avg_number_properties_managed]
                                    : 'N/A' }}

                            </p>
                        </div>
                    </div>
                    <!-- <div class="col-lg-12 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Property Specialization:</p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $developer->companyDetails->property_specialization }}</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>


</div>
<div
    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-center pt-30 py-30">
    <div class="form-group position-relative gap-4 d-flex align-items-center">
        @if ($developer->current_status == 'under_review')
            <button type="button" class="sidebar_accept_button sidebar_button" data-toggle="modal"
                data-target="#cancelbutton">
                <img src="{{ asset('img/right_accept.svg') }}" alt="image" class="me-2 ">
                Accept</button>
            <button type="button" class="sidebar_reject_button sidebar_button" data-toggle="modal"
                data-target="#cancelbutton">
                <img src="{{ asset('img/cross_reject.svg') }}" alt="image" class="me-2">
                Reject</button>
        @elseif ($developer->is_active == 1)
            <button type="button" class="sidebar_accept_button sidebar_button " data-toggle="modal"
                data-target="#cancelbutton">
                <img src="{{ asset('img/right_accept.svg') }}" alt="image" class="me-2 ">
                Accepted</button>
        @elseif ($developer->is_active == 0)
            <button type="button" class="sidebar_reject_button sidebar_button" data-toggle="modal"
                data-target="#cancelbutton">
                <img src="{{ asset('img/cross_reject.svg') }}" alt="image" class="me-2">
                Rejected</button>
        @endif
    </div>
</div>
