<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nev = $_POST['nev'] ?? '';
    $email = $_POST['email'] ?? '';
    $targy = $_POST['targy'] ?? '';
    $uzenet_text = $_POST['uzenet'] ?? '';
    
    // Meghatározzuk, hogy be van-e jelentkezve a küldő
    $bejelentkezett_user = isset($_SESSION['login']) ? $_SESSION['login'] : null;

    $hibak = array();
    if (empty($nev)) $hibak[] = "Név kitöltése kötelező!";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $hibak[] = "Hibás e-mail formátum!";

    if (empty($hibak)) {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $stmt = $dbh->prepare("INSERT INTO uzenetek (nev, email, targy, uzenet, felhasznalo_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nev, $email, $targy, $uzenet_text, $bejelentkezett_user]);
            
            header("Location: ./?oldal=kapcsolat&status=success");
            exit;
        } catch (PDOException $e) {
            die("Adatbázis hiba: " . $e->getMessage());
        }
    }
}
?>