<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['clients']=client::paginate(10);
        return view('clients.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields=[
            'Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Email'=>'required|email',
            'Tipo_Identificacion'=>'required|string|max:100',
            'Numero_Identificacion'=>'required|integer'
        ];

        $message=[
            'required'=>'El campo :attribute es requerido'
        ];

        $this->validate($request, $fields, $message);


        $clientData = request()->except('_token');
        client::insert($clientData);

        return redirect('clients')->with('message','Cliente agregado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client=client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fields=[
            'Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Email'=>'required|email',
            'Tipo_Identificacion'=>'required|string|max:100',
            'Numero_Identificacion'=>'required|integer'
        ];

        $message=[
            'required'=>'El campo :attribute es requerido'
        ];

        $this->validate($request, $fields, $message);

        $clientData = request()->except(['_token','_method']);
        client::where('id','=',$id)->update($clientData);

        $client=client::findOrFail($id);

        return redirect('clients')->with('message','Cliente modificado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        client::destroy($id);
        return redirect('clients')->with('message','Cliente borrado con éxito!');
    }
}
