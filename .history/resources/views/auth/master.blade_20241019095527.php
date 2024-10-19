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
      <div style="width: 800px; height:550px;" class="flex bg-neutral-50 rounded-lg shadow-lg">
        {{-- <div class="w-[400px] bg-neutral-300 flex items-center justify-center">
            <img src="{{asset('assets/img/app/1.jpeg')}}" alt="" >
        </div> --}}
        <div style="height: 550px; padding-top:90px;" class="w-full h-full flex items-center justify-center">
            <video style="border-radius: 8%" class="w-full h-full object-cover" autoplay muted>
                <source src="{{ asset('assets/video/authh.mp4') }}" type="video/mp4">
            </video>
        </div>

        <div class="w-[400px] flex flex-col items-center justify-center p-8 bg-neutral-50">

            @yield('content')

        </div>
      </div>
    </div>
  </body>
</html>
