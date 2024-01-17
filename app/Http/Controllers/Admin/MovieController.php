<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class MovieController extends Controller
{
    public function index()
    {
        // $movies = Movie::orderBy('id','desc')->paginate(10);
        $movies = Movie::all();

        return view('admin.movies', compact('movies'));
    }

    public function create()
    {
        return view('admin.movie-create');
    }

    public function store(MovieRequest $movieRequest)
    {
        // $data = $request->except('_token');
        $payload = $movieRequest->validated();

        // File or Image Handler
        $smallThumbnail = $payload['small_thumbnail'];
        $largeThumbnail = $payload['large_thumbnail'];
        $namaFileSmall = $smallThumbnail->getClientOriginalName();
        $namaFileLarge = $largeThumbnail->getClientOriginalName();
        //move    = memindah upload file ke folder public ,
        //storeAs = memindah upload file ke bagian storage agar di ignore saat push ke github
        $smallThumbnail->storeAs('public/img/thumbnail/small_thumbnail', $namaFileSmall);
        $largeThumbnail->storeAs('public/img/thumbnail/large_thumbnail', $namaFileLarge);
        $payload['small_thumbnail'] = $namaFileSmall;
        $payload['large_thumbnail'] = $namaFileLarge;

        // dd($payload);

        Movie::Create($payload);

        return redirect()->route('admin.movies');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.movie-edit', compact('movie'));
    }

    public function update(MovieRequest $movieRequest, $id)
    {
        $payload = $movieRequest->validated();
        $movie = Movie::findOrFail($id);
        if (isset($payload['small_thumbnail'])) {
            # Save New Image
            $smallThumbnail = $payload['small_thumbnail'];
            $namaFileSmall = $smallThumbnail->getClientOriginalName();
            $smallThumbnail->storeAs('public/img/thumbnail/small_thumbnail', $namaFileSmall);
            $payload['small_thumbnail'] = $namaFileSmall;

            # Delete Old Image
            Storage::delete('public/img/thumbnail/small_thumbnail/' . $movie->small_thumbnail);
        }
        if (isset($payload['large_thumbnail'])) {
            # Save New Image
            $largeThumbnail = $payload['large_thumbnail'];
            $namaFileLarge = $largeThumbnail->getClientOriginalName();
            $largeThumbnail->storeAs('public/img/thumbnail/large_thumbnail', $namaFileLarge);
            $payload['large_thumbnail'] = $namaFileLarge;

            # Delete Old Image
            Storage::delete('public/img/thumbnail/large_thumbnail/' . $movie->large_thumbnail);
        }
        $movie->update($payload);
        return redirect()->route('admin.movies');
    }
}
