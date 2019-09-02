<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["AMPHUR_ID"])) {
    $query = "SELECT * FROM district WHERE AMPHUR_ID = '" . $_POST["AMPHUR_ID"] . "'";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected>Select State</option>
<?php
    foreach ($results as $district) {
        ?>
<option value="<?php echo $amphur["DISTRICT_ID"]; ?>"><?php echo $district["DISTRICT_NAME"]; ?></option> 
<?php
    }
}
?> 