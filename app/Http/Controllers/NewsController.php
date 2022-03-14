<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function __construct(NewsModel $newsModel)
    {
        $this->NewsModel = $newsModel;
    }

    public function index()
    {
        $result = $this->NewsModel->get();

        return view('news/news_list',[
            'news' => $result
        ]);
    }

    public function create()
    {
        return view('news/news_add', [
            'action' => '/news_add/store'
        ]);
    }

    public function store(NewsRequest $request)
    {
        $news_title = $request->news_title;
        $news_content = $request->news_content;

        $result = $this->NewsModel->insert([
            'news_title' => $news_title,
            'news_content' => $news_content
        ]);
    }

    public function edit($id)
    {
        $data = $this->NewsModel
            ->where('news_id', $id)
            ->first();

        $title = $data['news_title'];
        $content = $data['news_content'];

        return view('news/news_add', [
            'action' => '/news_add/update',
            'news_id' => $id,
            'news_title' => $title,
            'news_content' => $content
        ]);
    }

    public function update(NewsRequest $request)
    {
        $id = $_POST['news_id'];
        $title = $request->news_title;
        $content = $request->news_content;

        $news = NewsModel::find($id);

        $news->news_title = $title;
        $news->news_content = $content;
        $news->save();

        return redirect('/news_list');
    }

    public function destroy($id)
    {
        NewsModel::find($id)->delete();

        return redirect('/news_list');
    }
}
