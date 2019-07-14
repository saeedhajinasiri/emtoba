<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\SettingForm;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;


class SettingsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function index(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(SettingForm::class, [
            'method' => 'post',
            'url' => route('admin.settings.update')
        ]);

        return view('admin.settings.form', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $columns = Setting::getColumns();
        foreach ($columns as $column) {
            $this->saveSetting($column['key'], $request);
        }

        Cache::forget('siteSettings');

        Flash::info(trans('admin.update_is_successfully'));

        return redirect()->route('admin.settings.index');
    }

    protected function saveSetting($key, Request $request){
        $value = $request->get($key);

        $field = Setting::where('key', $key)->first();

        if (in_array($field->type, ['image', 'file'])) {
            $field->value = $this->uploadFile($key, $request, $field->value);
        } else {
            $field->value = $value;
        }

        $field->save();
    }

    private function uploadFile($key, Request $request, $value = null)
    {
        if ($request->hasFile($key)) {
            $imageName = $request->file($key)->getClientOriginalName();
            $img = $request->file($key)->move(
                base_path() . '/public/uploads/images/setting/', $imageName
            );

            if (\File::isFile(base_path() . '/public/uploads/images/setting/' . $value)) {
                \File::delete(base_path() . '/public/uploads/images/setting/' . $value);
            }

            return $img->getFilename();
        }
        return $value;
    }
}
