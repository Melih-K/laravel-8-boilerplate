<?php

namespace App\Http\Controllers;

use App\Models\Cari;
use App\Models\Offer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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

            return response()->json(['success' => true, 'offer' => $offer]);
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
}
