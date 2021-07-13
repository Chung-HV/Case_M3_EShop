<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categories as $index => $category)
                <li class="{{$index == 0 ? 'active': ''}}">
                    <a href="#category_tab_{{$category->id}}" data-toggle="tab">{{$category->name}}</a>
                </li>
            @endforeach

        </ul>
    </div>
    <div class="tab-content">
        @foreach($categories as $indexProduct => $categoryProduct)
            <div class="tab-pane fade {{$indexProduct==0 ? 'active in' : ''}}"
                 id="category_tab_{{$categoryProduct->id}}">
                @foreach($categoryProduct->products as $product)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{config('app.base_url').$product->feature_image_path}}" alt=""/>
                                    <h2>{{number_format($product->price)}} $</h2>
                                    <p>{{$product->name}}</p>
                                    <a data-url="{{route('Home.addToCart', ['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                        to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </div>
</div>
