<script>
  $(document).ready(function(){

    $('#tmb_tambah_lapangan').click(function() {
      event.preventDefault();

      var lapangan = $("input[name=lapangan]");
      var jenis = $("input[name=jenis]");
      var weekday_siang = $("input[name=weekday_siang]");
      var weekday_malam = $("input[name=weekday_malam]");
      var weekend = $("input[name=weekend]");
      var weekend_malam = $("input[name=weekend_malam]");
      
      
      if(lapangan.val().trim() == "") {
          alert('lapangan tidak boleh kosong');
          lapangan.focus();
      }else if(jenis.val().trim() == "") {
          alert('jenis tidak boleh kosong');
        jenis.focus();
      }else if(weekday_siang.val().trim() == "") {
        alert('weekday_siang tidak boleh kosong');
        weekday_siang.focus();
      }else if(weekday_malam.val().trim() == "") {
        alert('weekday_malam tidak boleh kosong');
        weekday_malam.focus();
      }else if(weekend.val().trim() == "") {
        alert('weekend tidak boleh kosong');
        weekend.focus();
      }else if(weekend_malam.val().trim() == "") {
        alert('weekend_malam tidak boleh kosong');
        weekend_malam.focus();
      } else {
        r = confirm("Apakah anda yakin ingin menambahkan lapangan ini ?");
        if (r == true) {
          $.ajax({
          url : '<?php echo base_url('admin/lapangan-proses-tambah')?>',
          type : 'POST',
          data : {  
            lapangan : lapangan.val(),
            jenis : jenis.val(),
            weekday_siang : weekday_siang.val(),
            weekday_malam : weekday_malam.val(),
            weekend : weekend.val(),
            weekend_malam : weekend_malam.val(),
            
          }, 
            success:function(response){
              if (response == "success") {
                window.alert('lapangan berhasil ditambahkan');
                window.location.href =`<?php echo base_url('admin/lapangan')?>`;
              } else {
                alert('lapangan gagal ditambahkan');
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

    $('.tmb_hapus ').on('click',function(){
      event.preventDefault();

      var id = this.id;
      
      r = confirm("Apakah anda yakin ingin Menghapus lapangan ini ?" );
      if (r == true) {
        $.ajax({
          url : `<?php echo base_url('admin/lapangan-proses-hapus/')?>`,
          type : 'POST',
          data : {
            id  : id
          },
          success:function(response){
            if (response == "success") {
              window.alert('lapangan berhasil dihapus');
              window.location.href =`<?php echo base_url('admin/lapangan')?>`;
            } else {
              alert('lapangan gagal dihapus');
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


    $('.tmb_edit_lapangan').click(function() {
      event.preventDefault();

      var id = this.id;
      var lapangan = $("input[name=lapangan]");
      var jenis = $("input[name=jenis]");
      var weekday_siang = $("input[name=weekday_siang]");
      var weekday_malam = $("input[name=weekday_malam]");
      var weekend = $("input[name=weekend]");
      var weekend_malam = $("input[name=weekend_malam]");
      
      if(lapangan.val().trim() == "") {
          alert('lapangan tidak boleh kosong');
          lapangan.focus();
      }else if(jenis.val().trim() == "") {
          alert('jenis tidak boleh kosong');
        jenis.focus();
      }else if(weekday_siang.val().trim() == "") {
        alert('weekday_siang tidak boleh kosong');
        weekday_siang.focus();
      }else if(weekday_malam.val().trim() == "") {
        alert('weekday_malam tidak boleh kosong');
        weekday_malam.focus();
      }else if(weekend.val().trim() == "") {
        alert('weekend tidak boleh kosong');
        weekend.focus();
      }else if(weekend_malam.val().trim() == "") {
        alert('weekend_malam tidak boleh kosong');
        weekend_malam.focus();
      } else {
        r = confirm("Apakah anda yakin ingin merubah data lapangan ini ?");
        if (r == true) {
          $.ajax({
          url : '<?php echo base_url('admin/lapangan-proses-edit')?>',
          type : 'POST',
          data : {  
            id : id,
            lapangan : lapangan.val(),
            jenis : jenis.val(),
            weekday_siang : weekday_siang.val(),
            weekday_malam : weekday_malam.val(),
            weekend : weekend.val(),
            weekend_malam : weekend_malam.val(),
            
          }, 
            success:function(response){
              if (response == "success") {
                window.alert('lapangan berhasil diubah');
                window.location.href =`<?php echo base_url('admin/lapangan')?>`;
              } else {
                alert('lapangan gagal diubah');
              }
              console.log(response);
            },
            error:function(response){
              alert('Kesalahan pada server');
              console.log(response);
            }
          });
        }
      }
    });

  });
</script>