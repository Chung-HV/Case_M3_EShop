@extends('layout.master')
@section('title')
    <title>Cart | E-Shopper</title>
@endsection
@section('content')
    <div class="cart_wrapper">
        @include('product.cart_component')
    </div>

@endsection
@section('js')
    <script>
        //update cart
        function cartUpdate(event){
            event.preventDefault();
            let url_update_cart = $('.update_cart_url').data('url');
            let id = $(this).data('id');
            let quantity = $(this).parents('tr').find('input.quantity').val();
            $.ajax({
                type: 'get',
                url: url_update_cart,
                data: {id: id, quantity: quantity},
                success(data){
                    if(data.code===200){
                        $('.cart_wrapper').html(data.cart_component)
                        alert('update success');
                    }

                },
                error(){

                }
            })
        }
        $(function (){
            $(document).on('click', '.cart-update-bt', cartUpdate)
        })
        //delete cart

        function cartDelete(event){
            event.preventDefault();
            let url_delete_cart = $('.cart-delete').data('url');
            let id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: url_delete_cart,
                data: {id: id},
                success(data){
                    if(data.code===200){
                        $('.cart_wrapper').html(data.cart_component)
                        alert('delete success');
                    }

                },
                error(){

                }
            })
        }
        $(function (){
            $(document).on('click', '.cart-delete-bt', cartDelete)
        })
    </script>
@endsection

