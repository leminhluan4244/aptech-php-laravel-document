<!DOCTYPE html>
<html>

<head>
    <title>Cập nhật sinh viên</title>
    <style>
        .error,
        .required {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Cập nhật sinh viên</h2>

    @if (session('success'))
        <div class="alert alert-success" style="color: green;">
            {{ session('success') }}
        </div>
        <br>
    @endif

    <form method="post" action="{{ route('students.update', $student->student_id) }}">
        @csrf
        @method('PUT')
        <input hidden type="text" name="student_id" value={{ $student->student_id }}">
        <table>
            <tr>
                <td>Tên sinh viên <span class="required">*</span>:</td>
                <td>
                    <input type="text" name="student_name" value="{{ $student->student_name }}">
                    @error('student_name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Ngày sinh <span class="required">*</span>:</td>
                <td>
                    <input type="date" name="birth_date" value="{{ $student->birth_date }}">
                    @error('birth_date')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Giới tính <span class="required">*</span>:</td>
                <td>
                    <select name="gender">
                        <option value="Nam" {{ $student->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ $student->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    </select>
                    @error('gender')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Lớp <span class="required">*</span>:</td>
                <td>
                    <select name="class_id">
                        @foreach ($classes as $class)
                            <option value="{{ $class->class_id }}"
                                {{ $student->class_id == $class->class_id ? 'selected' : '' }}>
                                {{ $class->class_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('class_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Cập nhật"></td>
            </tr>
        </table>
    </form>

    <a href="{{ route('students.index') }}">Trở lại</a>
</body>

</html>
