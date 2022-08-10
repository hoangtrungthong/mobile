<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManageUserController extends Controller
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository
            ->where('role_id', config('const.user'))
            ->paginate(config('const.pagination'));

        return view('admin.users.index', compact('users'));
    }

    public function blockUser(Request $request)
    {
        User::where('id', $request->id)
            ->update([
                'status' => config('const.users.status.block'),
            ]);

        return response()->json([
            'data' => 'Update successfully',
            'code' => Response::HTTP_OK,
        ]);
    }

    public function activeUser(Request $request)
    {
        User::where('id', $request->id)
            ->update([
                'status' => config('const.users.status.active'),
            ]);

        return response()->json([
            'data' => 'Update successfully',
            'code' => Response::HTTP_OK,
        ]);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            return false;
        }

        $user->ratings()->forceDelete();
        $user->comments()->forceDelete();
        $user->orders()->forceDelete();
        $user->forceDelete();
        
        return response()->json([
            'data' => 'Delete successfully',
            'code' => Response::HTTP_OK,
        ]);
    }
}
