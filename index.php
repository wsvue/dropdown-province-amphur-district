<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM province";
$results = $db_handle->runQuery($query);
?>
<html>
<head>
<TITLE>jQuery Dependent DropDown List - Countries and States</TITLE>
<head>
<style>
body{width:610px;font-family:calibri;}
.frmDronpDown {border: 1px solid #7ddaff;background-color:#C8EEFD;margin: 2px 0px;padding:40px;border-radius:4px;}
.demoInputBox {padding: 10px;border: #bdbdbd 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.row{padding-bottom:15px;}
</style>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "getState.php",
	data:'PROVINCE_ID='+val,
	success: function(data){
		$("#state-list").html(data);
		getCity();
	}
	});
}


function getCity(val) {
	$.ajax({
	type: "POST",
	url: "getCity.php",
	data:'AMPHUR_ID='+val,
	success: function(data){
		$("#city-list").html(data);
	}
	});
}

</script>
</head>
<body>
<div class="frmDronpDown">
<div class="row">
<label>Country:</label><br/>
<select name="province" id="country-list" class="demoInputBox" onChange="getState(this.value);">
<option value disabled selected>Select Country</option>
<?php
foreach($results as $province) {
?>
<option value="<?php echo $province["PROVINCE_ID"]; ?>"><?php echo $province["PROVINCE_NAME"]; ?></option> 
<?php
}
?>
</select>
</div>
<div class="row">
<label>State:</label><br/>
<select name="amphur" id="state-list" class="demoInputBox" onChange="getCity(this.value);">
<option value="">Select State</option>
</select>
</div>
<div class="row">
<label>City:</label><br/>
<select name="district" id="city-list" class="demoInputBox">
<option value="">Select City</option>
</select>
</div>
</div>
</body>
</html>