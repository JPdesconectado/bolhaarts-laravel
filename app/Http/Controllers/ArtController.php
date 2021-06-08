<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Art;

class ArtController extends Controller{
    
    public function index(){

        $search = request('search');
        if($search){
            $arts = Art::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        }else{
            $arts = Art::all();
        }
        


        return view('welcome', ['arts' => $arts, 'search' => $search]);
    }

    public function create(){
        return view('arts.create');
    }

    public function store(Request $request){
        $art = new Art;
        $art->title = $request -> title;
        $art->date = $request -> date;
        $art->description = $request -> description;
        $art->items = $request-> items;

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/arts'), $imageName);
            
            $art->image = $imageName;
        }
        $user = auth()->user();
        $art->user_id = $user->id;

        $art->save();

        return redirect('/')->with('msg', 'Desenho enviado com sucesso!');
    }

    public function show($id){

        $art = Art::findOrFail($id);

        return view('arts.show', ['art' => $art]);
            
    }

    public function dashboard(){

        $user = auth()->user();

        $arts = $user->arts;

        return view('arts.dashboard', ['arts' => $arts]);
    }
    
    public function destroy($id){

        Art::findOrFail($id)->delete();

        return redirect("/dashboard")->with('msg', "Pedido apagado com sucesso!");
    }

    public function edit($id){
        $user = auth()->user();

        $art = Art::findOrFail($id);
        if($user->id != $art->user_id){
            return redirect('/dashboard');
        }else{
            return view('arts.edit', ['art' => $art]);
        }
        
    }

    public function update(Request $request){
        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/arts'), $imageName);

            $data['image'] = $imageName;

        }

        Art::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');  
    }
}