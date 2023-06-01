<a href="index.php">Список</a>
<br>
<br>
<form method="post">
  ID Студента: <input type="text" name="student_id" placeholder="Введите ID студента"><br><br>
  Имя: <input type="text" name="name" placeholder="Введите имя"><br><br>
  Специальность: <input type="text" name="majors" placeholder="Введите специальность"><br><br>
  Пол: 
  <select name="gender">
    <option value="Male">Мужчина</option>
    <option value="Female">Женщина</option>
  </select><br><br>
  Адрес: <input type="text" name="address" placeholder="Введите адрес"><br><br>
  <input type="submit" name="add" value="Отправить">
  <input type="reset" name="reset" value="Отменить">
</form>

<?php
if(isset($_POST['add']))
{
  include 'config.php';
  $student_id = $_POST['student_id'];
  $name = $_POST['name'];
  $majors = $_POST['majors'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
 
  $sql = "INSERT INTO college_student (student_id, name, majors, gender, address) VALUES ('$student_id', '$name', '$majors', '$gender', '$address')";
  
  if($conn->query($sql) === false)
  { 
    trigger_error('Ошибка SQL-запроса: ' . $sql . ' Ошибка: ' . $conn->error, E_USER_ERROR);
  }  
  else 
  { 
    echo "<script>alert('Успешно добавлено!')</script>";
    echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
  }
}
?>
