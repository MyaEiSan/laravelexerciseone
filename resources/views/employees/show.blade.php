<!DOCTYPE html>
<html>
    <head>
        <title>Staff Page</title>
    </head>
    <body>
        <h1>Welcome To Our Site</h1>
        <p>This is Employee Show</p>

        @php 

        echo "<pre>".print_r($employeedata,true)."</pre>";
        echo $employeedata['name']."<br/>";
        echo $employeedata['email']."<br/>";
        echo $employeedata['phone']."<br/>";

        @endphp

        <ul>
            @foreach($employeedata as $value)
                <li>{{$value}}</li>
                <!-- <li>{!!$value!!}</li> -->
            @endforeach
        </ul>
       
       
    </body>
</html>

<!-- 28EN -->