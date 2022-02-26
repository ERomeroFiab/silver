<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class ArticleController extends Controller
{
    public function show($id_article)
    {
        $relations = [
            //
        ];
        $article = Article::where('ID_ARTICLE', $id_article)->with( $relations )->first();

        return view('models.article.show', ['article' => $article]);
    }
}
