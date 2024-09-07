<?php
namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Student::all();
    }

    public function headings(): array
    {
        return [
            'Mã sinh viên',
            'Tên sinh viên',
            'Ngày sinh',
            'Giới tính',
        ];
    }
}
