<!DOCTYPE html>
<html>

<head>
    <title>Thêm mới sinh viên</title>
</head>

<body>
    <h2>Thêm mới sinh viên</h2>
    <form method="post" action="{{ route('students.store') }}">
        @csrf
        <table>
            <tr>
                <td>Tên sinh viên:</td>
                <td><input type="text" name="student_name"></td>
                @error('student_name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="birth_date"></td>
                @error('birth_date')
                    <span class="error">{{ $message }}</span>
                @enderror
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>
                    <select name="gender">
                        <option value="Nam" selected>Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </td>
                @error('gender')
                    <span class="error">{{ $message }}</span>
                @enderror
            </tr>
            <tr>
                <td>Lớp:</td>
                <td>
                    <select name="class_id">
                        <option value="">Chọn lớp</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->class_id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </td>
                @error('class_id')
                    <span class="error">{{ $message }}</span>
                @enderror
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Thêm"></td>
            </tr>
        </table>
    </form>
</body>

</html>
