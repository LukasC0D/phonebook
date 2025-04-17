<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    protected $guarded = ['id'];
    protected $table = 'phonebook';
    protected $fillable = ['name', 'phone', 'email', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sharedWith()
    {
        return $this->belongsToMany(User::class, 'pivot_entries', 'entry_id', 'user_id');
    }
}
