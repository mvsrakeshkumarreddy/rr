<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style type="text/css">

div.min-h-screen {
    background: -moz-linear-gradient(45deg, #02e1ba 0%, #26c9f2 29%, #d911f2 66%, #ffa079 100%);
    background: -webkit-linear-gradient(45deg, #02e1ba 0%,#26c9f2 29%,#d911f2 66%,#ffa079 100%);
    background: linear-gradient(45deg, #02e1ba 0%,#26c9f2 29%,#d911f2 66%,#ffa079 100%);
    background-size: 400% 400%;
    -webkit-animation: Gradient 15s ease infinite;
  -moz-animation: Gradient 15s ease infinite;
  animation: Gradient 15s ease infinite;

}

div.min-h-screen::before, 
div.min-h-screen::after {
  content: "";
  width: 70vmax;
  height: 70vmax;
  position: absolute;
  background: rgba(255, 255, 255, 0.07);
  left: -20vmin;
  top: -20vmin;
  animation: morph 15s linear infinite alternate, spin 20s linear infinite;
  z-index: 1;
  will-change: border-radius, transform;
  transform-origin: 55% 55%;
  pointer-events: none; 
}
  
div.min-h-screen::after {
    width: 70vmin;
    height: 70vmin;
    left: auto;
    right: -10vmin;
    top: auto;
    bottom: 0;
    animation: morph 10s linear infinite alternate, spin 26s linear infinite reverse;
    transform-origin: 20% 20%; 
}

@-webkit-keyframes Gradient {
  0% {
    background-position: 0 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0 50%
  }
}

@-moz-keyframes Gradient {
  0% {
    background-position: 0 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0 50%
  }
}

@keyframes Gradient {
  0% {
    background-position: 0 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0 50%
  }
}

@keyframes morph {
  0% {
    border-radius: 40% 60% 60% 40% / 70% 30% 70% 30%; }
  100% {
    border-radius: 40% 60%; } 
}

@keyframes spin {
  to {
    transform: rotate(1turn); 
  } 
}
  .st0{display:none;}
  .st1{display:inline;}
  .st2{opacity:0.29;}
  .st3{fill:#FFFFFF;}
  .st4{clip-path:url(#SVGID_2_);fill:#FFFFFF;}
  .st5{clip-path:url(#SVGID_4_);}
  .st6{clip-path:url(#SVGID_6_);}
  .st7{clip-path:url(#SVGID_8_);}
  .st8{clip-path:url(#SVGID_10_);}
  .st9{fill:none;}
  .st10{clip-path:url(#SVGID_12_);}
  .st11{opacity:0.7;}
  .st12{clip-path:url(#SVGID_14_);}
  .st13{opacity:0.2;}
  .st14{clip-path:url(#SVGID_16_);}
  .st15{opacity:0.3;fill:#FFFFFF;enable-background:new    ;}




</style>

<script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
