
<?php

require_once './mysql.php';

//$blog = $_GET['blog'];
//$data = $_GET['data'];
$datasetID = $_GET['dataset'];

$q = "SELECT * FROM dataset WHERE id = ".$datasetID;
$result = mysql_query($q);
if($row = mysql_fetch_assoc($result)) {
	$data = $row['data'];
}


$assignmentId = $_GET['assignmentId'];
$workerId = $_GET['workerId'];

$imgEvidence = array(
	'i-A-1' => 'i-A-1.jpg',
	'i-A-2' => 'i-A-2.png',
	'i-A-3' => 'i-A-3.png',
	'i-A-4' => 'i-A-4.png',
	'i-A-5' => 'i-A-5.png',
	'i-B-1' => 'i-B-1.jpg',
	'i-B-2' => 'i-B-2.jpg',
	'i-B-3' => 'i-B-3.jpg',
	'i-B-4' => 'i-B-4.jpg',
	'i-B-5' => 'i-B-5.jpg'
	);

$txtEvidence = array(
	'p-A-1' => 'p-A-1.txt',
	'p-A-2' => 'p-A-2.txt',
	'p-A-3' => 'p-A-3.txt',
	'p-A-4' => 'p-A-4.txt',
	'p-A-5' => 'p-A-5.txt',
	'p-B-1' => 'p-B-1.txt',
	'p-B-2' => 'p-B-2.txt',
	'p-B-3' => 'p-B-3.txt',
	'p-B-4' => 'p-B-4.txt',
	'p-B-5' => 'p-B-5.txt'
	);

$dataArr = explode(',', $data);

$evidence = array();
$evidence []= $txtEvidence[$dataArr[0]];
$evidence []= $txtEvidence[$dataArr[1]];
$evidence []= $imgEvidence[$dataArr[2]];
$evidence []= $imgEvidence[$dataArr[3]];

shuffle($evidence);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Crowd Camp Sensemaking</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script type="text/javascript" src="scripts.js"></script>
</head>
<body>
 

	<form id="form0" name="form0" action="process.php" method="POST">

	<input type="hidden" name="dataset" value="<?= $datasetID ?>" />
	<input type="hidden" name="assignmentId" value="<?= $assignmentId ?>" />
	<input type="hidden" name="workerId" value="<?= $workerId ?>" />

	<input type="hidden" name="position1" value="<?= $evidence[0] ?>" />
	<input type="hidden" name="position2" value="<?= $evidence[1] ?>" />
	<input type="hidden" name="position3" value="<?= $evidence[2] ?>" />
	<input type="hidden" name="position4" value="<?= $evidence[3] ?>" />

    <h2>Find the sequence</h2>

    <p>We recently went on a trip to <strong>Hong Kong</strong>. We wrote some diary entries and took some photos but they got mixed up. We need your help sorting them out so we can post a blog about our trip.</p>

    <p>Below are 4 <strong>randomized</strong> pieces of evidence from the trip: 2 photos and 2 paragraphs of text. They may or may not be in the correct sequence.</p>

    <p>Look over them carefully and decide which evidence came first, second, third, and fourth. Use the menus below to input your decisions.</p>

    <table>

    	<tr>

<?php
	foreach($evidence as $ev) {
		echo '<td>';
		if(substr($ev,-3) == 'txt') {
			$txt = file_get_contents('./text/'.$ev);
			echo $txt;
		} else {
			echo '<img src="images/'.$ev.'">';
		}
		echo '</td>';
	}
?>
    	</tr>

    	<tr>

    		<td style="text-align: center;">
    			<select id="evidence1" class="sequence" name="evidence1">
    				<option value="">When did this happen?</option>
    				<option value="1">First</option>
    				<option value="2">Second</option>
    				<option value="3">Third</option>
    				<option value="4">Fourth</option>
    			</select>
    		</td>

    		<td style="text-align: center;">
    			<select id="evidence2" class="sequence" name="evidence2">
    				<option value="">When did this happen?</option>
    				<option value="1">First</option>
    				<option value="2">Second</option>
    				<option value="3">Third</option>
    				<option value="4">Fourth</option>
    			</select>
    		</td>

    		<td style="text-align: center;">
    			<select id="evidence3" class="sequence" name="evidence3">
    				<option value="">When did this happen?</option>
    				<option value="1">First</option>
    				<option value="2">Second</option>
    				<option value="3">Third</option>
    				<option value="4">Fourth</option>
    			</select>
    		</td>

    		<td style="text-align: center;">
    			<select id="evidence4" class="sequence" name="evidence4">
    				<option value="">When did this happen?</option>
    				<option value="1">First</option>
    				<option value="2">Second</option>
    				<option value="3">Third</option>
    				<option value="4">Fourth</option>
    			</select>
    		</td>

    	</tr>

    </table>

	<h2>Summarize the story</h2>
	<p>Write up a short summary of the trip, from start to finish. Use no more than one sentence for each piece of evidence.</p>
	<textarea id="summary" name="summary"></textarea>

	<input type="submit" value="Submit" class="submit" name="submit" />

	</form>

</body>


</html>