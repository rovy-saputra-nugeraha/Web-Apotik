<?php

class Helper {


    public static function getAngkaBulan(string $namaBulan): int{

        if (strtolower($namaBulan) == "januari" || strtolower($namaBulan) == "january"){
		    return $bulan = 1;
        }
        if (strtolower($namaBulan) == "februari" || strtolower($namaBulan) == "february"){
            return $bulan = 2;
        }
        if (strtolower($namaBulan) == "maret" || strtolower($namaBulan) == "march"){
            return $bulan = 3;
        }
        if (strtolower($namaBulan) == "april" || strtolower($namaBulan) == "april"){
            return $bulan = 4;
        }
        if (strtolower($namaBulan) == "mei" || strtolower($namaBulan) == "may"){
            return $bulan = 5;
        }
        if (strtolower($namaBulan) == "juni" || strtolower($namaBulan) == "june"){
            return $bulan = 6;
        }
        if (strtolower($namaBulan) == "juli" || strtolower($namaBulan) == "july"){
            return $bulan = 7;
        }
        if (strtolower($namaBulan) == "agustus" || strtolower($namaBulan) == "august"){
            return $bulan = 8;
        }
        if (strtolower($namaBulan) == "september"){
            return $bulan = 9;
        }
        if (strtolower($namaBulan) == "oktober" || strtolower($namaBulan) == "october"){
            return $bulan = 10;
        }
        if (strtolower($namaBulan) == "november"){
            return $bulan = 11;
        }
        if (strtolower($namaBulan) == "desember" || strtolower($namaBulan) == "december"){
            return $bulan = 12;
        }

    }

}

?>