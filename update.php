<a href="index.php">Показать данные</a>
<br><br>

<?php
include 'config.php';

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    $stmt = $conn->prepare("SELECT * FROM college_student WHERE student_id = ?");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $student_id = $row['student_id'];
        $name = $row['name'];
        $majors = $row['majors'];
        $gender = $row['gender'];
        $address = $row['address'];
    } else {
        echo "No data found.";
    }

    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $majors = $_POST['majors'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("UPDATE college_student SET student_id=?, name=?, majors=?, gender=?, address=? WHERE student_id=?");
    $stmt->bind_param("ssssss", $student_id, $name, $majors, $gender, $address, $_GET['student_id']);
    if ($stmt->execute()) {
        echo "<script>alert('Update Success!')</script>";
        echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
    } else {
        trigger_error('Wrong SQL Command: ' . $stmt->error, E_USER_ERROR);
    }

    $stmt->close();
}

$conn->close();
?>
<form method="post">
    ID Студента: <input type="text" name="student_id" placeholder="Insert Student ID" value="<?= isset($student_id) ? $student_id : '' ?>"><br><br>
    Имя : <input type="text" name="name" placeholder="Insert Name" value="<?= isset($name) ? $name : '' ?>"><br><br>
    Пол : <input type="text" name="majors" placeholder="Insert Majors" value="<?= isset($majors) ? $majors : '' ?>"><br><br>
    Gender : 
    <select name="gender">
        <option value="Male" <?= (isset($gender) && $gender == 'Male') ? 'selected' : '' ?>>Male</option>
        <option value="Female" <?= (isset($gender) && $gender == 'Female') ? 'selected' : '' ?>>Female</option>
    </select><br><br>
    Address : <input type="text" name="address" placeholder="Insert Address" value="<?= isset($address) ? $address : '' ?>"><br><br>
    <input type="submit" name="update" value="Update">
    <input type="reset" name="cancel" value="Cancel">
</form>