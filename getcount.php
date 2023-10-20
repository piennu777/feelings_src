<?php
$servername = "";
$user = "";
$password = "";
$dbname = ""; 
$host = ""; 

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare("SELECT count FROM counter_table WHERE id = 1");
    $stmt->execute();
    
    // 結果を取得
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($row !== false) {
        $count = $row['count'];
    } else {
        // 結果が空の場合、カウントを0に設定
        $count = 0;
    }
    
    // 3桁ごとにカンマをつける
    $formattedCount = number_format($count);
    echo $formattedCount;
} catch (PDOException $e) {
    echo "データベースエラー: " . $e->getMessage();
}
?>

