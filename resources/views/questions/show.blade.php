@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title }}</h1>
                            <div class="ms-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all
                                    question</a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="flex-shrink-0 vote-controls">
                            <a title="This question" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">1230</span>
                            <a title="this class" class="vote-down off">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <a title="click to mark" class="favorite mt-2 favorited">
                                <i class="fa-solid fa-star fa-2x"></i>
                                <span class="favorites-count">123</span>
                            </a>
                        </div>

                        <div class="media-body">
                            {{ $question->body_html }}
                            <div class="clearfix">
                                <div style="float: right;">
                                    <span class="text-muted"> Answered {{ $question->created_date }} </span>
                                    <div class="media mt-2">
                                        <a href="{{ $question->user->url }}" class="pr-2">
                                            <img src="{{ $question->user->avatar }}">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $question->user->url }}"> {{ $question->user->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $question->answers_count." ".Str::plural('answer', $question->answers_count ) }}</h2>
                    </div>
                    <hr>
                    @foreach ($question->answers as $answer)

                    <div class="media">

                        <div class="d-flex">
                            <div class="flex-shrink-0 vote-controls">
                                <a title="This answer" class="vote-up">
                                    <i class="fas fa-caret-up fa-3x"></i>
                                </a>
                                <span class="votes-count">1230</span>
                                <a title="this answer isnt useful" class="vote-down off">
                                    <i class="fas fa-caret-down fa-3x"></i>
                                </a>
                                <a title="mark this answer as thw best" class="vote-accepted mt-2">
                                    <i class="fas fa-check fa-2x"></i>
                                </a>
                            </div>

                            <div class="media-body">
                                {{ $answer->body_html }}

                                <div class="clearfix">
                                    <div style="float: right;">
                                        <span class="text-muted"> Answered {{ $answer->created_date }} </span>
                                        <div class="media">
                                            <a href="{{ $answer->user->url }}" class="pr-2">
                                                <img src="{{ $answer->user->avatar }}">
                                            </a>
                                            <div class="media-body">
                                                <a href="{{ $answer->user->url }}"> {{ $answer->user->name }}</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <hr>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
