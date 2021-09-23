<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');

  include '../Controllers/Controller_pembayaran.php';
// Membuat Object dari Class pembayaran
$pembayaran = new Controller_pembayaran();
$GetSpp = $pembayaran->GetData_Siswa();
?>


<form action="../Config/Routes.php?function=create_pembayaran" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
        <td><input type="hidden" name="id_pembayaran"></td>
    <tr>
        <td>ID Petugas</td>
        <td>
        <select name="id_petugas">
                <option value="">Pilih Petugas</option>
                <option value="1">coba petugas</option>
                <option value="2">coba admin</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Nama Siswa</td>
        <td>
        <select name="nisn">
                <option value="">Pilih Nama Siswa</option>
                <?php         
                foreach ($GetSpp as $GetP) : ?>
                <option value="<?php echo $GetP['nisn']; ?>"><?php echo $GetP['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>

    <tr>
        <td>Tanggal Bayar</td>
        <td><input type="text" name="tgl_bayar"  onKeyPress="return ValidateAlpha(event);" required></td>
    </tr>

    <tr>
        <td>Bulan Bayar</td>
        <td><input type="text" name="bulan_dibayar" onKeyPress="return ValidateAlpha(event);" required></td>
    </tr>

    <tr>
        <td>Tahun Bayar</td>
        <td><input type="text" name="tahun_bayar" onKeyPress="return ValidateAlpha(event);" required></td>
    </tr>

    <tr>
        <td>SPP</td>
        <td>
        <select name="id_spp" required>
                <option value="">Pilih Nominal </option>
                <option value="1">30000</option>
                <option value="2">25000</option>
                <option value="3">20000</option>
                <option value="4">15000</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Jumlah Bayar</td>
        <td><input type="text" name="jumlah_bayar"  onKeyPress="return ValidateAlpha(event);" required></td>
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