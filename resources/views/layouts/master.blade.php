<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="description" content="{{ App\CommonSetting::first()->description??'' }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('')}}{{ App\CommonSetting::first()->favicon??'' }}">
    <title>{{ App\CommonSetting::first()->title??'' }}</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="{{asset('plugins/components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}"
          rel="stylesheet">
    <link href="{{asset('plugins/components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">

    <!-- Full calendar style link -->
{{--    <link href="{{asset('plugins/components/calendar/dist/fullcalendar.css')}}" rel="stylesheet" />--}}

    <!-- Datatable -->
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

    <!-- ===== Animation CSS ===== -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="{{asset('css/common.css')}}" rel="stylesheet">

    @stack('css')

    <!--====== Dynamic theme changing =====-->

    @if(session()->get('theme-layout') == 'fix-header')
        <link href="{{asset('css/style-fix-header.css')}}" rel="stylesheet">
        <link href="{{asset('css/colors/default.css')}}" id="theme" rel="stylesheet">

    @elseif(session()->get('theme-layout') == 'mini-sidebar')
        <link href="{{asset('css/style-mini-sidebar.css')}}" rel="stylesheet">
        <link href="{{asset('css/colors/default.css')}}" id="theme" rel="stylesheet">
    @else
        <link href="{{asset('css/style-normal.css')}}" rel="stylesheet">
        <link href="{{asset('css/colors/default.css')}}" id="theme" rel="stylesheet">
    @endif

    <!-- ===== Dashboard custom CSS ===== -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <!-- ===== Dashboard Responsive CSS ===== -->
    <link href="{{asset('css/dashboard-responsive.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/css/bootstrap-iconpicker.min.css"/>


    <!-- ===== Color CSS ===== -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        @media (min-width: 768px) {
            .extra.collapse li a span.hide-menu {
                display: block !important;
            }

            .extra.collapse.in li a.waves-effect span.hide-menu {
                display: block !important;
            }

            .extra.collapse li.active a.active span.hide-menu {
                display: block !important;
            }

            ul.side-menu li:hover + .extra.collapse.in li.active a.active span.hide-menu {
                display: block !important;
            }
        }
    </style>
</head>

<body class="@if(session()->get('theme-layout')) {{session()->get('theme-layout')}} @endif">
<!-- ===== Main-Wrapper ===== -->
<div id="wrapper">
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <!-- ===== Top-Navigation ===== -->
@include('layouts.partials.navbar')
<!-- ===== Top-Navigation-End ===== -->

    <!-- ===== Left-Sidebar ===== -->
@include('layouts.partials.sidebar')
@include('layouts.partials.right-sidebar')

<!-- ===== Left-Sidebar-End ===== -->
    <!-- ===== Page-Content ===== -->
    <div class="page-wrapper">
        @yield('content')
        <!-- <footer class="footer t-a-c">
            <div class="p-20 bg-white">
                <center> {{ App\CommonSetting::first()->footer_text??'' }} </center>
            </div>
        </footer> -->
    </div>
    <!-- ===== Page-Content-End ===== -->
</div>
<!-- ===== Main-Wrapper-End ===== -->
<!-- ==============================
    Required JS Files
=============================== -->
<!-- ===== jQuery ===== -->
<script src="{{asset('plugins/components/jquery/dist/jquery.min.js')}}"></script>
<!-- ===== Bootstrap JavaScript ===== -->
<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- ===== Slimscroll JavaScript ===== -->
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<!-- ===== Wave Effects JavaScript ===== -->
<script src="{{asset('js/waves.js')}}"></script>
<!-- ===== Menu Plugin JavaScript ===== -->
<script src="{{asset('js/sidebarmenu.js')}}"></script>
<!-- ===== Custom JavaScript ===== -->

@if(session()->get('theme-layout') == 'fix-header')
    <script src="{{asset('js/custom-fix-header.js')}}"></script>
@elseif(session()->get('theme-layout') == 'mini-sidebar')
    <script src="{{asset('js/custom-mini-sidebar.js')}}"></script>
@else
    <script src="{{asset('js/custom-normal.js')}}"></script>
@endif

