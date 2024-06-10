const playButton = document.getElementById('playButton');
const audio = document.getElementById('tik');
const boxs = document.getElementById('boxs');

// // playButton.addEventListener('click', () => {
// //     audio.play();
// // });;
function palyBtn(){
    // playButton.css("display", "none");
    $("div.div").slideToggle();
    audio.play();
}

(function ($) {

    $("#playButton").click(function(){
        $("div#bb").slideToggle();
    });
    setInterval(function () {
        $.ajax({
            url: "/front_view/getClinicViewAjax",
            method: "get",
            data: {
                num_clinics: num_clinics,
                clinic1: $("#clinic1").val(),
                clinic2: $("#clinic2").val(),
                clinic3: $("#clinic3").val(),
                clinic4: $("#clinic4").val(),
                clinic_update: $("#clinic_update").val(),
                _token: csrf_token,
            },
            success: function (response) {
                let response_val = JSON.parse(response);
                $("#clinicbox_1").text(response_val["clinic1"]);
                $("#clinicbox_2").text(response_val["clinic2"]);
                $("#clinicbox_3").text(response_val["clinic3"]);
                $("#clinicbox_4").text(response_val["clinic4"]);
                if(response_val['sound'] == true){
                    audio.play();
                }
            },
        });
    }, 5000);
})(jQuery);
