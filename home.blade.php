<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <div class="container container-fluid text-center mt-3 ">
        <a href="{{url('/')}}" style="float: left; text-decoration:none; color:brown" >Home</a>
        <a href="{{url('logout')}}" style="float: right; text-decoration:none; color:brown; margin-bottom:10px;">Logout</a>
    </div>

        <h3 class="text-center" style="color: brown">User Table</h3>
    <br>
    {{-- <h1 class="text-center">Hey this is Home Page</h1> --}}

    <div class="container container-fluid input-group">

        <input type="text" name="search" id="search" placeholder="Search" class="form-control rounded mb-4">

    <div class="container container-fluid">
        <table class="table table-striped table-dark mb-4 ">
            <thead>
                <th>Id</th>
                <th >Name
                    <a href="{{URL::current()."?sort=name_asc"}}" class="text-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                  </svg>
                </a>

                <a href="{{URL::current()."?sort=name_desc"}}" class="text-light">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                  </svg>
                </a>
                </th>
                <th>Email</th>
            </thead>

            <tbody>
                @foreach ($users as $user )
                    <tr>
                    <td> {{$user->id}} </td>
                    <td> {{$user->name}} </td>
                    <td>  {{$user->email}} </td>

                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container container-fluid d-flex justify-content-center">
        {!! $users->links() !!}
    </div>


<script type="text/javascript">
    $('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '{{URL::to('search')}}',
    data:{'search':$value},
    success:function(data){
    $('tbody').html(data);
    }
    });
    })
    </script>
</body>
</html>
