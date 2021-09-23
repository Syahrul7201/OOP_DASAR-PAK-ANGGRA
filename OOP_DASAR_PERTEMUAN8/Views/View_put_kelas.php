<?php 

  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

include '../Controllers/Controller_kelas.php';
// Membuat Object dari Class kelas
$kelas = new Controller_kelas();
$id_kelas = base64_decode($_GET['id_kelas']);
$GetKelas = $kelas->GetData_Where($id_kelas);
?>



<?php
    foreach($GetKelas as $Get){
?>

<form action="../Config/Routes.php?function=put_kelas" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
        <input type="hidden" name="id_kelas" value="<?php echo $Get['id_kelas']; ?>">
    <tr>
        <td>Nama Kelas</td>
        <td><input type="text" name="nama_kelas" value="<?php echo $Get['nama_kelas']; ?>" required></td>
    </tr>
    <tr>
        <td>Kompetensi Keahlian</td>
        <td><input type="text" name="kompetensi_keahlian" value="<?php echo $Get['kompetensi_keahlian']; ?>"onKeyPress="return ValidateAlpha(event);" required></td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
    </tr>
</table
</form>

<?php
    }
?>

<script>
    function ValidateAlpha(evt) {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)

            return false;
        return true;
    }

    function isNumberKey(evt) {
        //var e = evt || window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode != 46 && charCode > 31 &&
            (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>