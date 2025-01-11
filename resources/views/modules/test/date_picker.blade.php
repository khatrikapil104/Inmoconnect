<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
        type="text/css" />

    <style>
    .datepicker.dropdown-menu {
        font-family: "Lato", sans-serif;
    }

    .datepicker.dropdown-menu {
        border-radius: 8px;
        border: 1px solid #E1E1E1;
        background: #FFF;
        box-shadow: 0px 2px 10px 0px rgba(0, 0, 0, 0.12);
    }

    body {
        font-family: "Lato", sans-serif;
    }

    #datepicker .form-control[disabled],
    #datepicker .form-control[readonly],
    #datepicker fieldset[disabled] .form-control {
        box-shadow: none;
        background: #fff;
        border: none;
        border-radius: 8px;
        font-size:14px;
        color:var(--B_blue);
        opacity:1;
    }

    div#datepicker {
        border-radius: 8px;
        border: 1px solid var(--Black-Colour, #17213A);
    }

    .input-group-addon {
        background-color: #fff;
        border: none;
        border-radius: 86px;
        padding: 10px 12px;
    }

    .datepicker table tr td.active:hover,
    .datepicker table tr td.active:hover:hover,
    .datepicker table tr td.active.disabled:hover,
    .datepicker table tr td.active.disabled:hover:hover,
    .datepicker table tr td.active:active,
    .datepicker table tr td.active:hover:active,
    .datepicker table tr td.active.disabled:active,
    .datepicker table tr td.active.disabled:hover:active,
    .datepicker table tr td.active.active,
    .datepicker table tr td.active:hover.active,
    .datepicker table tr td.active.disabled.active,
    .datepicker table tr td.active.disabled:hover.active,
    .datepicker table tr td.active.disabled,
    .datepicker table tr td.active:hover.disabled,
    .datepicker table tr td.active.disabled.disabled,
    .datepicker table tr td.active.disabled:hover.disabled,
    .datepicker table tr td.active[disabled],
    .datepicker table tr td.active:hover[disabled],
    .datepicker table tr td.active.disabled[disabled],
    .datepicker table tr td.active.disabled:hover[disabled] {
        /* background-color: #0044cc; */
        background: rgba(56, 49, 146, 1);
    }

    .datepicker thead tr:first-child th:hover,
    .datepicker tfoot tr th:hover {
        background: linear-gradient(133deg, #3AC5EC 0%, #C547E9 102.13%);
        color: #fff;
    }

    .datepicker table tr td span.active:hover,
    .datepicker table tr td span.active:hover:hover,
    .datepicker table tr td span.active.disabled:hover,
    .datepicker table tr td span.active.disabled:hover:hover,
    .datepicker table tr td span.active:active,
    .datepicker table tr td span.active:hover:active,
    .datepicker table tr td span.active.disabled:active,
    .datepicker table tr td span.active.disabled:hover:active,
    .datepicker table tr td span.active.active,
    .datepicker table tr td span.active:hover.active,
    .datepicker table tr td span.active.disabled.active,
    .datepicker table tr td span.active.disabled:hover.active,
    .datepicker table tr td span.active.disabled,
    .datepicker table tr td span.active:hover.disabled,
    .datepicker table tr td span.active.disabled.disabled,
    .datepicker table tr td span.active.disabled:hover.disabled,
    .datepicker table tr td span.active[disabled],
    .datepicker table tr td span.active:hover[disabled],
    .datepicker table tr td span.active.disabled[disabled],
    .datepicker table tr td span.active.disabled:hover[disabled] {
        background: rgba(56, 49, 146, 1);
    }

    .datepicker table tr td.day:hover,
    .datepicker table tr td.day.focused {
        background: linear-gradient(133deg, #3AC5EC 0%, #C547E9 102.13%);
        color: #fff;
    }

    .datepicker table tr td.today,
    .datepicker table tr td.today:hover,
    .datepicker table tr td.today.disabled,
    .datepicker table tr td.today.disabled:hover {
        background: #DDF;
    }

    .datepicker table tr td.today:hover,
    .datepicker table tr td.today:hover:hover,
    .datepicker table tr td.today.disabled:hover,
    .datepicker table tr td.today.disabled:hover:hover,
    .datepicker table tr td.today:active,
    .datepicker table tr td.today:hover:active,
    .datepicker table tr td.today.disabled:active,
    .datepicker table tr td.today.disabled:hover:active,
    .datepicker table tr td.today.active,
    .datepicker table tr td.today:hover.active,
    .datepicker table tr td.today.disabled.active,
    .datepicker table tr td.today.disabled:hover.active,
    .datepicker table tr td.today.disabled,
    .datepicker table tr td.today:hover.disabled,
    .datepicker table tr td.today.disabled.disabled,
    .datepicker table tr td.today.disabled:hover.disabled,
    .datepicker table tr td.today[disabled],
    .datepicker table tr td.today:hover[disabled],
    .datepicker table tr td.today.disabled[disabled],
    .datepicker table tr td.today.disabled:hover[disabled] {
        background: rgba(56, 49, 146, 1);
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <label>Select Date: </label>
                <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                    <input class="form-control" type="text" readonly />
                    <span class="input-group-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4 1C4 0.447266 4.44727 0 5 0C5.55273 0 6 0.447266 6 1V4C6 4.55273 5.55273 5 5 5C4.74316 5 4.50879 4.9043 4.33203 4.74609C4.12793 4.5625 4 4.29688 4 4V1ZM14 1C14 0.447266 14.4473 0 15 0C15.5527 0 16 0.447266 16 1V4C16 4.55273 15.5527 5 15 5C14.4473 5 14 4.55273 14 4V1ZM3 4V2H2C0.895508 2 0 2.89453 0 4V18C0 19.1055 0.895508 20 2 20H18C18.6553 20 19.2363 19.6855 19.6016 19.1973C19.8516 18.8633 20 18.4492 20 18V4C20 2.89453 19.1045 2 18 2H17V4C17 5.10547 16.1045 6 15 6C13.8955 6 13 5.10547 13 4V2H7V4C7 5.10547 6.10449 6 5 6C3.89551 6 3 5.10547 3 4ZM18.5 7.5H1.5V18.5H18.5V7.5Z"
                                fill="#17213A" />
                        </svg>
                        <!-- <i class="glyphicon glyphicon-calendar"></i> -->
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script>
    $(function() {
        $("#datepicker").datepicker({
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());
    });
    </script>
</body>

</html>