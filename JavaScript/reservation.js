// jquery
$(document).ready(function(){
    var getRoomType = $("#room_typ").val();
    console.log(getRoomType);

        $.ajax({
            type: 'POST',
            url: 'getFloorNumberAjax.php',
            data: {roomTyp:getRoomType},
            success: function(data){
                $('#flr_num').html(data);
            }
        });

        $.ajax({
            type: 'POST',
            url: 'getRoomInfoAjax.php',
            data: {roomTyp:getRoomType},
            success: function(data){
                $('#reservation_container3').html(data);
            }
        });

    // $("#reservation_error").show().delay(5000).fadeOut(70);
    // $("#reservation_success").show().delay(5000).fadeOut(70);
    // $("#room_availability_error").show().delay(5000).fadeOut(70);
    // $("#user_already_reserved_error").show().delay(5000).fadeOut(70);

    $(document).on("change", "#room_typ", function() {
        var getRoomType = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'getFloorNumberAjax.php',
            data: {roomTyp:getRoomType},
            success: function(data){
                $('#flr_num').html(data);
            }
        });
    });

    $(document).on("change", "#room_typ", function() {
        var getRoomType = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'getRoomInfoAjax.php',
            data: {roomTyp:getRoomType},
            success: function(data){
                $('#reservation_container3').html(data);
            }
        });
    });

    $(document).on("change", "#flr_num", function() {
        var getRoomType = $("#room_typ").val()
        var getFloor = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'getRoomNumberAjax.php',
            data: {room_type:getRoomType,flr_num:getFloor},
            success: function(data){
                $('#room_num').html(data);
            }
        });
    });

    $(document).on("change", "#room_num", function() {
        var getRoomType = $("#room_typ").val()
        var getFloor = $("#flr_num").val();
        var getRoom = $(this).val();

        console.log(getRoomType);
        console.log(getFloor);
        console.log(getRoom);

        $.ajax({
            type: 'POST',
            url: 'getAvailabilityAjax.php',
            data: {room_type:getRoomType,flr_num:getFloor, room_num:getRoom},
            success: function(data){
                $('#reservation_confirmation').html(data);
            }
        });
    });
});




