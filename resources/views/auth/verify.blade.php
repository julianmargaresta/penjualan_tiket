<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome to the site {{$data['name']}}</h2>
<br/>
Your registered email-id is {{$data['email']}} , Please click on the below link to verify your email account
<br/>
<a href="{{url('user/verify', $data->token)}}">Verify Email</a>

</body>

</html>