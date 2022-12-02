<?php
require("connectdb.php");
require("template.php");
require("shapka.php");

if(!empty($_POST)){
    $result = mysqli_query($mysql, "SELECT * FROM user WHERE login=\"".$_POST['login']."\"");
    //echo mysqli_num_rows($result);
    if(mysqli_num_rows($result) == 0){
        mysqli_query($mysql, "INSERT INTO user (name, login, password) VALUES (
            \"".$_POST["name"]."\",
            \"".$_POST["login"]."\",
            \"".md5($_POST["password"])."\" 
            )"
        );
    }
    $login = $_POST["login"];
    
    //$id = mysqli_insert_id($connect);
    header('Location: allproducts.php?login='.$login.'');
}

$title = "Регистрация";
echo'
<form method="POST" class="signUp">
    <div>
        <label>ФИО</label>
        <input type="text" name="name">
    </div>
    
    <div>
        <label>Логин</label>
        <input type="text" name="login">
    </div>
    
    <div>
        <label>Пароль</label>
        <input type="password" name="password">
    </div>
    
    <div>
        <button type="submit">Регистрация</button>
    </div>
</form>
';
require("footer.php");
?>