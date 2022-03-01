<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsFormRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news', [
            'news' => News::orderBy('title')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newNews', [
            'category' => Category::all(),
            'route' => route('news.index'),
            'title_button' => __('admin/buttons.button_back_index'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsFormRequest $request)
    {
        News::create($request->validated());

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.OneNews', [
            'news' => News::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        return view('admin.newNews', [
            'news' => $news,
            'category' => $news->category->id,
            'route' => route('news.show', $news->id),
            'title_button' => __('admin/buttons.button_back_news')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsFormRequest $request
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsFormRequest $request, News $news)
    {
        $news->update($request->validated());

        return redirect()->route('news.show', $news->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.index');
    }
}
