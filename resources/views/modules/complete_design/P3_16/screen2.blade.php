<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>


    <div id="toolbar_certificate">
        <div class="toolbar_between d-flex align-items-center">
            <button
                class="b-color-transparent text-18 color-white font-weight-700 lineheight-22  letter-s-36 d-flex justify-content-center"><span
                    class="button_first_zoom">1 </span> </span>/ 4</span></button>
            <div
                class="zoom_header d-flex align-items-center text-18 color-white font-weight-700 lineheight-22  letter-s-36 d-flex justify-content-center">
                <button class="zoom_out b-color-transparent color-white"> <i class=" icon-minus "></i></button>
                <button class="zoom_text b-color-transparent">100%</button>
                <button class="zoom_in b-color-transparent color-white"> <i class=" icon-plus"></i></button>
            </div>
        </div>
        <div id="toolbar_certificate_one">

            <div class="toolbar_start d-flex align-items-center">
                <div class="toolbar_start-img">
                    <i class=" icon-collabse_pdf "></i>
                </div>
                <div class="toolbar-start-text">
                    <div class="text-18 font-weight-700 lineheight-22 color-white letter-s-36 ms-3">
                        Cer_henry_realestate.pdf</div>
                </div>
            </div>
            <div class="toolbar_end">
                <div class="toolbar_end-img">
                    <button class="b-color-transparent"><i class="icon-Download"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="toolbar_certificate_content">
        <a href="#" class="d-flex align-items-center"><i class="icon-right pe-2"></i><span
                class="text-14 font-weight-400 lineheight-16  color-b-blue">Go to
                Back</span></a>
        <div class="certificate_main-img">
            <img src="{{asset('img/certificate_main.png')}}" alt="image" class="#">
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>