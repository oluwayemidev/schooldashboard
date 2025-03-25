
<h1 class="text-center">School List</h1>
<a href="?action=createSchool"><button class="btn-light">Add New School</button></a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Country</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['schools'] as $school): ?>
            <tr>
                <td><?= $school['id'] ?></td>
                <td><?= $school['name'] ?></td>
                <td><?= $school['address'] ?></td>
                <td><?= $school['city'] ?></td>
                <td><?= $school['country'] ?></td>
                <td>
                    <a href="?action=schoolDetails&id=<?= $school['id'] ?>">View</a> |
                    <a href="?action=editSchool&id=<?= $school['id'] ?>">Edit</a> |
                    <a href="?action=deleteSchool&id=<?= $school['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>