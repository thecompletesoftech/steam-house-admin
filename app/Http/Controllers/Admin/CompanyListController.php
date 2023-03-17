<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\ManagerRequest;
use App\Http\Requests\Admin\CompanyEditRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Services\CompanyListService;
use App\Services\UserService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
// use App\Services\UserIntrestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class CompanyListController extends Controller
{
    protected $mls, $change_password, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $bookService, $utilityService, $intrestService;

    public function __construct()
    {

        //Data
        $this->uploads_image_directory = 'files/companylists';
        //route
        $this->index_route_name  = 'admin.companylists.index';
        $this->create_route_name = 'admin.companylists.create';
        $this->detail_route_name = 'admin.companylists.show';
        $this->edit_route_name   = 'admin.companylists.edit';

        //view files
        $this->index_view  = 'admin.companylistfolder.index';
        $this->create_view = 'admin.companylistfolder.create';
        $this->edit_view   = 'admin.companylistfolder.edit';

        $this->detail_view = 'admin.companylistfolder.details';
        $this->tabe_view   = 'admin.companylistfolder.profile';


        //service files
        $this->user = new CompanyListService();
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
            return view('admin.companylistfolder.company_table',['user'=>$items]);
        } else {
            return view('admin.companylistfolder.index',['user'=>$items]);
        }

    }


    public function create()
    {

        $location = DB::table('location')->get();
        $manager=user::where('role','1')->get();
        return view($this->create_view, compact('manager','location'));

    }

    public function store(ManagerRequest $request)
    {

        $input = $request->except(['_token', 'proengsoft_jsvalidation']);
        if(!empty($input['image'])){
            $company_image=$request->file('image');
            $picture=FileService::fileUploaderWithoutRequest($company_image,'company/image/');
            $input['image']= $picture;
        }
        $haspassword=Hash::make($request->password);
        $input['password']=$haspassword;

            $battle = $this->user->create($input);
            return redirect()->route($this->index_route_name)->with('success',
            $this->mls->messageLanguage('created', 'company', 1));


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


    public function update(CompanyEditRequest $request,User $user)
    {



        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);
        $id=$input['id'];
        if(!empty($input['image'])){
            $company_image=$request->file('image');
            $picture=FileService::fileUploaderWithoutRequest($company_image,'company/image/');
            $input['image']= $picture;
        }

        if(!empty($input['password']))
        {
            $input['password']=Hash::make($request->password);
        }


        $this->user->update($input,$user);
        return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'company', 1));


        // return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'User update', 1));
    }

    public function destroy($id)
    {

        $result=DB::table('users')->where('id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');


    }





}
