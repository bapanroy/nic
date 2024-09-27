<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css');
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container d-flex justify-content-center">
        <div class="card shadow-lg border-0 rounded-lg mt-5 col-lg-5">
            @session("success")
            <div class="alert" id="success-alert">
                {{ session("success") }}
            </div>
            @endsession

            @session("error")
            <div class="alert alert-error" id="error-alert">
                {{ session("error") }}
            </div>
            @endsession

            @yield("content")

        </div>
    </div>
</body>

</html>