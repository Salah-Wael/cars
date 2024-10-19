<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cars - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/auth/register.css') }}">
  </head>
  <body>
    <div id="full">
      <div class="w-[800px] min-h-[600px] flex bg-neutral-50 rounded-lg shadow-lg">
        <div class="w-[400px] bg-neutral-300 flex items-center justify-center">
            <img src="{{asset('assets/img/app/1.jpeg')}}" alt="" >
            <audio controls loop >
      <source src="audio and video/download.mp3" type="audio/mp3">
      <source src="audio and video/download.ogg" type="audio/ogg">
      <source src="audio and video/download.wav" type="audio/wav">
      your browser doesn't support audio tag
    </audio>
        </div>
        <div class="w-[400px] flex flex-col items-center justify-center p-8 bg-neutral-50">

            @yield('content')

        </div>
      </div>
    </div>
  </body>
</html>
