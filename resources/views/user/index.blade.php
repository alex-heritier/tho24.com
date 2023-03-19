<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script>
        function onEmailClick(span) {
            const email = span.innerText;
            window.location = `/misc/email_tester?email=${email}`;
        }
    </script>
</head>
<body>
    @include('user/partial/index', ['users' => $users, 'onclick' => 'onEmailClick(this)'])
</body>
</html>

