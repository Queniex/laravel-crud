<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $name = $request->name;
        // return response()->json(['message' => $name]);

        // $requestData = $request->all();
        // return response()->json(['Data' => $requestData]);

        $this->validate($request, [
            'name' => 'required|string',
            'level_id' => 'required|integer',
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'level_id' => $request->level_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
    
        $user = User::create($data);
    
        if ($user) {
            return response()->json(['Data' => $data]);
        } else {
            return response()->json(['Data' => 'Error']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'level_id' => 'required|integer',
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'level_id' => $request->level_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
    
        $edit = User::findOrFail($id);
        $edit->update($edit);
    
        if ($edit) {
            return response()->json(['Data' => $data]);
        } else {
            return response()->json(['Data' => 'Error']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
