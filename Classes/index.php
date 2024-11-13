<?php
/*
Okulda öğrenci ve öğretmenler olsun
öğrencinin ad, soyad, yaş, numara, sınıf bilgileri olsun
öğretmenin ad, soyad, yaş, branş, tecrübe bilgileri olsun
öğrenci ile ortak olanlar aynı fonksiyondan erişilebilsin
*/
abstract class OrtakOzellikler
{
    protected $ad;
    protected $soyad;
    protected $yas;

    public function __construct($ad, $soyad, $yas)
    {
        $this->ad = $ad;
        $this->soyad = $soyad;
        $this->yas = $yas;
    }

    abstract public function getAd();

    public function getSoyad()
    {
        return $this->soyad;
    }

    public function getYas()
    {
        return $this->yas;
    }
}

class Ogretmen extends OrtakOzellikler
{
    private $brans;
    private $tecrube;

    public function __construct($ad, $soyad, $yas, $brans, $tecrube)
    {
        parent::__construct($ad, $soyad, $yas);
        $this->brans = $brans;
        $this->tecrube = $tecrube;
    }
    public function getAd()
    {
        return $this->ad;
    }

    public function getBrans()
    {
        return $this->brans;
    }

    public function getTecrube()
    {
        return $this->tecrube;
    }
    public function ekranaYaz()
    {
        echo "Ad: " . $this->getAd() . " Soyad: " . $this->getSoyad() . " Yaş: " . $this->getYas() . " Branş: " . $this->getBrans() . " Tecrübe: " . $this->getTecrube();
    }
}

class Ogrenci extends OrtakOzellikler
{
    private $numara;
    private $sinif;

    public function __construct($ad, $soyad, $yas, $numara, $sinif)
    {
        parent::__construct($ad, $soyad, $yas);
        $this->numara = $numara;
        $this->sinif = $sinif;
    }
    public function getAd()
    {
        return $this->ad;
    }

    public function getNumara()
    {
        return $this->numara;
    }

    public function getSinif()
    {
        return $this->sinif;
    }
    public function ekranaYaz()
    {
        echo "Ad: " . $this->getAd() . " Soyad: " . $this->getSoyad() . " Yaş: " . $this->getYas() . " Branş: " . $this->getNumara() . " Tecrübe: " . $this->getSinif();
    }
}



class Okul
{
    private $ogrencilerArr = [];

    public function ogrenciEkle(Ogrenci $ogrenci)
    {
        $this->ogrencilerArr[] = $ogrenci;
    }

    public function ogrencileriListele()
    {
        foreach ($this->ogrencilerArr as $ogrenci) {
            $ogrenci->ekranaYaz();
            echo "<br>";
        }
    }
}

$ogretmen1 = new Ogretmen("Mesut", "Öztürk", 30, "Bilgisayar", 10);
$ogrenci1 = new Ogrenci("Ahmet", "Balcıoğlu", 22, 123456, "12C");
$ogrenci2 = new Ogrenci("Mehmet", "Şimşek", 24, 123, "11A");
$ogrenci3 = new Ogrenci("Zeynep", "Kara", 21, 12345, "10D");

$okul = new Okul();
$okul->ogrenciEkle($ogrenci1);
$okul->ogrenciEkle($ogrenci2);
$okul->ogrenciEkle($ogrenci3);
$okul->ogrencileriListele();

?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: rgb(150,150,150);">

</body>

</html>