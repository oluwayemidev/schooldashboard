<?php

if (isset($data['school'])) {
    $school = $data['school'];
?>
    <h2>School Details</h2>
    <div>
        <strong>Name:</strong> <?= htmlspecialchars($school['name']) ?><br>
        <strong>Address:</strong> <?= htmlspecialchars($school['address']) ?><br>
        <strong>City:</strong> <?= htmlspecialchars($school['city']) ?><br>
        <strong>Country:</strong> <?= htmlspecialchars($school['country']) ?><br>
        <strong>Created At:</strong> <?= $school['created_at'] ?><br>
        <strong>Updated At:</strong> <?= $school['updated_at'] ?><br>
    </div>

    <div>
        <a href="?action=editSchool&id=<?= $school['id'] ?>">Edit</a>
        <a href="?action=deleteSchool&id=<?= $school['id'] ?>" onclick="return confirm('Are you sure you want to delete this school?')">Delete</a>
    </div>
<?php
} else {
    echo "School not found.";
}
?>