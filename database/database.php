<?php
class database{
    private $host;
    private $dbname;
    private $dbpassword;
    private $dbusername;    //creating private variable for database connectivity

    protected function connect(){
        $this->host = 'localhost';   //assign values of the varibles 
        $this->dbusername = 'root';
        $this->dbpassword = "";
        $this->dbname = "result";

        $conn = mysqli_connect($this->host,$this->dbusername,$this->dbpassword,$this->dbname);
        return $conn;

    }


}

class query extends database{            //query is using the properties of database class
    public function getdata($field,$table,$condition_arr,$order_by,$order_by_type,$limit){        //function for select data
        $sql = "select $field from $table";    //default select query 
        if($condition_arr != ''){
            $i = 1;
            $c = count($condition_arr);     //where condition array
            $sql.=" where ";
             foreach ($condition_arr as $key => $val) {
                if($i==$c){
					$sql.="$key='$val'";
				}else{
					$sql.="$key='$val' and ";
				}
                $i++;
            }
        }
        if($order_by!=''){
            $sql.="orderby $order_by $order_by_type";    //orderby and orderby type
        }
        if($limit!=''){
            $sql.="limit $limit";         //set limit
        }

        $result = $this->connect()->query($sql);     //executing the query
        if($result->num_rows>0){                
            $arr = array();                      //creating array
            while ($row = $result->fetch_assoc()) {    //fetching the data 
                $arr[]=$row;                             //assign the selected data in array
            } 
            return $arr;                                 //returning the array
        }else{
            $arr = array();
            return $arr;
        }
    }

    public function insert($table, $item_array){       //insert function
        if($item_array != ''){                              
            foreach($item_array as $key=>$val){          //getting the values of items to be insert
                $keyArr[] = $key;     
                $valArr[] = $val;
            }
            $field = implode(",",$keyArr);
			$value=implode("','",$valArr); 
            $value="'".$value."'";

            $sql = "Insert into $table ($field) values($value);";  
            $result = $this->connect()->query($sql);
        }

    }

    public function deletedata($table,$condition_arr){
        if($condition_arr!=''){
            $sql = "delete from $table where ";
            $i = 1;
            $c = count($condition_arr);     //where condition array
             foreach ($condition_arr as $key => $val) {
                if($i==$c){
					$sql.="$key='$val'";
				}else{
					$sql.="$key='$val' and ";
				}
                $i++;
            }
            $result = $this->connect()->query($sql);


        }

    }
    public function updateData($table,$items_arr,$where_field,$where_value){
		if($items_arr!=''){
			$sql="update $table set ";
			$c=count($items_arr);	
			$i=1;
			foreach($items_arr as $key=>$val){
				if($i==$c){
					$sql.="$key='$val'";
				}else{
					$sql.="$key='$val', ";
				}
				$i++;
			}
			$sql.=" where $where_field='$where_value' ";
			$result=$this->connect()->query($sql);
		}
	}

    public function get_safe_str($str){

        if($str!=''){
            return mysqli_real_escape_string($this->connect(),$str);
        }

    }
    public function upload_file($tempname,$folder){
        move_uploaded_file($tempname,$folder);
    }
    public function grade($marks){
        if ($marks>90) {
            return "AA";
        }
        elseif($marks>=80 && $marks<90){
            return  "A+";
        }
        elseif($marks>=70 && $marks<80){
            return  "A";
        }
        elseif($marks>=60 && $marks=70){
            return  "B+";
        }
        elseif($marks>=55 && $marks<60){
            return "B";
        }
        elseif($marks>=50 && $marks<55){
            return  "C";
        }
        else{
            return "D";
        }
    }


    //select * from table where condition orderby desc limit 1

}


?>