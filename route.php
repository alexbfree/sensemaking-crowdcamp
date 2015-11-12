<!DOCTYPE html>
<html>
<head>
	<title>Consent Form</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>

<?php

require_once './mysql.php';

$assignmentID = (@$_GET['assignmentId'] != '') ? $_GET['assignmentId'] : 12345;
$workerID 	  = (@$_GET['workerId'] != '') ? $_GET['workerId'] : 'foobar';

function findDataSet($workerID, $workersPerTask=3) {
	$found = false;

	$q = "SELECT id FROM dataset ORDER BY RAND()";
	$result = mysql_query($q);
	while($row = mysql_fetch_assoc($result)) {
		$datasetID = $row['id'];

		$q2 = sprintf("SELECT * FROM task WHERE dataset_id = %d AND worker_id != '%s' ",
			$datasetID,
			$workerID
			);
		$result2 = mysql_query($q2);
		if(mysql_num_rows($result2) < $workersPerTask) {
			$found = true;
			break;
		}
	}

	if($found)
		return $datasetID;
	else
		return null;
}


function buildURL($datasetID, $assignmentID, $workerID, $url = 'form.php') {

	$url .= '?dataset='.$datasetID.
		'&assignmentId='.$assignmentID.
		'&workerId='.$workerID;

	return $url;
}

$dsid = findDataSet($workerID);

if(!is_null($dsid)) {
	$url = buildURL($dsid, $assignmentID, $workerID);
	//echo $url;
	//header('Location: '.$url);
?>

<script type="text/javascript">

	$(document).ready(function(){
		
		$('#agree').click(function(){
			window.location.replace('<?= $url ?>');
		});

		if('<?= $assignmentID ?>' == 'ASSIGNMENT_ID_NOT_AVAILABLE') {
			$('#agree').prop('disabled', true);
		}
	});

</script>

<div id="irb">
<h1>Supporting Crowdsourced Sensemaking in Big Data with Context Slices</h1>

<h2>Investigators:</h2>

<p>Dr. Kurt Luther (Assistant Professor of Computer Science, Virginia Tech)<br />
Email: <a href="mailto:kluther@vt.edu">kluther@vt.edu</a>, Phone: 540-231-4857</p>

<p>Dr. Chris North (Professor of Computer Science, Virginia Tech)</p>

<h2>I. Purpose of this Research Project</h2>

<p>You are being asked to participate in a research study. The purpose of this study is to understand how people use digital tools to make sense of new, unfamiliar information. The researchers will ask you to use text and pictures on a web site to piece together a story. The results of this study may be published in academic conferences or journals or included in student theses and dissertations. We are recruiting about 100 adult men and women from the US for this study.</p>


<h2>II. Procedures</h2>

<p>If you agree to participate, we will ask you to do the following activities:</p>
<ul>
	<li>Look over pieces of information from a travel blog</li>
	<li>Put the pieces in order from first to last</li>
	<li>Write a short summary of these events</li>
</ul>

<p>The entire procedure will take place online and should take 5 minutes or less. </p>


<h2>III. Risks</h2>

<p>The risks of the study are minimal and are similar to what you would encounter doing everyday computer tasks like searching the Internet, writing a document, or checking email.</p>


<h2>IV. Benefits</h2>

<p>You will not receive any benefits by participating in this study. However, the study will help us develop software and techniques for solving mysteries. This could benefit society by preventing or solving crimes or improving our understanding of documents with important cultural or personal value.</p>

<p>No promise or guarantee of benefits has been made to encourage you to participate.</p>


<h2>V. Extent of Anonymity and Confidentiality</h2>

<p>We will collect your Mechanical Turk Worker ID, but these details will be stored separately from the rest of your study data, and only the Principal Investigator and Co-Principal Investigator will have the ability to link them. We will use a numeric code instead of your name to refer to your study data. At the conclusion of the study, we will destroy your personal information.</p>

<p>We may share your anonymized study data in publications or in data sets on our project website. If we use your data for these purposes, we will use the numeric code instead of your name to refer to you. We may also aggregate your data with other participants when reporting our results to minimize the possibility of identifying you. Your personal information will never be shared outside the research team.</p>

<p>The Virginia Tech (VT) Institutional Review Board (IRB) may view the study’s data for auditing purposes. The IRB is responsible for the oversight of the protection of human subjects involved in research.</p>


<h2>VI. Compensation</h2>

<p>You will be compensated $0.45 for your participation. Payment will be sent to you via Amazon Mechanical Turk.</p>


<h2>VII. Freedom to Withdraw</h2>

<p>It is important for you to know that you are free to withdraw from this study at any time without penalty. You are free not to answer any questions that you choose or respond to what is being asked of you without penalty. </p>

<p>Please note that there may be circumstances under which the investigator may determine that a subject should not continue as a subject.</p>

<p>Should you withdraw or otherwise discontinue participation, you will be compensated for the portion of the project completed in accordance with the Compensation section of this document.</p>


<h2>VIII. Questions or Concerns</h2>

<p>Should you have any questions about this study, you may contact one of the research investigators whose contact information is included at the beginning of this document.</p>

<p>Should you have any questions or concerns about the study’s conduct or your rights as a research subject, or need to report a research-related injury or event, you may contact the VT IRB Chair, Dr. David M. Moore at <a href="mailto:moored@vt.edu">moored@vt.edu</a> or (540) 231-4991.</p>


<h2>IX. Subject's Consent</h2>

<p>I have read the Consent Form and conditions of this project. I have had all my questions answered. I hereby acknowledge the above and give my voluntary consent:</p>


<input type="button" name="agree" id="agree" value="I agree and consent">

</div>

<?php
} else {
	echo "<p>Sorry, there is no more work available for this HIT.</p>";
}

?>

</body>
</html>