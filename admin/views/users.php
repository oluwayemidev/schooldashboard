<?php
$content = 'users';
?>
<h1 class="text-center">User Management</h1>
<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created At</th>
    </tr>
    <?php foreach ($data['users'] as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['first_name'] ?></td>
            <td><?= $user['last_name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['role'] ?></td>
            <td><?= $user['created_at'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
