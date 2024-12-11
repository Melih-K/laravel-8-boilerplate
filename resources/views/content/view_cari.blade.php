
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
   <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>{{$title}}</h2>
                    <div class="d-flex flex-row-reverse">
                        <button
                            class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder"
                            id="createNewCari">
                            <i class="fas fa-plus"></i>Ekle
                        </button>
                        <button
                            class="btn btn-sm btn-pill btn-outline-success font-weight-bolder mr-2"
                            id="quickAddCari">
                            <i class="fas fa-plus-circle"></i> Hızlı Ekle
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" id="tableCari">
                                <thead class="font-weight-bold text-center">
                                    <tr>
                                        {{-- <th>No.</th> --}}
                                        <th>Cari Kodu</th>
                                        <th>Açıklama</th>
                                        <th style="width:90px;">İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    
                                </tbody>
                            </table>
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
    <!-- Hızlı Cari Ekle Modal -->
        <div class="modal fade" id="modal-quick-add-cari" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="quickAddModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="quickAddModalLabel">Hızlı Cari Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formQuickAddCari" name="formQuickAddCari" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" id="cari_id" name="cari_id">
                                <br>
                                <input class="form-control" id="quickCariCode" type="text" name="cariCode" required placeholder="cariCode">
                                <br>
                                <textarea class="form-control" id="quickDescription" name="description" placeholder="description"></textarea>
                                <br>
                                <input class="form-control" id="quickRelatedPerson" type="text" name="relatedPerson" placeholder="relatedPerson">
                                <br>
                                <input class="form-control" id="quickEmail" type="email" name="email" placeholder="email">
                                <br>
                                <input class="form-control" id="quickAddress1" type="text" name="address1" placeholder="address1">
                                <br>
                                <input class="form-control" id="quickAddress2" type="text" name="address2" placeholder="address2">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-success font-weight-bold" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-success font-weight-bold" id="btnQuickAddCari">Kaydet</button>
            </div>
        </div>
        </div>
        </div>
    <!-- Address Add Modal -->
        <div class="modal fade"  id="modal-add-address" tabindex="-2" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="modalLabel">Add Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formAddAddress" name="formAddAddress">
                            <!-- Gizli cari_id input -->
                            <input type="hidden" id="hiddenCariId" name="cari_id">
                            <input type="hidden" id="hiddenAddressId" name="address_id">
                            
                            <div class="form-group">
                                <input class="form-control" id="address1" type="text" name="address1" placeholder="Address 1">
                                <br>
                                <input class="form-control" id="address2" type="text" name="address2" placeholder="Address 2">
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
                                <input class="form-control" id="city" type="text" name="city" placeholder="City">
                                <br>
                                <input class="form-control" id="district" type="text" name="district" placeholder="District">
                                <br>
                                <input class="form-control" id="postalCode" type="text" name="postalCode" placeholder="Postal Code">
                                <br>
                                <input class="form-control" id="mobilePhone" type="text" name="mobilePhone" placeholder="Mobile Phone">
                                <br>
                                <input class="form-control" id="phone" type="text" name="phone" placeholder="Phone">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary font-weight-bold" id="saveAddressBtn">Save</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- adresler modal --}}
        <div class="modal fade" id="addressesModal" tabindex="-1" role="dialog" aria-labelledby="addressesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="modalLabel">Cari Adresler</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Adres 1</th>
                                    <th>Adres 2</th>
                                    <th>Ülke</th>
                                    <th>Şehir</th>
                                    <th>İlçe</th>
                                    <th>Posta Kodu</th>
                                    <th>Cep Tel.</th>
                                    <th>Telefon</th>
                                    <th style="text-align: center">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody id="tableAddressCari">
                                <!-- Adresler buraya eklenecek -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
    @push('scripts')
    <script>
