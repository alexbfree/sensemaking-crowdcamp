<?php

require_once './mysql.php';

$urls = array(
'blog=B&dataset=D101&data=p-B-1,p-B-2,i-B-1,i-B-2',
'blog=B&dataset=D102&data=p-B-1,p-B-2,i-B-1,i-B-3',
'blog=B&dataset=D103&data=p-B-1,p-B-2,i-B-1,i-B-4',
'blog=B&dataset=D104&data=p-B-1,p-B-2,i-B-1,i-B-5',
'blog=B&dataset=D105&data=p-B-1,p-B-2,i-B-2,i-B-3',
'blog=B&dataset=D106&data=p-B-1,p-B-2,i-B-2,i-B-4',
'blog=B&dataset=D107&data=p-B-1,p-B-2,i-B-2,i-B-5',
'blog=B&dataset=D108&data=p-B-1,p-B-2,i-B-3,i-B-4',
'blog=B&dataset=D109&data=p-B-1,p-B-2,i-B-3,i-B-5',
'blog=B&dataset=D110&data=p-B-1,p-B-2,i-B-4,i-B-5',
'blog=B&dataset=D111&data=p-B-1,p-B-3,i-B-1,i-B-2',
'blog=B&dataset=D112&data=p-B-1,p-B-3,i-B-1,i-B-3',
'blog=B&dataset=D113&data=p-B-1,p-B-3,i-B-1,i-B-4',
'blog=B&dataset=D114&data=p-B-1,p-B-3,i-B-1,i-B-5',
'blog=B&dataset=D115&data=p-B-1,p-B-3,i-B-2,i-B-3',
'blog=B&dataset=D116&data=p-B-1,p-B-3,i-B-2,i-B-4',
'blog=B&dataset=D117&data=p-B-1,p-B-3,i-B-2,i-B-5',
'blog=B&dataset=D118&data=p-B-1,p-B-3,i-B-3,i-B-4',
'blog=B&dataset=D119&data=p-B-1,p-B-3,i-B-3,i-B-5',
'blog=B&dataset=D120&data=p-B-1,p-B-3,i-B-4,i-B-5',
'blog=B&dataset=D121&data=p-B-1,p-B-4,i-B-1,i-B-2',
'blog=B&dataset=D122&data=p-B-1,p-B-4,i-B-1,i-B-3',
'blog=B&dataset=D123&data=p-B-1,p-B-4,i-B-1,i-B-4',
'blog=B&dataset=D124&data=p-B-1,p-B-4,i-B-1,i-B-5',
'blog=B&dataset=D125&data=p-B-1,p-B-4,i-B-2,i-B-3',
'blog=B&dataset=D126&data=p-B-1,p-B-4,i-B-2,i-B-4',
'blog=B&dataset=D127&data=p-B-1,p-B-4,i-B-2,i-B-5',
'blog=B&dataset=D128&data=p-B-1,p-B-4,i-B-3,i-B-4',
'blog=B&dataset=D129&data=p-B-1,p-B-4,i-B-3,i-B-5',
'blog=B&dataset=D130&data=p-B-1,p-B-4,i-B-4,i-B-5',
'blog=B&dataset=D131&data=p-B-1,p-B-5,i-B-1,i-B-2',
'blog=B&dataset=D132&data=p-B-1,p-B-5,i-B-1,i-B-3',
'blog=B&dataset=D133&data=p-B-1,p-B-5,i-B-1,i-B-4',
'blog=B&dataset=D134&data=p-B-1,p-B-5,i-B-1,i-B-5',
'blog=B&dataset=D135&data=p-B-1,p-B-5,i-B-2,i-B-3',
'blog=B&dataset=D136&data=p-B-1,p-B-5,i-B-2,i-B-4',
'blog=B&dataset=D137&data=p-B-1,p-B-5,i-B-2,i-B-5',
'blog=B&dataset=D138&data=p-B-1,p-B-5,i-B-3,i-B-4',
'blog=B&dataset=D139&data=p-B-1,p-B-5,i-B-3,i-B-5',
'blog=B&dataset=D140&data=p-B-1,p-B-5,i-B-4,i-B-5',
'blog=B&dataset=D141&data=p-B-2,p-B-3,i-B-1,i-B-2',
'blog=B&dataset=D142&data=p-B-2,p-B-3,i-B-1,i-B-3',
'blog=B&dataset=D143&data=p-B-2,p-B-3,i-B-1,i-B-4',
'blog=B&dataset=D144&data=p-B-2,p-B-3,i-B-1,i-B-5',
'blog=B&dataset=D145&data=p-B-2,p-B-3,i-B-2,i-B-3',
'blog=B&dataset=D146&data=p-B-2,p-B-3,i-B-2,i-B-4',
'blog=B&dataset=D147&data=p-B-2,p-B-3,i-B-2,i-B-5',
'blog=B&dataset=D148&data=p-B-2,p-B-3,i-B-3,i-B-4',
'blog=B&dataset=D149&data=p-B-2,p-B-3,i-B-3,i-B-5',
'blog=B&dataset=D150&data=p-B-2,p-B-3,i-B-4,i-B-5',
'blog=B&dataset=D151&data=p-B-2,p-B-4,i-B-1,i-B-2',
'blog=B&dataset=D152&data=p-B-2,p-B-4,i-B-1,i-B-3',
'blog=B&dataset=D153&data=p-B-2,p-B-4,i-B-1,i-B-4',
'blog=B&dataset=D154&data=p-B-2,p-B-4,i-B-1,i-B-5',
'blog=B&dataset=D155&data=p-B-2,p-B-4,i-B-2,i-B-3',
'blog=B&dataset=D156&data=p-B-2,p-B-4,i-B-2,i-B-4',
'blog=B&dataset=D157&data=p-B-2,p-B-4,i-B-2,i-B-5',
'blog=B&dataset=D158&data=p-B-2,p-B-4,i-B-3,i-B-4',
'blog=B&dataset=D159&data=p-B-2,p-B-4,i-B-3,i-B-5',
'blog=B&dataset=D160&data=p-B-2,p-B-4,i-B-4,i-B-5',
'blog=B&dataset=D161&data=p-B-2,p-B-5,i-B-1,i-B-2',
'blog=B&dataset=D162&data=p-B-2,p-B-5,i-B-1,i-B-3',
'blog=B&dataset=D163&data=p-B-2,p-B-5,i-B-1,i-B-4',
'blog=B&dataset=D164&data=p-B-2,p-B-5,i-B-1,i-B-5',
'blog=B&dataset=D165&data=p-B-2,p-B-5,i-B-2,i-B-3',
'blog=B&dataset=D166&data=p-B-2,p-B-5,i-B-2,i-B-4',
'blog=B&dataset=D167&data=p-B-2,p-B-5,i-B-2,i-B-5',
'blog=B&dataset=D168&data=p-B-2,p-B-5,i-B-3,i-B-4',
'blog=B&dataset=D169&data=p-B-2,p-B-5,i-B-3,i-B-5',
'blog=B&dataset=D170&data=p-B-2,p-B-5,i-B-4,i-B-5',
'blog=B&dataset=D171&data=p-B-3,p-B-4,i-B-1,i-B-2',
'blog=B&dataset=D172&data=p-B-3,p-B-4,i-B-1,i-B-3',
'blog=B&dataset=D173&data=p-B-3,p-B-4,i-B-1,i-B-4',
'blog=B&dataset=D174&data=p-B-3,p-B-4,i-B-1,i-B-5',
'blog=B&dataset=D175&data=p-B-3,p-B-4,i-B-2,i-B-3',
'blog=B&dataset=D176&data=p-B-3,p-B-4,i-B-2,i-B-4',
'blog=B&dataset=D177&data=p-B-3,p-B-4,i-B-2,i-B-5',
'blog=B&dataset=D178&data=p-B-3,p-B-4,i-B-3,i-B-4',
'blog=B&dataset=D179&data=p-B-3,p-B-4,i-B-3,i-B-5',
'blog=B&dataset=D180&data=p-B-3,p-B-4,i-B-4,i-B-5',
'blog=B&dataset=D181&data=p-B-3,p-B-5,i-B-1,i-B-2',
'blog=B&dataset=D182&data=p-B-3,p-B-5,i-B-1,i-B-3',
'blog=B&dataset=D183&data=p-B-3,p-B-5,i-B-1,i-B-4',
'blog=B&dataset=D184&data=p-B-3,p-B-5,i-B-1,i-B-5',
'blog=B&dataset=D185&data=p-B-3,p-B-5,i-B-2,i-B-3',
'blog=B&dataset=D186&data=p-B-3,p-B-5,i-B-2,i-B-4',
'blog=B&dataset=D187&data=p-B-3,p-B-5,i-B-2,i-B-5',
'blog=B&dataset=D188&data=p-B-3,p-B-5,i-B-3,i-B-4',
'blog=B&dataset=D189&data=p-B-3,p-B-5,i-B-3,i-B-5',
'blog=B&dataset=D190&data=p-B-3,p-B-5,i-B-4,i-B-5',
'blog=B&dataset=D191&data=p-B-4,p-B-5,i-B-1,i-B-2',
'blog=B&dataset=D192&data=p-B-4,p-B-5,i-B-1,i-B-3',
'blog=B&dataset=D193&data=p-B-4,p-B-5,i-B-1,i-B-4',
'blog=B&dataset=D194&data=p-B-4,p-B-5,i-B-1,i-B-5',
'blog=B&dataset=D195&data=p-B-4,p-B-5,i-B-2,i-B-3',
'blog=B&dataset=D196&data=p-B-4,p-B-5,i-B-2,i-B-4',
'blog=B&dataset=D197&data=p-B-4,p-B-5,i-B-2,i-B-5',
'blog=B&dataset=D198&data=p-B-4,p-B-5,i-B-3,i-B-4',
'blog=B&dataset=D199&data=p-B-4,p-B-5,i-B-3,i-B-5',
'blog=B&dataset=D200&data=p-B-4,p-B-5,i-B-4,i-B-5'
);

//insertData($urls);

function insertData($urls) {

	foreach($urls as $url) {
		$pieces = explode('&', $url);
		$blog = substr($pieces[0], 5); // blog=
		$name = substr($pieces[1], 8); // dataset=
		$data = substr($pieces[2], 5); // data=

		$q = sprintf("INSERT INTO dataset (`blog`, `name`, `data`) VALUES ('%s', '%s', '%s'); ",
			$blog,
			$name,
			$data
			);
		echo $q.'<br>';

		mysql_query($q);

	}

}