$(document).ready(function () {

    // delete list product
    $('.delete_checkbox').click(function () {
        if ($(this).is(':checked')) {
            $(this).closest('tr').addClass('removeRow');
        }
        else {
            $(this).closest('tr').removeClass('removeRow');
        }
    });
    $('#delete_all').click(function () {
        var checkbox = $('.delete_checkbox:checked');
        if (checkbox.length > 0) {
            var checkbox_value = [];
            $(checkbox).each(function () {
                checkbox_value.push($(this).val());
            });

            $.ajax({
                url: "Delete/del_sanpham.php",
                method: "POST",
                data: { checkbox_value: checkbox_value },
                success: function () {
                    $('.removeRow').fadeOut(1000);
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Xóa sản phẩm thành công.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        }
        else {
            Swal.fire(
                'Question?',
                'Check vào sản phẩm muốn xóa?',
                'question'
            )
        }
    });

    // delete customer
    $('#delete_customer').click(function () {
        var checkbox = $('.delete_checkbox:checked');
        if (checkbox.length > 0) {
            var checkbox_value = [];
            $(checkbox).each(function () {
                checkbox_value.push($(this).val());
            });

            $.ajax({
                url: "Delete/del_kh.php",
                method: "POST",
                data: {
                    checkbox_value: checkbox_value
                },
                success: function () {
                    $('.removeRow').fadeOut(1000);
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Xóa khách hàng thành công.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        } else {
            Swal.fire(
                'Question?',
                'Check vào khách hàng muốn xóa?',
                'question'
            )
        }
    });

    // delete youtube
    $('#delete_youtube').click(function () {
        var checkbox = $('.delete_checkbox:checked');
        if (checkbox.length > 0) {
            var checkbox_value = [];
            $(checkbox).each(function () {
                checkbox_value.push($(this).val());
            });

            $.ajax({
                url: "Delete/del_youtube.php",
                method: "POST",
                data: {
                    checkbox_value: checkbox_value
                },
                success: function () {
                    $('.removeRow').fadeOut(1000);
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Xóa link thành công.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        } else {
            Swal.fire(
                'Question?',
                'Check vào link muốn xóa?',
                'question'
            )
        }
    });

    // delete image
    $('.del-img').click(function () {

        var th = $(this);
        var id = $(this).attr("id");

        Swal.fire({
            title: 'Bạn có chắc không?',
            text: "Bạn sẽ không thể hoàn nguyên điều này!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'Delete/del_img.php',
                    type: 'POST',
                    data: { idd: id },
                    success: function (data) {
                        th.parents(".box-gallery").hide();
                    }
                })
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: 'Xóa ảnh thành công.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });

    });

    $('#kmFilter').on('change', function () {
        var codeKM = $(this).val();
        if (codeKM) {
            $.ajax({
                type: 'POST',
                url: 'Select/product_ctkm.php',
                data: {
                    'codekm': codeKM,
                },
                success: function (data) {
                    $('#productTable').html(data);
                }
            });
        }
    })


})