//------------------------------------ADRES GÖSTER-----------------------------------------
        $(document).ready(function(){
             // success alert
             function swal_success() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Başarıyla kaydedildi.',
                    showConfirmButton: false,
                    timer: 1000
                });
            }
    
            // error alert
            function swal_error() {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: 'Bir şeyler ters gitti !',
                    showConfirmButton: true,
                });
            }
            // Ülke seçimi için Select2 başlatma
            $('#modal-cari').on('shown.bs.modal', function () {
                $('#country_id').select2({
                    placeholder: "Bir ülke seçin", // Placeholder metni
                    allowClear: true,             // Seçimi temizlemek için çarpı simgesi ekler
                    width: '100%'                 // Tam genişlikte gösterim
                });
                $('#country_id').val(null).trigger('change');
            });

            // Ülke seçimi için Select2 başlatma
            $('#modal-cari').on('shown.bs.modal', function () {
                $('#country_id').select2({
                    placeholder: "Bir ülke seçin", // Placeholder metni
                    allowClear: true,             // Seçimi temizlemek için çarpı simgesi ekler
                    width: '100%'                 // Tam genişlikte gösterim
                });
            });

            // 'addCariAddress' butonuna tıklanma olayını dinle
            $('body').on('click', '.addCariAddress', function () {
                var cari_id = $(this).data('id');  // Butondan cari ID'sini al
                $('#formAddAddress').trigger("reset");  // Formu sıfırla
                $('#hiddenCariId').val(cari_id);  // Cari ID'yi gizli input'a ekle
                $('#modal-add-address').modal('show');  // Adres ekleme modalını aç
            });

            $('#modal-add-address').on('hidden.bs.modal', function () {
            $('#formAddAddress').trigger('reset');  // Modal kapandığında formu sıfırlayın
            $('#hiddenAddressId').val('');  // Eğer varsa adres ID'sini temizleyin
        });
            // Kaydet butonuna tıklanma olayını dinle
            $('#saveAddressBtn').on('click', function (e) {
                e.preventDefault();
                var cariId = $('#hiddenCariId').val();  // Cari ID'yi al
                var formData = new FormData($('#formAddAddress')[0]);  // Form verilerini al
                formData.append('cari_id', cariId);  // Cari ID'yi form verilerine ekle

                // Ajax ile veri gönder
                $.ajax({
                    url: "{{ route('cari.storeAddress') }}",  // Laravel route URL'si
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        swal_success();  // Başarı mesajını göster
                        $('#modal-add-address').modal('hide');  // Modalı kapat
                    },
                    error: function (data) {
                        swal_error();  // Hata mesajını göster
                    }
                });
            });
//------------------------------------ADRESLERİ GÖSTER-------------------------------------
            $('body').on('click', '.showCariAddresses', function () {
                var cari_id = $(this).data('id');  // Butondan cari ID'sini al
                loadAddresses(cari_id);  // Adresleri yükle
                $('#addressesModal').modal('show');  // Adres modalını aç
            });

            // Adresleri yükleme fonksiyonu
            function loadAddresses(cari_id) {
                $.ajax({
                    url: `/get-addresses/${cari_id}`,  // Laravel rota URL'si
                    method: 'GET',
                    success: function (data) {
                        let rows = '';
                        if (data.length > 0) {
                            data.forEach(address => {
                                rows += `
                                    <tr id="address-row-${address.id}">
                                        <td>${address.address1}</td>
                                        <td>${address.address2}</td>
                                        <td>${address.country}</td>
                                        <td>${address.city}</td>
                                        <td>${address.district}</td>
                                        <td>${address.postalCode}</td>
                                        <td>${address.mobilePhone}</td>
                                        <td>${address.phone}</td>
                                        <td style="text-align: center">
                                            <button data-toggle="tooltip" data-id="${address.id}" data-cari-id="${cari_id}" class="btn btn-sm btn-icon btn-outline-warning btn-circle mr-2 mt-2 editCariAddress" onclick="editAddress(${address.id}, ${cari_id})">
                                                <i class="fa-solid fa-pencil-alt"></i>
                                            </button>
                                            <button data-toggle="tooltip" data-id="${address.id}" data-cari-id="${cari_id}" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 mt-2 deleteAddress" onclick="deleteAddress(${address.id}, ${cari_id})">
                                                <i class="fi-rr-trash"></i>
                                            </button> 
                                        </td>    
                                    </tr>
                                `;
                            });
                        } else {
                            rows = `<tr><td colspan="9" class="text-center">Adres bulunamadı.</td></tr>`;
                        }
                        $('#tableAddressCari').html(rows);  // Tabloyu güncelle
                    },
                    error: function (err) {
                        console.error('Adresler yüklenirken hata oluştu:', err);
                    }
                });
            }

            // Adres düzenleme işlemi
            window.editAddress = function(addressId, cariId) {

                $.ajax({
                    url: `/get-address/${addressId}`,  // Laravel route URL'si
                    method: 'GET',
                    success: function (data) {

                        console.log(data.country);

                        // Formu adresle doldur
                        $('#hiddenCariId').val(cariId);
                        $('#hiddenAddressId').val(addressId);
                        $('#address1').val(data.address1);
                        $('#address2').val(data.address2);
                        $('#country').val(data.country);
                        $('#city').val(data.city);
                        $('#district').val(data.district);
                        $('#postalCode').val(data.postalCode);
                        $('#mobilePhone').val(data.mobilePhone);
                        $('#phone').val(data.phone);
                        $('#modal-add-address').modal('show');
                        $('#addressesModal').modal('hide');
                    },
                    error: function (err) {
                        console.error('Adres düzenlenirken hata oluştu:', err);
                    }
                });
            };
        });
        // Silme işlemi
            window.deleteAddress = function (address_id, cari_id) {
                Swal.fire({
                    title: 'Silmek istediğinizden emin misiniz?',
                    text: "Bu işlem geri alınamaz!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Evet, sil!',
                    cancelButtonText: 'Hayır, iptal et!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/delete-address/${address_id}`,  // Laravel route URL
                            method: 'DELETE',
                            data: {
                                cari_id: cari_id,  // Cari ID'yi de gönderiyoruz
                                _token: $('meta[name="csrf-token"]').attr('content')  // CSRF token
                            },
                            success: function (data) {
                                Swal.fire('Silindi!', 'Adres başarıyla silindi.', 'success');
                                $(`#address-row-${address_id}`).remove();  // Adres satırını DOM'dan kaldır
                            },
                            error: function (err) {
                                Swal.fire('Hata!', 'Adres silinirken bir sorun oluştu.', 'error');
                            }
                        });
                    }
                });
            };
    
