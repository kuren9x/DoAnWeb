$(document).ready(function() {
    // function fetch_data() {
    //     $.ajax({
    //         url: "?mod=cart&action=index",
    //         method: "POST",
    //         data: data,
    //         dataType: "json",
    //         success: function(data) {
    //             $("#load_data").html(data);
    //             fetch_data();
    //         },
    //     });
    // };
    // fetch_data();
    $(document).on('click', '#delete_order', function() {
        if (confirm('Bạn có chắc chắn xóa')) {
            var id = $(this).attr('delete');
            var data = { id: id };
            console.log(data);
            $.ajax({
                url: "?mod=cart&action=delete_cart",
                method: "POST",
                data: data,
                dataType: "json",
                success: function(data) {
                    // alert("Xóa dữ liệu thành công");
                    // fetch_data();
                    console.log(data);
                },
            });
        }


    });

})