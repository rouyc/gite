<?php
class Security {

    private static $seed = 'EfyVNqSGjB';

    public static function chiffrer($texte_en_clair) {
        $texte_chiffre = hash('sha256', $texte_en_clair.self::getSeed());
        return $texte_chiffre;
    }

    static public function getSeed() {
        return self::$seed;
    }
}