<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> Boutique
                    <span></span> Paiement
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                {{-- <div class="row">
                    <div class="col-lg-6 mb-sm-15">
                        <div class="toggle_info">
                            <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Vous avez déjà un compte?</span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to login</a></span>
                        </div>
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">Si vous avez déjà fait des achats chez nous, veuillez saisir vos coordonnées ci-dessous. Si vous êtes un nouveau client, veuillez passer à la page de facturation &amp; Section de livraison.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Username Or Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                                <label class="form-check-label" for="remember"><span>Souvenez-vous de moi</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Mot de passe oublié ?</a>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-md" name="login">Connectez-vous</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="toggle_info">
                            <span><i class="fi-rs-label mr-10"></i><span class="text-muted">Avoir un bon de réduction?</span> <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Cliquez ici pour entrer votre code</a></span>
                        </div>
                        <div class="panel-collapse collapse coupon_form " id="coupon">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have a coupon code, please apply it below.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Coupon Code...">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn  btn-md" name="login">Apply Coupon</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>

                <form wire:submit.prevent="placeOder" onsubmit="$('proccessing').show();">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-25">
                                <h4>Détails de la facture</h4>
                            </div>
                            <div class="billing-address">
                                <div class="form-group">
                                    <input type="text" name="firstname" placeholder="First name *"
                                        wire:model="firstname">
                                    @error('firstname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lastname" placeholder="Last name *"
                                        wire:model="lastname">
                                    @error('lastname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="companyname" placeholder="Company Name"
                                        wire:model="companyname">
                                    @error('companyname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom_select">
                                        <select class="form-control select-active" name="country" wire:model="country">
                                            <option value="">Sélectionnez...</option>
                                            <option value="AX">Aland Islands</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="PW">Belau</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="VG">British Virgin Islands</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo (Brazzaville)</option>
                                            <option value="CD">Congo (Kinshasa)</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CW">CuraÇao</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="CI">Ivory Coast</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Laos</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao S.A.R., China</option>
                                            <option value="MK">Macedonia</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia</option>
                                            <option value="MD">Moldova</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="AN">Netherlands Antilles</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="KP">North Korea</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PS">Palestinian Territory</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="QA">Qatar</option>
                                            <option value="IE">Republic of Ireland</option>
                                            <option value="RE">Reunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russia</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="ST">São Tomé and Príncipe</option>
                                            <option value="BL">Saint Barthélemy</option>
                                            <option value="SH">Saint Helena</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="SX">Saint Martin (Dutch part)</option>
                                            <option value="MF">Saint Martin (French part)</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="SM">San Marino</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia/Sandwich Islands</option>
                                            <option value="KR">South Korea</option>
                                            <option value="SS">South Sudan</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syria</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom (UK)</option>
                                            <option value="US">USA (US)</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VA">Vatican</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="WS">Western Samoa</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="line1" placeholder="Address *" wire:model="line1">
                                    @error('line1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="line2" placeholder="Address line2"
                                        wire:model="line2">
                                    @error('line2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="city" placeholder="City / Town *"
                                        wire:model="city">
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="province" placeholder="State / County *"
                                        wire:model="province">
                                    @error('province')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="zipcode" placeholder="Postcode / ZIP *"
                                        wire:model="zipcode">
                                    @error('zipcode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="mobile" placeholder="Phone *" wire:model="mobile">
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Email address *"
                                        wire:model="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="checkbox" id="createaccount"
                                                wire:model="is_shipping_different">
                                            <label class="form-check-label label_info" data-bs-toggle="collapse"
                                                href="#collapsePassword" data-target="#collapsePassword"
                                                aria-controls="collapsePassword" for="createaccount"><span>Expédier
                                                    à une adresse différente ?</span></label>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <div class="checkbox">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">
                                            <label class="form-check-label label_info" data-bs-toggle="collapse" href="#collapsePassword" data-target="#collapsePassword" aria-controls="collapsePassword" for="createaccount"><span>Create an account?</span></label>
                                        </div>
                                    </div>
                                </div>
                               <div id="collapsePassword" class="form-group create-account collapse in">
                                    <input  type="password" placeholder="Password" name="password">
                                    @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                                </div> --}}
                                {{-- indfo differente adresse --}}




                                @if ($is_shipping_different)
                                    <div class="ship_detail">
                                        {{-- <div class="form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" value="1" type="checkbox"
                                                    name="checkbox" id="differentaddress"
                                                    wire:model="is_shipping_different">
                                                <label class="form-check-label label_info" data-bs-toggle="collapse"
                                                    data-target="#collapseAddress" href="#collapseAddress"
                                                    aria-controls="collapseAddress" for="differentaddress"><span>Ship
                                                        to a different address?</span></label>
                                            </div>
                                        </div>
                                    </div> --}}


                                        <div class="form-group">
                                            <input type="text" name="fname" placeholder="First name *"
                                                wire:model="s_firstname">
                                            @error('s_firstname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="lname" placeholder="Last name *"
                                                wire:model="s_lastname">
                                            @error('s_lastname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="cname" placeholder="Company Name"
                                                wire:model="s_companyname">
                                            @error('s_companyname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom_select">
                                                <select class="form-control select-active" wire:model="s_country">
                                                    <option value="">Select an option...</option>
                                                    <option value="AX">Aland Islands</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="PW">Belau</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia</option>
                                                    <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="VG">British Virgin Islands</option>
                                                    <option value="BN">Brunei</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo (Brazzaville)</option>
                                                    <option value="CD">Congo (Kinshasa)</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CW">CuraÇao</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard Island and McDonald Islands</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="CI">Ivory Coast</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Laos</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macao S.A.R., China</option>
                                                    <option value="MK">Macedonia</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia</option>
                                                    <option value="MD">Moldova</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="AN">Netherlands Antilles</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="KP">North Korea</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PS">Palestinian Territory</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="IE">Republic of Ireland</option>
                                                    <option value="RE">Reunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russia</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="ST">São Tomé and Príncipe</option>
                                                    <option value="BL">Saint Barthélemy</option>
                                                    <option value="SH">Saint Helena</option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="SX">Saint Martin (Dutch part)</option>
                                                    <option value="MF">Saint Martin (French part)</option>
                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia/Sandwich Islands</option>
                                                    <option value="KR">South Korea</option>
                                                    <option value="SS">South Sudan</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syria</option>
                                                    <option value="TW">Taiwan</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TL">Timor-Leste</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="GB">United Kingdom (UK)</option>
                                                    <option value="US">USA (US)</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VA">Vatican</option>
                                                    <option value="VE">Venezuela</option>
                                                    <option value="VN">Vietnam</option>
                                                    <option value="WF">Wallis and Futuna</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="WS">Western Samoa</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                                @error('s_country')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="billing_address" placeholder="Address *"
                                                wire:model="s_line1">
                                            @error('s_line1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="billing_address2" placeholder="Address line2"
                                                wire:model="s_line2">
                                            @error('s_line2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="city" placeholder="City / Town *"
                                                wire:model="s_city">
                                            @error('s_city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="state" placeholder="State / County *"
                                                wire:model="s_province">
                                            @error('s_province')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="zipcode" placeholder="Postcode / ZIP *"
                                                wire:model="s_zipcode">
                                            @error('s_zipcode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" placeholder="Phone *"
                                                wire:model="s_mobile">
                                            @error('s_mobile')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" placeholder="Email address *"
                                                wire:model="s_email">
                                            @error('s_email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                @endif
                                <div class="mb-20">
                                    <h5>Informations complémentaires</h5>
                                </div>
                                <div class="form-group mb-30">
                                    <textarea rows="5" placeholder="Order notes" wire:model="ordernotes"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order_review">
                                <div class="mb-20">
                                    <h4>Votre Commande</h4>
                                </div>

                                <div class="table-responsive order_table text-center">
                                    @if (Cart::instance('cart')->count() > 0)
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Produit</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (Cart::instance('cart')->content() as $item)
                                                    <tr>
                                                        <td class="image product-thumbnail"><img
                                                                src="{{ asset('assets/imgs/products') }}/{{ $item->model->image }}"
                                                                alt="#"></td>
                                                        <td>
                                                            <h5><a
                                                                    href="product-details.html">{{ $item->model->name }}</a>
                                                            </h5> <span class="product-qty">x
                                                                {{ $item->qty }}</span>
                                                        </td>
                                                        <td>
                                                            @foreach ($item->options as $key => $value)
                                                                <div style="vertical-align:middle;width:120px;">
                                                                    <p>{{ $key }}: {{ $value }}</p>

                                                                </div>
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $item->subtotal }}€</td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <th>SubTotal</th>
                                                    <td class="product-subtotal" colspan="3">
                                                        {{ Cart::subtotal() }}€</td>
                                                </tr>
                                                <tr>
                                                    <th>Livraison</th>
                                                    <td colspan="3"><em>Livraison gratuite</em></td>
                                                </tr>
                                                <tr>
                                                    <th>TVA</th>
                                                    <td colspan="3" class="product-subtotal"><span
                                                            class="font-xl text-brand fw-900">{{ Cart::tax() }}€</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td colspan="3" class="product-subtotal"><span
                                                            class="font-xl text-brand fw-900">{{ Cart::total() }}€</span>
                                                    </td>
                                                </tr>



                                            </tbody>
                                        </table>

                                    @endif

                                </div>


                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="payment_method">
                                    <div class="mb-25">
                                        <h5>Mode de Paiement</h5>
                                    </div>

                                    <div class="payment_option">
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio"
                                                name="payment_option" id="exampleRadios3" value="cod"
                                                wire:model="paiementmode">
                                            <label class="form-check-label" for="exampleRadios3"
                                                data-bs-toggle="collapse" data-target="#cashOnDelivery"
                                                aria-controls="cashOnDelivery">Tranfert bancaire</label>
                                            @error('paiementmode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror


                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" value="card"
                                                type="radio" name="payment_option" id="exampleRadios4"
                                                wire:model="paiementmode">
                                            <label class="form-check-label" for="exampleRadios4"
                                                data-bs-toggle="collapse" data-target="#cardPayment"
                                                aria-controls="cardPayment">Card Payment</label>
                                            @error('paiementmode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" value="paypal"
                                                type="radio" name="payment_option" id="exampleRadios5"
                                                wire:model="paiementmode">
                                            <label class="form-check-label" for="exampleRadios5"
                                                data-bs-toggle="collapse" data-target="#paypal"
                                                aria-controls="paypal">Paypal</label>
                                            @error('paiementmode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="payment_method">
                                        @if ($paiementmode == 'card')


                                            <div class="wrap-address-billing">
                                                @if (Session::has('stripe_error'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ Session::get('stripe_error') }}</div>
                                                @endif
                                                <div class="left border">
                                                    <style>
                                                        .row {
                                                            margin: 0;
                                                        }

                                                        .upper {
                                                            padding: 1rem 0;
                                                            justify-content: space-evenly;
                                                        }


                                                        .icons {
                                                            margin-left: auto;
                                                        }

                                                        form span {
                                                            color: rgb(179, 179, 179);
                                                        }

                                                        form {
                                                            padding: 2vh 0;
                                                        }

                                                        input {
                                                            border: 1px solid rgba(0, 0, 0, 0.137);
                                                            padding: 1vh;
                                                            /* margin-bottom: 4vh; */
                                                            outline: none;
                                                            width: 100%;
                                                            background-color: rgb(247, 247, 247);
                                                        }

                                                        input:focus::-webkit-input-placeholder {
                                                            color: transparent;
                                                        }

                                                        .header {
                                                            font-size: 1.5rem;
                                                        }

                                                        .left {
                                                            background-color: #ffffff;
                                                            padding: 2vh;
                                                        }

                                                        .left img {
                                                            width: 5rem;
                                                        }

                                                        .left .col-4 {
                                                            padding-left: 0;
                                                        }

                                                        .right .item {
                                                            padding: 0.3rem 0;
                                                        }

                                                        .right {
                                                            background-color: #ffffff;
                                                            padding: 2vh;
                                                        }

                                                        .col-8 {
                                                            padding: 0 1vh;
                                                        }

                                                        .lower {
                                                            line-height: 2;
                                                        }

                                                        .btn {
                                                            background-color: rgb(23, 4, 189);
                                                            border-color: rgb(23, 4, 189);
                                                            color: white;
                                                            width: 100%;
                                                            font-size: 0.7rem;
                                                            margin: 4vh 0 1.5vh 0;
                                                            padding: 1.5vh;
                                                            border-radius: 0;
                                                        }

                                                        .btn:focus {
                                                            box-shadow: none;
                                                            outline: none;
                                                            box-shadow: none;
                                                            color: white;
                                                            -webkit-box-shadow: none;
                                                            -webkit-user-select: none;
                                                            transition: none;
                                                        }

                                                        .btn:hover {
                                                            color: white;
                                                        }

                                                        a {
                                                            color: black;
                                                        }

                                                        a:hover {
                                                            color: black;
                                                            text-decoration: none;
                                                        }

                                                        input[type=checkbox] {
                                                            width: unset;
                                                            margin-bottom: unset;
                                                        }

                                                        #cvv {
                                                            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.575), rgba(255, 255, 255, 0.541)), url("https://img.icons8.com/material-outlined/24/000000/help.png");
                                                            background-repeat: no-repeat;
                                                            background-position-x: 95%;
                                                            background-position-y: center;
                                                        }

                                                        #cvv:hover {}
                                                    </style>
                                                    <div class="row">
                                                        {{-- <span class="header">Payment</span> --}}


                                                        <img class="icons"
                                                            src="{{ asset('assets/imgs/visa.png') }}" />
                                                        <img src="{{ asset('assets/imgs/mastercard-logo.png') }}" />
                                                        <img src="{{ asset('assets/imgs/maestro.png') }}" />

                                                    </div>
                                                    <form>

                                                        <label>Numéro de la carte:</label>
                                                        <input type="text" name="card-no" value=""
                                                            placeholder="Card Number" wire:model="card_no">
                                                        @error('card_no')
                                                            <label class="text-danger">{{ $message }}</label>
                                                        @enderror
                                                        <div class="row ">
                                                            <div class="col-4 row-in-form"><label>Mois
                                                                    d'expiration:</label>
                                                                <input type="text" name="exp-month" value=""
                                                                    placeholder="MM" wire:model="exp_month">
                                                                @error('exp_month')
                                                                    <label class="text-danger">{{ $message }}</label>
                                                                @enderror
                                                            </div>

                                                            <div class="col-4 row-in-form"><label>Année:</label>
                                                                <input type="text" name="exp-year" value=""
                                                                    placeholder="YYYY" wire:model="exp_year">
                                                                @error('exp_year')
                                                                    <label class="text-danger">{{ $message }}</label>
                                                                @enderror
                                                            </div>
                                                            <div class="col-4 row-in-form"><label>CVC:</label>
                                                                <input type="password" name="cvc" value=""
                                                                    placeholder="CVC" wire:model="cvc">
                                                                @error('cvc')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        @elseif ($paiementmode == 'cod')
                                            <div class="wrap-address-billing">

                                                <div class="left border">
                                                    <style>
                                                        .row {
                                                            margin: 0;
                                                        }

                                                        .upper {
                                                            padding: 1rem 0;
                                                            justify-content: space-evenly;
                                                        }


                                                        .icons {
                                                            margin-left: auto;
                                                        }

                                                        form span {
                                                            color: rgb(179, 179, 179);
                                                        }

                                                        form {
                                                            padding: 2vh 0;
                                                        }

                                                        input {
                                                            border: 1px solid rgba(0, 0, 0, 0.137);
                                                            padding: 1vh;
                                                            /* margin-bottom: 4vh; */
                                                            outline: none;
                                                            width: 100%;
                                                            background-color: rgb(247, 247, 247);
                                                        }

                                                        input:focus::-webkit-input-placeholder {
                                                            color: transparent;
                                                        }

                                                        .header {
                                                            font-size: 1.5rem;
                                                        }

                                                        .left {
                                                            background-color: #ffffff;
                                                            padding: 2vh;
                                                        }

                                                        .left img {
                                                            width: 5rem;
                                                        }

                                                        .left .col-4 {
                                                            padding-left: 0;
                                                        }

                                                        .right .item {
                                                            padding: 0.3rem 0;
                                                        }

                                                        .right {
                                                            background-color: #ffffff;
                                                            padding: 2vh;
                                                        }

                                                        .col-8 {
                                                            padding: 0 1vh;
                                                        }

                                                        .lower {
                                                            line-height: 2;
                                                        }

                                                        .btn {
                                                            background-color: rgb(23, 4, 189);
                                                            border-color: rgb(23, 4, 189);
                                                            color: white;
                                                            width: 100%;
                                                            font-size: 0.7rem;
                                                            margin: 4vh 0 1.5vh 0;
                                                            padding: 1.5vh;
                                                            border-radius: 0;
                                                        }

                                                        .btn:focus {
                                                            box-shadow: none;
                                                            outline: none;
                                                            box-shadow: none;
                                                            color: white;
                                                            -webkit-box-shadow: none;
                                                            -webkit-user-select: none;
                                                            transition: none;
                                                        }

                                                        .btn:hover {
                                                            color: white;
                                                        }

                                                        a {
                                                            color: black;
                                                        }

                                                        a:hover {
                                                            color: black;
                                                            text-decoration: none;
                                                        }

                                                        input[type=checkbox] {
                                                            width: unset;
                                                            margin-bottom: unset;
                                                        }

                                                        #cvv {
                                                            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.575), rgba(255, 255, 255, 0.541)), url("https://img.icons8.com/material-outlined/24/000000/help.png");
                                                            background-repeat: no-repeat;
                                                            background-position-x: 95%;
                                                            background-position-y: center;
                                                        }

                                                        #cvv:hover {}
                                                    </style>

                                                    <form>




                                                        <div class="row ">
                                                            <ul class="col-8 row-in-form">
                                                                <li>
                                                                    <label><b>Intituler du compte:</b>  {{ $transfertbnks->nombanque }}</label>
                                                                </li>
                                                                <hr>
                                                                <li>
                                                                    <label><b>IBAN:</b> {{ $transfertbnks->IBAN }}</label>
                                                                </li>
                                                                <hr>
                                                                <li>
                                                                    <label><b>RIB:</b> {{ $transfertbnks->RIB }}</label>
                                                                </li>


                                                            </ul>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>


                                        @endif
                                    </div>
                                </div>
                                @if ($errors->isEmpty())
                                    <div wire:ignore id="proccessing"
                                        style="font-size:22px;margin-bottom:20px;padding-left:40px;color:green;display:none;">
                                        <i class="fi-rs-spinner"></i>
                                        <span>Traitement...</span>

                                    </div>
                                @endif



                                <button type="submit" class="btn btn-fill-out btn-block mt-30">Passer
                                    commande</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </section>
    </main>
</div>