{{--<script src="{{asset('js/custom.js')}}"></script>--}}
<!-- ===== Plugin JS ===== -->
<script src="{{asset('plugins/components/chartist-js/dist/chartist.min.js')}}"></script>
<script src="{{asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('plugins/components/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('plugins/components/sparkline/jquery.charts-sparkline.js')}}"></script>
<script src="{{asset('plugins/components/knob/jquery.knob.js')}}"></script>
<script src="{{asset('plugins/components/easypiechart/dist/jquery.easypiechart.min.js')}}"></script>
<!-- ===== Style Switcher JS ===== -->
<script src="{{asset('plugins/components/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker.min.js"></script>
<!-- Calendar cdn -->
{{--<script src="{{asset('plugins/components/calendar/jquery-ui.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/components/moment/moment.js')}}"></script>--}}
{{--<script src="{{asset('plugins/components/calendar/dist/fullcalendar.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/components/calendar/dist/jquery.fullcalendar.js')}}"></script>--}}


<!-- DATATABLE STARTS HEREE -->

<script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        // $(function() {
        //     $('#myTable').DataTable();

        //     var table = $('#example').DataTable({
        //         "columnDefs": [{
        //             "visible": false,
        //             "targets": 2
        //         }],
        //         "order": [
        //             [2, 'asc']
        //         ],
        //         "displayLength": 25,
        //         "drawCallback": function(settings) {
        //             var api = this.api();
        //             var rows = api.rows({
        //                 page: 'current'
        //             }).nodes();
        //             var last = null;
        //             api.column(2, {
        //                 page: 'current'
        //             }).data().each(function(group, i) {
        //                 if (last !== group) {
        //                     $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
        //                     last = group;
        //                 }
        //             });
        //         }
        //     });
        //     // Order by the grouping
        //     $('#example tbody').on('click', 'tr.group', function() {
        //         var currentOrder = table.order()[0];
        //         if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
        //             table.order([2, 'desc']).draw();
        //         } else {
        //             table.order([2, 'asc']).draw();
        //         }
        //     });
        // });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>

<!-- DATATABLE ENDS HERE -->


