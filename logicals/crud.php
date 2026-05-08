<?php
$dbh = new PDO('mysql:host=localhost;dbname=hvz9u1', 'hvz9u1', 'Beadando1', 
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));


if (isset($_GET['delete'])) {
    $stmt = $dbh->prepare("DELETE FROM gep WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header("Location: ./?oldal=crud");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mentes'])) {
    $id = $_POST['id'] ?? '';
    
    
    $gyarto = $_POST['gyarto'] ?? 'Ismeretlen';
    $tipus = $_POST['tipus'] ?? 'Ismeretlen';
    $kijelzo = $_POST['kijelzo'] ?? '15.6';
    $memoria = $_POST['memoria'] ?? '2048';
    $merevlemez = $_POST['merevlemez'] ?? '250';
    $videovezerlo = $_POST['videovezerlo'] ?? 'Integrált';
    $ar = $_POST['ar'] ?? '0';
    $processzorid = $_POST['processzorid'] ?? '1';
    $oprendszerid = $_POST['oprendszerid'] ?? '1';
    $db = $_POST['db'] ?? '0';

    $adatok = [$gyarto, $tipus, $kijelzo, $memoria, $merevlemez, $videovezerlo, $ar, $processzorid, $oprendszerid, $db];

    if ($id) { 
        $adatok[] = $id;
        $sql = "UPDATE gep SET gyarto=?, tipus=?, kijelzo=?, memoria=?, merevlemez=?, videovezerlo=?, ar=?, processzorid=?, oprendszerid=?, db=? WHERE id=?";
    } else { 
        $sql = "INSERT INTO gep (gyarto, tipus, kijelzo, memoria, merevlemez, videovezerlo, ar, processzorid, oprendszerid, db) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    }
    
    $stmt = $dbh->prepare($sql);
    $stmt->execute($adatok);
    header("Location: ./?oldal=crud");
    exit;
}


$edit_gep = null;
if (isset($_GET['edit'])) {
    $stmt = $dbh->prepare("SELECT * FROM gep WHERE id = ?");
    $stmt->execute([$_GET['edit']]);
    $edit_gep = $stmt->fetch(PDO::FETCH_ASSOC);
}


$gepek = $dbh->query("SELECT * FROM gep ORDER BY id ASC ")->fetchAll(PDO::FETCH_ASSOC);
?>