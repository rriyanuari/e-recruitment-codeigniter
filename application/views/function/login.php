<script>
  $(document).ready(function(){
    $(".card").keyup(function(event) {
      if (event.keyCode === 13) {
          $("#tmb-login").click();
      }
    });
    $('#tmb-login').click(function() {
      event.preventDefault();

      var user = $("input[name=username]");
      var pass = $("input[name=password]");
      
      if(user.val().trim() == "") {
          // swalTemplate('error', 'Opps!', 'Username harus diisi');
          alert('Username harus diisi');
          user.focus();
      } else if(pass.val().trim() == "") {
          // swalTemplate('error', 'Opps!', 'Password harus diisi');
          alert('Password harus diisi');
          pass.focus();
      } else {
        $.ajax({
          url : '<?php echo base_url('login/proses')?>',
          type : 'POST',
          data : {  
            user : user.val(),
            pass : pass.val()
          }, 
          success:function(response){
            if (response == 'success') {
              window.alert('Login berhasil, anda akan dialihkan');
              window.location.href =`<?php echo base_url('admin/dashboard')?>`;
              // swalTemplate('success', 'Login Berhasil!!', 'Anda akan dialihkan', go_to('admin'))
            } else {
              // swalTemplate('error', 'Login Gagal!', 'data yang anda masukan salah');
              alert('Login Gagal, data yang anda masukan salah');
              user.focus();
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

  });
  
</script>