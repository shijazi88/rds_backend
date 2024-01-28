<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark"
    data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')| Memvera</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Memvera" name="description" />
    <meta content="Memvera" name="author" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" rel="stylesheet">


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    {{-- @vite(['resources/scss/app.scss', 'resources/js/app.js']) --}}

    @include('layouts.head-css')
</head>
{{-- @vite('resources/js/app.js') --}}
@section('body')
    @include('layouts.body')
@show



<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.topbar')
    @include('layouts.sidebar')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('layouts.footer')
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}

    <!--datatable js-->

</div>

{{-- <iframe src="https://www.chatbase.co/chatbot-iframe/xDF49r8Xag2USDU1n8so6" width="100%" height="700"
    frameborder="0"></iframe> --}}
<!-- END layout-wrapper -->

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
{{-- <script src="assets/libs/dropzone/dropzone-min.js"></script> --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="https://unpkg.com/@coreui/coreui@3.2/dist/js/coreui.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script> --}}
{{-- <script src="{{ asset('build/js/app.js') }}"></script> --}}

<script>
    $(function() {

        let copyButtonTrans = 'Copy'
        let csvButtonTrans = 'CSV'
        let excelButtonTrans = 'Excel'
        let pdfButtonTrans = 'PDF'
        let printButtonTrans = 'Print'
        // let colvisButtonTrans = 'columns'
        // let selectAllButtonTrans = 'Select All'
        // let selectNoneButtonTrans = 'Deselect All'
        // let copyButtonTrans = '{{ trans('cruds.datatables.copy') }}'
        // let csvButtonTrans = '{{ trans('translation.datatables.csv') }}'
        // let excelButtonTrans = '{{ trans('translation.datatables.excel') }}'
        // let pdfButtonTrans = '{{ trans('translation.datatables.pdf') }}'
        // let printButtonTrans = '{{ trans('translation.datatables.print') }}'
        // let colvisButtonTrans = '{{ trans('translation.datatables.colvis') }}'
        // let selectAllButtonTrans = '{{ trans('translation.select_all') }}'
        // let selectNoneButtonTrans = '{{ trans('translation.deselect_all') }}'

        let languages = {
            'en': 'https://data-videos.fra1.cdn.digitaloceanspaces.com/English.json'
        };

        $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
            className: 'btn'
        })
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                url: languages['{{ app()->getLocale() }}']
            },
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }, {
                orderable: false,
                searchable: false,
                targets: -1
            }],
            select: {
                style: 'multi+shift',
                selector: 'td:first-child'
            },
            order: [],
            scrollX: true,
            pageLength: 10,
            dom: 'lBfrtip<"actions">',
            buttons: [
                // {
                //     extend: 'selectAll',
                //     className: 'btn-primary',
                //     text: selectAllButtonTrans,
                //     exportOptions: {
                //         columns: ':visible'
                //     },
                //     action: function(e, dt) {
                //         e.preventDefault()
                //         dt.rows().deselect();
                //         dt.rows({ search: 'applied' }).select();
                //     }
                // },
                // {
                //     extend: 'selectNone',
                //     className: 'btn-primary',
                //     text: selectNoneButtonTrans,
                //     exportOptions: {
                //         columns: ':visible'
                //     }
                // },
                {
                    extend: 'copy',
                    className: 'btn-default',
                    text: copyButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    className: 'btn-default',
                    text: csvButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn-default',
                    text: excelButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                // {
                //     extend: 'pdf',
                //     className: 'btn-default',
                //     text: pdfButtonTrans,
                //     exportOptions: {
                //         columns: ':visible'

                //     }
                // },
                {
                    extend: 'print',
                    className: 'btn-default',
                    text: printButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                // {
                //     extend: 'colvis',
                //     className: 'btn-default',
                //     text: colvisButtonTrans,
                //     exportOptions: {
                //         columns: ':visible'
                //     }
                // }
            ]
        });

        $.fn.dataTable.ext.classes.sPageButton = '';
    });
</script>
{{-- 
<script>
    window.chatbaseConfig = {
        chatbotId: "xDF49r8Xag2USDU1n8so6",
    }
</script>
<script src="https://www.chatbase.co/embed.min.js" id="xDF49r8Xag2USDU1n8so6" defer></script> --}}
@yield('scripts')

@include('layouts.customizer')

<!-- JAVASCRIPT -->
@include('layouts.vendor-scripts')
</body>



</html>
<style>

</style>
