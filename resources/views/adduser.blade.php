<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <container>
        <div class="row">
            <div class="col-6">  
            <h1>Add User</h1>
                <form action="{{ route('add.user')}}" method="POST">
                  @csrf  
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="name" name="username" class="form-control" id="exampleInputname1" placeholder="name">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="useremail" placeholder="Enter email">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputage1">Age</label>
                        <input type="age" class="form-control"  name="userage" id="exampleInputage1" placeholder="age">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputcity1">City</label>
                      <input type="city" class="form-control" id="exampleInputcity1" aria-describedby="cityHelp" name="usercity" placeholder="Enter city">
                    </div>
                    {{-- <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
        </div>
    </container>
</body>
</html>