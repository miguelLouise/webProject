$(document).ready(function(){
    $("#delete_reservation").show().delay(5000).fadeOut(70);

    var getReservationStatus = $("#reservation_status").val();

    if (getReservationStatus === "Pending") {
        $(".no_action").show();
        $(".add_tenant_btn").hide();
        $(".delete_btn").hide();
    } else if (getReservationStatus === "Paid/Reserved") {
        $(".no_action").hide();
        $(".add_tenant_btn").show();
        $(".delete_btn").hide();
    } else if (getReservationStatus === "Overdue") {
        $(".no_action").hide();
        $(".delete_btn").show();
        $(".add_tenant_btn").hide();
    }

    $(document).on("change", "#reservation_status", function() {
        var getReservationId = $("#reservation_id").val();
        var getReservationStatus = $(this).val();

        if (getReservationStatus === "Pending") {
            $(".no_action").show();
            $(".add_tenant_btn").hide();
            $(".delete_btn").hide();
        } else if (getReservationStatus === "Paid/Reserved") {
            $(".no_action").hide();
            $(".add_tenant_btn").show();
            $(".delete_btn").hide();
        } else if (getReservationStatus === "Overdue") {
            $(".no_action").hide();
            $(".delete_btn").show();
            $(".add_tenant_btn").hide();
        }

          $.ajax({
              type: 'POST',
              url: 'updateReservationStatusAjax.php',
              data: {reservation_id:getReservationId, reservation_status:getReservationStatus},
              success: function(data){

              }
          });
      });
  });

  const delete_btn = document.getElementsByClassName("delete_btn");
  const cancel_btn = document.getElementsByClassName("cancel_btn");
  const confirm_div = document.getElementsByClassName("confirm_div");

  delete_btn.addEventListener("click",   () => {
      if (confirm_div.style.display === "none") {
        confirm_div.style.display = "block";
      } else {
      div.style.display = "none";
      }
  });

  cancel_btn.addEventListener("click",   () => {
      if (confirm_div.style.display === "none") {
        confirm_div.style.display = "block";
      } else {
        confirm_div.style.display = "none";
      }
  });

