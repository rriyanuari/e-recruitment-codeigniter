<script>
  $(document).ready(function(){

    $('#tmb_tambah_pelanggan').click(function() {
      event.preventDefault();

      var username = $("input[name=username]");
      var password = $("input[name=password]");
      var email = $("input[name=email]");
      var hp = $("input[name=hp]");
      var jeniskelamin = $('#jeniskelamin').val();
      
      if(username.val().trim() == "") {
          alert('Username tidak boleh kosong');
          username.focus();
      }else if(password.val().trim() == "") {
        alert('Password tidak boleh kosong');
        password.focus();
      }else if(email.val().trim() == "") {
          alert('email tidak boleh kosong');
          email.focus();
      }else if(hp.val().trim() == "") {
        alert('hp tidak boleh kosong');
        hp.focus();
      } else {
        r = confirm("Apakah anda yakin ingin menambahkan pelanggan ?");
        if (r == true) {
          $.ajax({
          url : '<?php echo base_url('register-proses')?>',
          type : 'POST',
          data : {  
            username : username.val(),
            password : password.val(),
            email : email.val(),
            hp : hp.val(),
            jeniskelamin : jeniskelamin,
          }, 
            success:function(response){
              if (response == "success") {
                window.alert('Daftar berhasil dilakukan, silahkan login');
                window.location.href =`<?php echo base_url('login')?>`;
              } else {
                alert('Daftar gagal dilakukan');
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
      
      r = confirm("Apakah anda yakin ingin Menghapus pelanggan ini ?" );
      if (r == true) {
        $.ajax({
          url : `<?php echo base_url('admin/pelanggan-proses-hapus/')?>`,
          type : 'POST',
          data : {
            id  : id
          },
          success:function(response){
            if (response == "success") {
              window.alert('pelanggan berhasil dihapus');
              window.location.href =`<?php echo base_url('admin/pelanggan')?>`;
            } else {
              alert('pelanggan gagal dihapus');
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


    $('.tmb_edit_pelanggan').click(function() {
      event.preventDefault();

      var id = this.id;
      var pelanggan = $("input[name=pelanggan]");
      var email = $("input[name=email]");
      var hp = $("input[name=hp]");
      var jeniskelamin = $('#jeniskelamin').val();
      
      if(pelanggan.val().trim() == "") {
          alert('pelanggan tidak boleh kosong');
          pelanggan.focus();
      }else if(email.val().trim() == "") {
        alert('email tidak boleh kosong');
        email.focus();
      }else if(hp.val().trim() == "") {
        alert('hp tidak boleh kosong');
        hp.focus();
      } else {
        r = confirm("Apakah anda yakin ingin menambahkan pelanggan ?");
        if (r == true) {
          $.ajax({
          url : '<?php echo base_url('admin/pelanggan-proses-edit')?>',
          type : 'POST',
          data : {
            pelanggan : pelanggan.val(),
            email : email.val(),
            hp : hp.val(),
            jeniskelamin : jeniskelamin,
            id  : id
          }, 
            success:function(response){
              if (response == "success") {
                window.alert('pelanggan berhasil diubah');
                window.location.href =`<?php echo base_url('admin/pelanggan')?>`;
              } else {
                alert('pelanggan gagal diubah');
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