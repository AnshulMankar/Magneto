<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Comment;
use App\Models\permission;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only('email','password');
        if (Auth::guard('admin')->attempt($credentials,$request->remember))
        {
            $user = Admin::where('email',$request->email)->first();
            Auth::guard('admin')->login($user);
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.login')->with('status','Failed to Login');
    }
    public function logout()
    {
        if (Auth::guard('admin')->logout()){
            return redirect()->route('admin.login')->with('status','Logout Successfully!');
        }
    }
    public function datatable()
    {
        $post = Post::all();
        return view('admin.views.datatable',['posts'=>$post]);
    }

    public function changeBlogStatus(Request $request)
    {
        $user = Post::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success'=>'User status change successfully.']);
    }
    public function userinfo()
    {
        $user = User::all();
        return view('admin.views.userinfo',['users'=>$user]);
    }
    public function changeUserStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success'=>'User status change successfully.']);
    }
    public function dashboardpanel()
    {
        $user = User::all();

        $post = Post::leftJoin('categories', 'posts.category', '=', 'categories.id')
                                ->select('posts.id',
                                          'posts.title',
                                            'posts.description',
                                            'posts.created_at',
                                    'categories.category as cat')->get();
        $comment = Comment::all();
        $permission = permission::all();
        $category = Category::all();
        return view('admin.views.dashboard1',['users'=>$user,'posts'=>$post,'comments'=>$comment,'category'=>$category,'permission'=>$permission]);
    }
    public function index(Request $request)
    {

        $cat = Category::all();
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('statusview',function ($row){
                    return '<h1>hello</h1>';
                })
                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCustomer">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.dashboard1',['cat'=>$cat]);
    }

    public function create()
    {
        $post = Post::all();
        $category = Category::all();
        return view('admin.views.create',['post'=>$post,'cat'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Category::updateOrCreate(['id' => $request->Customer_id],
            ['firstName' => $request->firstName, 'info' => $request->info]);

        return response()->json(['success'=>'Customer saved successfully!']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return response()->json(['success'=>'Customer deleted!']);
    }


    }
