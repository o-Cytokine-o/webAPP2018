
<h1>hello world</h1>
<?= 10 * 10 ?></br>
<?=date("Y-m-d")?>
<h1><?= $message ?></h1>
<ul>
    <?php foreach($tasks as $task): ?>
        <li><?=$task ?></li>
    <?php endforeach; ?>
</ul>
<table>
    <?php for($i=1;$i<=30;$i++) : ?>
        <tr>
            <?php if ($i % 6 == 0) : ?>
                <br>
            <?php endif; ?>
            <td><?=$i?></td>
        </tr>

    <?php endfor; ?>
</table>