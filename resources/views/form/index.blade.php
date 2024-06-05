<!DOCTYPE html>
<html>
<head>
    <title>Form Data</title>
</head>
<body>
    <h1>Form Data</h1>
    <a href="{{ route('form.create') }}"><button>Create New Entry</button></a>
    <br><br>
    @if(session()->has('success'))
        <div>
            {{ session()->get('success') }}
        </div>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formData as $entry)
                @php
                    $data = json_decode($entry->data, true);
                @endphp
                <tr>
                    <td>{{ $entry->id }}</td>
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['email'] }}</td>
                    <td>{{ $data['address'] }}</td>
                    <td><img src="{{ asset('storage/' . $data['image']) }}" alt="Image" width="100"></td>
                    <td>
                        <a href="{{ route('form.edit', $entry->id) }}" ><button>Edit</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
