@extends('layouts.admin.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <a href="{{ route('admin.services.create') }}" role="button" class="btn btn-primary float-right">Add</a>

            <br>
            <br>

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Active</th></th>
                    <th scope="col">Cost</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->description }}</td>
                            <td>{{ $service->is_active ? 'Yes' : 'No' }}</td>
                            <td>{{ $service->cost }}</td>
                            <td>
                                <a href="{{ route('admin.services.edit', [$service->id]) }}">edit</a>
                                delete
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="6">No Services</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $services->links() }}

        </div>
    </div>
</div>
@endsection
