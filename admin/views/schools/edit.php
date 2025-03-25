<?php 
$school = $data['school'];
?>
<h2>Edit School</h2>

<form action="?action=updateSchool&id=<?= $school['id'] ?>" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?= $school['name'] ?>" required>
    
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="<?= $school['address'] ?>" required>
    
    <label for="city">City:</label>
    <input type="text" id="city" name="city" value="<?= $school['city'] ?>" required>
    
    <label for="country">Country:</label>
    <input type="text" id="country" name="country" value="<?= $school['country'] ?>" required>
    
    <button type="submit">Update</button>
</form>
