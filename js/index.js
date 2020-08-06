$(document).ready(function () {
    $('.review-wrapper').slick({
        dots: true,
    });
    $('.link-add-review').click(function (e) {
        e.preventDefault();
        $('.hidden-form-review').arcticmodal();
    })
   
    $('.add-review').submit(function (e) {
        e.preventDefault();
        $('.label-wrapper-review').addClass('dn');
        $('.add-review button').addClass('dn');
        $('.message-form').addClass('dib')
        let form = $(this)
        $.ajax({
            type: "POST",
            url: "/addReview",
            data: form.serialize(),
            dataType: "json",
            success: function (result) {
                if (result.status === 'success') {
                    $('.label-wrapper-review').addClass('dn');
                    $('.add-review button').addClass('dn');
                    $('.message-form').addClass('message-form-active');
                    
                }
            }
        });
    })
})