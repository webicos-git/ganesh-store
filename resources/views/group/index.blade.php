@extends('layouts.master')

@section('title')
    {{ 'All Groups' }}
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary w-75 p-2">All Groups</h6>
                </div>
                <div class="col-4">
                    <a href="{{ route('group.create') }}" class="btn btn-primary float-right"><i
                            class="fa fa-plus"></i>Add Group</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Group Name</th>
                            <th class="text-center">Group Description</th>
                            <th class="text-center">{{ __('sentence.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->description }}</td>
                                <td class="text-center">
                                    <a href="{{ url('group/edit/' . $group->id) }}"
                                        class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pen"></i></a>
                                    <a href="{{ url('group/delete/' . $group->id) }}"
                                        class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
