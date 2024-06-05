<!DOCTYPE html>
<html>
<head>
    <title>Edit Form</title>
</head>
<body>
    <h1>Edit Form</h1>
    <form action="{{ route('form.update', $formEntry->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ $data['name'] }}" required>
          <br> <br> <br>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $data['email'] }}" required>
          <br> <br> <br>
        <label>Password:</label>
        <input type="password" name="password">
          <br> <br> <br>
        <label>Address:</label>
        <input type="text" name="address" value="{{ $data['address'] }}" required>
          <br> <br> <br>
        <label>Image:</label>
        <input type="file" name="image">
          <br> <br> <br>
          <img src="{{ asset('storage/' . $data['image']) }}" alt="Current Image" width="100">
          <br> <br> <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
