<?php
abstract class Produkti implements Kategoria
{
    private $image = './Images/ProductImg/';
    private $kodiProd;
    private $emri;
    private $cmimi;
    private $discount;
    public function __construct($image, $kodiProd, $emri, $cmimi, $discount)
    {
        $this->image = $this->image . $image;
        $this->kodiProd = $kodiProd;
        $this->emri = $emri;
        $this->cmimi = $cmimi;
        $this->discount = $discount;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function getKodiProd()
    {
        return $this->kodiProd;
    }
    public function setKodiProd($kodiProd)
    {
        $this->kodiProd = $kodiProd;
    }
    public function getEmri()
    {
        return $this->emri;
    }
    public function getCmimi()
    {
        return $this->cmimi;
    }
    public function getDiscount()
    {
        return $this->discount;
    }
    public function setEmri($emri)
    {
        $this->emri = $emri;
    }
    public function setCmimi($emri)
    {
        $this->emri = $emri;
    }
    public function setDiscount($emri)
    {
        $this->emri = $emri;
    }
    public function __toString()
    {
        return $this->getKodiProd() . " " . $this->getEmri() . " " . $this->getCmimi() . " " . $this->getDiscount();
    }
}
class Aksesori extends Produkti
{
    private $pershkrimi;
    public function __construct($image, $kodiProd, $emri, $cmimi, $discount, $pershkrimi)
    {
        parent::__construct($image, $kodiProd, $emri, $cmimi, $discount);
        $this->pershkrimi = $pershkrimi;
    }
    public function getPershkrimi()
    {
        return $this->pershkrimi;
    }
    public function setPershkrimi($pershkrimi)
    {
        $this->pershkrimi = $pershkrimi;
    }
    public function getKategoria()
    {
        return "Aksesore";
    }
}
class SmartDevices extends Produkti
{
    private $storage;
    private $ram;
    private $cpu;
    public function __construct($image, $kodiProd, $emri, $cmimi, $discount, $storage, $ram, $cpu)
    {
        parent::__construct($image, $kodiProd, $emri, $cmimi, $discount);
        $this->ram = $ram;
        $this->storage = $storage;
        $this->cpu = $cpu;
    }
    public function getStorage()
    {
        return $this->storage;
    }
    public function setStorage($storage)
    {
        $this->storage = $storage;
    }
    public function getRam()
    {
        return $this->ram;
    }
    public function setRam($ram)
    {
        $this->ram = $ram;
    }
    public function getCpu()
    {
        return $this->cpu;
    }
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;
    }
    public function getKategoria()
    {
        return "Phone/Tablet";
    }
}
class Kompjuteri extends Produkti
{
    private $os;
    private $storage;
    private $ram;
    private $cpu;
    private $eshteLaptop;
    public function __construct($image, $kodiProd, $emri, $cmimi, $discount, $os, $storage, $ram, $cpu, $eshteLaptop)
    {
        parent::__construct($image, $kodiProd, $emri, $cmimi, $discount);
        $this->os = $os;
        $this->storage = $storage;
        $this->ram = $ram;
        $this->cpu = $cpu;
        $this->eshteLaptop = $eshteLaptop;
    }
    public function getOs()
    {
        return $this->os;
    }
    public function setOs($os)
    {
        $this->os = $os;
    }
    public function getStorage()
    {
        return $this->storage;
    }
    public function setStorage($storage)
    {
        $this->storage = $storage;
    }
    public function getRam()
    {
        return $this->ram;
    }
    public function setRam($ram)
    {
        $this->ram = $ram;
    }
    public function getCpu()
    {
        return $this->cpu;
    }
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;
    }
    public function getKategoria()
    {
        if ($this->eshteLaptop) return "Laptop";
        else return "PC";
    }
}
interface Kategoria
{
    public function getKategoria();
}
?>