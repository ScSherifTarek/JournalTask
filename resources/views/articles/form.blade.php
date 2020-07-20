@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('common.articles')</div>

                <div class="card-body">
                    <form method="POST" action="{{ $article->exists ? route('articles.update', ['article' => $article]) : route('articles.store')}}">
                        @csrf
                        @if($article->exists)
                            @method('PUT')
                        @else
                            @method('POST')
                        @endif

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">@lang('common.title')</label>

                            <div class="col-md-6">
                                @if($article->exists)
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?: $article->title }}" required autocomplete="title" autofocus>
                                @else
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                @endif

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">@lang('common.description')</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>@if(old('description')){{ old('description') }}@elseif($article->exists){{ $article->description }}@endif</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('submit')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