//------------------------------------CARI EKLE-----------------------------------------
        $(document).ready(function () {
            
            // success alert
            function swal_success() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Başarıyla kaydedildi.',
                    showConfirmButton: false,
                    timer: 1000
                });
            }
    
            // error alert
            function swal_error() {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: 'Bir şeyler ters gitti !',
                    showConfirmButton: true,
                });
            }
    
            // table serverside
            var table = $('#tableCari').DataTable({
                processing: false,
                serverSide: true,
                ordering: false,
                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'pdf'],
                ajax: "{{ route('cari.index') }}",
                columns: [{
                        data: 'cariCode',
                        name: 'cariCode'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
    
            // csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Hızlı Ekle Modalını Göster
            $('#quickAddCari').click(function () {
                $('#formQuickAddCari').trigger("reset"); // Formu sıfırla
                $('#modal-quick-add-cari').modal('show');
            });

            // Hızlı Kaydet Butonu
            $('#btnQuickAddCari').off('click').on('click', function (e) {
                e.preventDefault();
                var formData = new FormData($('#formQuickAddCari')[0]);

                $.ajax({
                    url: "{{ route('cari.quick_add') }}", // Backend'de ayrı bir route eklenmeli
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#formQuickAddCari').trigger("reset");
                        $('#modal-quick-add-cari').modal('hide');
                        swal_success();
                        $('#tableCari').DataTable().ajax.reload();
                    },
                    error: function (data) {
                        swal_error();
                    }
                });
            });
            // initialize btn add
            $('#createNewCari').click(function () {
                $('#saveBtnCari').val("create cari");
                $('#cari_id').val('');
                $('#formCari').trigger("reset");
                $('#modal-cari').modal('show');
            });
    
            // initialize btn edit
            $('body').on('click', '.editCari', function () {
                var cari_id = $(this).data('id');
                $.get("{{route('cari.index')}}" + '/' + cari_id + '/edit', function (data) {
                    $('#saveBtnCari').val("edit-cari");
                    $('#modal-cari').modal('show');
                    $('#cari_id').val(data.id);
                    $('#cariCode').val(data.cariCode); 
                    $('#description').val(data.description); 
                    $('#relatedPerson').val(data.relatedPerson); 
                    $('#companyName').val(data.companyName); 
                    $('#country').val(data.country); 
                    $('#authorityCode').val(data.authorityCode); 
                    $('#email').val(data.email); 
                    $('#ekalan1').val(data.ekalan1); 
                    $('#ekalan2').val(data.ekalan2); 
                    $('#ekalan3').val(data.ekalan3); 
                    $('#ekalan4').val(data.ekalan4); 
                    $('#ekalan5').val(data.ekalan5); 
                });
            });
    
            // initialize btn save
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
                        $('#formCari').trigger("reset");
                        $('#modal-cari').modal('hide');
                        swal_success();
                        table.draw();
                    },
                    error: function (data) {
                        swal_error();
                    }
                });
            });
            $('body').on('click', '.deleteCari', function () {
                var cari_id = $(this).data("id");  // Cari ID'sini al
                Swal.fire({
                    title: 'Silmek istediğinizden emin misiniz?',
                    text: "Bu işlem geri alınamaz!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Evet, sil!',
                    cancelButtonText: 'Hayır, iptal et!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{route('cari.store')}}" + '/' + cari_id,  // Silme işlemi için doğru route
                            method: 'DELETE',
                            data: {
                                cari_id: cari_id,
                                _token: $('meta[name="csrf-token"]').attr('content')  // CSRF token
                            },
                            success: function (data) {
                                Swal.fire('Silindi!', 'Cari başarıyla silindi.', 'success');
                                $('#tableCari').DataTable().ajax.reload();
                            },
                            error: function (err) {
                                Swal.fire('Hata!', 'Cari silinirken bir sorun oluştu.', 'error');
                            }
                        });
                    }
                });
            });
        });
// ---------------------------------------------------------------------
    </script> 
    @endpush
