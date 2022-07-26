<script>
  $(document).ready(function(){

    $('#tmb_tambah_user').click(function() {
      event.preventDefault();

      var username = $("input[name=username]");
      var password = $("input[name=password]");
      var role = $('#role').val();
      
      if(username.val().trim() == "") {
          alert('username tidak boleh kosong');
          username.focus();
      }else if(password.val().trim() == "") {
          alert('password tidak boleh kosong');
          password.focus();
      } else {
        r = confirm("Apakah anda yakin ingin menambahkan user ?");
        if (r == true) {
          $.ajax({
          url : '<?php echo base_url('admin/proses-tambah-user')?>',
          type : 'POST',
          data : {  
            username : username.val(),
            password : password.val(),
            role : role
          }, 
            success:function(response){
              if (response == "success") {
                window.alert('User berhasil ditambahkan');
                window.location.href =`<?php echo base_url('admin/user')?>`;
              } else {
                alert('User gagal ditambahkan');
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
      
      r = confirm("Apakah anda yakin ingin Menghapus user ini ?" );
      if (r == true) {
        $.ajax({
          url : `<?php echo base_url('admin/proses-hapus-user/')?>`,
          type : 'POST',
          data : {
            id  : id
          },
          success:function(response){
            if (response == "success") {
              window.alert('User berhasil dihapus');
              window.location.href =`<?php echo base_url('admin/user')?>`;
            } else {
              alert('User gagal dihapus');
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


    $('.tmb_edit_user').click(function() {
      event.preventDefault();

      var id = this.id;
      var username = $("input[name=username]");
      var password = $("input[name=password]");
      var role = $('#role').val();
      
      if(username.val().trim() == "") {
          alert('username tidak boleh kosong');
          username.focus();
      }else if(password.val().trim() == "") {
          alert('password tidak boleh kosong');
          password.focus();
      } else {
        r = confirm("Apakah anda yakin ingin mengubah user ini ?");
        if (r == true) {
          $.ajax({
          url : '<?php echo base_url('admin/proses-edit-user')?>',
          type : 'POST',
          data : {  
            id : id,
            username : username.val(),
            password : password.val(),
            role : role
          }, 
            success:function(response){
              if (response == "success") {
                window.alert('User berhasil diubah');
                window.location.href =`<?php echo base_url('admin/user')?>`;
              } else {
                alert('User gagal diubah');
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

  });
</script>