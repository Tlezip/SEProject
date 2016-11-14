<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">


    <title>STOCK ITEM</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body background="img/bg.jpg" style="background-repeat: no-repeat; font-family: 'Merriweather', 'Helvetica Neue', Arial, sans-serif;">



   <div class="container" style="padding-top: 5%">
       <div class="text-center" style="font-size: 700%; color: white; font-family:  font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif;">
           STOCK ITEM
       </div>
   </div>
    <hr>
   <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

   <div class="container" style="padding-top: 20px">
       <form class="form-signin" id='login_form' method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
           <div class='usernameLogin'>
               <fieldset id='login_ield'>
                   <div class="row">
                       <div class="col-xs-6 col-md-4 col-xs-offset-3 col-md-offset-4">
                           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                               <input type="email" class="form-control" placeholder="E-mail" name="email" id="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-xs-6 col-md-4 col-xs-offset-3 col-md-offset-4">
                           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                               <input type="password" class="form-control" name="password" placeholder="password" id="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           </div>


                       </div>
                   </div>
               </fieldset>
               <div class="row">
                   <div class="col-xs-6 col-md-4 col-xs-offset-3 col-md-offset-4">
                       <button id="signInBtn" class="submit btn btn-lg  btn-block" type="submit" role="button">Log In</button>
                       <span class="help-block text-center" style="color: ghostwhite">Don't have an account? <a href='{{ url('/register') }}' style="color: #A4DFFA;"><u>Sign up</u></a> now!</span>
                   </div>
               </div>

           </div>
       </form>
   </div>

   </div>



   <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>


</body>

</html>