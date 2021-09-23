<?php 

  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

include '../Controllers/Controller_spp.php';
// Membuat Object dari Class spp
$spp = new Controller_spp();
$id_spp = base64_decode($_GET['id_spp']);
$GetSpp = $spp->GetData_Where($id_spp);
?>



<?php
    foreach($GetSpp as $Get){
?>

<form action="../Config/Routes.php?function=put_spp" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
        <input type="hidden" name="id_spp" value="<?php echo $Get['id_spp']; ?>">
    <tr>
        <td>Tahun</td>
        <td><input type="text" name="tahun" value="<?php echo $Get['tahun']; ?>" onKeypress="return isNumberKey(event)" required></td>
    </tr>
    <tr>
        <td>Nominal</td>
        <td><input type="text" name="nominal" value="<?php echo $Get['nominal']; ?>" onKeypress="return isNumberKey(event)" required></td>
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