<?php include 'inc/header.php'; ?>
<?php include 'Database.php'; 
    $db = new Database();
    $sql = "SELECT * FROM tbl_user";
    $read = $db->select($sql);
?>

<?php
    if (isset($_GET['msg'])) {
        echo "<span style='color:green'>".$_GET['msg']."</span>";
    }
?>
		
<table class="tblone">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Skill</th>
        <th>Action</th>
    </tr>

    <?php if ($read) { 
        while ($row = $read ->fetch_assoc()) {
    ?>

    <tr>
        <td><?=$row['id'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['email'];?></td>
        <td><?=$row['skill'];?></td>
        <td>
            <a href="update.php?id=<?= urlencode($row['id']); ?>">Edit</a>
        </td>
    </tr>

    <?php } }else{ ?>
        <p>Data is not available!!</p>
    <?php } ?>

</table>

<a href="create.php">Create</a>









		

<?php include 'inc/footer.php'; ?>