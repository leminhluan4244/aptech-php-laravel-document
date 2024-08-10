<!DOCTYPE html>
<html>

<head>
    <title>Xác nhận xóa</title>
</head>

<body>
    <h2>Xác nhận xóa</h2>
    <p>Bạn có chắc chắn muốn xóa sinh viên <strong>{{ $student->student_name }}</strong>?</p>
    <form method="POST" action="{{ route('students.destroy', $student) }}">
        @csrf
        @method('DELETE')
        <input hidden type="text" name="student_id" value={{ $student->student_id }}">
        <button type="submit">Xóa</button>
        <a href="{{ route('students.index') }}">Hủy</a>
    </form>
</body>

</html>
