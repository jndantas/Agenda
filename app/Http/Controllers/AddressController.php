<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Repositories\AddressRepository;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;


/**
 * Class AddressController
 * @package App\Http\Controllers
 */
class AddressController extends Controller
{

    /**
     * @var AddressRepository
     */
    private $AddressRepository;

    /**
     * AddressController constructor.
     * @param AddressRepository $addressRepository
     */
    public function __construct(AddressRepository $addressRepository)
    {
        $this->AddressRepository = $addressRepository;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param AddressRequest $request
     * @return JsonResponse
     */
    public function store(AddressRequest $request)
    {
        try {
            $this->AddressRepository->createAddress($request);
            return response()->json(['code'=>200, 'message'=>'Novo Endereço criado com sucesso','data' =>  'ok'], 200);

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
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->AddressRepository->deleteAddress($id);
            return response()->json(['success'=>'Endereço Deleted successfully']);

        } catch (QueryException $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        } catch (Exception $e) {
            return response()->json(["error" => true, 'message' => $e->getMessage()]);
        }

    }
}
