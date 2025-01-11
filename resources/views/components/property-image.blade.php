<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
    <style>
  /* .gallery_sec{
  width:100%;
  padding:80px 0;
} */
/* .heading{
  width:100%;
  text-align:center;
}
.heading h2{
  font-size:30px;
  font-weight:bold;
  border-bottom:2px solid #000;
  padding-bottom:25px;
} */
/* .gallery_sec img{
  width:100%;
  margin-bottom:30px;
  height:250px;
} */

.gallery_sec a {
    position: relative;
    transition: 0.3s ease-in-out;
    -webkit-transition: 0.3s ease-in-out;
    -moz-transition: 0.3s ease-in-out;
    -ms-transition: 0.3s ease-in-out;
    -o-transition: 0.3s ease-in-out;
}


.gallery_sec a::before {
    position: absolute;
    content: "";
    width: 30px;
    height: 30px;
    background: none;
    background-size: contain;
    background-repeat: no-repeat;
  top:45%;
  left:50%;
  transform:translate(-50%, -50%);
}

.gallery_sec img {
    transition: 0.3s ease-in-out;
    -webkit-transition: 0.3s ease-in-out;
    -moz-transition: 0.3s ease-in-out;
    -ms-transition: 0.3s ease-in-out;
    -o-transition: 0.3s ease-in-out;
}

.gallery_sec a:hover img {
    position: relative;
    width: 100%;
}

.gallery_sec a:hover img {
    opacity: 0.2;
}

.gallery_sec a:hover::before {
    position: absolute;
    content: "";
    width: 50px;
    height: 50px;
    background: url(https://i.ibb.co/3fMkjjF/Resize.png);
    background-size: contain;
    background-repeat: no-repeat;
    z-index: 99;
}

    </style>
</head>
<body>

<div class="empty-search-header" style="max-width:1045px ; margin-left:auto; margin-right:auto; height:100vh; display:flex; align-items:center">  <!-- i add this class for my view  -->
    <div class="row">
      <div class="col-lg-5 col-md-4 col-sm-6 col-12">
        <a href="https://i.ibb.co/dmT6NHh/fisherman-gc9495bcda-1280.jpg" data-fancybox="gallery">
          <img src="https://i.ibb.co/dmT6NHh/fisherman-gc9495bcda-1280.jpg" alt="image" class="w-100 h-100 object-fit-fill">
        </a>
      </div> 
      <div class="col-lg-7 col-md-4 col-sm-6 col-12">
        <div class="row">
          <div class="col-lg-6">
            <a href="https://i.ibb.co/v4mB4vW/forest-gb17435f3a-1280.jpg" data-fancybox="gallery">
              <img src="https://i.ibb.co/v4mB4vW/forest-gb17435f3a-1280.jpg" alt="image" class="w-100 h-100 object-fit-fill">
            </a>
          </div>
          <div class="col-lg-6">
            <a href="https://i.ibb.co/mScz9ws/mountains-g03e6940eb-1280.jpg" data-fancybox="gallery">
              <img src="https://i.ibb.co/mScz9ws/mountains-g03e6940eb-1280.jpg" alt="image" class="w-100 h-100 object-fit-fill">
            </a> 
          </div>
        </div>     
        <div class="row mt-3">
          <div class="col-lg-6">
            <a href="https://i.ibb.co/mScz9ws/mountains-g03e6940eb-1280.jpg" data-fancybox="gallery">
              <img src="https://i.ibb.co/mScz9ws/mountains-g03e6940eb-1280.jpg" alt="image" class="w-100 h-100 object-fit-fill">
            </a>
          </div>
          <div class="col-lg-6">
            <a href="https://i.ibb.co/VDGc2gx/poppies-gb4b7e7414-1280.jpg" data-fancybox="gallery">
              <img src="https://i.ibb.co/VDGc2gx/poppies-gb4b7e7414-1280.jpg" alt="image" class="w-100 h-100 object-fit-fill">
            </a> 
          </div>
        </div>     
      </div>      
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
    // Your custom options
});
</script>
</body>
</html>