<html>
<head>
	<style type="text/css">

	td.yes {
		color: green;
		}

	td.no {
		color: red;
		}

	td {
		padding: 2px 4px;
		}
	</style>
</head>
<body>

<table>
	<tr>
		<th>dataset</th>
		<th>1</th>
		<th>2</th>
		<th>3</th>
		<th>4</th>
		<th>score</th>
	</tr>

<?php

require_once './mysql.php';

// answer key
$answers = array(
	0 => 'p-B-1',
	1 => 'i-B-1',
	2 => 'p-B-2',
	3 => 'i-B-2',
	4 => 'p-B-3',
	5 => 'i-B-3',
	6 => 'p-B-4',
	7 => 'i-B-4',
	8 => 'p-B-5',
	9 => 'i-B-5'
	);



function cut($str) {
	return (substr($str,0,5));
}

$q = "SELECT * FROM task WHERE first != '' AND second != '' AND third != '' AND fourth != '' ORDER BY dataset_id ASC";


$result = mysql_query($q);
while($row = mysql_fetch_assoc($result)) {
	echo '<tr><td>'.$row['dataset_id'].'</td>';

	$pieces = array(
		0 => cut($row['first']), // i-B-1
		1 => cut($row['second']), // p-B-1
		2 => cut($row['third']), // i-B-2
		3 => cut($row['fourth']) // p-B-2
		);
	ksort($pieces);

	$correct = array();
	foreach($pieces as $piece) {
		foreach($answers as $k => $a) {
			if($a == $piece) {
				$correct[$k] = $a;
			}
		}
	}
	ksort($correct);

	$correct2 = array();
	foreach($correct as $c) {
		$correct2[] = $c;
	}

	$score = 0;
	for($i=0; $i<count($pieces); $i++) {
		if($pieces[$i] == $correct2[$i]) {
			echo '<td class="yes">y</td>';
			$score+=1;
		} else {
			echo '<td class="no">n</td>';
		}
	}
	echo '<td>'.$score.'</td>';
	echo '</tr>';
}

?>
</table>

</body>
</html>


