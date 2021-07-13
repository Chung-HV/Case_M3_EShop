function addToCart(event){
    event.preventDefault();
    let url=$(this).data('url');
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data){
            if(data.code===200){
                alert('them san pham vao gio hang thanh cong');
            }

        },
        error: function (){

        }
    })
}

$(function (){
    $('.add-to-cart').on('click', addToCart);
})
