<?php include 'inc/header.php'; ?>
<?php include 'Database.php'; 
    $id = $_GET['id'];
    $db = new Database();
    $sql = "SELECT * FROM tbl_user WHERE id=$id";
    $read = $db->select($sql)->fetch_assoc();
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $email = mysqli_real_escape_string($db->link, $_POST['email']);
        $skill = mysqli_real_escape_string($db->link, $_POST['skill']);

        if ($name == '' || $email == '' || $skill == '') {
            $error = "Field must not be Empty !!";
        }else {
            $sql = "UPDATE tbl_user 
            SET 
                `name` = '$name',
                email = '$email',
                skill = '$skill'
            WHERE id=$id
              ";
            $update = $db->update($sql);
        }
    }
    
?>
<!-- Delete Post area -->
<?php
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM tbl_user WHERE id=$id";
        $deleteData = $db->delete($sql);
    }
?>
<?php
    if (isset($error)) {
        echo "<span style='color:red'>".$error."</span>";
    }
?>

<form action="update.php?id=<?=$id ?>" method="POST">
    <table class="tblone">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?=$read['name'] ?>" id=""></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?=$read['email'] ?>" id=""></td>
        </tr>
        <tr>
            <td>Skill</td>
            <td><input type="text" name="skill" value="<?=$read['skill'] ?>" id=""></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Update">
                <input type="reset" value="Cancel">
                <input type="submit" value="Delete" name="delete">
            </td>
        </tr>
    </table>
</form>

<a href="index.php">Home</a>









		

<?php include 'inc/footer.php'; ?>