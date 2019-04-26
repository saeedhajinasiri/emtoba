@extends('site.main')

@section('content')
    <div class="container">

        <div class="reserveBox" id="info2">
            <section class="reserveBoxSection rprofileForm">
                <h2 class="reserveBoxSectionTitle">ویرایش اطلاعات </h2>
                <form action="/accounts/profile/" method="POST" class="edit-userprofile-form">
                    <input type="hidden" name="csrfmiddlewaretoken" value="51Gens6v3nLTB0X0n8WWZCzVQKRZR2rm">

                    <div id="div_id_timezone" class="form-group">
                        <label for="id_timezone" class="control-label ">
                            Timezone
                        </label>
                        <div class="controls ">
                            <select class="select form-control select2" id="id_timezone" name="timezone">
                                <option value="" selected="selected">---------</option>
                                <option value="Pacific/Midway">(GMT-1100) Pacific/Midway</option>
                                <option value="Pacific/Niue">(GMT-1100) Pacific/Niue</option>
                                <option value="Pacific/Pago_Pago">(GMT-1100) Pacific/Pago_Pago</option>
                                <option value="Pacific/Honolulu">(GMT-1000) Pacific/Honolulu</option>
                                <option value="Pacific/Rarotonga">(GMT-1000) Pacific/Rarotonga</option>
                                <option value="Pacific/Tahiti">(GMT-1000) Pacific/Tahiti</option>
                                <option value="US/Hawaii">(GMT-1000) US/Hawaii</option>
                                <option value="Pacific/Marquesas">(GMT-0930) Pacific/Marquesas</option>
                                <option value="America/Adak">(GMT-0900) America/Adak</option>
                                <option value="Pacific/Gambier">(GMT-0900) Pacific/Gambier</option>
                                <option value="America/Anchorage">(GMT-0800) America/Anchorage</option>
                                <option value="America/Juneau">(GMT-0800) America/Juneau</option>
                                <option value="America/Metlakatla">(GMT-0800) America/Metlakatla</option>
                                <option value="America/Nome">(GMT-0800) America/Nome</option>
                                <option value="America/Sitka">(GMT-0800) America/Sitka</option>
                                <option value="America/Yakutat">(GMT-0800) America/Yakutat</option>
                                <option value="Pacific/Pitcairn">(GMT-0800) Pacific/Pitcairn</option>
                                <option value="US/Alaska">(GMT-0800) US/Alaska</option>
                                <option value="America/Creston">(GMT-0700) America/Creston</option>
                                <option value="America/Dawson">(GMT-0700) America/Dawson</option>
                                <option value="America/Dawson_Creek">(GMT-0700) America/Dawson_Creek</option>
                                <option value="America/Fort_Nelson">(GMT-0700) America/Fort_Nelson</option>
                                <option value="America/Hermosillo">(GMT-0700) America/Hermosillo</option>
                                <option value="America/Los_Angeles">(GMT-0700) America/Los_Angeles</option>
                                <option value="America/Phoenix">(GMT-0700) America/Phoenix</option>
                                <option value="America/Tijuana">(GMT-0700) America/Tijuana</option>
                                <option value="America/Vancouver">(GMT-0700) America/Vancouver</option>
                                <option value="America/Whitehorse">(GMT-0700) America/Whitehorse</option>
                                <option value="Canada/Pacific">(GMT-0700) Canada/Pacific</option>
                                <option value="US/Arizona">(GMT-0700) US/Arizona</option>
                                <option value="US/Pacific">(GMT-0700) US/Pacific</option>
                                <option value="America/Belize">(GMT-0600) America/Belize</option>
                                <option value="America/Boise">(GMT-0600) America/Boise</option>
                                <option value="America/Cambridge_Bay">(GMT-0600) America/Cambridge_Bay</option>
                                <option value="America/Chihuahua">(GMT-0600) America/Chihuahua</option>
                                <option value="America/Costa_Rica">(GMT-0600) America/Costa_Rica</option>
                                <option value="America/Denver">(GMT-0600) America/Denver</option>
                                <option value="America/Edmonton">(GMT-0600) America/Edmonton</option>
                                <option value="America/El_Salvador">(GMT-0600) America/El_Salvador</option>
                                <option value="America/Guatemala">(GMT-0600) America/Guatemala</option>
                                <option value="America/Inuvik">(GMT-0600) America/Inuvik</option>
                                <option value="America/Managua">(GMT-0600) America/Managua</option>
                                <option value="America/Mazatlan">(GMT-0600) America/Mazatlan</option>
                                <option value="America/Ojinaga">(GMT-0600) America/Ojinaga</option>
                                <option value="America/Regina">(GMT-0600) America/Regina</option>
                                <option value="America/Swift_Current">(GMT-0600) America/Swift_Current</option>
                                <option value="America/Tegucigalpa">(GMT-0600) America/Tegucigalpa</option>
                                <option value="America/Yellowknife">(GMT-0600) America/Yellowknife</option>
                                <option value="Canada/Mountain">(GMT-0600) Canada/Mountain</option>
                                <option value="Pacific/Galapagos">(GMT-0600) Pacific/Galapagos</option>
                                <option value="US/Mountain">(GMT-0600) US/Mountain</option>
                                <option value="America/Atikokan">(GMT-0500) America/Atikokan</option>
                                <option value="America/Bahia_Banderas">(GMT-0500) America/Bahia_Banderas</option>
                                <option value="America/Bogota">(GMT-0500) America/Bogota</option>
                                <option value="America/Cancun">(GMT-0500) America/Cancun</option>
                                <option value="America/Cayman">(GMT-0500) America/Cayman</option>
                                <option value="America/Chicago">(GMT-0500) America/Chicago</option>
                                <option value="America/Eirunepe">(GMT-0500) America/Eirunepe</option>
                                <option value="America/Guayaquil">(GMT-0500) America/Guayaquil</option>
                                <option value="America/Indiana/Knox">(GMT-0500) America/Indiana/Knox</option>
                                <option value="America/Indiana/Tell_City">(GMT-0500) America/Indiana/Tell_City</option>
                                <option value="America/Jamaica">(GMT-0500) America/Jamaica</option>
                                <option value="America/Lima">(GMT-0500) America/Lima</option>
                                <option value="America/Matamoros">(GMT-0500) America/Matamoros</option>
                                <option value="America/Menominee">(GMT-0500) America/Menominee</option>
                                <option value="America/Merida">(GMT-0500) America/Merida</option>
                                <option value="America/Mexico_City">(GMT-0500) America/Mexico_City</option>
                                <option value="America/Monterrey">(GMT-0500) America/Monterrey</option>
                                <option value="America/North_Dakota/Beulah">(GMT-0500) America/North_Dakota/Beulah</option>
                                <option value="America/North_Dakota/Center">(GMT-0500) America/North_Dakota/Center</option>
                                <option value="America/North_Dakota/New_Salem">(GMT-0500) America/North_Dakota/New_Salem</option>
                                <option value="America/Panama">(GMT-0500) America/Panama</option>
                                <option value="America/Rainy_River">(GMT-0500) America/Rainy_River</option>
                                <option value="America/Rankin_Inlet">(GMT-0500) America/Rankin_Inlet</option>
                                <option value="America/Resolute">(GMT-0500) America/Resolute</option>
                                <option value="America/Rio_Branco">(GMT-0500) America/Rio_Branco</option>
                                <option value="America/Winnipeg">(GMT-0500) America/Winnipeg</option>
                                <option value="Canada/Central">(GMT-0500) Canada/Central</option>
                                <option value="Pacific/Easter">(GMT-0500) Pacific/Easter</option>
                                <option value="US/Central">(GMT-0500) US/Central</option>
                                <option value="America/Anguilla">(GMT-0400) America/Anguilla</option>
                                <option value="America/Antigua">(GMT-0400) America/Antigua</option>
                                <option value="America/Aruba">(GMT-0400) America/Aruba</option>
                                <option value="America/Barbados">(GMT-0400) America/Barbados</option>
                                <option value="America/Blanc-Sablon">(GMT-0400) America/Blanc-Sablon</option>
                                <option value="America/Boa_Vista">(GMT-0400) America/Boa_Vista</option>
                                <option value="America/Caracas">(GMT-0400) America/Caracas</option>
                                <option value="America/Curacao">(GMT-0400) America/Curacao</option>
                                <option value="America/Detroit">(GMT-0400) America/Detroit</option>
                                <option value="America/Dominica">(GMT-0400) America/Dominica</option>
                                <option value="America/Grand_Turk">(GMT-0400) America/Grand_Turk</option>
                                <option value="America/Grenada">(GMT-0400) America/Grenada</option>
                                <option value="America/Guadeloupe">(GMT-0400) America/Guadeloupe</option>
                                <option value="America/Guyana">(GMT-0400) America/Guyana</option>
                                <option value="America/Havana">(GMT-0400) America/Havana</option>
                                <option value="America/Indiana/Indianapolis">(GMT-0400) America/Indiana/Indianapolis</option>
                                <option value="America/Indiana/Marengo">(GMT-0400) America/Indiana/Marengo</option>
                                <option value="America/Indiana/Petersburg">(GMT-0400) America/Indiana/Petersburg</option>
                                <option value="America/Indiana/Vevay">(GMT-0400) America/Indiana/Vevay</option>
                                <option value="America/Indiana/Vincennes">(GMT-0400) America/Indiana/Vincennes</option>
                                <option value="America/Indiana/Winamac">(GMT-0400) America/Indiana/Winamac</option>
                                <option value="America/Iqaluit">(GMT-0400) America/Iqaluit</option>
                                <option value="America/Kentucky/Louisville">(GMT-0400) America/Kentucky/Louisville</option>
                                <option value="America/Kentucky/Monticello">(GMT-0400) America/Kentucky/Monticello</option>
                                <option value="America/Kralendijk">(GMT-0400) America/Kralendijk</option>
                                <option value="America/La_Paz">(GMT-0400) America/La_Paz</option>
                                <option value="America/Lower_Princes">(GMT-0400) America/Lower_Princes</option>
                                <option value="America/Manaus">(GMT-0400) America/Manaus</option>
                                <option value="America/Marigot">(GMT-0400) America/Marigot</option>
                                <option value="America/Martinique">(GMT-0400) America/Martinique</option>
                                <option value="America/Montserrat">(GMT-0400) America/Montserrat</option>
                                <option value="America/Nassau">(GMT-0400) America/Nassau</option>
                                <option value="America/New_York">(GMT-0400) America/New_York</option>
                                <option value="America/Nipigon">(GMT-0400) America/Nipigon</option>
                                <option value="America/Pangnirtung">(GMT-0400) America/Pangnirtung</option>
                                <option value="America/Port-au-Prince">(GMT-0400) America/Port-au-Prince</option>
                                <option value="America/Port_of_Spain">(GMT-0400) America/Port_of_Spain</option>
                                <option value="America/Porto_Velho">(GMT-0400) America/Porto_Velho</option>
                                <option value="America/Puerto_Rico">(GMT-0400) America/Puerto_Rico</option>
                                <option value="America/Santo_Domingo">(GMT-0400) America/Santo_Domingo</option>
                                <option value="America/St_Barthelemy">(GMT-0400) America/St_Barthelemy</option>
                                <option value="America/St_Kitts">(GMT-0400) America/St_Kitts</option>
                                <option value="America/St_Lucia">(GMT-0400) America/St_Lucia</option>
                                <option value="America/St_Thomas">(GMT-0400) America/St_Thomas</option>
                                <option value="America/St_Vincent">(GMT-0400) America/St_Vincent</option>
                                <option value="America/Thunder_Bay">(GMT-0400) America/Thunder_Bay</option>
                                <option value="America/Toronto">(GMT-0400) America/Toronto</option>
                                <option value="America/Tortola">(GMT-0400) America/Tortola</option>
                                <option value="Canada/Eastern">(GMT-0400) Canada/Eastern</option>
                                <option value="US/Eastern">(GMT-0400) US/Eastern</option>
                                <option value="America/Araguaina">(GMT-0300) America/Araguaina</option>
                                <option value="America/Argentina/Buenos_Aires">(GMT-0300) America/Argentina/Buenos_Aires</option>
                                <option value="America/Argentina/Catamarca">(GMT-0300) America/Argentina/Catamarca</option>
                                <option value="America/Argentina/Cordoba">(GMT-0300) America/Argentina/Cordoba</option>
                                <option value="America/Argentina/Jujuy">(GMT-0300) America/Argentina/Jujuy</option>
                                <option value="America/Argentina/La_Rioja">(GMT-0300) America/Argentina/La_Rioja</option>
                                <option value="America/Argentina/Mendoza">(GMT-0300) America/Argentina/Mendoza</option>
                                <option value="America/Argentina/Rio_Gallegos">(GMT-0300) America/Argentina/Rio_Gallegos</option>
                                <option value="America/Argentina/Salta">(GMT-0300) America/Argentina/Salta</option>
                                <option value="America/Argentina/San_Juan">(GMT-0300) America/Argentina/San_Juan</option>
                                <option value="America/Argentina/San_Luis">(GMT-0300) America/Argentina/San_Luis</option>
                                <option value="America/Argentina/Tucuman">(GMT-0300) America/Argentina/Tucuman</option>
                                <option value="America/Argentina/Ushuaia">(GMT-0300) America/Argentina/Ushuaia</option>
                                <option value="America/Asuncion">(GMT-0300) America/Asuncion</option>
                                <option value="America/Bahia">(GMT-0300) America/Bahia</option>
                                <option value="America/Belem">(GMT-0300) America/Belem</option>
                                <option value="America/Campo_Grande">(GMT-0300) America/Campo_Grande</option>
                                <option value="America/Cayenne">(GMT-0300) America/Cayenne</option>
                                <option value="America/Cuiaba">(GMT-0300) America/Cuiaba</option>
                                <option value="America/Fortaleza">(GMT-0300) America/Fortaleza</option>
                                <option value="America/Glace_Bay">(GMT-0300) America/Glace_Bay</option>
                                <option value="America/Goose_Bay">(GMT-0300) America/Goose_Bay</option>
                                <option value="America/Halifax">(GMT-0300) America/Halifax</option>
                                <option value="America/Maceio">(GMT-0300) America/Maceio</option>
                                <option value="America/Moncton">(GMT-0300) America/Moncton</option>
                                <option value="America/Montevideo">(GMT-0300) America/Montevideo</option>
                                <option value="America/Paramaribo">(GMT-0300) America/Paramaribo</option>
                                <option value="America/Punta_Arenas">(GMT-0300) America/Punta_Arenas</option>
                                <option value="America/Recife">(GMT-0300) America/Recife</option>
                                <option value="America/Santarem">(GMT-0300) America/Santarem</option>
                                <option value="America/Santiago">(GMT-0300) America/Santiago</option>
                                <option value="America/Thule">(GMT-0300) America/Thule</option>
                                <option value="Antarctica/Palmer">(GMT-0300) Antarctica/Palmer</option>
                                <option value="Antarctica/Rothera">(GMT-0300) Antarctica/Rothera</option>
                                <option value="Atlantic/Bermuda">(GMT-0300) Atlantic/Bermuda</option>
                                <option value="Atlantic/Stanley">(GMT-0300) Atlantic/Stanley</option>
                                <option value="Canada/Atlantic">(GMT-0300) Canada/Atlantic</option>
                                <option value="America/St_Johns">(GMT-0230) America/St_Johns</option>
                                <option value="Canada/Newfoundland">(GMT-0230) Canada/Newfoundland</option>
                                <option value="America/Godthab">(GMT-0200) America/Godthab</option>
                                <option value="America/Miquelon">(GMT-0200) America/Miquelon</option>
                                <option value="America/Noronha">(GMT-0200) America/Noronha</option>
                                <option value="America/Sao_Paulo">(GMT-0200) America/Sao_Paulo</option>
                                <option value="Atlantic/South_Georgia">(GMT-0200) Atlantic/South_Georgia</option>
                                <option value="Atlantic/Cape_Verde">(GMT-0100) Atlantic/Cape_Verde</option>
                                <option value="Africa/Abidjan">(GMT+0000) Africa/Abidjan</option>
                                <option value="Africa/Accra">(GMT+0000) Africa/Accra</option>
                                <option value="Africa/Bamako">(GMT+0000) Africa/Bamako</option>
                                <option value="Africa/Banjul">(GMT+0000) Africa/Banjul</option>
                                <option value="Africa/Bissau">(GMT+0000) Africa/Bissau</option>
                                <option value="Africa/Conakry">(GMT+0000) Africa/Conakry</option>
                                <option value="Africa/Dakar">(GMT+0000) Africa/Dakar</option>
                                <option value="Africa/Freetown">(GMT+0000) Africa/Freetown</option>
                                <option value="Africa/Lome">(GMT+0000) Africa/Lome</option>
                                <option value="Africa/Monrovia">(GMT+0000) Africa/Monrovia</option>
                                <option value="Africa/Nouakchott">(GMT+0000) Africa/Nouakchott</option>
                                <option value="Africa/Ouagadougou">(GMT+0000) Africa/Ouagadougou</option>
                                <option value="Africa/Sao_Tome">(GMT+0000) Africa/Sao_Tome</option>
                                <option value="America/Danmarkshavn">(GMT+0000) America/Danmarkshavn</option>
                                <option value="America/Scoresbysund">(GMT+0000) America/Scoresbysund</option>
                                <option value="Atlantic/Azores">(GMT+0000) Atlantic/Azores</option>
                                <option value="Atlantic/Reykjavik">(GMT+0000) Atlantic/Reykjavik</option>
                                <option value="Atlantic/St_Helena">(GMT+0000) Atlantic/St_Helena</option>
                                <option value="GMT">(GMT+0000) GMT</option>
                                <option value="UTC">(GMT+0000) UTC</option>
                                <option value="Africa/Algiers">(GMT+0100) Africa/Algiers</option>
                                <option value="Africa/Bangui">(GMT+0100) Africa/Bangui</option>
                                <option value="Africa/Brazzaville">(GMT+0100) Africa/Brazzaville</option>
                                <option value="Africa/Casablanca">(GMT+0100) Africa/Casablanca</option>
                                <option value="Africa/Douala">(GMT+0100) Africa/Douala</option>
                                <option value="Africa/El_Aaiun">(GMT+0100) Africa/El_Aaiun</option>
                                <option value="Africa/Kinshasa">(GMT+0100) Africa/Kinshasa</option>
                                <option value="Africa/Lagos">(GMT+0100) Africa/Lagos</option>
                                <option value="Africa/Libreville">(GMT+0100) Africa/Libreville</option>
                                <option value="Africa/Luanda">(GMT+0100) Africa/Luanda</option>
                                <option value="Africa/Malabo">(GMT+0100) Africa/Malabo</option>
                                <option value="Africa/Ndjamena">(GMT+0100) Africa/Ndjamena</option>
                                <option value="Africa/Niamey">(GMT+0100) Africa/Niamey</option>
                                <option value="Africa/Porto-Novo">(GMT+0100) Africa/Porto-Novo</option>
                                <option value="Africa/Tunis">(GMT+0100) Africa/Tunis</option>
                                <option value="Atlantic/Canary">(GMT+0100) Atlantic/Canary</option>
                                <option value="Atlantic/Faroe">(GMT+0100) Atlantic/Faroe</option>
                                <option value="Atlantic/Madeira">(GMT+0100) Atlantic/Madeira</option>
                                <option value="Europe/Dublin">(GMT+0100) Europe/Dublin</option>
                                <option value="Europe/Guernsey">(GMT+0100) Europe/Guernsey</option>
                                <option value="Europe/Isle_of_Man">(GMT+0100) Europe/Isle_of_Man</option>
                                <option value="Europe/Jersey">(GMT+0100) Europe/Jersey</option>
                                <option value="Europe/Lisbon">(GMT+0100) Europe/Lisbon</option>
                                <option value="Europe/London">(GMT+0100) Europe/London</option>
                                <option value="Africa/Blantyre">(GMT+0200) Africa/Blantyre</option>
                                <option value="Africa/Bujumbura">(GMT+0200) Africa/Bujumbura</option>
                                <option value="Africa/Cairo">(GMT+0200) Africa/Cairo</option>
                                <option value="Africa/Ceuta">(GMT+0200) Africa/Ceuta</option>
                                <option value="Africa/Gaborone">(GMT+0200) Africa/Gaborone</option>
                                <option value="Africa/Harare">(GMT+0200) Africa/Harare</option>
                                <option value="Africa/Johannesburg">(GMT+0200) Africa/Johannesburg</option>
                                <option value="Africa/Kigali">(GMT+0200) Africa/Kigali</option>
                                <option value="Africa/Lubumbashi">(GMT+0200) Africa/Lubumbashi</option>
                                <option value="Africa/Lusaka">(GMT+0200) Africa/Lusaka</option>
                                <option value="Africa/Maputo">(GMT+0200) Africa/Maputo</option>
                                <option value="Africa/Maseru">(GMT+0200) Africa/Maseru</option>
                                <option value="Africa/Mbabane">(GMT+0200) Africa/Mbabane</option>
                                <option value="Africa/Tripoli">(GMT+0200) Africa/Tripoli</option>
                                <option value="Africa/Windhoek">(GMT+0200) Africa/Windhoek</option>
                                <option value="Antarctica/Troll">(GMT+0200) Antarctica/Troll</option>
                                <option value="Arctic/Longyearbyen">(GMT+0200) Arctic/Longyearbyen</option>
                                <option value="Europe/Amsterdam">(GMT+0200) Europe/Amsterdam</option>
                                <option value="Europe/Andorra">(GMT+0200) Europe/Andorra</option>
                                <option value="Europe/Belgrade">(GMT+0200) Europe/Belgrade</option>
                                <option value="Europe/Berlin">(GMT+0200) Europe/Berlin</option>
                                <option value="Europe/Bratislava">(GMT+0200) Europe/Bratislava</option>
                                <option value="Europe/Brussels">(GMT+0200) Europe/Brussels</option>
                                <option value="Europe/Budapest">(GMT+0200) Europe/Budapest</option>
                                <option value="Europe/Busingen">(GMT+0200) Europe/Busingen</option>
                                <option value="Europe/Copenhagen">(GMT+0200) Europe/Copenhagen</option>
                                <option value="Europe/Gibraltar">(GMT+0200) Europe/Gibraltar</option>
                                <option value="Europe/Kaliningrad">(GMT+0200) Europe/Kaliningrad</option>
                                <option value="Europe/Ljubljana">(GMT+0200) Europe/Ljubljana</option>
                                <option value="Europe/Luxembourg">(GMT+0200) Europe/Luxembourg</option>
                                <option value="Europe/Madrid">(GMT+0200) Europe/Madrid</option>
                                <option value="Europe/Malta">(GMT+0200) Europe/Malta</option>
                                <option value="Europe/Monaco">(GMT+0200) Europe/Monaco</option>
                                <option value="Europe/Oslo">(GMT+0200) Europe/Oslo</option>
                                <option value="Europe/Paris">(GMT+0200) Europe/Paris</option>
                                <option value="Europe/Podgorica">(GMT+0200) Europe/Podgorica</option>
                                <option value="Europe/Prague">(GMT+0200) Europe/Prague</option>
                                <option value="Europe/Rome">(GMT+0200) Europe/Rome</option>
                                <option value="Europe/San_Marino">(GMT+0200) Europe/San_Marino</option>
                                <option value="Europe/Sarajevo">(GMT+0200) Europe/Sarajevo</option>
                                <option value="Europe/Skopje">(GMT+0200) Europe/Skopje</option>
                                <option value="Europe/Stockholm">(GMT+0200) Europe/Stockholm</option>
                                <option value="Europe/Tirane">(GMT+0200) Europe/Tirane</option>
                                <option value="Europe/Vaduz">(GMT+0200) Europe/Vaduz</option>
                                <option value="Europe/Vatican">(GMT+0200) Europe/Vatican</option>
                                <option value="Europe/Vienna">(GMT+0200) Europe/Vienna</option>
                                <option value="Europe/Warsaw">(GMT+0200) Europe/Warsaw</option>
                                <option value="Europe/Zagreb">(GMT+0200) Europe/Zagreb</option>
                                <option value="Europe/Zurich">(GMT+0200) Europe/Zurich</option>
                                <option value="Africa/Addis_Ababa">(GMT+0300) Africa/Addis_Ababa</option>
                                <option value="Africa/Asmara">(GMT+0300) Africa/Asmara</option>
                                <option value="Africa/Dar_es_Salaam">(GMT+0300) Africa/Dar_es_Salaam</option>
                                <option value="Africa/Djibouti">(GMT+0300) Africa/Djibouti</option>
                                <option value="Africa/Juba">(GMT+0300) Africa/Juba</option>
                                <option value="Africa/Kampala">(GMT+0300) Africa/Kampala</option>
                                <option value="Africa/Khartoum">(GMT+0300) Africa/Khartoum</option>
                                <option value="Africa/Mogadishu">(GMT+0300) Africa/Mogadishu</option>
                                <option value="Africa/Nairobi">(GMT+0300) Africa/Nairobi</option>
                                <option value="Antarctica/Syowa">(GMT+0300) Antarctica/Syowa</option>
                                <option value="Asia/Aden">(GMT+0300) Asia/Aden</option>
                                <option value="Asia/Amman">(GMT+0300) Asia/Amman</option>
                                <option value="Asia/Baghdad">(GMT+0300) Asia/Baghdad</option>
                                <option value="Asia/Bahrain">(GMT+0300) Asia/Bahrain</option>
                                <option value="Asia/Beirut">(GMT+0300) Asia/Beirut</option>
                                <option value="Asia/Damascus">(GMT+0300) Asia/Damascus</option>
                                <option value="Asia/Famagusta">(GMT+0300) Asia/Famagusta</option>
                                <option value="Asia/Gaza">(GMT+0300) Asia/Gaza</option>
                                <option value="Asia/Hebron">(GMT+0300) Asia/Hebron</option>
                                <option value="Asia/Jerusalem">(GMT+0300) Asia/Jerusalem</option>
                                <option value="Asia/Kuwait">(GMT+0300) Asia/Kuwait</option>
                                <option value="Asia/Nicosia">(GMT+0300) Asia/Nicosia</option>
                                <option value="Asia/Qatar">(GMT+0300) Asia/Qatar</option>
                                <option value="Asia/Riyadh">(GMT+0300) Asia/Riyadh</option>
                                <option value="Europe/Athens">(GMT+0300) Europe/Athens</option>
                                <option value="Europe/Bucharest">(GMT+0300) Europe/Bucharest</option>
                                <option value="Europe/Chisinau">(GMT+0300) Europe/Chisinau</option>
                                <option value="Europe/Helsinki">(GMT+0300) Europe/Helsinki</option>
                                <option value="Europe/Istanbul">(GMT+0300) Europe/Istanbul</option>
                                <option value="Europe/Kiev">(GMT+0300) Europe/Kiev</option>
                                <option value="Europe/Kirov">(GMT+0300) Europe/Kirov</option>
                                <option value="Europe/Mariehamn">(GMT+0300) Europe/Mariehamn</option>
                                <option value="Europe/Minsk">(GMT+0300) Europe/Minsk</option>
                                <option value="Europe/Moscow">(GMT+0300) Europe/Moscow</option>
                                <option value="Europe/Riga">(GMT+0300) Europe/Riga</option>
                                <option value="Europe/Simferopol">(GMT+0300) Europe/Simferopol</option>
                                <option value="Europe/Sofia">(GMT+0300) Europe/Sofia</option>
                                <option value="Europe/Tallinn">(GMT+0300) Europe/Tallinn</option>
                                <option value="Europe/Uzhgorod">(GMT+0300) Europe/Uzhgorod</option>
                                <option value="Europe/Vilnius">(GMT+0300) Europe/Vilnius</option>
                                <option value="Europe/Volgograd">(GMT+0300) Europe/Volgograd</option>
                                <option value="Europe/Zaporozhye">(GMT+0300) Europe/Zaporozhye</option>
                                <option value="Indian/Antananarivo">(GMT+0300) Indian/Antananarivo</option>
                                <option value="Indian/Comoro">(GMT+0300) Indian/Comoro</option>
                                <option value="Indian/Mayotte">(GMT+0300) Indian/Mayotte</option>
                                <option value="Asia/Tehran">(GMT+0330) Asia/Tehran</option>
                                <option value="Asia/Baku">(GMT+0400) Asia/Baku</option>
                                <option value="Asia/Dubai">(GMT+0400) Asia/Dubai</option>
                                <option value="Asia/Muscat">(GMT+0400) Asia/Muscat</option>
                                <option value="Asia/Tbilisi">(GMT+0400) Asia/Tbilisi</option>
                                <option value="Asia/Yerevan">(GMT+0400) Asia/Yerevan</option>
                                <option value="Europe/Astrakhan">(GMT+0400) Europe/Astrakhan</option>
                                <option value="Europe/Samara">(GMT+0400) Europe/Samara</option>
                                <option value="Europe/Saratov">(GMT+0400) Europe/Saratov</option>
                                <option value="Europe/Ulyanovsk">(GMT+0400) Europe/Ulyanovsk</option>
                                <option value="Indian/Mahe">(GMT+0400) Indian/Mahe</option>
                                <option value="Indian/Mauritius">(GMT+0400) Indian/Mauritius</option>
                                <option value="Indian/Reunion">(GMT+0400) Indian/Reunion</option>
                                <option value="Asia/Kabul">(GMT+0430) Asia/Kabul</option>
                                <option value="Antarctica/Mawson">(GMT+0500) Antarctica/Mawson</option>
                                <option value="Asia/Aqtau">(GMT+0500) Asia/Aqtau</option>
                                <option value="Asia/Aqtobe">(GMT+0500) Asia/Aqtobe</option>
                                <option value="Asia/Ashgabat">(GMT+0500) Asia/Ashgabat</option>
                                <option value="Asia/Atyrau">(GMT+0500) Asia/Atyrau</option>
                                <option value="Asia/Dushanbe">(GMT+0500) Asia/Dushanbe</option>
                                <option value="Asia/Karachi">(GMT+0500) Asia/Karachi</option>
                                <option value="Asia/Oral">(GMT+0500) Asia/Oral</option>
                                <option value="Asia/Samarkand">(GMT+0500) Asia/Samarkand</option>
                                <option value="Asia/Tashkent">(GMT+0500) Asia/Tashkent</option>
                                <option value="Asia/Yekaterinburg">(GMT+0500) Asia/Yekaterinburg</option>
                                <option value="Indian/Kerguelen">(GMT+0500) Indian/Kerguelen</option>
                                <option value="Indian/Maldives">(GMT+0500) Indian/Maldives</option>
                                <option value="Asia/Colombo">(GMT+0530) Asia/Colombo</option>
                                <option value="Asia/Kolkata">(GMT+0530) Asia/Kolkata</option>
                                <option value="Asia/Kathmandu">(GMT+0545) Asia/Kathmandu</option>
                                <option value="Antarctica/Vostok">(GMT+0600) Antarctica/Vostok</option>
                                <option value="Asia/Almaty">(GMT+0600) Asia/Almaty</option>
                                <option value="Asia/Bishkek">(GMT+0600) Asia/Bishkek</option>
                                <option value="Asia/Dhaka">(GMT+0600) Asia/Dhaka</option>
                                <option value="Asia/Omsk">(GMT+0600) Asia/Omsk</option>
                                <option value="Asia/Qyzylorda">(GMT+0600) Asia/Qyzylorda</option>
                                <option value="Asia/Thimphu">(GMT+0600) Asia/Thimphu</option>
                                <option value="Asia/Urumqi">(GMT+0600) Asia/Urumqi</option>
                                <option value="Indian/Chagos">(GMT+0600) Indian/Chagos</option>
                                <option value="Asia/Yangon">(GMT+0630) Asia/Yangon</option>
                                <option value="Indian/Cocos">(GMT+0630) Indian/Cocos</option>
                                <option value="Antarctica/Davis">(GMT+0700) Antarctica/Davis</option>
                                <option value="Asia/Bangkok">(GMT+0700) Asia/Bangkok</option>
                                <option value="Asia/Barnaul">(GMT+0700) Asia/Barnaul</option>
                                <option value="Asia/Ho_Chi_Minh">(GMT+0700) Asia/Ho_Chi_Minh</option>
                                <option value="Asia/Hovd">(GMT+0700) Asia/Hovd</option>
                                <option value="Asia/Jakarta">(GMT+0700) Asia/Jakarta</option>
                                <option value="Asia/Krasnoyarsk">(GMT+0700) Asia/Krasnoyarsk</option>
                                <option value="Asia/Novokuznetsk">(GMT+0700) Asia/Novokuznetsk</option>
                                <option value="Asia/Novosibirsk">(GMT+0700) Asia/Novosibirsk</option>
                                <option value="Asia/Phnom_Penh">(GMT+0700) Asia/Phnom_Penh</option>
                                <option value="Asia/Pontianak">(GMT+0700) Asia/Pontianak</option>
                                <option value="Asia/Tomsk">(GMT+0700) Asia/Tomsk</option>
                                <option value="Asia/Vientiane">(GMT+0700) Asia/Vientiane</option>
                                <option value="Indian/Christmas">(GMT+0700) Indian/Christmas</option>
                                <option value="Asia/Brunei">(GMT+0800) Asia/Brunei</option>
                                <option value="Asia/Choibalsan">(GMT+0800) Asia/Choibalsan</option>
                                <option value="Asia/Hong_Kong">(GMT+0800) Asia/Hong_Kong</option>
                                <option value="Asia/Irkutsk">(GMT+0800) Asia/Irkutsk</option>
                                <option value="Asia/Kuala_Lumpur">(GMT+0800) Asia/Kuala_Lumpur</option>
                                <option value="Asia/Kuching">(GMT+0800) Asia/Kuching</option>
                                <option value="Asia/Macau">(GMT+0800) Asia/Macau</option>
                                <option value="Asia/Makassar">(GMT+0800) Asia/Makassar</option>
                                <option value="Asia/Manila">(GMT+0800) Asia/Manila</option>
                                <option value="Asia/Shanghai">(GMT+0800) Asia/Shanghai</option>
                                <option value="Asia/Singapore">(GMT+0800) Asia/Singapore</option>
                                <option value="Asia/Taipei">(GMT+0800) Asia/Taipei</option>
                                <option value="Asia/Ulaanbaatar">(GMT+0800) Asia/Ulaanbaatar</option>
                                <option value="Australia/Perth">(GMT+0800) Australia/Perth</option>
                                <option value="Asia/Pyongyang">(GMT+0830) Asia/Pyongyang</option>
                                <option value="Australia/Eucla">(GMT+0845) Australia/Eucla</option>
                                <option value="Asia/Chita">(GMT+0900) Asia/Chita</option>
                                <option value="Asia/Dili">(GMT+0900) Asia/Dili</option>
                                <option value="Asia/Jayapura">(GMT+0900) Asia/Jayapura</option>
                                <option value="Asia/Khandyga">(GMT+0900) Asia/Khandyga</option>
                                <option value="Asia/Seoul">(GMT+0900) Asia/Seoul</option>
                                <option value="Asia/Tokyo">(GMT+0900) Asia/Tokyo</option>
                                <option value="Asia/Yakutsk">(GMT+0900) Asia/Yakutsk</option>
                                <option value="Pacific/Palau">(GMT+0900) Pacific/Palau</option>
                                <option value="Australia/Darwin">(GMT+0930) Australia/Darwin</option>
                                <option value="Antarctica/DumontDUrville">(GMT+1000) Antarctica/DumontDUrville</option>
                                <option value="Asia/Ust-Nera">(GMT+1000) Asia/Ust-Nera</option>
                                <option value="Asia/Vladivostok">(GMT+1000) Asia/Vladivostok</option>
                                <option value="Australia/Brisbane">(GMT+1000) Australia/Brisbane</option>
                                <option value="Australia/Lindeman">(GMT+1000) Australia/Lindeman</option>
                                <option value="Pacific/Chuuk">(GMT+1000) Pacific/Chuuk</option>
                                <option value="Pacific/Guam">(GMT+1000) Pacific/Guam</option>
                                <option value="Pacific/Port_Moresby">(GMT+1000) Pacific/Port_Moresby</option>
                                <option value="Pacific/Saipan">(GMT+1000) Pacific/Saipan</option>
                                <option value="Australia/Adelaide">(GMT+1030) Australia/Adelaide</option>
                                <option value="Australia/Broken_Hill">(GMT+1030) Australia/Broken_Hill</option>
                                <option value="Antarctica/Casey">(GMT+1100) Antarctica/Casey</option>
                                <option value="Antarctica/Macquarie">(GMT+1100) Antarctica/Macquarie</option>
                                <option value="Asia/Magadan">(GMT+1100) Asia/Magadan</option>
                                <option value="Asia/Sakhalin">(GMT+1100) Asia/Sakhalin</option>
                                <option value="Asia/Srednekolymsk">(GMT+1100) Asia/Srednekolymsk</option>
                                <option value="Australia/Currie">(GMT+1100) Australia/Currie</option>
                                <option value="Australia/Hobart">(GMT+1100) Australia/Hobart</option>
                                <option value="Australia/Lord_Howe">(GMT+1100) Australia/Lord_Howe</option>
                                <option value="Australia/Melbourne">(GMT+1100) Australia/Melbourne</option>
                                <option value="Australia/Sydney">(GMT+1100) Australia/Sydney</option>
                                <option value="Pacific/Bougainville">(GMT+1100) Pacific/Bougainville</option>
                                <option value="Pacific/Efate">(GMT+1100) Pacific/Efate</option>
                                <option value="Pacific/Guadalcanal">(GMT+1100) Pacific/Guadalcanal</option>
                                <option value="Pacific/Kosrae">(GMT+1100) Pacific/Kosrae</option>
                                <option value="Pacific/Norfolk">(GMT+1100) Pacific/Norfolk</option>
                                <option value="Pacific/Noumea">(GMT+1100) Pacific/Noumea</option>
                                <option value="Pacific/Pohnpei">(GMT+1100) Pacific/Pohnpei</option>
                                <option value="Asia/Anadyr">(GMT+1200) Asia/Anadyr</option>
                                <option value="Asia/Kamchatka">(GMT+1200) Asia/Kamchatka</option>
                                <option value="Pacific/Fiji">(GMT+1200) Pacific/Fiji</option>
                                <option value="Pacific/Funafuti">(GMT+1200) Pacific/Funafuti</option>
                                <option value="Pacific/Kwajalein">(GMT+1200) Pacific/Kwajalein</option>
                                <option value="Pacific/Majuro">(GMT+1200) Pacific/Majuro</option>
                                <option value="Pacific/Nauru">(GMT+1200) Pacific/Nauru</option>
                                <option value="Pacific/Tarawa">(GMT+1200) Pacific/Tarawa</option>
                                <option value="Pacific/Wake">(GMT+1200) Pacific/Wake</option>
                                <option value="Pacific/Wallis">(GMT+1200) Pacific/Wallis</option>
                                <option value="Antarctica/McMurdo">(GMT+1300) Antarctica/McMurdo</option>
                                <option value="Pacific/Auckland">(GMT+1300) Pacific/Auckland</option>
                                <option value="Pacific/Enderbury">(GMT+1300) Pacific/Enderbury</option>
                                <option value="Pacific/Fakaofo">(GMT+1300) Pacific/Fakaofo</option>
                                <option value="Pacific/Tongatapu">(GMT+1300) Pacific/Tongatapu</option>
                                <option value="Pacific/Chatham">(GMT+1345) Pacific/Chatham</option>
                                <option value="Pacific/Apia">(GMT+1400) Pacific/Apia</option>
                                <option value="Pacific/Kiritimati">(GMT+1400) Pacific/Kiritimati</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="div_id_show_me_as_identity_verifier" class="checkbox">
                            <label for="id_show_me_as_identity_verifier" class="">
                                <input checked="checked" class="checkboxinput" id="id_show_me_as_identity_verifier" name="show_me_as_identity_verifier" type="checkbox">
                                Show me as real name verifier to others
                                <p id="hint_id_show_me_as_identity_verifier" class="help-block">Your username is shown when people make new trades with your old trading partners.</p>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="div_id_disable_sensitive_emails" class="checkbox">
                            <label for="id_disable_sensitive_emails" class="">
                                <input class="checkboxinput" id="id_disable_sensitive_emails" name="disable_sensitive_emails" type="checkbox">
                                Disable sensitive information from email notifications
                                <p id="hint_id_disable_sensitive_emails" class="help-block">The e-mails will just ask you to log in to the site, where the actual notifications will be.</p>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="div_id_enable_web_notifications" class="checkbox">
                            <label for="id_enable_web_notifications" class="">
                                <input class="checkboxinput" id="id_enable_web_notifications" name="enable_web_notifications" type="checkbox">
                                Enable web notifications
                                <p id="hint_id_enable_web_notifications" class="help-block">You will get external notifications outside the browser window.</p>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="div_id_holiday_selling" class="checkbox">
                            <label for="id_holiday_selling" class="">
                                <input class="checkboxinput" id="id_holiday_selling" name="holiday_selling" type="checkbox">
                                Selling vacation
                                <p id="hint_id_holiday_selling" class="help-block">Disable all your advertisements for sale temporarily</p>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="div_id_holiday_buying" class="checkbox">
                            <label for="id_holiday_buying" class="">
                                <input class="checkboxinput" id="id_holiday_buying" name="holiday_buying" type="checkbox">
                                Buying vacation
                                <p id="hint_id_holiday_buying" class="help-block">Disable all your advertisements for purchase temporarily.</p>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="div_id_sms_send_contact_notifications" class="checkbox">
                            <label for="id_sms_send_contact_notifications" class="">
                                <input checked="checked" class="checkboxinput" id="id_sms_send_contact_notifications" name="sms_send_contact_notifications" type="checkbox">
                                Send SMS notifications for new trade contacts
                                <p id="hint_id_sms_send_contact_notifications" class="help-block">Send SMS notifications from new contact requests (price: free)</p>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="div_id_sms_send_escrow_notifications" class="checkbox">
                            <label for="id_sms_send_escrow_notifications" class="">
                                <input class="checkboxinput" id="id_sms_send_escrow_notifications" name="sms_send_escrow_notifications" type="checkbox">
                                Send SMS notifications for new online payments
                                <p id="hint_id_sms_send_escrow_notifications" class="help-block">Send SMS notifications from new online payments in your advertisements (price: free)</p>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="div_id_sms_send_release_notifications" class="checkbox">
                            <label for="id_sms_send_release_notifications" class="">
                                <input class="checkboxinput" id="id_sms_send_release_notifications" name="sms_send_release_notifications" type="checkbox">
                                Send SMS notifications for online escrow released
                                <p id="hint_id_sms_send_release_notifications" class="help-block">Send SMS notifications from new online escrow releases (price: free)</p>
                            </label>
                        </div>
                    </div>
                    <div id="div_id_introduction" class="form-group">
                        <label for="id_introduction" class="control-label ">
                            Introduction
                        </label>
                        <div class="controls ">
                            <textarea class="textarea form-control" cols="40" id="id_introduction" name="introduction" rows="10"></textarea>
                            <p id="hint_id_introduction" class="help-block">Shown on your public profile. Plain text only, up to 200 characters.</p>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Save profile
                    </button>
                </form>
            </section>
        </div>
    </div>
@stop

@section('stylesheets')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('#location_id').select2();
    </script>
@stop