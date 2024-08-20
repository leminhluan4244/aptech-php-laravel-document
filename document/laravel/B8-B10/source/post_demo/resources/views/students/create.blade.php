<!DOCTYPE html>
<html>

<head>
    <title>Thêm mới sinh viên</title>
    <style>
        .error,
        .required {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Thêm mới sinh viên</h2>
    <form method="post" action="{{ route('students.store') }}">
        @csrf
        <table>
            <tr>
                <td>Tên sinh viên <span class="required">*</span>:</td>
                <td>
                    <input type="text" name="student_name" value="{{ old('student_name') }}">
                    @error('student_name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Ngày sinh <span class="required">*</span>:</td>
                <td>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}">
                    @error('birth_date')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Giới tính <span class="required">*</span>:</td>
                <td>
                    <select name="gender" value="{{ old('gender') }}">
                        <option value="Nam" selected>Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                    @error('gender')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Lớp <span class="required">*</span>:</td>
                <td>
                    <select name="class_id" value="{{ old('class_id') }}">
                        <option value="">Chọn lớp</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->class_id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                    @error('class_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Thêm"></td>
            </tr>
        </table>
    </form>

    <a href="{{ route('students.index') }}">Trở lại</a>
</body>

</html>
