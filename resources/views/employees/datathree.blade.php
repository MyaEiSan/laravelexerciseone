<!DOCTYPE html>
<html>
    <head>
        <title>Employee Page</title>
    </head>
    <body>
        <h1>Welcome To Our Site</h1>
        <p>This is Employee Data Three</p>

        <h3>Hi there!! {{ $greeting }}</h3>

        @php 
            echo "<pre>".print_r($students,true)."</pre>";
            echo $students[0]."<br/>";
            echo $students[1]."<br/>";
            echo $students[2]."<br/>";
        @endphp

        <ul>
            @foreach($students as $value)
            <li>{{$value}}</li>
            @endforeach
        </ul>

    </body>
</html>

<!-- 28EN -->