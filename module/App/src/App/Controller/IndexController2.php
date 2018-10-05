<?php

namespace App\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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
    	$qb = $this->getEntityManager ()->createQueryBuilder ();
    //	$qb->select ( 'u' )->from ( 'Root\Entity\QUser', 'u' )->where ( 'u.idEnseigne = :idEnseigne' )->setParameter ( 'idEnseigne', $idEnseigne )->orderBy ( 'u.id', 'DESC' );
    	$qb->select ( 'COUNT(u)' )->from ( 'Root\Entity\QUser', 'u' );
    	$users = $qb->getQuery ()->getResult ();
//    	$adressesUser = $this->getEntityManager ()->getRepository ( 'Root\Entity\QUser' )->findBy ( ['idUtilisateur' => $user->getId ()], [ ] );
    	$qbt = $this->getEntityManager ()->createQueryBuilder ();
    	$qbt->select ( 'COUNT(t)' )->from ( 'Root\Entity\QTest', 't' );
    	$tests = $qbt->getQuery ()->getResult ();
    	$qbtg = $this->getEntityManager ()->createQueryBuilder ();
    	$qbtg->select ( 'COUNT(t)' )->from ( 'Root\Entity\QTest', 't' )->where ( 't.result = :result' )->setParameter ( 'result', 'Gagné' );
    	$testsG = $qbtg->getQuery ()->getResult ();
    	$qbtp = $this->getEntityManager ()->createQueryBuilder ();
    	$qbtp->select ( 'COUNT(t)' )->from ( 'Root\Entity\QTest', 't' )->where ( 't.result = :result' )->setParameter ( 'result', 'Perdu' );
    	$testsP = $qbtp->getQuery ()->getResult ();
    	$stats = [
    		'u' => 	$users != null ? $users[0][1]:0,
    		't' => 	$tests != null ? $tests[0][1]:0,
    		'g' => 	$testsG != null ? $testsG[0][1]:0,
    		'pg' => $testsG != null ? number_format(($testsG[0][1] / $tests[0][1])*100,2):0,
    		'p' => 	$testsP != null ? $testsP[0][1]:0,
    		'pp' => $testsP != null ? number_format(($testsP[0][1] / $tests[0][1])*100,2):0,
    	];
    	//var_dump($stats);exit;
        return new ViewModel([
        		'stats' => $stats
        ]);
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
    			$tempTab [] = $u->getFirstname ().' '.$u->getLastname ();
    			$tempTab [] = $u->getEmail ();
    			$tempTab [] = ($u->getRegisterdate () != null) ? $u->getRegisterdate ()->format ('d/m/Y') : '--';//btn default green-stripe btn-sm
    
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

}

