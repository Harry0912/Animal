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
        $news = $this->NewsModel->get();
        
        $breadcrumb[] = [
            'name' => '最新消息',
            'active' => 'active'
        ];

        return view('news/news_list',[
            'news' => $news,
            'breadcrumb' => $breadcrumb
        ]);
    }

    public function create()
    {
        $breadcrumb[] = [
            'name' => '最新消息',
            'active' => '/news_list'
        ];
        $breadcrumb[] = [
            'name' => '新增',
            'active' => 'active'
        ];
        
        return view('news/news_add', [
            'action' => '/news_add/store',
            'buttonId' => 'newsAdd',
            'buttonName' => '新增',
            'breadcrumb' => $breadcrumb
        ]);
    }

    public function store(NewsRequest $request)
    {
        $result = $this->NewsModel->insert([
            'news_title' => $request->news_title,
            'news_time' => $request->news_time,
            'news_content' => $request->news_content
        ]);
    }

    public function edit($id)
    {
        $data = $this->NewsModel
            ->where('news_id', $id)
            ->first();

        $title = $data['news_title'];
        $time = $data['news_time'];
        $content = $data['news_content'];

        $breadcrumb[] = [
            'name' => '最新消息',
            'active' => '/news_list'
        ];
        $breadcrumb[] = [
            'name' => $title,
            'active' => 'active'
        ];

        return view('news/news_add', [
            'buttonId' => 'newsEdit',
            'buttonName' => '儲存',
            'news_id' => $id,
            'news_title' => $title,
            'news_time' => $time,
            'news_content' => $content,
            'breadcrumb' => $breadcrumb
        ]);
    }

    public function update(NewsRequest $request, $id)
    {
        $news = NewsModel::find($id);

        $news->news_title = $request->news_title;
        $news->news_time = $request->news_time;
        $news->news_content = $request->news_content;
        $news->save();
    }

    public function destroy($id)
    {
        $this->NewsModel->find($id)->delete();
    }

    public function search($keyword)
    {
        $news = $this->NewsModel->where('news_title', 'like', '%'.$keyword.'%')->get();

        return view('news/news_list', [
            'news' => $news
        ]);
    }
}
