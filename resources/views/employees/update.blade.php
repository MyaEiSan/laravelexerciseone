<!DOCTYPE html>
<html>
    <head>
        <title>Staff Page</title>
    </head>
    <body>
        <h1>Welcome To Our Site</h1>
        <p>This is Employee Update</p>

        @php 
            echo "<pre>".print_r($employee,true)."</pre>";
        @endphp

        <ul>
            @foreach($employee as $value)
            <li>{{$value}}</li>
            @endforeach
        </ul>
       
       
    </body>
</html>

<!-- 28EN -->