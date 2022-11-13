jQuery.validator.setDefaults({
    errorElement: 'div',
    errorClass: 'invalid-feedback',
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid').addClass('is-valid');
    },
})