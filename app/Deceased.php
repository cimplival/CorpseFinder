<?php
namespace CorpseFinder;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Deceased extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $table = 'deceased';

    protected $fillable = ['id', 'number', 'full_name', 'description','gender', 'checkin_date', 
    						'author', 'slug', 'identified', 'photo_path'];
    						
    protected $sluggable = [
        'build_from' => 'number',
        'save_to'    => 'slug'
    ];
    
}
