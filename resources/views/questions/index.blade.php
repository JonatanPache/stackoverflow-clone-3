@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> All questions</div>

                <div class="card-body">

                    @foreach ($questions as $question)
                    <div class="row">
                        <div class="col-md-1 counters">
                            <div class="vote">
                                <strong>{{ $question->votes }}</strong> {{ Str::plural('vote', $question->votes) }}
                            </div>
                            <div class="status {{ $question->status }}">
                                <strong>{{ $question->answer }}</strong> {{ Str::plural('answer', $question->answers)
                                }}
                            </div>
                            <div class="view">
                                {{ $question->views . " " . Str::plural('view', $question->views) }}
                            </div>
                        </div>

                        <div class="col-md-10">
                            <h3 class="mt-0"> <a href="{{ $question->url }}"> {{ $question->title }}</h3>
                            {{-- <h3 class="mt-0"> <a href="{{ route('questions.show',$question->id) }}">
                                    $question->title }}</h3> --}}
                            <p class="lead">
                                Asked by
                                <a href="{{ $question->user->url }}"> {{ $question->user->name }}</a>
                                <small class="text-muted">{{ $question->created_date }}</small>
                            </p>
                            {{ Str::limit($question->body,250) }}
                        </div>

                        <hr>
                        @endforeach

                        <div class="mx-auto">
                            {{ $questions->links() }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
