<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Travel</title>

    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="/frontend/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/frontend/styles/style.css" rel="stylesheet">
    <link href="/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
</head>
<body>

<header>

    @include('layouts.navbar')

    @if(Request::is('/'))
        @include('layouts.slider')
    @endif

</header>

<section class="content container_bg pt-5 pb-2 @if(!Request::is('/')) top_margin @endif">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                @yield('content')
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
</section>

    @include('layouts.footer')

    <script src="/frontend/bootstrap/js/bootstrap.js"></script>
</body>
</html>
