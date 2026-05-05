<?php
$uzenet = array();

if (isset($_SESSION['login']) && isset($_FILES['ujkep'])) {
    $mappa = './kepek/';
    $fajlnev = time() . '_' . $_FILES['ujkep']['name'];
    $utvonal = $mappa . basename($fajlnev);
    $tipus = strtolower(pathinfo($utvonal, PATHINFO_EXTENSION));

    if ($_FILES['ujkep']['size'] > 5000000) {
        $uzenet[] = "A fájl túl nagy (max 5MB).";
    }
    
    if($tipus != "jpg" && $tipus != "png" && $tipus != "jpeg") {
        $uzenet[] = "Csak JPG, JPEG és PNG fájlok engedélyezettek.";
    }

    if (empty($uzenet)) {
        if (move_uploaded_file($_FILES['ujkep']['tmp_name'], $utvonal)) {
            try {
                $dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7', 'root', '',
                                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                $stmt = $dbh->prepare("INSERT INTO kepek (fajlnev, felhasznalo) VALUES (:fajlnev, :felhasznalo)");
                $stmt->execute(array(':fajlnev' => $fajlnev, ':felhasznalo' => $_SESSION['login']));
                
                header("Location: ./?oldal=kepek&status=ok");
                exit;
            } catch (PDOException $e) {
                $uzenet[] = "Hiba az adatbázis mentésnél: " . $e->getMessage();
            }
        } else {
            $uzenet[] = "Hiba történt a fájl mozgatásakor.";
        }
    }
}
?>