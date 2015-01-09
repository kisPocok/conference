@extends('layouts.master')

@section('header')
    @include('includes.header')
@stop

@section('footer')
    @include('includes.footer')
@stop

@section('content')

    <div class="container">
        <h1>Location <?= $modelId ? 'edit' : 'create' ?></h1>
        <?= Former::open()->method('POST') ?>
            <?= Former::select('conference_id')->options($conferences)->label('Related conference')->class('form-control')->required() ?>
            <?= Former::text('title')->class('form-control')->required() ?>
            <?= Former::textarea('description')->class('form-control') ?>
            <?= Former::text('map_image_url')->class('form-control')->placeholder('http://') ?>
            <?= Former::number('channel_id')->class('form-control')->placeholder('Numeric only') ?>
            <?= Former::text('start_date')->class('form-control')->placeholder('Y-m-d H:i:s') ?>
            <?= Former::text('end_date')->class('form-control')->placeholder('Y-m-d H:i:s') ?>
            <br />
            <?= Former::actions()->large_primary_submit('Submit') ?>
        <?= Former::close() ?>
    </div>

    <script src="/packages/jquery/dist/jquery.js"></script>
    <script src="/app/js/site.js"></script>

@stop