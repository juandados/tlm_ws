<?php
$servername = "mysql.yohosts.info";
$username = "u256185540_juan";
$password = "password";
$dbname = "u256185540_diary";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Conexion exitosa. <br>" ;
}

// sql to create table Usuarios
$sql = "CREATE TABLE usuario (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
pseudo VARCHAR(30) NOT NULL,
sexo VARCHAR(30) NOT NULL,
dependecia VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table usuario created successfully. <br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}

// sql to create table Preguntas
$sql = "CREATE TABLE pregunta (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
contenido VARCHAR(300) NOT NULL,
tipologia VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

    

if ($conn->query($sql) === TRUE) {
    echo "Table pregunta created successfully. <br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}

// sql to create table Preguntas
$sql = "CREATE TABLE respuesta (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
usuario INT(6) UNSIGNED,
pregunta INT(6) UNSIGNED,
contenido VARCHAR(300) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table respuesta created successfully. <br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}



$conn->close();
?>