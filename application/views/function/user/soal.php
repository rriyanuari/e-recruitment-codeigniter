<script>
  $(document).ready(function(){
    $('.tmb_simpan').click(function() {
      id_lamaran = this.id;
      event.preventDefault();

      r = confirm("Apakah anda yakin ingin menambahkan soal ini ?");
      if (r == true) {
        let jawaban_benar = 0
        let jumlah_soal = <?= count($soals); ?>

        <?php
          foreach ($soals as $soal) :
        ?>
          var jawaban = $('input[name="jawaban<?=$soal['id']?>"]:checked').val()
          var kunci_jawaban = $('input[name="kunci_jawaban<?=$soal['id']?>"]').val()
          
          if(!jawaban || !kunci_jawaban){
            alert('Cek lagi, masih ada yang belum diisi')
            return false;
          }

          if(jawaban == kunci_jawaban){
            jawaban_benar++
          }
        <?php endforeach; ?>

        let nilai = (jawaban_benar/jumlah_soal) * 100;
      
        $.ajax({
        url : '<?php echo base_url('proses-pengerjaan-tes')?>',
        type : 'POST',
        data : {  
          id_lamaran : id_lamaran,
          nilai : nilai,
        }, 
          success:function(response){
            if (response == "success") {
              window.alert('Terimakasih sudah mengerjakan tes');
              window.location.href =`<?php echo base_url('status-lamaran')?>`;
            } 
          },
          error:function(response){
            // swalTemplate('error', 'Opps!', 'kesalahan pada server');
            alert('Kesalahan pada server');
          }
        });
      }
    });
  });
</script>