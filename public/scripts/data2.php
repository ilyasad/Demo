<?php
header('Access-Control-Allow-Origin: *');
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
	$sqlQcm = "select * from q_theme";
	$res = mysqli_query ( $db, $sqlQcm );
	$result =array();
	while($r = mysqli_fetch_array($res)){
		//extract($r);
		$result['theme'][] = $r;//array("name" => $name, "email" => $email, 'status' => $status); 
	}
//	$sqlQcm = "select id,question,theme from tb_qcm";
	$sqlQcm = "select idQuestion,content,t.name from q_question q join q_theme t on t.idTheme = q.idFkTheme";
	$res = mysqli_query ( $db, $sqlQcm );
	while($r = mysqli_fetch_array($res)){
		//extract($r);
		$result['question'][] = $r;//array("name" => $name, "email" => $email, 'status' => $status); 
	}
//	$sqlQcm = "select * from tb_qcm";
	$sqlQcm = "select a.content,a.isTrue,q.idQuestion from q_answer a join q_question q on a.idFkQuestion = q.idQuestion";
	$res = mysqli_query ( $db, $sqlQcm );
	while($r = mysqli_fetch_array($res)){
		$isTrue = $r['isTrue'] == 1 ? 'true' : 'false';
		$result['answer'][] = [$r['content'],$r['idQuestion'],$isTrue];
	//	$result['answer'][] = [$r['reponse_2'],$r['id'],$r['reponse_2_v']];
	//	$result['answer'][] = [$r['reponse_3'],$r['id'],$r['reponse_3_v']];
	}
	$json = $result;
	header('Content-type: application/json');
 	echo json_encode($json);
}
?>