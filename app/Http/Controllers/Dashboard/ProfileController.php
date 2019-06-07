<?php

namespace App\Http\Controllers\Dashboard;

use App\Forms\Admin\UserForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreUserRequest;
use App\Location;
use Illuminate\Support\Facades\Hash;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit(FormBuilder $formBuilder)
    {
    	$user = \Auth::user();

        unset($user->password);
        $form = $formBuilder->create(UserForm::class, [
            'method' => 'POST',
            'url' => route('dashboard.profile.update'),
            'model' => $user
        ]);

        $locations = Location::root()->descendantsAndSelf()->get()->pluck('dashedTitle', 'id')->toArray();

        return view('dashboard.profile', compact('form', 'user', 'locations'));
    }

    public function update(StoreUserRequest $request)
    {
        $user = \Auth::user();

        $input = $request->all();

        if ($input['password'] == '') {
            unset($input['password']);
        } else {
            $input['password'] = Hash::make($input['password']);
        }

        if ($request->hasFile('avatar')) {
            $imageName = time() . $request->file('avatar')->getClientOriginalName();
            $img = $request->file('avatar')->move(
                base_path() . '/public/images/user/', $imageName
            );

            $input['avatar'] = $img->getFilename();
            if (\File::isFile(base_path() . '/public/images/user/' . $user->avatar)) {
                \File::delete(base_path() . '/public/images/user/' . $user->avatar);
            }
        }

        $user->update($input);

        Flash::info(trans('admin.update_is_successfully'));

        return redirect()->route('dashboard.profile.edit');
    }
}
