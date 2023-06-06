<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Family;
use App\Models\Family_plant;
use App\Models\Plant;
use Illuminate\Http\Request;
use function Sodium\compare;

class FamilyController extends Controller
{
    public function index()
    {
        $city=City::all();
        return view('family.index',compact('city'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'nationalId'=>'required',
            'phone'=>'required',
        ]);

        $family=Family::create($request->all());

        $family=Family::all();
        $inf=[];
        $ind=0;

        foreach ($family as $data)
        {
            $inf[$ind]['id']=$data->id;
            $inf[$ind]['name']=$data->name;
            $inf[$ind]['phone']=$data->phone;
            //------------------------------------------
            $inf[$ind]['city_name']='dose not has a city yet';
            $city=City::find($data->city_id);
            if($city)
                $inf[$ind]['city_name']=$city->name;
            //---------------------------------------------
            $inf[$ind]['plant_name']='dose not has a plants yet';
            //---------------------------------------------
            $ind++;
        }
        $city=City::all();
        $plant=Plant::all();
        return view('family.show',compact('inf','city','plant'));
    }
    public function addCity(Request $request)
    {
        $family=Family::find($request->input('family_id'));
        $city=City::find($request->input('city_id'));

        $family->city()->associate($city);
        $family->save();

        $family=Family::all();
        $inf=[];
        $ind=0;
        foreach ($family as $data)
        {
            $inf[$ind]['id']=$data->id;
            $inf[$ind]['name']=$data->name;
            $inf[$ind]['phone']=$data->phone;
            $inf[$ind]['city_name']='dose not has a city yet';
            $city=City::find($data->city_id);
            if($city)
                $inf[$ind]['city_name']=$city->name;
            $ind++;
        }
        $city=City::all();
        $plant=Plant::all();
        return view('family.show',compact('inf','city','plant'));
    }
    public function addPlant(Request $request)
    {
        $x=[];
        $family=Family::find($request->input('family_id'));
        if($family!==null)
            $family->plants()->attach($request['plants_id']);
        $family->save();
//        $plantInf=$family->plants()->get($request['plants_id']);
        $family=Family::all();
        $inf=[];
        $ind=0;
        foreach ($family as $data)
        {
            $inf[$ind]['id']=$data->id;
            $inf[$ind]['name']=$data->name;
            $inf[$ind]['phone']=$data->phone;
            //=============================================
            $inf[$ind]['city_name']='dose not has a city yet';
            $city=City::find($data->city_id);
            if($city)
                $inf[$ind]['city_name']=$city->name;
            //=================================================
//            dd($data->plants()->get());
            $ind++;
        }
        $city=City::all();
        $plant=Plant::all();
        $x=5;

        return view('family.show',compact('inf','city','plant'))->with($x);
    }

    public function show()
    {
        $family=Family::all();
        $inf=[];
        $ind=0;
        foreach ($family as $data)
        {
            $inf[$ind]['id']=$data->id;
            $inf[$ind]['name']=$data->name;
            $inf[$ind]['phone']=$data->phone;
            //=============================================
            $inf[$ind]['city_name']='dose not has a city yet';
            $city=City::find($data->city_id);
            if($city)
                $inf[$ind]['city_name']=$city->name;
            //===============================================
            $inf[$ind]['plants_name']=$data->plants()->get();
            $ind++;
        }
        $city=City::all();
        $plant=Plant::all();
        return view('family.show',compact('inf','city','plant'));
    }
}
