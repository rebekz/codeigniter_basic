<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file
 *
 * Configuration for ACL permissions
 *
 */

/**
 * 10 admin
 * 7 editor
 * 4 author
 * 2 writer
 * 1 user
 * Each controller or action must have add, edit own, edit all, delete own and delete all
 */

$config['modules'] = array(
							   'users' => array(
												  'meta' => array(
												  		  'parent' => 'Users',
														  'links' => array ('users/view'),
														  'names' => array ('Manejemen Users'),
														  'perms' => array ('view')
													),
												  'permission' => array (
												  		  'view' => array('10'),	   
														  'add' => array('10'),
														  'edit own' => array('1'),
														  'edit all' => array('10'),
														  'delete own' => array('10'),
														  'delete all' => array('10')
													 )													 
								),
							   'berita' => array(
												  'meta' => array(
												  		  'parent' => 'Pemberitahuan',
														  'links' => array ('berita/view', 'berita/add'),
														  'names' => array ('Semua Pemberitahuan', 'Tambah Pemberitahuan'),
														  'perms' => array ('view','add')
													),
												  'permission' => array (
												  		  'view' => array('7'),	   
														  'add' => array('7'),
														  'edit own' => array('1'),
														  'edit all' => array('10'),
														  'delete own' => array('2'),
														  'delete all' => array('10')
													 )													 
								),
							   'pelapor' => array(
												  'meta' => array(
												  		  'parent' => 'Pelapor',
														  'links' => array ('pelapor/view', 'pelapor/unitkerja', 'pelapor/add'),
														  'names' => array ('Semua Pelapor', 'Semua Unit Kerja', 'Tambah Pelapor'),
														  'perms' => array ('view','add','add')
													),
												  'permission' => array (
												  		  'view' => array('4'),	   
														  'add' => array('7'),
														  'edit own' => array('1'),
														  'edit all' => array('7'),
														  'delete own' => array('2'),
														  'delete all' => array('7')
													 )													 
								),
							   'bangunan' => array(
												  'meta' => array(
												  		  'parent' => 'Data Bangunan',
														  'links' => array ('bangunan/view', 'bangunan/add'),
														  'names' => array ('Semua Data Bangunan', 'Tambah Data Bangunan'),
														  'perms' => array ('view','add')
													),
												  'permission' => array (
												  		  'view' => array('4'),	   
														  'add' => array('7'),
														  'edit own' => array('1'),
														  'edit all' => array('10'),
														  'delete own' => array('2'),
														  'delete all' => array('10')
													 )													 
								),
							   'pembangunan' => array(
												  'meta' => array(
												  		  'parent' => 'Progress Pembangunan',
														  'links' => array ('pembangunan/view', 'pembangunan/add'),
														  'names' => array ('Semua Progress Pembangunan', 'Tambah Progress Pembangunan'),
														  'perms' => array ('view','add')
													),
												  'permission' => array (
												  		  'view' => array('4'),	   
														  'add' => array('7'),
														  'edit own' => array('1'),
														  'edit all' => array('10'),
														  'delete own' => array('2'),
														  'delete all' => array('10')
													 )													 
								),	
							   'alat' => array(
												  'meta' => array(
												  		  'parent' => 'Progress Pengadaan Alat',
														  'links' => array ('alat/view', 'alat/add'),
														  'names' => array ('Semua Progress Pengadaan Alat', 'Tambah Progress Pemberitahuan'),
														  'perms' => array ('view','add')
													),
												  'permission' => array (
												  		  'view' => array('4'),	   
														  'add' => array('7'),
														  'edit own' => array('1'),
														  'edit all' => array('10'),
														  'delete own' => array('2'),
														  'delete all' => array('10')
													 )													 
								),				                                                             												  
					);

$config['menu_order'] = array('berita' => 'icon-drawer', 'pelapor' => 'icon-user', 'bangunan' => 'icon-calendar', 'pembangunan' => 'icon-folder-alt', 'alat' => 'icon-briefcase', 'users' => 'icon-users');

$config['role'] = array('10' => 'Admin', '7' => 'Editor', '4' => 'Author', '2' => 'Writer', '1' => 'User' );

/* End of applications/config/acl.php */