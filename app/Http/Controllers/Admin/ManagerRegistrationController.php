<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\ManagerRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Services\ManagerUserService;
use App\Services\UserService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
// use App\Services\UserIntrestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ManagerRegistrationController extends Controller
{
    protected $mls, $change_password, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $bookService, $utilityService, $intrestService;

    public function __construct()
    {

        //Data
        $this->uploads_image_directory = 'files/managerregistrations';
        //route
        $this->index_route_name  = 'admin.managerregistrations.index';
        $this->create_route_name = 'admin.managerregistrations.create';
        $this->detail_route_name = 'admin.managerregistrations.show';
        $this->edit_route_name   = 'admin.managerregistrations.edit';

        //view files
        $this->index_view  = 'admin.managerfolder.index';
        $this->create_view = 'admin.managerfolder.create';
        $this->edit_view   = 'admin.managerfolder.edit';

        $this->detail_view = 'admin.managerfolder.details';
        $this->tabe_view   = 'admin.managerfolder.profile';


        //service files
        $this->user = new ManagerUserService();
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
            return view('admin.managerfolder.manager_table',['user'=>$items]);
        } else {
            return view('admin.managerfolder.index',['user'=>$items]);
        }

    }


    public function create()
    {

        // $manager=user::where('role','1')->get();
        $location = DB::table('location')->get();
        return view($this->create_view, compact('location'));
        // return view($this->create_view);

    }

    public function store(ManagerRequest $request)
    {

        $input = $request->except(['_token', 'proengsoft_jsvalidation']);

        $image=$request->file('image');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/managerregistrations/image/');
        $image->move($destinationPath, $filename);
        $input['image']=$filename;

        $battle = $this->user->create($input);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'User add', 1));
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
        $image=$request->file('image');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/managerregistrations/image/');
        $image->move($destinationPath, $filename);
        $input['image']=$filename;

        $data=DB::table('users')->where('id',$input['id'])->update($input);

        return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'User update', 1));
        // return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'User update', 1));
    }

    public function destroy($id)
    {

        $result=DB::table('users')->where('id', $id)->delete();

        return redirect()->back()->withSuccess('Location Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('Location delete'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('Location delete'),
                'status_name' => 'error'
            ]);
        }

    }





}
