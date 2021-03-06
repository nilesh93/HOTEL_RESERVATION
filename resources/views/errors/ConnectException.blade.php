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
        <div class="title">Network is unreachable</div>
        <div class="row">
            <div class="col-md-3">  </div>
            <div class="col-md-6">
                <p class="text-warning text-center">
                    There seems to be an issue with connecting to facebook. Maybe you should try again later.<br>
                    <a href="{{URL::to('/')}}">Go back to the front page</a>.
                </p>
            </div>
            <div class="col-md-3">  </div>
        </div>
    </div>
</div>
</body>
</html>
