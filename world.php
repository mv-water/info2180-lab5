<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    //gets the query, strip_tags removes any html tags 
    $country = isset($_GET['country']) ? trim((strip_tags($_GET['country'] ))) : '';
     
    $statement = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $results = $statement ->fetchAll(PDO::FETCH_ASSOC);

?>

<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>