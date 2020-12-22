<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{



public function index()
{

        $cats=Cat::get();



          return view('cats/index',[



            'cats'=>$cats,
]);
  }




  public function show($id)
  {

    $cat=Cat::findOrFail($id);


    return view('cats/show',[

      'cat'=>$cat
    ]);

  }

  public function create()
{

    return view('cats/create');

}





// category store

public function  store(Request $request)
{

                $request->validate([

                    'name'=>'required|string|max:20',
                    'desc'=>'required|string|max:255',


                ]);

        Cat::create([

              'name'=>$request->name,
              'desc'=>$request->desc,
        ]);


        $request->session()->flash("success","category created successfully");
        return redirect('/cats');

}




public function edit($id)
{

   $cat=cat::findOrFail($id);


return view('/cats/edit',[

    'cat'=>$cat
]);


}



public function update($id,Request $request)
{

    $book=Cat::findOrFail($id);



    $request->validate([

        'name'=>'required|string|max:10',
        'desc'=>'required|string|max:255',

    ]);




$book->update([

'name'=> $request->name,
'desc'=> $request->desc,

]);

return redirect('cats');

}


public function delete($id)
{

$cat=Cat::findOrFail($id);

 $cat->delete();

return redirect('cats');
}




}
