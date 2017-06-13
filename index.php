<?php

require_once 'db.php';


$sql = $db->query("SHOW TABLES")->fetchAll(PDO::FETCH_ASSOC);

$tables_from_db = array();

foreach($sql as $tbl){

 array_push($tables_from_db, $tbl['Tables_in_'.$dbname]);
	
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/multiple-select.css">
	<title> SIMPLE CODEIGNITER  </title>
</head>
<body>




<div class="container" style="margin-top: 70px; margin-bottom: 20px;">
	<div class="row">
		<div class="col-md-12">
<h1>CodeIgniter Simple CRUD Generator</h1>
<p style="color: blue;">
	The goal of this simple app is to create a quick Create ,Read, Update ,Delete (CRUD) snippet with form validation  and save a little time from typing codes.
</p>
		<div class="alert alert-warning">
			<strong>Instruction:</strong>

			<ol>
				<li>Select that you want to generate code</li>
				<li>Select Form Validation Rules For Each Corresponding Columns</li>
				<li>Modify the generated code according to your needs</li>
			</ol>

			<p>Note : </p>
			<p>Validation rule enclosed in square bracket [] needs a user defined value ex: min_length[100] .</p>
			<p> Primary Key Column doesn't really need a validation But if you like so then do it.</p>
		</div>


	<div class="alert alert-danger">
				<strong>Warning</strong>
				<p>
				If u don't like this code generator thend ,  DONT USE OR MAKE YOUR OWN CODE GENERATOR :)
				.I created this tool for my own personal use only. 
				</p>
			</div>
<div class="alert alert-info">
	<strong>Created By</strong>
	<a href="https://github.com/novhex">@novhex</a>
</div>
			<div class="form-group col-sm-4">
			<label>Select Table to Generate Code</label>
				<select name="tables" class="form-control">
					<?php foreach($tables_from_db as $table):?>
					<option value="<?php echo $table;?>"><?php echo $table;?></option>
					<?php endforeach; ?>
				</select>

				<button style="margin-top: 5px;" class="btn btn-success" id="create-validation"> Select Table </button>

			</div>

			<div class="cols_res" style="margin-left: 15px;"></div>




		</div>


	</div>
</div>


<script type="text/javascript" src="assets/jquery.min.js"></script>
<script type="text/javascript" src="assets/multiple-select.js"></script>
<script type="text/javascript" src="assets/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/app.js"></script>

	</body>
</html>

