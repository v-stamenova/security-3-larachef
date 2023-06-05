<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    protected $fillable = ['name', 'description', 'instructions', 'creator_id', 'photo'];

    use HasFactory;

    /**
     * The validation rules that a request must pass
     * in order to create an instance of this model
     *
     * @return string[]
     */
    public static function rules() : array
    {
        return [
            'name' => 'required|max:100',
            'description' => 'max:255',
            'instructions' => 'required'
        ];
    }


    /**
     * Returns the user that has created the recipe
     *
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
