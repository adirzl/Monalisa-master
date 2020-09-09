$(document).ready(function(){
    $('.modal').modal({dismissible: false});
});

$('#qty').on('keypress', function(event){
    return isNumberKey(event) ? true : false;
});

$('#amount_received').on('keypress', function(event){
    return isNumberKey(event) ? true : false;
});

/**
 * memastikan inputan adalah angka
 * @param {boolean} evt
 *
 */
function isNumberKey(evt)
{
   let charCode = (evt.which) ? evt.which : event.keyCode
   return (charCode > 31 && (charCode < 48 || charCode > 57)) ? false : true;
}

$('.btn-add-to-cart').on('click', function(){
    let param = $(this).data('itemid');
    let itemName = $(this).data('itemname');
    let ordertype = $('#ordertype').val();

    addRemoveCartItem(param,itemName,  1, ordertype);
});

$('.btn-rem-from-cart').on('click', function(){
    let param = $(this).data('itemid');
    let itemName = $(this).data('itemname');
    let ordertype = $('#ordertype').val();

    addRemoveCartItem(param, itemName, -1, ordertype);
});

// $('#btn-qty-inc').on('click', function(){
//     let newValue = parseInt($('#qty').val()) + 1;
//     $('#qty').val(newValue);
// });

// $('#btn-qty-dec').on('click', function(){
//     let newValue = parseInt($('#qty').val()) - 1;
//     if(newValue < 0){
//         swal({
//             title: "Qty kurang dari 0",
//             text: "anda tidak dapat mengisi kolom qty lebih kecil dari 0",
//             icon: 'error'
//         })
//     }else{
//         $('#qty').val(newValue);
//     }
// });

function addRemoveCartItem(productID, productName, state, ordertype){
    $('#modal_loader').modal('open');
    let request = $.post('/detailcart/addRemoveCartItem', { 'product_id': productID, 'state': state, 'ordertype': ordertype });

    request.done(function(response) {console.log(response);
        reloadCart();
        reloadProductList('null');
        M.toast({
            html: state + ' ' + productName +' ' + response['status'] + ' [' +response['message'] + ']'
        });
        $('#modal_loader').modal('close');
    });
}

// function addRemoveProduct(productID, productName, qty, state){
//     if(state == 1){
//         let request = $.get('/product/'+productID+'/getDetailAjx');
//         request.done(function(response) {
//             let stockAvailable = response['data']['stock'];

//             if(stockAvailable >= (qty +1)){
//                 let request = $.post('/detailcart/addToCart', { 'product_id': productID, 'qty': qty });

//                 request.done(function(response) {
//                     reloadCart();
//                     M.toast({
//                         html: 'Tambah '+ qty + ' ' + productName +' ' + response['status']
//                     });
//                 });
//             }else{
//                 swal({
//                     title: "Stock tidak tersedia",
//                     text: "Jumlah stok yang dimasukan lebih besar dari jumlah stok tersedia",
//                     icon: 'error'
//                 });
//                 return false;
//             }
//             reloadProductList('null');
//         });
//     }else{
//         let request = $.post('/detailcart/deleteFromCart', { 'product_id': productID });

//         request.done(function(response) {
//             reloadCart();
//             reloadProductList('null');
//             M.toast({
//                 html: 'Hapus ' + productName +' ' + response['status']
//             });
//         });
//     }
// };

function reloadCart(){
    let request = $.get('/detailcart/getAllCart');

    request.done(function(response) {
        $('#table-cart .list-product-cart').remove();
        $('#cart-total').html(response['total']);
        $('#cart-disc-percentage').html(response['discount']['percentage']);
        $('#cart-disc-amount').html(response['discount']['amount_label']);
        $('#cart-tax').html(response['tax']);
        $('#cart-grandtotal').html(response['grandTotal']);

        $.each(response['data'], function(index){
            $('#table-cart #table-cart-tbody').prepend(
                '<tr class="list-product-cart">'+
                    '<td>'+ response['data'][index]['name'] +'</td>' +
                    '<td>'+ response['data'][index]['qty'] +'</td>' +
                    '<td>'+ response['data'][index]['price'] +'</td>' +
                    '<td>'+ response['data'][index]['subtotal']  +'</td>' +
                '</tr>'
            );
        });
    });
}

function getSpecificCart(product_id){
    let request = $.get('/detailcart/'+product_id+'/getSpecificCart');

    request.done(function(response) {
        let qty = response['data']['qty'];
        $('#qty').val(qty);
    });
}

