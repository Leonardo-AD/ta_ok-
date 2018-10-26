<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EleicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eleicaos=\App\Eleicao::all();
        return view('index',compact('eleicaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $passport= new \App\Eleicao;
        $passport->name=$request->get('name');
        $passport->email=$request->get('sigla');
        $passport->number=$request->get('number');
        $date=date_create($request->get('address'));
        // $format = date_format($date,"Y-m-d");
        $passport->date = strtotime($format);
        // $passport->office=$request->get('office');
        // $passport->filename=$name;
        $passport->save();
        
        return redirect('passports')->with('success', 'Information has been added');
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
        $eleicao = \App\Eleicao::find($id);
        return view('edit',compact('eleicao','id'));
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
        $eleicao= \App\Eleicao::find($id);
        $eleicao->name=$request->get('name');
        $eleicao->sigla=$request->get('sigla');
        $eleicao->number=$request->get('number');
        $eleicao->address=$request->get('address');
        $eleicao->save();
        return redirect('eleicaos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eleicao = \App\Eleicao::find($id);
        $eleicao->delete();
        return redirect('eleicaos')->with('success','Information has been  deleted');
    }
}
