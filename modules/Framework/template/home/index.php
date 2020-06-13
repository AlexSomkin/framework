<? foreach ($models as $model): ?>
    <? foreach ($model as $param => $value): ?>
        <div><?= $param ?> : <?= $value ?></div>
        <hr>
    <? endforeach; ?>
<? endforeach; ?>