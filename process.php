<?php


require_once './mysql.php';

$datasetID = $_POST['dataset'];
$workerID = $_POST['workerId'];
$assignmentID = $_POST['assignmentId'];

$summary = $_POST['summary'];

$pos1 = $_POST['position1']; // e.g. text1
$pos2 = $_POST['position2']; // e.g. img1
$pos3 = $_POST['position3']; // e.g. text2
$pos4 = $_POST['position4']; // e.g. img2

$ev1 = $_POST['evidence1']; // e.g. 1
$ev2 = $_POST['evidence2']; // e.g. 2
$ev3 = $_POST['evidence3']; // e.g. 3
$ev4 = $_POST['evidence4']; // e.g. 4


if($ev1 == 1)
	$first = $pos1;
elseif($ev1 == 2)
	$second = $pos1;
elseif($ev1 == 3)
	$third = $pos1;
else
	$fourth = $pos1;

if($ev2 == 1)
	$first = $pos2;
elseif($ev2 == 2)
	$second = $pos2;
elseif($ev2 == 3)
	$third = $pos2;
else
	$fourth = $pos2;

if($ev3 == 1)
	$first = $pos3;
elseif($ev3 == 2)
	$second = $pos3;
elseif($ev3 == 3)
	$third = $pos3;
else
	$fourth = $pos3;

if($ev4 == 1)
	$first = $pos4;
elseif($ev4 == 2)
	$second = $pos4;
elseif($ev4 == 3)
	$third = $pos4;
else
	$fourth = $pos4;


$q = sprintf("INSERT INTO task (`assignment_id`, `worker_id`, `dataset_id`, `summary`, `first`, `second`, `third`, `fourth`)
	VALUES ('%s', '%s', %d, '%s', '%s', '%s', '%s', '%s')",
	$assignmentID,
	$workerID,
	$datasetID,
	$summary,
	$first,
	$second,
	$third,
	$fourth
	);
mysql_query($q);

?>

<p>Thanks! Please click the Submit button to complete this task.</p>

<p>Feedback (optional):</p>
<form id="form0" name="form0" method="POST" action="https://www.mturk.com/mturk/externalSubmit">

	<textarea name="feedback" style="width: 400px; height: 80px;"></textarea><br />

	<input type="hidden" name="assignmentId" value="<?= $assignmentID ?>">
	<input type="submit" name="submit" value="Submit">
</form>