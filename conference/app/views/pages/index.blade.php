@extends('layouts.master')

@section('header')
    @include('includes.header')
@stop

@section('footer')
    @include('includes.footer')
@stop

@section('content')

    <div class="container">
        <h1>Event create/edit</h1>
        <?= Former::open()->method('POST') ?>
            <?= Former::select('meta_id')->options($conferences)->label('Related conference')->help('Choose conference')->class('form-control')->required() ?>
            <?= Former::text('title')->class('form-control')->required() ?>
            <?= Former::textarea('description')->class('form-control') ?>
            <?= Former::text('image_url')->class('form-control')->placeholder('http://') ?>
            <?= Former::select('location')->options($locations)->class('form-control') ?>
            <?= Former::select('presenter')->options($presenters)->class('form-control') ?>
            <?= Former::number('video_id')->class('form-control') ?>
            <?= Former::text('start_date')->class('form-control') ?>
            <?= Former::text('end_date')->class('form-control') ?>
            <?= Former::actions()->large_primary_submit('Submit') ?>
        <?= Former::close() ?>
    </div>

    <script src="/packages/jquery/dist/jquery.js"></script>
    <script src="/app/js/site.js"></script>

@stop