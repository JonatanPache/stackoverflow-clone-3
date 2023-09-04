<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Mail\Markdown;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title','body'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }


    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute(){
        return route("questions.show", $this->slug);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute(){
        if($this->answers_count > 0){
            return ($this->best_answer_id) ? "answered-accepted": "answered";
        }
        return "unanswered";
    }

    public function getBodyHtmlAttribute(){
        return Markdown::parse($this->body);
    }
}
