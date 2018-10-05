<?php

namespace App\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Root\Entity\QTheme;
use Zend\View\Model\JsonModel;
use Root\Entity\QQuestion;
use Root\Entity\QAnswer;
use Zend\Authentication\AuthenticationService;

class AdministrationController extends AbstractActionController
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
    	$authenticationService = new AuthenticationService();
    	
    	$authenticationService = $this->getServiceLocator ()->get ( 'Zend\Authentication\AuthenticationService' );
    	$loggedUser = $authenticationService->getIdentity ();
    //	var_dump($loggedUser,$_SESSION["user"]["idAdmin"]);exit;
    	$themes = $this->getEntityManager()->getRepository ( 'Root\Entity\QTheme' )->findBy (['idfkadmin'=> $_SESSION["user"]["idAdmin"]]);
        return new ViewModel([
        		'themes' => $themes,
        ]);
    }

    public function questionDatatableAction()
    {
    	$idTheme = ( int ) $this->getEvent ()->getRouteMatch ()->getParam ( 'idTh' );
    	$authenticationService = new AuthenticationService();
    	 
    	$authenticationService = $this->getServiceLocator ()->get ( 'Zend\Authentication\AuthenticationService' );
    	$loggedUser = $authenticationService->getIdentity ();
    	 
    	$tabjson=[];
    	if($idTheme > 0)
    		$questions = $this->getEntityManager ()->getRepository ( 'Root\Entity\QQuestion' )->findBy (['idfktheme' => $idTheme],[]);
    	else {
    		$idsTh=[];
    		$themes = $this->getEntityManager()->getRepository ( 'Root\Entity\QTheme' )->findBy (['idfkadmin'=> $_SESSION["user"]["idAdmin"]]);
    		foreach ( $themes as $t ) {
    			$idsTh [] = $t->getIdtheme();
    		}
    		$qb = $this->getEntityManager ()->createQueryBuilder ();
    		$qb->select ( 'q' )->from ( 'Root\Entity\QQuestion', 'q' )->where('q.idfktheme IN (:ids)')->setParameter(':ids',$idsTh);
    		$questions = $qb->getQuery ()->getResult ();
    		//$questions = $this->getEntityManager ()->getRepository ( 'Root\Entity\QQuestion' )->findAll ();
    	}
    	//var_dump($idTheme);exit;
    	if ($questions != null) {
    		foreach ( $questions as $q ) {
    			$tempTab = [];
    			$answers = $this->getEntityManager ()->getRepository ( 'Root\Entity\QAnswer' )->findBy (['idfkquestion' => $q->getIdquestion()],[]);
    			$ans = '';
    			foreach ($answers as $a)
    			{
    				$color = $a->getIstrue()==1 ? 'green' : 'red';
    				$bgcolor = $a->getIstrue()==1 ? 'beige' : 'antiquewhite';
    				$ans .= '<span class="btn default '.$color.'-stripe btn-sm" style="background-color: '.$bgcolor.';white-space: normal;margin-bottom: 2px;text-align: left;width: 100%;">'.$a->getContent().'</span><br>';
    			}
//    			$tempTab [] = '<input type="checkbox" class="checkboxes" value="" />';
    			$tempTab [] = $q->getContent ();
     			$tempTab [] = $ans;
//     			$tempTab [] = ($c->getCreationdate () != null) ? $c->getCreationdate ()->format ('d/m/Y') : '--';btn default green-stripe btn-sm
    
//     			$tempTab [] = ($c->getIsactive () == 1) ? '<span class="label label-sm label-success">Oui</span>' : '<span class="label label-sm label-danger">Non</span>';
    			 
    			$tempTab [] = '<button class="btn btn-xs purple" onclick="getFormQuestion('.$q->getIdquestion().')" title="Editer"> <i class="fa fa-edit"></i> </button>
    						<button class="btn btn-xs red-sunglo" onclick="deleteQuestion('.$q->getIdquestion().')" title="Supprimer"> <i class="fa fa-trash-o"></i> </button>'; // fa-tags fa-superscript
    			 
    			$tabjson [] = $tempTab;
    		}
    	} 
    //	else {
				// $tabvalues = array ();
// 				if ($request->isPost ()) {
 		//			$tabjson = null;
// 				} else
		//			$tabjson = array ();
		//	}
    	 
    	$resultsajax = array (
    			"aaData" => $tabjson
    	);
    	echo json_encode( $resultsajax );
    	exit ();
    }

    /**
     * Les formulaires du Quizz
     */
    public function getQuizzFormAction() {
    	$idForm = ( int ) $this->getEvent ()->getRouteMatch ()->getParam ( 'id' );
    	$type = $this->getEvent ()->getRouteMatch ()->getParam ( 'type' );
    	$id = ( int ) $this->getEvent ()->getRouteMatch ()->getParam ( 'idTh' );
    	$action = $this->getEvent ()->getRouteMatch ()->getParam ( 'process' );
    	
    	if ($type == "T") {
    		
    		if ($action == "del") {
    			$questions = $this->getEntityManager ()->getRepository ( 'Root\Entity\QQuestion' )->findBy ( [
    					'idfktheme' => $idForm
    			], [ ] );
    			if($questions != null)
    				return new JsonModel( ['success'=>false,'message' => '<i class="fa fa-times"></i> - Ce thème est encore attaché à des questions.'] );
    			
    			$theme = $this->getEntityManager ()->find ( 'Root\Entity\QTheme', $idForm );
    			$this->getEntityManager ()->remove ( $theme );
    			$this->getEntityManager ()->flush ();
    
    			$responseJson = array (
    					'success'=>true,
    					'message' => '<p>- Supprimé avec succès.<p>'
    			);
    
    			return new JsonModel ( $responseJson );
    		}
    		$request = $this->getRequest ();
    		if ($request->isPost ()) {
    			if($id<1)
    				return new JsonModel( ['success'=>'error','message' => '<i class="fa fa-times"></i>'] );
    			$data = $request->getPost ();
    			$msg = '<p><i class="fa fa-check"></i> - Ajouté avec succès.<p>';
    			$theme = new QTheme();
    			if ($data ['ID_THEME'] > 0){
    				$theme = $this->getEntityManager ()->find ( 'Root\Entity\QTheme', $data ['ID_THEME'] );
    				$msg = '<p><i class="fa fa-check"></i> - Modifié avec succès.<p>';
    			}else{
    				
    				$isExist = $this->getEntityManager ()->getRepository ( 'Root\Entity\QTheme' )->findBy (['name' => $data ['LIBELLE']],[]);
    				if($isExist != null)
    					return new JsonModel( ['success'=>false,'reload'  => false,'message' => '<p class="alert alert-danger"><i class="fa fa-times"></i> - Ce thème existe bien dans votre système.<p>'] );
    			
    				$company = $this->getEntityManager()->find ( 'Root\Entity\QAdmin',$id );
    				$theme->setIdfkadmin ($company );
    				$theme->setImgpath ('img/default.jpg' );
    			}
    			
				(isset ( $data ['LIBELLE'] )) ? $theme->setName ( $data ['LIBELLE'] ) : '';
				(isset ( $data ['NB_QUESTION'] )) ? $theme->setNbquestion ( $data ['NB_QUESTION'] ) : '';
				(isset ( $data ['IS_ACTIVE'] )) ? $theme->setIsactive ( $data ['IS_ACTIVE'] ) : $theme->setIsactive ( 0 );
				
				$this->getEntityManager ()->persist ( $theme );
				$this->getEntityManager ()->flush ();
    			
    			$responseJson = array (
    					'success' => true,
    					'reload'  => false,
    					'message' => $msg
    			);
    
    			return new JsonModel( $responseJson );
    		}
    		$themes = $this->getEntityManager ()->getRepository ( 'Root\Entity\QTheme' )->findBy ( [
    				'idtheme' => $idForm
    		], [ ] );
    		// var_dump($adresses);
    		$viewModel = new ViewModel ();
    		$viewModel->setVariables ( array (
    				'isTheme' => true,
    				'theme' => ($themes != null) ? $themes [0] : null
    		) )->setTerminal ( true );
    		return $viewModel;
    	}else if ($type == "Q") {
    		if ($action == "del") {
    			//die('delete');
    			$answers = $this->getEntityManager ()->getRepository ( 'Root\Entity\QAnswer' )->findBy (['idfkquestion' => $idForm],[]);
    			
    			foreach ($answers as $a){
    				$this->getEntityManager ()->remove ( $a );
    				$this->getEntityManager ()->flush ();
    			}
    			$q = $this->getEntityManager ()->find ( 'Root\Entity\QQuestion', $idForm );
    			$this->getEntityManager ()->remove ( $q );
    			$this->getEntityManager ()->flush ();
    
    			$responseJson = array (
    					'success' => true,
    					'reload'  => true,
    					'message' => '<p>- Supprimée avec succès.<p>'
    			);
    
    			return new JsonModel ( $responseJson );
    		}
    		$request = $this->getRequest ();
    		if ($request->isPost ()) {
    			$data = $request->getPost ();
    			//var_dump($data);exit;
    			$msg = '<p><i class="fa fa-check"></i> - Ajoutée avec succès.<p>';
    			$question = new QQuestion();
    			if ($data ['ID_QUESTION'] > 0){
    				$question = $this->getEntityManager ()->find ( 'Root\Entity\QQuestion', $data ['ID_QUESTION'] );
    				$msg = '<p><i class="fa fa-check"></i> - Modifiée avec succès.<p>';
    			}else{
    				$theme = $this->getEntityManager ()->find ( 'Root\Entity\QTheme', $data ['ID_Q_THEME'] );
    				$isExist = $this->getEntityManager ()->getRepository ( 'Root\Entity\QQuestion' )->findBy (['content' => $data ['LIBELLE'],'idfktheme' => $data ['ID_Q_THEME']],[]);
    				if($isExist != null)
    					return new JsonModel( ['success'=>false,'reload'  => true,'message' => '<p class="alert alert-danger"><i class="fa fa-times"></i> - Cette question existe déjà dans votre système.<p>'] );
    			}
    			
				(isset ( $data ['LIBELLE'] )) ? $question->setContent ( $data ['LIBELLE'] ) : '';
				(isset ( $theme ) && $theme != null) ? $question->setIdfktheme ( $theme ) : '';
				
				$this->getEntityManager ()->persist ( $question );
				$this->getEntityManager ()->flush ();
				
				foreach ($data['ANS'] as $k => $ans){
					if(isset ( $ans ['content'] ) &&  $ans ['content'] != null){
						$answer = new QAnswer();
						if($ans['id'] > 0)
							$answer = $this->getEntityManager()->find('ROOT\Entity\QAnswer', $ans['id']);
						(isset ( $ans ['content'] )) ? $answer->setContent ( $ans ['content'] ) : '';
						(isset ( $question ) && $question != null) ? $answer->setIdfkquestion ( $question ) : '';
						(isset ( $data['RESPONSE'] ) &&  $data['RESPONSE'] == ($k+1)) ? $answer->setIstrue ( 1 ) : $answer->setIstrue ( 0 );
							
						$this->getEntityManager ()->persist ( $answer );
						$this->getEntityManager ()->flush ();
					}
				}
    			
    			$responseJson = array (
    					'success'=>true,
    					'reload'  => true,
    					'message' => $msg
    			);
    
    			return new JsonModel( $responseJson );
    		}
    		$questions = $this->getEntityManager ()->find ( 'Root\Entity\QQuestion', $idForm );
    		$answers = $this->getEntityManager ()->getRepository ( 'Root\Entity\QAnswer' )->findBy (['idfkquestion' => $idForm],[]);
    		// var_dump($adresses);
    		$viewModel = new ViewModel ();
    		$viewModel->setVariables ( array (
    				'isQuestion' => true,
    				'question' => ($questions != null) ? $questions : null,
    				'answers'	=> ($answers != null) ? $answers : null,
    		) )->setTerminal ( true );
    		return $viewModel;
    	}elseif ($type == 'U'){
    		$tests = $this->getEntityManager ()->getRepository ( 'Root\Entity\QTest' )->findBy (['idfkuser' => $idForm],[]);
    		
    		$viewModel = new ViewModel ();
    		$viewModel->setVariables ( array (
    				'isUser' => true,
    				'tests' => ($tests != null) ? $tests : null,
    			//	'answers'	=> ($answers != null) ? $answers : null,
    		) )->setTerminal ( true );
    		return $viewModel;
    	}elseif ($type == 'R'){
    		$questions = $this->getEntityManager ()->getRepository ( 'Root\Entity\QResponse' )->findBy (['idfktest' => $idForm],[]);
    		//var_dump($questions);exit;
    		$viewModel = new ViewModel ();
    		$viewModel->setVariables ( array (
    				'isResponse' => true,
    				'response' => ($questions != null) ? $questions : null,
    			//	'answers'	=> ($answers != null) ? $answers : null,
    		) )->setTerminal ( true );
    		return $viewModel;
    	}else if ($type == "Dup") {
    		$themes = $this->getEntityManager()->getRepository ( 'Root\Entity\QTheme' )->findBy (['idfkadmin'=> $idForm]);
    		foreach ($themes as $t){
    			$theme = new QTheme();
    			 
    			$company = $this->getEntityManager()->find ( 'Root\Entity\QAdmin',$id );
    			$theme->setIdfkadmin ($company );
    			$theme->setImgpath ($t->getImgpath() );
    			$theme->setName ( $t->getName() ) ;
    			$theme->setNbquestion ( $t->getNbquestion() );
    			$theme->setIsactive ( $t->getIsactive() );
    			
    			$this->getEntityManager ()->persist ( $theme );
    			$this->getEntityManager ()->flush ();
    			
    			$questions = $this->getEntityManager ()->getRepository ( 'Root\Entity\QQuestion' )->findBy (['idfktheme' => $t->getIdtheme()],[]);
    			foreach ($questions as $q){
    				$question = new QQuestion();
    			
					$question->setContent ( $q->getContent() );
					$question->setIdfktheme ( $theme );
				
					$this->getEntityManager ()->persist ( $question );
					$this->getEntityManager ()->flush ();
    				 
    				$answers = $this->getEntityManager ()->getRepository ( 'Root\Entity\QAnswer' )->findBy (['idfkquestion' => $q->getIdquestion()],[]);
    				foreach ($answers as $a){
    					$answer = new QAnswer();
    					$answer->setContent ( $a->getContent() );
    					$answer->setIdfkquestion ( $question );
    					$answer->setIstrue ( $a->getIstrue() );
    							
    					$this->getEntityManager ()->persist ( $answer );
    					$this->getEntityManager ()->flush ();
    				}
    			}
    		}
    		die('Base dupliquée avec succès');
    	}
    }
}

