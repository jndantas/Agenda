<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Exception;


class CustomerController extends Controller
{
    private $CostumerRepository;

    public function __construct(CustomerRepository $costumerRepository)
    {
        $this->CostumerRepository = $costumerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|JsonResponse|View
     */
    public function index()
    {
        try {
            $customers = $this->CostumerRepository->getCustomers();

            return view('customer.index', ['customers' => $customers]);
        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|JsonResponse|View
     */
    public function create()
    {
        try {
            return view('customer.create');
        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|JsonResponse|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        try {
            $this->CostumerRepository->createCustomer($request);
            return redirect(route('customer.index'));

        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Costumer  $costumer
     * @return Response
     */
    public function show(Customer $costumer)
    {
        return view('customer.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|JsonResponse|View
     */
    public function edit($id)
    {
        try {
            $customer = $this->CostumerRepository->getCustomerId($id);

            return view('customer.create', ['customer' => $customer]);
        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Application|JsonResponse|RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        try {
            $this->CostumerRepository->updateCustomer($request, $id);

            return redirect(route('customer.index'));
        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse|RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $this->CostumerRepository->deleteCustomer($id);

            return redirect()->back();
        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }

    }
}
