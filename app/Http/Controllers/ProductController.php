<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $categoria = Category::find($id);
        if (!is_null($categoria)) {
            $productos = $categoria->productos;
        }
        else{
            $productos = 0;
        }
        return view('productos',['categoria'=>$categoria,'productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $req)
    {
        $req->validate([
            'nombre'=>'required',
            'precio'=>'required',
            'descripcion'=>'required'
        ]);

        $producto = new Product();
        $producto->nombre = $req->input('nombre');
        $producto->descripcion = $req->input('descripcion');
        $producto->precio = $req->input('precio');
        $producto->consignado = FALSE;
        $producto->user_id = Auth::id();
        $producto->category_id = $id;
        $producto->motivo = '';
        $producto->url_imagen = '';
        $producto->save();

        if ($req->hasFile('imagen')) {
            $file = $req->file('imagen');
            $destino = 'images/';
            $fileName = time().'-'.$file->getClientOriginalName();
            $uploadSucess = $req->file('imagen')->move($destino,$fileName);
            Image::Create([
                'product_id'=>$producto->id,
                'url'=>$destino.$fileName
            ]);
        }
        return redirect()->route('categorias/productos',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $categoria = Category::find($id);
        return view('crear_productos',['categoria'=>$categoria]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Product::find($id);
        return view('producto',['producto'=>$producto]);
    }

    public function consignar($categoria_id,$producto_id)
    {
        $producto = Product::find($producto_id);
        $producto->consignado = TRUE;
        $producto->save();
        return redirect()->route('categorias/productos',$categoria_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($categoria_id,$producto_id)
    {
        $producto = Product::find($producto_id);
        return view('editar_producto',['producto'=>$producto,'categoria_id'=>$categoria_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoria_id, $producto_id)
    {
        $request->validate([
            'nombre'=>'required',
            'precio'=>'required',
            'descripcion'=>'required'
        ]);
        $producto = Product::find($producto_id);
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        $producto->save();
        return redirect()->route('categorias/productos',$categoria_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoria_id,$producto_id)
    {
        $producto = Product::find($producto_id);
        $producto->delete();
        return redirect()->route('categorias/productos',$categoria_id);
    }

    public function buscar(Request $req)
    {
        $buscarPor = $req->input('producto');
        $productos = DB::table('products')->where('nombre','like',"%$buscarPor%")->orWhere('descripcion','like',"%$buscarPor%")->get();
        return view('resultado',['productos'=>$productos]);
    }
}
