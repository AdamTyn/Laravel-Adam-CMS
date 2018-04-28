<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Employee;
use App\Models\Home;
use App\Models\Navigation;
use App\Models\News;
use App\Models\Service;
use App\Models\Url;
use App\Models\Work;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $navs;
    protected $homes;
    protected $services;
    protected $news;
    protected $works;
    protected $abouts;
    protected $contacts;
    protected $employees;
    protected $urls;

    public function __construct(Request $request)
    {
        if (config('app.url') == '') {
            return view('errors.404');
        }
        $this->navs      = $request->cookie('navs') == null ? Navigation::getNavs() : json_decode($request->cookie('navs'), true);
        $this->homes     = Home::getHomes();
        $this->services  = Service::getServices();
        $this->news      = News::getNews();
        $this->works     = Work::getWorks(true);
        $this->abouts    = About::getAbouts();
        $this->contacts  = Contact::getContacts();
        $this->employees = Employee::getEmployees(true);
        $this->urls      = Url::getUrls(true);
    }
    public function index()
    {
        $navs     = $this->navs;
        $homes    = $this->homes;
        $urls     = $this->urls;
        $services = $this->services;
        array_shift($services);

        $works = $this->works;
        array_shift($works);
        $tmp               = array_slice($works['contents'], 0, 6);
        $works['contents'] = $tmp;
        $tmp               = null;

        $abouts = $this->abouts['big'][0]['detail'];
        return view('mains.fronts.index')->with(compact('navs', 'homes', 'services', 'works', 'abouts', 'urls'));
    }
    public function service()
    {
        $navs     = $this->navs;
        $services = $this->services;
        $abouts   = $this->abouts['big'][0]['detail'];

        return view('mains.fronts.service')->with(compact('navs', 'services', 'abouts'));
    }
    public function news()
    {
        $navs   = $this->navs;
        $news   = $this->news;
        $abouts = $this->abouts['big'][0]['detail'];

        return view('mains.fronts.news')->with(compact('navs', 'news', 'abouts'));
    }
    public function work()
    {
        $navs   = $this->navs;
        $works  = $this->works;
        $abouts = $this->abouts['big'][0]['detail'];

        return view('mains.fronts.work')->with(compact('navs', 'works', 'abouts'));
    }
    public function about()
    {
        $navs   = $this->navs;
        $about  = $this->abouts;
        $abouts = $this->abouts['big'][0]['detail'];

        return view('mains.fronts.about')->with(compact('navs', 'abouts', 'about'));
    }
    public function contact()
    {
        $navs     = $this->navs;
        $abouts   = $this->abouts['big'][0]['detail'];
        $contacts = $this->contacts;

        return view('mains.fronts.contact')->with(compact('navs', 'abouts', 'contacts'));
    }
    public function map()
    {
        $navs   = $this->navs;
        $abouts = $this->abouts['big'][0]['detail'];

        return view('mains.fronts.map')->with(compact('navs', 'abouts'));
    }
    public function employee()
    {
        $navs      = $this->navs;
        $about     = $this->abouts;
        $abouts    = $this->abouts['big'][0]['detail'];
        $employees = $this->employees;

        return view('mains.fronts.employee')->with(compact('navs', 'abouts', 'employees'));
    }
}
