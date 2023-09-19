<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="description" content="<?php echo e(App\CommonSetting::first()->description??''); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('')); ?><?php echo e(App\CommonSetting::first()->favicon??''); ?>">
    <title><?php echo e(App\CommonSetting::first()->title??''); ?></title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="<?php echo e(asset('bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="<?php echo e(asset('plugins/components/chartist-js/dist/chartist.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')); ?>"
          rel="stylesheet">
    <link href="<?php echo e(asset('plugins/components/toast-master/css/jquery.toast.css')); ?>" rel="stylesheet">

    <!-- Full calendar style link -->


    <!-- Datatable -->
    <link href="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

    <!-- ===== Animation CSS ===== -->
    <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="<?php echo e(asset('css/common.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldPushContent('css'); ?>

    <!--====== Dynamic theme changing =====-->

    <?php if(session()->get('theme-layout') == 'fix-header'): ?>
        <link href="<?php echo e(asset('css/style-fix-header.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/colors/default.css')); ?>" id="theme" rel="stylesheet">

    <?php elseif(session()->get('theme-layout') == 'mini-sidebar'): ?>
        <link href="<?php echo e(asset('css/style-mini-sidebar.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/colors/default.css')); ?>" id="theme" rel="stylesheet">
    <?php else: ?>
        <link href="<?php echo e(asset('css/style-normal.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/colors/default.css')); ?>" id="theme" rel="stylesheet">
    <?php endif; ?>

    <!-- ===== Dashboard custom CSS ===== -->
    <link href="<?php echo e(asset('css/dashboard.css')); ?>" rel="stylesheet">
    <!-- ===== Dashboard Responsive CSS ===== -->
    <link href="<?php echo e(asset('css/dashboard-responsive.css')); ?>" rel="stylesheet">

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

<body class="<?php if(session()->get('theme-layout')): ?> <?php echo e(session()->get('theme-layout')); ?> <?php endif; ?>">
<!-- ===== Main-Wrapper ===== -->
<div id="wrapper">
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <!-- ===== Top-Navigation ===== -->
<?php echo $__env->make('layouts.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- ===== Top-Navigation-End ===== -->

    <!-- ===== Left-Sidebar ===== -->
<?php echo $__env->make('layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.partials.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- ===== Left-Sidebar-End ===== -->
    <!-- ===== Page-Content ===== -->
    <div class="page-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
        <!-- <footer class="footer t-a-c">
            <div class="p-20 bg-white">
                <center> <?php echo e(App\CommonSetting::first()->footer_text??''); ?> </center>
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
<script src="<?php echo e(asset('plugins/components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- ===== Bootstrap JavaScript ===== -->
<script src="<?php echo e(asset('bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- ===== Slimscroll JavaScript ===== -->
<script src="<?php echo e(asset('js/jquery.slimscroll.js')); ?>"></script>
<!-- ===== Wave Effects JavaScript ===== -->
<script src="<?php echo e(asset('js/waves.js')); ?>"></script>
<!-- ===== Menu Plugin JavaScript ===== -->
<script src="<?php echo e(asset('js/sidebarmenu.js')); ?>"></script>
<!-- ===== Custom JavaScript ===== -->

<?php if(session()->get('theme-layout') == 'fix-header'): ?>
    <script src="<?php echo e(asset('js/custom-fix-header.js')); ?>"></script>
<?php elseif(session()->get('theme-layout') == 'mini-sidebar'): ?>
    <script src="<?php echo e(asset('js/custom-mini-sidebar.js')); ?>"></script>
<?php else: ?>
    <script src="<?php echo e(asset('js/custom-normal.js')); ?>"></script>
<?php endif; ?>


<!-- ===== Plugin JS ===== -->
<script src="<?php echo e(asset('plugins/components/chartist-js/dist/chartist.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/sparkline/jquery.sparkline.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/sparkline/jquery.charts-sparkline.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/knob/jquery.knob.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/easypiechart/dist/jquery.easypiechart.min.js')); ?>"></script>
<!-- ===== Style Switcher JS ===== -->
<script src="<?php echo e(asset('plugins/components/styleswitcher/jQuery.style.switcher.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker.min.js"></script>
<!-- Calendar cdn -->






<!-- DATATABLE STARTS HEREE -->

<script src="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.js')); ?>"></script>
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



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    <?php if(session()->has('message')): ?>
        Swal.fire({
            title: "<?php echo e(session()->get('title')??'success!'); ?>",
            html: "<?php echo e(@ucwords(preg_replace('/(?<!\ )[A-Z]/', ' $0', session()->get('message')))); ?>",
            icon: "<?php echo e(session()->get('type')??'success'); ?>",
            timer: 5000,
            buttons: false,
        });
    <?php endif; ?>
    <?php if(session()->has('flash_message')): ?>
        Swal.fire({
            title: "<?php echo e(@ucwords(preg_replace('/(?<!\ )[A-Z]/', ' $0', session()->get('flash_message')))); ?>",

            icon: "<?php echo e(session()->get('type')??'success'); ?>",
            timer: 5000,
            buttons: false,
        });
    <?php endif; ?>

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
    <?php if(auth()->user()->hasRole('user')): ?>
    <script type="text/javascript">
        casenotification()

        function casenotification() {
            $.ajax({
                type: 'get',
                url: "<?php echo e(route('get_case_notification')); ?>",
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
                url: "<?php echo e(route('get_count_noti_case')); ?>",
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
                url: "<?php echo e(route('view_remove')); ?>/" + id,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {
                    location.reload();
                }
            });
            $.ajax({
                url: "<?php echo e(route('view_remove_invoice')); ?>/" + Invoiceid,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {
                    location.reload();
                }
            });
            $.ajax({
                url: "<?php echo e(route('view_remove_cost')); ?>/" + costId,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {
                    location.reload();
                }
            });
            $.ajax({
                url: "<?php echo e(route('view_remove_accounting')); ?>/" + accountingId,
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
<?php elseif(auth()->user()->hasRole('attorney')): ?>
    <script type="text/javascript">

        attorneynotification()


        function attorneynotification() {
            $.ajax({
                type: 'get',
                url: "<?php echo e(route('get_attorney_notification')); ?>",
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
                url: "<?php echo e(route('get_count_assign_attorney')); ?>",
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
                url: "<?php echo e(route('view_remove_assign_attorney')); ?>/" + id,
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
                url: "<?php echo e(route('view_remove_event')); ?>/" + id,
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
                url: "<?php echo e(route('view_remove_junior_counsel')); ?>/" + id,
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
                url: "<?php echo e(route('view_remove_king_counsel')); ?>/" + id,
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
                url: "<?php echo e(route('view_remove_senior_counsel')); ?>/" + id,
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
                url: "<?php echo e(route('view_remove_paralegal')); ?>/" + id,
                type: 'get',
                fail: function () {
                    return true;
                },
                success: function (data) {

                }
            });
        });
    </script>
<?php endif; ?>
<?php echo $__env->yieldPushContent('js'); ?>

</body>


<?php
    if (App\User::where('id',Auth::id())->where('delete_status',1)->first()==null){
        Auth::logout();
        return redirect(url('login'));
    }
?>
</html><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/layouts/master.blade.php ENDPATH**/ ?>