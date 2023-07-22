<?php if (count($Logerrors) > 0): ?>

<div class="error">
    <?php foreach($Logerrors as $error): ?>
        <p> <?php echo $error; ?> </p>
    <?php endforeach ?>
</div>
<?php endif ?>