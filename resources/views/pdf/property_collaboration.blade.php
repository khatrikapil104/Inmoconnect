<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Collaboration</title>
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
        .modal-open {
    padding-right: 0px !important;
    margin-right: 0px !important;
}
.modal-open header{
    z-index: 999 !important;
}

.show {
    display: block;
}
.modal-width-change_one {
    max-width: 1050px;
}
.modal-width-change_two {
    max-width: 923px;
}
.modal-width-change_three {
    max-width: 726px;
}
.modal-width-change_four {
    max-width: 562px;
}
.modal-width-change_five {
    max-width: 408px;
}
.modal-width-change_six {
    max-width: 576px;
}
.modal-width-change_seven {
    max-width: 910px;
}
.modal-width-change_eight {
    max-width: 385px;
    margin-right: auto;
    margin-left: auto;
}
.modal-width-change_nine {
    max-width: 848px;
}
.modal-header_file {
    padding: 30px;
}
.modal-content-file {
    border: none;
    border-radius: 8px;
    background: var(--white);
}
.modal-body_select-agent {
    height: 455px;
    overflow-y: auto;
    margin-right: -18px;
    padding-right: 14px;
    padding-bottom: 10px;
}
.modal-body_card {
    border-radius: 8px;
    background: var(--white);
    box-shadow: var(--box-shadow-one);
    padding: 10px 20px;
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    gap: 30px;
}
.modal-body_left {
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 1;
}
.property-h-responsive {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Property Collaboration */
.modal_customer-details {
    border: 1px solid #38319266;
    padding: 12px;
    border-radius: 8px;
    margin: 20px 0 30px 0;
}
.modal-details-c {
    border-left: 1px solid #38319266;
    padding-left: 20px;
}
textarea#m_primary_agent {
    height: 168px;
}
input#checkbox_modal {
    width: 16px;
    height: 16px;
}
#uploadDocumentModal.modal.show {
    z-index: 9999;
}
#showMessageModal.show ~ #editCustomerModal {
    z-index: 9999;
}
.customcb {
    display: block;
    position: relative;
    padding-left: 35px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    padding: 0 0 0 23px !important;
    text-transform: capitalize;
    font-size: 14px;
    align-items: center;
    color: #000;
}
.customcb input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}
.customcb .checkmark {
    position: absolute;
    top: 1px;
    left: 0;
    height: 16px;
    width: 16px;
    background-color: transparent;
    border: 1px solid var(--b_primary);
    border-radius: 50%;
}
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}
.customcb input:checked ~ .checkmark:after {
    display: block;
}
.customcb .checkmark:after {
    top: 50%;
    left: 50%;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: var(--b_primary);
    transform: translate(-50%, -50%);
}
.modal_margin-detail {
    margin: 20px 0 20px 0;
}
.modal_margin-detail:last-child {
    margin: 0;
}
.checkbox_modal .modal-dialog {
    margin: auto;
}
.download_format {
    background: #38319214;
    padding: 8px;
    display: inline-block;
    text-align: center;
    margin: 0 auto;
    left: 50%;
    transform: translateX(-50%);
    position: relative;
    border-radius: 8px;
}
textarea#message {
    height: 84px;
}
textarea#modal_msg {
    height: 80px;
}
.modal-header_color {
    background: #38319226;
    border-radius: 10px 0 0 10px;
}
.load_to-dist {
    height: 276px;
    overflow-y: auto;
    overflow-x: hidden;
    margin-right: -7px;
    padding-right: 8px;
}
button.to-do-modal_button span {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0px 0px 3px 1px #38319226;
    border: 1px solid #ffffff;
    border-radius: 5px;
    margin-left: -5px;
    background: #ffffff;
}
button.to-do-modal_button span img {
    width: 12px;
    height: 12px;
}
.modal_save {
    padding-left: 14px;
}
.modal_save::before {
    content: "";
    position: absolute;
    width: 8px;
    height: 8px;
    background-color: var(--b_primary);
    border-radius: 50%;
    top: 5px;
    left: 0;
}
.select_commission_main {
    background-color: #3831921A;
}
.h-85 {
    height: 50px;
}
@import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");
:root {
    --background_two: #fbfbfb;
    --background: #f6f6ff;
    --B_blue: #17213a;
    --b_blue_opacity: #17213acc;
    /*(rgba(23, 33, 58, 0.8)) */
    --b-blue-opacity-4: rgba(23, 33, 58, 0.4);
    --b-blue-light: #2b354e;
    --b_primary: #383192;
    --Gradient-one: linear-gradient(133deg, #26b1d8 0%, #af31d3 102.13%);
    --white: #fff;
    --white_two: #e2e2e2;
    --white_three: #f9f9ff;
    --white_four: #efeffe;
    --white_five: #eeeeee;
    --white_six: #f5f5f5;
    --white_seven: #e5f8f5;
    --white_eight: #fdebf3;
    --white_nine: #f1f2fd;
    --white_ten: #d9d9d9;
    --white_eleven: #d4d4d4;
    --white_tweleve: #ededed;
    --white_thirteen: #dbdbdb;
    --white_fourteen: #ebffe9;
    --white_fifteen: #edf7ff;
    --white_sixteen: #fee;
    --white_seventeen: #d5d5d5;
    --white_eighteen: #f6f6f6;
    --white_ninteen: #f6faff;
    --white_twenty: #fcfcfc;
    --white_twenty-one: #f9f9f9;
    --white_twenty-two: #f4f4ff;
    --white_twenty_three: #edecff;
    --white_twenty_four: #e7e7e7;
    --white_twenty_five: #f4f3f3;
    --white_grey: #f3f4f6;
    --b-blue-a: rgba(23, 33, 58, 0.4);
    --grey: #8c8c8c;
    --font-size_one: 16px;
    --black: #000;
    --black_two: #333;
    --black_three: #222;
    --black-opacity: #00000080;
    /* (rgba(0, 0, 0,0.5))*/
    --light_blue: #c1c2c4;
    --border: #e2e8f0;
    --light-blue_one: #f3f3f3;
    --white-light: #dfdfdf;
    --dark-grey: #efefef;
    --red: #f00;
    --red-two: #db4446;
    --red_three: #f1421b;
    --red_four: #e50000;
    --red_five: #d6041d;
    --sidebar-width: 17rem;
    --light-grey_one: #8f8f8f;
    --light_grey-two: #979797;
    --light-grey-three: #b1b1b1;
    --light-grey_four: #5f5f5f;
    --light-grey_five: #545454;
    --light-grey_six: #cecece;
    --light-grey_seven: #a5a5a5;
    --light-grey_eight: #9a9a9a;
    --light-grey_nine: #696969;
    --light-grey_ten: #d5d6d8;
    --light-grey_eleven: #e2e3e5;
    --light-grey_twelve: #99a3bc;
    --light-grey_thirteen: #a4a4a4;
    --light-grey_fourteen: #6b7280;
    --light-grey_fifteen: #bcbcbc;
    --light-grey_sixteen: #e3e3e3;
    --light-grey_seventeen: #cdcdcd;
    --light-grey_eighteen: #999999;
    --green: #03a100;
    --green_one: #6fd3f7;
    --green_two: #06b48a;
    --green_three: #00b69b;
    --purple_one: #7e77d8;
    --purple_two: #564fb0;
    --purple_three: #6560f0;
    --purple_four: #8f00ff;
    --purple_five: #8f77ea;
    --purple_six: #7981ef;
    --orange_one: #ff8a00;
    --yellow_one: #f3c44c;
    --yellow_two: #ffcc00;
    --pink_one: #fc71ff;
    --pink_two: #ff00e5;
    --pink_three: #f0368c;
    --sky_one: #0094ff;
    --sky_two: #2563eb;
    --box-shadow-one: 0px 2px 3px 2px #ebebf4;
    --box-shadow_two: 5px 5px 4px 0px #5b5b5b33;
    --box-shadow_three: -5px 0px 5.099999904632568px 0px #99999940;
    --box-shadow_four: 0px 4px 10px -3px #5a5a5a66;
}

html {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    font-family: "Lato", sans-serif;
}

a,
abbr,
acronym,
address,
b,
bdo,
big,
blockquote,
body,
br,
button,
cite,
code,
dd,
del,
dfn,
div,
dl,
dt,
em,
fieldset,
form,
h1,
h2,
h3,
h4,
h5,
h6,
hr,
html,
i,
iframe,
img,
ins,
kbd,
legend,
li,
map,
object,
ol,
p,
pre,
q,
samp,
small,
span,
strong,
sub,
sup,
table,
tbody,
tfoot,
th,
thead,
tr,
tt,
ul,
var {
    margin: 0;
    padding: 0;
    border: none;
}

ul {
    list-style: none;
}

a,
input,
select,
textarea {
    outline: 0;
    margin: 0;
    padding: 0;
}

.btn,
a,
.btn.focus,
.btn:focus,
.btn:hover,
a:focus,
a:hover,
button:focus,
input:focus {
    text-decoration: none;
    outline: 0;
    /* color: inherit; */
    text-decoration: none;
    transition: all 0.3s ease 0s;
    box-shadow: none;
}

body,
html {
    font-family: "Lato", sans-serif;
    font-size: 16px;
    line-height: 20px;
}

.container,
.container-fluid,
.container-xl,
.container-lg,
.container-md,
.container-sm {
    width: 100% !important;
    padding-right: 10px !important;
    padding-left: 10px !important;
    margin-right: auto !important;
    margin-left: auto !important;
}

.row {
    margin-right: -10px !important;
    margin-left: -10px !important;
}

.row>* {
    padding-right: 10px;
    padding-left: 10px;
}

.no-gutters {
    margin-right: 0;
    margin-left: 0;
}

.no-gutters>.col,
.no-gutters>[class*="col-"] {
    padding-right: 0;
    padding-left: 0;
}

h1,
h2,
h3,
h4,
h5,
h6,
p {
    margin-bottom: 0;
}

body {
    overflow-x: hidden;
    height: 100%;
    background: var(--background);
}

*,
*::before,
*::after {
    box-sizing: border-box;
}

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
textarea:-webkit-autofill:hover,
textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0px 1000px var(--white) inset;
}

