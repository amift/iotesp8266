$(document).ready(function() {
    var num=0;
    var arr_gaji_detail = [];
    var JumlahPendapatan=0;
    var JumlahPotongan=0;

    function add_penggajian_detail(obj){
        var gaji_detail_id=obj.attr('data-id'); 
        var gaji_detail_perkiraan=obj.attr('data-perkiraan'); 
        var gaji_detail_tipe=obj.attr('data-tipe'); 
        

        var fi=find_item(gaji_detail_id);
        if (fi>-1){
            alert('** Item **\n\n' + gaji_detail_perkiraan + ' sudah ada !');
        }else{
            num++;
            var detail_form=
                    '<tr class="gaji_detail_tr_'+num+'" >' +
                    '    <td><input type="text" name=input_gaji_detail_id['+num+'] value="'+gaji_detail_id+'"></td>' +
                    '    <td>'+gaji_detail_perkiraan+'</td>'+
                    '    <td><input data-tipe="'+gaji_detail_tipe+'" class="input_gaji_detail'+num+'" type="text" name="input_gaji_detail_jumlah['+num+']" value="" required></td>' +
                    '    <td><a class="gaji_detail_delete" data_gaji_detail_id="'+gaji_detail_id+'" data_gaji_detail_perkiraan="'+gaji_detail_perkiraan+'" data_obj_id="'+num+'" title="Remove" class="btn btn-danger btn-xs btn-outline" href="">&nbsp;<i class="fa fa-trash"></i>&nbsp;</a></td>' +
                    '</tr>';
            

            $('#perkiraan-detail').append(detail_form);
            arr_gaji_detail.push(gaji_detail_id);
            $('input.input_gaji_detail'+num).ForceNumericOnly();

            $('input.input_gaji_detail'+num).focus(function(e){
                JumlahPendapatan=$('input[name=input_pendapatan]').val();
                JumlahPotongan=$('input[name=input_potongan]').val();
                console.log('asdas');
            })


            $('input.input_gaji_detail'+num).keyup(function(e){
                var tipe=$(this).attr('data-tipe'); 
                if (tipe==0){
                    var nilai=$(this).val(); 
                    var totaldapat=currencytonum(nilai)+currencytonum(JumlahPendapatan);
                    $('input[name=input_pendapatan]').val(totaldapat);
                }else if (tipe==1){
                    var nilai=$(this).val(); 
                    var totalpotong=currencytonum(nilai)+currencytonum(JumlahPotongan);
                    $('input[name=input_potongan]').val(totalpotong);
                }
            })

            $('a.gaji_detail_delete').click(function(e){
                e.preventDefault(); 
                var obj=$(this);  
                delete_penggajian_detail(obj);
            })
        }
    }

    function delete_penggajian_detail(obj){
        var obj_id=obj.attr('data_obj_id'); 
        var gaji_detail_id=obj.attr('data_gaji_detail_id'); 
        var gaji_detail_perkiraan=obj.attr('data_gaji_detail_perkiraan'); 
        $('tr.gaji_detail_tr_'+obj_id).remove();
        delete_item(gaji_detail_id);
    } 

    $('a.add').click(function(e){
        e.preventDefault();  
        var obj=$(this); 
        add_penggajian_detail(obj);
    });
    
    function logit(){
        console.log(arr_gaji_detail.length);
        console.log(arr_gaji_detail); 
    }

    function delete_item(item){
        arr_gaji_detail = jQuery.grep(arr_gaji_detail, function(value) {
          return value != item;
        });
    }

    function find_item(item){
        return $.inArray(item, arr_gaji_detail);
    }


    function currencytonum(str){
        if (str == "") return 0;

        // replace all dot to blank
        str = str.replace(/\,/g, "");
        
        // str to int
        return parseFloat(str);
    }

});