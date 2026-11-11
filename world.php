<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    //gets the query, strip_tags removes any html tags
    $country = isset($_GET['country']) ? trim((strip_tags($_GET['country'] ))) : '';


    $statement = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
    $statement->execute(['country' => "%$country%"]);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    

?>

<?php ?>
<table>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
  </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td> <?= $row['name'];?> </td>
      <td> <?= $row['continent'];?> </td>
      <td> <?= $row['independence_year'];?> </td>
      <td> <?= $row['head_of_state'];?> </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php ?>
