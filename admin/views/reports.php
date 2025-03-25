<?php
$content = 'reports';
$reports = $data['reports'];
?>
<h1 class="text-center">Reports</h1>
<ul>
    <?php foreach ($reports as $report): ?>
        <li><?= $report['title'] ?> - <?= $report['created_at'] ?></li>
    <?php endforeach; ?>
</ul>