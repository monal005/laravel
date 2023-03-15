
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <h3 class="text-center mt-5">Register </h3>
            <br>
        <div class="d-flex justify-content-center text-center mt-3" >
            <form method="post" action="{{url('/register')}}"  >
                @csrf
                <div>
                    <label>Name:</label>
                    <input type="text" placeholder="Monal" class="form-control mb-3" name="name">
                </div>

                <div>
                    <label>Email:</label>
                   <input type="email" placeholder="john@mail.com" name="email" id="mail" class="form-control mb-2">

                </div>
                <div>
                    <label>Password</label>
                    <input type="password" placeholder="******" name="password" class="form-control mb-2">
                </div>


                <br><button class="btn btn-warning" id="btn1"> Submit</button>
              
            </form>
        </div>


    <br>
            </form>
    </body>
</html>
