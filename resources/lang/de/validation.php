<?php
return array(
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */
    "accepted"         => "Das Feld :attribute muss Akzeptiert werden.",
    "active_url"       => "Das Feld :attribute ist keine Gültige URL.",
    "after"            => "Das Feld :attribute muss einen Datum nach dem :date enthalten.",
    "alpha"            => "Das Feld :attribute muss nur Buchstaben enthalten.",
    "alpha_dash"       => "Das Feld :attribute muss nur Buchstaben, Zahlen und Bindestriche enthalten.",
    "alpha_num"        => "Das Feld :attribute muss nut Buchstaben und Zahlen enthalten.",
    "before"           => "Das Feld :attribute muss einen Datum vor dem :date enthalten.",
    "between"          => array(
        "numeric" => "Das Feld :attribute muss eine Zahl zwischen :min und :max enthalten.",
        "file"    => "Die Datei :attribute muss eine Grössen swischen :min et :max Kilobytes haben.",
        "string"  => "Das Feld :attribute muss ein Text dass swischen :min et :max Buchstaben lag ist enthalten.",
    ),
    "confirmed"        => "Das Bestätigungsfeld :attribute enthält einen ungültigen Text.",
    "date"             => "Das Feld :attribute enthält ein ungültiges Datum.",
    "date_format"      => "Das Feld :attribute respektiert das Format :format nicht.",
    "different"        => "Die Felder :attribute und :other müssen eine unterschiedlichen inhalt haben.",
    "digits"           => "Das Feld :attribute muss :digits Zahlen enthalten.",
    "digits_between"   => "Das Feld :attribute muss zwischen :min und :max Zahlen enhalten.",
    "email"            => "Das Format vom Feld :attribute ist ungültig.",
    "exists"           => "Das Feld :attribute hat einen ungültigen Inhalt.",
    "image"            => "Das Feld :attribute muss einen Bild enthalten.",
    "in"               => "Das Feld :attribute ist ungültig.",
    "integer"          => "Das Feld :attribute muss eine gerade Zahl enthalten.",
    "ip"               => "Das Feld :attribute muss eine gültige IP Adresse enthalten.",
    "max"              => array(
        "numeric" => "Das Feld :attribute muss eine Zahl enthalten die kleiner ist als :max.",
        "file"    => "Die Datei :attribute muss eien Grösse haben die kleiner ist als :max Kilobytes.",
        "string"  => "Das Feld :attribute muss einen Text enthalten dass kleiner ist als :max Buchstaben.",
    ),
    "mimes"            => "Le champ :attribute doit être un fichier de type : :values.",
    "min"              => array(
        "numeric" => "Das Feld :attribute muss eine Zahl enthalten die kleiner ist als :min.",
        "file"    => "Die Datei :attribute muss grössen sein als :min kilobytes.",
        "string"  => "Das Feld :attribute muss mindestens :min Buchstaben enthalten.",
    ),
    "not_in"           => "Das Feld :attribute hat einen ungültigen Inhalt.",
    "numeric"          => "Das Feld :attribute muss eine Zahl enthalten.",
    "regex"            => "Das Format im Feld :attribute ist ungültig.",
    "required"         => "Das Feld :attribute muss einen Inhalt haben.",
    "required_if"      => "Das Feld :attribute muss einen Inhalt haben wenn das Feld :other den Inhalt :value hat.",
    "required_with"    => "Das Feld :attribute muss einen Inhalt haben when das Feld :values existiert.",
    "required_without" => "Das Fekd :attribute muss einen Inhalt haben when das Feld :values nicht existiert.",
    "same"             => "Die Felder :attribute und :other müssen den gleichen Inhalt haben.",
    "size"             => array(
        "numeric" => "Die Grösse von :attribute muss :size sein.",
        "file"    => "Die Grössen der Datei :attribute muss :size kilobytes gross sein.",
        "string"  => "Das Fekd :attribute muss einen Inhalt haben dass :size Buchstaben lang ist.",
    ),
    "unique"           => "Der Inhalt vom Feld :attribute wurde schon genutzt.",
    "url"              => "Das Format vom URL Feld :attribute ist ungültig.",
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => array(),
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => array(),
);