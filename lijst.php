<?php
//bootstrap table striped
//datatables
//jquery

$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "fictief";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$stmt = "SELECT * FROM Mytable WHERE 1";
$data = $conn->prepare($stmt);
echo "<table class='table table-striped' id='mytable'>
        <tr>
            <th style='border: 1px solid black'>ID</th>
            <th style='border: 1px solid black'>Naam</th>
            <th style='border: 1px solid black'>telefoonnummer</th>
            <th style='border: 1px solid black'>emailadres</th>
            <th style='border: 1px solid black'>adres</th>
            <th style='border: 1px solid black'>zipcode</th>
            <th style='border: 1px solid black'>regio</th>
            <th style='border: 1px solid black'>land</th>
        </tr>";
try {
    $data->execute(array());
    foreach($data as $item) {
        ?>
        <tr>
            <td style='border: 1px solid black'><?= $item['id']?></td>
            <td style='border: 1px solid black'><?= $item['name']?></td>
            <td style='border: 1px solid black'><?= $item['phone']?></td>
            <td style='border: 1px solid black'><?= $item['email']?></td>
            <td style='border: 1px solid black'><?= $item['address']?></td>
            <td style='border: 1px solid black'><?= $item['postalZip']?></td>
            <td style='border: 1px solid black'><?= $item['region']?></td>
            <td style='border: 1px solid black'><?= $item['country']?></td>
        </tr>
        <?php
        }
    }
catch(PDOException $e) {
    echo "<br>$e";
};

echo "</table>";

?>