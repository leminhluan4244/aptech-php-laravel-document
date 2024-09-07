<!DOCTYPE html>
<html>

<head>
    <title>Quản lý sinh viên</title>
</head>

<body>
    <h1>Quản lý sinh viên</h1>

    <a href="{{ route('students.export') }}">Export Excel</a>

    <form action="{{ route('students.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Import</button>
    </form>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
</body>

</html>
