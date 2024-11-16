<?php
class Banka
{
    private $hesapNo;
    private $hesapSahibi;
    private $hesapBakiye;
    private static $totalAccounts = 0;

    public function __construct($hesapNo, $hesapSahibi, $hesapBakiye)
    {
        $this->hesapNo = $hesapNo;
        $this->hesapSahibi = $hesapSahibi;
        $this->hesapBakiye = $hesapBakiye;
        self::$totalAccounts++;
    }

    public function hesapBilgileri()
    {
        echo "Hesap No: {$this->hesapNo}<br>";
        echo "Hesap Sahibi: {$this->hesapSahibi}<br>";
        echo "Hesap Bakiye: {$this->hesapBakiye}<br>";
    }

    public function getTotalAccounts()
    {
        return self::$totalAccounts;
    }

    #Hesaba para yatırma
    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->hesapBakiye += $amount;
            echo "Para yatırma işlemi tamamlandı.<br>";
            echo "{$this->hesapSahibi} yeni bakiye: {$this->hesapBakiye}<br>";
        } else {
            echo "Para miktarı 0'dan büyük olmalıdır.<br>";
        }
    }

    #Hesaptan para çekme
    public function withdraw($amount)
    {
        if ($amount <= 0) {
            echo "Para miktarı 0'dan büyük olmalıdır.<br>";
            return false;
        } else {
            if ($this->hesapBakiye >= $amount) {
                $this->hesapBakiye -= $amount;
                echo "Para çekme işlemi tamamlandı.<br>";
                echo "{$this->hesapSahibi} yeni bakiye: {$this->hesapBakiye}<br>";
            } else {
                echo "Para çekmek için hesap bakiyesi yetersiz.<br>";
            }
        }
    }


    #Bir hesaptan diğerine para transferi
    public function transfer($amount, $receiver)
    {
        if ($amount <= 0) {
            echo "Para miktarı 0'dan büyük olmalıdır.<br>";
            return false;
        } else {
            if ($this->hesapBakiye >= $amount) {
                $this->hesapBakiye -= $amount;
                $receiver->deposit($amount);
                echo "Para transferi tamamlandı.<br>";
                echo "{$this->hesapSahibi}'nin yeni bakiyesi: {$this->hesapBakiye}<br>";
            } else {
                echo "Para transferi için hesap bakiyesi yetersiz.<br>";
            }
        }
    }
}

#Para yatırma örneği
$customer1 = new Banka("TR12 0006 1005 1978 6457 8413 01", "Ahmet Balcıoğlu", 5000);
$customer1->hesapBilgileri();
echo "Toplam Hesap Sayısı: " . $customer1->getTotalAccounts() . "<br><br>";
$customer1->deposit(1000);
echo "<br>";

#Para çekme örneği
$customer2 = new Banka("TR15 0486 4855 4617 1685 1669 46", "Mehmet Şimşek", 10000);
$customer2->hesapBilgileri();
echo "Toplam Hesap Sayısı: " . $customer2->getTotalAccounts() . "<br><br>";
$customer2->withdraw(2500);
echo "<br>";

#Para transferi örneği
$customer1->transfer(2500, $customer2);

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