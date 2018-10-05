<?php
//header('Access-Control-Allow-Origin: *');
if (isset($_SERVER['HTTP_ORIGIN'])) {
	header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

			exit(0);
}

$hostname_mysql = "localhost";
$username_mysql = "root";
$password_mysql = "ehcg";
$database_mysql = "ehcgstudio";

$db = mysqli_connect ( $hostname_mysql, $username_mysql, $password_mysql, $database_mysql ) or die ( mysqli_error () );
mysqli_set_charset ( $db, 'utf8' );
// mysqli_select_db($db,$database_mysql);
$db_selected = mysqli_select_db ( $db, $database_mysql );

if (! $db_selected ) {
	die ( 'Can\'t use database ' . $db . ' : ' . mysqli_error () . '<br>' );
} else {
	//echo 'test2';
	$postdata = file_get_contents("php://input");
	if (isset($postdata)) {
		$request = json_decode($postdata);
	$sqlQcm = "select * from q_theme where idFkAdmin = ".$request->idAdmin;
	$res = mysqli_query ( $db, $sqlQcm );
	$result=$idTheme=$idQuestion=array();
	while($r = mysqli_fetch_array($res)){
		//extract($r);
		$idTheme[] = $r['idTheme'];
		$result['theme'][] = $r;//array("name" => $name, "email" => $email, 'status' => $status); 
	}
//	$sqlQcm = "select id,question,theme from tb_qcm";
	$ids = join("','", $idTheme);
	$sqlQcm = "select idQuestion,content,idFkTheme from q_question q where idFkTheme IN ('$ids')";//join q_theme t on t.idTheme = q.idFkTheme";
	$res = mysqli_query ( $db, $sqlQcm );//SELECT idTheme FROM q_theme where idFkAdmin = ".$request->idAdmin."
	while($r = mysqli_fetch_array($res)){
		//extract($r);
		$idQuestion[] = $r['idQuestion'];
		$result['question'][] = $r;//array("name" => $name, "email" => $email, 'status' => $status); 
	}
//	$sqlQcm = "select * from tb_qcm";
	$idsQ = join("','", $idQuestion);
	$sqlQcm = "select a.idAnswer,a.content,a.isTrue,a.idFkQuestion from q_answer a where idFkQuestion IN ('$idsQ')";//join q_question q on a.idFkQuestion = q.idQuestion";
	$res = mysqli_query ( $db, $sqlQcm );
	while($r = mysqli_fetch_array($res)){
		$isTrue = $r['isTrue'] == 1 ? 'true' : 'false';
		$result['answer'][] = [$r['content'],$r['idFkQuestion'],$isTrue,$r['idAnswer']];
	//	$result['answer'][] = [$r['reponse_2'],$r['id'],$r['reponse_2_v']];
	//	$result['answer'][] = [$r['reponse_3'],$r['id'],$r['reponse_3_v']];
	}
	$json = $result;
	header('Content-type: application/json');
 	echo json_encode($json);
	}
}
?>