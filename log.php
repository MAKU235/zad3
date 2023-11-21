<?php
$conn = new mysqli("127.0.0.1","admin","testy","baza");
if ($conn->connect_error) {
    die("Nie dziala: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $conn->real_escape_string($_POST["login"]);
    $haslo = $conn->real_escape_string($_POST["hasło"]);
    $query = "SELECT * FROM users WHERE login='$login' AND password='$haslo'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Zalogowano";
    } 
    else 
    {
        echo "Złe hasło lub login";
    }
    $conn->close();
}
?>
