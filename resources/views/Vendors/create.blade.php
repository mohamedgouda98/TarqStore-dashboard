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
                                            <h4>Create Vendor</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form method="post" action="{{route('admin.vendor.store')}}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="text" name="name" class="form-control" placeholder="name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="email" name="email" class="form-control" id="sEmail" aria-describedby="emailHelp1" placeholder="Email address">
                                            <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="text" name="phone" class="form-control" placeholder="phone">
                                        </div>
                                        <div class="form-group mb-4">
                                            <input type="password" name="password" class="form-control" id="sPassword" placeholder="Password">
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-3">Save</button>
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
