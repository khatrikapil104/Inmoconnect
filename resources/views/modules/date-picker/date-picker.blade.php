<!-- @extends('layouts.app') -->
<!-- @section('content') -->
@push('styles')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<style>

header.header.b-color-primary.position-fixed.w-100{
    display:none;
}
.ui-helper-hidden {
  display: none;
}




p {
  color: #fff;
  font-size: 20px;
}
input {
font-size: 12px;
font-weight: 400;
line-height: 15px; 
    border-radius: 8px;
    border: 1px solid var(--Black-Grey-Color, #17213A);
    height: 42px;
  margin-right: 50px;
  outline: none;
  background-color: transparent;
  border-radius: 5px;
  color:#17213A;
  padding-left: 12px!important;
}

/* .ui-timepicker-viewport {
    border-radius: 12px;
    border: 1px solid #DEDEDE;
    background: #FFF;
    box-shadow: 0px 0px 4px 1px rgba(91, 91, 91, 0.20);
} */
.ui-timepicker-viewport{
    overflow: auto;
    overflow-x: hidden;
    margin-top: 5px;
    margin-left: -10px;
    margin-bottom: 5px;
}
.ui-timepicker-standard .ui-state-hover {
    border: none;
    color: #212121;
    background-color: var(--background) !important;
    color: var(--B_blue) !important;
}
.ui-timepicker-standard a{
    color:  #17213A;
font-size: 14px;
font-weight: 400;
line-height: 18px; 
    padding:10px 0;
    border:none;
}
.ui-timepicker-standard{
    border-radius: 12px;
    background: #FFF;
    box-shadow: 0px 0px 4px 1px rgba(91, 91, 91, 0.20);
    font-family: Verdana,Arial,sans-serif;
    font-size: inherit;
    background-color: transparent;
    color: transparent;
    margin-top: 10px;
    padding: 0;
    border: 1px solid #DEDEDE;
}
.timepicker {
  width: 100%;
}

.inputGroup {
  display: flex;
}
input.timepicker:after{

}

</style>
@endpush

<div class="row">
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
  <div class="form-group mt-3 position-relative ">
  <label class="text-14 font-weight-400 lineheight-18 color-b-blue">Time <span class="required">*</span></label>
    <input type="text" class="timepicker">
</div>
</div>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
  <div class="form-group mt-3 position-relative ">
  <label class="text-14 font-weight-400 lineheight-18 color-b-blue">Time <span class="required">*</span></label>
    <input type="text" class="timepicker">
</div>
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js" integrity="sha512-ux1VHIyaPxawuad8d1wr1i9l4mTwukRq5B3s8G3nEmdENnKF5wKfOV6MEUH0k/rNT4mFr/yL+ozoDiwhUQekTg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
 $('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
// $('.timepicker').timepicker({
//     timeFormat: 'h:mm p',
//     interval: 60,
//     minTime: '10',
//     maxTime: '6:00pm',
//     defaultTime: '11',
//     startTime: '10:00',
//     dynamic: false,
//     dropdown: true,
//     scrollbar: true
// });

</script>