{{--custom added scripts--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{--custom added scripts--}}
<script type="text/javascript">
    @if(session()->has('message'))
        Swal.fire({
            title: "{{session()->get('title')??'success!'}}",
            html: "{{@ucwords(preg_replace('/(?<!\ )[A-Z]/', ' $0', session()->get('message')))}}",
            icon: "{{session()->get('type')??'success'}}",
            timer: 5000,
            buttons: false,
        });
    @endif
    @if(session()->has('flash_message'))
        Swal.fire({
            title: "{{@ucwords(preg_replace('/(?<!\ )[A-Z]/', ' $0', session()->get('flash_message')))}}",
{{--            html: "{{session()->get('flash_message')}}",--}}
            icon: "{{  session()->get('type')??'success'}}",
            timer: 5000,
            buttons: false,
        });
    @endif

</script>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".dashboard_swiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>




<script type="text/javascript">
    (function($) {
        $(document).ready(function() {
            var customSelect = $(".custom_select");

            customSelect.each(function() {
                var thisCustomSelect = $(this),
                    options = thisCustomSelect.find("option"),
                    firstOptionText = options.first().text();

                var selectedItem = $("<div></div>", {
                    class: "selected-item"
                })
                    .appendTo(thisCustomSelect)
                    .text(firstOptionText);

                var allItems = $("<div></div>", {
                    class: "all-items all-items-hide"
                }).appendTo(thisCustomSelect);

                options.each(function() {
                    var that = $(this),
                        optionText = that.text();

                    var item = $("<div></div>", {
                        class: "item",
                        on: {
                            click: function() {
                                var selectedOptionText = that.text();
                                selectedItem.text(selectedOptionText).removeClass("arrowanim");
                                allItems.addClass("all-items-hide");
                            }
                        }
                    })
                        .appendTo(allItems)
                        .text(optionText);
                });
            });

            var selectedItem = $(".selected-item"),
                allItems = $(".all-items");

            selectedItem.on("click", function(e) {
                var currentSelectedItem = $(this),
                    currentAllItems = currentSelectedItem.next(".all-items");

                allItems.not(currentAllItems).addClass("all-items-hide");
                selectedItem.not(currentSelectedItem).removeClass("arrowanim");

                currentAllItems.toggleClass("all-items-hide");
                currentSelectedItem.toggleClass("arrowanim");

                e.stopPropagation();
            });

            $(document).on("click", function() {
                var opened = $(".all-items:not(.all-items-hide)"),
                    index = opened.parent().index();

                customSelect
                    .eq(index)
                    .find(".all-items")
                    .addClass("all-items-hide");
                customSelect
                    .eq(index)
                    .find(".selected-item")
                    .removeClass("arrowanim");
            });
        });
    })(jQuery);
</script>
    <script type="text/javascript">
            $(".dataTables_wrapper .dataTables_filter input").attr("placeholder", "Search");

        
    </script>
    @if(auth()->user()->hasRole('user'))
    <script type="text/javascript">
        casenotification()

        function casenotification() {
            $.ajax({
                type: 'get',
                url: "{{route('get_case_notification')}}",
                success: function (result) {
                    $('.message-center').html(result)
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function real_count() {
            $.ajax({
                type: 'get',
                url: "{{route('get_count_noti_case')}}",
                success: function (result) {
                    // $('#case_noti').html(result.noti)
                    var totalNoti = parseInt(result.noti) + parseInt(result.invoiceNoti) + parseInt(result.billNoti) + parseInt(result.accountingNoti);
                        $('#case_noti').html(totalNoti);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>
    <script type="text/javascript">
        $(document).on('click', '.anchor', function (e) {
            id = $(this).attr('data-id');
            Invoiceid = $(this).attr('invoice-id');
            costId = $(this).attr('cost-id');
            accountingId = $(this).attr('accounting-id');
            $.ajax({
                url: "{{route('view_remove')}}/" + id,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {
                    location.reload();
                }
            });
            $.ajax({
                url: "{{route('view_remove_invoice')}}/" + Invoiceid,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {
                    location.reload();
                }
            });
            $.ajax({
                url: "{{route('view_remove_cost')}}/" + costId,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {
                    location.reload();
                }
            });
            $.ajax({
                url: "{{route('view_remove_accounting')}}/" + accountingId,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {
                    location.reload();
                }
            });
        });
    </script>
@elseif(auth()->user()->hasRole('attorney'))
    <script type="text/javascript">

        attorneynotification()


        function attorneynotification() {
            $.ajax({
                type: 'get',
                url: "{{route('get_attorney_notification')}}",
                success: function (result) {
                    $('.message-center').html(result)
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function real_count() {
            $.ajax({
                type: 'get',
                url: "{{route('get_count_assign_attorney')}}",
                success: function (result) {
                    // var totalNoti = parseInt(result.assign) + parseInt(result.event);
                    var totalNoti = parseInt(result.assign) + parseInt(result.event) + parseInt(result.juniorCounsels) + parseInt(result.seniorCounsel) + parseInt(result.kingCounsel) + parseInt(result.paralegalCounsel);
                    $('#noti_status').html(totalNoti);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>
    <script type="text/javascript">
        $(document).on('click', '.attorney', function (e) {
            id = $(this).attr('data-id');
            $.ajax({
                url: "{{route('view_remove_assign_attorney')}}/" + id,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {

                }
            });
        });
        $(document).on('click', '.event', function (e) {
            id = $(this).attr('data-id');
            $.ajax({
                url: "{{route('view_remove_event')}}/" + id,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {

                }
            });
        });
        $(document).on('click', '.junior_counsel', function (e) {
            id = $(this).attr('data-id');
            $.ajax({
                url: "{{route('view_remove_junior_counsel')}}/" + id,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {

                }
            });
        });
        $(document).on('click', '.king_counsel', function (e) {
            id = $(this).attr('data-id');
            $.ajax({
                url: "{{route('view_remove_king_counsel')}}/" + id,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {

                }
            });
        });
        $(document).on('click', '.senior_counsel', function (e) {
            id = $(this).attr('data-id');
            $.ajax({
                url: "{{route('view_remove_senior_counsel')}}/" + id,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {

                }
            });
        });
        $(document).on('click', '.paralegal', function (e) {
            id = $(this).attr('data-id');
            $.ajax({
                url: "{{route('view_remove_paralegal')}}/" + id,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {

                }
            });
        });
    </script>
@endif
@stack('js')

</body>


<?php
    if (App\User::where('id',Auth::id())->where('delete_status',1)->first()==null){
        Auth::logout();
        return redirect(url('login'));
    }
?>
</html>