<script>
  $(document).ready(function(){
    $('#tmb_tambah').click(function() {
      event.preventDefault();

      var nomor       = $('input#nomor');
      var pertanyaan  = $('input#pertanyaan');
      var a           = $('input#a');
      var b           = $('input#b');
      var c           = $('input#c');
      var jawaban     = $('input[name="jawaban"]:checked').val();
      
      if(nomor.val().trim() == "") {
          alert('nomor tidak boleh kosong');
          nomor.focus();
      }else if(pertanyaan.val().trim() == "") {
          alert('pertanyaan tidak boleh kosong');
        pertanyaan.focus();
      }else if(a.val().trim() == "") {
          alert('a tidak boleh kosong');
        a.focus();
      }else if(b.val().trim() == "") {
          alert('b tidak boleh kosong');
        b.focus();
      }else if(c.val().trim() == "") {
          alert('c tidak boleh kosong');
        c.focus();
      } else {
        r = confirm("Apakah anda yakin ingin menambahkan soal ini ?");
        if (r == true) {
          $.ajax({
          url : '<?php echo base_url('admin/soal-proses-tambah')?>',
          type : 'POST',
          data : {  
            nomor : nomor.val(),
            pertanyaan : pertanyaan.val(),
            a : a.val(),
            b : b.val(),
            c : c.val(),
            jawaban : jawaban
          }, 
            success:function(response){
              if (response == "success") {
                window.alert('soal berhasil ditambahkan');
                window.location.href =`<?php echo base_url('admin/soal')?>`;
              } else {
                alert('soal gagal ditambahkan');
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

    $('.tmb_hapus').click(function(){
      event.preventDefault();

      var id = this.id;
      
      r = confirm("Apakah anda yakin ingin Menghapus soal ini ?");
      if (r == true) {
        $.ajax({
          url : `<?php echo base_url('admin/soal-proses-hapus/')?>`,
          type : 'POST',
          data : {
            id  : id
          },
          success:function(response){
            if (response == "success") {
              window.alert('soal berhasil dihapus');
              window.location.href =`<?php echo base_url('admin/soal')?>`;
            } else {
              alert('soal gagal dihapus');
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
      var nomor       = $('input#nomor');
      var pertanyaan  = $('input#pertanyaan');
      var a           = $('input#a');
      var b           = $('input#b');
      var c           = $('input#c');
      var jawaban     = $('input[name="jawaban"]:checked').val();
      
      if(nomor.val().trim() == "") {
          alert('nomor tidak boleh kosong');
          nomor.focus();
      }else if(pertanyaan.val().trim() == "") {
          alert('pertanyaan tidak boleh kosong');
        pertanyaan.focus();
      }else if(a.val().trim() == "") {
          alert('a tidak boleh kosong');
        a.focus();
      }else if(b.val().trim() == "") {
          alert('b tidak boleh kosong');
        b.focus();
      }else if(c.val().trim() == "") {
          alert('c tidak boleh kosong');
        c.focus();
      } else {
        r = confirm("Apakah anda yakin ingin merubah data soal ini ?");
        if (r == true) {
          $.ajax({
          url : '<?php echo base_url('admin/soal-proses-edit')?>',
          type : 'POST',
          data : {  
            id : id,
            nomor : nomor.val(),
            pertanyaan : pertanyaan.val(),
            a : a.val(),
            b : b.val(),
            c : c.val(),
            jawaban : jawaban
          }, 
            success:function(response){
              if (response == "success") {
                window.alert('soal berhasil diubah');
                window.location.href =`<?php echo base_url('admin/soal')?>`;
              } else {
                alert('soal gagal diubah');
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