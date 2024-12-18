<?php

namespace App\Http\Controllers;

use App\Models\Cari;
use App\Models\Offer;
use App\Models\Stock;
use Barryvdh\DomPDF\PDF;
use App\Models\StockImage;
use App\Models\OfferDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use TCPDF;

class OfferController extends Controller
{
    public function offers(Request $request){
        $offer = Offer::all();
        return view('content.view_offers', ['offer'=>$offer]);
    }

    public function indexEdit(Request $request)
        {
            $data = [
                'count_cari' => Offer::latest()->count(),
                'menu'       => 'menu.v_menu_admin',
                'content'    => 'content.view_edit_offer',
                'title'    => 'Teklif Ekle'
            ];
            return view('layouts.v_template',$data);
        }
    public function indexAdd(Request $request)
        {
            $data = [
                'count_cari' => Offer::latest()->count(),
                'menu'       => 'menu.v_menu_admin',
                'content'    => 'content.view_add_offer',
                'title'    => 'Teklif Ekle'
            ];
            return view('layouts.v_template',$data);
        }

    public function index(Request $request)
        {
            $data = [
                'count_cari' => Offer::latest()->count(),
                'menu'       => 'menu.v_menu_admin',
                'content'    => 'content.view_offers',
                'title'    => 'Teklifler'
            ];
            
            if ($request->ajax()) {
                $q_offer = Offer::select('*')->orderByDesc('created_at');
                return Datatables::of($q_offer)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                            $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editOffer"><i class=" fi-rr-edit"></i></div>';
                            $btn = $btn.' <div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteOffer"><i class="fi-rr-trash"></i></div>';
                            $btn = $btn.' <div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Pdf" class="btn btn-sm btn-icon btn-outline-primary btn-circle mr-2 pdfOffer"><i class="fa-regular fa-file-pdf"></i></div>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('layouts.v_template',$data);
        }

        public function getCariler(){   
            $cariler = Cari::all();
            // Veriyi JSON formatında döndürme
            return response()->json($cariler);
        }
    
        public function store(Request $request)
        {
            // Gelen verileri doğrula
            $validated = $request->validate([
                'cari_id' => 'required|exists:cariler,id',
                'authorized' => 'nullable|string|max:255',
                'authorizedCustomer' => 'nullable|string|max:255',
                'receiptNo' => 'nullable|integer',
                'documentNo' => 'nullable|integer',
                'date' => 'required|date',
                'confirmation' => 'nullable|string',
                'discount' => 'nullable|numeric',
                'description1' => 'nullable|string',
                'description2' => 'nullable|string',
                'description3' => 'nullable|string',
                'ekalan1' => 'nullable|string',
                'ekalan2' => 'nullable|string',
                'products' => 'required|string', // Burada string olarak alıyoruz, JSON formatı olarak
            ]);

            // `offer_id` mevcut mu kontrol et
            $offerId = $request->input('offer_id');
            if ($offerId) {
                // Eğer `offer_id` varsa güncelle
                $offer = Offer::where('id', $offerId)->first();
                if ($offer) {
                    $offer->update($validated);
                } else {
                    return response()->json(['success' => false, 'message' => 'Kayıt bulunamadı'], 404);
                }
            } else {
                // Eğer `offer_id` yoksa yeni kayıt oluştur
                $offer = Offer::create($validated);
            }

            // Teklif detaylarını güncelle
            $offer->details()->delete(); // Eski detayları sil

            // `products` alanını JSON'dan PHP dizisine dönüştür
            $products = json_decode($request->input('products'), true);  // true parametresi ile dizi olarak alıyoruz.

            // `products` dizisi kontrolü
            if ($products && is_array($products)) {
                foreach ($products as $product) {
                    // Detayları ekle
                    $offer->details()->create([
                        'stock_id' => $product['stock_id'],
                        'currency' => $product['currency'],
                        'quantity' => $product['quantity'],
                        'price' => $product['price'],
                        'total' => $product['quantity'] * $product['price'],
                    ]);
                }
            } else {
                return response()->json(['success' => false, 'message' => 'Ürün bilgileri eksik veya hatalı.'], 400);
            }

            // return redirect()->route('/offers')->with('success', 'Teklif ve detayları başarıyla kaydedildi.');
            $title = 'Teklifler';
            return view('content.view_offers', $title);
           
        }

        public function edit($id)
        {
            $offer = Offer::findOrFail($id); // Teklif kaydını al
            $customers = Cari::all(); // Müşteri listesi
            $data = [
                'count_cari' => Offer::latest()->count(),
                'menu'       => 'menu.v_menu_admin',
                'customers' => $customers,
                'offer' => $offer,
                'content'    => 'content.view_edit_offer',
                'title'    => 'Teklif Ekle'
            ];
            return view('layouts.v_template',$data);
        }

        public function destroy($id)
        {
            Offer::find($id)->delete();
            return response()->json(['success'=>'Offer deleted!']);
        }

        public function getStocks()
        {
            $stocks = Stock::all(['id', 'description']);
            
            return response()->json($stocks);
        }

        public function generatePdf($id)
        {
            // Teklifi ve detaylarını al
            $offer = Offer::findOrFail($id);
        
            // Teklifin detaylarını al
            $offerDetails = OfferDetails::where('offer_id', $id)->get();
        
            $stocks = [];
            foreach ($offerDetails as $detail) {
                // Stok bilgilerini al
                $stock = Stock::find($detail->stock_id);
                // Stok resimlerini al
                $images = StockImage::where('stock_id', $detail->stock_id)->get();
                $stocks[] = [
                    'stock' => $stock,
                    'images' => $images
                ];
            }
        
            // Veriyi PDF için hazırlıyoruz
            $data = [
                'offer' => $offer,
                'stocks' => $stocks
            ];
        
            // PDF'yi nesne tabanlı şekilde oluşturuyoruz
            $pdf = new TCPDF();
            $pdf->SetFont('helvetica', '', 12);
            $pdf = app('dompdf.wrapper');  // 'dompdf.wrapper' servisini kullanarak nesne oluşturuyoruz.
            $pdf->loadView('content.pdf', $data);
            
            // PDF dosyasını tarayıcıda göster
            return $pdf->stream('offer_'.$offer->id.'.pdf');
        }
    }
