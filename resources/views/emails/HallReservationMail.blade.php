{{--DO NOT TOUCH FROM HERE ONWARDS--}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

<html>
<head>
    <style>

        table{
            border: none;
            font-family: sans-serif;
            font-size: 0.9em;
        }

        #id{
            border: none;
            font-family: sans-serif;
            font-size: 0.7em;
        }

        #heading{
            border: none;
            font-family: sans-serif;
            font-size: 0.7em;
        }

    </style>
</head>

<body style="font-family: sans-serif">

    {{--Reservation ID: {{$res_id}}--}}

    <div style="position: absolute; top: 2% ">




    <div class="col-md-12" style="top:-2%; left: 15%; position: absolute; ">

        <div class="col-sm-2">
        </div>

        <div class="col-sm-10 col-lg-10">
        <table style="border: none;"  width="100%">


            <tr>

                <td>
                    <img src="{{URL::asset('FrontEnd/img/amalya-logo.png')}}" width="50%">
                </td>

                <td>
                    <p id="heading">
                        <b>Amalya Reach Holiday Resorts</b><br>
                        No:556, Moragahahena, Pitipana North, Homagama, Sri Lanka

                    <table id="id">
                        <tr>
                            <td>Telephone</td> <td> +94 11 2748913</td>
                        </tr>
                        <tr>
                            <td>Web</td> <td>   http://amalyareachlk.com</td>
                        </tr>
                        <tr>
                            <td>Email</td> <td> info@amalyareach.com </td>
                        </tr>
                    </table>
                    </p>
                </td>

        </table>

            </div>

        </div>

    </div>


    <br>

    <hr style="height: 1px; border: none; background-color: #000000">
    <table width="100%">
        <tr>
            <td>
                <table id="id">
                    <tr>
                        <td>
                            <b>Reservation No :</b>
                        </td>
                        <td>

                        {{ $mail_details['hall_reservation_details']->hall_reservation_id}}
                        </td>
                    </tr>
                </table>
            </td>

        </tr>
    </table>
    <hr style="height: 1px; border: none; background-color: #000000">

    {{--TO HERE--}}


    <div style="width: 100%; position: absolute; top: 50%">

        <p>Dear valued customer.,<br><br>

            Thank you for choosing to celebrate your event with us at the Amalya Reach Holiday Resorts. We are pleased to confirm your reservation as follows:        </p>
        <br>

        <table style="border: none;" cellpadding="5" width="100%">

            <tr>
                <td>
                    Customer Name :
                </td>
                    {{ $mail_details['customer_details']->name }}
                <td>

                <td>
            <tr>

            <tr>
                <td>
                    Event Date :
                </td>
                    {{ strtok($mail_details['hall_reservation_details']->reserve_date, " ") }}
                <td>

                <td>
            <tr>

            <tr>
                <td>
                    Time Slot :
                </td>
                {{ $mail_details['hall_reservation_details']->time_slot }}
                <td>

                <td>
            <tr>

            <tr>
                <td>
                    Hall :
                </td>
                {{ $mail_details['hall_reservation_details']->title }}
                <td>

                <td>
            <tr>




        </table>


        <hr style="height: 1px; border: none; background-color: #000000">
        <table width="100%" id="id">
            <tr>
                <td>
                    <b>Notes</b>
                </td>
            </tr>

            <tr>
                <td>
                    The Advanced payment will be non-refundable
                </td>
            </tr>

        </table>




        <br>

        <hr style="height: 1px; border: none; background-color: #000000">

        <table>
            <tr>

            <td>
            We look forward to the pleasure of having you as our guest.</td>

                <br>
            </tr>
            <tr>

            <br>
            <tr><td>-Amalya Reach Holiday Resort-</td></tr>

        </table>
    </div>
</body>

</html>