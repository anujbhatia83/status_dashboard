<?php

// application/controllers/LoginController.class.php
class EmployeeController extends Controller{

    public function teamAction($team) {

        
        //define("TEAM_NAME", $team);
        $_SESSION['team_name'] = $team;

        $this->indexAction($_SESSION['team_name']);
        exit;
        

    }

    public function homeAction() {
        $employeeModel = new EmployeeModel('business_solutions');

        $employees = $employeeModel->getEmployees();
        $absentEmployees = $employeeModel->getAbsentEmployees();

        $locations = array(
            'Mac Arthur Avenue',
            'Pandanus Building A',
            'Pandanus Building B',
            'Pandanus Building C',
            'Da Vinci Building',
            'Working from Home',
            'Sick Leave',
            'Annual Leave',
            'Sydney - Bankstown', 
            'Sydney - Richmond',
            'New Zealand - Auckland',
            'New Zealand - Blenheim',
            'AH'
            );
        //print_r($locations); exit;
        
        include  CURR_VIEW_PATH ."home.php";
        exit();
    }

    public function indexAction($team_name){

        
        $employeeModel = new EmployeeModel($team_name);

        $employees = $employeeModel->getEmployees();
        $absentEmployees = $employeeModel->getAbsentEmployees();

        $locations = array(
            'Mac Arthur Avenue',
            'Pandanus Building A',
            'Pandanus Building B',
            'Pandanus Building C',
            'Da Vinci Building',
            'Working from Home',
            'Sick Leave',
            'Annual Leave',
            'Sydney - Bankstown', 
            'Sydney - Richmond',
            'New Zealand - Auckland',
            'New Zealand - Blenheim',
            'AH'
            );
        //print_r($locations); exit;

        include  CURR_VIEW_PATH ."status.php";
		exit();


    }

    public function updateEmployeeAction() {


    		$id = $_POST['id'];
            $location = $_POST['location'];
            $status = ($_POST['status'] == "off" ? 1 : 0);
            $all_day = ($_POST['all_day'] == "yes" ? 1 : 0);
            $date_in = date('Y-m-d', strtotime( str_replace('/', '-', $_POST['date_in'])));
            $date_out = date('Y-m-d', strtotime( str_replace('/', '-', $_POST['date_out'])));

            // echo $date_in; exit;

			$employeeModel = new EmployeeModel($_SESSION['team_name']);
			$updated = $employeeModel->updateEmployee($id, $location, $status, $all_day, $date_in, $date_out);

            if($location == 'Mac Arthur Avenue' || $location == 'Pandanus Building A' || $location == 'Da Vinci Building' || $location == 'Pandanus Building B' || $location == 'Pandanus Building C' ){
                $deleted = $employeeModel->resetDates($id);
                }            

            header("Location:index.php?c=Employee&a=team&team_name=".$_SESSION['team_name']); die;
            exit();

		// 	if($updated) {
		// 		$result = array('updated' => 'Y');	
		// 	} else {
		// 		$result = array('updated' => 'N');	
		// 	}

  //   	header('Content-Type: application/json');
		// die (json_encode($result));
	}

}