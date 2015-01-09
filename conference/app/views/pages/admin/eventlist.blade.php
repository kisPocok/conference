@extends('layouts.master')

@section('header')
    @include('includes.header')
@stop

@section('footer')
    @include('includes.footer')
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Event list</h1>
            </div>
            <div class="col-md-6">
                <?= Former::open()->method('GET')->id('filterForm') ?>
                    <?= Former::select('cid')->options($conferences)->label(null)->class('form-control') ?>
                <?= Former::close() ?>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th width="10%">#id</th>
                    <th width="40%">Title</th>
                    <th width="15%">Date</th>
                    <th width="15%">Time</th>
                    <th>#Conf</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($list as $model): ?>
                <tr>
                    <td><?= $model->id ?></td>
                    <td><?= $model->title ?></td>
                    <td><?= date('Y-m-d', strtotime($model->start_date)) ?></td>
                    <td><?= date('H:i', strtotime($model->start_date)) ?> - <?= date('H:i', strtotime($model->end_date)) ?></td>
                    <td><?= $model->meta_id ?></td>
                    <td class="text-right"><a class="btn btn-sm btn-success" href="<?= URL::route('editEventPage', array('id' => $model->id)) ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="<?= URL::route('createEventPage') ?>">Create</a>
    </div>

    <script src="/packages/jquery/dist/jquery.js"></script>
    <script src="/app/js/site.js"></script>

@stop