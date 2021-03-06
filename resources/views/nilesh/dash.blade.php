@extends('adminmaster')


@section('css') 

<script src="{{ URL::asset('BackEnd/assets/plugins/upload/jquery-pack.js') }}"></script>
<script src="{{ URL::asset('BackEnd/assets/plugins/upload/jquery.imgareaselect.min.js') }}"></script>

<link rel="stylesheet" href="{{ URL::asset('BackEnd/assets/css/crop/animate.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('BackEnd/assets/css/crop/custom.css')}}">
<link rel="stylesheet" href="{{ URL::asset('BackEnd/assets/css/crop/icheck/flat/green.css')}}">
@endsection



@section('title')

Dashboard

@endsection


@section('page_title')
AMALYA REACH MANAGEMENT DASHBOARD



@endsection

@section('page_buttons')


@endsection

@section('breadcrumbs')

<li>
    <a href="#">Dashboard</a>
</li>
<li  class="active">
    <a href="#">Statistics</a>
</li>

@endsection



@section('content')
<div class="row">

    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix card-box">
            <span class="mini-stat-icon bg-pink"><i class="ion-alert text-white"></i></span>
            <div class="mini-stat-info text-right text-dark">
                <span class="counter text-dark">{{$reservationCount[0]->pending}} <small>ROOMS</small></span>
                PENDING  
            </div>

        </div>
    </div>	
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix card-box">
            <span class="mini-stat-icon bg-pink"><i class="ion-alert text-white"></i></span>
            <div class="mini-stat-info text-right text-dark">
                <span class="counter text-dark">{{$reservationCount[0]->pending_hall}} <small>HALLS</small></span>
                PENDING   
            </div>

        </div>
    </div>


    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix card-box">
            <span class="mini-stat-icon bg-success"><i class="ion-checkmark-circled text-white"></i></span>
            <div class="mini-stat-info text-right text-dark">
                <span class="counter text-dark">{{$reservationCount[0]->accepted}} <small>ROOMS</small></span>
                UPCOMING   
            </div>

        </div>
    </div>	



    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix card-box">
            <span class="mini-stat-icon bg-success"><i class="ion-checkmark-circled text-white"></i></span>
            <div class="mini-stat-info text-right text-dark">
                <span class="counter text-dark">{{$reservationCount[0]->accepted_hall}} <small>HALLS</small></span>
                UPCOMING   
            </div>

        </div>
    </div>	


</div>

