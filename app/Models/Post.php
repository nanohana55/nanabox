<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('user','amount','type','method')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function amount()
    {
        return $this->belongsTo(Amount::class);
    }
    
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
    public function method()
    {
        return $this->belongsTo(Method::class);
    }
    protected $fillable = [
        'title',
        'body',
        'image_url',
        'amount_id',
        'type_id',
        'method_id',
        'user_id'
        ];
}
