$(document).ready(function () {
  $(document).on("click", ".delete_product_btn", function (e) {
    e.preventDefault();

    var id = $(this).val();
    //alert(id);

    swal({
      title: "Ban co muon xoa khong?",
      text: "Sau khi xóa, bạn sẽ không thể khôi phục tệp này!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "code.php",
          data: {
            product_id: id,
            delete_product_btn: true,
          },
          success: function (response) {
            // console.log(response);
            if (response == 200) {
              swal("Success!", "Xoa Thanh Cong", "success");
              $("#pro_table").load(location.href + " #pro_table");
            } else if (response == 500) {
              swal("Loi!", "Loi Xoa!!!", "error");
            }
          },
        });
      }
    });
  });

  $(document).on("click", ".delete_category_btn", function (e) {
    e.preventDefault();

    var id = $(this).val();
    //alert(id);

    swal({
      title: "Ban co muon xoa khong?",
      text: "Sau khi xóa, bạn sẽ không thể khôi phục tệp này!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "code.php",
          data: {
            category_id: id,
            delete_category_btn: true,
          },
          success: function (response) {
            // console.log(response);
            if (response == 200) {
              swal("Success!", "Xoa Thanh Cong", "success");
              $("#category_table").load(location.href + " #category_table");
            } else if (response == 500) {
              swal("Loi!", "Loi Xoa!!!", "error");
            }
          },
        });
      }
    });
  });

  // $(document).on('click', '.delete_product_btn', function (e) {

  //   e.preventDefault();

  //   var id = $(this).val();
  //   //alert(id);

  //   swal({
  //     title: "Ban co muon xoa khong?",
  //     text: "Sau khi xóa, bạn sẽ không thể khôi phục tệp này!",
  //     icon: "warning",
  //     buttons: true,
  //     dangerMode: true,
  //   })
  //     .then((willDelete) => {
  //       if (willDelete) {
  //         $.ajax({
  //           method: "POST",
  //           url: "code.php",
  //           data: {
  //             'product_id': id,
  //             'delete_product_btn': true
  //           },
  //           success: function (response) {
  //             // console.log(response);
  //             if (response == 200) {
  //               swal("Success!", "Xoa Thanh Cong", "success");
  //               $("#pro_table").load(location.href + " #pro_table");
  //             } else if (response == 500) {
  //               swal("Loi!", "Loi Xoa!!!", "error");
  //             }
  //           }
  //         })
  //       }
  //     });
  // });
});
