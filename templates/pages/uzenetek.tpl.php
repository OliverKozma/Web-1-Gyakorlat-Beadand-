<div class="uzenetek-container">
    <h2>Beérkezett üzenetek</h2>
    <?php if(isset($_SESSION['login'])): ?>
        <table class="crud-table" style="background: #111; color: var(--accent-green);">
            <thead>
                <tr>
                    <th>Küldő</th>
                    <th>E-mail</th>
                    <th>Tárgy</th>
                    <th style="width: 40%;">Üzenet</th> 
                    <th>Időpont</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7', 'root', '');
                    // Fordított időrend az elvárás szerint
                    $stmt = $dbh->query("SELECT * FROM uzenetek ORDER BY idopont DESC");
                    while($sor = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $sender_name = $sor['felhasznalo_id'] ? htmlspecialchars($sor['felhasznalo_id']) : "<em>Vendég</em>";
                        echo "<tr>
                                <td>" . $sender_name . " (" . htmlspecialchars($sor['nev']) . ")</td>
                                <td>" . htmlspecialchars($sor['email']) . "</td>
                                <td>" . htmlspecialchars($sor['targy']) . "</td>
                                <td class='message-text'>" . nl2br(htmlspecialchars($sor['uzenet'])) . "</td>
                                <td>" . $sor['idopont'] . "</td>
                              </tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='5'>Hiba: " . $e->getMessage() . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Csak bejelentkezett felhasználók láthatják az üzeneteket.</p>
    <?php endif; ?>
</div>