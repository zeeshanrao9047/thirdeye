<!DOCTYPE html>
<html>
<head>
    <title>Create Form</title>
</head>
<body>
    <h1>Create Form</h1>
    <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <br> <br> <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br> <br> <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br> <br> <br>
        <label>Address:</label>
        <input type="text" name="address" required>
        <br> <br> <br>
        <label>Image:</label>
        <input type="file" name="image" required>
        <br> <br> <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
