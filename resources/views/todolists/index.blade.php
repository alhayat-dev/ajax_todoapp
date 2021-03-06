@extends('layouts.main')


@section('title', 'AJAX Todo App')
@section('content')

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h1 class="header-title">Todo List</h1>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('todolists.create') }}" class="btn btn-success show-todolist-modal">Create New List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @php
                    /** @var  $todolists */
                    $count = $todolists->count()
                @endphp

                <div class="alert alert-warning {{ $count ? 'hidden' : '' }}" id="no-record-alert">
                    No records found.
                </div>

                <div class="panel panel-default {{ !$count ? 'hidden' : '' }}">
                    <ul class="list-group" id="todo-list">
                        @foreach($todolists as $todolist)
                            @include('todolists.item')
                        @endforeach
                    </ul>

                    <div class="panel-footer">
                        <small><span id="todo-list-counter">{{ $count }} <span>{{ $count > 1 ? 'records' : 'record' }}</span></span></small>
                    </div>
                </div>
            </div>

           @include('todolists.todolistmodal')
           @include('todolists.taskmodal')

        </div>
    </div>

@endsection
