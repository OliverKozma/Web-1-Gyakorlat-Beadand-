<div class="kapcsolat-container">
    <h2>Lépjen kapcsolatba a ReNew Kft.-vel</h2>
    <form id="kapcsolat-form" action="./?oldal=kapcsolat" method="post">
        <div class="form-group">
            <label>Név:</label>
            <input type="text" name="nev" id="nev">
        </div>
        <div class="form-group">
            <label>E-mail:</label>
            <input type="text" name="email" id="email">
        </div>
        <div class="form-group">
            <label>Tárgy:</label>
            <input type="text" name="targy" id="targy">
        </div>
        <div class="form-group">
            <label>Üzenet:</label>
            <textarea name="uzenet" id="uzenet" rows="5"></textarea>
        </div>
        <button type="submit" class="btn-add">Küldés</button>
    </form>
    <div id="js-errors" style="color: #ff0000; margin-top: 10px;"></div>
</div>