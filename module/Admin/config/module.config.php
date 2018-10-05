<?php

namespace Admin;

return array (
		'controllers' => array (
				'invokables' => array (
						'Admin\Controller\Index' => 'Admin\Controller\IndexController'
				)
		),
		'router' => array (
				'routes' => array (
// 						'Dashboard' => array (
// 								'type' => 'literal',
// 								'options' => array (
// 										'route' => '/index',
// 										'defaults' => array (
// 												'__NAMESPACE__' => 'Admin\Controller',
// 												'controller' => 'Index',
// 												'action' => 'Index'
// 										)
// 								)
// 						)
				)
		),
		'view_manager' => array (
				'template_path_stack' => array (
						'admin' => __DIR__ . '/../view'
				),
				'strategies' => array (
						'ViewJsonStrategy'
				)
		),
		/**
		 * La configuration doctrine pour le module Admin
		 */
		'doctrine' => array (
				/* 'driver' => array (
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
				) */ 
		) 
);