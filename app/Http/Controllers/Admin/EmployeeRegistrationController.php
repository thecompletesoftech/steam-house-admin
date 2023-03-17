<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\ManagerRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Services\EmployeeService;
use App\Services\UserService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
// use App\Services\UserIntrestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;



class EmployeeRegistrationController extends Controller
{
    protected $mls, $change_password, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $bookService, $utilityService, $intrestService;

    public function __construct()
    {

        //Data
        $this->uploads_image_directory = 'files/employeeregistrations';
        //route
        $this->index_route_name  = 'admin.employeeregistrations.index';
        $this->create_route_name = 'admin.employeeregistrations.create';
        $this->detail_route_name = 'admin.employeeregistrations.show';
        $this->edit_route_name   = 'admin.employeeregistrations.edit';

        //view files
        $this->index_view  = 'admin.employeefolder.index';
        $this->create_view = 'admin.employeefolder.create';
        $this->edit_view   = 'admin.employeefolder.edit';

        $this->detail_view = 'admin.employeefolder.details';
        $this->tabe_view   = 'admin.employeefolder.profile';


        //service files
        $this->user = new EmployeeService();
        // $this->intrestService = new UserIntrestService();
        $this->utilityService = new UtilityService();

        //mls is used for manage language content based on keys in messages.php
        $this->mls = new ManagerLanguageService('messages');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $items = $this->user->datatable();

        if($request->ajax())
        {
            return view('admin.employeefolder.employee_table',['user'=>$items]);
        } else {
            return view('admin.employeefolder.index',['user'=>$items]);
        }

    }


    public function create()
    {
        // $user =User::where('id',$id)->first();
        $manager=User::where('role','1')->get();
        $location = DB::table('location')->get();
        return view($this->create_view,compact('manager','location'));

    }

    public function store(ManagerRequest $request)
    {

        $input = $request->except(['_token', 'proengsoft_jsvalidation']);

        if(!empty($input['image'])){
            $manager_image=$request->file('image');
            $picture=FileService::fileUploaderWithoutRequest($manager_image,'employees/image/');
            $input['image']= $picture;
        }

        $haspassword=Hash::make($request->password);
        $input['password']=$haspassword;
            $battle = $this->user->create($input);
            return redirect()->route($this->index_route_name)->with('success',
            $this->mls->messageLanguage('created', 'engineer', 1));


    }


    public function show(User $user)
    {
        return view($this->detail_view,compact('user'));
    }


    public function edit($id)
    {


        $user =User::where('id',$id)->first();
        $manager=User::where('role','1')->get();
        $location = DB::table('location')->get();
        return view($this->edit_view,compact('manager','user','location'));
    }


    public function update(Request $request,User $user)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);
        if(!empty($input['image'])){
            $manager_image=$request->file('image');
            $picture=FileService::fileUploaderWithoutRequest($manager_image,'employees/image/');
            $input['image']= $picture;

        }
       if(!empty($input['password'])){
            $haspassword=Hash::make($request->password);
            $input['password']=$haspassword;

        }

        $this->user->update($input,$user);
            return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'engineer', 1));

        // return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'User update', 1));
    }

    public function destroy($id)
    {

        $result=UserService::delete_user($id);

        return redirect()->back()->withSuccess('Data Delete Successfully!');

    }





}
