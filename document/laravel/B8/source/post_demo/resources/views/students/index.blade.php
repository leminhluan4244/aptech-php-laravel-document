<!DOCTYPE html>
<html>

<head>
    <title>Quản lý sinh viên</title>
</head>

<body>
    <h2>Danh sách sinh viên</h2>

    @if (session('success'))
        <div class="alert alert-success" style="color: green;">
            {{ session('success') }}
        </div>
        <br>
    @endif

    <form method="get">
        <input type="text" name="search" placeholder="Tìm kiếm theo tên" value="{{ request('search') }}">
        <button type="submit">Tìm kiếm</button>
    </form>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Lớp</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        @foreach ($students as $student)
            {{-- {{ dd($student) }} --}}
            <tr>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->student_name }}</td>
                <td>{{ $student->birth_date }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->class_name }}</td>
                <td><a href="{{ route('students.edit', $student->student_id) }}">Sửa</a></td>
                <td><a href="{{ route('students.delete', $student) }}">Xoá</a></td>
            </tr>
        @endforeach
    </table>
    <hr>

    <a href="{{ route('students.create') }}">Thêm mới sinh viên</a>

</body>

</html>
