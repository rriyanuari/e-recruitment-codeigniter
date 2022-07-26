<script>
  $(document).ready(function(){

    $(document).on('click','#tmb_upload',function(e){
        e.preventDefault();
        var file_data = $('#upload_bukti').prop('files')[0];
        var form_data = new FormData();
        var id = $('#id_pemesanan').val();

        form_data.append('file', file_data);
        form_data.append('id', id);
        $.ajax({
            url: '<?php echo site_url("pemesanan-proses-edit") ?>', // point to server-side PHP script
            dataType: 'json',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(data,status){
                //alert(php_script_response); // display response from the PHP script, if any
                if (data.status!='error') {
                    alert(data.msg);
                    console.log(data.msg)
                    window.location.href =`<?php echo base_url('pemesanan')?>`;
                }else{
                    alert(data.msg);
                }
            }
        });
    })


    $('.tmb_hapus').on('click',function(){
      event.preventDefault();

      var id = this.id;
      
      r = confirm("Apakah anda yakin ingin menghapus pemesanan ini ?" );
      if (r == true) {
        $.ajax({
          url : `<?php echo base_url('pemesanan-proses-hapus')?>`,
          type : 'POST',
          data : {
            id  : id
          },
          success:function(response){
            if (response == "success") {
              window.alert('Pemesanan berhasil dihapus');
              window.location.href =`<?php echo base_url('pemesanan')?>`;
            } else {
              alert('Pemesanan gagal dihapus');
            }
            console.log(response);
          },
          error:function(response){
            // swalTemplate('error', 'Opps!', 'kesalahan pada server');
            alert('Kesalahan pada server');
            console.log(response);
          }
        });
      }
    });


  });
</script>