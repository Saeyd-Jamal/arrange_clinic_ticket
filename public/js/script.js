(function ($) {
    let num_box = $('#num_box');
    let num_inp = $('#num_inp');
    $("#plus").on("click", function (e) {
        $.ajax({
            url: "/doctor/getNumTeckit",
            method: "post",
            data: {
                type: "plus",
                _token: csrf_token,
            },
            success: function (response) {
                num_box.text(response);
                num_inp.val(response);
            },
        });
    });
    $("#minus").on("click", function (e) {
        $.ajax({
            url: "/doctor/getNumTeckit",
            method: "post",
            data: {
                type: "minus",
                _token: csrf_token,
            },
            success: function (response) {
                num_box.text(response);
                num_inp.val(response);
            },
        });
    });

    $('#num_inp').on("input", function (e) {
        $.ajax({
            url: "/doctor/getNumTeckit",
            method: "post",
            data: {
                type: "num",
                val: $(this).val(),
                _token: csrf_token,
            },
            success: function (response) {
                num_box.text(response);
            },
        });
    });
})(jQuery);


