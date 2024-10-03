<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory; // Don't forget to include this trait

    protected $fillable = ['name', 'description', 'image_path']; // Add description and image_path

    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
