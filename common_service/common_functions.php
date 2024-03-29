<?php 

function getGender222() {
	//do not use this function
	exit;
	$data = '<option value="">Select Gender</option>';

	$data = $data .'<option value="Male">Male</option>';
	$data = $data .'<option value="Female">Female</option>';
	$data = $data .'<option value="Other">Other</option>';

	return $data;
}

function getGender($gender = '') {
	$data = '<option value="">Select Gender</option>';
	
	$arr = array("Male", "Female", "Other");

	$i = 0;
	$size = sizeof($arr);

	for($i = 0; $i < $size; $i++) {
		if($gender == $arr[$i]) {
			$data = $data .'<option selected="selected" value="'.$arr[$i].'">'.$arr[$i].'</option>';
		} else {
		$data = $data .'<option value="'.$arr[$i].'">'.$arr[$i].'</option>';
		}
	}

	return $data;
}


function getMedicines($con, $medicineId = 0) {

	$query = "select `id`, `medicine_name` from `medicine_details` 
	order by `medicine_name` asc;";

	$stmt = $con->prepare($query);
	try {
		$stmt->execute();

	} catch(PDOException $ex) {
		echo $ex->getTraceAsString();
		echo $ex->getMessage();
		exit;
	}

	$data = '<option value="">Select Medicine</option>';

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		if($medicineId == $row['id']) {
			$data = $data.'<option selected="selected" value="'.$row['id'].'">'.$row['medicine_name'].'</option>';

		} else {
		$data = $data.'<option value="'.$row['id'].'">'.$row['medicine_name'].'</option>';
		}
	}

	return $data;
	
}

function getMedicine($con, $medicineId = 0) {

	$query = "SELECT `id`, `medicine_name`, date_format(`expire_date`, '%m/%d/%Y') as `expire_date` FROM `medicine_details` 
	WHERE `id` = $medicineId";

	$stmt = $con->prepare($query);
	try {
		$stmt->execute();

	} catch(PDOException $ex) {
		echo $ex->getTraceAsString();
		echo $ex->getMessage();
		exit;
	}

	$data = $stmt->fetch(PDO::FETCH_OBJ);
	// $data = '<option value="">Select Medicine</option>';

	// while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	// 	if($medicineId == $row['id']) {
	// 		$data = $data.'<option selected="selected" value="'.$row['id'].'">'.$row['medicine_name'].'</option>';

	// 	} else {
	// 	$data = $data.'<option value="'.$row['id'].'">'.$row['medicine_name'].'</option>';
	// 	}
	// }

	return $data;
	
}


function getPatients($con) {
$query = "select `id`, `student_number`, `patient_name` 
from `patients` order by `student_number` asc;";


	$stmt = $con->prepare($query);
	try {
		$stmt->execute();

	} catch(PDOException $ex) {
		echo $ex->getTraceAsString();
		echo $ex->getMessage();
		exit;
	}

	$data = '<option value="">Select Patient</option>';

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$data = $data.'<option value="'.$row['id'].'">'.$row['student_number'].' ('.$row['patient_name'].')'.'</option>';
	}

	return $data;
}

function getEmployee($con) {
	$query = "select `id`, `employee_number`, `patient_name` 
	from `employee_record` order by `employee_number` asc;";
	
		$stmt = $con->prepare($query);
		try {
			$stmt->execute();
	
		} catch(PDOException $ex) {
			echo $ex->getTraceAsString();
			echo $ex->getMessage();
			exit;
		}
	
		$data = '<option value="">--------------------------------------------------Employees--------------------------------------------------</option>';
	
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data = $data.'<option value="'.$row['id'].'">'.$row['employee_number'].' ('.$row['patient_name'].')'.'</option>';
		}
	
		return $data;
	}


function getDateTextBox($label, $dateId) {

	$d = '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-10">
                <div class="form-group">
                  <label>'.$label.'</label>
                  <div class="input-group rounded-0 date" 
                  id="" 
                  data-target-input="nearest">
                  <input type="text" class="form-control form-control-sm rounded-0 datetimepicker-input" data-toggle="datetimepicker" 
data-target="#'.$dateId.'" name="'.$dateId.'" id="'.$dateId.'" required="required" autocomplete="off"/>
                  <div class="input-group-append rounded-0" 
                  data-target="#'.$dateId.'" 
                  data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
          </div>';

          return $d;
}


function makeTitle($string, $delim){
	$words = explode($delim, $string);
	$new_words = array();
	foreach($words as $word){
		array_push($new_words, ucwords($word));
	}
	return implode(" ", $new_words);
}

function formatDateInsert($date){
	if($date == ''){
		return "0000-00-00";
	}
	$dateArr = explode('/', $date);
	return $dateArr[2].'-'.$dateArr[0].'-'.$dateArr[1];
}



?>
