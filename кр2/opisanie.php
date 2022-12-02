<?php
$title = "Сайт";
require("connectdb.php");
require("template.php");
require("shapka.php");

if(!isset($_GET['id'])){
	echo "Укажите id страницы.";
	exit;
}else{
    $i = $_GET['id'];
}
$result = mysqli_query($mysql, "SELECT * from product WHERE product.id = '$i';");
$Arr = mysqli_fetch_array($result);
$id_category = $Arr['id_category'];
$name = $Arr['name'];
$price = $Arr['price'];
$photo = $Arr['photo'];
$attribute_1 = $Arr['attribute_1'];
$attribute_2 = $Arr['attribute_2'];

echo'
<table class = "opisanie">
<tr>
<td class="opisanie_photo"><img src = "img/'.$photo.'.jpg" ></img>
</td>
</tr>
<tr>
<td> Название товара '.$name.'
</td>
</tr>
<tr>
<td> Цена товара '.$price.'
</td>
</tr>
<tr>
<td> Дополнительные данные '.$attribute_1.'
</td>
</tr>
<tr>
<td> Дополнительные данные '.$attribute_2.'
</td>
</tr>
';

/*
    if ($id_category == 1):
        echo'
        <td width=60px> Количество страниц '.$attribute_1.' 
        </td>
        <td width=40px> Год выпуска '.$attribute_2.'
        </td>
        </tr>
        ';
    elseif ($id_category == 2):
        echo'
        <td width=60px> Высота '.$attribute_1.' 
        </td>
        <td width=40px> Ширина '.$attribute_2.'
        </td>
        </tr>
        ';
    
    elseif ($id_category == 3):
        echo'
        <td width=60px> Материал '.$attribute_1.' 
        </td>
        <td width=40px> Размер '.$attribute_2.'
        </td>
        </tr>
        ';
    endif;
    */

require("footer.php");
?>