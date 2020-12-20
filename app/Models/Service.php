<?php

namespace App\Models;

use App\Models\Reaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    use \Spatie\Tags\HasTags;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'city',
        'phone',
        'user_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function reaction()
    {
        return $this->hasMany(Reaction::class);
    }

    public function like()
    {
        $reaction = $this->reaction()->where('user_id', auth()->user()->id)->get()->first(); 
        if ($reaction) {
            $reaction->update(['recommended' => true]);
        } else {
            Reaction::create([
                'recommended' => true,
                'service_id' => $this->id,
                'user_id' => auth()->user()->id
            ]);
        }
    }

    public function dislike()
    {
        $reaction = $this->reaction()->where('user_id', auth()->user()->id)->get()->first();        
        if ($reaction) {
            $reaction->update(['recommended' => false]);
        } else {
            Reaction::create([
                'recommended' => false,
                'service_id' => $this->id,
                'user_id' => auth()->user()->id
            ]);
        }
    }
}
