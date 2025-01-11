<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 pt-30">
        <div class="personal_information_img">
            <img src="{{ !empty($companyDetails->companyDetails->company_image) ? $companyDetails->companyDetails->company_image : asset('img/logoplaceholder.svg') }}" alt="image" class="border-r-12"
                width="100" height="100">
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Company Name:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">{{$companyDetails->companyDetails->company_name  ?? 'N/A' }}

            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Company Email:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                {{$companyDetails->companyDetails->company_email  ?? 'N/A' }}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Company Mobile Number:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                {{ $companyDetails->companyDetails->company_mobile ?? 'N/A' }}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Tax Number:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
            {{ $companyDetails->companyDetails->company_tax_number ?? 'N/A' }}</div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Company Website:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                {{ $companyDetails->companyDetails->company_website ?? 'N/A' }}
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Company Address:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                {{ $companyDetails->companyDetails->company_address ?? 'N/A' }}
            </div>
        </div>
    </div> --}}
    {{-- <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                City:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                {{ $companyDetails->companyDetails->company_city ?? 'N/A' }}</div>
        </div>
    </div> --}}
    {{-- <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                State/Province:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                {{ $companyDetails->companyDetails->company_sate ?? 'N/A' }}</div>
        </div>
    </div> --}}
    {{-- <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Country:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                {{ $companyDetails->companyDetails->company_country ?? 'N/A' }}</div>
        </div>
    </div> --}}
    {{-- <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                ZipCode:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                {{ $companyDetails->companyDetails->company_zipcode ?? 'N/A' }}</div>
        </div>
    </div> --}}
    <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Primary Service Area:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                {{ $companyDetails->companyDetails->primary_service_area ?? 'N/A' }}</div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Professional Title/Role:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                {{ $companyDetails->companyDetails->professional_title ?? 'N/A' }}
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Number of Current Customers:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">{{ !empty($number_of_current_customers[$companyDetails->companyDetails->number_of_current_customers])
    ? $number_of_current_customers[$companyDetails->companyDetails->number_of_current_customers] . ' Customers'
    : 'N/A' }}</div>
        </div>
    </div> -->
    <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Numbers of sub-agents:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">{{ !empty($number_of_sub_agents[$companyDetails->companyDetails->company_sub_agent])
    ? $number_of_sub_agents[$companyDetails->companyDetails->company_sub_agent] . ' Sub-Agents'
    : 'N/A' }}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Property Types Specialized In:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                {{-- {{ $companyDetails->companyDetails->property_types_specialized ?? 'N/A' }} --}}
                {{!empty($user->typeNames) ? $user->typeNames : "N/A"}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Properties in Portfolio:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">{{ !empty($total_properties_in_portfolio[$companyDetails->companyDetails->total_properties_in_portfolio])
    ? $total_properties_in_portfolio[$companyDetails->companyDetails->total_properties_in_portfolio] . ' Properties'
    : 'N/A' }}
                    </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Years of Experience in Real Estate:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">{{ !empty($total_years_experiance[$companyDetails->companyDetails->total_years_experiance])
    ? $total_years_experiance[$companyDetails->companyDetails->total_years_experiance]
    : 'N/A' }}</div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Average Number of Properties Managed/Listed:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">{{ !empty($avg_number_properties_managed[$companyDetails->companyDetails->avg_number_properties_managed])
    ? $avg_number_properties_managed[$companyDetails->companyDetails->avg_number_properties_managed]
    : 'N/A' }}
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-12 col-md-12 col-sm-12 pt-30">
        <div class="presonal_information_s_card">
            <div class="text-14 color-primary font-weight-700 lineheight-18">
                Property Specialization:</div>
            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                {{$companyDetails->companyDetails->property_specialization ?? 'N/A' }}</div>
        </div>
    </div> -->
</div>