<?php 

  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

include '../Controllers/Controller_petugas.php';
// Membuat Object dari Class petugas
$petugas = new Controller_petugas();
$id_petugas = base64_decode($_GET['id_petugas']);
$GetPetugas = $petugas->GetData_Where($id_petugas);
?>



<?php
    foreach($GetPetugas as $Get){
?>

<form action="../Config/Routes.php?function=put_petugas" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
        <input type="hidden" name="id_petugas" value="<?php echo $Get['id_petugas']; ?>" onKeyPress="return ValidateAlpha(event);" required>
    <tr>
        <td>Username</td>
        <td><input type="text" name="username" value="<?php echo $Get['username']; ?>" onKeyPress="return ValidateAlpha(event);" required></td>
    </tr>

    <tr>
        <td>Password</td>
        <td><input type="text" name="password" value="<?php echo $Get['password']; ?>"onKeyPress="return ValidateAlpha(event);" required></td>
    </tr>

    <tr>
        <td>Nama Petugas</td>
        <td><input type="text" name="nama_petugas" value="<?php echo $Get['nama_petugas']; ?>"  onKeyPress="return ValidateAlpha(event);" required></td>
    </tr>

    <tr>
        <td>Level</td>
        <td>
            <select name="level" required>

                <!-- Logic combo Get database -->
                <option value="<?php echo $Get['level']; ?>">
                <?php
                    if($Get['level']=="Administrator")
                    {
                        echo "Administrator";
                    }
                    else{
                        echo "Petugas";
                    }
                ?>
                </option>
                <!-- Logic combo Get database -->



                <option value="Administrator">Administrator</option>
                <option value="Petugas">Petugas</option>
            </select>
        </td>
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