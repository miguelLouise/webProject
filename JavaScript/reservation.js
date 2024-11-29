
let slideIndex = [0, 0, 0, 0]; // Stores the current index for each slider
        let slideIds = ['slider1', 'slider2', 'slider3', 'slider4']; // Corresponding slider IDs

        function moveSlide(n, sliderNum) {
            let slider = document.getElementById(slideIds[sliderNum]);
            let slides = slider.getElementsByClassName("slide");
            slideIndex[sliderNum] += n;

            if (slideIndex[sliderNum] >= slides.length) {
                slideIndex[sliderNum] = 0; // Wrap back to the first slide
            }

            if (slideIndex[sliderNum] < 0) {
                slideIndex[sliderNum] = slides.length - 1; // Wrap to the last slide
            }

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none"; // Hide all slides
            }

            slides[slideIndex[sliderNum]].style.display = "block"; // Show the current slide
        }

        // Initialize the sliders by showing the first slide of each
        for (let i = 0; i < slideIds.length; i++) {
            moveSlide(0, i); // Show the first slide of each slider
        }

// jquery
$(document).ready(function(){

    $(document).on("click", ".submit_btn", function() {
            var getRoomType = $(this).val();
            console.log(getRoomType);
            // $.ajax({
            //     type: 'POST',
            //     url: 'getRoomInfoAjax.php',
            //     data: {roomTyp:getRoomType},
            //     success: function(data){
            //         $('#reservation_container3').html(data);
            //     }
            // });
        });


    // var getRoomType = $("#room_typ").val();
    // console.log(getRoomType);

    //     $.ajax({
    //         type: 'POST',
    //         url: 'getFloorNumberAjax.php',
    //         data: {roomTyp:getRoomType},
    //         success: function(data){
    //             $('#flr_num').html(data);
    //         }
    //     });

    //     $.ajax({
    //         type: 'POST',
    //         url: 'getRoomInfoAjax.php',
    //         data: {roomTyp:getRoomType},
    //         success: function(data){
    //             $('#reservation_container3').html(data);
    //         }
    //     });


    // $(document).on("change", "#room_typ", function() {
    //     var getRoomType = $(this).val();
    //     $.ajax({
    //         type: 'POST',
    //         url: 'getFloorNumberAjax.php',
    //         data: {roomTyp:getRoomType},
    //         success: function(data){
    //             $('#flr_num').html(data);
    //         }
    //     });
    // });

    // $(document).on("change", "#room_typ", function() {
    //     var getRoomType = $(this).val();
    //     $.ajax({
    //         type: 'POST',
    //         url: 'getRoomInfoAjax.php',
    //         data: {roomTyp:getRoomType},
    //         success: function(data){
    //             $('#reservation_container3').html(data);
    //         }
    //     });
    // });

    // $(document).on("change", "#flr_num", function() {
    //     var getRoomType = $("#room_typ").val()
    //     var getFloor = $(this).val();
    //     $.ajax({
    //         type: 'POST',
    //         url: 'getRoomNumberAjax.php',
    //         data: {room_type:getRoomType,flr_num:getFloor},
    //         success: function(data){
    //             $('#room_num').html(data);
    //         }
    //     });
    // });

    // $(document).on("change", "#room_num", function() {
    //     var getRoomType = $("#room_typ").val()
    //     var getFloor = $("#flr_num").val();
    //     var getRoom = $(this).val();

    //     console.log(getRoomType);
    //     console.log(getFloor);
    //     console.log(getRoom);

    //     $.ajax({
    //         type: 'POST',
    //         url: 'getAvailabilityAjax.php',
    //         data: {room_type:getRoomType,flr_num:getFloor, room_num:getRoom},
    //         success: function(data){
    //             $('#reservation_confirmation').html(data);
    //         }
    //     });
    // });
});




