<?php

namespace App;
use App\Entity\QAdmin;

return array (
		'controllers' => array (
				'invokables' => array (
						'App\Controller\ServiceLoginAuth' => 'App\Controller\ServiceLoginAuthController',
						'App\Controller\Index' 			=> 'App\Controller\IndexController',
						'App\Controller\Administration' => 'App\Controller\AdministrationController',
					//	'App\Controller\Customers' => 'App\Controller\CustomersController',
				) 
		),
		'router' => array (
				'routes' => array (
						'questions_datatable' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/questions_datatable[/:idTh]',
										'constraints' => array (
												'idTh' => '[0-9]+'
										),
										'defaults' => array (
												'__NAMESPACE__' => 'App\Controller',
												'controller' => 'Administration',
												'action' => 'questionDatatable'
										)
								)
						),
						'users_datatable' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/users_datatable[/:idAdmin]',
										'constraints' => array (
												'idAdmin' => '[0-9]+'
										),
										'defaults' => array (
												'__NAMESPACE__' => 'App\Controller',
												'controller' => 'Index',
												'action' => 'usersDatatable'
										)
								)
						),
						'Q_Dashboard' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/Q_Dashboard[/:idAdmin]',
										'constraints' => array (
												'idAdmin' => '[0-9]*'
										),
										'defaults' => array (
												'__NAMESPACE__' => 'App\Controller',
												'controller' => 'Index',
												'action' => 'Index'
										)
								)
						),
						'Q_Configuration' => array (
								'type' => 'literal',
								'options' => array (
										'route' => '/Q_Configuration',
										'defaults' => array (
												'__NAMESPACE__' => 'App\Controller',
												'controller' => 'Administration',
												'action' => 'Index'
										)
								)
						),
						'quizz_form' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/quizz_form[/:id][/:type][/:idTh][/:process]',
										'constraints' => array (
												'id' => '[0-9]+',
												'type' => '[a-zA-Z]*',
												'idTh' => '[0-9]*',
												'process' => '[a-zA-Z]*'
										),
										'defaults' => array (
												'__NAMESPACE__' => 'App\Controller',
												'controller' => 'Administration',
												'action' => 'getQuizzForm'
										)
								)
						),
						'Q_Statistic' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/Q_Statistic[/:idAdmin]',
										'constraints' => array (
												'idAdmin' => '[0-9]+'
										),
										'defaults' => array (
												'__NAMESPACE__' => 'App\Controller',
												'controller' => 'Index',
												'action' => 'getStatistic'
										)
								)
						),
						'login' => array (
								'type' => 'literal',
								'options' => array (
										'route' => '/',
										'defaults' => array (
												'__NAMESPACE__' => 'App\Controller',
												'controller' => 'ServiceLoginAuth',
												'action' => 'Index' 
										) 
								) 
						),
						'service_login' => array (
								'type' => 'literal',
								'options' => array (
										'route' => '/ServiceLoginAuth',
										'defaults' => array (
												'__NAMESPACE__' => 'App\Controller',
												'controller' => 'ServiceLoginAuth',
												'action' => 'authenticate' 
										) 
								),
								'may_terminate' => true,
								'child_routes' => array (
										'process' => array (
												'type' => 'Segment',
												'options' => array (
														'route' => '/[:action]',
														'constraints' => array (
																'route' => array (
																		'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
																		'action' => '[a-zA-Z][a-zA-Z0-9_-]*' 
																),
																'defaults' => array () 
														) 
												) 
										) 
								) 
						),
						'logout' => array (
								'type' => 'literal',
								'options' => array (
										'route' => '/logout',
										'defaults' => array (
												'__NAMESPACE__' => 'App\Controller',
												'controller' => 'ServiceLoginAuth',
												'action' => 'logout' 
										) 
								) 
						) 
				) 
		),
		'service_manager' => array(
				'abstract_factories' => array(
						'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
						'Zend\Log\LoggerAbstractServiceFactory',
				),
				'factories' => array(
						'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
				),
		),
		'view_manager' => array (
				'display_not_found_reason' => true,
				'display_exceptions'       => true,
				'doctype'                  => 'HTML5',
				'not_found_template'       => 'error/404',
				'exception_template'       => 'error/index',
				'template_map' => array(
						'App/layout' 			  	=> __DIR__ . '/../view/layout/layout.phtml',
						'App/layout_auth' 			=> __DIR__ . '/../view/layout/layout_auth.phtml',
						'layout/layout'           	=> __DIR__ . '/../view/layout/layout.phtml',
						'navigation' 				=> __DIR__ . '/../view/navigation/navigation.phtml',
						'app/index/index' 			=> __DIR__ . '/../view/app/index/index.phtml',
						'error/404'               	=> __DIR__ . '/../view/error/404.phtml',
						'error/index'             	=> __DIR__ . '/../view/error/index.phtml',
						
				),
				'template_path_stack' => array(
						'app' => __DIR__ . '/../view',
				),
// 				'template_path_stack' => array (
// 						'user' => __DIR__ . '/../view' 
// 				),
// 				'template_map' => array (
// 						'App/layout' => __DIR__ . '/../view/layout/layout_auth.phtml' 
// 				),
				'strategies' => array (
						'ViewJsonStrategy' 
				) 
		),
		'module_config' => array (
				'website_name' => 'http://'.$_SERVER['SERVER_NAME'],//'http://tmp.imprimvert.fr',
				'quizz_location' => 'public/ressources_bo_webapp/quizz_resources/xls_files',
				
		),
		/**
		 * Configuration doctrine
		 */
		'doctrine' => array (
				'driver' => array (
						__NAMESPACE__ . '_driver' => array (
								'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
								'cache' => 'array',
								'paths' => array (
										__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'
								)
						),
						'orm_default' => array (
								'drivers' => array (
										__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
								)
						)
				),
				'authentication' => array (
						'orm_default' => array (
								'object_manager' => 'Doctrine\ORM\EntityManager',
								'identity_class' => 'App\Entity\QAdmin',
								'identity_property' => 'login',
								'credential_property' => 'password',
								'credential_callable' => function (Entity\QAdmin $user, $passwordGiven) {
									
									if ($user->getPassword () == md5 ( $passwordGiven )) {
										return true;
									}
									return false;
								} 
						) 
				) 
		) 
);