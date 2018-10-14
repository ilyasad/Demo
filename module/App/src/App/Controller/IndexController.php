<?php

namespace App\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationService;
use Root\Entity\QAdmin;
use Zend\Session\Container;

class IndexController extends AbstractActionController
{
	protected $em = null;
	/**
	 * getEntityManager
	 */
	public function getEntityManager() {
		if (null === $this->em) {
			$this->em = $this->getServiceLocator ()->get ( 'doctrine.entitymanager.orm_default' );
		}
		return $this->em;
	}

	public function indexAction()
    {
		return new ViewModel([
			'stats' => ''
		]);
	}
    public function index2Action()
    {
    	$authenticationService = new AuthenticationService();
    	 
    	$authenticationService = $this->getServiceLocator ()->get ( 'Zend\Authentication\AuthenticationService' );
    	$loggedUser = $authenticationService->getIdentity ();
 //   	var_dump($loggedUser);
    	$user_session = new Container( 'user' );
    	
    	$idAdmin = ( int ) $this->getEvent ()->getRouteMatch ()->getParam ( 'idAdmin' );
    	if($idAdmin>0){
    		$user_session->idAdmin = $idAdmin;
    		$company = $this->getEntityManager()->find ( 'Root\Entity\QAdmin',$idAdmin );
    		$user_session->company =  $company->getCompany();
    	}elseif($loggedUser->getType() != 'Manager'){ 
    		$user_session->idAdmin =  $loggedUser->getIdadmin();
    		$user_session->company =  $loggedUser->getCompany();
    	}
    	//	var_dump($user_session->idAdmin);exit;
    	$qb = $this->getEntityManager ()->createQueryBuilder ();
    //	$qb->select ( 'u' )->from ( 'Root\Entity\QUser', 'u' )->where ( 'u.idEnseigne = :idEnseigne' )->setParameter ( 'idEnseigne', $idEnseigne )->orderBy ( 'u.id', 'DESC' );
    	$qb->select ( 'COUNT(u)' )->from ( 'Root\Entity\QUser', 'u' )->where ( 'u.idfkadmin = :idadmin' )->setParameter ( 'idadmin', $user_session->idAdmin );
    	$users = $qb->getQuery ()->getResult ();
    	$allUsers = $this->getEntityManager()->getRepository ( 'Root\Entity\QUser' )->findBy (['idfkadmin'=> $user_session->idAdmin]);
    	$idsUser=[];
    	foreach($allUsers as $u){
    		$idsUser[]=$u->getIduser();
    	}
//    	var_dump($users);exit;
//    	$adressesUser = $this->getEntityManager ()->getRepository ( 'Root\Entity\QUser' )->findBy ( ['idUtilisateur' => $user->getId ()], [ ] );
    	$qbt = $this->getEntityManager ()->createQueryBuilder ();
    	$qbt->select ( 'COUNT(t)' )->from ( 'Root\Entity\QTest', 't' )->where('t.idfkuser IN (:ids)')->setParameter ( 'ids', $idsUser );
    	$tests = $qbt->getQuery ()->getResult ();
    	$qbtg = $this->getEntityManager ()->createQueryBuilder ();
    	$qbtg->select ( 'COUNT(t)' )->from ( 'Root\Entity\QTest', 't' )->where ( 't.result = :result' )->andWhere('t.idfkuser IN (:ids)')->setParameter ( 'ids', $idsUser )->setParameter ( 'result', 'Gagné' );
    	$testsG = $qbtg->getQuery ()->getResult ();
    	$qbtp = $this->getEntityManager ()->createQueryBuilder ();
    	$qbtp->select ( 'COUNT(t)' )->from ( 'Root\Entity\QTest', 't' )->where ( 't.result = :result' )->andWhere('t.idfkuser IN (:ids)')->setParameter ( 'ids', $idsUser )->setParameter ( 'result', 'Perdu' );
    	$testsP = $qbtp->getQuery ()->getResult ();
    	$stats = [
    		'u' => 	$users != null ? $users[0][1]:0,
    		't' => 	$tests != null ? $tests[0][1]:0,
    		'g' => 	$testsG != null ? $testsG[0][1]:0,
    		'pg' => $testsG != null && $tests[0][1] > 0 ? number_format(($testsG[0][1] / $tests[0][1])*100,2):0,
    		'p' => 	$testsP != null ? $testsP[0][1]:0,
    		'pp' => $testsP != null && $tests[0][1] > 0 ? number_format(($testsP[0][1] / $tests[0][1])*100,2):0,
    	];
    	//var_dump($stats);exit;
        return new ViewModel([
        		'stats' => $stats
        ]);
    }

