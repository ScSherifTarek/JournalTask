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
            @forelse($authors as $author)
                @foreach($author->articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->description }}</p>

                            @can('update',$article)
                            <a href="{{ route('articles.edit', ['article' => $article]) }}" class="btn btn-success">@lang('common.edit')</a>
                            @endcan

                            @can('delete',$article)
                            <a href="javascript: document.getElementById('article-{{$article->getRouteKey()}}-delete-form').submit()" class="btn btn-danger">@lang('common.delete')</a>
                            <form id="article-{{$article->getRouteKey()}}-delete-form" style="display: none" method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endcan
                            
                            @can('approve',$article)
                                @if($article->isApproved())
                                <span class="badge badge-success">approved</span>
                                @else
                                <a href="javascript: document.getElementById('article-{{$article->getRouteKey()}}-approve-form').submit()" class="btn btn-info">@lang('common.approve')</a>
                                <form id="article-{{$article->getRouteKey()}}-approve-form" style="display: none" method="POST" action="{{ route('articles.approve', ['article' => $article]) }}">
                                    @csrf
                                    @method('PUT')
                                </form>
                                @endif
                            @endcan
                        </div>
                    </div>
                </div>
                @endforeach
            @empty
            <div class="col-md-12 mt-5 text-center">
                <h2> @lang('messages.no_articles') </h2>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection