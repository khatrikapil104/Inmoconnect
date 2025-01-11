<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        section{
            display:flex;
            align-items:center;
            justify-content:center;
            height:100vh;
            width:100%;
            background:#fff;
        }
        section .dots{
            position:relative;
            animation: outercontainer 4s linear infinite;
        }
         section .dots span{
            position:absolute;
            height:25px;
            width:25px;
            background:#383192;
            border-radius:50%;
            transform:rotate(calc(var(--i)*(360deg / 8)))translate(64px);
            animation:animate 0.9s linear infinite;
            animation-delay:calc(var(--i) * 0.1s);
            opacity:0;
         }
         @keyframes animate{
            0%{
                opacity:1;
            }
            100%{
                opacity:0;
            }
         }
         @keyframes outercontainer {
  100% {
    transform: rotate(360deg); } }
 
    </style>
</head>
<body>
    <section>
        <div class="dots">
            <span class="abc" style="--i:1;"></span>
            <span style="--i:2;"></span>
            <span style="--i:3;"></span>
            <span style="--i:4;"></span>
            <span style="--i:5;"></span>
            <span style="--i:6;"></span>
            <span style="--i:7;"></span>
            <span style="--i:8;"></span>
        </div>
    </section>
</body>
</html>