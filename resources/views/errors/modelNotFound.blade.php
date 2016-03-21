<!DOCTYPE html>
<html>
<head>
    <title>A small glitch</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">No details found</div>
        <div class="row">
            <div class="col-md-3">  </div>
            <div class="col-md-6">
                <p class="text-warning text-center">
                    The details for the actions you requested does not seem to exist. Maybe you should <a href="{{URL::to('contact')}}">Contact Us.</a>
                </p>
            </div>
            <div class="col-md-3">  </div>
        </div>
    </div>
</div>
</body>
</html>
