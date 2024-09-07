<?php
namespace App\Imports;

use App\Models\Student;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{

    public function headingRow(): int
    {
        return 1;
    }
    public function model(array $row)
    {
        return new Student([
            'student_name' => $row['ten_sinh_vien'],
            'birth_date' => Carbon::parse($row['ngay_sinh'])->format('Y-m-d'),
            'gender' => $row['gioi_tinh'],
        ]);
    }
}
