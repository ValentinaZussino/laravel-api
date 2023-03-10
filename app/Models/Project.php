<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description','dev_lang', 'framework', 'difficulty', 'team', 'git_link', 'cover_image', 'type_id'];

    public static function generateSlug($title) {

        return Str::slug($title, '-');
        
    }

    public function type():BelongsTo {

        return $this->belongsTo(Type::class);

    }

    public function devlangs():BelongsToMany{

        return $this->belongsToMany(Devlang::class);

    }
}
