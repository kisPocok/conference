@extends('layouts.master')

@section('header')
    @include('includes.header')
@stop

@section('footer')
    @include('includes.footer')
@stop

@section('content')

    <div class="container">
        <h1>Location list</h1>
        <table class="table">
            <thead>
                <tr>
                    <th width="10%">#id</th>
                    <th width="30%">Title</th>
                    <th width="30%">Url</th>
                    <th>#Conf</th>
                    <th>#Channel</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($list as $model): ?>
                <tr>
                    <td><?= $model->id ?></td>
                    <td><?= $model->title ?></td>
                    <td><a href="<?= $model->map_image_url ?>" target="_blank"><?= $model->map_image_url ?></a></td>
                    <td><?= $model->conference_id ?></td>
                    <td><?= $model->channel_id ?></td>
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