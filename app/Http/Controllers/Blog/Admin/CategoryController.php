<?php

namespace App\Http\Controllers\Blog\Admin;


use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * @var BlogCategoryRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $blogCategoryRepository;

    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //$paginator = BlogCategory::paginate(7);
        $paginator = $this->blogCategoryRepository->getAllWithPaginate(20);

        return view('Blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('Blog.admin.categories.edit',
            compact('item','categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        //dd(__METHOD__);

        $data = $request->input();

        /*
         * //Replace in observer
         *
         * if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }*/

        //Create object, but not save it in DB
        /*$item = new BlogCategory($data);
        $item->save();*/

        //Create object, and save it in DB
        $item = (new BlogCategory())->create($data);

        if ($item) {
            return redirect()->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Save successful']);
        } else {
            return back()->withErrors(['msg' => 'Error saving'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*    public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id, BlogCategoryRepository $categoryRepository)
    {
        $item = $categoryRepository->getEdit($id);

//        Test for accessors and mutators

//        $v['title_before'] = $item->title;
//
//        $item->title = 'ASDasdasdDS asdasd 1234';
//
//        $v['title_after'] = $item->title;
//        $v['getAttribute'] = $item->getAttribute('title');
//        $v['getAttributeValue'] = $item->getAttributeValue('title');
//        $v['getMutatedAttributes'] = $item->getMutatedAttributes();
//        $v['hasGetMutator for title'] = $item->hasGetMutator('title');
//        $v['toArray'] = $item->toArray();
//
//        dd($v, $item);

        if (empty($item)) {
            abort(404);
        }

        $categoryList = $categoryRepository->getForComboBox();
        return view('Blog.admin.categories.edit',
            compact('item', 'categoryList'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlogCategoryUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
//      $item = BlogCategory::find($id);

        $item = $this->blogCategoryRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "???????????? id=[{$id}] ???? ??????????????"])
                ->withInput();
        }

        $data = $request->all();

        /*
         * //Replace in observer
         *
         * if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }*/

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => '?????????????? ??????????????????']);
        } else {
            return back()
                ->withErrors(['msg' => '???????????? ????????????????????'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*    public function destroy($id)
    {
        //
    }*/
}