function reloadProductList(param){
    // $('#modal_loader').modal('open');
    let request = $.get('/product/'+param+'/getProductListByParam');
    request.done(function(response) {
        $('#tbl-productlist tbody').html('');
        let data = response['data'];
        $.each(data, function(index){
            $('#tbl-productlist tbody').append(
                '<tr id="row_'+index+'">' +
                '<td>'+response['data'][index]['qty']+'</td>' +
                '<td>'+response['data'][index]['name']+'<br />('+response['data'][index]['category']+')</td>' +
                '<td>'+response['data'][index]['price']+'</td>' +
                '<td>'+response['data'][index]['vendor_price']+'</td>' +
                '<td>'+response['data'][index]['stock']+'</td>' +
                '<td style="width: 10%"><button data-itemid="'+response['data'][index]['id']+'" data-itemname="'+response['data'][index]['name']+'" type="button" class="btn btn-small waves-effect waves-light cyan btn-add-to-cart mb-3"><i class="material-icons">exposure_plus_1</i></button><button data-itemid="'+response['data'][index]['id']+'" type="button" class="btn btn-small waves-effect waves-light pink btn-rem-from-cart"><i class="material-icons">exposure_neg_1</i></button></td>' +
                '</tr>'
            );

            $('#row_'+index+ ' .btn-add-to-cart').on('click', function(){
                let param = $(this).data('itemid');
                let itemName = $(this).data('itemname');
                addRemoveCartItem(param,itemName,  1);
            });

            $('#row_'+index+ ' .btn-rem-from-cart').on('click', function(){
                let param = $(this).data('itemid');
                let itemName = $(this).data('itemname');
                addRemoveCartItem(param,itemName,  -1);
            });
        });
        // $('#modal_loader').modal('close');
    });
}

function showModalAddCart(param){
    let request = $.get('/product/'+param+'/getDetailAjx');

    request.done(function(response) {
        $('#product-id').val(response['data']['id']);
        $('#product-name').html(response['data']['name']);
        $('#product-price').html('Harga : '+response['data']['price']);
        $('#product-stock').html('Stok : '+response['data']['stock']+ ' ' + response['data']['unit']);
        $('#product-category').html(response['data']['category']);

        getSpecificCart(param);
        $('#modal_add_product_to_cart').modal('open');
    });
}

function storeOrder(ordertype, status, customer_id, note, paymenttype = null, amount_received = null, payment_number = null){
    $('#modal_loader').modal('open');
    let request = $.get('/detailcart/getCountByUser');
    request.done(function(response) {
        if(response['data'] > 0){
            let request = $.post('/order/save_transaction', { 'ordertype': ordertype, 'status': status, 'customer_id': customer_id, 'note': note, 'paymenttype': paymenttype, 'amount_received': amount_received, 'payment_number': payment_number });

            request.done(function(response) {console.log(response);
                reloadCart();
                M.toast({
                    html: response['status'] +' ' + response['message'],
                    completeCallback: function () {
                        window.location = "./"+response['id']+"/invoice";
                    }
                });
            });

            request.fail(function (jqXHR, textStatus, errorThrown) {
                var ul = document.createElement('ul');
                for(let i in jqXHR['responseJSON']['errors']){
                    var li = document.createElement('li');
                    ul.appendChild(li);
                    li.innerHTML = li.innerHTML + jqXHR['responseJSON']['errors'][i];
                }

                swal({
                    title: "Proses simpan data gagal!",
                    content: { element: ul},
                    icon: 'error'
                })
            });
        }else{
            swal({
                title: "Anda belum memilih produk",
                text: "silahkan lengkapi isian terlebih dahulu",
                icon: 'error'
            });
        }
        $('#modal_loader').modal('close');
    });
}

function updateOrder(id, ordertype, status, customer_id, paymenttype = null, amount_received = null, payment_number = null, grandtotal = null){
    $('#modal_loader').modal('open');
    let request = $.post('/order/update_transaction', { 'id': id, 'ordertype': ordertype, 'status': status, 'customer_id': customer_id, 'paymenttype': paymenttype, 'amount_received': amount_received, 'payment_number': payment_number, 'grandtotal': grandtotal });

    request.done(function(response) {
        reloadCart();
        M.toast({
            html: response['status'] +' ' + response['message'],
            completeCallback: function () {
                window.location = "./invoice";
            }
        });
        $('#modal_loader').modal('close');
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        var ul = document.createElement('ul');
        for(let i in jqXHR['responseJSON']['errors']){
            var li = document.createElement('li');
            ul.appendChild(li);
            li.innerHTML = li.innerHTML + jqXHR['responseJSON']['errors'][i];
        }

        swal({
            title: "Proses simpan data gagal!",
            content: { element: ul},
            icon: 'error'
        })
        $('#modal_loader').modal('close');
    });
}


