<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

//引入一下自己创造的Handle.
use App\Handlers\ImageUploadHandler;

class UsersController extends Controller
{
    //
    public function show(User $user){
        return view('users.show',compact('user'));
    }

    public function edit(User $user){
        return view('users.edit',compact('user'));
    }

    public function update(UserRequest $request,ImageUploadHandler $uploader,User $user){
        $data = $request->all();

        //头像要储存起来的嘛~
        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 416);
            //如果上面返回false就是没成功,估计是扩展名不允许.
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data); //本来想引入$user的不行,实际上需要引入所有传递的参数.
        return redirect()->route('users.show',$user->id)->with('success','个人资料更新成功!');
    }
}
