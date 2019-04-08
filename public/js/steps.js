var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h5"
    , bodyTag: "section"
    , transitionEffect: "fade"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
        finish: "Finalize Votes"
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    }
    , onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    }
    , onFinished: function (event, currentIndex) {
        form.submit();
        // swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
    }
}), $(".validation-wizard").validate({
    ignore: "input[type=hidden]"
    , errorClass: "text-danger"
    , successClass: "text-success"
    , highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , errorPlacement: function (error, element) {
        error.insertAfter(element)
    }
    , rules: {
        email: {
            email: !0
        }
    }
});

for(let i = 1; i < 50; i++) {

    let className = ".cbox".concat(i);

    // $(className).on("click", function() {
    //     let numberOfChecked = $('input.cbox'+i+':checkbox:checked').length;
    //     if (numberOfChecked > 1) {
    //       //  $(className).attr('checked',false);
    //         $(this).prop('checked', false);
    //     }
    // });
    $(className).on("change", function() {
        $(className).not(this).prop('checked',false);
    });

}



