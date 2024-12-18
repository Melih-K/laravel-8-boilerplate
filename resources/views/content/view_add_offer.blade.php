<style>
    .select2-container .select2-selection--single {
        height: 38px; /* Kutu yüksekliği */
        display: flex; /* Flexbox kullanımı */
        align-items: center; /* Dikey olarak ortala */
        justify-content: center; /* Yatay olarak ortala */
    }

    /* Metin hizalamasını ve varsayılan satır yüksekliğini sıfırlayın */
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: normal; /* Varsayılan satır yüksekliğini kaldır */
        text-align: left; /* Metni yatay olarak ortala */
        font-size: 14px; /* Gerekirse font boyutunu ayarlayın */
        padding: 0; /* Varsayılan padding'i sıfırla */
    }
    select:required:invalid {
    color: gray;
    }
    option[value=""][disabled] {
    display: none;
    }
    option {
    color: black;
    }
    #createNewCari {
        display: flex;
        align-items: center;
    }   
    .productSelect2 {
    margin-right: 20px !important; /* Örneğin, sağ tarafa 20px margin eklemek */
    }
    
</style>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{$title}}</h2>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-container">
                        <!-- Teklif Ekleme Formu Başlangıç -->
                        <form id="formOffer" name="formOffer" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <select id="customerSelect" name="customerSelect" class="form-control selectCustomer mr-2" style="width: auto;">
                                            <option value=""></option> <!-- Placeholder için boş bir seçenek -->
                                            <!-- Müşteri seçenekleri burada doldurulacak -->
                                        </select>
                                        <button type="button" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder ml-2" id="createNewCari">
                                            <i class="fas fa-plus"></i> Ekle
                                        </button>
                                    </div>
                                </div>

                                <!-- Sol Sütun -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="offer_id" id="offer_id" value="">
                                        <input class="form-control" id="authorized" type="text" name="authorized" placeholder="İlgili Kişi (Kota Makina)">
                                        <br>
                                        <input class="form-control" id="authorizedCustomer" name="authorizedCustomer" placeholder="İlgili Kişi (Müşteri)">
                                        <br>
                                        <input class="form-control" id="receiptNo" type="number" name="receiptNo" placeholder="Fiş Numarası">
                                        <br>
                                        <input class="form-control" id="documentNo" type="number" name="documentNo" placeholder="Belge Numarası">
                                        <br>
                                        <input type="date" id="date" name="date" class="form-control">
                                        <br>
                                        <div class="form-group">
                                            <select id="confirmation" name="confirmation" class="form-control select2" style="width: 100%;">
                                                <option value=""></option> <!-- Placeholder -->
                                                <option value="HAZIRLAMA">Hazırlama Aşamasında</option>
                                                <option value="TEKLIF">Teklif Aşamasında</option>
                                                <option value="KABUL">Kabul Edildi</option>
                                                <option value="RET">Reddedildi</option>
                                                <option value="KAPALI">Kapatıldı</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sağ Sütun -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" id="discount" name="discount" class="form-control" placeholder="İndirim">
                                        <br>
                                        <input class="form-control" id="description1" name="description1" type="text" placeholder="Açıklama 1">
                                        <br>
                                        <input class="form-control" id="description2" name="description2" type="text" placeholder="Açıklama 2">
                                        <br>
                                        <input class="form-control" id="description3" name="description3" type="text" placeholder="Açıklama 3">
                                        <br>
                                        <input class="form-control" id="ekalan1" name="ekalan1" type="text" placeholder="Ek Alan 1">
                                        <br>
                                        <input class="form-control" id="ekalan2" name="ekalan2" type="text" placeholder="Ek Alan 2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button onclick="cloneDiv()" type="button" class="btn btn-success btn-icon ml-2 mb-2"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="row mt-2" id="productRows">
                                <!-- Dinamik olarak eklenecek satırlar buraya gelecek -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-primary btn-pill font-weight-bold" id="saveBtnOffer">Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cari Modal-->
