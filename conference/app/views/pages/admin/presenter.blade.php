@extends('layouts.master')

@section('header')
    @include('includes.header')
@stop

@section('footer')
    @include('includes.footer')
@stop

@section('content')

    <div class="container">
        <h1>Presenter <?= $modelId ? 'edit' : 'create' ?></h1>
        <?= Former::open()->method('POST') ?>
            <?= Former::text('name')->class('form-control')->required() ?>
            <?= Former::textarea('description')->class('form-control') ?>
            <?= Former::text('image_url')->class('form-control')->placeholder('http://') ?>
            <?= Former::text('organization')->class('form-control') ?>
            <?= Former::text('title')->class('form-control') ?>
            <?= Former::text('twitter_account')->class('form-control') ?>
            <?= Former::text('facebook_account')->class('form-control') ?>
            <?= Former::text('homepage')->class('form-control') ?>
            <br />
            <?= Former::actions()->large_primary_submit('Submit') ?>
        <?= Former::close() ?>
    </div>

    <script src="/packages/jquery/dist/jquery.js"></script>
    <script src="/app/js/site.js"></script>

@stop