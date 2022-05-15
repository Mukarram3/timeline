
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Updates and statistics" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
   <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('css/material-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">
{{--    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap4.min.css') }}">--}}

    <link href="{{asset('css/timeline.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <style type="text/css">
        #visualization {
            width: auto;
            height: auto;
            border: 1px
            solid lightgray;
        }
        body, html {
            font-family: arial, sans-serif;
            font-size: 11pt;
        }

        div.vis-editable,
        div.vis-editable.vis-selected {
            /* custom styling for editable items... */
        }

        div.vis-readonly,
        div.vis-readonly.vis-selected {
            /* custom styling for readonly items... */
            background-color: #ff4500;
            border-color: red;
            color: white;
        }
    </style>

</head>
<body>


<div class="container">
        <h1>Timeline grouping performance</h1>

        <p>
            Choose a number of items:
            <a href="?count=100">100</a>,
            <a href="?count=1000">1000</a>,
            <a href="?count=10000">10000</a>,
            <a href="?count=100000">100000</a>
        <p>
        <p>
            Current number of items: <span id='count'>100</span>
        </p>

            <button class="btn btn-primary" id="addjob">Add Job</button>


        <div id="visualization"></div>

</div>

{{-- Add Modal  --}}

<div class="modal fade bd-example-modal-lg addtimeline" id="addtimeline" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('addtimeline')}}" id="btnsavetimeline" method="post">
                    @csrf
                   <div class="container">
                       <div class="row">
                           <div class="col-lg-6 col-md-6">
                               <h5 class="modal-title" style="font-weight: bold" id="exampleModalLabel">Address</h5>
                           </div>
                           <div class="col-lg-6 col-md-6">
                               <h5 class="modal-title" style="font-weight: bold" id="exampleModalLabel">Job Information</h5>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-6" style="border-right: 2px solid gray">

                               <div class="form-row">


                                   <div class="form-group col-md-12">
                                       <input type="radio"> Select address
                                       <select name="address" id="address" class="form-control">
                                           <option>Select Address</option>
                                           <option value="address2">address2</option>
                                           <option value="address3">address3</option>
                                           <option value="address4">address4</option>
                                       </select>
                                   </div>
                               </div>
                               <div class="form-row">
                                   <div class="form-group col-md-12">
                                       <label for="">Company Name</label>
                                       <input type="text" class="form-control" name="CName" id="CName" placeholder="">
                                   </div>

                               </div>
                               <div class="form-row">
                                   <div class="form-group col-md-12">
                                       <label for="">Contact Person</label>
                                       <input type="text" class="form-control" name="name" id="name" placeholder="">
                                   </div>

                               </div>
                               <div class="form-row">
                                   <div class="form-group col-md-6">
                                       <label for="">Street</label>
                                       <input type="text" class="form-control" name="street" id="street" placeholder="">
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label for="">Number</label>
                                       <input type="text" class="form-control" name="mobile" id="number" placeholder="">
                                   </div>

                               </div>
                               <div class="form-row">
                                   <div class="form-group col-md-6">
                                       <label for="">Zip Code</label>
                                       <input type="number" class="form-control" name="zipcode" id="zipcode" placeholder="">
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label for="">City</label>
                                       <input type="text" class="form-control" name="city" id="city" placeholder="">
                                   </div>

                               </div>
                               <div class="form-row">
                                   <div class="form-group col-md-12">
                                       <label for="">Country</label>
                                       <input type="text" class="form-control" name="country" id="country" placeholder="">
                                   </div>

                               </div>
                               <div class="form-row">
                                   <div class="form-group col-md-12">
                                       <label for="">Phone</label>
                                       <input type="number" class="form-control" name="phone" id="phone" placeholder="">
                                   </div>

                               </div>
                               <div class="form-row">
                                   <div class="form-group col-md-12">
                                       <label for="">Email</label>
                                       <input type="email" class="form-control" name="email" id="email" placeholder="">
                                   </div>

                               </div>
                               <div class="form-row">
                                   <div class="form-group col-md-12">
                                       <label for="">Website</label>
                                       <input type="text" class="form-control" name="website" id="website" placeholder="">
                                   </div>

                               </div>


                           </div>
                           <div class="col-lg-6">

                               <div class="form-row">
                                   <div class="form-group col-md-4">
                                       <label for="">Date</label>
                                       <input type="date" class="form-control" name="date" id="date" placeholder="">
                                   </div>
                                   <div class="form-group col-md-4">
                                       <label for="">Time</label>
                                       <input type="time" class="form-control" name="time" id="time" placeholder="">
                                   </div>
                                   <div class="form-group col-md-4">
                                       <label for="">PlannedDurationMinutes</label>
                                       <input type="number" class="form-control" name="duration" id="duratoinminutes" placeholder="">
                                   </div>

                               </div>
                               <div class="form-row">

                                   <div class="form-group col-md-12">
                                       <label for="">User</label>
                                       <select name="user" id="user" class="form-control">
                                           <option>Select User</option>
                                           @foreach($users as $user)
                                           <option value="{{$user->id}}">{{$user->name}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                               </div>
                               <div class="form-row">

                                   <div class="form-group mb-1">
                                       <label for="exampleTextarea">Detail</label>
                                       <textarea class="form-control" name="detail" cols="50" id="exampleTextarea" rows="4"></textarea>
                                   </div>
                               </div>
                               <div class="form-row">

                                   <div class="form-group col-md-6 mb-1">
                                       <label for="exampleTextarea">Note</label>
                                       <textarea class="form-control" name="note" cols="20" id="note" rows="4"></textarea>
                                   </div>
                                   <div class="form-group col-md-6 mb-1">
                                       <label for="exampleTextarea">Note Intern</label>
                                       <textarea class="form-control" name="intern" cols="20" id="intern" rows="4"></textarea>
                                   </div>
                               </div>
                               <div class="form-row">

                                   <div class="form-group col-md-3 mb-1">
                                       <label for="exampleTextarea">Price</label>
                                       <input type="text" class="form-control" name="price" id="price" placeholder="">
                                   </div>
                                   <div class="form-group col-md-4 mb-1">
                                       <label for="exampleTextarea">Currency</label>
                                           <select style="width: auto;" name="currency" id="currency" class="form-control">
                                               <option>Select Currency</option>
                                               <option value="currency1">currency1</option>
                                               <option value="currency1">currency1</option>
                                               <option value="currency1">currency1</option>
                                           </select>
                                  </div>
                               </div>

                               <div class="form-row">

                                   <div class="form-group col-md-3 mb-1">
                                       <button type="button" class="btn btn-danger">Cancel</button>
                                   </div>
                                   <div class="form-group col-md-4 mb-1">
                                       <button type="submit" class="btn btn-primary">Save</button>
                                   </div>
                               </div>

                           </div>
                       </div>

                   </div>
                </form>

            </div>
        </div>
    </div>
</div>

{{-- Add Modal End --}}

{{--    Edit Modal  --}}

<div class="modal fade editCountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('update.timeline.details')}}" method="post" id="update-timeline-form">
                    <input type="hidden" name="Tid">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <h5 class="modal-title" style="font-weight: bold" id="exampleModalLabel">Address</h5>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <h5 class="modal-title" style="font-weight: bold" id="exampleModalLabel">Job Information</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6" style="border-right: 2px solid gray">

                                <div class="form-row">


                                    <div class="form-group col-md-12">
                                        <input type="radio"> Select address
                                        <select name="address" id="address" class="form-control">
                                            <option value="address1">address1</option>
                                            <option value="address2">address2</option>
                                            <option value="address3">address3</option>
                                            <option value="address4">address4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Company Name</label>
                                        <input type="text" class="form-control" name="Cname" id="cname" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Contact Person</label>
                                        <input type="text" class="form-control" name="Pname" id="pname" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Street</label>
                                        <input type="text" class="form-control" name="street" id="street" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Number</label>
                                        <input type="text" class="form-control" name="number" id="number" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Zip Code</label>
                                        <input type="number" class="form-control" name="zipcode" id="zipcode" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">City</label>
                                        <input type="text" class="form-control" name="city" id="city" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Country</label>
                                        <input type="text" class="form-control" name="country" id="country" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Phone</label>
                                        <input type="number" class="form-control" name="phone" id="phone" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Website</label>
                                        <input type="text" class="form-control" name="website" id="website" placeholder="">
                                    </div>

                                </div>


                            </div>
                            <div class="col-lg-6">

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="">Date</label>
                                        <input type="date" class="form-control" name="date" id="date" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Time</label>
                                        <input type="time" class="form-control" name="time" id="time" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">PlannedDurationMinutes</label>
                                        <input type="number" class="form-control" name="duratoinminutes" id="duratoinminutes" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="">User</label>
                                        <select name="user" id="edituser" class="form-control">
                                            <option>Select User</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group mb-1">
                                        <label for="exampleTextarea">Detail</label>
                                        <textarea class="form-control" name="detail" cols="50" id="exampleTextarea" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-1">
                                        <label for="exampleTextarea">Note</label>
                                        <textarea class="form-control" name="note" cols="20" id="note" rows="4"></textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-1">
                                        <label for="exampleTextarea">Note Intern</label>
                                        <textarea class="form-control" name="intern" cols="20" id="intern" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-3 mb-1">
                                        <label for="exampleTextarea">Price</label>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4 mb-1">
                                        <label for="exampleTextarea">Currency</label>
                                        <select name="currency" id="currency" class="form-control">
                                            <option value="currency1">currency1</option>
                                            <option value="currency1">currency1</option>
                                            <option value="currency1">currency1</option>
                                            <option value="currency1">currency1</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-3 mb-1">
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                    </div>
                                    <div class="form-group col-md-4 mb-1">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

{{--    Edit Modal End --}}


<!--   Core JS Files   -->

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('toastr/toastr.min.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>

<script type="text/javascript" src="{{asset('js/timeline.js')}}"></script>


<script>
    /**
     * Get URL parameter
     * https://www.netlobo.com/url_query_string_javascript.html
     */
    function gup( name ) {
        name = name.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");
        var regexS = "[\\?&]"+name+"=([^&#]*)";
        var regex = new RegExp( regexS );
        var results = regex.exec( window.location.href );
        if( results == null )
            return "";
        else
            return results[1];
    }

    var count = (Number(gup('count')) || 1000);

    // create a data set with groups

    var groups = new vis.DataSet();

    $.get('getallusers',function (data){

    for (var g = 0; g < data.length; g++) {
        groups.add({id: g+1, content: data[g].name});
    }
    });


    // create items
    var items = new vis.DataSet();

    var job = 1;
    var user = 1;

    $.get('getallusers',function (data){

    for (var j = 0; j < data.length; j++) {

        $.get('singleuserTimeline/' + data[j].id,function (data2){
            var date = new Date();

            if (data2.length > 0){
                for (var i = 0; i < data2.length; i++) {

                    var date1=new Date(data2[i].date);
                    date1.setHours(date1.getHours() +  4 * (Math.random() < 0.2));
                    var start = new Date(date1);
                    console.log(start);

                    date1.setHours(date1.getHours() + 2 + Math.floor(Math.random()*4));
                    var end = new Date(date1);

                    items.add({
                        id: data2[i].id,
                        group: user,
                        start: start,
                        end: end,
                        content: data2[i].date + "  " + data2[i].time
                    });

                    job++;
                }

            }
            user++;

        });


    }

    });


    // specify options
    var options = {
        stack: false,
        start: new Date(),
        end: new Date(1000*60*60*24 + (new Date()).valueOf()),
        editable: {
            add: false,
            updateTime: true,
            updateGroup: true,
            remove: true,
            overrideItems: false
        },
        margin: {
            item: 10, // minimal margin between items
            axis: 5   // minimal margin between items and the axis
        },
        orientation: 'top',
        onRemove: function(item,callback){

            {{--                //Delete Timeline DETAILS--}}

            // alert(item.id);


            $(document).on('click','.vis-delete', function(){
                // var country_id = $(this).data('id');
                // console.log(country_id);
                var url = '{{ route("delete.timeline") }}';
                swal.fire({
                    title:'Are you sure?',
                    html:'You want to <b>delete</b> this Timeline',
                    showCancelButton:true,
                    showCloseButton:true,
                    cancelButtonText:'Cancel',
                    confirmButtonText:'Yes, Delete',
                    cancelButtonColor:'#d33',
                    confirmButtonColor:'#556ee6',
                    width:300,
                    allowOutsideClick:false
                })
                    .then(function(result){
                        if(result.value){
                            $.get(url,{timeline_id:item.id}, function(data){
                                if(data.code == 1){
                                    // $('#counties-table').DataTable().ajax.reload(null, false);
                                    toastr.success(data.msg);
                                    // $('#visualization').load();
                                }else{
                                    toastr.error(data.msg);
                                }
                            },'json');
                        }
                    });
            });
        },
        onUpdate: function (item, callback) {
            $.get('{{ route("get.timeline.details") }}',{timeline_id:item.id}, function(Timeline_data){

                $('.editCountry').find('input[name="Tid"]').val(Timeline_data.Timeline_data.id);
                // $('.editCountry').find('select[name="address"]').text(Timeline_data.Timeline_data.address);
                $('.editCountry').find('input[name="Cname"]').val(Timeline_data.user_data.CName);
                $('.editCountry').find('input[name="Pname"]').val(Timeline_data.user_data.name);
                $('.editCountry').find('input[name="street"]').val(Timeline_data.user_data.street);
                $('.editCountry').find('input[name="number"]').val(Timeline_data.user_data.mobile);
                $('.editCountry').find('input[name="zipcode"]').val(Timeline_data.user_data.zipcode);
                $('.editCountry').find('input[name="city"]').val(Timeline_data.user_data.city);
                $('.editCountry').find('input[name="country"]').val(Timeline_data.user_data.country);
                $('.editCountry').find('input[name="phone"]').val(Timeline_data.user_data.phone);
                $('.editCountry').find('input[name="email"]').val(Timeline_data.user_data.email);
                $('.editCountry').find('input[name="website"]').val(Timeline_data.user_data.website);

                $('.editCountry').find('input[name="date"]').val(Timeline_data.Timeline_data.date);
                $('.editCountry').find('input[name="time"]').val(Timeline_data.Timeline_data.time);
                $('.editCountry').find('input[name="duratoinminutes"]').val(Timeline_data.Timeline_data.duration);
                $('.editCountry').find('input[name="user"]').val(Timeline_data.Timeline_data.userId);
                $('.editCountry').find('textarea[name="detail"]').text(Timeline_data.Timeline_data.detail);
                $('.editCountry').find('textarea[name="note"]').text(Timeline_data.Timeline_data.note);
                $('.editCountry').find('textarea[name="intern"]').text(Timeline_data.Timeline_data.intern);
                $('.editCountry').find('input[name="price"]').val(Timeline_data.Timeline_data.price);
                $('.editCountry').find('input[name="currency"]').val(Timeline_data.Timeline_data.currency);
                $('.editCountry').modal('show');
            },'json');
        },
        onMove:function (item,callback){
            swal.fire({
                title:'Are you sure?',
                html:'You want to <b>Move</b> this Timeline',
                showCancelButton:true,
                showCloseButton:true,
                cancelButtonText:'Cancel',
                confirmButtonText:'Yes, Move',
                cancelButtonColor:'#d33',
                confirmButtonColor:'#556ee6',
                width:300,
                allowOutsideClick:false
            });

        }

    };

    // create a Timeline
    var container = document.getElementById('visualization');
    timeline = new vis.Timeline(container, null, options);
    timeline.setGroups(groups);
    timeline.setItems(items);

    // $(document).on('click','#visualization',function (){
    //    alert('sfdg');
    // });
    $('#addjob').click(function (){
        $('#addtimeline').modal('show');
    });

    document.getElementById('count').innerHTML = count;


    {{--                //UPDATE Timeline DETAILS--}}

                    $('#update-timeline-form').on('submit', function(e){
                        e.preventDefault();
                        var form = this;
                        $.ajax({
                            url:$(form).attr('action'),
                            method:$(form).attr('method'),
                            data:new FormData(form),
                            processData:false,
                            dataType:'json',
                            contentType:false,
                            beforeSend: function(){
                                $(form).find('span.error-text').text('');
                            },
                            success: function(data){
                                if(data.code == 0){
                                    $.each(data.error, function(prefix, val){
                                        $(form).find('span.'+prefix+'_error').text(val[0]);
                                    });
                                }else{
                                    $('.editCountry').modal('hide');
                                    $('.editCountry').find('form')[0].reset();
                                    toastr.success(data.msg);
                                }
                            }
                        });
                    });


    //ADD NEW Timeline
    $('#btnsavetimeline').on('submit', function(e){
        e.preventDefault();
        var form = this;

        $.ajax({
            url:$(form).attr('action'),
            method:$(form).attr('method'),
            data:new FormData(form),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(form).find('span.error-text').text('');
            },
            success:function(data){
                if(data.code == 0){

                }else{
                    $('#addtimeline').modal('hide');
                    toastr.success(data.msg);
                    // $('#visualization').load();
                }
            }
        });
    });


    $('#user').on('change',function (){
        var id=$('#user').val();
        $.get('getsingleuserdata/' + id,function (data){
            $('.addtimeline').find('input[name="CName"]').val(data.CName);
            $('.addtimeline').find('input[name="name"]').val(data.name);
            $('.addtimeline').find('input[name="street"]').val(data.street);
            $('.addtimeline').find('input[name="mobile"]').val(data.mobile);
            $('.addtimeline').find('input[name="zipcode"]').val(data.zipcode);
            $('.addtimeline').find('input[name="city"]').val(data.city);
            $('.addtimeline').find('input[name="country"]').val(data.country);
            $('.addtimeline').find('input[name="phone"]').val(data.phone);
            $('.addtimeline').find('input[name="email"]').val(data.email);
            $('.addtimeline').find('input[name="website"]').val(data.website);

        });
    });

    $('#edituser').on('change',function (){

        var id=$('#edituser').val();
        $.get('getsingleuserdata/' + id,function (data){

            $('.editCountry').find('input[name="Cname"]').val(data.CName);
            $('.editCountry').find('input[name="Pname"]').val(data.name);
            $('.editCountry').find('input[name="street"]').val(data.street);
            $('.editCountry').find('input[name="mobile"]').val(data.mobile);
            $('.editCountry').find('input[name="zipcode"]').val(data.zipcode);
            $('.editCountry').find('input[name="city"]').val(data.city);
            $('.editCountry').find('input[name="country"]').val(data.country);
            $('.editCountry').find('input[name="phone"]').val(data.phone);
            $('.editCountry').find('input[name="email"]').val(data.email);
            $('.editCountry').find('input[name="website"]').val(data.website);

        });
    });

    // function refresh(){
    //     setTimeout(function (){
    //         $("#visualization").show().load('timeline').fadeIn('slow');
    //         refresh();
    //     },2000);
    // }
    //
    // refresh();

</script>

</body>
</html>
