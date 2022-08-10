<script>
  $(document).ready(function(){
    $('#tmb_simpan').click(function() {
      event.preventDefault();

      let soal
      soal = <?= count($soals) ;?>;
      
      console.log(soal);

      // var jawaban     = $('input[name="jawaban"]:checked').val();
    
      //   r = confirm("Apakah anda yakin ingin menambahkan soal ini ?");
      //   if (r == true) {
      //     $.ajax({
      //     url : '<?php echo base_url('admin/soal-proses-tambah')?>',
      //     type : 'POST',
      //     data : {  
      //       nomor : nomor.val(),
      //       pertanyaan : pertanyaan.val(),
      //       a : a.val(),
      //       b : b.val(),
      //       c : c.val(),
      //       jawaban : jawaban
      //     }, 
      //       success:function(response){
      //         if (response == "success") {
      //           window.alert('soal berhasil ditambahkan');
      //           window.location.href =`<?php echo base_url('admin/soal')?>`;
      //         } else {
      //           alert('soal gagal ditambahkan');
      //         }
      //         console.log(response);
      //       },
      //       error:function(response){
      //         // swalTemplate('error', 'Opps!', 'kesalahan pada server');
      //         alert('Kesalahan pada server');
      //         console.log(response);
      //       }
      //     });
      //   }
    });
  });
</script>