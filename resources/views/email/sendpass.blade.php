<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Account admin is created for Employee Directory</h2>

        <div>
            Thanks for creating an account admin. Here is username and password : <br/>
            Username : {{ $username }}<br/>
            Password : <b>{{ $password }}</b><br/>
			Please login in this link and change password for the first login : {{ URL::to('login') }}.
			<br/>
        </div>

    </body>
</html>