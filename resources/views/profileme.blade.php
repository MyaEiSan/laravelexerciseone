<!DOCTYPE html>
<html>
    <head>
        <title>Profile Page</title>
    </head>
    <body>
        <h1>Welcome To Our Site</h1>
        <p>This is Profile Page</p>
        <ul>
            <li><a href="{{URL::to('/')}}">Home</a></li>
            <li><a href="{{URL::to('/about')}}">About</a></li>
            <li><a href="{{URL::to('/sayar')}}">Sayar</a></li>
            <li><a href="{{route('profiles')}}">Profile</a></li>
        </ul>
    </body>
</html>