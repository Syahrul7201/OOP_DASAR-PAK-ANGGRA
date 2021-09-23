<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

?>
<form action="../Config/Routes.php?function=create_spp" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
        <td><input type="hidden" name="id_spp"></td>
    <tr>
        <td>Tahun</td>
        <td><input type="text" name="tahun" onKeyPress="return ValidateAlpha(event);" required></td>
    </tr>
    <tr>
        <td>Nominal</td>
        <td><input type="text" name="nominal"  onKeyPress="return ValidateAlpha(event);" required></td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
    </tr>
</table
</form>

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