<?php
namespace TumshangilieBwana;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Hymn extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $table = 'hymns';

    protected $fillable = ['title', 'category', 'author', 'lyrics', 'approval'];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];
    
}
