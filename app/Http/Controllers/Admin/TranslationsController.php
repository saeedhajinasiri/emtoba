<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\TranslationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class TranslationsController extends AdminController
{
    protected $section = 'translations';
    protected $form = TranslationForm::class;
    protected $model;
    protected $path;
    protected $locale;

    /**
     * RolesController constructor.
     */
    function __construct()
    {
        $this->locale = App::getLocale();
        $this->path = resource_path() . '/lang/' . $this->locale . '/';
//        $this->model = $model;
        parent::__construct();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $files = scandir($this->path);
        $translations = collect([]);

        foreach ($files as $file) {
            if (is_file($this->path . $file) && strpos($file, '.php') !== false) {
                $groupName = str_replace('.php', '', $file);
                $rows = Lang::getLoader()->load(App::getLocale(), $groupName);
                foreach ($rows as $code => $value) {
                    $translations->push((object)[
                        'group' => $groupName,
                        'code' => $code,
                        'value' => $value
                    ]);
                }
            }
        }

        //TODO array translations?
        $translations = $translations->where('group', '!=', 'validation')->groupBy('group')->toArray();
        return view('admin.translations.index', compact('translations'));
    }

    /**
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create($this->form, [
            'url' => route('admin.' . $this->section . '.store'),
            'method' => 'post'
        ]);

        return view('admin.translations.create', compact('form'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'value' => 'required',
        ]);

        $filename = trim(explode('.', $request->code)[0]);

        $rows = Lang::getLoader()->load(App::getLocale(), $filename);

        $rows = array_merge($rows, [str_replace($filename . '.', '', trim($request->code)) => $request->value]);
        ksort($rows);

        $content = "<?php\n\nreturn " . var_export($rows, true) . ';';
        file_put_contents($this->path . $filename . '.php', $content);

        Flash::info(trans('admin.insert_is_successfully'));

        $item = (object) ['id' => trim($request->code)];
        return $this->redirectToAction($request->get('action'), $item);
    }

    /**
     * @param $code
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($code, FormBuilder $formBuilder)
    {
        $codeArray = explode('.', $code);
        if (is_file($this->path . $codeArray[0] . '.php')) {
            $value = collect(Lang::getLoader()->load(App::getLocale(), trim($codeArray[0])))->get(str_replace($codeArray[0] . '.', '', $code));
        }

        $form = $formBuilder->create($this->form, [
            'url' => route('admin.' . $this->section . '.update', $code),
            'method' => 'put'
        ]);

        return view('admin.translations.edit', compact('value', 'code', 'form'));
    }

    /**
     * @param $code
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($code, Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'value' => 'required',
        ]);

        $filename = trim(explode('.', $request->code)[0]);
        $rows = Lang::getLoader()->load(App::getLocale(), $filename);

        if ($request->code != $code) {
            $rows = array_merge($rows, [str_replace($filename . '.', '', trim($request->code)) => $request->value]);
            unset($rows[str_replace($filename . '.', '', $code)]);
        } else {
            $rows[str_replace($filename . '.', '', $code)] = $request->value;
        }

        ksort($rows);

        $content = "<?php\n\nreturn " . var_export($rows, true) . ';';
        file_put_contents($this->path . $filename . '.php', $content);

        Flash::info(trans('admin.update_is_successfully'));

        $item = (object) ['id' => $request->code];
        return $this->redirectToAction($request->get('action'), $item);
    }

    /**
     * @param $code
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($code)
    {
        $codeArray = explode('.', $code);
        $rows = Lang::getLoader()->load(App::getLocale(), $codeArray[0]);
        unset($rows[str_replace($codeArray[0] . '.', '', $code)]);

        ksort($rows);

        $content = "<?php\n\nreturn " . var_export($rows, true) . ';';
        file_put_contents($this->path . $codeArray[0] . '.php', $content);

        Flash::info(trans('admin.delete_is_successfully'));

        return redirect()->route('admin.translations.index');
    }
}
