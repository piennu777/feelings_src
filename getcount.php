<?php
$host = 'mysql1.php.xdomain.ne.jp';
$dbname = 'piennu777_feelings';
$user = 'piennu777_sql';
$password = 'Orion0411';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare("SELECT count FROM counter_table WHERE id = 1");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $row['count'];

    echo $count;
} catch (PDOException $e) {
    echo "データベースエラー: " . $e->getMessage();
}
?>