.login_form input:-webkit-autofill,
.login_form input:-webkit-autofill:hover,
.login_form input:-webkit-autofill:focus,
.login_form textarea:-webkit-autofill,
.login_form textarea:-webkit-autofill:hover,
.login_form textarea:-webkit-autofill:focus,
.login_form select:-webkit-autofill,
.login_form select:-webkit-autofill:hover,
.login_form select:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0px 1000px var(--white_grey) inset;
}

textarea::placeholder {
    font-size: 14px;
    color: var(--B_blue) !important;
    font-weight: 400;
}

img {
    max-width: 100%;
}

svg {
    transition: all 0.3s;
}

.cursor-pointer,
button,
a,
.open-btn {
    cursor: pointer;
}

a {
    color: var(--B_blue);
}

td a {
    text-wrap: nowrap;
}


/* ////////////////scroll-bar/////////////////////// */

::-webkit-scrollbar {
    width: 5px;
    height: 5px;
}

::-webkit-scrollbar-track {
    background: var(--white-light);
    border-radius: 8px;
}

::-webkit-scrollbar-thumb {
    background: var(--b_primary);
    border-radius: 8px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--b_primary);
}


/* //////////////////////////////font-weight////////////////////////////// */

.font-weight-100 {
    font-weight: 100;
}

.font-weight-300 {
    font-weight: 300;
}

.font-weight-400 {
    font-weight: 400;
}

.font-weight-700 {
    font-weight: 700;
}

.font-weight-900 {
    font-weight: 900;
}


/* ////////////////////////////////////////icon-font//////////////////////////// */

.icon-6 {
    font-size: 6px;
}

.icon-8 {
    font-size: 8px;
}

.icon-12 {
    font-size: 12px;
}

.icon-14 {
    font-size: 14px;
}

.icon-15 {
    font-size: 15px;
}

.icon-16 {
    font-size: 16px;
}

.icon-18 {
    font-size: 18px;
}

.icon-20 {
    font-size: 20px;
}

.icon-22 {
    font-size: 22px;
}

.icon-24 {
    font-size: 24px;
}

.icon-30 {
    font-size: 30px;
}

.icon-60 {
    font-size: 60px;
}

.icon-150 {
    font-size: 150px;
}


/* /////////////////////////////////////////////////////////////////// */

.text-8 {
    font-size: 8px;
}

.text-10 {
    font-size: 10px;
}

.text-11 {
    font-size: 11px;
}

.text-12 {
    font-size: 12px;
}

.text-13 {
    font-size: 13px;
}

.text-15 {
    font-size: 15px;
}

.text-18 {
    font-size: 18px;
}

.text-20 {
    font-size: 20px;
}

.text-22 {
    font-size: 22px;
}

.text-24 {
    font-size: 24px;
}

.text-29 {
    font-size: 29px;
}

.text-32 {
    font-size: 32px;
}

.text-36 {
    font-size: 36px;
}

.text-48 {
    font-size: 48px;
}

.text-60 {
    font-size: 60px;
}

.text60 {
    font-size: 60px;
}

.text-120 {
    font-size: 120px;
}


/* ///////////////////////////font-size////////////////////////////// */

.text-14 {
    font-size: 14px;
}

.text-16 {
    font-size: 16px;
}

.text-24 {
    font-size: 24px;
}

.text-30 {
    font-size: 30px;
}

.text-40 {
    font-size: 40px;
}


/* /////////////////line-height////////////////////////////// */

.lineheight-15 {
    line-height: 15px;
}

