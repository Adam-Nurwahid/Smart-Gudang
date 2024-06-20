<?php include("admin/inc_header.php");
     include("inc/inc_koneksi.php");
     include("inc/inc_fungsi.php");
?>


<style>
    table{
        width: 600px;
    }
    @media screen and (max-width: 700px) {
        table{
            width: 90%;
        }
    }
    table td{
        padding: 5px;
    }
    td.label{
        width: 40%;
    }

    .input{
        border: 1px solid #cccccc;
        background-color: #dfdfdf;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
    }
    input.tbl-biru{
        border: none;
        background-color: aqua;
        border-radius: 20px;
        margin-top: 20px;
        padding: 15px 20px 15px 20px;
        color: #cccccc;
        cursor: pointer;
        font-weight: bold;
    }

    input.tbl-biru:hover{
        background-color: #fc5185;
        text-decoration: none;
    }

    .eror{
        padding: 20px;
        background-color: #f44336;
        color: azure;
        margin-bottom: 15px;
    }

    .sukses{
        padding: 20px;
        background-color: #2196F3;
        color: azure;
        margin-bottom: 15px;
    }

    .eror ul{margin-left: 10px;}


</style>
<h3>Pendaftaran</h3>
<?php
$email = "";
$nama_lengkap = "";
$err = "";
$sukses = "";

if(isset($_POST['simpan'])){
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    if($email == '' || $nama_lengkap == '' || $konfirmasi_password == '' || $password == ''){
        $err .= '<li>Silahkan Masukan Semua Isian.</li>';
    }

    if($email != ''){
        $sql1 = "SELECT email FROM members WHERE email = '$email'";
        $q1 = mysqli_query($koneksi, $sql1);
        $n1 = mysqli_num_rows($q1);
        if($n1 > 0){
            $err .= "<li>Email yang kamu masukan sudah terdaftar.</li>";
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $err .= "<li>Email yang kamu masukan tidak valid.</li>";
        }
    }

    if($password != $konfirmasi_password){
        $err .= "<li>Password dan konfirmasi password tidak sesuai.</li>";
    }

    if(strlen($password) < 6){
        $err .= "<li>Panjang Password kurang dari 6.</li>";
    }

    if(empty($err)){
        $sukses = "Proses Berhasil";
    }
}
?>
<?php if($err){ echo "<div class='error'><ul>$err</ul></div>"; } ?>
<?php if($sukses){ echo "<div class='sukses'>$sukses</div>"; } ?>
<form action="" method="POST">
    <table>
        <tr>
            <td class="label">Email</td>
            <td>
                <input type="text" name="email" class="input" value="<?php echo $email?>">
            </td>
        </tr>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>
                <input type="text" name="nama_lengkap" class="input" value="<?php echo $nama_lengkap?>">
            </td>
        </tr>
        <tr>
            <td class="label">Password</td>
            <td>
                <input type="password" name="password" class="input">
            </td>
        </tr>
        <tr>
            <td class="label">Konfirmasi Password</td>
            <td>
                <input type="password" name="konfirmasi_password" class="input">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="simpan" value="Simpan" class="tbl-biru">
            </td>
        </tr>
    </table>
</form>

<?php include("admin/inc_footer.php")?>