$('#ordertype').on('change', function(){
    let request = $.get('/detailcart/getCountByUser');
    request.done(function(response) {
        if(response['data'] > 0){
            swal({
                title: "Mengganti tipe order akan menghapus keranjang belanjaan anda?",
                text: "anda akan mengosongkan keranjang belanjaan anda",
                icon: 'warning',
                buttons: {
                    cancel: 'No',
                    submit: 'Yes'
                }
            }).then(result => { if (result) {
                let request = $.get('/detailcart/emptyByUser');
                request.done(function(response) {
                    window.location = './create';
                });
            } });
        }
    });
});

$('#filter_product').on('keyup', function(){
    let param = $(this).val().length == 0 ? 'null' : $(this).val();
    reloadProductList(param);
});

$('#btn-clear-cart').on('click', function(){
        swal({
            title: "Kosongkan belanjaan anda?",
            text: "anda akan mengosongkan keranjang belanjaan anda",
            icon: 'warning',
            buttons: {
                cancel: 'No',
                submit: 'Yes'
            }
        }).then(result => { if (result) {
            let request = $.get('/detailcart/emptyByUser');
            request.done(function(response) {
                window.location = './create';
            });
        } });
});

$('#btn-commit-cart').on('click', function(){
    let ordertype = $('#ordertype :selected').val();

    if(ordertype){
        let request = $.get('/detailcart/getCountByUser');
        request.done(function(response) {
            if(response['data'] > 0){
                $('#modal_payment').modal('open');
                $('#plh-grandtotal').html('Grand Total : '+$('#cart-grandtotal h5').html());
            }else{
                swal({
                    title: "Anda belum memilih produk",
                    text: "silahkan lengkapi isian terlebih dahulu",
                    icon: 'info'
                });
            }
        });
    }else{
        swal({
            title: "Data tidak lengkap",
            text: "Anda belum memilih type order",
            icon: 'error'
        })
    }
});

$('#btn-find-customer').on('click', function(){
    $('#modal_loader').modal('open');
    let param = $('#search_customer_id').val();
    if(param != null){
        let request = $.get('/customer/'+param+'/getCustomerByName');
        request.done(function(response) {
            let tableView = '';
            if(response['data'].length > 0)
            {
                $.each(response['data'], function(index){
                    tableView +=
                    '<tr>' +
                        '<td></td?' +
                        '<td><label><input class="rad_customer_id" type="radio" name="customer_id[]" data-customername="'+response['data'][index]['name']+'" value="'+ response['data'][index]['id'] +'" /><span></span><label></td>' +
                        '<td>' + response['data'][index]['name'] + '</td>' +
                        '<td>' + response['data'][index]['address'] + '</td>' +
                        '<td>' + response['data'][index]['phone'] + '</td>' +
                    '</tr>';
                });
            }else{
                tableView += '<tr><td colspan="4">No Record(s) Found</td></tr>';
            }

            $('#customer-table #customer-list').html(tableView);

            $('.rad_customer_id').on('change', function(){console.log($(this).html());
                if($(this).is(':checked')){
                    let cust_id = $(this).val();
                    let cust_name = $(this).data('customername');
                    $('#customer_id').val(cust_id);
                    $('#order_customer_id').val(cust_name);
                    $('#modal-select-customer').modal('close');
                }
            });
        });
    }else{
        swal({
            title: "Silahkan masukan keyword",
            text: "silahkan masukan keyword untuk costumer",
            icon: 'info'
        })
    }
    $('#modal_loader').modal('close');
});

$('#btn-add-customer').on('click', function(){

});

$('#btn-bayar').on('click', function(){
    let ordertype = $('#ordertype :selected').val();

    if(ordertype == 3){
        customer_id = $('#customer_id:checked').val();
    }

    if(ordertype != ''){
        $('#order_payment_tab').removeAttr('hidden');
        $('#order_profile_tab').attr('hidden', true);
    }else{
        swal({
            title: "Isi Order Type",
            text: "silahkan lengkapi data order terlebih dahulu",
            icon: 'error'
        })
    }


});

