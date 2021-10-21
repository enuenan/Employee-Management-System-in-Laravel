@extends('layouts.app')        

@section('content')
    <section class="content">
        <div class="container">
            <div class="row embed-responsive embed-responsive-16by9">
                <iframe src="{{ Storage::url($file) }}" frameborder="0" class="embed-responsive-item" height="700px"></iframe>
            </div>
        </div>
    </section>
@endsection