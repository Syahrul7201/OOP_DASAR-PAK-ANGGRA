<?php 

include '../Controllers/Controller_kelas.php';
 // Membuat Object dari Class kelas
$kelas = new Controller_kelas();
$GetKelas = $kelas->GetData_All();

// untuk mengecek di object $siswa ada berapa banyak Property
// echo var_dump($kelas);
?>

<h3><a href="View_siswa.php">Siswa</a> | <a href="View_kelas.php">KELAS</a> | <a href="View_spp.php">SPP</a> | <a href="View_petugas.php">Petugas</a> | <a href="View_pembayaran.php">Pembayaran</a></h3>
        <h1>OOP - Class, Object, Property, Method With <u>MVC</u></h1>
        <h2>CRUD and CSRF</h2>
       
        <h3>Table Kelas</h3> <h3><a href="View_post_kelas.php">Add Data</a></h3>


        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Kompetensi Keahlian</th>
                <th>Tools</th>
            </tr>
            <?php
                // Decision validation variabel
                if(isset($GetKelas))
                {
                        $no = 1;
                        foreach($GetKelas as $Get){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $Get['nama_kelas']; ?></td>
                            <td><?php echo $Get['kompetensi_keahlian']; ?></td>
                            <td>
                            <a href="../Views/View_put_kelas.php?id_kelas=<?php echo base64_encode($Get['id_kelas']) ?>"><img src = "../img/mata.png" style = "width : 40px"></a>
                    <a button onclick="konfirmasi(<?php echo $Get['id_kelas'] ?>)"><img src = "../img/sampah.png" style = "width : 40px"></a>
                </td>
            </tr>
    <?php
        }
    }
    ?>
</table>
<script>
    function konfirmasi(id_kelas) {
        if (window.confirm("Apakah anda ingin menghapus data ini?")) {
            window.location.href = '../Config/Routes.php?function=delete_kelas&id_kelas=<?php echo base64_encode($Get['id_kelas']) ?>';
        };
    }
</script>