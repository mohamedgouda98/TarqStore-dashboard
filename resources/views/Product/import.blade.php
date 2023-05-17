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
                                            <h4>Import Vendors</h4>
                                        </div>
                                    </div>
                                </div>
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        {{$error}}<br>
                                    @endforeach
                                @endif
                                <div class="widget-content widget-content-area">
                                    <form method="post" action="{{route('admin.product.importSheet')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="sheet" >
                                        @error('sheet')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        <button class="btn btn-primary" type="submit">Save</button>
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