<div class="modal fade" id="modal-cari" data-backdrop="static" tabindex="-1" role="dialog"
aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Cari Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCari" name="formCari" enctype="multipart/form-data" >    
                    <div class="form-group">
                        <input type="hidden" name="cari_id" id="cari_id" value="">
                        <input
                            class="form-control"
                            id="cariCode"
                            type="text"
                            name="cariCode"
                            placeholder="Enter Cari Code">
                        <br>
                        <textarea 
                            class="form-control"
                            id="description" 
                            name="description"
                            placeholder="Açıklama"></textarea>
                        <br>
                        <input
                        class="form-control"
                        id="relatedPerson"
                        type="text"
                        name="relatedPerson"
                        placeholder="Enter Related Person">
                        <br>
                        <input
                        class="form-control"
                        id="companyName"
                        type="text"
                        name="companyName"
                        placeholder="Enter Company Name">
                        <br>
                        <select id="country_id" name="country" class="form-control select2">
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Åland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-bissau">Guinea-bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                            <option value="Korea, Republic of">Korea, Republic of</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-leste">Timor-leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                        <br>
                        <br>
                        <input
                        class="form-control"
                        id="authorityCode" 
                        type="number"
                        name="authorityCode"
                        placeholder="Enter Authority Code">
                        <br>
                        <input
                        class="form-control"
                        id="email" 
                        type="email"
                        name="email"
                        placeholder="Enter Email">
                        <br>
                        <input
                        class="form-control"
                        id="ekalan1"
                        name="ekalan1" 
                        type="text"
                        placeholder="ek alan 1">
                        <br>
                        <input
                        class="form-control"
                        id="ekalan2"
                        name="ekalan2" 
                        type="text"
                        placeholder="ek alan 2">
                        <br>
                        <input
                        class="form-control"
                        id="ekalan3"
                        name="ekalan3" 
                        type="text"
                        placeholder="ek alan 3">
                        <br>
                        <input
                        class="form-control"
                        id="ekalan4"
                        name="ekalan4" 
                        type="text"
                        placeholder="ek alan 4">
                        <br>
                        <input
                        class="form-control"
                        id="ekalan5"
                        name="ekalan5" 
                        type="text"
                        placeholder="ek alan 5">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="saveBtnCari">Kaydet</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function cloneDiv() {
        var newRow = `
            <div class="col-md-12 productRow">
                <div class="form-group d-flex align-items-center">
                    <select class="form-control productSelect2 mr-2" style="width: 30%; margin-right: 10px;">
                        <option value="">Ürün Seçin</option>
                        <!-- Ürün seçenekleri burada dinamik olarak yüklenecek -->
                    </select>
                    <select class="form-control currencySelect" style="width: 15%; margin-right: 10px;">
                        <option value="TL">TL</option>
                        <option value="EUR">EUR</option>
                    </select>
                    <input type="number" class="form-control quantity" style="width: 15%; margin-right: 10px;" placeholder="Adet">
                    <input type="number" class="form-control price" style="width: 15%; margin-right: 10px;" placeholder="Fiyat">
                    <input type="number" class="form-control total" style="width: 15%;" placeholder="Toplam" readonly>
                    <button type="button" class="btn btn-danger removeRowBtn" style="margin-left: 10px;">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
        
        $('#productRows').append(newRow);
        
        // Yeni eklenen satırdaki select2'yi başlat
        $('.productSelect2').select2({
            placeholder: "Ürün Seçin",
            allowClear: true,
            width: '100%',
            
            ajax: {
                url: "{{ route('stocks.get') }}", // Laravel route URL
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    // Verileri select2 formatına uygun hale getir
                    return {
                        results: data.map(function (stock) {
                            return {
                                id: stock.id,
                                text: stock.description // 'product_name' burada ürün adıdır
                            };
                        })
                    };
                }
            }
        });

        // Yeni eklenen satırdaki adet ve fiyat girişine odaklan
        $('.quantity, .price').on('input', function() {
            var row = $(this).closest('.productRow');
            var quantity = row.find('.quantity').val();
            var price = row.find('.price').val();
            var total = quantity * price;
            row.find('.total').val(total.toFixed(2)); // Toplamı 2 ondalıklı olarak ayarla
        });

        // Satırı silme işlevi
        $('.removeRowBtn').on('click', function() {
            $(this).closest('.productRow').remove();
        });
    }

    $(document).ready(function () {
        // CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Success alert
        function swal_success() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Başarıyla kaydedildi.',
                showConfirmButton: false,
                timer: 1000
            });
        }

        // Error alert
        function swal_error() {
            Swal.fire({
                position: 'centered',
                icon: 'error',
                title: 'Bir şeyler ters gitti!',
                showConfirmButton: true
            });
        }
        // Ülke seçimi için Select2 başlatma
        $('#modal-cari').on('shown.bs.modal', function () {
            $('#country_id').select2({
                placeholder: "Bir ülke seçin",
                allowClear: true,
                width: '100%'
            });
            $('#country_id').val(null).trigger('change');
        });

        // Müşteri seçimi için Select2 başlatma
        $('#customerSelect').select2({
            placeholder: "Lütfen bir müşteri seçin",
            allowClear: true,
            width: '100%'
        });

        // Seçimi temizle (ilk yüklemede seçili olmasını engeller)
        $('#customerSelect').val(null).trigger('change');

        // Durum seçimi için Select2 başlatma
        $('#confirmation').select2({
            placeholder: "Lütfen bir durum seçin",
            allowClear: true,
            width: '100%'
        });

        // Seçimi temizle (ilk yüklemede seçili olmasını engeller)
        $('#confirmation').val(null).trigger('change');

        // Yeni Cari ekleme
        // Initialize btn add
        $('#createNewCari').click(function () {
            $('#saveBtnCari').val("create cari");
            $('#cari_id').val('');
            $('#formCari').trigger("reset");
            $('#modal-offer').modal('hide');
            $('#modal-cari').modal('show');
        });

        // Initialize btn save
        $('#saveBtnCari').off('click').on('click', function (e) {
            e.preventDefault();

            var formData = new FormData($('#formCari')[0]);
            $.ajax({
                data: formData,
                url: "{{ route('cari.store') }}",
                type: "POST",
                contentType: false,
                processData: false,
                success: function (data) {
                    // Yeni cariyi kaydetme ve formu sıfırlama
                    $('#formCari').trigger("reset");
                    $('#modal-cari').modal('hide');
                    swal_success();

                    // Veriyi başarılı şekilde kaydettikten sonra carileri yeniden yükle
                    loadCariler(); // Yükleme fonksiyonunu tetikle
                },
                error: function (data) {
                    swal_error();
                }
            });
        });

        // Cariler tablosundan verileri çek ve selectbox'a yükle
        function loadCariler() {
            $.ajax({
                url: "{{ route('cariler.get') }}",
                type: "GET",
                success: function (data) {
                    var selectBox = $('#customerSelect');
                    selectBox.empty(); // Önceki verileri temizle
                    data.forEach(function (cari) {
                        selectBox.append(new Option(cari.relatedPerson, cari.id)); // Yeni carileri ekle
                    });
                    selectBox.select2({
                        placeholder: "Lütfen bir müşteri seçin",
                        allowClear: true,
                        width: '100%'
                    }).val(null).trigger('change'); // Seçimi temizle
                    selectBox.trigger('change'); // Select2'yi güncelle
                },
                error: function () {
                    alert("Cariler yüklenirken bir hata oluştu.");
                }
            });
        }

        loadCariler();

      

        // Formu kaydetme işlemi
        $('#saveBtnOffer').on('click', function (e) {
            e.preventDefault();

            var products = []; // Ürünler dizisi

            $('.productRow').each(function() {
                var row = $(this);
                var product = {
                    stock_id: row.find('.productSelect2').val(),
                    currency: row.find('.currencySelect').val(),
                    quantity: row.find('.quantity').val(),
                    price: row.find('.price').val()
                };
                products.push(product); // Ürünü products dizisine ekle
            });

            var formData = {
                offer_id: $('#offer_id').val(),
                cari_id: $('#customerSelect').val(),
                authorized: $('#authorized').val(),
                authorizedCustomer: $('#authorizedCustomer').val(),
                receiptNo: $('#receiptNo').val(),
                documentNo: $('#documentNo').val(),
                date: $('#date').val(),
                confirmation: $('#confirmation').val(),
                discount: $('[name="discount"]').val(),
                description1: $('#description1').val(),
                description2: $('#description2').val(),
                description3: $('#description3').val(),
                ekalan1: $('#ekalan1').val(),
                ekalan2: $('#ekalan2').val(),
                products: JSON.stringify(products) // JSON formatında gönder
            };

            $.ajax({
                url: "{{ route('offers.store') }}",
                type: "POST",
                data: formData,
                success: function (data) {
                    swal_success();
                },
                error: function (data) {
                    swal_error();
                }
            });
        });
    });
</script>

@endpush
