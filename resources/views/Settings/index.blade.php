@extends('layouts.main.master')

@push('css')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/plugins/table/datatable/dt-global_style.css')}}">
    <!-- END PAGE LEVEL STYLES -->
@endpush


@section('content')

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <a href="{{route('admin.setting.create')}}" class="btn btn-primary">Create Setting</a>

                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            {!! $dataTable->table(['class' => 'table dt-table-hover']) !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!--  END CONTENT AREA  -->

@endsection




@push('js')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('AdminAssets/plugins/table/datatable/datatables.js')}}"></script>
    {!! $dataTable->scripts() !!}
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush

</body>
</html>
