<?php
$content = 'dashboard';
?>

<h1 class="text-center">Welcome to the Admin Dashboard</h1>
<p>Total Students: <?= $data['students']['total_students']; ?></p>
<p>Total Schools: <?= json_encode($data['total_schools']); ?></p>