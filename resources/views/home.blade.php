@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>{{ config('app.name', 'Laravel') }}</h1>
    </div>
</div>

<div class="articles mt-4">
    <div class="container">
        <div class="row">
            @forelse($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->description }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12 mt-5 text-center">
                <h2> @lang('messages.no_articles') </h2>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection