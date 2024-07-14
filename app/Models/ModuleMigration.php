<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleMigration extends Model
{
    use HasFactory;

    protected $table = 'modules_migrations';
    protected $fillable = ['module', 'migration', 'batch'];

}
