<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <ul>
    @if($firstname)
        <li>
             <strong>{{ $firstname }}</strong>
        </li>
    @endif
    @if($lastname)
        <li>
             <strong>{{ $lastname }}</strong>
        </li>
    @endif
    @if($phone)
        <li>
            <strong>{{ $phone }}</strong>
        </li>
    @endif
    @if($email)
        <li>
            <strong>{{ $email }}</strong>
    </li>
    @endif
    </ul>
    <hr>
    @if($messageLines)
    <p>
        {{ $messageLines }}
    </p>
    <hr>
    @endif
</body>
</html>