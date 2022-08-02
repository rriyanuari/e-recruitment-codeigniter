<?php
  header("Content-type: application/pdf");
  header("Content-Disposition: inline; filename=$nama_file");
  $path = 'public/cv/'.$nama_file;
  @readfile($path);
?>