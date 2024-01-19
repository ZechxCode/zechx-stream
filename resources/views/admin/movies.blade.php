@extends('admin.layouts.base')
@section('title', 'Movies')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Movies</h3>
                </div>

                {{-- @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif --}}


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.movie.create') }}" class="btn btn-warning">Create Movie</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table id="movie" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Small Thumbnail</th>
                                        <th>Large Thumbnail</th>
                                        <th>Categories</th>
                                        <th>Casts</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movies as $mov)
                                        <tr>
                                            <td>{{ $mov->id }}</td>
                                            <td>{{ $mov->title }}</td>
                                            {{-- gunakan artisan storage:link agar storage dapat dilihat dan di link ke folder public --}}
                                            <td>
                                                <img src="{{ asset('storage/img/thumbnail/small_thumbnail/' . $mov->small_thumbnail) }}"
                                                    alt="{{ $mov->small_thumbnail }}" width="30%">
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/img/thumbnail/large_thumbnail/' . $mov->large_thumbnail) }}"
                                                    alt="{{ $mov->large_thumbnail }}" width="30%">
                                            </td>
                                            <td>{{ $mov->categories }}</td>
                                            <td>{{ $mov->casts }}</td>
                                            <td>
                                                <a class="btn btn-secondary"
                                                    href="{{ route('admin.movie.edit', $mov->id) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form method="post" action="{{ route('admin.movie.destroy', $mov->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $('#movie').DataTable();
    </script>
@endsection
