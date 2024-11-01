<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}



	
$spcdm_ajax_wrapper = new sp_cdm_ajax_wrapper;	


add_action('plugins_loaded', array($spcdm_ajax_wrapper, 'init'));

class sp_cdm_ajax_wrapper{
		
		function init(){
			if ( ! did_action( 'init' ) ) {
add_action( 'wp_ajax_cdm_file_permissions', array($this, 'file_permissions'));
add_action( 'wp_ajax_nopriv_cdm_file_permissions',array($this, 'file_permissions'));

add_action( 'wp_ajax_cdm_folder_permissions', array($this, 'folder_permissions'));
add_action( 'wp_ajax_nopriv_cdm_folder_permissions',array($this, 'folder_permissions'));

add_action( 'wp_ajax_cdm_project_dropdown', array($this, 'project_dropdown'));
add_action( 'wp_ajax_nopriv_cdm_project_dropdown',array($this, 'project_dropdown'));

add_action( 'wp_ajax_cdm_delete_file', array($this, 'delete_file'));


add_action( 'wp_ajax_cdm_file_info', array($this, 'file_info'));
add_action( 'wp_ajax_nopriv_cdm_file_info',array($this, 'file_info'));

add_action( 'wp_ajax_cdm_remove_category', array($this, 'remove_category'));


add_action( 'wp_ajax_cdm_save_category', array($this, 'save_category'));

add_action( 'wp_ajax_cdm_view_file', array($this, 'view_file'));
add_action( 'wp_ajax_nopriv_cdm_view_file',array($this, 'view_file'));

add_action( 'wp_ajax_cdm_file_list', array($this, 'file_list'));
add_action( 'wp_ajax_nopriv_cdm_file_list',array($this, 'file_list'));

add_action( 'wp_ajax_cdm_thumbnails', array($this, 'thumbnails'));
add_action( 'wp_ajax_nopriv_cdm_thumbnails',array($this, 'thumbnails'));

add_action( 'wp_ajax_cdm_email_vendor', array($this, 'email_vendor'));



add_action( 'wp_ajax_cdm_add_breadcrumb', array($this, 'add_breadcrumb'));
add_action( 'wp_ajax_nopriv_cdm_add_breadcrumb',array($this, 'add_breadcrumb'));	
				

	add_action( 'wp_ajax_cdm_community_login', array($this, 'login'));
	add_action( 'wp_ajax_nopriv_cdm_community_login',array($this, 'login'));		
	
	add_action( 'wp_ajax_cdm_community_logout', array($this, 'logout'));
	
	
	add_action( 'wp_ajax_cdm_community', array($this, 'reset_password'));
	add_action( 'wp_ajax_nopriv_cdm_community_reset_password',array($this, 'reset_password'));		
	
	add_action( 'wp_ajax_cdm_community_new_password', array($this, 'new_password'));
	add_action( 'wp_ajax_nopriv_cdm_community_new_password',array($this, 'new_password'));	
	
	add_action( 'wp_ajax_cdm_community_register', array($this, 'register'));
	add_action( 'wp_ajax_nopriv_cdm_community_register',array($this, 'register'));	
				
			}
		}
		
		
	
			function login(){
		$spcdm_ajax = new spdm_ajax;	
		$spcdm_ajax->login($_POST);
		die();	
		}
		function logout(){
		$spcdm_ajax = new spdm_ajax;	
		$spcdm_ajax->logout();
		die();	
		}
		function reset_password(){
		$spcdm_ajax = new spdm_ajax;	
		$spcdm_ajax->reset_password($_POST);
		die();	
		}
		
	
		function register(){
		$spcdm_ajax = new spdm_ajax;	
		$spcdm_ajax->register($_POST);
		die();	
		}
	
		function add_breadcrumb(){
			
			$spdm_sub_projects_new = new spdm_sub_projects_new;
			
			echo   cdm_esc_html($spdm_sub_projects_new->getBreadCrumb());
			die();
		
		}
		function file_permissions(){
			$spcdm_ajax = new spdm_ajax;
			
				echo intval(cdm_file_permissions(intval(cdm_var('pid') )));
				
				die();
		}
		
		function folder_permissions(){
			$spcdm_ajax = new spdm_ajax;
			
			echo intval(cdm_folder_permissions(intval(cdm_var('pid') )));
			die();
			
		}
		function project_dropdown(){
			$spcdm_ajax = new spdm_ajax;
			
			echo cdm_esc_html($spcdm_ajax->project_dropdown());
			die();
		}
		
		function delete_file(){
			$spcdm_ajax = new spdm_ajax;
			
			echo cdm_esc_html($spcdm_ajax->delete_file());	
			die();
		}
		function file_info(){
			$spcdm_ajax = new spdm_ajax;
			
			echo cdm_esc_html($spcdm_ajax->get_file_info());	
			die();
		}
	
		function remove_category(){
			$spcdm_ajax = new spdm_ajax;
			
			echo cdm_esc_html($spcdm_ajax->remove_cat(intval(cdm_var('id'))));
			die();
		}
		function save_category(){
		check_ajax_referer( 'cdm_save_category', 'nonce' );	
			
		$spcdm_ajax = new spdm_ajax;
			
			echo cdm_esc_html($spcdm_ajax->save_cat(intval(cdm_var('uid') )));
			die();
		}
		function view_file(){
			$spcdm_ajax = new spdm_ajax;
		
			echo cdm_esc_html($spcdm_ajax->view_file(cdm_var('id')));	
				
			die();
		}
		function file_list(){
			$spcdm_ajax = new spdm_ajax;
			
		if(get_option('sp_cdm_use_old_file_list') != 1){
		$file_list = 	new cdm_community_file_list;
		$file_list->view();
		}else{
			echo cdm_esc_html($spcdm_ajax->file_list());	
		}
			die();
			
		}
		function thumbnails(){
			$spcdm_ajax = new spdm_ajax;
			
			echo cdm_esc_html($spcdm_ajax->thumbnails());		
			die();
		}
	
		function email_vendor(){
			$spcdm_ajax = new spdm_ajax;
			
			echo cdm_esc_html($spcdm_ajax->email_vendor());					
			die();
		}	
		function project_name(){
			$spcdm_ajax = new spdm_ajax;
			
			echo cdm_esc_html($spcdm_ajax->email_vendor());					
			die();
		}
	}
	
	