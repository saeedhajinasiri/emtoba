<?php

namespace App\Http\Controllers\Admin;


use App\Forms\Admin\UserForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class ProfileController extends Controller
{
    protected $section = 'users';
    protected $form = UserForm::class;
    protected $model;

    /**
     * RolesController constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index(FormBuilder $formBuilder)
    {
        $user = \Auth::user();

        unset($user->password);
        $form = $formBuilder->create(UserForm::class, [
            'method' => 'POST',
            'url' => route('admin.profile.update'),
            'model' => $user
        ]);

        return view('admin.users.profile', compact('form', 'user'));
    }

    public function update(StoreUserRequest $request)
    {
        $user = \Auth::user();

        $input = $request->all();
        if (!isset($input['state'])) {
            $input['state'] = 0;
        }

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

        return redirect()->route('admin.profile.index');
    }
}