.lineheight-16 {
    line-height: 16px;
}

.lineheight-18 {
    line-height: 18px;
}

.lineheight-20 {
    line-height: 20px;
}

.lineheight-22 {
    line-height: 22px;
}

.lineheight-24 {
    line-height: 24px;
}

.lineheight-30 {
    line-height: 30px;
}

.lineheight-32 {
    line-height: 32px;
}

.lineheight-36 {
    line-height: 36px;
}

.lineheight-40 {
    line-height: 40px;
}

.lineheight-42 {
    line-height: 42px;
}

.lineheight-48 {
    line-height: 48px;
}

.line-height-15 {
    line-height: 1.5;
}


/* ///////////////////////color////////////////////////////////// */

.color-b-blue {
    color: var(--B_blue);
}

.color-white {
    color: var(--white);
}

.color-primary {
    color: var(--b_primary);
}

.color-white-grey {
    color: var(--white_grey);
}

.color-grey {
    color: var(--grey);
}

.color-black {
    color: var(--black);
}

.color-red {
    color: var(--red);
}

.color-light-grey {
    color: var(--light-grey_one);
}

.color-light-grey-two {
    color: var(--light_grey-two);
}

.color-light-grey-three {
    color: var(--light-grey-three);
}

.color-light-grey-four {
    color: var(--light-grey_four);
}

.color-light-grey-five {
    color: var(--light-grey_five);
}

.color-light-grey-six {
    color: var(--light-grey_six);
}

.color-light-grey-seven {
    color: var(--light-grey_seven);
}

.color-light-grey-eight {
    color: var(--light-grey_eight);
}

.color-light-grey-nine {
    color: var(--light-grey_nine);
}

.color-red-two {
    color: var(--red-two);
}

.color-green {
    color: var(--green);
}

.color-light-blue {
    color: var(--light_blue);
}


/* ////////////////////////opacity//////////////////////////////////// */

.opacity-1 {
    opacity: 1;
}

.opacity-0 {
    opacity: 0;
}

.opacity-2 {
    opacity: 0.2;
}

.opacity-3 {
    opacity: 0.3;
}

.opacity-4 {
    opacity: 0.4;
}

.opacity-5 {
    opacity: 0.5;
}

.opacity-6 {
    opacity: 0.6;
}

.opacity-7 {
    opacity: 0.7;
}

.opacity-8 {
    opacity: 0.8;
}

.opacity-9 {
    opacity: 0.9;
}


/* //////////////////////letter-spacing////////////////////////// */

.letter-s-36 {
    letter-spacing: -0.36px;
}

.letter-s-48 {
    letter-spacing: -0.48px;
}

.letter-s-64 {
    letter-spacing: -0.64px;
}

.letter-s-72 {
    letter-spacing: -0.72px;
}


/* //////////////////////border-radius//////////////////////// */

.border-r-8 {
    border-radius: 8px;
}

.border-r-5 {
    border-radius: 5px;
}

.border-r-4 {
    border-radius: 4px;
}

.border-r-20 {
    border-radius: 20px;
}

.border-r-12 {
    border-radius: 12px;
}


/* ////////////////////background-color///////////////////////// */

.b-color-white {
    background-color: var(--white);
}

.b-color-transparent {
    background-color: transparent;
}

.b-color-Gradient {
    background: var(--Gradient-one);
}

.b-color-primary {
    background: var(--b_primary);
}

.b-color-background {
    background: var(--background);
}

.b-blue-opacity {
    background: rgba(21, 21, 21, 0.051);
    /* opacity-5*/
}

.b-color-blue {
    background: var(--B_blue);
}

.b-white-grey {
    background: var(--white_grey);
}

.b-blue-opacity-4 {
    background: var(--b-blue-opacity-4);
}

.b-color-dark-grey {
    background: var(--dark-grey);
}

.b-color-blue-opacity-5 {
    background-color: rgba(23, 33, 58, 50%);
}

.green_text {
    color: var(--green);
}

.sky {
    background-color: var(--sky_one);
}

.sky_text {
    color: var(--sky_one);
}

.red {
    background-color: var(--red_four);
}

.red_text {
    color: var(--red_four);
}

.green {
    background-color: var(--green);
}


/* /////////////////////padding////////////////////////// */

.mt5 {
    margin-top: 5px;
}

.p-10 {
    padding: 10px;
}

.p-15 {
    padding: 15px;
}

.p-20 {
    padding: 20px;
}

.p-30 {
    padding: 30px;
}

.pt-15 {
    padding-top: 15px;
}

.pt-12 {
    padding-top: 12px;
}

.pt-40 {
    padding-top: 40px;
}

.pt-15 {
    padding-top: 15px;
}

.pb-20 {
    padding-bottom: 20px;
}

.pb-24 {
    padding-bottom: 24px;
}

.pt-24 {
    padding-top: 24px;
}

.pt-30 {
    padding-top: 30px;
}

.pt-40 {
    padding-top: 40px;
}

.p-35 {
    padding: 35px;
}

.pt-20 {
    padding-top: 20px;
}

.pt-10 {
    padding-top: 10px;
}

.mt-10 {
    margin-top: 10px;
}

.mt-14 {
    margin-top: 14px;
}

.mt-20 {
    margin-top: 20px;
}

.mb-20 {
    margin-bottom: 20px;
}

.mt-40 {
    margin-top: 40px;
}

.mt-30 {
    margin-top: 30px;
}

.mt-60 {
    margin-top: 60px;
}

.px-70 {
    padding-top: 70px;
    padding-bottom: 70px;
}

.py-10 {
    padding-top: 10px;
    padding-bottom: 10px;
}

.px-15 {
    padding-top: 15px;
    padding-bottom: 15px;
}

.px-20 {
    padding-top: 20px;
    padding-bottom: 20px;
}

.py-20 {
    padding-left: 20px;
    padding-right: 20px;
}

.px-30 {
    padding-top: 30px;
    padding-bottom: 30px;
}

.px-35 {
    padding-top: 35px;
    padding-bottom: 35px;
}

.py-30 {
    padding-left: 30px;
    padding-right: 30px;
}

.py-35 {
    padding-left: 35px;
    padding-right: 35px;
}

.py-25 {
    padding-left: 25px;
    padding-right: 25px;
}

.px-25 {
    padding-top: 25px;
    padding-bottom: 25px;
}

.px-50 {
    padding-top: 50px;
    padding-bottom: 50px;
}

.py-65 {
    padding-left: 65px;
    padding-right: 65px;
}

.py-50 {
    padding-left: 50px;
    padding-right: 50px;
}

.pt-100 {
    padding-top: 100px;
}

.gap-12 {
    gap: 12px;
}

.gap2 {
    gap: 2rem;
}

.first-row .first-column:first-child {
    padding-right: 0;
}


/* /////////////////////////margin//////////////////////////// */

.mt-10 {
    margin-top: 10px;
}

