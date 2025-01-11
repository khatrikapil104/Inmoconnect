<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     {{-- bootstrap --}}
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="empty-search-header" style="max-width:1045px ; margin-left:auto; margin-right:auto; height:100vh; display:block; align-items:center; width:100%;"> {{-- i add this class for my view --}}
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
    </div>
    
    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>