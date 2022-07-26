<script>
  $(document).ready(function(){

    $('#tmb_tambah_pemesanan').click(function() {
      event.preventDefault();

      var lapangan = $('#lapangan').val();
      var tanggal = $('#tanggal').val();
      var jam = $('#jam').val();
      var durasi = $("input[name=durasi]");
      
      if(tanggal.trim() == "") {
          alert('Tanggal tidak boleh kosong');
          pelanggan.focus();
      } else {
        r = confirm("Apakah anda yakin ingin melakukan pemesanan ?");
        if (r == true) {
          $.ajax({
          url : '<?php echo base_url('pemesanan-proses-tambah')?>',
          type : 'POST',
          data : {  
            lapangan : lapangan,
            tanggal : tanggal,
            jam : jam,
            durasi : durasi.val(),
          }, 
            success:function(response){
              if (response == "success") {
                window.alert('pemesanan berhasil dilakukan silahkan lakukan pembayaran');
                window.location.href =`<?php echo base_url('pemesanan')?>`;
              } else {
                alert('pemesanan gagal dilakukan');
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
      }
    });

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

    $('#cari').on('click',function(){
      event.preventDefault();

      var tgl = $('#tanggal').val();
      var lapangan = $("#lapangan").val();

      window.location.href =`<?php echo base_url()?>tambah-pemesanan?lap=${lapangan}&&tgl=${tgl}`;
    });


  });
</script>