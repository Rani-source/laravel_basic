
<!DOCTYPE html>
<html>

<head>
    <!-- Information about the web page -->
    <!--This is the comment tag-->
    <title>All users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <style>
        nav .w-5{
            display: none;
        }
    </style> --}}
</head>

<body>
    <!--Contents of the webpage-->
    <div class="container">
        <div class="row">
            <div class="col-7"></div>
          
            <h1> All User List</h1>
            <a href="/newuser" class="btn btn-success btn-sm mb-3" style="width:10%;" >Add New</a>
           <table class="table table-bordered table-striped">
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Age</td>
                    <td>City</td>  
                    <td>View</td>  
                    <td>Delete</td>  
                    <td>Update</td>  
                </tr>
                @foreach ($data as $item =>$user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->city}}</td>
                    <td><a href="{{ route('view.user', $user->id)}}" class=" btn btn-primary btn-sm" >View</td>
                    <td><a href="{{ route('delete.user', $user->id)}}" class=" btn btn-danger btn-sm" >Delete</td>
                    <td><a href="{{ route('update.page', $user->id) }}" class=" btn btn-warning btn-sm" >update</td>
                </tr>
                @endforeach
            </table>
            <div class="mt-5">
                {{ $data->links() }} 
              {{-- //no need bootstrape in cursor
               {{ $data->links('pagination::bootstrap-5') }} --}}
            </div>
            <div >
               Items:- {{ $data->count() }} <br>
               Next Page URL:-  {{ $data->nextPageUrl() }}
            </div>
        </div>
    </div>
</body>

</html>





{{-- @foreach ($data as $item =>$user)
<h3>
    {{$user->name}}|
    {{$user->email}}|
    {{$user->city}}|
    {{$user->age}}|

</h3>
@endforeach --}}