<?php

namespace App\Models;

use App\Scopes\DeleteAdminScope;
use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    protected $fillable = ['title','content', 'user_id'];

    use HasFactory;
    use SoftDeletes;

   public function comments(){
       return $this->hasMany(Comment::class)->latest();
   }

   public function user(){
       return $this->belongsTo(User::class);
   }

   public function scopeLatest(Builder $query){
        return $query->orderBy(static::CREATED_AT, 'desc');
   }

   public function scopeMostCommented(Builder $query){
       // comments_count
       return $query->withCount('comments')->orderBy('comments_count', 'desc');
   }

   public static function boot(){
        static::addGlobalScope(new DeleteAdminScope);
       parent::boot();
       static::deleting(function(BlogPost $blogPost){
           // xoa comment lien quan den blogpost
          $blogPost->comments()->delete();
       });
   }
}
