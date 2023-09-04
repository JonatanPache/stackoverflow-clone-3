<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Markdown;

class Answer extends Model
{
    use HasFactory;


    public static function boot(){
        parent::boot();

        static::created(function ($answer){
            $answer->question->increment('answer_count');
            $answer->question->save();
        });
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute(){
        return Markdown::parse($this->body);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
}
