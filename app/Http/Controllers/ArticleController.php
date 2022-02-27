<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class ArticleController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $article = Article::where('ID_ARTICLE', $request->get('id_article'))->with( $relations )->first();

        return view('models.article.show', ['article' => $article]);
    }
}
