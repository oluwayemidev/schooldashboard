<h1 class="text-center">Add New School</h1>

<form action="?action=storeSchool" method="POST">
    <label for="name">School Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="address">Address:</label>
    <textarea id="address" name="address" required></textarea><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" required><br>

    <label for="country">Country:</label>
    <input type="text" id="country" name="country" required><br>

    <button type="submit">Add School</button>
</form>
