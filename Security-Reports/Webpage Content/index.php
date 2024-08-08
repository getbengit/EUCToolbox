<?php
include('config.php');
$sitename = "Intune Security Check from EUC Toolbox";
$pagetitle = "Intune Security Check";
include "header.php";
?>

<?php
//Check for any POST messages and if found, display them
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<div class='alert alert-success' role='alert'>$message</div>";
}
?>   
         <h1>Welcome to Intune Security Check from EUC Toolbox</h1>
         <div class="step-container">
   <p>This free service will send you an email with a report which queries your tenant against:</p>
    <ul>
         <li>CIS Baselines</li>
         <li>NCSC Baselines</li>
    </ul>
   <p>Please enter your email and tenant ID and click submit.</p>
</div>
   <form action="process.php" method="post">
   <table class="styled-table">
    <tr><td><label for="email">Recipient Email:</label></td>
    <td><input type="email" name="email" id="email" required></td></tr>
    <tr><td><label for="tenant">Tenant ID:</label></td>
    <td><input type="text" name="tenant" id="tenant" required></td></tr>
<tr><td class="tableButton"><input class="profile-btn" type="submit" value="Next"></td></tr>
    </form>
    </table>  
    <?php
include "footer.php";
?>