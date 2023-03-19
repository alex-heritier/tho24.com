<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Account Settings</title>

    @vite(['resources/css/style.css'])
    <style>
        * {
            padding: 4px;
        }

        #logout-btn {
            width: 80%;
            margin: auto;
            margin-top: 50px;
            display: block;
        }
    </style>
</head>

<body>
    <h2>Account Settings</h2>

    <p id="email">{{ session('my.email') }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <input type="submit" id="logout-btn" value="Log out" />
    </form>
</body>

</html>