.mb-10 {
    margin-bottom: 10px;
}

.mt10 {
    margin-top: -10px;
}

.mb-30 {
    margin-bottom: 30px;
}

.mb-15 {
    margin-bottom: 15px;
}

.ml20 {
    margin-left: -20px;
}


/* /////////////////////box-shadow/////////////////////////////// */

.box-shadow-one {
    box-shadow: var(--box-shadow-one);
}

.box-shadow-two {
    box-shadow: var(--box-shadow_two);
}


/* //////////////////////////width-height///////////////////// */

.w-30 {
    width: 30px;
}

.h-30 {
    height: 30px;
}

.width-42 {
    width: 42px;
}

.h-32 {
    height: 32px;
}

.height-40 {
    height: 40px;
}

.height-46 {
    height: 46px;
}

.width-36 {
    width: 36px;
}

.height-36 {
    height: 36px;
}

.w-39 {
    width: 39%;
}

.w-28 {
    width: 28%;
}

.w-79 {
    width: 79px;
}

.w100 {
    width: 100px;
}

.h-24 {
    height: 24px;
}

.height-50 {
    height: 50px;
}

.height-40 {
    height: 40px;
}

.h-85 {
    height: 50px;
}

.h-149 {
    height: 149px;
}

.h-138 {
    height: 138px;
}

.h-42 {
    height: 42px;
}

.w-150 {
    width: 150px;
}

.font-style-italic {
    font-style: italic;
}


/* ///////////////////////border/////////////////////////////// */

.border-grey {
    border: 1px solid var(--light-grey_eleven);
}

.border-background {
    border: 1px solid var(--background);
}

.border-blue {
    border: 1px solid var(--B_blue);
}

.border-dashed {
    border: 1px dashed var(--B_blue);
}

.border-white {
    border: 1px solid var(--white);
}

.border-bottom-black {
    border-bottom: 1px solid var(--black);
}

.border-primary {
    border: 1px solid var(--b_primary);
    border-color: var(--b_primary) !important;
}

.border-primary_one {
    border: 1px solid var(--b_primary);
}

.border-light-blue {
    border: 1px solid var(--light_blue);
}

.form-control.is-invalid,
.was-validated .form-control:invalid {
    background-image: none;
}

span.error {
    color: var(--red_five);
    text-transform: uppercase;
    display: block;
    margin-bottom: 10px;
}

.more_button {
    border-bottom: 1px solid var(--b_primary);
}

.crm-main-content {
    padding: 50px 30px 20px 30px;
}

.required {
    color: var(--red_four);
}

.removeCertificateBtn {
    cursor: pointer;
}

.downloadGovtCertificateBtn {
    cursor: pointer;
}

.border-white-twenty {
    border-bottom: 1px solid var(--white_twenty_three);
}

.red-color {
    background: var(--red_three);
}

.blue-color_dark {
    background: var(--purple_three);
}

.orange-color {
    background: var(--orange_one);
}

.sky-color {
    background: var(--green_one);
}

.lightgreen-color {
    background: var(--green_two);
}

.yellow-color {
    background: var(--yellow_one);
}

.pink-color {
    background: var(--pink_one);
}

.purple-color {
    background: var(--purple_four);
}

.light-pink {
    background: var(--pink_two);
}

.green-color {
    background-color: var(--green);
}

.red-color {
    background-color: var(--red_four);
}

.blue-color {
    background-color: var(--sky_one);
}

.shadow {
    -webkit-filter: drop-shadow(0px 3px 3px rgba(0, 0, 0, 0.5));
    filter: drop-shadow(0px 3px 3px rgba(0, 0, 0, 0.5));
}

.form-control::placeholder {
    color: var(--B_blue);
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    display: none;
}

.border_tab-search {
    border-top: 1px solid #dbdbdb;
}

.saved_items_tabs {
    border-bottom: 1px solid var(--white_thirteen);
}

.saved_items_tabs ul.tabs {
    border-bottom: none;
}

.flex-1 {
    flex: 1;
}

.gap-30 {
    gap: 30px;
}

.refrence_id_form .form-control::placeholder,
textarea::placeholder {
    color: #17213a !important;
    opacity: 1;
}

.refrence_id_form .form-control::-ms-input-placeholder {
    color: #17213a;
}

.gap-10 {
    gap: 10px;
}

.search_filter_group .form-control {
    height: 34px;
}

.mt-n3 {
    margin-top: -16px;
}

.header-right-button {
    cursor: pointer;
}

.agent-information_border {
    border-bottom: 1px solid #d5d6d8;
}


/* ///////////////////////////////////// */

.demo {
    width: 780px;
    margin: 20px auto;
}

#lightSlider {
    list-style: none outside none;
    padding-left: 0;
    margin-bottom: 0;
}


/* .lSSlideOuter .lSPager.lSGallery li {
    opacity: 0.5;
    width: 169px !important;
    height: 97px !important;
}

.lSSlideOuter .lSPager.lSGallery li.active {
    opacity: 1;
}

lSSlideOuter .lSPager.lSGallery li.active,
.lSSlideOuter .lSPager.lSGallery li {
    border-radius: 0;
}

lSSlideOuter .lSPager.lSGallery li.active:hover,
.lSSlideOuter .lSPager.lSGallery li:hover {
    border-radius: 0;
}

.lSSlideOuter .lSPager.lSGallery img {
    display: block;
    height: 64px;
    max-width: 100%;
} */

.icon-icon_home:before {
    color: var(--B_blue) !important;
}

.tab-menu .slick-track {
    display: flex;
    gap: 57px;
    width: 100% !important;
}

.tab-menu ul li {
    width: 100% !important;
}

.collabration_open .event-checkbox .switch {
    width: 33px;
    height: 18px;
}

.collabration_open .event-checkbox .slider:before {
    height: 15px;
    width: 15px;
    bottom: 2px;
}

.collabration_open .event-checkbox input:checked+.slider:before {
    -webkit-transform: translateX(13px);
    -ms-transform: translateX(13px);
    transform: translateX(13px);
}

.mt-12 {
    margin-top: 12px;
}


/* .Gradient_button::after {
    background: transparent;
    color: var(--b_primary);
    border: 1px solid var(--b_primary);
    content: "";
    display: none;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 8px;
}
.Gradient_button:hover::after {
    display: block;
}
.Gradient_button:focus {
    background: transparent;
    color: var(--b_primary);
    border: 1px solid var(--b_primary);
} */

