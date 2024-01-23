<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $reqString = 'required|string';
        $reqUrl = 'required|url';
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            # code...
            return [
                'title' => $reqString . '|min:2',
                'small_thumbnail' => 'image|mimes:jpeg,jpg,png',
                'large_thumbnail' => 'image|mimes:jpeg,jpg,png',
                'trailer' => $reqUrl,
                'movie' => $reqUrl,
                'casts' => $reqString,
                'categories' => $reqString,
                'release_date' => $reqString,
                'about' => $reqString,
                'short_about' => $reqString,
                'duration' => $reqString,
                'featured' => 'required',
            ];
        } else {
            return [
                'title' => $reqString . '|min:2',
                'small_thumbnail' => 'required|image|mimes:jpeg,jpg,png',
                'large_thumbnail' => 'required|image|mimes:jpeg,jpg,png',
                'trailer' => $reqUrl,
                'movie' => $reqUrl,
                'casts' => $reqString,
                'categories' => $reqString,
                'release_date' => $reqString,
                'about' => $reqString,
                'short_about' => $reqString,
                'duration' => $reqString,
                'featured' => 'required',
            ];
        }
    }
}
