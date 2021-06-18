<?php

namespace App\Http\Controllers;
use App\Models\Article;
//это обьект запроса
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();
        //статьи передаются в шаблон
        return view('article.index', compact('articles'));
    }
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }
    public function create()
    {
        //передаем шаблон вновь созданный обьект.Он нужен для вывода формы через Form::model
        $article = new Article();
        return view('article.create', compact('article'));
    }
    //request обькт запроса для извлечения данных
    public function store(Request $request)
    {
        //проверка введенных данных
        //будут ошибки выбрасывается исключение
        //иначе возвращается данные формы
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:1000',
        ]);

        $article = new Article();

        //заполнение статьи данными из формы
        $article->fill($data);

        //при ошибках сохранения возникнет исключенияя
        $article->save();

        //редирект на указанный маршрут
        return redirect()
        ->route('articles.index');
    }
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }
    public function update(Request $request)
    {
        $article = Article::findOrFail($id);
        $data = $this->validate($request, [
            'name' => 'required|unique:articles, name,' . $article->id,
            'body' => 'required|min:100',
        ]);
        $article->fill($data);
        $article->save();
        return redirect()
        ->route('articles.index');
    }
}
