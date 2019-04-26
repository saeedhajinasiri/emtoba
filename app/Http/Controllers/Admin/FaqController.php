<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\FaqForm;
use App\Faq;
use App\Http\Requests\StoreFaqRequest;
use Laracasts\Flash\Flash;

class FaqController extends AdminController
{
    protected $title;
    protected $path;
    protected $section = 'faq';
    protected $form = FaqForm::class;
    protected $model;
    protected $single = 'faq';

    public function __construct(Faq $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Show all faq with pagination
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = Faq::query()->orderBy('id', 'DESC')->paginate(10);

        return view('admin.' . $this->section . '.index', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFaqRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreFaqRequest $request)
    {
        $input = $request->all();

        $userId = \Auth::id();
        $input['created_by'] = $userId;
        $input['updated_by'] = $userId;

        $item = $this->model->create($input);

        Flash::info(trans('admin.insert_is_successfully'));

        return redirect()->route('admin.faq.edit', $item->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Faq $faq
     * @param StoreFaqRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Faq $faq, StoreFaqRequest $request)
    {
        $input = $request->all();
        if (!isset($input['state'])) {
            $input['state'] = 0;
        }

        $input['slug'] = $this->slugify($input['slug']);

        $faq->update($input);

        Flash::info(trans('admin.update_is_successfully'));

        return redirect()->route('admin.faq.edit', $faq->id);
    }
}
