<?php
include "koneksi.php";
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$username = $_POST['username'];
$pass     = md5($_POST['password']);

$login=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
 // session_register("namauser");
  //session_register("namalengkap");
 // session_register("passuser");
  //session_register("leveluser");

  $_SESSION[username]     = $r[username];
  $_SESSION[nama]  = $r[nama];
  $_SESSION[password]     = $r[password];
  
  header('location:index2.php');
}
else{
    echo "<script>alert('Username Atau Password Anda Salah'); window.location = 'index.php'</script>";
}
?>

