<?php
$servername = "localhost"; //"localhost"
$username = "root"; //"root"
$password = ""; //""
$dbname = "sun-glasses-shop"; //"sun-glasses-shop"

function connect() {
    $conn = new mysqli('localhost', "root", "", "sun-glasses-shop");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function init(){
    $conn = connect();
    $sql = "SELECT id, name FROM goods";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $out = array();
        while($row = $result->fetch_assoc()) {
           $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    $conn->close();
}

function selectOneGoods() {
    $conn = connect();
    $id = $_POST['gid'];
    $sql = "SELECT * FROM goods WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $out[$row["id"]] = $row;
        echo json_encode($row);
    } else {
        echo "0";
    }
    $conn->close();
}

function updateGoods() {
    $conn = connect();
    $id = $_POST['id'];
    $name = $_POST['gname'];
    $cost = $_POST['gcost'];
    $descr = $_POST['gdescr'];
    $ord = $_POST['gorder'];
    $img = $_POST['gimg'];

    $sql = "UPDATE goods SET name = '$name', cost = '$cost', description = '$descr', ord = '$ord', img = '$img' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "1 ";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
    writeJSON();
}

function newGoods() {
    $conn = connect();
    $name = $_POST['gname'];
    $cost = $_POST['gcost'];
    $descr = $_POST['gdescr'];
    $ord = $_POST['gorder'];
    $img = $_POST['gimg'];

    $sql = "INSERT INTO goods (name, cost, description, ord, img)
VALUES ('$name', '$cost', '$descr', '$ord', '$img')";

    if (mysqli_query($conn, $sql)) {
        echo "1";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $conn->close();
    writeJSON();
}

function writeJSON(){
    $conn = connect();
    $sql = "SELECT * FROM goods";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $out = array();
        while($row = $result->fetch_assoc()) {
            $out[$row["id"]] = $row;
        }
        file_put_contents('../goods.json', json_encode($out));
    } else {
        echo "0";
    }
    $conn->close();

}
