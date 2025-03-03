<!DOCTYPE html>
<html>
<head>
    <title>Account Deletion Confirmation</title>
</head>
<body>
    <h1>hello {{$user->gender ? 'Mr.' : 'Mrs.'}} {{$user->name}}</h1>
    
    <p>We're sorry to see you go. Your account has been successfully deleted from <strong>ArtStore</strong>. If this was a mistake, please contact us within <strong>7 days</strong> to recover your account.</p>

    <p>If you have any feedback or wish to return in the future, we’d love to welcome you back! 🎨</p>

    <p>Best wishes,<br>
    <strong>The ArtStore Team</strong></p>

    <hr>
    <p style="font-size: 12px; color: gray;">If this wasn't you, please contact our support immediately: <a href="mailto:support@artstore.com">support@artstore.com</a></p>
</body>
</html>
