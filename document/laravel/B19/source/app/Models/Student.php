<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = "student_id";
    protected $fillable = ['student_name', 'birth_date', 'gender'];
    public $timestamps = false;
}
