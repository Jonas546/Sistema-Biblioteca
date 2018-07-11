<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>    

<style type="text/css">
body{
    background: url(http://mymaplist.com/img/parallax/back.png);
    background-color: #444;
    background: url(http://mymaplist.com/img/parallax/pinlayer2.png),url(http://mymaplist.com/img/parallax/pinlayer1.png),url(http://mymaplist.com/img/parallax/back.png);    
}
.vertical-offset-100{
    padding-top:150px;
}
</style>   
           
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->

<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" action="/auth" method="post">
                        @csrf
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Usuário" name="name" id="name" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Senha" name="password" id="password" type="password">
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                        @if(session('msg'))
                        </br>
                        <div id='error' class='alert alert-danger'>{{session('msg')}}</div>
                        @endif
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    </body>

</html>