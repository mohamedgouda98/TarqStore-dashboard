@extends('layouts.main.master')

@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <a href="{{route('admin.product.create')}}" class="btn btn-primary">Create Product</a>

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div>
                            <label>Product Name</label>
                            <h5>{{$product->name}}</h5>
                            <hr>
                        </div>

                        <label>Product attributes</label>
                        <hr>
                        @foreach(\App\Http\Services\ProductAttributeService::getProductAttributesById($product->id) as $attribute)
                            <div>
                                <label>{{$attribute['name']}}</label>
                                <h5>{{$attribute['data']}}</h5>
                                <hr>
                            </div>
                        @endforeach


                    </div>
                </div>

            </div>

        </div>
    </div>

    <!--  END CONTENT AREA  -->

@endsection


    </body>
    </html>
