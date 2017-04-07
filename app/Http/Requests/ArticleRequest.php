<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Article;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $article= Article::find($this->article);

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'title'      => 'min:10|required|unique:articles',
                    'content'    => 'min:10|required',
                    'image'      => 'required|image'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                   'title'      => 'min:10|required|unique:articles,title,'.$article->id,
                   'category_id'=> 'required',
                   'preview'    => 'min:10|required',
                   'content'    => 'min:10|required',
                   'tags'       => 'required|min:1',
                   'statu_id'  => 'required'
                ];
            }
            default:break;
        }
    }
}
