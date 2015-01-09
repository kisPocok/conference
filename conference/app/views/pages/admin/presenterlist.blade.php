@extends('layouts.master')

@section('header')
    @include('includes.header')
@stop

@section('footer')
    @include('includes.footer')
@stop

@section('content')

    <div class="container">
        <h1>Presenter list</h1>
        <table class="table">
            <thead>
                <tr>
                    <th width="10%">#id</th>
                    <th width="40%">Name</th>
                    <th width="15%">Title</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($list as $model): ?>
                <tr>
                    <td><?= $model->id ?></td>
                    <td><?= $model->name ?></td>
                    <td><?= $model->title ?></td>
                    <td class="text-right"><a class="btn btn-sm btn-success" href="<?= URL::route('editPresenterPage', array('id' => $model->id)) ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="<?= URL::route('createPresenterPage') ?>">Create</a>
    </div>

    <script src="/packages/jquery/dist/jquery.js"></script>
    <script src="/app/js/site.js"></script>

@stop