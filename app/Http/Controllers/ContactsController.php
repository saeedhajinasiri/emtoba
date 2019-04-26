<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Enums\EContactStatus;
use App\Faq;
use App\Enums\EState;
use App\Forms\Site\ContactForm;
use App\Http\Requests\StoreContactsRequest;
use App\Page;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class ContactsController extends Controller
{
    protected $settings;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function create(FormBuilder $formBuilder)
    {
        $content = Page::query()
            ->where('page_name', 'contacts')
            ->first();

        $contact = new Contact();
        $form = $formBuilder->create(ContactForm::class, [
            'method' => 'POST',
            'url' => route('site.contacts.store'),
            'model' => $contact
        ]);

        $settings = Cache::rememberForever('siteSettings', function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });

        return view('site.contacts.form', compact('content', 'settings', 'form'));
    }
    /**
     * Store advertise form.
     * @param StoreContactsRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(StoreContactsRequest $request)
    {
        $data = $request->except(['submit', '_token', 'g-recaptcha-response']);

        $user = Auth::user();
        $data['user_id'] = $user->id;
        $data['created_by'] = $user->id;
        $data['updated_by'] = $user->id;
        $data['state'] = EState::disabled;
        $data['status'] = EContactStatus::pending;


        $item = Contact::create($data);
        Flash::info(trans('site.contacts.message.your_envelope_has_been_sent_successfully'));
        return redirect()->to(route('site.contacts.create'));
    }
}