<div class="row">

    <div class="col-lg-7">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-border panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Coming Up This Week - Rooms</h3>
                    </div>
                    @if(!empty($roomWeek))
                    <table class="table table-hover">

                        <tbody>
                            @foreach($roomWeek as $r)
                            <tr> 
                                <td>{{$r->check_in}}</td>
                                <td>{{$r->name}}</td>
                                <td>{{$r->telephone_num}}</td>
                                <td>
                                    <button class="btn btn-success btn-block btn-sm" onclick="viewR({{$r->room_reservation_id}})">View</button> </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else

                    <div class="panel-body">

                        <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Sorry! </strong>
                            No Reservations this week. 
                        </div>

                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-border panel-custom">
                    <div class="panel-heading">
                        <h3 class="panel-title">Coming Up This Week - Halls</h3>
                    </div>
                    @if(!empty($hallWeek))
                    <table class="table table-hover">

                        <tbody>
                            @foreach($hallWeek as $h)
                            <tr> 
                                <td>{{$h->reserve_date}}</td>
                                <td>{{$h->name}}</td>

                                <td>{{$h->title}}</td>
                                <td>
                                    <button class="btn  btn-primary btn-block btn-sm" onclick="viewH({{$h->hall_reservation_id}})">View</button> </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else

                    <div class="panel-body">

                        <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Sorry! </strong>
                            No Reservations this week. 
                        </div>

                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-border panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Checking Out Today</h3>
                    </div>
                    @if(!empty($checkout))
                    <table class="table table-hover">

                        <tbody>
                            @foreach($checkout as $r)
                            <tr> 
                                <td>{{$r->check_out}}</td>
                                <td>{{$r->check_in}}</td>
                                <td>{{$r->name}}</td>

                                <td>
                                    <button class="btn btn-primary btn-block btn-sm" onclick="viewRC({{$r->room_reservation_id}})">View</button> </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else

                    <div class="panel-body">

                        <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Sorry! </strong>
                            No Reservations this week. 
                        </div>

                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-border panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">On-Going Reservations</h3>
                    </div>
                    @if(!empty($ongoing))
                    <table class="table table-hover">

                        <tbody>
                            @foreach($ongoing as $r)
                            <tr> 
                                <td>{{$r->check_out}}</td>
                                <td>{{$r->check_in}}</td>
                                <td>{{$r->name}}</td>

                                <td>
                                    <button class="btn btn-primary btn-block btn-sm" onclick="viewRO({{$r->room_reservation_id}})">View</button> </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else

                    <div class="panel-body">

                        <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Sorry! </strong>
                            No Reservations this week. 
                        </div>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">



        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-border panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">CHECK ROOM AVAILABILITY</h3>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" id="f1" onsubmit="return searchf()">




                            <div class="form-group">
                                <label class="control-label col-sm-4">Date Range</label>
                                <div class="col-sm-8">
                                    <div class="input-daterange input-group" id="date-range">
                                        <input type="text" name="checkin" class="form-control"  />
                                        <span class="input-group-addon bg-custom b-0 text-white">to</span>
                                        <input type="text" name="checkout" class="form-control"/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">

                                <div class="col-md-6 col-md-offset-6">
                                    <button type="submit" class="btn btn-primary btn-block">CHECK AVAILABILITY</button>

                                </div>
                            </div>

                        </form>

                    </div>

                    <div id="searchResult"></div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-border panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">CHECK HALL AVAILABILITY</h3>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" id="f2" onsubmit="return searchf2()">

                            <div class="form-group">
                                <label class="col-md-3 control-label">  Date</label>
                                <div class="col-md-9">
                                    <input type="text" id="checkin1" name="checkin" class="form-control" required>

                                </div>

                            </div>





                            <div class="form-group">

                                <div class="col-md-6 col-md-offset-6">
                                    <button type="submit" class="btn btn-primary btn-block btn-success">CHECK AVAILABILITY </button>

                                </div>
                            </div>


                        </form>

                    </div>

                    <div id="searchResult1"></div>

                </div>
            </div>
        </div>


    </div>




</div>


<div class="modal inmodal fade" id="dataView" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="viewTitle"></h4>

            </div>
            <div class="modal-body">

                <div id="reserve_info"></div>





            </div>

            <div class="modal-footer">

                <div id="cblock2">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
                <div id="cblock">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success"  onclick="checkIn()">Check In and Block Rooms</button>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="modal inmodal fade" id="dataView1" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="viewTitle1"></h4>

            </div>
            <div class="modal-body">

                <div id="reserve_info1"></div>





            </div>

            <div class="modal-footer">


                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="checkoutBtn" >Check Out</button>

            </div>
        </div>


    </div>
</div>

<div class="modal inmodal fade" id="blockView" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id=" ">Block Rooms</h4>

            </div>
            <div class="modal-body">

                <div id="block_info"></div>





            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="blockConfirm()">Save and Check In</button>

            </div>
        </div>


    </div>
</div>

@endsection



@section('js')


<script src="{{ URL::asset('BackEnd/assets/plugins/cropping/cropper.min.js') }}"></script>
<script src="{{ URL::asset('CustomJs/hallImg.js') }}"></script>

