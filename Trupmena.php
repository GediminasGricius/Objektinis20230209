<?php

class Trupmena{
    private $skaitiklis;
    private $daliklis;
    private $sveikojiDalis;


    public function __construct($sveikojiDalis, $skaitiklis, $daliklis)
    {
        $this->sveikojiDalis=$sveikojiDalis;
        $this->skaitiklis=$skaitiklis;
        $this->daliklis=$daliklis;
    }

    public function __toString(): string
    {
        if ($this->sveikojiDalis!=0){
            return "$this->sveikojiDalis $this->skaitiklis/$this->daliklis";
        }else{
            return "$this->skaitiklis/$this->daliklis";
        }
    }

    public function toDouble(){
        return $this->sveikojiDalis + $this->skaitiklis / $this->daliklis;
    }

    /**
     * @return mixed
     */
    public function getSkaitiklis()
    {
        return $this->skaitiklis;
    }

    /**
     * @param mixed $skaitiklis
     */
    public function setSkaitiklis($skaitiklis): void
    {

        $this->skaitiklis=$skaitiklis;
        $this->prastinti();
    }

    /**
     * @return mixed
     */
    public function getDaliklis()
    {
        return $this->daliklis;
    }

    /**
     * @param mixed $daliklis
     */
    public function setDaliklis($daliklis): void
    {
        $this->daliklis = $daliklis;
    }

    /**
     * @return int
     */
    public function getSveikojiDalis() :int
    {
        return $this->sveikojiDalis;
    }

    /**
     * @param mixed $sveikojiDalis
     */
    public function setSveikojiDalis($sveikojiDalis): void
    {
        $this->sveikojiDalis = $sveikojiDalis;
    }

    /**
     * Prie trupmenos pridedame svaikaji skaiciu
     *
     * @param $sk
     * @return void
     */
    public function pridetiSv($sk){
        $this->sveikojiDalis+=$sk;
    }

    private function bdd($x, $y){
        for ($sk=$x; $sk>=1; $sk--){
            if ($x % $sk==0 && $y % $sk==0){
                return $sk;
            }
        }
    }

    private function prastinti(){
        $t=$this->bdd($this->daliklis, $this->skaitiklis);
        $this->daliklis/=$t;
        $this->skaitiklis/=$t;

        $sv=(int) ($this->skaitiklis / $this->daliklis);
        $this->sveikojiDalis+=$sv;
        $this->skaitiklis=$this->skaitiklis % $this->daliklis;
    }

    /**
     * Prie trupmenos pridedame trupmena nurodant skaitikli ir dalikli
     *
     * @param $skaitiklis
     * @param $daliklis
     * @return void
     */
    public function pridetiSD($skaitiklis, $daliklis){
        $this->skaitiklis=$skaitiklis*$this->daliklis + $this->skaitiklis * $daliklis;
        $this->daliklis*=$daliklis;
        $this->prastinti();
    }

    /**
     * Prie trupmenos pridedame trupmeną $t
     *
     * @param Trupmena $t
     * @return void
     */
    public function pridetiTrupmena( Trupmena $t  ){
        $this->pridetiSv($t->getSveikojiDalis());
        $this->pridetiSD($t->getSkaitiklis(), $t->getDaliklis());
    }





}









