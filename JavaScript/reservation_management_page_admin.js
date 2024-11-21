$(document).ready(function(){
    $(".reservation_status").each(function() {
      const getReservationDetails = $(this).val().split(",");
      const getReservationStatus = getReservationDetails[0];
      const getReservationId = getReservationDetails[1];

      const no_action = document.getElementById(getReservationId + "=no_action");
      const add_tenant_btn = document.getElementById(getReservationId + "=add_tenant_btn");
      const delete_btn = document.getElementById(getReservationId + "=delete_btn");

      if (getReservationStatus == "Pending") {
        $(no_action).css("display", "block");
        $(add_tenant_btn).css("display", "none");
        $(delete_btn).css("display", "none");
      } else if (getReservationStatus == "Paid/Reserved") {
        $(no_action).css("display", "none");
        $(add_tenant_btn).css("display", "block");
        $(delete_btn).css("display", "none");
      } else if (getReservationStatus == "Overdue") {
        $(no_action).css("display", "none");
        $(add_tenant_btn).css("display", "none");
        $(delete_btn).css("display", "block");
      }
    });

    $("#delete_reservation").show().delay(5000).fadeOut(70);
    var ReservationStatus = $(".reservation_status").val();

    // downpayment details
    $(document).on("click", ".dp_detail_btn", function() {
      const getReservationDetails = $(this).val();
      const dp_details = document.getElementById(getReservationDetails + "=payment_details");

      $(dp_details).toggle();

      $.ajax({
          type: 'POST',
          url: 'ajax/getReservationPaymentInformation.php',
          data: {reservation_Id:getReservationDetails},
          success: function(data){
            $(".dp_details2").html(data);
          }
      });
    });

    $(document).on("click", ".close_btn", function() {
      const getReservationDetails = $(this).val();
      const dp_details = document.getElementById(getReservationDetails + "=payment_details");

      $(dp_details).toggle();
    });

    // confirmation
    $(document).on("click", ".delete_btn", function() {
      const getReservationDetails = $(this).val();
      const delete_confirmation = document.getElementById(getReservationDetails + "=confirmation");

      $(delete_confirmation).toggle();
    });

    $(document).on("click", ".cancel_btn", function() {
      const getReservationDetails = $(this).val();
      const delete_confirmation = document.getElementById(getReservationDetails + "=confirmation");

      $(delete_confirmation).toggle();

      console.log(getReservationDetails);
    });

    $(document).on("change", ".reservation_status", function() {
        const getReservationDetails = $(this).val().split(",");
        const getReservationStatus = getReservationDetails[0];
        const getReservationId = getReservationDetails[1];

        const no_action = document.getElementById(getReservationId + "=no_action");
        const add_tenant_btn = document.getElementById(getReservationId + "=add_tenant_btn");
        const delete_btn = document.getElementById(getReservationId + "=delete_btn");

        if (getReservationStatus == "Pending") {
          $(no_action).css("display", "block");
          $(add_tenant_btn).css("display", "none");
          $(delete_btn).css("display", "none");
        } else if (getReservationStatus == "Paid/Reserved") {
          $(no_action).css("display", "none");
          $(add_tenant_btn).css("display", "block");
          $(delete_btn).css("display", "none");
        } else if (getReservationStatus == "Overdue") {
          $(no_action).css("display", "none");
          $(add_tenant_btn).css("display", "none");
          $(delete_btn).css("display", "block");
        }

      $.ajax({
          type: 'POST',
          url: 'updateReservationStatusAjax.php',
          data: {reservation_id:getReservationId, reservation_status:getReservationStatus},
          success: function(data){

          }
      });
  });

  // const delete_btn = document.getElementsByClassName("delete_btn");
  // const cancel_btn = document.getElementsByClassName("cancel_btn");
  // const confirm_div = document.getElementsByClassName("confirm_div");

  // delete_btn.addEventListener("click",   () => {
  //     if (confirm_div.style.display === "none") {
  //       confirm_div.style.display = "block";
  //     } else {
  //     div.style.display = "none";
  //     }
  //   });

  // cancel_btn.addEventListener("click",   () => {
  //     if (confirm_div.style.display === "none") {
  //       confirm_div.style.display = "block";
  //     } else {
  //       confirm_div.style.display = "none";
  //     }
  //   });
});

