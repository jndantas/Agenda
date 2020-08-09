<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Repositories\AddressRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddressController extends Controller
{

    private $AddressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->AddressRepository = $addressRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $address = Address::create([
            'customer_id' => $request->customer,
            'cep' => $request->cep,
            'street' => $request->street,
            'district' => $request->district,
            'complement' => $request->complement,
            'number' => $request->number,
            'city' => $request->city,
            'state' => $request->state
        ]);
        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' =>  'ok'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return Response
     */
    public function show($id)
    {
        $post = Address::find($id);

        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return Response
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return Response
     */
    public function destroy($id)
    {
        $post = Address::find($id)->delete();

        return response()->json(['success'=>'Endereço Deleted successfully']);
    }
}
