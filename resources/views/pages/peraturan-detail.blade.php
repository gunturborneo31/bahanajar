@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $article->title ?? 'Peraturan' }}</h1>
    <div>
        {!! $article->content ?? '<em>Konten tidak ditemukan.</em>' !!}
    </div>
    <a href="{{ route('peraturan') }}">&larr; Kembali ke daftar peraturan</a>
</div>
@endsection
