<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Not Found</title>

      <!-- favicon -->
      <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/svg+xml" />

    <style>

@import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");
        body {
            overflow:hidden;
            margin: 0;
            padding: 0;
            background-color:#F3F4F6;
            font-family: "Lato", sans-serif;
        }
        .main-page{
            padding: 35px 0 0 0;
        }
        .error-one{
            position:absolute;
            left:-88px;
            top: 47px;
            animation: leftrotateone 4s ease-in-out infinite;
        }
        @keyframes leftrotateone {
            0%{
                left:-88px;
            }
            50%{
                left:88px;
            }
            100%{
                left:-88px;
            }
        }
        .error-two{
            position:absolute;
            right:0;
            animation: leftrotate 4s ease-in-out infinite;
        }
        @keyframes leftrotate {
            0%{
                right:0;
            }
            50%{
                right:100px;
            }
            100%{
                right:0px;
            }
        }
        .error-three{
            position: absolute;
    left: 50%;
    transform: translateX(-50%);
        }
        .error-main-page{
            position:absolute;
            left: 50%;
    transform: translateX(-50%);
    bottom: 0;
        }
        .error-four{
            position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-180%) rotate(-20deg);
    animation:rotateone 2s 
        }
        @keyframes rotateone {
            0%{
                transform: translateX(-95%) rotate(0deg);
            }
            100%{
                transform: translateX(-180%) rotate(-20deg);
            }
        }
        .error-five{
            position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(80%) rotate(20deg);
    animation:rotatetwo 2s 
        }
        @keyframes rotatetwo {
            0%{
                transform: translateX(5%) rotate(0deg);
            }
            100%{
                transform: translateX(80%) rotate(20deg);
            }
        }
        .error-five img{
            height:400px;
        }
        .error-four img{
            height:400px;
        }
        .error_text{
            margin: 0 20px;
    text-align: center;
    top: -99px;
    position: relative;
    animation:fadeup 2s ease backwards;;
    opacity:1;
}
@keyframes fadeup {
    0%{transform:translate(0px, 100px); opacity: 0;}
  100%{transform:translate(0px, 0); opacity: 1;}
    
}
.error_text h2{
    font-size:40px;
    font-weight:700;
    line-height:38px;
    color:#383192;
    margin:0;
}
.error_text h4{
 margin:0;
 font-size:36px;
 font-weight:400;
 line-height:42px;
 color:#383192;
 padding: 12px 0 0 0;
}
.error_text p{
  color:#383192;
  font-size:14px;
  line-height:18px;
  font-weight:400;
  margin:0;
  padding: 39px 0 37px 0;
}
a.error_button{
    font-size: 14px;
    text-decoration: none;
    font-weight: 700;
    width: 152px;
    margin: auto;
    height: 42px;
    border: 1px solid #383192;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}
    </style>
</head>
<body>
    <div class="main-page">
       <div class="error-one">
         <img src="{{ asset('img/error-4.png') }}" alt="image">
       </div>
       <div class="error-two">
         <img src="{{ asset('img/error-3.png') }}" alt="image">
       </div>
       <div class="error-three">
         <img src="{{ asset('img/error-5.svg') }}" alt="image">
       </div>
       <div class="error-main-page">
       <div class="error-four">
         <img src="{{ asset('img/error-1.png') }}" alt="image">
       </div>
       <div class="error_text" style="animation-delay:1s;">
        <h2>Ooops...</h2>
        <h4>Page not found</h4>
        <p>The page you are looking for doesn’t exist or an other error<br>
            occured,go back to homepage</p>
        <a href="" class="error_button">Go to homepage</a>
       </div>
       <div class="error-five">
         <img src="{{ asset('img/error-2.png') }}" alt="image">
       </div>
    </div>
    </div>
    
</body>
</html>