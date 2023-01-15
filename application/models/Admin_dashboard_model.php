<?php
class Admin_dashboard_model extends CI_Model {
    
	function get_latest_deposits(){
		$mysqli = get_mysqli();
		$sql = "SELECT deposits2.*, clients.client_name FROM deposits2 LEFT JOIN clients ON clients.client_id = deposits2.user_id  WHERE status_id = 2 ORDER BY created_at DESC LIMIT 0, 10";
       
       if(!$result = $mysqli->query($sql)){
            die('Unable to run  query. There was an error running the query [' . $mysqli->error . ']');
        }
		$data = array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			//var_dumb($row);
			//print_r($row);
			array_push($data, $row);
		}
        
        return $data;
	}
	
	function get_deposit_count($status){
	    $mysqli = get_mysqli();
		$sql = "SELECT COUNT(deposits2.id) as count FROM deposits2  WHERE status_id = $status";
       
       if(!$result = $mysqli->query($sql)){
            die('Unable to run  query. There was an error running the query [' . $mysqli->error . ']');
        }
		$data = array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$data[] = $row;
		}
        
        return $data;
	}
	
	
	function get_deposit_total($status){
	    $mysqli = get_mysqli();
		$sql = "SELECT SUM(deposits2.amount) as amount FROM deposits2  WHERE status_id = $status";
       
       if(!$result = $mysqli->query($sql)){
            die('Unable to run  query. There was an error running the query [' . $mysqli->error . ']');
        }
		$data = array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$data[] = $row;
		}
        
        return $data;
	}
	
	function get_total_users(){
	     $mysqli = get_mysqli();
		$sql = "SELECT COUNT(clients.client_id) as count FROM clients";
       
       if(!$result = $mysqli->query($sql)){
            die('Unable to run  query. There was an error running the query [' . $mysqli->error . ']');
        }
		$data = array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$data[] = $row;
		}
        
        return $data;
	}
	
	function get_suspicious_spins(){
	     $mysqli = get_mysqli();
		$sql = "SELECT COUNT(suspicious_spins.id) as count FROM suspicious_spins";
       
       if(!$result = $mysqli->query($sql)){
            die('Unable to run  query. There was an error running the query [' . $mysqli->error . ']');
        }
		$data = array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$data[] = $row;
		}
        
        return $data;
	}
	
	function get_admin_email(){
	    $mysqli = get_mysqli();
		$sql = "SELECT admin_email from admin WHERE 1";
       
       if(!$result = $mysqli->query($sql)){
            die('Unable to run  query. There was an error running the query [' . $mysqli->error . ']');
        }
		$data = array();
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$data[] = $row;
		}
        
        return $data;
	}

}

?>