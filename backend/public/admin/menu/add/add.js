$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('#form-add').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/admins/menu/store',
            data: {
                name: $('#name').val(),
                parent_id: $('#parent').val(),
            },
            success: function (response) {
                console.log(response);
                toastr.success(response.message)
                $('#addmenu').modal('hide');
                console.log(response.data)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //xử lý lỗi tại đây
            }
        })
    })

    function actionDelete(event){
        event.preventDefault();
        let urlRequest = $(this).data('url');
        let that = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'GET',
                    url: urlRequest,
                    success: function (data) {
                        console.log(data);
                        if(data.code==200){
                            that.parent().parent().remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }

                    },
                    error: function (data) {

                    }
                });
            }
        })
    }
    $(function (){
        $(document).on('click', '.action_delete', actionDelete)
    });
    $('.btn-edit').click(function(e){
        var url = $(this).attr('data-url');
        $('#edit_form').modal('show');
        e.preventDefault();
        $.ajax({
            //phương thức get
            type: 'get',
            url: url,
            success: function (response) {
                //đưa dữ liệu controller gửi về điền vào input trong form edit.
                $('#hoten-edit').val(response.data.hoten);
                $('#ngaysinh-edit').val(response.data.ngaysinh);
            },
            error: function (error) {

            }
        })
    })

});
