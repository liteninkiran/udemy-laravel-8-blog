<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    public static $validationRules = [
        'title' => 'required|max:255',
        'category_id' => 'required',
        'desc' => 'required',
        'user_id' => 'required',
    ];

    public static $messages = array(
        'title.required' => 'Please enter a Title',
        'category_id.required' => 'Please select a Category', 
        'desc.required' => 'Please enter some Content', 
        'user_id.required' => 'A valid user is required', 
    );

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
