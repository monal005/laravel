
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <h3 class="text-center mt-5">Login </h3>
            <br>
        <div class="d-flex justify-content-center text-center mt-2" >


            <form method="post" action="{{url('/login')}}"  >
                @csrf
                <input type="email" placeholder="john@doe" class="form-control mb-3" name="email">
                <input type="password" placeholder="password" name="password" id="pass" class="form-control mb-2">
                <br><button class="btn btn-warning" id="btn1"> submit</button>
                <a href="{{url('/register')}}">
                    <button type="button" class="btn btn-warning"> Register</button>
                    </a>
            </form>
        </div>


    <br>
            </form>
    </body>
</html>
