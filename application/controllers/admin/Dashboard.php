<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
	    $this->load->model("admin_dashboard_model");
	    $latest_deposits = $this->admin_dashboard_model->get_latest_deposits();
	    
	    //pending deposits
	    $pending_deposits = $this->admin_dashboard_model->get_deposit_count(1);
	    
	    //completed deposits
	    $completed_deposits = $this->admin_dashboard_model->get_deposit_count(2);
	    
	    //completed deposits total
	    $sum_deposits = $this->admin_dashboard_model->get_deposit_total(2);
	    
	    //completed deposits total
	    $sum_pending_deposits = $this->admin_dashboard_model->get_deposit_total(1);
	    
	    //total users
	    $total_users = $this->admin_dashboard_model->get_total_users();
	    
	    //suspicous spins
	    $sus_spins = $this->admin_dashboard_model->get_suspicious_spins();
	    

	    $data['latest_deposits'] = $latest_deposits;
	    $data['pending_deposits_count'] = $pending_deposits[0]['count'];
	    $data['completed_deposits_count'] = $completed_deposits[0]['count'];
	    $data['sum_completed_deposits'] = $sum_deposits[0]['amount'];
	    $data['sum_pending_deposits'] = $sum_pending_deposits[0]['amount'];
	    $data['total_users'] = $total_users[0]['count'];
	    $data['susp_spins'] = $sus_spins[0]['count'];
		$this->load->view('admin/dashboard.php', $data);
	}
	
	function users(){
	    $data = array();
	    $this->load->view('admin/users.php', $data);
	}
	
	function settings(){
	    $this->load->model("admin_dashboard_model");
	    $admin_email = $this->admin_dashboard_model->get_admin_email();
	    $data = array();
	    $data['admin_email'] = $admin_email[0]["admin_email"];
	    
	    
	    $this->load->view('admin/admin_form.php', $data);
	}
	
	function update_password(){
	    $this->load->model("authentication_model");
	    $password_update = $this->authentication_model->update_admin_password($_POST);

	    
	    if($password_update == 'done'){
	        $response = array(
						   "code"=>1,
						   "response"=>"Data Saved",
						   "desc"=>"password saved");
	    }else{
	        $response = array(
						   "code"=>2,
						   "response"=>"Data Not Saved",
						   "desc"=>"Password Not saved. ");
	    }
	    
	    echo json_encode($response);
		return;
	}
}
