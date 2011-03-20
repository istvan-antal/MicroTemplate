We could also combine templates it's easy as <?=implode(', ',$numbers)?>

<ul>
    <?foreach ($features as $feature):?>
    <li><?=$feature?></li>
    <?endforeach;?>
</ul>