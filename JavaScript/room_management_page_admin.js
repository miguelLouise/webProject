$(document).ready(function(){
    // room type
  $(document).on("change", "#room_type", function() {
    var room_type = $(this).val();
    var floor_number = $("#floor_number").val();
    var room_status = $("#room_status").val();

    if (floor_number === null && room_status === null) {
      $.ajax({
          type: 'POST',
          url: 'ajax/filterByRoomType.php',
          data: {roomType:room_type},
          success: function(data){
            $('#table_body').html(data);
          }
      });
    }
    else if (floor_number !== null && room_status === null) {
      $.ajax({
        type: 'POST',
          url: 'ajax/filterByRoomTypeAndFloorNumber.php',
          data: {roomType:room_type, floorNumber:floor_number},
          success: function(data){
            $('#table_body').html(data);
          }
      });
    } else if (floor_number === null && room_status !== null){
      $.ajax({
          type: 'POST',
          url: 'ajax/filterByRoomTypeAndRoomStatus.php',
          data: {roomType:room_type, roomStatus:room_status},
          success: function(data){
            $('#table_body').html(data);
          }
      });
    } else if (floor_number !== null && room_status !== null){
      $.ajax({
          type: 'POST',
          url: 'ajax/filterByRoomTypeFloorNumberAndRoomStatus.php',
          data: {roomType:room_type, floorNumber:floor_number, roomStatus:room_status},
          success: function(data){
            $('#table_body').html(data);
          }
      });
    }
    });


  // floor number
$(document).on("change", "#floor_number", function() {
  var room_type = $("#room_type").val();
  var floor_number = $(this).val();
  var room_status = $("#room_status").val();

  if (room_type === null && room_status === null) {
    $.ajax({
      type: 'POST',
      url: 'ajax/filterByFloorNumber.php',
      data: {floorNumber:floor_number},
      success: function(data){
        $('#table_body').html(data);
      }
    });
  } else if(room_type !== null && room_status === null){
    $.ajax({
        type: 'POST',
        url: 'ajax/filterByRoomTypeAndFloorNumber.php',
        data: {roomType:room_type, floorNumber:floor_number},
        success: function(data){
          $('#table_body').html(data);
        }
    });
  }
  else if(room_type === null && room_status !== null){
    $.ajax({
        type: 'POST',
        url: 'ajax/filterByFloorNumberAndRoomStatus.php',
        data: {floorNumber:floor_number, roomStatus:room_status},
        success: function(data){
          $('#table_body').html(data);
        }
    });
  } else if (room_type !== null && room_status !== null){
    $.ajax({
        type: 'POST',
        url: 'ajax/filterByRoomTypeFloorNumberAndRoomStatus.php',
        data: {roomType:room_type, floorNumber:floor_number, roomStatus:room_status},
        success: function(data){
          $('#table_body').html(data);
        }
    });
  }
  });

  // room status
$(document).on("change", "#room_status", function() {
  var room_type = $("#room_type").val();
  var floor_number = $("#floor_number").val();
  var room_status = $(this).val();

  if (room_type === null && floor_number === null) {
    $.ajax({
      type: 'POST',
      url: 'ajax/filterByRoomStatus.php',
      data: {roomStatus:room_status},
        success: function(data){
        $('#table_body').html(data);
      }
    });
  } else if(room_type !== null && floor_number === null){
    $.ajax({
      type: 'POST',
      url: 'ajax/filterByRoomTypeAndRoomStatus.php',
      data: {roomType:room_type, roomStatus:room_status},
      success: function(data){
        $('#table_body').html(data);
      }
    });
  } else if(room_type === null && floor_number !== null){
    $.ajax({
      type: 'POST',
      url: 'ajax/filterByFloorNumberAndRoomStatus.php',
      data: {floorNumber:floor_number, roomStatus:room_status},
      success: function(data){
        $('#table_body').html(data);
        }
    });
  } else if(room_type !== null && floor_number !== null){
    $.ajax({
        type: 'POST',
        url: 'ajax/filterByRoomTypeFloorNumberAndRoomStatus.php',
        data: {roomType:room_type, floorNumber:floor_number, roomStatus:room_status},
        success: function(data){
          $('#table_body').html(data);
        }
    });
  }
  });
});