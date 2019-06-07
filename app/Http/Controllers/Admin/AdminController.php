<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EState;
use App\Forms\Admin\AdminForm;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class AdminController extends Controller
{
    protected $section = '';
    protected $form = AdminForm::class;
    protected $model;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        try {
            $items = $this->model->orderBy('id', 'DESC')->paginate(10);

            return view('admin.' . $this->section . '.index', compact('items'));
//        } catch (Exception $exception) {
//            return $this->returnWithError($exception->getMessage());
//        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($id)
    {
        $item = $this->model->findOrFail($id);

        return view('admin.' . $this->section . '.show', compact('item'));
    }

    /**
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(FormBuilder $formBuilder)
    {
//        try {
        $form = $formBuilder->create($this->form, [
            'url' => route('admin.' . $this->section . '.store'),
            'method' => 'post'
        ]);

        return view('admin.' . $this->section . '.form', compact('form'));
//        } catch (Exception $exception) {
//            return $this->returnWithError($exception->getMessage());
//        }
    }

    /**
     * @param $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        try {
            $item = $this->model->findOrFail($id);

            $form = $formBuilder->create($this->form, [
                'url' => route('admin.' . $this->section . '.update', $id),
                'method' => 'put',
                'model' => $item
            ]);

        } catch (Exception $e) {
            return $this->returnWithError($e->getMessage());
        }

        return view('admin.' . $this->section . '.form', compact('form', 'item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $item = $this->model->findOrFail($id);
        $item->delete();

        return redirect()->route('admin.' . $this->section . '.index');
    }

    /**
     * @param $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function returnWithMessage($message)
    {
        Flash::info($message);
        return Redirect::back();
    }

    protected function returnWithError($message)
    {
        Flash::error($message);
        return Redirect::route('admin.' . $this->section . '.index');
    }

    /**
     * @param $action
     * @param $item
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectToAction($action, $item)
    {
        switch ($action) {
            case 'SaveAndReload':
                $redirectResponse = Redirect::route('admin.' . $this->section . '.edit', ['id' => $item->id]);
                break;
            case 'SaveAndShow':
                $redirectResponse = Redirect::route('admin.' . $this->section . '.show', ['id' => $item->id]);
                break;
            case 'SaveAndNew':
                $redirectResponse = Redirect::route('admin.' . $this->section . '.create');
                break;
            case 'SaveAndClose':
            default:
                $redirectResponse = Redirect::route('admin.' . $this->section . '.index');
                break;
        }
        return $redirectResponse;
    }

    /**
     * Create slug from a string
     *
     * @param $string
     * @param string $separator
     * @return string
     */
    public function slugify($string, $separator = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $separator, mb_strtolower($string));

        return $text;
    }

    /**
     * Sync up the list of menus in the database
     *
     * @param $item
     * @param $request
     */
    protected function syncPhotos($item, $request)
    {
        $user = Auth::user();
        if ($request->has('galleries')) {
            foreach ($request->file('galleries') as $gallery) {
                if ($gallery) {
                    $mimeType = $gallery->getMimeType();
                    $imageName = time() . $gallery->getClientOriginalName();
                    $img = $gallery->move(
                        $this->path, $imageName
                    );

                    $item->media()->create([
                        'name' => $imageName,
                        'path' => $this->path,
                        'disk' => 'public',
                        'url' => url($this->relative_path . $imageName),
                        'mime_type' => $mimeType,
                        'user_id' => $user->id,
                        'created_by' => $user->id,
                        'updated_by' => $user->id,
                        'state' => EState::enabled,
                        'approved_at' => Carbon::now(),
                    ]);
                }
            }
        }
    }
}
