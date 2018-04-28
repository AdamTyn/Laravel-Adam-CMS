<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Detail;
use App\Models\Employee;
use App\Models\Home;
use App\Models\Navigation;
use App\Models\News;
use App\Models\Service;
use App\Models\Url;
use App\Models\Work;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function news()
    {
        $temp = News::getNews(['picture']);
        $news = $temp['contents'];
        return view('mains.admins.pages.news', compact('news'));
    }

    public function work()
    {
        $temp  = Work::getWorks(false, ['picture']);
        $works = $temp['contents'];
        return view('mains.admins.pages.work', compact('works'));
    }
    public function employee()
    {
        $temp      = Employee::getEmployees(false, ['picture']);
        $employees = $temp['contents'];
        return view('mains.admins.pages.employee', compact('employees'));
    }
    public function urls()
    {
        $urls = Url::getUrls(false, ['picture', 'detail']);
        return view('mains.admins.pages.urls', compact('urls'));
    }
    public function service()
    {
        $temp     = Service::getServices(['picture']);
        $services = $temp['contents'];
        return view('mains.admins.pages.service', compact('services'));
    }
    public function page(Request $request)
    {
        $navs  = $request->cookie('navs') == null ? Navigation::getNavs() : json_decode($request->cookie('navs'), true);
        $homes = Home::getHomes();
        return view('mains.admins.pages.page', compact('navs', 'homes'));
    }
    public function serviceUpdate(Request $request, $id)
    {
        switch ($request->method()) {
            case 'GET':
                $temp    = Content::find(intval($id));
                $title   = Detail::find(intval($temp->title));
                $content = Detail::find(intval($temp->detail));
                $picture = Detail::find(intval($temp->picture));
                $service = ['id' => $id, 'title' => $title->detail, 'content' => $content->detail, 'picture' => $picture->detail];
                $title   = $content   = $picture   = $temp   = null;
                return view('mains.admins.pages.seconds.service')->with(compact('service'));
            default:
                $errors = ['title' => '修改失败', 'content' => '请填写完整表单', 'status' => 0];
                if ($request->has('title') && $request->has('content')) {
                    $temp = $request->only('title', 'content');
                    if (Service::updateService($temp, $id)) {
                        $errors = ['title' => '修改成功', 'content' => '所选服务内容已经修改', 'status' => 1];
                    }
                    $temp = null;
                }
                return back()->with(compact('errors'));
        }
    }
    public function serviceDelete($id)
    {
        $errors = ['title' => '删除失败', 'content' => '系统错误请联系维护人员', 'status' => 0];
        if (News::deleteNews($id)) {
            $errors = ['title' => '删除成功', 'content' => '所选服务内容已经删除', 'status' => 1];
        }
        return back()->with(compact('errors'));
    }
    public function indexPage()
    {
        $temp  = Home::getHomes();
        $homes = ['top_img' => $temp['top_img'], 'top_title' => $temp['top_txt'][0], 'top_txt' => $temp['top_txt'][1]];
        return response()->json($homes);
    }
    public function servicePage()
    {
        $services = array_slice(Service::getServices(), 0, 2);
        return response()->json($services);
    }
    public function newsPage()
    {
        $news = array_slice(News::getNews(), 0, 2);
        return response()->json($news);
    }
    public function workPage()
    {
        $works = array_slice(Work::getWorks(), 0, 2);
        return response()->json($works);
    }
    public function employeePage()
    {
        $employees = array_slice(Employee::getEmployees(), 0, 2);
        return response()->json($employees);
    }
    public function aboutPage()
    {
        $abouts = array_slice(About::getAbouts(), 0, 2);
        return response()->json($abouts);
    }
    public function contactPage()
    {
        $contacts = array_slice(Contact::getContacts(), 0, 2);
        return response()->json($contacts);
    }
    public function update(Request $request, $page)
    {
        $errors  = ['title' => '修改失败', 'content' => '网站首页', 'status' => 0];
        $picture = '';
        if ($request->hasFile('top-img')) {
            // file suffiex
            $suffiex = $request->file('top-img')->getClientOriginalExtension();
            // file name
            $filename = date('Y-m-d-H-i-s', time()) . '.' . $suffiex;
            // save file
            $request->file('top-img')->move(realpath(public_path('images')), $filename);
            // save directory
            $picture = 'images/' . $filename;
        }
        switch ($page) {
            case 'service':
                $temp              = $request->only('top-text');
                $temp['top-img']   = $picture;
                $errors['content'] = '服务内容';
                if (Service::updatePage($temp)) {
                    $errors['title']  = '修改成功';
                    $errors['status'] = 1;
                }
                break;
            case 'news':
                $temp              = $request->only('top-text');
                $temp['top-img']   = $picture;
                $errors['content'] = '公司动态';
                if (News::updatePage($temp)) {
                    $errors['title']  = '修改成功';
                    $errors['status'] = 1;
                }
                break;
            case 'work':
                $temp              = $request->only('top-text');
                $temp['top-img']   = $picture;
                $errors['content'] = '案例展示';
                if (Work::updatePage($temp)) {
                    $errors['title']  = '修改成功';
                    $errors['status'] = 1;
                }
                break;
            case 'employee':
                $temp              = $request->only('top-text');
                $temp['top-img']   = $picture;
                $errors['content'] = '海纳贤士';
                if (Employee::updatePage($temp)) {
                    $errors['title']  = '修改成功';
                    $errors['status'] = 1;
                }
                break;
            case 'about':
                $temp              = $request->only('top-text');
                $temp['top-img']   = $picture;
                $errors['content'] = '关于鼎力';
                if (About::updatePage($temp)) {
                    $errors['title']  = '修改成功';
                    $errors['status'] = 1;
                }
                break;
            case 'contact':
                $temp              = $request->only('top-text');
                $temp['top-img']   = $picture;
                $errors['content'] = '联系我们';
                if (Contact::updatePage($temp)) {
                    $errors['title']  = '修改成功';
                    $errors['status'] = 1;
                }
                break;
            default:
                $temp            = $request->only('top-title', 'top-text');
                $temp['top-img'] = $picture;
                if (Home::updatePage($temp)) {
                    $errors['title']  = '修改成功';
                    $errors['status'] = 1;
                }
                break;
        }
        $temp = $picture = null;
        return back()->with(compact('errors'));
    }
    public function newsAdd(Request $request)
    {
        switch ($request->method()) {
            case 'GET':
                return view('mains.admins.pages.seconds.news.add');
            default:
                $picture = '';
                $errors  = ['title' => '添加失败', 'content' => '请填写完整表单', 'status' => 0];
                if ($request->hasFile('picture')) {
                    // file suffiex
                    $suffiex = $request->file('picture')->getClientOriginalExtension();
                    // file name
                    $filename = date('Y-m-d-H-i-s', time()) . '.' . $suffiex;
                    // save file
                    $request->file('picture')->move(realpath(public_path('images/news')), $filename);
                    // save directory
                    $picture = 'images/news/' . $filename;
                }
                if ($request->has('title') && $request->has('content')) {
                    $temp            = $request->only('title', 'content');
                    $temp['picture'] = $picture;
                    if (News::addNews($temp)) {
                        $errors = ['title' => '添加成功', 'content' => '新的动态已经添加', 'status' => 1];
                    }
                    $temp = null;
                }
                return back()->with(compact('errors'));
        }
    }
    public function newsUpdate(Request $request, $id)
    {
        switch ($request->method()) {
            case 'GET':
                $temp    = Content::find(intval($id));
                $title   = Detail::find(intval($temp->title));
                $content = Detail::find(intval($temp->detail));
                $picture = Detail::find(intval($temp->picture));
                $news    = ['id' => $id, 'title' => $title->detail, 'content' => $content->detail, 'picture' => $picture->detail];
                $title   = $content   = $picture   = $temp   = null;
                return view('mains.admins.pages.seconds.news.update')->with(compact('news'));
            default:
                $picture = '';
                $errors  = ['title' => '修改失败', 'content' => '请填写完整表单', 'status' => 0];
                if ($request->hasFile('picture')) {
                    // file suffiex
                    $suffiex = $request->file('picture')->getClientOriginalExtension();
                    // file name
                    $filename = date('Y-m-d-H-i-s', time()) . '.' . $suffiex;
                    // save file
                    $request->file('picture')->move(realpath(public_path('images/news')), $filename);
                    // save directory
                    $picture = 'images/news/' . $filename;
                }
                if ($request->has('title') && $request->has('content')) {
                    $temp            = $request->only('title', 'content');
                    $temp['picture'] = $picture;
                    if (News::updateNews($temp, $id)) {
                        $errors = ['title' => '修改成功', 'content' => '所选动态已经修改', 'status' => 1];
                    }
                    $temp = null;
                }
                return back()->with(compact('errors'));
        }
    }
    public function newsDelete($id)
    {
        $errors = ['title' => '删除失败', 'content' => '系统错误请联系维护人员', 'status' => 0];
        if (News::deleteNews($id)) {
            $errors = ['title' => '删除成功', 'content' => '所选动态已经删除', 'status' => 1];
        }
        return back()->with(compact('errors'));
    }
    public function workAdd(Request $request)
    {
        switch ($request->method()) {
            case 'GET':
                return view('mains.admins.pages.seconds.works.add');
            default:
                $picture = '';
                $errors  = ['title' => '添加失败', 'content' => '请填写完整表单', 'status' => 0];
                if ($request->hasFile('picture')) {
                    // file suffiex
                    $suffiex = $request->file('picture')->getClientOriginalExtension();
                    // file name
                    $filename = date('Y-m-d-H-i-s', time()) . '.' . $suffiex;
                    // save file
                    $request->file('picture')->move(realpath(public_path('images/works')), $filename);
                    // save directory
                    $picture = 'images/works/' . $filename;
                }
                if ($request->has('title') && $request->has('content')) {
                    $temp            = $request->only('title', 'content');
                    $temp['picture'] = $picture;
                    if (Work::addWork($temp)) {
                        $errors = ['title' => '添加成功', 'content' => '新的案例已经添加', 'status' => 1];
                    }
                }
                return back()->with(compact('errors'));
        }
    }
    public function workUpdate(Request $request, $id)
    {
        switch ($request->method()) {
            case 'GET':
                $temp    = Content::find(intval($id));
                $title   = Detail::find(intval($temp->title));
                $content = Detail::find(intval($temp->detail));
                $picture = Detail::find(intval($temp->picture));
                $works   = ['id' => $id, 'title' => $title->detail, 'content' => $content->detail, 'picture' => $picture->detail];
                $title   = $content   = $picture   = $temp   = null;
                return view('mains.admins.pages.seconds.works.update')->with(compact('works'));
            default:
                $picture = '';
                $errors  = ['title' => '修改失败', 'content' => '请填写完整表单', 'status' => 0];
                if ($request->hasFile('picture')) {
                    // file suffiex
                    $suffiex = $request->file('picture')->getClientOriginalExtension();
                    // file name
                    $filename = date('Y-m-d-H-i-s', time()) . '.' . $suffiex;
                    // save file
                    $request->file('picture')->move(realpath(public_path('images/works')), $filename);
                    // save directory
                    $picture = 'images/works/' . $filename;
                }
                if ($request->has('title') && $request->has('content')) {
                    $temp            = $request->only('title', 'content');
                    $temp['picture'] = $picture;
                    if (Work::updateWork($temp, $id)) {
                        $errors = ['title' => '修改成功', 'content' => '所选案例已经修改', 'status' => 1];
                    }
                    $temp = null;
                }
                return back()->with(compact('errors'));
        }
    }
    public function workDelete($id)
    {
        $errors = ['title' => '删除失败', 'content' => '系统错误请联系维护人员', 'status' => 0];
        if (Work::deleteWork($id)) {
            $errors = ['title' => '删除成功', 'content' => '所选案例已经删除', 'status' => 1];
        }
        return back()->with(compact('errors'));
    }
    public function employeeAdd(Request $request)
    {
        switch ($request->method()) {
            case 'GET':
                return view('mains.admins.pages.seconds.employees.add');
            default:
                $picture = '';
                $errors  = ['title' => '添加失败', 'content' => '请填写完整表单', 'status' => 0];
                if ($request->hasFile('picture')) {
                    // file suffiex
                    $suffiex = $request->file('picture')->getClientOriginalExtension();
                    // file name
                    $filename = date('Y-m-d-H-i-s', time()) . '.' . $suffiex;
                    // save file
                    $request->file('picture')->move(realpath(public_path('images/employees')), $filename);
                    // save directory
                    $picture = 'images/employees/' . $filename;
                }
                if ($request->has('title') && $request->has('content')) {
                    $temp            = $request->only('title', 'content');
                    $temp['picture'] = $picture;
                    if (Employee::addEmployee($temp)) {
                        $errors = ['title' => '添加成功', 'content' => '新的招聘已经添加', 'status' => 1];
                    }
                    $temp = null;
                }
                return back()->with(compact('errors'));
        }
    }
    public function employeeUpdate(Request $request, $id)
    {
        switch ($request->method()) {
            case 'GET':
                $temp      = Content::find(intval($id));
                $title     = Detail::find(intval($temp->title));
                $content   = Detail::find(intval($temp->detail));
                $picture   = Detail::find(intval($temp->picture));
                $employees = ['id' => $id, 'title' => $title->detail, 'content' => $content->detail, 'picture' => $picture->detail];
                $title     = $content     = $picture     = $temp     = null;
                return view('mains.admins.pages.seconds.employees.update')->with(compact('employees'));
            default:
                $picture = '';
                $errors  = ['title' => '修改失败', 'content' => '请填写完整表单', 'status' => 0];
                if ($request->hasFile('picture')) {
                    // file suffiex
                    $suffiex = $request->file('picture')->getClientOriginalExtension();
                    // file name
                    $filename = date('Y-m-d-H-i-s', time()) . '.' . $suffiex;
                    // save file
                    $request->file('picture')->move(realpath(public_path('images/employees')), $filename);
                    // save directory
                    $picture = 'images/employees/' . $filename;
                }
                if ($request->has('title') && $request->has('content')) {
                    $temp            = $request->only('title', 'content');
                    $temp['picture'] = $picture;
                    if (Employee::updateEmployee($temp, $id)) {
                        $errors = ['title' => '修改成功', 'content' => '所选招聘已经修改', 'status' => 1];
                    }
                    $temp = null;
                }
                return back()->with(compact('errors'));
        }
    }
    public function employeeDelete($id)
    {
        $errors = ['title' => '删除失败', 'content' => '系统错误请联系维护人员', 'status' => 0];
        if (Employee::deleteEmployee($id)) {
            $errors = ['title' => '删除成功', 'content' => '所选招聘已经删除', 'status' => 1];
        }
        return back()->with(compact('errors'));
    }
    public function urlsAdd(Request $request)
    {
        switch ($request->method()) {
            case 'GET':
                return view('mains.admins.pages.seconds.urls.add');
            default:
                $picture = '';
                $errors  = ['title' => '添加失败', 'content' => '请填写完整表单', 'status' => 0];
                if ($request->hasFile('picture')) {
                    // file suffiex
                    $suffiex = $request->file('picture')->getClientOriginalExtension();
                    // file name
                    $filename = date('Y-m-d-H-i-s', time()) . '.' . $suffiex;
                    // save file
                    $request->file('picture')->move(realpath(public_path('images/urls')), $filename);
                    // save directory
                    $picture = 'images/urls/' . $filename;
                }
                if ($request->has('title') && $request->has('content')) {
                    $temp            = $request->only('title', 'content');
                    $temp['picture'] = $picture;
                    if (Url::addUrl($temp)) {
                        $errors = ['title' => '添加成功', 'content' => '新的友商已经添加', 'status' => 1];
                    }
                    $temp = null;
                }
                return back()->with(compact('errors'));
        }
    }
    public function urlsUpdate(Request $request, $id)
    {
        switch ($request->method()) {
            case 'GET':
                $temp    = Content::find(intval($id));
                $title   = Detail::find(intval($temp->title));
                $picture = Detail::find(intval($temp->picture));
                $urls    = ['id' => $id, 'title' => $title->detail, 'picture' => $picture->detail];
                $title   = $picture   = $temp   = null;
                return view('mains.admins.pages.seconds.urls.update')->with(compact('urls'));
            default:
                $picture = '';
                $errors  = ['title' => '修改失败', 'content' => '请填写完整表单', 'status' => 0];
                if ($request->hasFile('picture')) {
                    // file suffiex
                    $suffiex = $request->file('picture')->getClientOriginalExtension();
                    // file name
                    $filename = date('Y-m-d-H-i-s', time()) . '.' . $suffiex;
                    // save file
                    $request->file('picture')->move(realpath(public_path('images/urls')), $filename);
                    // save directory
                    $picture = 'images/urls/' . $filename;
                }
                if ($request->has('title')) {
                    $temp            = $request->only('title');
                    $temp['picture'] = $picture;
                    if (Url::updateUrl($temp, $id)) {
                        $errors = ['title' => '修改成功', 'content' => '所选友商已经修改', 'status' => 1];
                    }
                    $temp = null;
                }
                return back()->with(compact('errors'));
        }
    }
    public function urlsDelete($id, $uid)
    {
        $errors = ['title' => '删除失败', 'content' => '系统错误请联系维护人员', 'status' => 0];
        if (Url::deleteUrl($id, $uid)) {
            $errors = ['title' => '删除成功', 'content' => '所选友商已经删除', 'status' => 1];
        }
        return back()->with(compact('errors'));
    }
}
