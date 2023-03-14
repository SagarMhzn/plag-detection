<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;
    protected $table='docs';
    protected $fillable = ['file_name'];
    protected $appends = ['upload_file'];
    public function getUploadFileAttribute(){
        return asset('uploads/')."/".$this->file_name;
    }
}
