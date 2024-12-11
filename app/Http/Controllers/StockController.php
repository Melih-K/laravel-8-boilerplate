<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\StockImage;
use Illuminate\Http\Request;
use DataTables;

class StockController extends Controller
{
    public function stocks(Request $request){
        $stocks = Stock::all();
        return view('content.view_stock', ['stocks'=>$stocks]);
    }

    public function index(Request $request)
        {
            $data = [
                'count_stock' => Stock::latest()->count(),
                'menu'       => 'menu.v_menu_admin',
                'content'    => 'content.view_stock',
                'title'    => 'Stoklar'
            ];

            if ($request->ajax()) {
                $q_stok = Stock::select('*')->orderByDesc('created_at');
                return Datatables::of($q_stok)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            
                            $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 mb-2 edit editStock"><i class=" fi-rr-edit"></i></div>';
                            $btn = $btn.' <div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mb-2 deleteStock"><i class="fi-rr-trash"></i></div>';
                            $btn = $btn.'<div data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Show Image" class="btn btn-sm btn-icon btn-outline-primary btn-circle mr-3 showImage"><i class="fi-rr-picture"></i></div>';
                            $btn = $btn.'<div data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Show Table Image" class="btn btn-sm btn-icon btn-outline-primary btn-circle  showStockImages"><i class="fa-solid fa-images"></i></div>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }

            return view('layouts.v_template',$data);
        }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'stockCode' => 'required|string|max:255',
            'description' => 'nullable|string',
            'kdv1' => 'nullable|numeric',
            'kdv2' => 'nullable|numeric',
            'kdv3' => 'nullable|numeric',
            'unit' => 'required|string',
            'stockType' => 'nullable|string',
            'ekalan1' => 'nullable|string',
            'ekalan2' => 'nullable|string',
            'ekalan3' => 'nullable|string',
            'ekalan4' => 'nullable|string',
            'ekalan5' => 'nullable|string',
        ]);

        // Stok kaydını oluştur ve sonucu bir değişkene ata
        $stock = Stock::updateOrCreate(
            ['id' => $request->stock_id],
            [
                'stockCode' => $validated['stockCode'],
                'description' => $validated['description'],
                'kdv1' => $validated['kdv1'],
                'kdv2' => $validated['kdv2'],
                'kdv3' => $validated['kdv3'],
                'unit' => $validated['unit'],
                'stockType' => $validated['stockType'],
                'ekalan1' => $validated['ekalan1'],
                'ekalan2' => $validated['ekalan2'],
                'ekalan3' => $validated['ekalan3'],
                'ekalan4' => $validated['ekalan4'],
                'ekalan5' => $validated ['ekalan5'],
            ]
        );

        // Yeni oluşturulan veya güncellenen stokun ID'sini al
        $this->imageInsert($request, $stock->id);

        return response()->json(['success' => 'Stock successfully added']);
    }

    public function quickAdd(Request $request)
        {
            $validated = $request->validate([
                'stockCode' => 'required|string|max:255',
                'description' => 'nullable|string',
                'kdv1' => 'nullable|numeric',
                'kdv2' => 'nullable|numeric',
                'kdv3' => 'nullable|numeric',
                'unit' => 'required|string',
                'stockType' => 'nullable|string',
            ]);

            $stock = Stock::updateOrCreate(
                [
                    'stockCode' => $validated['stockCode'],
                    'description' => $validated['description'],
                    'kdv1' => $validated['kdv1'],
                    'kdv2' => $validated['kdv2'],
                    'kdv3' => $validated['kdv3'],
                    'unit' => $validated['unit'],
                    'stockType' => $validated['stockType'],
                ]
            );
            return response()->json(['success' => 'Stok başarıyla eklendi']);
        }


    public function edit($id)
    {
        $stock = Stock::find($id);
        return response()->json($stock);

    }

    public function destroy($id)
    {
        Stock::find($id)->delete();

        return response()->json(['success'=>'Stock deleted!']);
    }

    public function stockImages($id)
    {
        $images = StockImage::where('stock_id', $id)->get();

        if ($images->isNotEmpty()) {
            return response()->json(['images' => $images]);
        }

        return response()->json(['images' => []], 404);
    }

    public function imageInsert(Request $request, $id)
    {
        if ($request->hasFile('stockImage')) {
            $images = $request->file('stockImage');

            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('stock_images'), $imageName);

                // Resmi StockImage tablosuna kaydet
                StockImage::create([
                    'stock_id' => $id,
                    'path' => 'stock_images/' . $imageName,
                ]);
            }
        }
    }
    public function tableImages($id)
    {
        $images = StockImage::where('stock_id', $id)->get();

        if ($images->isNotEmpty()) {
            return response()->json(['images' => $images->map(function ($image) {
                return [
                    'path' => $image->path,
                    'name' => basename($image->path), // Fotoğrafın ismi
                ];
            })]);
        }

        return response()->json(['images' => []], 404);
    }
    public function destroyImage($imageId)
    {
        $image = StockImage::find($imageId); // StockImage, resimlerin saklandığı model
        if ($image) {
            $imagePath = public_path($image->path); // Resmin yolu

            // Dosya sisteminde resmin var olup olmadığını kontrol et ve sil
            if (file_exists($imagePath)) {
                unlink($imagePath); // Resmi sil
            }

            $image->delete(); // Veritabanından resmi sil
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Resim bulunamadı']);
    }
}   