.gardient-button,
.Gradient_button {
    transition: all 0.3s ease-in-out;
    border-radius: 8px;
    position: relative;
    border: double 1px transparent;
    border-radius: 8px;
    background-image: linear-gradient(var(--white_grey), var(--white_grey)), radial-gradient(circle at top left, #26b1d8 0%, #af31d3 102.13%);
    background-origin: border-box;
    background-clip: padding-box, border-box;
    z-index: 2;
    overflow: hidden;
}

.gardient-button::after,
.Gradient_button::after {
    background: var(--Gradient-one);
    content: "";
    width: 100%;
    height: 100%;
    display: block;
    height: 50px;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
}

.gardient-button:hover::after,
.Gradient_button:hover::after {
    background: transparent;
}


/* .slick-slider_card .element{
    height:100px;
    width:100px;
    background-color:#000;
    color:#fff;
    border-radius:5px;
    display:inline-block;
    margin:0px 10px;
    display:-webkit-box;
    display:-ms-flexbox;
    display:flex;
    -webkit-box-pack:center;
        -ms-flex-pack:center;
            justify-content:center;
    -webkit-box-align:center;
        -ms-flex-align:center;
            align-items:center;
    font-size:20px;
  }
  .slick-slider_card .slick-disabled {
    opacity : 0;
    pointer-events:none;
  } */

.slider_card_fancybox img {
    width: 300px;
    height: 220px;
}

.slider_card_fancybox .slick-prev {
    left: 7px;
    z-index: 1;
}

.slider_card_fancybox .slick-next {
    right: 9px;
}

.slick-slide {
    display: none;
}

.slick-active {
    display: block;
}

.slider_card_fancybox {
    width: 100%;
    height: 100%;
}

.advanced_not-before .select2-container .select2-search--inline .select2-search__field {
    left: 3%;
    transform: translate(0%, -33%);
    opacity: 0;
}

.type_tooltip .tooltip {
    position: relative;
    display: inline-block;
    opacity: 1;
    color: var(--b_primary);
    font-size: 16px;
    border-radius: 4px;
    z-index: 1;
}

.type_tooltip .tooltip .tooltiptext {
    visibility: hidden;
    text-align: center;
    border-radius: 6px;
    padding: 5px 20px;
    position: absolute;
    top: 42px;
    left: 50%;
    transform: translate(-50%, 0%);
    z-index: 99999999;
    background: #383192;
    color: #fff;
    width: 174px;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    bottom: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 9px;
    border-style: solid;
    border-color: transparent transparent #383192 transparent;
}

.type_tooltip .tooltip:hover .tooltiptext {
    visibility: visible;
}

.video_demo iframe {
    max-width: 100%;
    width: 100%;
    height: 200px;
}

.tab-menu ul li {
    width: 100% !important;
}

.pac-container {
    z-index: 9999;
}

html.with-fancybox header {
    z-index: 5;
}

html.with-fancybox .tab_slider-main .prev,
html.with-fancybox .tab_slider-main .next {
    z-index: 5;
}

.dropdown:hover~.property_view_breadcrumb {
    z-index: 5;
}

.select2-selection__choice__remove span {
    z-index: 99;
    position: relative;
}

.modal-open {
    overflow: hidden;
}

#timeControl {
    text-align: end;
    margin-top: 20px;
}

#timeControl li {
    display: inline-flex;
    flex-direction: column;
    text-align: center;
    font-size: 14px;
    list-style-type: none;
    color: #17213ab2;
    margin-left: 25px;
    position: relative;
}

#timeControl li:after {
    content: ":";
    font-size: 37px;
    position: absolute;
    right: -17px;
    top: 4px;
}

#timeControl li:last-child::after {
    content: "";
    font-size: 0;
}

#timeControl li span {
    display: block;
    font-size: 20px;
    color: #17213a;
    padding: 10px;
    font-weight: 700;
    display: flex;
    background-color: #38319233;
    border-radius: 4px;
    align-items: center;
    justify-content: center;
    margin-bottom: 5px;
}

.message_table .icon-message:after {
    content: "";
    border-radius: 50%;
    width: 8px;
    height: 8px;
    position: absolute;
    top: -4px;
    right: -4px;
    background-color: #e50000;
}

ul.tabs.map_tabs li.current::before {
    background-color: transparent;
}

ul.tabs.map_tabs li {
    display: flex;
    padding: 8px 10px;
    align-items: center;
}

ul.tabs.map_tabs li.tab_1.current {
    color: #fff;
    background: var(--Gradient-one);
}

ul.tabs.map_tabs li.tab_2.current {
    color: #fff;
    background: #383192;
}

ul.tabs.map_tabs li.tab_1.current img,
ul.tabs.map_tabs li.tab_2.current img {
    filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(7478%) hue-rotate(46deg) brightness(110%) contrast(100%);
}

.modal_table_input {
    border: 1px solid #17213a1a;
    background: #ffffff;
    border-radius: 8px;
    width: 60px;
    height: 30px;
    padding: 0 5px;
}

.fancybox_slider .slick-slide {
    height: auto;
}

.fancybox_slider .slick-slide img {
    width: 100%;
    max-height: 400px;
    object-fit: cover;
    border-radius: 16px;
}

.fancybox_slider .slick-next:before {
    content: "";
    background-image: url(/img/fancy_slider_right.svg);
    background-repeat: no-repeat;
    width: 40px;
    height: 40px;
    display: block;
    background-position: center center;
    background-color: #17213a66;
    border-radius: 50%;
}

.fancybox_slider .slick-prev:before {
    content: "";
    background-image: url(/img/fancy_slider_left.svg);
    background-repeat: no-repeat;
    width: 40px;
    height: 40px;
    display: block;
    background-position: center center;
    background-color: #17213a66;
    border-radius: 50%;
}

.fancybox_slider .slick-prev {
    left: 7px;
    z-index: 1;
}

.fancybox_slider .slick-next {
    right: 26px;
}

.slider_nav_bottom.slick-initialized .slick-slide {
    margin: 0 auto;
    text-align: -webkit-center;
}


/* progressbar_modal */

@keyframes growProgressBar {
    0%,
    33% {
        --pgPercentage: 0;
    }
    100% {
        --pgPercentage: var(--value);
    }
}

@property --pgPercentage {
    syntax: "<number>";
    inherits: false;
    initial-value: 0;
}

.modal_progress div[role="progressbar"] {
    --fg: #383192;
    --bg: #d9d9d9;
    --pgPercentage: var(--value);
    animation: growProgressBar 3s 1 forwards;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    background: radial-gradient( closest-side, white 88%, transparent 0 99.9%, white 0), conic-gradient(var(--fg) calc(var(--pgPercentage) * 1%), var(--bg) 0);
    font-size: 18px;
    color: #383192;
}

.modal_progress div[role="progressbar"]::before {
    counter-reset: percentage var(--value);
    content: counter(percentage) "%";
}

.modal_progress {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 0 20px 0;
}

.input-group-append.input_modal_meter {
    position: absolute;
    top: 14px;
    right: 22px;
}

.table_upload_property .form-group.mt-3 {
    margin-top: 0 !important;
}

.table_upload_property .form-group .crm-single-select {
    height: 30px;
    border: 1px solid #17213a1a;
}

.modal_table_input.modal_table_input_one {
    width: 100px;
    padding: 0 5px 0 20px;
}

