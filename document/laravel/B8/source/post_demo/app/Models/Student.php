<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $primaryKey = 'student_id';

    protected $fillable = ['student_id', 'student_name', 'birth_date', 'gender', 'class_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public static function search(string | null $search)
    {
        $students = Student
            ::join('classes', 'students.class_id', '=', 'classes.class_id')
            ->where("students.student_name", "like", "%" . $search . "%")
            ->orWhere("classes.class_name", "like", "%" . $search . "%")
            ->select('students.*', 'classes.class_name')
            ->get();
        return $students;
    }

}
