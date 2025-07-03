@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>{{ $title }}</h2>
    <p>{{ $content }}</p>

    <a href="{{ route('download.word') }}" class="btn btn-primary mt-3">
        Download sebagai Word
    </a>
</div>
@endsection