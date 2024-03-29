@extends('admin.layouts.base')
@section('title', 'Movie Edit')
@section('content')
    <div class="row">
        <div class="col-md-12">

            {{-- alert here --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Movie</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.movie.update', $movie->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="e.g Guardian of The Galaxy" value="{{ $movie->title }}">
                        </div>
                        <div class="form-group">
                            <label for="trailer">Trailer</label>
                            <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Video url"
                                value="{{ $movie->trailer }}">
                        </div>
                        <div class="form-group">
                            <label for="movie">Movie</label>
                            <input type="text" class="form-control" id="movie" name="movie" placeholder="Video url"
                                value="{{ $movie->movie }}">
                        </div>
                        <div class="form-group">
                            <label for="casts">Cast</label>
                            <input type="text" class="form-control" id="casts" name="casts" placeholder="Video url"
                                value="{{ $movie->casts }}">
                        </div>
                        <div class="form-group">
                            <label for="categories">Category</label>
                            <input type="text" class="form-control" id="categories" name="categories"
                                placeholder="Video url" value="{{ $movie->categories }}">
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" placeholder="1h 39m"
                                value="{{ $movie->duration }}">
                        </div>
                        <div class="form-group">
                            <label>Release Date:</label>
                            <div class="input-group date" id="release-date" data-target-input="nearest">
                                <input type="text" name="release_date" class="form-control datetimepicker-input"
                                    data-target="#release-date" value="{{ $movie->release_date }}" />
                                <div class="input-group-append" data-target="#release-date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        {{-- file group --}}
                        <div class="form-group">
                            <label for="small-thumbnail">Upload New Small Thumbnail</label>
                            <input type="file" class="form-control" name="small_thumbnail"
                                value="{{ $movie->small_thumbnail }}">
                        </div>
                        <div class="form-group">
                            <label for="small-thumbnail">Current Small Thumbnail : </label>
                            <u>{{ $movie->small_thumbnail }}</u>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="large-thumbnail">Upload New Large Thumbnail</label>
                            <input type="file" class="form-control" name="large_thumbnail"
                                value="{{ $movie->large_thumbnail }}">
                        </div>
                        <div class="form-group">
                            <label for="small-thumbnail">Current Large Thumbnail : </label>
                            <u>{{ $movie->large_thumbnail }}</u>
                        </div>
                        <hr>
                        {{-- end of file --}}
                        <div class="form-group">
                            <label for="short-about">About</label>
                            <input type="text" class="form-control" id="about" name="about"
                                placeholder="Awesome Movie" value="{{ $movie->about }}">
                        </div>
                        <div class="form-group">
                            <label for="short-about">Short About</label>
                            <input type="text" class="form-control" id="short-about" name="short_about"
                                placeholder="Awesome Movie" value="{{ $movie->short_about }}">
                        </div>
                        <div class="form-group">
                            <label>Featured</label>
                            <select class="custom-select" name="featured">
                                <option value="0" {{ $movie->featured == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ $movie->featured == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
