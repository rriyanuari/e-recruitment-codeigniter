<script>
  $(document).ready(function(){
    $('#tmb_tambah').click(function() {
      event.preventDefault();

      var judul     = $('input#judul');
      var deskripsi = $('textarea.summernote');
      var status    = $('#status').is(':checked');
      
      if(judul.val().trim() == "") {
          alert('judul tidak boleh kosong');
          judul.focus();
      }else if(deskripsi.val().trim() == "") {
          alert('deskripsi tidak boleh kosong');
        deskripsi.focus();
      } else {
        r = confirm("Apakah anda yakin ingin menambahkan lowongan ini ?");
        if (r == true) {
          $.ajax({
          url : '<?php echo base_url('admin/lowongan-proses-tambah')?>',
          type : 'POST',
          data : {  
            judul : judul.val(),
            deskripsi : deskripsi.val(),
            status : status
          }, 
            success:function(response){
              if (response == "success") {
                window.alert('lowongan berhasil ditambahkan');
                window.location.href =`<?php echo base_url('admin/lowongan')?>`;
              } else {
                alert('lowongan gagal ditambahkan');
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
      
      r = confirm("Apakah anda yakin ingin Menghapus lowongan ini ?");
      if (r == true) {
        $.ajax({
          url : `<?php echo base_url('admin/lowongan-proses-hapus/')?>`,
          type : 'POST',
          data : {
            id  : id
          },
          success:function(response){
            if (response == "success") {
              window.alert('lowongan berhasil dihapus');
              window.location.href =`<?php echo base_url('admin/lowongan')?>`;
            } else {
              alert('lowongan gagal dihapus');
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


    $('.tmb_edit').click(function() {
      event.preventDefault();

      var id = this.id;
      var judul     = $('input#judul');
      var deskripsi = $('textarea.summernote');
      var status    = $('#status').is(':checked');
      
      if(judul.val().trim() == "") {
          alert('judul tidak boleh kosong');
          judul.focus();
      }else if(deskripsi.val().trim() == "") {
          alert('deskripsi tidak boleh kosong');
        deskripsi.focus();
      } else {
        r = confirm("Apakah anda yakin ingin merubah data lowongan ini ?");
        if (r == true) {
          $.ajax({
          url : '<?php echo base_url('admin/lowongan-proses-edit')?>',
          type : 'POST',
          data : {  
            id : id,
            judul : judul.val(),
            deskripsi : deskripsi.val(),
            status : status
          }, 
            success:function(response){
              if (response == "success") {
                window.alert('lowongan berhasil diubah');
                window.location.href =`<?php echo base_url('admin/lowongan')?>`;
              } else {
                alert('lowongan gagal diubah');
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