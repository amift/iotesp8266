$(document).ready(function() {

var perkiraan_arr   = new Array();
var perkiraan_index = 0;
var jumlah_total = 0;

function add_penggajian_detail(e){
    var id_perkiraan = $(this).attr('href');
    var kode = $(this).attr('data-kode');
    var nama = $(this).attr('data-nama');
    var status = $(this).attr('data-status');
    var elemen = '';
    var selektor = '';
    
    if (perkiraan_arr.indexOf(id_perkiraan) > -1) {
        alert('Perkiraan gaji sudah terdaftar !');
        return false;
    }
    
    if(status == '0'){
        var elemen = 'pendapatan_arr';
        var selektor = 'pendapatan_arr';
    }
    else if(status == '1'){
        var elemen = 'potongan_arr';
        var selektor = 'potongan_arr';
    }
    
    var perkiraan =
        '<tr id="indent-perkiraan-' + id_perkiraan + '">' +
            '<td class="nama-perkiraan">' + nama + '</td>' + 
            '<td><input type="hidden" name="id_perkiraan[' + id_perkiraan + ']" value="' + id_perkiraan + '" />' + 
                '<input type="text"   name="detail_gaji[' + id_perkiraan + ']" class="' + selektor + ' nominal-perkiraan text-right" data-status="' + status + '" value="" autocomplete="off" /></td>' +
            '<td align="center"><a href="#' + id_perkiraan + '" data-status="' + status + '" class="del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>' +
        '</tr>';
    
    $('#perkiraan-unit-table').append(perkiraan);
    $('#indent-perkiraan-'  + id_perkiraan + ' .del').on('click', delete_perkiraan_details);
    
    e.preventDefault();
    perkiraan_arr[perkiraan_index] = id_perkiraan;
    perkiraan_index++;
   
    $('.cpembulatan').on('keydown', number_key);
    $('.cpembulatan').on('keyup', change_jumlah);

    $('.pendapatan_arr').on('keydown', number_key);
    $('.pendapatan_arr').on('keyup', change_jumlah);
    $('.potongan_arr').on('keydown', number_key);
    $('.potongan_arr').on('keyup', change_jumlah);
    
    $('.pendapatan_arr, .potongan_arr').keyup(function(){
        $(this).val(numtocurrency($(this).val())); 
    });
}

function delete_perkiraan_details(){
    var href = $(this).attr('href');
    var href_arr = href.split('#');
    var id_perkiraan = href_arr[1];
    var status = $(this).attr('data-status');
    var total_pendapatan = 0;
    var total_potongan = 0;
    var gaji_bersih = 0;

    var selector = '#indent-perkiraan-' + id_perkiraan;
    $(selector).remove();
    
    $.each($('.pendapatan_arr'), function(key, obj) {
        total_pendapatan += currencytonum($(obj).val());
    });
    $('[name=input_pendapatan]').val(numtocurrency(total_pendapatan));
    
    $.each($('.potongan_arr'), function(key, obj) {
        total_potongan += currencytonum($(obj).val());
    });
    $('[name=input_potongan]').val(numtocurrency(total_potongan));

    gaji_bersih = total_pendapatan - total_potongan;
    $('[name=input_gaji_bersih]').val(numtocurrency(gaji_bersih));
    
    perkiraan_arr[perkiraan_arr.indexOf(id_perkiraan)] = 0;
    return false;
}

function number_key(e){
    var keyCode = e.keyCode || e.which; 

    if (
        keyCode == 8
        || keyCode == 9
        || keyCode == 190
        || (keyCode >= 48 && keyCode <= 57)
        || (keyCode >= 96 && keyCode <= 105)
    ) {
        // do nothing
    }
    else {
        e.preventDefault();
    }
}

function numtocurrency(num){
    num = num.toString().replace(/\$|\,/g, '');
    
    if (isNaN(num)) num = "0";
    
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();
    
    if (cents == 0) cents = '';
    else if (cents < 10) cents = ".0" + cents;
    else cents = '.' + cents;
    
    //for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
    //  num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
    
    return (((sign) ? '' : '-') + num + cents );
}

function currencytonum(str){
    if (str == "") return 0;

    // replace all dot to blank
    str = str.replace(/\,/g, "");
    
    // str to int
    return parseFloat(str);
}

function change_jumlah(){
    var status = $(this).attr('data-status');
    var pendapatan = $('[name=input_pendapatan]').val();
    var potongan = $('[name=input_potongan]').val();
    var pembulatan = $('[name=input_pembulatan]').val();

    var pendapatan_jml = parseInt(pendapatan.replace('.',''));
    var potongan_jml = parseInt(potongan.replace('.',''));
    var total_pendapatan = 0;
    var total_potongan = 0;
    var gaji_bersih = 0;
    
    $.each($('.pendapatan_arr'), function(key, obj) {
        total_pendapatan += currencytonum($(obj).val());
    });
    $('[name=input_pendapatan]').val(numtocurrency(total_pendapatan));
    
    $.each($('.potongan_arr'), function(key, obj) {
        total_potongan += currencytonum($(obj).val());
    });
    $('[name=input_potongan]').val(numtocurrency(total_potongan));

    gaji_bersih = total_pendapatan - total_potongan - pembulatan;
    // var pph21=0;
    // if (gaji_bersih>=4166666.67) {
    //     pph21=gaji_bersih*(5/100);
    // }else if (gaji_bersih>=20833333.33) {
    //     pph21=gaji_bersih*(15/100);
    // }else if (gaji_bersih>=41666666.67 ) {
    //     pph21=gaji_bersih*(25/100);        
    // }
    // $('[name=input_pph21]').val(numtocurrency(pph21));
    // gaji_bersih=gaji_bersih-pph21;

    $('[name=input_gaji_bersih]').val(numtocurrency(gaji_bersih));

    var tes=PajakPph21();
    console.log(tes);
    // $.each(tes, function(i, item) {
    //     console.log(item);
    // });
}

function PajakPph21(){
    var rst;
     $.ajax({
        type:'POST',
        url: 'http://penggajian.loc/admin/pph21/get_pph21',
        error : function(result){
            rst= result;
        },
        success: function(html){ 
            rst= html;
        }
     });
     return rst;
}


$().ready(function(){   
    $('a.add').click(add_penggajian_detail);
});


});