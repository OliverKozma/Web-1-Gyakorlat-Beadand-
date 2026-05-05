<?php if(isset($data['login'])): ?>
    <h1>Kilépett:</h1>
    <?= $data['csn']." ".$data['un']." (".$data['login'].")" ?>
<?php else: ?>
    <h1>Kilépett</h1>
<?php endif; ?>
