<?php 

  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

include '../Controllers/Controller_siswa.php';
// Membuat Object dari Class siswa
$siswa = new Controller_siswa();
$nisn = base64_decode($_GET['nisn']);
$GetSiswa = $siswa->GetData_Where($nisn);

?>



<?php
    foreach($GetSiswa as $Get) {
?>

<form action="../Config/Routes.php?function=put_siswa" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
        <input type="hidden" name="nisn" value="<?php echo $Get['nisn']; ?>" onKeyPress="return ValidateAlpha(event);" require>
    <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" value="<?php echo $Get['nama']; ?>" onKeyPress="return ValidateAlpha(event);" require></td>
    </tr>
    <tr>
        <td>NIS</td>
        <td><input type="text" name="nis" value="<?php echo $Get['nis']; ?>" onKeyPress="return ValidateAlpha(event);" require></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>
            <select name="id_kelas" required>
                <?php 
                $GetKelas = $siswa->GetData_Kelas();
                foreach ($GetKelas as $GetK) : ?>
                <option value="<?php echo $GetK['id_kelas'] ?>"><?php echo $GetK['nama_kelas']; ?></option>
                <?php endforeach; ?>
            </select>


        </td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><input type="text" name="alamat" value="<?php echo $Get['alamat']; ?>" required></td>
    </tr>
    <tr>
        <td>No Telepon</td>
        <td><input type="text" name="no_telp" value="<?php echo $Get['no_telp']; ?>"  onKeyPress="return ValidateAlpha(event);" require>
    </tr>
    <tr>
        <td>Nominal SPP</td>
        <td>
 <select name="id_spp" required>

                <!-- Logic combo Get database -->
                <option value="<?php echo $Get['id_spp']; ?>">
                <?php
                    if($Get['id_spp']=="1"){
                        echo "30000";
                    } else if ($Get['id_spp']=="2") {
                        echo "25000";
                    } elseif ($Get['id_spp']=="3") {
                        echo "20000";
                    } else {
                        echo "15000";
                    }
                ?>
                </option>
                <!-- Logic combo Get database -->
            
                <option value="1">30000</option>
                <option value="2">25000</option>
                <option value="3">20000</option>
                <option value="4">15000</option>
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