    public function getStatisticAction(){
    	$idAdmin = ( int ) $this->getEvent ()->getRouteMatch ()->getParam ( 'idAdmin' );
    	 
    	// return file xls
    	$request = $this->getRequest ();
    	if ($request->isPost ()) {
    		$data_posted = $request->getPost ();
    		if ($data_posted ['export']) {
    			$headerXls = ['Prénom','Nom','Email','Date'];//,'Q1','R1','Q2','R2','Q3','R3','Q4','R4','Q5','R5','Q6','R6','Q7','R7','Q8','R8','Q9','R9','Q10','R10','Résultat'];
    			$qb = $this->getEntityManager ()->createQueryBuilder ();
    			$qb->select ( 'SUM(t.nbquestion)' )->from ( 'Root\Entity\QTheme', 't' )->where('t.isactive = :active')->andWhere ( 't.idfkadmin = :idadmin' )->setParameter ( 'idadmin', $idAdmin )->setParameter(':active','1');
    			$nbQuestion = $qb->getQuery ()->getResult ();
    			$compt = (int) $nbQuestion[0][1];
    		//	var_dump($compt);exit;
    			for($i=1;$i<=$compt;$i++){
    				$headerXls[]='Q'.$i;
    				$headerXls[]='R'.$i;
    			}
    			$headerXls[]='Note';
    			$headerXls[]='Résultat';
    			$users = $this->getEntityManager ()->getRepository ( 'Root\Entity\QUser' )->findBy (['idfkadmin' => $idAdmin],[]);
    			$bodyXls = [];
    			foreach ($users as $u){
    				$bodyXls[]=[$u->getFirstname(),$u->getLastname(),$u->getEmail()];
    				$tests = $this->getEntityManager ()->getRepository ( 'Root\Entity\QTest' )->findBy (['idfkuser' => $u->getIduser()],[]);
    				foreach ($tests as $t){
    					$bodyTest=['','','', $t->getCreationdate ()->format ('d/m/Y H:i:s')];
    					$responses = $this->getEntityManager ()->getRepository ( 'Root\Entity\QResponse' )->findBy (['idfktest' => $t->getIdtest()],[]);
    					//foreach ($responses as $r){
    					for($i=0;$i<$compt;$i++){
    						$bodyTest[]=(isset($responses[$i]))?$responses[$i]->getIdfkquestion()->getContent():'--';
    						$bodyTest[]=(isset($responses[$i]))?($responses[$i]->getIstrue() == 1 ? 'V' : 'X'):'--';
    					}
    					$bodyTest[]= $t->getScore();
    					$bodyTest[]= $t->getResult();
    					$bodyXls[] = $bodyTest;
    				}
    				
    			}
    			$this->getExportXls($headerXls, $bodyXls);
    		}
    	}
    	
    }
    public function usersDatatableAction()
    {
    	$idAdmin = ( int ) $this->getEvent ()->getRouteMatch ()->getParam ( 'idAdmin' );
    	$tabjson=[];
    	
    	$users = $this->getEntityManager ()->getRepository ( 'Root\Entity\QUser' )->findBy (['idfkadmin' => $idAdmin],[]);
    	
    	//var_dump($idTheme);exit;
    	if ($users != null) {
    		foreach ( $users as $u ) {
    			$tempTab = [];
    			$tests = $this->getEntityManager ()->getRepository ( 'Root\Entity\QTest' )->findBy (['idfkuser' => $u->getIduser()],[]);
    			$nbT=$nbG=$nbP=$noteS=0;
    			$noteI=6;
    			$isFirst=true;
    			$scoreS=$scoreI='--';
    			foreach ($tests as $t){
    				$nbT++;
    				if($t->getResult() != 'Annulé'){
    					if($t->getResult() == 'Perdu')
    						$nbP++;
    						elseif($t->getResult() == 'Gagné')
    						$nbG++;
    						$note = explode('/', $t->getScore());
    						if($isFirst){
    							$isFirst=false;
    							$noteI=end($note);
    							$scoreI = $t->getScore();
    						}
    						if($note[0] <= $noteI){
    							$noteI = $note[0];
    							$scoreI = $t->getScore();
    						}
    						if($note[0] >= $noteS){
    							$noteS = $note[0];
    							$scoreS = $t->getScore();
    						}
    				}
    				
    			}
    			$tempTab [] = '<span style="cursor:pointer" onclick="showDetails('.$u->getIduser ().')"><img src="/ressources_bo_webapp/assets/global/plugins/datatables/examples/resources/details_open.png" data-id="'.$u->getIduser ().'" /></span>';
    			$tempTab [] = $u->getIduser ();
    			$tempTab [] = $u->getFirstname ().' '.$u->getLastname ();
    			$tempTab [] = $u->getEmail ();
    			$tempTab [] = ($u->getRegisterdate () != null) ? $u->getRegisterdate ()->format ('d/m/Y H:i:s') : '--';//btn default green-stripe btn-sm
    
    			$tempTab [] = '<button class="btn btn-circle purple" >'.$scoreS.'</button>';
    			$tempTab [] = '<button class="btn btn-circle yellow" >'.$scoreI.'</button>';
    			$tempTab [] = '<button class="btn btn-circle green" ><b>'.$nbG.'</b></button>';
    			$tempTab [] = '<button class="btn btn-circle red-sunglo" ><b>'.$nbP.'</b></button>';//($c->getIsactive () == 1) ? '<span class="label label-sm label-success">Oui</span>' : '<span class="label label-sm label-danger">Non</span>';
    
    			$tempTab [] = '<button class="btn btn-circle blue-hoki" ><b>'.$nbT.'</b></button>';//'<button class="btn btn-xs purple" onclick="getFormQuestion('.$q->getIdquestion().')" title="Editer"> <i class="fa fa-edit"></i> </button>
    						//<button class="btn btn-xs red-sunglo" onclick="deleteQuestion('.$q->getIdquestion().')" title="Supprimer"> <i class="fa fa-trash-o"></i> </button>'; // fa-tags fa-superscript
    
    			$tabjson [] = $tempTab;
    		}
    	}
    
    	$resultsajax = array (
    			"aaData" => $tabjson
    	);
    	echo json_encode( $resultsajax );
    	exit ();
    }


