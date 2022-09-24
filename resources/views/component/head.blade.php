<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custome_index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/kategory.css') }}"> -->
    <script type="text/javascript" src="{{ asset('js/custome.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Roboto:wght@500&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

    <script>        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>

                // setInterval( function(){
            var dataKonidisi = 0;
            function My_Function(){

                        $.ajax({
                            type: "POST",
                            url: './getDataForNotif',
                            dataType: "json",
                            data: "",
                            success: function(data) {
                                $("#notif").html(data);
                                console.log(data);
                                dataKonidisi = data;
                            }
                        });
                    }

                                // if(dataKonidisi == 1){
                                //     $.ajax({
                                //         type: "POST",
                                //         url: './showNotif',
                                //         dataType: "",
                                //         data: "",
                                //         success: function(data) {
                                //             console.log("success");
                                //             // console.log(data);
                                //         }
                                //     });

                                //     $.ajax({
                                //         type: "GET",
                                //         url: './SendGmail',
                                //         dataType: "",
                                //         data: "",
                                //         success: function(data) {
                                //             console.log("success gmail");
                                //             // console.log(data);
                                //         }
                                //     });
                                // }
                            

                // } ,10000);
            // }    

            My_Function();
            // var interval = window.setInterval( My_Function, 86400000 );
            var interval = window.setInterval( My_Function, 5000 );

            console.log("data konidis "+dataKonidisi);

    </script>
    <script>
    </script>
    <title>Hello, world!</title>
  </head>