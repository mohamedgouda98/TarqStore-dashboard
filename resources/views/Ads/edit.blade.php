@include('layouts.main.navbar')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="container">
        <div class="row">
            <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Update Ads</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form method="post" action="{{route('admin.ads.update')}}" enctype="multipart/form-data">
{{--                            @if($errors->any())--}}
{{--                                {{dd($errors->all())}}--}}
{{--                            @endif--}}
                            <input type="hidden" name="id" value="{{$ads->id}}">
                            @method('PUT')
                           @include('Ads._form')
                        </form>


                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->

@include('layouts.main.footer')
