<?php
include 'main.php';
// Check logged-in
check_loggedin($con);
// output message (errors, etc)
$msg = '';


?>
<?php
$sitename = "Intune Backup from EUC Toolbox";
$pagetitle = "Intune Backup";
include "header1.php";
?>

        <p>
	<?php
if (isset($_GET['updatemessage'])) {
	//Display Process Messages
	echo $_GET['updatemessage'];
}
	?>
</p>
			<h2>Edit Drift Acknowledgements</h2>
			
			<div class="block">
<?php    
// Retrieve additional account info from the database because we don't have them stored in sessions
$stmt = $con->prepare('SELECT ID, policyname, tenantid FROM driftack WHERE ownerid = ?');
// In this case, we can use the account ID to retrieve the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();

/* Get the number of rows */
$num_of_rows = $result->num_rows;
if ($num_of_rows == 0) {
    echo "No drift acknowledgements found.";
}
else {
echo "<table>";
while ($row = $result->fetch_assoc()) {
    ?>
   <tr>
   <form action="acknowledge.php" method="post">
    <input type = "hidden" name="ID" value="<?php echo $row['ID']; ?>">
    <input type = "hidden" name="type" value="delete">
    <td>Policy Name: <?php echo $row['policyname']; ?></td>
    <td>Tenant ID: <?php echo $row['tenantid']; ?></td>
    <td>
    <input class="profile-btn" type="submit" value="Delete">
</form>
    </td>
   </tr>

    <?php
}
    $stmt->close();
}
    ?>
    </table>
				

			</div>

    </div>
<div>


		</div>
            
	
        <?php
include "footer.php";
?>