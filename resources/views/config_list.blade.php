@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')

        <h1>Device Configs</h1>
        <a href="{{url('createConfig')}}">Add Config</a>
        <!-- Current Tasks -->
        @if (count($configs) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Configs
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                        <th>Config</th>
                        <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        @foreach ($configs as $config)
                            <tr>
                                <!-- Config Details -->
                                <td class="table-text">
                                    <div>{{ $config->id }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $config->device_id }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $config->config_string }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $config->applied }}</div>
                                </td>

                                <!-- View action -->
                                <td>
                                    <a href="{{url('config', $config->id) }}">View {{$config->id}}</a>
                                </td>
                                <!-- Delete Button -->
                                <td>
                                    <form action="{{url('config', $config->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button>Delete Config</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <!-- TODO: Current Tasks -->
@endsection
