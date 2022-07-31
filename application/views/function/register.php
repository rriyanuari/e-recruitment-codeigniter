<script>
  $(document).ready(function(){

    $('#tmb_register').click(function() {
      event.preventDefault();

      var username = $("input[name=username]");
      var password = $("input[name=password]");
      var nama_lengkap = $("input[name=nama_lengkap]");
      var jenis_kelamin = $('#jenis_kelamin').val();
      var jenjang_pendidikan = $('#jenjang_pendidikan').val();
      var cv = $("input#upload_cv");

      var file_data = $(`#upload_cv`).prop('files')[0];
      var form_data = new FormData();

      form_data.append('file', file_data);
      form_data.append('username', username.val());
      form_data.append('password', password.val());
      form_data.append('nama_lengkap', nama_lengkap.val());
      form_data.append('jenis_kelamin', jenis_kelamin);
      form_data.append('jenjang_pendidikan', jenjang_pendidikan);

      if(username.val().trim() == "") {
          alert('Username tidak boleh kosong');
          username.focus();
      }else if(password.val().trim() == "") {
        alert('Password tidak boleh kosong');
        password.focus();
      }else if(nama_lengkap.val().trim() == "") {
          alert('nama lengkap tidak boleh kosong');
          nama_lengkap.focus();
      }else if(cv.val().trim() == "") {
        alert('CV tidak boleh kosong');
        cv.focus();
      } else {
        r = confirm("Apakah anda yakin ingin membuat akun ?");
        if (r == true) {
          $.ajax({
          url : '<?php echo site_url('register-proses')?>',
          dataType: 'json',  
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(data,status){
              //alert(php_script_response); // display response from the PHP script, if any
              if (data.status!='error') {
                  $(`#upload_cv`).val('');
                  alert('Akun berhasil dibuat');
                  window.location.href =`<?php echo base_url()?>`;
                  console.log(data.msg)
              }else{
                  alert(data.msg);
                  console.log(data.msg);
              }
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