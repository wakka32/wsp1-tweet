<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Den fantastiska tweetsidan!</h1>
<?php
include 'include/dbinfo.php';
// mysql -u -p
// use database;
try {
    $dbh = new PDO(
        'mysql:host=localhost;dbname=' . $database . '',
         $user,
          $password
    );
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
// select * from tweet
$sth = $dbh->prepare('SELECT * FROM tweet');
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>" . print_r($result,1) . "</pre>";
// foreach ($result as $row) {
//     echo "<pre>" . print_r($row,1) . "</pre>";
// }
?>
    </div>
</body>
</html>