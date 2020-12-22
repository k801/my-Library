<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Ramsey\Uuid\v1;

class BookController extends Controller
{


public function index()
{

        $books=Book::ORDERbY('id','DESC')->paginate(3);



          return view('books/index',[



            'books'=>$books,
]);

          }


public function latest()
{

$books=Book::select('name','desc')->ORDERBY('created_at','desc')->take(3)->get();

  return view('books/latest',[

    'books'=>$books
  ]);

}




public function show($id)
{

  $book=Book::findOrFail($id);

  return view('books/show',[

    'book'=>$book
  ]);


}


public function search($keyword)
{

  $books=Book::select('name','desc')->where('name','like',"%$keyword%")->get();

return view('books/search',[

    'books'=>$books
]);
}




public function create()
{

      $cats=Cat::get();

    return view('books/create',[

'cats'=>$cats

    ]);

}



public function  store(Request $request)
{

                $request->validate([

                    'name'=>'required|string|max:10',
                    'desc'=>'required|string|max:255',
                     'img'=>'required|image|mimes:png,jpg',
                     'cat_id'=>'required|exists:cats,id'

                ]);


      $path=storage::putFile("books",$request->file('img'));


        Book::create([

              'name'=>$request->name,
              'desc'=>$request->desc,
               'img'=>$path,
               'cat_id'=>$request->cat_id
        ]);


        return redirect('/books');

}



public function edit($id)
{

   $book=Book::findOrFail($id);
   $cats=Cat::get();
   $c=Cat::findOrFail($id);


return view('/books/edit',[

    'book'=>$book,
    'cats'=>$cats,
    "c"=>$c
]);


}



public function update($id,Request $request)
{

    $book=Book::findOrFail($id);
    $path=$book->img;



    $request->validate([

        'name'=>'required|string|max:10',
        'desc'=>'required|string|max:255',
         'img'=>'nullable|image|mimes:png,jpg'


    ]);


    if($request->hasFile('img'))
    {
        Storage::delete($path);

         $path=Storage::putFile('books',$request->file('img'));

    }


$book->update([

'name'=> $request->name,
'desc'=> $request->desc,
 'img'=>$path

]);

return redirect('books');

}



public function delete($id)
{

$book=Book::findOrFail($id);

storage::delete($book->img);

 $book->delete();

return redirect('books');
}


}
