<!-- <!DOCTYPE html>
<html>

<head>
  <title>Hello, World!</title>
  <style>
    .loader {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100px;

    }

    .circle {
      width: 20px;
      height: 20px;
      border-radius: 50%;
      margin: 0 10px;
      background-color: #5047C2;

    }

    .circle:nth-child(1) {
      /* Darker purple color */
      animation: positionShift1 3s infinite linear;
    }

    .circle:nth-child(2) {
      /* Slightly lighter purple color */
      animation: positionShift2 3s infinite linear;
    }

    .circle:nth-child(3) {
      /* Even lighter purple color */
      animation: positionShift3 3s infinite linear;
    }

    @keyframes positionShift1 {
      0% {
        transform: translateX(-30px);
        opacity: 1;
      }

      50% {
        opacity: 0.5;
      }

      100% {
        transform: translateX(30px);
        opacity: 0;
      }
    }

    @keyframes positionShift2 {
      0% {
        transform: translateX(-30px);
        opacity: 1;
      }

      50% {
        opacity: 0.5;
      }

      100% {
        transform: translateX(30px);
        opacity: 0;
      }
    }

    @keyframes positionShift3 {
      0% {
        opacity: 1;
        transform: translateX(-10px);
      }

      50% {
        opacity: 0.5;
      }

      100% {
        opacity: 0;
        transform: translateX(10px);
      }
    }
  </style>
</head>

<body>
  <div class="loader">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>

  </div>
  <script src="script.js"></script>
</body>

</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      margin: 0;
      padding: 0;

    }

    .preloader {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      --init-wrap: 45%;
    }



    .wrapper,
    .dot {
      width: 16px;
      height: 16px;
      border-radius: 50%;
    }

    .dot {
      background-color: #5047C2;
    }

    #secondWrap .dot {
      background-color: #6D66CC;
    }

    #thirdWrap .dot {
      background-color: #8A85D6;
    }

    .wrapper {
      position: absolute;
      top: calc(var(--top) + 36px);
      left: var(--init-wrap);
    }

    #firstWrap {
      animation: grow 1.5s infinite;
    }

    #secondWrap {
      animation: slide 1.5s infinite;
    }

    #thirdWrap {
      left: calc(var(--init-wrap) + 30px);
      animation: slide 1.5s infinite;
    }

    #fourthWrap {
      left: calc(var(--init-wrap) + 45px);
      animation: slideOnDrop 1.5s linear infinite;
    }

    #fourthWrap div {
      animation: drop 1.5s ease-in infinite;
    }

    @keyframes slide {
      0% {
        transform: translate(0px, 0px);
      }

      50% {
        transform: translate(30px, 0px);
      }

      100% {
        transform: translate(30px, 0px);
      }
    }


    @keyframes grow {

      0% {
        transform: scale(0);
      }


      50%,
      100% {
        transform: scale(1);
      }
    }

    @keyframes slideOnDrop {

      0%,
      20% {
        transform: translateX(0);
      }

      25% {
        transform: translateX(11px);
      }

      100% {
        transform: translateX(250px);
      }
    }

    @keyframes drop {

      0%,
      25% {
        opacity: 0;
        transform: translate(0px, 0px);
      }

      100% {
        opacity: 0;
      }
    }
  </style>
</head>

<body>
  <div class="preloader">
    <div class="wrapper" id="firstWrap">
      <div class="dot"></div>
    </div>
    <div class="wrapper" id="secondWrap">
      <div class="dot"></div>
    </div>
    <div class="wrapper" id="thirdWrap">
      <div class="dot"></div>
    </div>
    <div class="wrapper" id="fourthWrap">
      <div class="dot"></div>
    </div>
  </div>
</body>

</html>