
<form method="post" action="index.php" 
enctype="multipart/form-data" >
      Login  <input type="text" 
name="Login" id="Login"/></br>
      Password <input type="text" 
name="Password" id="Password"/></br>
      <input type="submit" 
name="submit" value="Submit" />
<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:vol1.database.windows.net,1433; Database = NewBD", "vol1", "Simpsons1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

if (isset($_POST['submit'])) // Отлавливаем нажатие на кнопку отправить 
{
if (empty($_POST['login']))  // Условие - если поле логин пустое
{
echo "<script>alert('Поле логин не заполненно');</script>"; // Выводим сообщение об ошибке
}          
elseif (empty($_POST['Password'])) // Иначе если поле с паролем пустое
{
echo "<script>alert('Поле логин не заполненно');</script>"; // Выводим сообщение об ошибке
}                      
else // Иначе если поля не пустые
{
$login2 = $_POST['login']; // Присваиваем переменной значение из поля с логином             
$password2 = $_POST['Password']; // Присваиваем другой переменной значение из поля с паролем
$query = "INSERT INTO `users` (login, Password) VALUES ('$login2', '$password2')"; // Создаем переменную с запросом к базе данных на отправку нового юзера
$result = mysqli_query($connection, $query) or die(mysql_error()); // Отправляем переменную с запросом в базу данных 
echo "<div align='center'>Регистрация прошла успешно!</div>"; // Сообщаем что все получилось
}
} 

?>
</form>