.input-group-append.input_modal_meter.input_modal_meter_one {
    right: 84%;
}

.heading_text_account {
    position: absolute;
    right: 20px;
    top: 20px;
    color: #383192;
    font-weight: 400;
    background-color: #3831921a;
    padding: 6px;
    border-radius: 5px;
    font-size: 14px;
}

.main-card-img.main_card_img_developer {
    width: 300px;
    height: 268px;
}

.download_legal_document{
    background-color: #383192;
    color: #fff;
    width: max-content;
    margin-left: 30px;
    box-shadow: 3px 4px 10px #38319296;
}
.download_brochure {
    position: fixed;
    bottom: 22px;
    right: 34px;
    background-color: #383192;
    color: #fff;
    box-shadow: 3px 4px 10px #38319296;
}

.toggled-2 .tab_slider {
    width: calc(100% - 233px);
}

#timeControl.timecontrol_dashboard {
    text-align: start;
    margin-top: 10px;
}

#timeControl.timecontrol_dashboard li {
    margin-right: 25px;
    margin-left: 0;
    color: #ffffffcc;
}

#timeControl.timecontrol_dashboard li span {
    background-color: #f3f4f626;
    color: #fff;
}

#timeControl.timecontrol_dashboard li:after {
    color: #fff;
}

.table_dropdown-content.show {
    display: block;
}

.dashboard_edit_one td {
    text-wrap: nowrap;
}

.advanced_property span.select2-container.select2-container--default.select2-container--open {
    z-index: 2;
}

.view_connect_agent {
    bottom: 20px;
    right: 20px;
    box-shadow: 3px 4px 10px 0px #38319280;
    border-radius: 8px;
}

