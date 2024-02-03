<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\Content\ManagersRepository;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Manager;
use App\Models\Banner;
use App\Models\MainHeader;



class WelcomeController extends Controller
{
    public ManagersRepository $managersRepository;

    public function __construct(ManagersRepository $managersRepository)
    {
        $this->managersRepository = new ManagersRepository();
    }

    public function index()
    {
        $contacts = Contact::all();
        $managers = $this->managersRepository->getActiveManagers();
        $banners = Banner::all();
        $header = MainHeader::all();

        return view('welcome', compact('contacts', 'managers', 'banners', 'header'));
    }
}