<script>

    $(document).ready(function(){

        $('#checkin').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format:'yyyy-mm-dd'
        });

        $('#checkin1').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format:'yyyy-mm-dd'
        });

        $('#checkout').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format:'yyyy-mm-dd'
        });

        $('#date-range').datepicker({
            toggleActive: true,
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            startDate:"{{date('Y-m-d')}}",
            format:'yyyy-mm-dd'
        });


    });

    function searchf(){

        $.ajax({
            url:"admin_search_availability",
            type:"get",
            data:$('#f').serialize(),
            success:function(data){

                console.log(data);

                var str ="<table class='table table-hover'> <tbody>";
                str+="<tr class='info'> <td colspan='2'><center> SEARCH RESULT </center> </td> </tr>";

                for(var i= 0; i<data.length;i++){

                    str+= "<tr><td class='text-uppercase'><center>"+data[i].type_name+"</center></td>";
                    str+= "<td class=''><center> <span class='label label-success'>"+(data[i].all_rooms - data[i].booked)+"   Available </span>  </center></td> </tr>";

                }
                str+= "</tbody> </table>"

                document.getElementById("searchResult").innerHTML = str;


            },
            error:function(err){

                console.log(err);
            }



        });

        return false;
    }


    function searchf2(){

        $.ajax({
            url:"admin_search_hall_availability",
            type:"get",
            data:$('#f2').serialize(),
            success:function(data){

                console.log(data);

                var str ="<table class='table table-hover'> <tbody>";
                str+="<tr class='success'> <td colspan='2'><center> SEARCH RESULT </center> </td> </tr>";

                console.log(data);
                for(var i= 0; i<data.length;i++){

                    str+= "<tr><td class='text-uppercase'><center>"+data[i].title+" - "+data[i].hall_num+"</center></td>";

                    if(data[i].st == 0){

                        str+= "<td class=''><center> <span class='label label-success'>   Available </span>  </center></td> </tr>";
                    }else{



                        str+= "<td class=''><center> <span class='label label-danger'> Not  Available </span>  </center></td> </tr>";
                    }

                }
                str+= "</tbody> </table>"

                document.getElementById("searchResult1").innerHTML = str;


            },
            error:function(err){

                console.log(err);
            }



        });

        return false;
    }

    function viewR(id){
        document.getElementById("cblock").removeAttribute("hidden",false);
        document.getElementById("cblock2").setAttribute("hidden",true);

        $.ajax({
            url:"admin_search_bookings_get",
            data:{id:id},
            type:"get",
            success:function(data){

                $('#dataView').modal("show");
                document.getElementById("reserve_info").innerHTML = data;
                document.getElementById("viewTitle").innerHTML = "Room Reservation  Check-In";
            },
            error:function(err){

                console.log(err);

            }


        });



    } 
    function viewRC(id){


        $.ajax({
            url:"admin_search_bookings_get",
            data:{id:id},
            type:"get",
            success:function(data){

                $('#dataView1').modal("show");
                document.getElementById("reserve_info1").innerHTML = data;
                document.getElementById("viewTitle1").innerHTML = "Room Reservation  Check-Out";
                document.getElementById("checkoutBtn").removeAttribute("onclick",false);

                document.getElementById("checkoutBtn").setAttribute("onclick","checkOut("+id+")");
            },
            error:function(err){

                console.log(err);

            }


        });


    }

    function viewH(id){

        document.getElementById("cblock").setAttribute("hidden",true);
        document.getElementById("cblock2").removeAttribute("hidden",false);

        $.ajax({
            url:"getHallEventInfo",
            data:{id:id},
            type:"get",
            success:function(data){

                $('#dataView').modal("show");
                document.getElementById("reserve_info").innerHTML = data;
                document.getElementById("viewTitle").innerHTML = "Hall Reservation Information";
            },
            error:function(err){

                console.log(err);

            }


        });


    }


    function viewRO(id){

        document.getElementById("cblock").setAttribute("hidden",true);
        document.getElementById("cblock2").removeAttribute("hidden",false);

        $.ajax({
            url:"admin_search_bookings_get",
            data:{id:id},
            type:"get",
            success:function(data){

                $('#dataView').modal("show");
                document.getElementById("reserve_info").innerHTML = data;
                document.getElementById("viewTitle").innerHTML = "On-Going Reservations";
            },
            error:function(err){

                console.log(err);

            }


        });


    }

    var BlockList = {};

    function checkIn(){

        BlockList = {};
        var id = $("#room_reservation_id").val();


        $.ajax({
            url:"admin_showBlocks",
            data:{id:id},
            type:"get",
            success:function(data){


                if(data == 0){

                    swal("You Cannot Check In until the actual Check In date Arrives!","","error");
                    return false;

                }else if(data == 1){

                    swal("You Have already checked this reservation In","","error");
                    return false;

                }
                $('#dataView').modal("hide");
                $('#blockView').modal("show");
                document.getElementById("block_info").innerHTML = data;

                var count = $('#typeCount').val();
                for(var i = 0; i< count; i++){


                    var tmp = $('#rt'+i).val();
                    var tmp2 = $('#rtc'+i).val();

                    BlockList[tmp] = {};
                    BlockList[tmp]['arr'] = [];
                    BlockList[tmp]['count'] = tmp2;

                    console.log(BlockList);


                }


                //document.getElementById("viewTitle").innerHTML = "Hall Reservation Information";
            },
            error:function(err){

                console.log(err);

            }


        });

    }


    function addBlock(type,id,elm){

        var c =  BlockList[type]['count'];
        console.log(BlockList[type]['arr'].length);

        if(c >  BlockList[type]['arr'].length){

            BlockList[type]['arr'].push(id);

            elm.innerHTML = "Remove";
            elm.removeAttribute("onclick",false);
            elm.removeAttribute("class",false);
            elm.setAttribute("onclick","removeBlock('"+type+"','"+id+"',this)");
            elm.setAttribute("class","btn btn-sm btn-block btn-danger");

            document.getElementById(""+id).setAttribute("class","info");

        }else{

            swal("Error!","You cannot exceed the reserved room amount for this type","error");
        }


    }


    function removeBlock(type,id,elm){

        var c =  BlockList[type]['count'];
        //  console.log(BlockList[type]['arr'].length);


        var a = BlockList[type]['arr'].indexOf(id);

        if(a > -1){

            BlockList[type]['arr'].splice(a, 1);
        }

        elm.innerHTML = "Select";
        elm.removeAttribute("onclick",false);
        elm.removeAttribute("class",false);
        elm.setAttribute("onclick","addBlock('"+type+"','"+id+"',this)");
        elm.setAttribute("class","btn btn-sm btn-block btn-success");

        document.getElementById(""+id).removeAttribute("class","info");



    }


    function blockConfirm(){

        var check = true;
        var id = $("#room_reservation_id").val();

        var arr = [];
        for (var property in BlockList) {
            if (BlockList.hasOwnProperty(property)) {

                var c = BlockList[property]['count'];
                var a = BlockList[property]['arr'].length;

                if(c != a){

                    check = false;
                }

                arr = arr.concat(BlockList[property]['arr']);
                console.log(arr);
            }
        }

        if(check){

            $.ajax({
                url:"setroomBlock",
                data:{arr:arr,
                      id:id},
                type:"get",
                success:function(data){

                    console.log(data);
                    $('#blockView').modal("hide");
                    swal("Successfully Checked In","","success");
                },
                error:function(err){
                    console.log(err);
                }


            });

        }else{

            swal("Error!","You have to block for all the reserved rooms","error");


        }
    }


    function checkOut(id){



        swal({   
            title: "Check Out?",   
            text: "",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Check Out",   
            cancelButtonText: "Cancel",   
            closeOnConfirm: false}, 
             function(isConfirm){   if (isConfirm) {


            $.ajax({
                url:"admin_checkout",
                data:{id:id},
                type:"get",
                success:function(data){
                    $('#dataView1').modal("hide");
                    swal("Checked Out Successfully!","","success");
                },
                error:function(err){
                    console.log(err);
                }


            });



        } });



    }

</script>

@endsection