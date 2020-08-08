$(document).ready(function () {

    function countriesSelect() {
        let countries = ['Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bangladesh', 'Barbados', 'Bahamas', 'Bahrain', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'British Indian Ocean Territory', 'British Virgin Islands', 'Brunei Darussalam', 'Bulgaria', 'Burkina Faso', 'Burma', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Colombia', 'Comoros', 'Congo-Brazzaville', 'Congo-Kinshasa', 'Cook Islands', 'Costa Rica', 'Croatia', 'Cura?ao', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'East Timor', 'Ecuador', 'El Salvador', 'Egypt', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands', 'Faroe Islands', 'Federated States of Micronesia', 'Fiji', 'Finland', 'France', 'French Guiana', 'French Polynesia', 'French Southern Lands', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard and McDonald Islands', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iraq', 'Ireland', 'Isle of Man', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jersey', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macau', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco', 'Mozambique', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn Islands', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'R?union', 'Romania', 'Russia', 'Rwanda', 'Saint Barth?lemy', 'Saint Helena', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Martin', 'Saint Pierre and Miquelon', 'Saint Vincent', 'Samoa', 'San Marino', 'S?o Tom? and Pr?ncipe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Sint Maarten', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia', 'South Korea', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard and Jan Mayen', 'Sweden', 'Swaziland', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Togo', 'Tokelau', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks and Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City', 'Vietnam', 'Venezuela', 'Wallis and Futuna', 'Western Sahara', 'Yemen', 'Zambia', 'Zimbabwe'];

        for (let i = 0; i < countries.length; i++) {
            let html = `<option value="${countries[i]}">${countries[i]}</option>`;
            $('#countrySelect').prepend(html);
        }
    }
    let id = localStorage.getItem('idProd');
    countriesSelect();
    function dataProduct(idProduct) {

        $.ajax({
            type: "POST",
            url: "/catalog/getDataProduct",
            data: { id: idProduct },
            dataType: "json",
            success: function (data) {
                if (data.status === 'success') {
                    $.each(data.data, function (index, val) {
                        $('.image-compos-order').prepend(`<img src="/img/product/${val.image}" alt=""/>`)
                        $('.h1-order-item').text(val.name)
                        let qnt = localStorage.getItem('col');
                        $('.qnt-item').text(`${qnt} QNT`);
                        if (val.discount != '0') {
                            let priceDiscount = val.price - (val.price * val.discount / 100);
                            $('.price-discount-item-order').prepend(`<p class="discount-order-item numb">${priceDiscount * qnt}</p>`);
                            $('.price-discount-item-order').prepend(`<p class="price-order-item numb">${val.price * qnt}</p>`);

                        } else {
                            $('.price-discount-item-order').prepend(`<p class="discount-order-item numb">${val.price * qnt}</p>`);
                        }

                    });
                }
            }
        });
    }
    dataProduct(id);



    function orderData(id) {
        $.ajax({
            type: "POST",
            url: "/catalog/getDataProduct",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                if (data.status === 'success') {
                    let qnt = localStorage.getItem('col');
                    $.each(data.data, function (index, val) {
                        let priceDiscount = val.price - (val.price * val.discount / 100);
                        $('.total-remove-order').append(`<p class="total-order-item numb">${priceDiscount}</p>`);
                        $('.subtotal-remove-order').append(`<p class="sale-order-item numb">${val.price * qnt}</p>`);
                        $('.sale-remove-order').append(`<p class="sale-order-item numb">${(val.price * val.discount / 100) * qnt}</p>`);

                    })
                }
            }
        })
    }
    orderData(id)
    function test () {
        let id = localStorage.getItem('idProd');
        let qnt = localStorage.getItem('col');
        
        $('#idProduct').val(id)
        $('#colProduct').val(qnt);
        
        $.ajax({
            type: "POST",
            url: "/catalog/getDataProduct",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                if (data.status === 'success') {
                    let qnt = localStorage.getItem('col');
                    $.each(data.data, function (index, val) {
                        $('#priceForm').val((val.price * val.discount / 100) * qnt);
                        $('#discountProduct').val(val.price * val.discount / 100);
                    })
                }
            }
        })
    }
    test()
    $('.form-order-wrapper').submit(function (e) {
        e.preventDefault();
        let form = $(this)
        
        $.ajax({
            type: "POST",
            url: "/order/addOrder",
            data: form.serialize(),
            dataType: "json",
            success: function (result) {
                if (result.status === 'success') {
                    $('.message-ok').arcticmodal();
                    $('.form-order-wrapper').trigger('reset');
                    setTimeout(() => {
                        $(location).attr('href','/');
                    }, 1000);
                    
                    localStorage.clear();
                }
            }
        });
    })
    
})