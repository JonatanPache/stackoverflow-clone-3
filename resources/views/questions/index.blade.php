@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ms-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts.message')
                    @foreach ($questions as $question)

                    <div class="d-flex">
                        <div class="flex-shrink-0 counters flex-column">
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

                        <div class="flex-grow-1">
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
                    </div>
                    <hr>
                    @endforeach

                    {{ $questions->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
