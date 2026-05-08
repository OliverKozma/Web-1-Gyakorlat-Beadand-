<div class="galeria-container">
    <h2>Notebook Galéria - ReNew Kft.</h2>

    <?php if(isset($_SESSION['login'])): ?>
        <section class="upload-section">
            <h3>Új kép feltöltése</h3>
            <form action="./?oldal=kepek" method="post" enctype="multipart/form-data">
                <input type="file" name="ujkep" required>
                <button type="submit" class="btn-add">Feltöltés</button>
            </form>
            <?php 
                if(isset($_GET['status']) && $_GET['status'] == 'ok') {
                    echo "<p class='status'>Sikeres feltöltés!</p>";
                }
                if(!empty($uzenet)) {
                    foreach($uzenet as $u) echo "<p class='status' style='color:red;'>$u</p>";
                }
            ?>
        </section>
    <?php endif; ?>

    <div class="image-grid">
        <?php
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=hvz9u1', 'hvz9u1', 'Beadando1');
            $stmt = $dbh->query("SELECT * FROM kepek ORDER BY datum DESC");
            while($kep = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="image-item">';
                echo '<img src="./kepek/'.$kep['fajlnev'].'" alt="Notebook">';
                echo '<p>Feltöltő: '.$kep['felhasznalo'].' <br> <span>'.$kep['datum'].'</span></p>';
                echo '</div>';
            }
        } catch (PDOException $e) { echo "Hiba: " . $e->getMessage(); }
        ?>
    </div>
</div>