    /**
     * Export Excel
     * @param array $headerXls
     * @param array $bodyXls
     */
    function getExportXls(array $headerXls , array $bodyXls){
    	$addRowCreate = function (\PHPExcel_Worksheet $sheet, $col = 'A', $row = NULL) {
    		return function (array $data) use($sheet, $col, &$row) {
    			if ($row === NULL) {
    				$row = $sheet->getHighestRow () + 1;
    			}
    			$sheet->fromArray ( array (
    					$data
    			), NULL, "$col$row" );
    			$row ++;
    		};
    	};
    	$doc = new \PHPExcel ();
    	$doc->getProperties ()->setCreator ( "EHCG" )->setLastModifiedBy ( "EHCG" )->setTitle ( "company Data" );
    
    	$doc->getActiveSheet ()->getRowDimension ( '1' )->setRowHeight ( 30 );
    	$doc->getActiveSheet ()->getStyle ( 'A1:BG1' )->getFont ()->setBold ( true );
    	$doc->getActiveSheet ()->getStyle ( 'A1:BG1' )->getFill ()->setFillType ( \PHPExcel_Style_Fill::FILL_SOLID )->getStartColor ()->setRGB( 'BCD6EE' );
    	$alphabet = range('A', 'Z');
    	$Z = 'Z';
    	if(count($headerXls) < count($alphabet))
    		$Z=$alphabet[count($headerXls)-1];
    		foreach ( range ( 'A', $Z ) as $columnID ) {
    			$doc->getActiveSheet ()->getColumnDimension ( $columnID )->setAutoSize ( true );
    		}
    
    		$sheet = $doc->setActiveSheetIndex ( 0 );
    		$sheet->fromArray ( $headerXls );
    		$addRow = $addRowCreate ( $sheet );
    
    		foreach ($bodyXls as $body){
    			$addRow ( $body );
    		}
    
    		//$config = $this->getController ()->getServiceLocator ()->get ( 'config' );
    		$newPath = 'public/ressources_bo_webapp/quizz_resources/xls_files';//$config ['module_config'] ['quizz_location'];
    		if (! file_exists ( $newPath )) {
    			if (! mkdir ( $newPath, 0777, true )) {
    				error_log ( 'Echec lors de la création des répertoires qui contient les fichiers temp...' );
    				var_dump ( 'erreur de creation du repertoire' );
    			}
    		}
    		$objWriter = new \PHPExcel_Writer_Excel5 ( $doc );
    		ob_start ();
    		$objWriter->save ($newPath . '/Export.xls');
    		$xlsData = ob_get_contents ();
    		ob_end_clean ();
    		$newPath = explode('public/',$newPath);
    		$response = array (
    				'op' => 'ok',
    				'file' => $newPath[1] . '/Export.xls'
    		);
    
    		die ( json_encode ( $response ) );
    
    }
}

