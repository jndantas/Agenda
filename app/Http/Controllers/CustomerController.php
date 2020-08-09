<?php

namespace App\Http\Controllers;


use App\Http\Requests\CustomerRequest;
use App\Repositories\CustomerRepository;
use App\Repositories\AddressRepository;
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
    /**
     * @var CustomerRepository
     */
    private $CostumerRepository;
    /**
     * @var AddressRepository
     */
    private $AddressRepository;

    /**
     * CustomerController constructor.
     * @param CustomerRepository $costumerRepository
     * @param AddressRepository $addressRepository
     */
    public function __construct(CustomerRepository $costumerRepository, AddressRepository $addressRepository)
    {
        $this->CostumerRepository = $costumerRepository;
        $this->AddressRepository = $addressRepository;
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
     * @param CustomerRequest $request
     * @return Application|JsonResponse|RedirectResponse|Redirector
     */
    public function store(CustomerRequest $request)
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
     * @param $id
     * @return Application|Factory|Response|View
     */
    public function show($id)
    {
        $customer = $this->CostumerRepository->getCustomerId($id);

        $addresses = $this->AddressRepository->getAddressByCustomers($id);
        return view('customer.show', ['customer' => $customer, 'addresses' => $addresses]);
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

    public function changeAddress(Request $request)
    {
        try {
            $this->CostumerRepository->updateAddress($request);
            return response()->json(['success'=>'Endereço Principal atualizado com sucesso.']);

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

            return redirect(route('customer.index'));
        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }

    }
}
