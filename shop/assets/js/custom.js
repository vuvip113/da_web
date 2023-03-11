$(document).ready(function () {
  $(document).on("click", ".increment-btn", function (e) {
    e.preventDefault();
    var qty = $(this).closest(".product_data").find(".input-qty").val();
    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value < 10) {
      value++;
      //$('.input-qty').val(value);
      $(this).closest(".product_data").find(".input-qty").val(value);
    }
  });

  $(document).on("click", ".decrement-btn", function (e) {
    e.preventDefault();
    var qty = $(this).closest(".product_data").find(".input-qty").val();
    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
      value--;
      //$('.input-qty').val(value);
      $(this).closest(".product_data").find(".input-qty").val(value);
    }
  });

  $(document).on("click", ".addToCardBtn", function (e) {
    e.preventDefault();

    var qty = $(this).closest(".product_data").find(".input-qty").val();
    var prod_id = $(this).val();

    $.ajax({
      method: "POST",
      url: "funtions/handlecart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,
        scope: "add",
      },
      success: function (response) {
        if (response == 201) {
          alertify.success("Da them SP vao gio Hang");
        } else if (response == "existing") {
          alertify.success("San Pham da co san roi !!!");
        } else if (response == 401) {
          alertify.success("Dang nhap da roi moi duoc mua hang");
        } else if (response == 500) {
          alertify.success("Loi!!!");
        }
      },
    });
  });

  $(document).on("click", ".updateQty", function () {
    //alert("wow");

    var qty = $(this).closest(".product_data").find(".input-qty").val();
    var prod_id = $(this).closest(".product_data").find(".prodId").val();

    $.ajax({
      method: "POST",
      url: "funtions/handlecart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,
        scope: "update",
      },
      success: function (response) {
        // alert(response);
      },
    });
  });

  $(document).on("click", ".deleteItem", function () {
    var cart_id = $(this).val();
    //alert(cart_id);
    $.ajax({
      method: "POST",
      url: "funtions/handlecart.php",
      data: {
        cart_id: cart_id,
        scope: "delete",
      },
      success: function (response) {
        // alert(response);
        if (response == 200) {
          alertify.success("Đã xóa sản phẩm thành công !!!");
          $("#mycart").load(location.href + " #mycart");
        } else {
          alertify.success(response);
        }
      },
    });
  });
});
