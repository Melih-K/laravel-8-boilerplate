<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Cari;
use App\Models\CariAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CariController extends Controller
{
    public function cari(Request $request){
        $cari = Cari::all();
        return view('content.view_cari', ['cari'=>$cari]);
    }

    public function index(Request $request)
        {
            $data = [
                'count_cari' => Cari::latest()->count(),
                'menu'       => 'menu.v_menu_admin',
                'content'    => 'content.view_cari',
                'title'    => 'Cariler'
            ];

            if ($request->ajax()) {
                $q_cari = Cari::select('*')->orderByDesc('created_at');
                return Datatables::of($q_cari)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                            $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editCari"><i class=" fi-rr-edit"></i></div>';
                            $btn = $btn.' <div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteCari"><i class="fi-rr-trash"></i></div>';
                          
                            $btn = $btn. '
                            <div data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="AddAddress" 
                                 class="btn btn-sm btn-icon btn-outline-primary btn-circle mr-2 mt-2 addCariAddress">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>';
                            $btn = $btn.' 
                            <div data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Addresses" class="btn btn-sm btn-icon btn-outline-warning btn-circle mr-2 mt-2 showCariAddresses">
                                <i class="fa-solid fa-list"></i>
                            </div>';
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
                'cariCode' => 'required|numeric',
                'description' => 'nullable|string',
                'relatedPerson' => 'required|string',
                'companyName' => 'nullable|string',
                'country' => 'nullable|string',
                'authorityCode' => 'nullable|numeric',
                'email' => 'required|string|email',
                'ekalan1' => 'nullable|string',
                'ekalan2' => 'nullable|string',
                'ekalan3' => 'nullable|string',
                'ekalan4' => 'nullable|string',
                'ekalan5' => 'nullable|string',
            ]);
    
            $cari = Cari::updateOrCreate(
                ['id' => $request->cari_id],
                [   
                    'cariCode' => $validated['cariCode'],
                    'description' => $validated['description'],
                    'relatedPerson' => $validated['relatedPerson'],
                    'companyName' => $validated['companyName'],
                    'country' => $validated['country'],
                    'authorityCode' => $validated['authorityCode'],
                    'email' => $validated['email'],
                    'ekalan1' => $validated['ekalan1'],
                    'ekalan2' => $validated['ekalan2'],
                    'ekalan3' => $validated['ekalan3'],
                    'ekalan4' => $validated['ekalan4'],
                    'ekalan5' => $validated ['ekalan5'],
                ]
            );
            return response()->json(['success' => 'cari successfully added']);
        }

        public function edit($id)
        {
            $Cari = Cari::find($id);
            return response()->json($Cari);
    
        }
        public function destroy($id)
        {
            Cari::find($id)->delete();
            return response()->json(['success'=>'Customer deleted!']);
        }
        public function quickAdd(Request $request)
        {
            $cari = Cari::create($request->only(['cariCode', 'description', 'relatedPerson', 'email']));

            $addressData = [
                'cari_id' => $cari->id,
                'address1' => $request->input('address1'),
                'address2' => $request->input('address2'),
            ];

            CariAddress::create($addressData);

            return response()->json(['success' => 'Cari başarıyla eklendi']);
        }
        public function getAddresses($cari_id)
        {
            $addresses = DB::table('cari_adresler')->where('cari_id', $cari_id)->get();
            return response()->json($addresses);
        }
        public function getAddress($id)
        {
            $address = CariAddress::find($id);  // Adresi ID'ye göre bul

            if (!$address) {
                return response()->json(['error' => 'Adres bulunamadı.'], 404);
            }

            return response()->json($address);  // Adres bilgilerini döndür
        }
        
        public function deleteAddress($address_id, Request $request)
        {
            try {
                // Adresi veritabanından sil
                $address = CariAddress::findOrFail($address_id);
                $address->delete();

                // Başarıyla silindiğinde bir yanıt gönder
                return response()->json(['success' => true], 200);
            } catch (\Exception $e) {
                // Hata durumunda
                return response()->json(['error' => 'Silme işlemi başarısız oldu.'], 500);
            }
        }

        public function storeAddress(Request $request)
        {
            // Verileri doğrula
            $validatedData = $request->validate([
                'address1' => 'required|string|max:255',
                'address2' => 'nullable|string|max:255',
                'country' => 'required|string|max:100',
                'city' => 'required|string|max:100',
                'district' => 'required|string|max:100',
                'postalCode' => 'required|string|max:20',
                'mobilePhone' => 'required|string|max:20',
                'phone' => 'nullable|string|max:20',
                'cari_id' => 'required|exists:cariler,id',
                'address_id' => 'nullable|exists:cari_adresler,id',
            ]);

            // Cari adresini bulma veya oluşturma
            if ($request->has('address_id') && $request->address_id) {
                // Address_id varsa, güncelleme işlemi yap
                $address = CariAddress::where('cari_id', $request->cari_id)
                                    ->where('id', $request->address_id)  // Address id'yi kontrol et
                                    ->first();
            } else {
                // Address_id yoksa, yeni adres oluştur
                $address = null;
            }

            // Eğer adres varsa, güncelle
            if ($address) {
                $address->address1 = $request->address1;
                $address->address2 = $request->address2;
                $address->country = $request->country;
                $address->city = $request->city;
                $address->district = $request->district;
                $address->postalCode = $request->postalCode;
                $address->mobilePhone = $request->mobilePhone;
                $address->phone = $request->phone;
                $address->save();

                return response()->json(['success' => true, 'message' => 'Adres başarıyla güncellendi']);
            } else {
                // Yeni adres oluştur
                $newAddress = new CariAddress();
                $newAddress->address1 = $request->address1;
                $newAddress->address2 = $request->address2;
                $newAddress->country = $request->country;
                $newAddress->city = $request->city;
                $newAddress->district = $request->district;
                $newAddress->postalCode = $request->postalCode;
                $newAddress->mobilePhone = $request->mobilePhone;
                $newAddress->phone = $request->phone;
                $newAddress->cari_id = $request->cari_id;
                $newAddress->save();

                return response()->json(['success' => true, 'message' => 'Yeni adres başarıyla kaydedildi']);
            }
        }
}   

