<a href="add.php">Добавить</a>
<br><br>
<table border="">
 <tbody>
    <tr>
       <th>ID студента</th>
       <th>Имя</th>
       <th>Специальность</th>
       <th>Пол</th>
       <th>Адрес</th>
       <th>Действие</th>
    </tr>
    <?php
    include 'config.php';
    $result = mysqli_query($conn, "SELECT * FROM college_student");
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
       <td><?= $row['student_id']; ?></td>
       <td><?= $row['name']; ?></td>
       <td><?= $row['majors']; ?></td>
       <td><?= $row['gender']; ?></td>
       <td><?= $row['address']; ?></td>
       <td>
            <a href="update.php?student_id=<?= $row['student_id']; ?>"><b><i>Edit</i></b></a> | 
            <a href="index.php?student_id=<?= $row['student_id']; ?>" onclick="return confirm('Are you sure?')"><b><i>Delete</i></b></a>
        </td>
    </tr>  
    <?php } ?>                          
 </tbody>
</table>

<?php
if(isset($_GET['student_id']))
{
    $student_id = $_GET['student_id'];
    $sql = "DELETE FROM college_student WHERE student_id='$student_id'";
    if(mysqli_query($conn, $sql))
    { 
      echo "<script>alert('Delete Success!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
    } 
    else 
    { 
      trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . mysqli_error($conn), E_USER_ERROR);
    }
}
?>
