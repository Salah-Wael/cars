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
            {{-- <img src="{{asset('assets/img/app/1.jpeg')}}" alt="" > --}}
            <video width="600" height="400" controls loop poster="img/download.jfif">
                <source src="{{ asset() }}" type="video/mp4">
                <track src="source.vtt(video track )" kind="" srclang="en" label="english">
                <track src="source.vtt(video txt track )" kind="" srclang="en" label="english">
                your browser doesn't support video tag
            </video>
        </div>
        <div class="w-[400px] flex flex-col items-center justify-center p-8 bg-neutral-50">

            @yield('content')

        </div>
      </div>
    </div>
  </body>
</html>
