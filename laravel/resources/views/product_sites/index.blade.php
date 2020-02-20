@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Product Sites</h1>
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <a class="btn btn-primary" href="{{ route('product_sites.create') }}">Create</a>
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <form method="GET" action="{{ route('product_sites.index') }}">
                    <div class="form-group row">
                        <label for="companyId" class="col-sm-1 col-form-label">Search:</label>
                        <div class="col-sm-11 d-flex">
                            <input class="form-control mr-2" type="text" name="search" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-secondary">search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Url</th>
                    <th>Actions</th>
                    </thead>
                    @foreach($product_sites as $product_site)
                    <tr>
                        <td>{{ $product_site->id }}</td>
                        <td>{{ $product_site->name }}</td>
                        <td>{{ $product_site->url }}</td>
                        <td class="d-flex">
                            <a class="btn btn-sm btn-info mr-1"
                               href="{{ route('product_sites.edit', ['product_site' => $product_site]) }}">Edit</a>
                            <form action="{{ route('product_sites.destroy', ['product_site' => $product_site]) }}"
                                  method="POST">
                                @csrf

                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $product_sites->links() }}
            </div>
        </div>
    </div>
@endsection
