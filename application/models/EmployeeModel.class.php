<?php

// application/models/UserModel.class.php

class EmployeeModel extends Model{

    public function getEmployees(){

        $sql = "select * from ".$this->table." where location in ('Mac Arthur Avenue', 'Da Vinci Building', 'Pandanus Building A', 'Pandanus Building B', 'Pandanus Building C', 'Working from Home') order by name";

        $employees = $this->db->getAll($sql);

        return $employees;

    }

    public function getAbsentEmployees(){

        $sql = "select * from ".$this->table." where location not in ('Mac Arthur Avenue', 'Da Vinci Building', 'Pandanus Building A', 'Pandanus Building B', 'Pandanus Building C', 'Working from Home') order by name";

        $absentEmployees = $this->db->getAll($sql);

        return $absentEmployees;

    }    

    public function updateEmployee($id, $location, $status, $all_day, $date_in, $date_out) {

    	$sql = "update ".$this->table." set location='".$location."', status='".$status."', all_day='".$all_day."', date_in='".$date_in."', date_out='".$date_out."'where id=".$id;

    	$result = $this->db->query($sql);

        return $result;

    }

    public function resetDates($id) {

        $sql = "update ".$this->table." set date_in= NULL, date_out = NULL where id=".$id;

        $result = $this->db->query($sql);

        return $result;

    }

}