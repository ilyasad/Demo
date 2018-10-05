<?php
	//http://stackoverflow.com/questions/18382740/cors-not-working-php
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


    //http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
    $postdata = file_get_contents("php://input");
	if (isset($postdata)) {
		$request = json_decode($postdata);
		//$username = $request->username;
		$answers = (isset($request->answer))?$request->answer:[];
		$questions = (isset($request->question))?$request->question:[];
		$users = (isset($request->user))?$request->user:[];
		$listUser = [];
		$tests = (isset($request->test))?$request->test:[];

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
			//echo "part 1; ";
			if($users != null && count($users)>0)
			foreach ($users as $key => $value) {
				
				$findSql = 'select idUser from q_user where email = "'.$value->email.'" and idFkAdmin = '.$value->idAdmin.';';
				$resFindSql = mysqli_query ( $db, $findSql ) or die(mysql_error());
				$rep = mysqli_fetch_assoc($resFindSql);
			//	echo "part 2: ".json_encode($rep);
				if ($rep != null) {
					$listUser[$value->id] = $rep['idUser'];
				}else{
					//echo "part 4; ";
					$sql = 'insert into q_user (firstname, lastname, email, registerDate, idFkAdmin) values("'.$value->firstname.'", "'.$value->lastname.'", "'.$value->email.'","'.date('Y-m-d H:i:s',$value->date/1000).'",'.$value->idAdmin.')';//date('Y-m-d H:i:s', strtotime(strstr($value->date,' GMT', true) ))
					if (mysqli_query($db, $sql)) {
						error_log ("\n\nNew record created successfully");
						//echo "Good Job";
					}
					$listUser[$value->id] = mysqli_insert_id($db);
				}
				
				
				
			}
			$idsTest = [];
			if($tests != null && count($tests)>0)
			foreach ($tests as $key => $value) {
				$findTestSql = 'select idTest from q_test where score = "'.$value->note.'" and result = "'.$value->result.'" and creationDate = "'.date('Y-m-d H:i:s',$value->date/1000).'" and idFkUser = '.$listUser[$value->idUser].';';
				$resFindTSql = mysqli_query ( $db, $findTestSql ) or die(mysql_error());
				$repTest = mysqli_fetch_assoc($resFindTSql);
				//	echo "part 2: ".json_encode($rep);
				if ($repTest != null) {
					$idsTest[] = $value->id;
				}else{
					$sql = 'insert into q_test (idFkUser, score, result, creationDate) values('.$listUser[$value->idUser].',"'.$value->note.'", "'.$value->result.'", "'. date('Y-m-d H:i:s',$value->date/1000).'")';
					if (mysqli_query($db, $sql)) {
						$idTest = mysqli_insert_id($db);
						foreach ($value->responses as $k => $v) {
							$isTrue = ($v->isTrue == "true") ? 1 : 0;
							$sql1 = 'insert into q_response (idFkTest, idFkQuestion, idFkAnswer, isTrue) values('.$idTest.','.$v->idQuestion.', '.$v->idAnswer.', '.$isTrue.')';
							if (mysqli_query($db, $sql1)) {
								
							}
						}
						$idsTest[] = $value->id;
					}
				}
				//	$listUser[$value->id] = mysqli_insert_id($db);
				
				
				
			}
			/**
			foreach ($questions as $key => $value) {
				$sql = 'insert into q_question (idQuestion, content, idFkTheme) values('.$value->id.',"'.$value->content.'", '.$value->idTheme.')';
				if (mysqli_query($db, $sql)) {
					error_log ("\n\nNew record created successfully");
					echo "Good Job";
				}else{
					continue;
				}
			}
			/* 
			foreach ($answers as $key => $value) {
				$sql = 'insert into q_answer (idAnswer, content, isTrue, idFkQuestion) values('.$value->id.',"'.$value->content.'", '.$value->isTrue.', '.$value->idQuestion.')';
				if (mysqli_query($db, $sql)) {
					error_log ("\n\nNew record created successfully");
					echo "Good Job";
				}else{
					continue;
				}
			}
			*/
		}
		if ($listUser != null) {
			die(json_encode($idsTest));
			echo "Server returns: " . json_encode($idsTest);
		}
		else {
			die(false);
		}
	}
	else {
		die(false);
	}
?>