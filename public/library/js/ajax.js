$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('.btncreate').on('click', function () {
        $(this).val('Đợi chút ^^!...').attr('disabled', 'disabled');
        $('#createFrom').submit(function (event) {
            var data = new FormData(this);
            event.preventDefault();
            $.ajax({
                url: './users/create/',
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                type: 'post',
                success: function () {
                    $('#create').modal('hide');
                    location.reload();
                }
            });
        });
    })
    $('.showUser').click(function () {
        let id = $(this).data('id');
        $.ajax({
            url: './users/edit/' + id,
            dataType: 'json',
            type: 'get',
            success: function (data) {
                $('.ID').val(data.user.ID);
                $('.sname').val(data.user.fullname);
                $('.semail').val(data.user.email);
                $('.sphone').val(data.user.phone);
                if (data.user.image) {
                    $('.imageThu').attr('src', 'public/library/upload/' + data.user.image);
                } else {
                    $('.imageThu').attr('src', 'public/library/img/default.png');

                }

            }
        });
        $('#updateUser').on('submit', (function (event) {
            event.preventDefault();
            $.ajax({
                url: './users/update/' + id,
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                type: 'post',
                success: function (data) {
                    console.log(data)
                    $('#editU').modal('hide');
                    location.reload();
                }
            });
        }));
    });
    $('.delUser').click(function () {
        let id = $(this).data('id');
        $('.delete').click(function () {
            $.ajax({
                url: 'users/delete/' + id,
                dataType: 'json',
                type: 'delete',
                success: function () {
                    $('#delete').modal('hide');
                    location.reload();
                }
            })
        })
    })
})