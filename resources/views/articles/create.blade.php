@extends('layouts.app')
{{ Form:model(article, ['url' => route('articles.update)]) }}
    @include('article.form')
    {{ Form::submit('сохранить') }}
{{ Form::close() }}
