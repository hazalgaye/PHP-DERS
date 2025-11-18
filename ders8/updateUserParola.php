<?php 
include "loginControl.php";
include "menu.php";
include "connection.php";

//////////////////////////////////////////////////////////////////////////////////////
// 1) Düzenlenecek olan kullanıcının bilgilerini çek (ÖNCE yapılmalı)
//////////////////////////////////////////////////////////////////////////////////////

$sql = "select * from users where id=".$_GET["id"];
$result = $conn->query($sql);

if($result->num_rows > 0){
    $rs = $result->fetch_object();
} else {
    header("location:users.php");
    exit;
}

//////////////////////////////////////////////////////////////////////////////////////
// 2) Kaydetme işlemi (i parametresi varsa işlem yap)
//////////////////////////////////////////////////////////////////////////////////////

if(isset($_GET["i"])){

    // Formdan gelen parola
    $gelenParola = $_POST["parola"];

    // Eğer parola boş gelmişse, eski şifreyi koru
    if($gelenParola == ""){
        $parola = $rs->password;
    } else {
        $parola = $gelenParola;
    }

    // UPDATE sorgusu (TEK)
    $sql = "
        update users set 
            name='".$_POST["ad"]."',
            user_name='".$_POST["kad"]."',
            password='".$parola."',
            role='".$_POST["rol"]."'
        where id=".$_GET["id"];

    $conn->query($sql);
    header("location:users.php?i=2");
    exit;
}

//////////////////////////////////////////////////////////////////////////////////////
// 3) Form (mevcut bilgileri göster)
//////////////////////////////////////////////////////////////////////////////////////
?>

<form name="updateUser" action="updateUser.php?i=true&id=<?php echo $rs->id ?>" method="post">
    <table>
        <tr>
            <td>Ad Soyad</td>
            <td><input value="<?php echo $rs->name ?>" type="text" name="ad"/></td>
        </tr>

        <tr>
            <td>Kullanıcı Adı</td>
            <td><input value="<?php echo $rs->user_name ?>" type="text" name="kad"/></td>
        </tr>

        <tr>
            <td>Parola</td>
            <!-- Boş bırakılırsa eski parola korunur -->
            <td><input type="password" name="parola"></td>
        </tr>

        <tr>
            <td>Yetki</td>
            <td>
                <select name="rol">
                    <option>Seçiniz</option>
                    <option <?php if($rs->role==1) echo "selected"; ?> value="1">Admin</option>
                    <option <?php if($rs->role==2) echo "selected"; ?> value="2">Yazar</option>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" value="Kaydet"/></td>
        </tr>
    </table>
</form>