.view_connect_agent:hover button {
    background: linear-gradient(132.96deg, #3ac5ec 0%, #c547e9 102.13%);
}

.read_message::after {
    position: absolute;
    content: "";
    width: 8px;
    height: 8px;
    background-color: #e50000;
    border-radius: 50%;
    top: -7px;
    right: -2px;
}

.header-right-button_one .small-button:hover span {
    color: #fff;
}

.download_format .icon-Download:before {
    color: var(--b_primary);
}

.download_plan .icon-Download:before {
    color: var(--b_primary);
}

li.paginate_button.page-item.disabled .page-link {
    color: rgba(23, 33, 58, 0.3);
}

.downloadGovtCertificateBtn.icon-Download:before {
    color: var(--b_primary);
}

.modal-header button {
    z-index: 1;
}

.table_dropdown-content.show {
    display: block;
}

.gradiant-button {
    background: var(--Gradient-one);
    color: var(--white_grey);
}

.toggled-2 .collapse_hide {
    display: none;
}

.toggled-2 .real-imno_flex {
    padding: 3px;
}
.termspayment_develop span{
    padding-right: 10px;
    font-size: 14px;
}
.termspayment_develop .decreasePaymentTermsBtn{
    border: 1px solid #bcbcbc;
    background: transparent;
    height: 42px;
    border-right: 0px;
    width: 38px;
    font-size: 30px;
    border-radius: 10px 0px 0px 10px;
}
.termspayment_develop input{
    text-align: center !important;
    width: 60px !important;
    height: 42px;
    border: 1px solid #bcbcbc;
}
.termspayment_develop .increasePaymentTermsBtn{
    border: 1px solid #bcbcbc;
    background: transparent;
    height: 42px;
    border-left: 0px;
    width: 38px;
    font-size: 25px;
    border-radius: 0px 10px 10px 0px;
}
.dot_main{
    position: absolute;
    top: 0px;
    right: 0px;
}
.dot{
    height: 10px;
    width: 10px;
    background-color: var(--b_primary);
    border-radius: 50px;
}

.checkbox_text {
    display: flex;
    align-items: center;
    gap: 13px;
    padding-top: 20px;
    position: relative;
}
.checkbox_text p {
    font-size: 14px;
}
.custom_flex{
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 100%;
}
.select_commission_logo {
    height: 30px;
    border-right: 2px solid #383192;
}
    </style>
</head>
<body>
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
                    <div class="modal-body_card justify-content-between">
                        <div class="modal-body-card-left-progress d-flex align-items-center gap-4">
                            <div class="min-vh-100 bg-white">
                                <div class="select_commission">
                                    <div class="select_commission_main h-85">
                                        <span></span>
                                        <div class="row d-flex justify-content-between h-100 align-items-center">
                                            <div
                                                class="col-md-6 select_commission_logo h-85 d-flex align-items-center ps-4">
                                                <img src="{{ asset('img/login-logo.png') }}"alt="image"
                                                    class="">
                                            </div>
                                            <div class="col-md-6 pe-4">
                                                <h5 class="modal-title text-end text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                    id="dataFilterModalLabel">Percentage Split Commission Agreement
                                                </h5>
                                            </div>
                                        </div>

                                        <div class="select_commission_scroll px-4">
                                            <div class="row">
                                                <!-- Primary Agent Section -->
                                                <div class="col-6 mt-3 pt-2 d-flex">
                                                    <div class="company-image">
                                                        <img src="{{ $data['primaryAgent']['image'] ?? '/img/default-user.jpg' }}" alt="Agent Image"
                                                             class="pdfagentImage border-r-12" width="80" height="80">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ps-2">
                                                        <p class="pdfagentName text-20 font-weight-700 lineheight-18" id="pdfagentName">
                                                            {{ $data['primaryAgent']['name'] ?? 'Agent Name' }}
                                                        </p>
                                                        <p class="text-16 font-weight-400 lineheight-18 pt-2">Agent</p>
                                                        <p class="text-14 color-primary font-weight-400 lineheight-18 pt-2">Realinmo</p>
                                                    </div>
                                                </div>

                                                <!-- Secondary Agent Section -->
                                                <div class="col-6 mt-3 pt-2 d-flex justify-content-end">
                                                    <div class="d-flex flex-column justify-content-center pe-2">
                                                        <p class="pdfsecondayagentName text-20 font-weight-700 lineheight-18" id="pdfsecondayagentName">
                                                            {{ $data['secondaryAgent']['name'] ?? 'Secondary Agent Name' }}
                                                        </p>
                                                        <p class="text-16 font-weight-400 lineheight-18 pt-2">Agent</p>
                                                        <p class="text-14 color-primary font-weight-400 lineheight-18 pt-2">Realinmo</p>
                                                    </div>
                                                    <div class="company-image">
                                                        <img src="{{ $data['secondaryAgent']['image'] ?? '/img/default-user.jpg' }}" alt="Secondary Agent Image"
                                                             class="pdfsecondayagentImage border-r-12" width="80" height="80" id="pdfsecondayagentImage">
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
                                                        <img src="{{ $data['primaryAgent']['image'] ?? url('/img/default-user.jpg') }}" alt="Agent Image"
                                                             class="pdfagentImage border-r-12" width="80" height="80">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ps-2">
                                                        <p class="pdfagentName text-20 color-primary font-weight-700 lineheight-18">
                                                            {{ $data['primaryAgent']['name'] ?? 'Agent Name' }}
                                                        </p>
                                                        <p class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">Agent</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Email</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['primaryAgent']['email'] ?? 'Not Provided' }}
                                                    </p>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Mobile Number</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['primaryAgent']['phone'] ?? 'Not Provided' }}
                                                    </p>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Date of Birth</p>
                                                    <p class="pdfagentDOB text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['primaryAgent']['dob'] ?? 'Not Provided' }}
                                                    </p>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Gender</p>
                                                    <p class="pdfagentGender text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['primaryAgent']['gender'] ?? 'Not Provided' }}
                                                    </p>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Languages Spoken</p>
                                                    <p class="pdfagentLanguage text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['primaryAgent']['languages'] ?? 'Not Provided' }}
                                                    </p>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Qualification Type</p>
                                                    <p class="pdfagentQualification text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['primaryAgent']['qualification'] ?? 'Not Provided' }}
                                                    </p>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Professional Certifications</p>
                                                    <p class="pdfagentGovernmentCertification text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['primaryAgent']['certifications'] ?? 'Not Provided' }}
                                                    </p>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Government ID</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['primaryAgent']['government_id'] ?? 'Not Uploaded' }}
                                                    </p>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Address</p>
                                                    <p class="pdfagentAddress text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['primaryAgent']['address'] ?? 'Not Provided' }}
                                                    </p>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">A Message to Collaborator Agents</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['primaryAgent']['message'] ?? 'No Message Provided' }}
                                                    </p>
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
                                                        <img src="{{ $data['companyDetails']['company_image'] ?? '/img/default-user.jpg' }}" alt="Default Image" class="pdfcompanyImage border-r-12"
                                                            width="80" height="80">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ps-2">
                                                        <p class="text-20 color-primary font-weight-700 lineheight-18">
                                                            {{ $data['companyDetails']['company_name'] }}
                                                        </p>
                                                        <p class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Agent
                                                        </p>
                                                    </div>
                                                </div>

                                                <!-- Company Details Fields -->
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Email</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanyEmail">
                                                        {{ $data['companyDetails']['company_email'] }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Company Mobile Number:</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanyPhone">
                                                        {{ $data['companyDetails']['company_mobile'] }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Tax Number:</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanyTax">
                                                        {{ $data['companyDetails']['company_tax_number'] }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Company Website:</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanyWebsite">
                                                        {{ $data['companyDetails']['company_website'] }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Primary Service Area:</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanyservicearea">
                                                        {{ $data['companyDetails']['primary_service_area'] }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Professional Title/Role:</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanyProfessional">
                                                        {{ $data['companyDetails']['professional_title'] }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Number of Current Customers:</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanycustomer">
                                                        {{ $data['companyDetails']['number_of_current_customers'] }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Number of Sub-agents:</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanynumagent">
                                                        {{ $data['companyDetails']['company_sub_agent'] }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Property Types Specialized In:</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanypropetytypes">
                                                        {{ $data['companyDetails']['property_types_specialized'] }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Properties in Portfolio:</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanypropertyportfolio">
                                                        {{ $data['companyDetails']['total_properties_in_portfolio'] }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Years of Experience in Real Estate:</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanyyearofexp">
                                                        {{ $data['companyDetails']['total_years_experiance'] }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Average Number of Properties Managed/Listed:</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['companyDetails']['total_years_experiance'] }}
                                                    </p>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                    <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100" id="dataFilterModalLabel">
                                                        Secondary Agent’s Details
                                                    </h5>
                                                </div>
                                                <div class="col-12 mt-3 pt-2 d-flex">
                                                    <div class="company-image">
                                                        <img src="{{ $data['secondaryAgent']['company_image'] ?? '/img/default-user.jpg' }}" alt="Default Image" class="pdfsecondayagentImage border-r-12" width="80" height="80">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ps-2">
                                                        <p class="pdfsecondayagentName text-20 color-primary font-weight-700 lineheight-18">
                                                            {{ $data['secondaryAgent']['name'] }}
                                                        </p>
                                                        <p class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">Agent</p>
                                                    </div>
                                                </div>

                                                <!-- Secondary Agent's Email -->
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Email</p>
                                                    <p class="pdfsecondayagentEmail text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['secondaryAgent']['email'] }}
                                                    </p>
                                                </div>

                                                <!-- Secondary Agent's Phone -->
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Company Mobile Number:</p>
                                                    <p class="pdfsecondayagentPhone text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['secondaryAgent']['phone'] }}
                                                    </p>
                                                </div>

                                                <!-- Secondary Agent's Date of Birth -->
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Date of Birth:</p>
                                                    <p class="pdfsecondayagentDOB text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['secondaryAgent']['date_of_birth'] }}
                                                    </p>
                                                </div>

                                                <!-- Secondary Agent's Gender -->
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Gender:</p>
                                                    <p class="pdfsecondayagentGender text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['secondaryAgent']['gender'] }}
                                                    </p>
                                                </div>

                                                <!-- Secondary Agent's Languages Spoken -->
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Languages Spoken:</p>
                                                    <p class="pdfsecondayagentLanguage text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['secondaryAgent']['languages_spoken'] }}
                                                    </p>
                                                </div>

                                                <!-- Secondary Agent's Qualification Type -->
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Qualification Type:</p>
                                                    <p class="pdfsecondayagentQualification text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['secondaryAgent']['qualification_type'] }}
                                                    </p>
                                                </div>

                                                <!-- Secondary Agent's Government Certification -->
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Professional Certifications:</p>
                                                    <p class="pdfsecondayagentGovernmentCertification text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['secondaryAgent']['government_certification'] }}
                                                    </p>
                                                </div>

                                                <!-- Secondary Agent's Government ID -->
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Government ID:</p>
                                                    <p class="pdfsecondayagentGovernmentCertification text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['secondaryAgent']['government_certification'] }}
                                                    </p>
                                                </div>

                                                <!-- Secondary Agent's Property Specialization -->
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Property Types Specialized In:</p>
                                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        Apartment, Apartment Duplex
                                                    </p>
                                                </div>

                                                <!-- Secondary Agent's Address -->
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <p class="text-14 color-primary font-weight-700 lineheight-18">Address:</p>
                                                    <p class="pdfsecondayagentAddress text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                        {{ $data['secondaryAgent']['address'] }}
                                                    </p>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                    <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                        id="dataFilterModalLabel">Secondary Agent’s Company Details
                                                    </h5>
                                                </div>

                                                <div class="col-12 mt-3 pt-2 d-flex">
                                                    <div class="company-image">
                                                        <img src="{{ $data['secondarycompanyDetails']['company_image'] ?? '/img/default-user.jpg' }}"
                                                            alt="Default Image" class="pdfsecondarycompanyImage border-r-12"
                                                            width="80" height="80">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ps-2">
                                                        <p class="text-20 color-primary font-weight-700 lineheight-18">
                                                            {{ $data['secondarycompanyDetails']['company_name'] ?? 'Realinnmo' }}
                                                        </p>
                                                        <p class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Agent
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Email</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfsecondarycompanyEmail">
                                                            {{ $data['secondarycompanyDetails']['company_email'] ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Company Mobile Number:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfsecondarycompanyPhone">
                                                            {{ $data['secondarycompanyDetails']['company_mobile'] ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Tax Number:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfsecondarycompanyTax">
                                                            {{ $data['secondarycompanyDetails']['company_tax_number'] ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Company Website:</p>
                                                        <p class="pdfsecondarycompanyWebsite text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            {{ $data['secondarycompanyDetails']['company_website'] ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Primary Service Area:</p>
                                                        <p class="pdfsecondarycompanyservicearea text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            {{ $data['secondarycompanyDetails']['primary_service_area'] ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Professional Title/Role:</p>
                                                        <p class="pdfsecondarycompanyProfessional text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            {{ $data['secondarycompanyDetails']['professional_title'] ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Number of Current Customers:</p>
                                                        <p class="pdfsecondarycompanycustomer text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            {{ $data['secondarycompanyDetails']['number_of_current_customers'] ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Numbers of sub-agents:</p>
                                                        <p class="pdfsecondarycompanynumagent text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            {{ $data['secondarycompanyDetails']['company_sub_agent'] ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Property Types Specialized In:</p>
                                                        <p class="pdfsecondarycompanypropetytypes text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            {{ $data['secondarycompanyDetails']['property_types_specialized'] ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Properties in Portfolio:</p>
                                                        <p class="pdfsecondarycompanypropertyportfolio text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            {{ $data['secondarycompanyDetails']['total_properties_in_portfolio'] ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Years of Experience in Real Estate:</p>
                                                        <p class="pdfsecondarycompanyyearofexp text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            {{ $data['secondarycompanyDetails']['total_years_experiance'] ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Average Number of Properties Managed/Listed:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            {{ $data['secondarycompanyDetails']['average_properties_managed'] ?? '3000+ Properties' }}
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
                                                        <img src="{{ $data['propertyJson']['cover_image'] ?? '/img/default-user.jpg' }}"
                                                            alt="Default Image" class="border-r-12 propertyImage"
                                                            width="80" height="80">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ps-2">
                                                        <p class="text-20 color-primary font-weight-700 lineheight-18 propertyName">
                                                            {{ $data['propertyJson']['name'] ?? 'Property Name' }}
                                                        </p>
                                                        <p class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2 propertyType">
                                                            {{ $data['propertyJson']['type']['name'] ?? 'Property Type' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Property Listed As:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertyListed">
                                                            {{ $data['propertyJson']['listed_as'] ?? 'Listed As' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Property Price:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertyprice">
                                                            €{{ $data['propertyJson']['price'] ?? '0' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Property Type:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertyType">
                                                            {{ $data['propertyJson']['type']['name'] ?? 'Property Type' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Property Subtype:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertySubtype">
                                                            {{ isset($data['propertyJson']['subtype']) && $data['propertyJson']['subtype']['name'] ? $data['propertyJson']['subtype']['name'] : 'Subtype' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Total Size:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertySize">
                                                            {{ $data['propertyJson']['size'] ?? '0' }} m²
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Bedroom:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertybedroom">
                                                            {{ $data['propertyJson']['bedrooms'] ?? '0' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Bathroom:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertybathroom">
                                                            {{ $data['propertyJson']['bathrooms'] ?? '0' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Property Status/Completion:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertyStatus">
                                                            {{ $data['propertyJson']['status'] ?? 'Status' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Commission:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertycommission">
                                                            {{ $data['propertyJson']['commission'] ?? '0%' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Listing Agent:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertylist_agent_per">
                                                            {{ $data['propertyJson']['list_agent_per'] ?? '0%' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Listing Agent:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertylist_agent_com">
                                                            €{{ $data['propertyJson']['list_agent_com'] ?? '0.00' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2"></div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Selling Agent:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertysell_agent_per">
                                                            {{ $data['propertyJson']['sell_agent_per'] ?? '0%' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Selling Agent:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertysell_agent_com">
                                                            €{{ $data['propertyJson']['sell_agent_com'] ?? '0.00' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Address:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertyaddress">
                                                            {{ $data['propertyJson']['address'] ?? 'Address' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">Description:</p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertydescription">
                                                            {{ $data['propertyJson']['description'] ?? 'Description' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                    <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100" id="dataFilterModalLabel">Proposed commission terms</h5>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Template Type:
                                                        </p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 commisionType">
                                                            <?php echo $data['commissionData']['commission_type']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Percentage:
                                                        </p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 commisionPer">
                                                            <?php echo $data['commissionData']['percentage']; ?>%
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Commission:
                                                        </p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 commissionTotal">
                                                            <?php
                                                                $commission_amount = '';
                                                                if ($data['commissionData']['commission_type'] === 'percentage') {
                                                                    $commission_amount = $data['commissionData']['commission_amount'];
                                                                } elseif ($data['commissionData']['commission_type'] === 'fixed') {
                                                                    $commission_amount = $data['fixed_amount'];
                                                                } elseif ($data['commissionData']['commission_type'] === 'tiered') {
                                                                    $commission_amount = "tiered";
                                                                }
                                                                echo "€" . $commission_amount;
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Agreement Start Date:
                                                        </p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 agreementStartdate">
                                                            <?php echo $data['commissionData']['agreement_start_date']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Agreement End Date:
                                                        </p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 agreementEnddate">
                                                            <?php echo $data['commissionData']['agreement_end_date']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2 pb-4">
                                                    <div>
                                                        <p class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Additional Terms/Notes:
                                                        </p>
                                                        <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 additionalNote">
                                                            <?php echo $data['commissionData']['additional_note']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row border-top">
                                                <div class="col-12 mt-3">
                                                    <h5 class="pt-1 text-end text-16 font-weight-700 lineheight-22 color-primary w-100 secondaryAgentNameSignature" id="dataFilterModalLabel">
                                                        <?php echo $data['secondaryAgent']['name']; ?> Signature:
                                                    </h5>
                                                </div>
                                            </div>


                                            <div class="text-end pt-2">
                                                <div  id="mySavedSignature"><img src="{{public_path('storage/signatures/' . $data['secondaryAgent']['signature']) }}"
                                                            alt="Default Image" class="border-r-12 propertyImage"
                                                            width="80" height="80"></div>

                                            </div>

                                            <div class="text-end pt-4">
                                                <button type="button" onclick="generatePdf()"
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
</body>
</html>
