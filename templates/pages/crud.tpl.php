<div class="crud-container dark-theme">
    <h1 class="crud-title">CRUD OPERATIONS</h1>

    <div class="crud-top-bar">
        <!-- Ha rákattintasz, megjelenik a form az oldal tetején -->
        <a href="./?oldal=crud&action=add" class="btn-add">Add Notebook</a>
    </div>

    <!-- ŰRLAP PANEL (Csak akkor látszik, ha szerkesztünk vagy hozzáadunk) -->
    <?php if(isset($_GET['edit']) || isset($_GET['action'])): ?>
    <div class="crud-form-box">
        <h3><?= $edit_gep ? "Edit Device #".$edit_gep['id'] : "Register New Device" ?></h3>
        <form action="./?oldal=crud" method="post" class="matrix-form">
            <input type="hidden" name="id" value="<?= $edit_gep['id'] ?? '' ?>">
            
            <div class="form-row">
                <input type="text" name="gyarto" placeholder="Gyártó" value="<?= $edit_gep['gyarto'] ?? '' ?>" required>
                <input type="text" name="tipus" placeholder="Típus" value="<?= $edit_gep['tipus'] ?? '' ?>" required>
                <input type="text" name="kijelzo" placeholder="Kijelző (col)" value="<?= $edit_gep['kijelzo'] ?? '' ?>">
            </div>
            <div class="form-row">
                <input type="number" name="memoria" placeholder="RAM (MB)" value="<?= $edit_gep['memoria'] ?? '' ?>">
                <input type="number" name="merevlemez" placeholder="HDD (GB)" value="<?= $edit_gep['merevlemez'] ?? '' ?>">
                <input type="number" name="ar" placeholder="Ár (Ft)" value="<?= $edit_gep['ar'] ?? '' ?>" required>
            </div>
            <div class="form-row">
                <input type="text" name="videovezerlo" placeholder="Videókártya" value="<?= $edit_gep['videovezerlo'] ?? '' ?>">
                <input type="number" name="processzorid" placeholder="CPU ID" value="<?= $edit_gep['processzorid'] ?? '1' ?>">
                <input type="number" name="oprendszerid" placeholder="OS ID" value="<?= $edit_gep['oprendszerid'] ?? '1' ?>">
                <input type="number" name="db" placeholder="Készlet" value="<?= $edit_gep['db'] ?? '1' ?>">
            </div>

            <div class="form-actions">
                <button type="submit" name="mentes" class="btn-blue">Save Notebook</button>
                <a href="./?oldal=crud" class="btn-red">Cancel</a>
            </div>
        </form>
    </div>
    <?php endif; ?>

    <!-- TÁBLÁZAT MINDEN ADATTAL -->
    <div class="table-responsive">
        <table class="matrix-table-full">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Gyártó</th>
                    <th>Típus</th>
                    <th>Kijelző</th>
                    <th>RAM</th>
                    <th>HDD</th>
                    <th>Videókártya</th>
                    <th>Ár</th>
                    <th>CPU id/OS id</th>
                    <th>Mennyiség</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($gepek as $g): ?>
                <tr>
                    <td class="bold-green"><?= $g['id'] ?></td>
                    <td><?= htmlspecialchars($g['gyarto']) ?></td>
                    <td><?= htmlspecialchars($g['tipus']) ?></td>
                    <td><?= $g['kijelzo'] ?>"</td>
                    <td><?= $g['memoria'] ?>MB</td>
                    <td><?= $g['merevlemez'] ?>GB</td>
                    <td class="small-text"><?= htmlspecialchars($g['videovezerlo']) ?></td>
                    <td class="price-text"><?= number_format($g['ar'], 0, ',', ' ') ?> Ft</td>
                    <td><?= $g['processzorid'] ?> / <?= $g['oprendszerid'] ?></td>
                    <td><?= $g['db'] ?></td>
                    <td class="btn-cell">
                        <a href="./?oldal=crud&edit=<?= $g['id'] ?>" class="btn-edit-sm">Edit</a>
                        <a href="./?oldal=crud&delete=<?= $g['id'] ?>" class="btn-delete-sm" onclick="return confirm('Delete this record?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>