<?php
$autor = "";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_autor (nm_autor) VALUES (:nome)');
    $stmt->execute(array(
        ':nome' => $_POST['nm_autor'];
    ));

    //Exibir os autores no tbody
    $sql = 'SELECT * FROM tb_autor';
    foreach ($conn->query($sql) as $row) {
        // $autor .= "<tr><td>".$row['cd_autor']."</td><td>".$row['nm_autor']."</td></tr>";
        $autor .= $row['cd_autor']." - ".$row['nm_autor']."<br>"; 
    }
    echo $autor;

} catch(PDOException $e) {
    echo "<br>".$stmt->rowCount();
    echo 'Error: ' . $e->getMessage();
}
?>