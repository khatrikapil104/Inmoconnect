@extends('layouts.app')
@section('content')

@section('title')
    {{ trans('messages.properties.View_Property') }} Inmoconnect
@endsection

<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="min-vh-100 b-color-background">
    <div class="crm-main-content">

        {{-- breadcrumb  --}}
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                        Draw Digital Signature
                    </div>
                </div>
            </div>
        </div>
        {{-- end-breadcrumb --}}


        <button type="button"
            class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
            data-toggle="modal" data-target="#customer_details">
            <i class=" icon-Export me-2 icon-20"></i>
            Connect Agent</button>


        {{-- modal-subagent --}}
        <div class="modal fade" id="customer_details" tabindex="-1" role="dialog"
            aria-labelledby="customer_detailsLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_three" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Edit Group</h4>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">
                        <div id="canvas-wrap">
                            <canvas></canvas>
                            <div class="d-flex justify-content-between pt-30 align-items-center">

                                <input type="button" id="clear" value="Clear"
                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center">
                                <input type="button" id="download_sig-pad" value="Add Signature"
                                    class="small-button Gradient_button   border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  " />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>

    <script>
        var canvas = document.querySelector('canvas');
        canvas.style.position = 'relative';
        canvas.style.top = "0";
        canvas.style.left = "0";

        var ctx = canvas.getContext('2d');
        canvas.width = 666;
        canvas.height = 368;

        ctx.lineWidth = 3;
        ctx.lineJoin = ctx.lineCap = 'round';

        var isDrawing, drawLine;

        canvas.onmousedown = function(event) {
            isDrawing = true;
            drawLine = {
                x: event.clientX,
                y: event.clientY
            };
        };

        canvas.onmousemove = function(event) {
            if (!isDrawing) return;

            ctx.beginPath();

            ctx.moveTo(drawLine.x, drawLine.y);
            ctx.lineTo(event.clientX, event.clientY);
            ctx.stroke();

            drawLine = {
                x: event.clientX,
                y: event.clientY
            };
        };

        canvas.onmouseup = function() {
            isDrawing = false;
        };

        document.getElementById('clear').addEventListener('click', function() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }, false);

        window.onload = function() {
            var save = document.getElementById('download');

            save.onclick = function() {
                download(canvas, 'signature.png');
            }

        }

        function download(canvas, filename) {
            var lnk = document.createElement('a'),
                e;
            lnk.download = filename;
            lnk.href = canvas.toDataURL("image/png;base64");

            if (document.createEvent) {
                e = document.createEvent("MouseEvents");
                e.initMouseEvent("click", true, true, window,
                    0, 0, 0, 0, 0, false, false, false,
                    false, 0, null);

                lnk.dispatchEvent(e);
            } else if (lnk.fireEvent) {
                lnk.fireEvent("onclick");
            }
        }
    </script>
@endpush
@endsection
