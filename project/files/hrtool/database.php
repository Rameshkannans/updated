<?php

class Database {

	public $conn;

	// DATABASE CONNECTION
	public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        echo "Database Connection Successfully"."<br>";
        $this->createDatabase($dbname);
        $this->conn->select_db($dbname);
    }

    // DATABSE CREATION
    private function createDatabase($dbname) {
        $dbcreate = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($this->conn->query($dbcreate) === TRUE) {
            echo "Database created successfully"."<br>";
        } else {
            echo "Error creating database: " . $this->conn->error;
        }
    }

    // USER REGISTER TABLE CREATION
    public function createusertable($user_table) {
        if ($this->conn->query($user_table) === TRUE) {
            echo "Table created successfully"."<br>";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

     // JOB  NOTIFICATION TABLE CREATION
    public function createjobnotitable($jobnoti_table) {
        if ($this->conn->query($jobnoti_table) === TRUE) {
            echo "Table created successfully"."<br>";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    // APPLICATION TABLE CREATION
    public function createapptable($app_table) {
        if ($this->conn->query($app_table) === TRUE) {
           	echo "Table created successfully"."<br>";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    // JOINING TABLE CREATION
    public function createjointable($join_table) {
        if ($this->conn->query($join_table) === TRUE) {
           	echo "Table created successfully"."<br>";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    // EMPLOYEE TABLE CREATION
    public function createemptable($emp_table){
        if ($this->conn->query($emp_table) === TRUE) {
           	echo "Table created successfully"."<br>";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }
}


// DATABASE CONNECTION AND CREATION
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "management";
$hrtable = new Database($servername, $username, $password, $dbname);


// USER REGISTER TABLE
$user_table = "CREATE TABLE IF NOT EXISTS user_table (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    last_name VARCHAR(50),
    primary_contact VARCHAR(15),
    secondary_contact VARCHAR(15),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    confirm_password VARCHAR(255),
    db_storage_path1 VARCHAR(255),
    db_storage_path2 VARCHAR(255),
    db_storage_path3 VARCHAR(255),
    gender VARCHAR(50),
    state VARCHAR(50),
    city VARCHAR(50),
    nationality VARCHAR(50),
    school_10th_name VARCHAR(100),
    school_10th_year INT,
    school_10th_percentage DECIMAL(5, 2),
    school_12th_name VARCHAR(100),
    school_12th_year INT,
    school_12th_percentage DECIMAL(5, 2),
    college_name VARCHAR(100),
    university_name VARCHAR(100),
    graduation_percentage DECIMAL(5, 2),
    graduation_year INT,
    stream VARCHAR(50),
    experience INT,
    skills TEXT,
    certifications TEXT,
    languages TEXT,
    backlog INT,
    no_of_expe INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$hrtable->createusertable($user_table);



// JOB NOTIFICATION
$jobnoti_table = "CREATE TABLE IF NOT EXISTS jobnoti_table (
    job_noti_id INT PRIMARY KEY AUTO_INCREMENT,
    job_title VARCHAR(255) NOT NULL,
    openings INT NOT NULL,
    experience VARCHAR(100),
    description TEXT,
    no_of_exp INT,
    location VARCHAR(255),
    app_start_date DATE,
    app_end_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$hrtable->createjobnotitable($jobnoti_table);




// APPLICATION TABLE CREATION
$app_table = "CREATE TABLE IF NOT EXISTS app_table (
    app_id INT AUTO_INCREMENT PRIMARY KEY,
    auser_id INT NOT NULL,
    ajob_noti_id INT NOT NULL,
    arelevent_experience VARCHAR(255),
    pre_salary VARCHAR(20), 
    expected_salary VARCHAR(20),
    aresume VARCHAR(255),
    astatus VARCHAR(50),
    anotice_period INT,
    acreated_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$hrtable->createapptable($app_table);


// JOINING TABLE CREATION
$join_table = "CREATE TABLE IF NOT EXISTS join_table (
    joining_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    first_name VARCHAR(30),
    last_name VARCHAR(20),
    phone_number VARCHAR(15),
    whatsapp_number VARCHAR(15),
    reference_number VARCHAR(15), 
    10th_mark_sheet VARCHAR(255),
    12th_mark_sheet VARCHAR(255),
    ug_certificate VARCHAR(255),
    pg_certificate VARCHAR(255),
    aadhar_card VARCHAR(255),
    pan_card VARCHAR(255),
    photo VARCHAR(255),
    signature VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$hrtable->createjointable($join_table);


// EMPLOYEE TABLE CREATION
$emp_table = "CREATE TABLE IF NOT EXISTS emp_table (
	emp_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    joining_id INT,
    pro_detail VARCHAR(255),
    team_members VARCHAR(255),
    work_hours VARCHAR(255),
    attendance VARCHAR(255),
    training VARCHAR(255),
    performance VARCHAR(255),
    appraisal VARCHAR(255),
    rewards VARCHAR(255),
    work_details TEXT,
    shift_details VARCHAR(100),
    social_medias VARCHAR(255),
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$hrtable->createemptable($emp_table);


?>