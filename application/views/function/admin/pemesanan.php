<script>
  $(document).ready(function(){

    $('.tmb_edit_pemesanan').click(function() {
      event.preventDefault();

      var id = this.id;

      r = confirm("Apakah anda yakin ingin konfirmasi pembayaran ?");
      if (r == true) {
        $.ajax({
        url : '<?php echo base_url('admin/pemesanan-proses-edit')?>',
        type : 'POST',
        data : {
          id  : id
        }, 
          success:function(response){
            if (response == "success") {
              window.alert('konfirmasi berhasil dilakukan');
              window.location.href =`<?php echo base_url('admin/pemesanan')?>`;
            } else {
              alert('pemesanan gagal dikonfirmasi');
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

    $('.tmb_hapus').on('click',function(){
      event.preventDefault();

      var id = this.id;
      
      r = confirm("Apakah anda yakin ingin menghapus pemesanan ini ?" );
      if (r == true) {
        $.ajax({
          url : `<?php echo base_url('admin/pemesanan-proses-hapus')?>`,
          type : 'POST',
          data : {
            id  : id
          },
          success:function(response){
            if (response == "success") {
              window.alert('Pemesanan berhasil dihapus');
              window.location.href =`<?php echo base_url('admin/pemesanan')?>`;
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