@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col">
                <a class="btn btn-secondary mb-2" href="{{ route('product_sites.index') }}">Back</a>
                <form action="{{ route('product_sites.update', ['product_site' => $product_site]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input id="name" class="form-control" type="text" name="product_site-name"
                                   value="{{ $product_site->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                            <input id="name" class="form-control" type="text" name="product_site-url"
                                   value="{{ $product_site->url }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

