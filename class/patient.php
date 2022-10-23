<?php
    class Patient{
        // Connection
        private $conn;
        // Table
        private $db_table = "Patient";
        // Columns
		public $name;
		public $id;
		public $address;
		public $birth_date;
		public $phone;
		public $mobile;
		public $vaccine_1;
		public $vaccine_2;
		public $vaccine_3;
		public $vaccine_4;
		public $vaccine_1_comp;
		public $vaccine_2_comp;
		public $vaccine_3_comp;
		public $vaccine_4_comp;
		public $positive_date;
		public $negative_date;
		
        // DB connection
        public function __construct($db){
            $this->conn = $db;
        }
		
        // GET ALL
        public function getPatients(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
		
        // CREATE
        public function createPatient(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
					name = :name,
					id = :id,
					address = :address,
					birth_date = :birth_date,
					phone = :phone,
					mobile = :mobile,
					vaccine_1 = :vaccine_1,
					vaccine_2 = :vaccine_2,
					vaccine_3 = :vaccine_3,
					vaccine_4 = :vaccine_3,
					vaccine_1_comp = :vaccine_1_comp,
					vaccine_2_comp = :vaccine_2_comp,
					vaccine_3_comp = :vaccine_3_comp,
                    vaccine_4_comp = :vaccine_4_comp,
					positive_date = :positive_date,
					negative_date = :negative_date";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->address = htmlspecialchars(strip_tags($this->address));
			$this->birth_date = htmlspecialchars(strip_tags($this->birth_date));
			$this->phone = htmlspecialchars(strip_tags($this->phone));
			$this->mobile = htmlspecialchars(strip_tags($this->mobile));
			$this->vaccine_1 = htmlspecialchars(strip_tags($this->vaccine_1));
			$this->vaccine_2 = htmlspecialchars(strip_tags($this->vaccine_2));
			$this->vaccine_3 = htmlspecialchars(strip_tags($this->vaccine_3));
			$this->vaccine_4 = htmlspecialchars(strip_tags($this->vaccine_4));
			$this->vaccine_1_comp = htmlspecialchars(strip_tags($this->vaccine_1_comp));
			$this->vaccine_2_comp = htmlspecialchars(strip_tags($this->vaccine_2_comp));
			$this->vaccine_3_comp = htmlspecialchars(strip_tags($this->vaccine_3_comp));
			$this->vaccine_4_comp = htmlspecialchars(strip_tags($this->vaccine_4_comp));
			$this->positive_date = htmlspecialchars(strip_tags($this->positive_date));
			$this->negative_date = htmlspecialchars(strip_tags($this->negative_date));
        
            // bind data			
			$stmt->bindParam(':name',$this->name);
			$stmt->bindParam(':id',$this->id);
			$stmt->bindParam(':address',$this->address);
			$stmt->bindParam(':birth_date',$this->birth_date);
			$stmt->bindParam(':phone',$this->phone);
			$stmt->bindParam(':mobile',$this->mobile);
			$stmt->bindParam(':vaccine_1',$this->vaccine_1);
			$stmt->bindParam(':vaccine_2',$this->vaccine_2);
			$stmt->bindParam(':vaccine_3',$this->vaccine_3);
			$stmt->bindParam(':vaccine_4',$this->vaccine_4);
			$stmt->bindParam(':vaccine_1_comp',$this->vaccine_1_comp);
			$stmt->bindParam(':vaccine_2_comp',$this->vaccine_2_comp);
			$stmt->bindParam(':vaccine_3_comp',$this->vaccine_3_comp);
			$stmt->bindParam(':vaccine_4_comp',$this->vaccine_4_comp);
			$stmt->bindParam(':positive_date',$this->positive_date);
			$stmt->bindParam(':negative_date',$this->negative_date);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
		
        // READ single
        public function getSinglePatient(){
            $sqlQuery = "SELECT * FROM ". $this->db_table ." WHERE id = ? LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
			$this->name = $dataRow['name'];
			$this->id = $dataRow['id'];
			$this->address = $dataRow['address'];
			$this->birth_date = $dataRow['birth_date'];
			$this->phone = $dataRow['phone'];
			$this->mobile = $dataRow['mobile'];
			$this->vaccine_1 = $dataRow['vaccine_1'];
			$this->vaccine_2 = $dataRow['vaccine_2'];
			$this->vaccine_3 = $dataRow['vaccine_3'];
			$this->vaccine_4 = $dataRow['vaccine_4'];
			$this->vaccine_1_comp = $dataRow['vaccine_1_comp'];
			$this->vaccine_2_comp = $dataRow['vaccine_2_comp'];
			$this->vaccine_3_comp = $dataRow['vaccine_3_comp'];
			$this->vaccine_4_comp = $dataRow['vaccine_4_comp'];
			$this->positive_date = $dataRow['positive_date'];
			$this->negative_date = $dataRow['negative_date'];
        }     
		
        // UPDATE
        public function updatePatient(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
						name = :name,
						id = :id,
						address = :address,
						birth_date = :birth_date,
						phone = :phone,
						mobile = :mobile,
						vaccine_1 = :vaccine_1,
						vaccine_2 = :vaccine_2,
						vaccine_3 = :vaccine_3,
						vaccine_4 = :vaccine_3,
						vaccine_1_comp = :vaccine_1_comp,
						vaccine_2_comp = :vaccine_2_comp,
						vaccine_3_comp = :vaccine_3_comp,
						vaccine_4_comp = :vaccine_4_comp,
						positive_date = :positive_date,
						negative_date = :negative_date
                    WHERE 
                        key = :key";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->address = htmlspecialchars(strip_tags($this->address));
			$this->birth_date = htmlspecialchars(strip_tags($this->birth_date));
			$this->phone = htmlspecialchars(strip_tags($this->phone));
			$this->mobile = htmlspecialchars(strip_tags($this->mobile));
			$this->vaccine_1 = htmlspecialchars(strip_tags($this->vaccine_1));
			$this->vaccine_2 = htmlspecialchars(strip_tags($this->vaccine_2));
			$this->vaccine_3 = htmlspecialchars(strip_tags($this->vaccine_3));
			$this->vaccine_4 = htmlspecialchars(strip_tags($this->vaccine_4));
			$this->vaccine_1_comp = htmlspecialchars(strip_tags($this->vaccine_1_comp));
			$this->vaccine_2_comp = htmlspecialchars(strip_tags($this->vaccine_2_comp));
			$this->vaccine_3_comp = htmlspecialchars(strip_tags($this->vaccine_3_comp));
			$this->vaccine_4_comp = htmlspecialchars(strip_tags($this->vaccine_4_comp));
			$this->positive_date = htmlspecialchars(strip_tags($this->positive_date));
			$this->negative_date = htmlspecialchars(strip_tags($this->negative_date));
        
            // bind data			
			$stmt->bindParam(':name',$this->name);
			$stmt->bindParam(':id',$this->id);
			$stmt->bindParam(':address',$this->address);
			$stmt->bindParam(':birth_date',$this->birth_date);
			$stmt->bindParam(':phone',$this->phone);
			$stmt->bindParam(':mobile',$this->mobile);
			$stmt->bindParam(':vaccine_1',$this->vaccine_1);
			$stmt->bindParam(':vaccine_2',$this->vaccine_2);
			$stmt->bindParam(':vaccine_3',$this->vaccine_3);
			$stmt->bindParam(':vaccine_4',$this->vaccine_4);
			$stmt->bindParam(':vaccine_1_comp',$this->vaccine_1_comp);
			$stmt->bindParam(':vaccine_2_comp',$this->vaccine_2_comp);
			$stmt->bindParam(':vaccine_3_comp',$this->vaccine_3_comp);
			$stmt->bindParam(':vaccine_4_comp',$this->vaccine_4_comp);
			$stmt->bindParam(':positive_date',$this->positive_date);
			$stmt->bindParam(':negative_date',$this->negative_date);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deletePatient(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
