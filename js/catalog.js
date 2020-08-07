$(document).ready(function () {
    function reverse () {
        let i = 1;
        $.each($('.item-wrapper-product'), function (index, val) { 
            if (i % 2 === 0) {
                $(this).attr('id', 'left-reverse');
            }
            i++
        });
    }
    reverse();
    $('.buy-link').click(function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $('.hidden-form-buy').arcticmodal();
        localStorage.setItem('idProd', id);
        localStorage.setItem('col', '1');
        $.ajax({
            type: "POST",
            url: "/catalog/getDataProduct",
            data: {id: id},
            dataType: "json",
            success: function (data) {
                if (data.status == 'success') {
                    $.each(data.data, function (index, val) {
                        let html = `<img src="/img/product/${val.image}" alt=""/>` 
                        $('.image-wrapper-buy').html(html);
                        $('.name-form-buy').text(val.name)
                        let col = localStorage.getItem('col');
                        $('#col-product').val(col)
                    });
                }
            }
        });
    })
    $('#col-product').keyup(function () {
        let val = $(this).val()
        if (val === ''){
            localStorage.setItem('col', '0');
        } else {
            localStorage.setItem('col', val);
        }
        
    })
    $('.remove-buy-form').click(function (e) {
        e.preventDefault();
        localStorage.clear();
        location.reload();
    })
    
})