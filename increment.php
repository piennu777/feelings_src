<?php
$servername = "";
$user = "";
$password = "";
$dbname = "";
$host = ""; 

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare("CREATE TABLE IF NOT EXISTS counter_table (id INT PRIMARY KEY, count INT)");
    $stmt->execute();

    $stmt = $dbh->prepare("INSERT INTO counter_table (id, count) VALUES (1, 0) ON DUPLICATE KEY UPDATE count = count");
    $stmt->execute();

    $stmt = $dbh->prepare("SELECT count FROM counter_table WHERE id = 1");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $row['count'];

    $count++;

    $stmt = $dbh->prepare("UPDATE counter_table SET count = :count WHERE id = 1");
    $stmt->bindParam(':count', $count);
    $stmt->execute();

    echo $count;
} catch (PDOException $e) {
    echo "データベースエラー: " . $e->getMessage();
}

?>
