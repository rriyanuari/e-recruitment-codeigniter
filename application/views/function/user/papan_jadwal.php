<script>
  $(document).ready(function(){

    $('#tmb_cari').on('click',function(){
      event.preventDefault();

      var tanggal_papan_jadwal = $('#tanggal_papan_jadwal').val();
      window.location.href =`<?php echo base_url()?>papan-jadwal?tanggal_papan_jadwal=${tanggal_papan_jadwal}`;
    });


  });
</script>