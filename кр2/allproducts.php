<?php
$title = "Сайт";
require("connectdb.php");
require("template.php");
require("shapka.php");
$login = $_POST['login'];
if(!empty($login)){
    Echo'<p class = "login">
    Ваш логин = '.$login.'
    </p>';
}
$result = mysqli_query($mysql, "SELECT count(*) as coun from product;");
$Arr = mysqli_fetch_array($result);
$count = $Arr['coun'];
echo'
<table class="allproduct">
<tr>
<td width=40px> Имя товара
</td>
<td width=40px> Цена товара
</td>
<td width=40px> Фото
</td>
</tr>
';
for($i = 1; $i <= $count; $i++){
    $result = mysqli_query($mysql, "SELECT * from product WHERE product.id = '$i';");
    $Arr = mysqli_fetch_array($result);
    $id_category = $Arr['id_category'];
    $name = $Arr['name'];
    $price = $Arr['price'];
    $photo = $Arr['photo'];
    echo'
    <tr>
    <td width=40px><a href="opisanie.php?id='.$i.'">'.$name.'<a>
    </td>
    <td width=40px>'.$price.'
    </td>
    <td width=40px><img src = "img/'.$photo.'.jpg" ></img>
    </td>
    </tr>';
}
echo'
</table>
';
require("footer.php");
?>