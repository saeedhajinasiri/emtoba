<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\CategoryForm;
use App\Http\Requests\StoreCategoriesRequest;
use App\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Kris\LaravelFormBuilder\Facades\FormBuilder;

class CategoriesController extends AdminController
{
    protected $title;
    protected $path;
    protected $section = 'categories';
    protected $form = CategoryForm::class;
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Get all of node trees
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tree()
    {
        try {
            $root = $this->model->root();
            if ($root) {
                $items = $root->getDescendants();
            }

            $items = $this->recursiveNestable($items->toArray(), $root->id);

            return view('admin.categories.tree', compact('items', 'root'))->with('parentId', $root->id);
        } catch (Exception $e) {
            return $this->returnWithError($e->getMessage());
        }
    }

    /**
     * Check the all nodes with recursive method
     *
     * @param $elements
     * @param int $parentId
     * @return array
     */
    protected function recursiveNestable($elements, $parentId = 0)
    {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->recursiveNestable($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }

    public function sort(Request $request)
    {
//        try {
        $node = $this->model->find($request->input('id'));

        // Before node exists
        if ($request->has('before')) {
            $beforeNode = $this->model->find($request->input('before'));
            $node->makeNextSiblingOf($beforeNode);
        } else {
            if ($request->has('parent')) {
                $parent = $this->model->find($request->input('parent'));
                $node->makeFirstChildOf($parent);
            } else if (!$request->has('parent')) {
                $root = $this->model->root();
                $node->makeFirstChildOf($root);
            }
        }
        return response()->json(['status' => 1]);
//        } catch (Exception $exception) {
//            return $this->returnWithError($exception->getMessage());
//        }
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function quickCreate()
    {
        try {
            $form = FormBuilder::create($this->form, [
                'url' => route('admin.categories.quickStore'),
                'method' => 'post'
            ]);
        } catch (Exception $e) {
            return $this->returnWithError($e->getMessage());
        }

        return view('admin.categories.quickForm', compact('form'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function quickEdit($id)
    {

        try {
            $item = $this->model->findOrFail($id);
            $form = FormBuilder::create($this->form, [
                'url' => route('admin.categories.quickUpdate', $id),
                'method' => 'put',
                'model' => $item->toArray()
            ]);

        } catch (Exception $exception) {
            return $this->returnWithError($exception->getMessage());
        }

        return view('admin.categories.quickForm', compact('form', 'item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoriesRequest $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function quickStore(StoreCategoriesRequest $request)
    {
        try {
            $data = $request->all();
            $data['created_by'] = \Auth::id();
            $data['updated_by'] = \Auth::id();
            $data['slug'] = $this->slugify($data['slug']);
            $item = $this->model->create($data);

            //set parent
            $parent_id = $request->get('parent_id');
            if ($parent_id) {
                $item->makeChildOf($this->model->find($parent_id));
            } else {
                $item->makeRoot();
            }

        } catch (Exception $exception) {
            return $this->returnWithError($exception);
        }

        return view('admin.categories.nestableItem', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param StoreCategoriesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function quickUpdate($id, StoreCategoriesRequest $request)
    {
        try {
            $item = $this->model->findOrFail($id);

            $data = $request->all();
            $data['updated_by'] = \Auth::id();
            $data['slug'] = $this->slugify($data['slug']);

            $item->update($data);
        } catch (Exception $exception) {
            return $this->returnWithError($exception);
        }

        return response()->json(['title' => $data['title']]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function quickDestroy($id)
    {
        try {
            $item = $this->model->findOrFail($id);

            $item->delete();

        } catch (Exception $e) {
            return $this->returnWithError($e);
        }

        return response()->json(['success' => 1]);
    }
}
