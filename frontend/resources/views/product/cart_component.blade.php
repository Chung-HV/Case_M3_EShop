<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info cart-delete" data-url="{{route('Home.deleteCart')}}">
            <table class="table table-condensed update_cart_url" data-url = {{route('Home.updateCart')}}>
                <thead>
                <tr class="cart_menu">
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub total</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach($carts as $id =>$cart)
                    @php
                        $total += $cart['price']*$cart['quantity'];
                    @endphp
                    <tr>
                        <th scope="row">{{$id}}</th>
                        <td><img style="width: 100px; height: 100px; object-fit: cover"
                                 src="{{config('app.base_url').$cart['image']}}" alt=""></td>
                        <td>{{$cart['name']}}</td>
                        <td>{{number_format($cart['price'])}} $</td>
                        <td>
                            <input class="quantity" type="number" style="width: 100px" value="{{$cart['quantity']}}" min="1">
                        </td>
                        <td>{{number_format($cart['price']*$cart['quantity'])}} $</td>
                        <td>
                            <a data-id="{{$id}}" class="btn btn-info cart-update-bt">Update</a>
                            <a data-id="{{$id}}"  class="btn btn-danger cart-delete-bt">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-responsive cart_info">
            <div class="total_area">
                <ul>
                    <li>Cart Sub Total <span>{{number_format($total)}} $</span></li>
                    <li>VAT(10%) <span>{{number_format($total*0.1)}} $</span></li>
                    <li>Total <span>{{number_format($total*1.1)}} $</span></li>
                </ul>
                <a class="btn btn-default check_out" href="">Check Out</a>
            </div>
        </div>
    </div>
</section> <!--/#cart_items-->
