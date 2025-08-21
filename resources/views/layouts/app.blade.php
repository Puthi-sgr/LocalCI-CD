<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #35495e;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        .app-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
        }
    </style>
</head>

<body>
    <h1 class="header">This is the app layout</h1>
    <div class="app-container">
        @yield('content')
    </div>
</body>

</html>
