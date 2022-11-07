<?php

namespace App\Http\Controllers;

use App\Product;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Главная страница';
        $products = Product::with('unit')->get();

        return view("products.index", compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Добавить товар';

        $units = Unit::pluck('unit_name', 'unit_id');

        return view('products.create', compact('title', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'product_name' => 'required|min:5|max:100',
            'product_price' => 'numeric|between:0,99999999.99',
            'product_quantity' => 'numeric|between:0,99999999.99',
            'product_unit_id' => 'integer',
        ];

        // кастомные сообщения для некоторых ошибок
        $messages = [
            'product_name.required' => 'Заполните поле "Наименование продукции"',
            'product_name.min' => 'Значение поля "Наименование продукции" дожно быть длиннее 5 символов',
            'product_unit_id.integer' => 'Необходимо выбрать ед. изм. из списка',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        Product::create($request->all());

        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $title = 'Редактировать товар';

        $units = Unit::pluck('unit_name', 'unit_id');

        $product = Product::find($id);

        return view('products.edit', compact('title', 'units', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'product_name' => 'required|min:5|max:100',
            'product_price' => 'numeric|between:0,99999999.99',
            'product_quantity' => 'numeric|between:0,99999999.99',
            'product_unit_id' => 'integer',
        ];

        // кастомные сообщения для некоторых ошибок
        $messages = [
            'product_name.required' => 'Заполните поле "Наименование продукции"',
            'product_name.min' => 'Значение поля "Наименование продукции" дожно быть длиннее 5 символов',
            'product_unit_id.integer' => 'Необходимо выбрать ед. изм. из списка',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $product_id = $request->product_id;

        Product::where('product_id', $product_id)->update($request->except('_method', '_token', 'product_id'));

        return redirect()->route('products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Product::destroy($id);
        return redirect()->route('products');

    }
}
