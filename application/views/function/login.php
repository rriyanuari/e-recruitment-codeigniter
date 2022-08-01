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
          alert('Username harus diisi');
          user.focus();
      } else if(pass.val().trim() == "") {
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
          success: function(response){
            if (response == 'success') {
              window.alert('Login berhasil, anda akan dialihkan');
              window.location.href =`<?php echo base_url('admin/dashboard')?>`;
            } else {
              alert('Login Gagal, data yang anda masukan salah');
              user.focus();
            }
            console.log(response);
          },
          error: function(response){
            alert('Kesalahan pada server');
          }
        });
      }
    });

  });
  
</script>