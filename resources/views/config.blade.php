@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')

        <h1>Config - {{$config->id}}</h1>
        <a href="{{url('createConfig')}}">Add Config</a>
        <a href="{{url('configList')}}">View All</a>
        <!-- Current Tasks -->
        @if (isset($config))
            <div class="panel panel-default">

                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                        <th>Config</th>
                        <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            <tr>
                                <!-- Config Details -->
                                <td>Id:</td>
                                <td class="table-text">
                                    <div>{{ $config->id }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Device Id:</td>
                                <td class="table-text">
                                    <div>{{ $config->device_id }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Config String:</td>
                                <td class="table-text">
                                    <div>{{ $config->config_string }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Apply timestamp:</td>
                                <td class="table-text">
                                    <div>{{ $config->applied }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Actions:</td>
                                <td>
                                    <form action="{{url('config', $config->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button>Delete Config</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <!-- TODO: Current Tasks -->
@endsection
