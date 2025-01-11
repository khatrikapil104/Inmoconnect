<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    * {
  padding: 0;
  margin: 0;
  box-sizing: border-box; }

body {
  min-height: 100vh;
  min-width: 100vw;
  font-family: "Architects Daughter", cursive; }

.grid {
  display: flex;
  height: 100%;
  width: 100%;
  flex-wrap: wrap; }

.loader {
  width: 50vw;
  height: 50vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center; }
  #ld3 {
  position: relative;
  /* animation: outercontainer 4s linear infinite; 
  animation-delay: 2s;
  animation-play-state: running; */
  animation-name: outercontainer;
  -webkit-animation-name: outercontainer;

  animation-iteration-count: infinite;
  -webkit-animation-iteration-count: infinite;
  animation-duration: 4s;
  -webkit-animation-duration: 4s;

  /* -webkit-animation-delay: 2.5s;
  animation-delay: 2.5s; */
  animation-timing-function: linear;
  -webkit-animation-timing-function: linear;}
  #ld3 div {
    height: 25px;
    width: 25px;
    border-radius: 50%;
    position: absolute;
    top: 0;
    bottom: 0;
    /* left: 0;
    right: 0; } */
  }
  #ld3 div:nth-child(1) {
    top: 60px;
    background: #383192;
    opacity:1;
    animation: ld3_div1 2s linear infinite; 
  }
  #ld3 div:nth-child(2) {
    top: 39px;
    right: 18px;
    opacity:0.1;
    background: #383192;
    animation: ld3_div2 2s linear infinite; 
  }
  #ld3 div:nth-child(3) {
    top: -60px;
    opacity:0.5;
    background: #383192;
    animation: ld3_div3 2s linear infinite; 
  }
  #ld3 div:nth-child(4) {
    top: -45px;
    left: 46px;
    opacity:0.6;
    background: #383192;
    animation: ld3_div4 2s linear infinite; 
  }
  #ld3 div:nth-child(5) {
    left: 60px;
    background: #383192;
    opacity:0.2;
    animation: ld3_div5 2s linear infinite; 
  }
  #ld3 div:nth-child(6) {
    left: 47px;
    top: 43px;
    opacity:0.8;
    background: #383192;
    animation: ld3_div6 2s linear infinite; 
  }
  #ld3 div:nth-child(7) {
    left: -60px;
    opacity:0.7;
    background: #383192;
    animation: ld3_div7 2s linear infinite;
   }
   #ld3 div:nth-child(8) {
    left: -39px;
    top: -42px;
    opacity:0.3;
    background: #383192;
    animation: ld3_div8 2s linear infinite;
   }

@keyframes outercontainer {
  100% {
    transform: rotate(360deg); } }
@keyframes ld3_div1 {
  0% {
    opacity:1;
    /* background:#383192; */
    top: 60px; }
  25% {
    /* background:#8A85D6; */
    top: 40px; }
  50% {
    opacity:0.1;
    /* background:#F1F0FA; */
    top: 60px; }
  75% {
    /* background:#8A85D6; */
    top: 25px; }
  100% {
    opacity:1;
    /* background:#383192; */
    top: 60px; } }
    @keyframes ld3_div2 {
  0% {
    /* background: #F1F0FA; */
    top: 39px;
    right: 18px; }
  25% {
    top: 24px;
    right: 0px; }
  50% {
    /* background: #383192; */
    top: 39px;
    right: 18px; }
  75% {
    top: 19px;
    right: -5px; }
  100% {
    /* background: #F1F0FA; */
    top: 39px;
    right: 18px; } }
@keyframes ld3_div3 {
  0% {
    /* background: #B6B3E6; */
    top: -60px; }
  25% {
    top: -40px; }
  50% {
    /* background:#E2E0F5; */
    top: -60px; }
  75% {
    top: -25px; }
  100% {
    /* background: #B6B3E6; */
    top: -60px; } }
    @keyframes ld3_div4{
  0% {
    /* background: #8A85D6; */
    top: -45px;
    left: 46px;}
  25% {
    top: -26px;
    left: 26px; }
  50% {
    /* background:#D3D1F0; */
    top: -45px;
    left: 46px; }
  75% {
    top: -18px;
    left: 18px; }
  100% {
    /* background: #8A85D6; */
    top: -45px;
    left: 46px; } }
@keyframes ld3_div5 {
  0% {
    /* background: #E2E0F5; */
    left: -60px; }
  25% {
    left: -40px; }
  50% {
    /* background:#383192; */
    left: -60px; }
  75% {
    /* background:#B6B3E6; */
    left: -25px; }
  100% {
    /* background: #E2E0F5; */
    left: -60px; } }
    @keyframes ld3_div6 {
  0% {
    opacity:0.8;
    /* background: #5047C2; */
    left: 47px;
    top: 43px; }
  25% {
    opacity:1;
    /* background:#5047C2; */
    left: 27px;
    top: 23px; }
  50% {
    opacity:0.4;
    /* background:#F1F0FA; */
    left: 47px;
    top: 43px; }
  75% {
    opacity:0.1;
    left: 18px;
    top: 18px; }
  100% {
    opacity:0.8;
    /* background: #5047C2; */
    left: 47px;
    top: 43px; } }
@keyframes ld3_div7 {
  0% {
    opacity:0.7;
    /* background: #6D66CC; */
    left: 60px; }
  25% {
    opacity:0.9;
    /* background:#383192; */
    left: 40px; }
  50% {
    opacity:0.5;
    /* background:#B6B3E6; */
    left: 60px; }
  75% {
    opacity:0.2;
    left: 25px; }
  100% {
    opacity:0.7;
    /* background: #6D66CC; */
    left: 60px; } }
    @keyframes ld3_div8 {
  0% {
    /* background: #D3D1F0; */
    left: -39px;
    top: -42px; }
  25% {
    left: -25px;
    top: -25px; }
  50% {
    /* background:#F1F0FA; */
    left: -39px;
    top: -42px; }
  75% {
    left: -18px;
    top: -18px; }
  100% {
    /* background: #D3D1F0; */
    left: -39px;
    top: -42px; } }
  </style>
</head>
<body>
<div class="loader">
        <div id="ld3">
          <div>
          </div>
          <div>
          </div>
          <div>
          </div>
          <div>
          </div>
        <div>
          </div>
          <div>
          </div>
          <div>
          </div>
          <div>
          </div>
        </div>
      </div>
  </div>
</body>
</html>

