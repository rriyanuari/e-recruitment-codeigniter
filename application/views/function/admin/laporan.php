<script>
  $(document).ready(function(){

    $('#tmb_cari').on('click',function(){
      event.preventDefault();

      var tgl_awal = $('#tgl_awal').val();
      var tgl_akhir = $('#tgl_akhir').val();

      tgl_awalDate = new Date(tgl_awal)
      tgl_akhirDate = new Date(tgl_akhir)

      if(tgl_akhirDate < tgl_awalDate){
        alert('Tanggal awal lebih besar dari tanggal akhir')
      }else{
        window.location.href =`<?php echo base_url()?>/admin/laporan?tgl_awal=${tgl_awal}&tgl_akhir=${tgl_akhir}`;
      }
    });

  });
</script>