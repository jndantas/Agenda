<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $UserRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('admin');
        $this->UserRepository = $userRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|JsonResponse|View
     */
    public function index()
    {
        try {
            $users = $this->UserRepository->getAll();

            return view('user.index', ['users' => $users]);
        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|JsonResponse|RedirectResponse|View
     */
    public function create()
    {
        try {
            return view('user.create');
        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return JsonResponse|RedirectResponse
     */
    public function store(UserRequest $request)
    {
        try {
            $this->UserRepository->createUser($request);
            return redirect()->route('user.index');

        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }

    }

    /**
     * @param $id
     * @return JsonResponse|RedirectResponse
     */
    public function makeAdmin($id)
    {
        try {
            $this->UserRepository->makeAdmin($id);
            return redirect()->back();

        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return JsonResponse|RedirectResponse
     */
    public function not_admin($id)
    {
        try {
            $this->UserRepository->notAdmin($id);
            return redirect()->back();

        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function changeStatus(Request $request)
    {
        try {
            $this->UserRepository->changeStatus($request);
            return response()->json(['success'=>'Status mudado com sucesso.']);

        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse|JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->UserRepository->deleteUser($id);
            return redirect()->route('user.index');

        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }


    }
}
