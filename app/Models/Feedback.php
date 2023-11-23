<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Explicty defined the table name, because default name was not correct.
    protected $table = 'feedbacks';

    // These fields are mass fillables.
    protected $fillable = [
        'name',
        'email',
        'content',
        'type'
    ];

    /**
     * Search for the query
     */
    public function scopeSearch($query, $q)
    {
        $columns = ['name', 'type', 'email', 'content'];

        foreach ($columns as $column) {
            $query->orWhere($column, 'LIKE', '%' . $q . '%');
        }

        return $query;
    }
}
