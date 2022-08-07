<script>
  $(document).ready(function(){
    $('.tmb_lulus').click(function(){
      event.preventDefault();

      var id = this.id;
      
      r = confirm("Apakah anda yakin ingin Meluluskan pelamar ini ?");
      if (r == true) {
        $.ajax({
          url : `<?php echo base_url('admin/pelamar-proses-lulus/')?>`,
          type : 'POST',
          data : {
            id  : id
          },
          success:function(response){
            if (response == "success") {
              window.alert('pelamar berhasil diluluskan');
              window.location.href =`<?php echo base_url('admin/pelamar')?>`;
            } else {
              alert('pelamar gagal diluluskan');
            }
            console.log(response);
          },
          error:function(response){
            alert('Kesalahan pada server');
            console.log(response);
          }
        });
      }
    });

    $('.tmb_gagal').click(function(){
      event.preventDefault();

      var id = this.id;
      
      r = confirm("Apakah anda yakin ingin mentidak luluskan pelamar ini ?");
      if (r == true) {
        $.ajax({
          url : `<?php echo base_url('admin/pelamar-proses-gagal/')?>`,
          type : 'POST',
          data : {
            id  : id
          },
          success:function(response){
            if (response == "success") {
              window.alert('pelamar berhasil ditidak luluskan');
              window.location.href =`<?php echo base_url('admin/pelamar')?>`;
            } else {
              alert('pelamar gagal ditidak luluskan');
            }
            console.log(response);
          },
          error:function(response){
            alert('Kesalahan pada server');
            console.log(response);
          }
        });
      }
    });

  });
</script>