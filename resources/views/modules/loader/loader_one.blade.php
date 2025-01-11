<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .flexbox {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}

.flexbox > div {
  width: 60px;
  height: 60px;
  -webkit-box-flex: 0;
  /* -ms-flex: 0 0 25%;
  flex: 0 0 25%; */
  border: 1px solid rgba(255, 255, 255, 0.1);
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  overflow: hidden;
}
.bt-spinner {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: transparent;
  border: 4px solid transparent;
  border-top-color: #383192;
  -webkit-animation: 1.5s spin linear infinite;
  animation: 1.5s spin linear infinite;
}

@-webkit-keyframes spin {
  from {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
    </style>
</head>
<body>
   
<div class="flexbox">
<div>
    <div class="bt-spinner"></div>
  </div>
</div>
</body>
</html>
