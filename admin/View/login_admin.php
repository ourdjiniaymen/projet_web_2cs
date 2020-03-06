<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="././sources/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="././sources/Js.js"></script>


    <title>TP2CS</title>
</head>


<body class="pr-5 pl-5 ">

    <div class="d-flex header pt-3 border-bottom mb-3 pb-2">
    <form action="?action=login"  method="POST" class="mt-4 shadow" >
            <div class="container">
              <h1>Login</h1>
            

              <label for="user"><b>Nom d'utilisateur</b></label>
              <input type="text" placeholder="nom d'utilisateur" name="user" required>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Votre Password" name="psw" required>
              <div class="clearfix">
                <button type="button" class="cancelbtn" id="cancelForm1">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
              </div>
            </div>
          </form>        


    </div>

</body>

</html>