$('#btn-payment').on('click', function(){
    swal({
        title: "Anda yakin?",
        text: "anda yakin untuk membayar order ini",
        icon: 'warning',
        buttons: {
            cancel: 'No',
            submit: 'Yes'
        }
    }).then(result => { if (result) {
        let ordertype = $('#ordertype :selected').val();
        let status = 2;
        let customer_id = $('#customer_id').val();
        let note = $('#note').val();
        let paymenttype = $('#paymenttype :selected').val();
        let amount_received = $('#amount_received').val();
        let payment_number = $('#payment_number').val();
        let id = $('#id').val();
        let grandtotal = $('#grand-total').val();

        if(id){
            updateOrder(id, ordertype, status, customer_id, paymenttype, amount_received, payment_number, grandtotal);
        }else{
            storeOrder(ordertype, status, customer_id, note,paymenttype, amount_received, payment_number);
        }
    } });

});

$('#btn-save-order').on('click', function(){
    swal({
        title: "Anda yakin?",
        text: "anda yakin untuk menyimpan order ini",
        icon: 'warning',
        buttons: {
            cancel: 'No',
            submit: 'Yes'
        }
    }).then(result => { if (result) {
        let ordertype = $('#ordertype :selected').val();
        let status = 1;
        let customer_id = $('#customer_id').val();
        let note = $('#note').val();

        storeOrder(ordertype, status, customer_id, note);
    } });
    // let paymenttype = $('#paymenttype :selected').val();
    // let amount_received = $('#amount_received').val();
    // let payment_number = $('#payment_number').val();

    // if(ordertype == 3){
    //     customer_id = $('#customer_id:checked').val();
    // }

    // storeOrder(ordertype, status, customer_id, paymenttype, amount_received, payment_number);
});

$('#btn-show_profile_order').on('click', function(){
    $('#order_profile_tab').removeAttr('hidden');
    $('#order_payment_tab').attr('hidden', true);
});

$('#paymenttype').on('change', function(){
    let value = $(this).find(':selected').val();

    if(value == 1){
        $('#payment_number').parent().addClass('hide');
        // $('#amount_received').parent().removeClass('hide');
        $('#amount_received').val(0);
    }else{
        // $('#amount_received').parent().addClass('hide');
        $('#payment_number').parent().removeClass('hide');
        $('#amount_received').val($('#grand-total').val());
        $('#amount_received').attr('disabled', true);
    }
});


$('#btn-invoice-payment').on('click', function(){
    $('#modal_payment').modal('open');
    $('#plh-grandtotal').html('Grand Total : '+$('#cart-grandtotal h5').html());
});

$('#btn-update-order').on('click', function(){
    let ordertype = $('#ordertype :selected').val();
    let status = 2;
    let customer_id = null;
    let paymenttype = $('#paymenttype :selected').val();
    let amount_received = $('#amount_received').val();
    let payment_number = $('#payment_number').val();
    let id = $('#id').val();

    if(ordertype == 3){
        customer_id = $('#customer_id:checked').val();
    }

    updateOrder(id, ordertype, status, customer_id, paymenttype, amount_received, payment_number);
});

$('#btn-select-customer').on('click', function(){
    $('#modal-select-customer').modal('open');
});

$('#btn-add-product').on('click', function(){
    let ordertype = $('#ordertype').val();

    if(ordertype){
        $('#modal-product-list').modal('open');
    }else{
        swal({
            title: "Data tidak lengkap",
            text: "Anda belum memilih type order",
            icon: 'error'
        })
    }
});

$('#btn-add-customer').on('click', function(){
    $('#modal-add-customer').modal('open');
});

$('#btn-save-customer').on('click', function(){
    let customerName = $('#modal-add-customer #name').val();
    let data = $('#form-add-customer').serializeArray();
    let request = $.post('./addCustomerFormOrder', data);

    request.done(function(response) {
        console.log(response);
        if(response['status'] == 'success'){
            M.toast({
                html: response['status'] +' ' + response['message'],
            });
            $('#modal-select-customer').modal('close');
            $('#modal-add-customer').modal('close');
            $('#customer_id').val(response['id']);
            $('#order_customer_id').val(customerName);
        }else{
            swal({
                title: "Input Customer Gagal",
                text: "silahkan ulangi beberapa saat lagi",
                icon: 'error'
            })
        }
    });
});

$('#btn-print-preview').on('click', function(){
    window.print();
});
