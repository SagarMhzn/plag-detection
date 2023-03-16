<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;
    protected $table='docs';
    protected $fillable = ['file_name', 'student_id', 'assignment_id'];
    protected $appends = ['upload_file'];
    public function getUploadFileAttribute(){
        return asset('uploads/')."/".$this->file_name;
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id');
    }

}
