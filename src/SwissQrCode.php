<?php

namespace Balsigergil\SwissQrCode;

class SwissQrCode
{

    /*
     * Header
     */
    private string $qrType = 'SPC';
    private string $version = '0200';
    private string $coding = '1';
    private string $iban;

    /*
     * Creditor information
     */
    private string $cdtrAdrTp;
    private string $cdtrName;
    private ?string $cdtrStrtNmOrAdrLine1 = null;
    private ?string $cdtrBldgNbOrAdrLine2 = null;
    private ?string $cdtrPstCd = null;
    private string $cdtrTwnNm;
    private string $cdtrCtry;

    /*
     * Payment amount information
     */
    private string $amt = '0';
    private string $ccy = 'CHF';

    /*
     * Debtor
     */
    private ?string $ultmtDbtrAdrTp = null;
    private ?string $ultmtDbtrName = null;
    private ?string $ultmtDbtrStrtNmOrAdrLine1 = null;
    private ?string $ultmtDbtrBldgNbOrAdrLine2 = null;
    private ?string $ultmtDbtrPstCd = null;
    private ?string $ultmtDbtrTwnNm = null;
    private ?string $ultmtDbtrCtry = null;

    /*
     * Payment reference
     */
    private string $referenceType = 'NON';
    private ?string $reference = null;
    private ?string $ustrd = null;
    private string $trailer = 'EPD';
    private ?string $strdBkgInf = null;

    /**
     * @return string Unambiguous indicator for the Swiss QR Code. Fixed value "SPC" (Swiss Payments Code)
     */
    public function getQrType(): string
    {
        return $this->qrType;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getCoding(): string
    {
        return $this->coding;
    }

    public function getIban(): string
    {
        return $this->iban;
    }

    public function setIban(string $iban): SwissQrCode
    {
        $this->iban = $iban;
        return $this;
    }

    public function getCdtrAdrTp(): string
    {
        return $this->cdtrAdrTp;
    }

    public function setCdtrAdrTp(string $cdtrAdrTp): SwissQrCode
    {
        $this->cdtrAdrTp = $cdtrAdrTp;
        return $this;
    }

    public function getCdtrName(): string
    {
        return $this->cdtrName;
    }

    public function setCdtrName(string $cdtrName): SwissQrCode
    {
        $this->cdtrName = $cdtrName;
        return $this;
    }

    public function getCdtrStrtNmOrAdrLine1(): ?string
    {
        return $this->cdtrStrtNmOrAdrLine1;
    }

    public function setCdtrStrtNmOrAdrLine1(?string $cdtrStrtNmOrAdrLine1): SwissQrCode
    {
        $this->cdtrStrtNmOrAdrLine1 = $cdtrStrtNmOrAdrLine1;
        return $this;
    }

    public function getCdtrBldgNbOrAdrLine2(): ?string
    {
        return $this->cdtrBldgNbOrAdrLine2;
    }

    public function setCdtrBldgNbOrAdrLine2(?string $cdtrBldgNbOrAdrLine2): SwissQrCode
    {
        $this->cdtrBldgNbOrAdrLine2 = $cdtrBldgNbOrAdrLine2;
        return $this;
    }

    public function getCdtrPstCd(): string
    {
        return $this->cdtrPstCd;
    }

    public function setCdtrPstCd(string $cdtrPstCd): SwissQrCode
    {
        $this->cdtrPstCd = $cdtrPstCd;
        return $this;
    }

    public function getCdtrTwnNm(): string
    {
        return $this->cdtrTwnNm;
    }

    public function setCdtrTwnNm(string $cdtrTwnNm): SwissQrCode
    {
        $this->cdtrTwnNm = $cdtrTwnNm;
        return $this;
    }

    public function getCdtrCtry(): string
    {
        return $this->cdtrCtry;
    }

    public function setCdtrCtry(string $cdtrCtry): SwissQrCode
    {
        $this->cdtrCtry = $cdtrCtry;
        return $this;
    }

    public function setCreditor(string $name, ?string $address = null, ?string $postcode = null, ?string $city = null, string $country = 'CH'): self
    {
        return $this->setCdtrAdrTp('S')
            ->setCdtrName($name)
            ->setCdtrStrtNmOrAdrLine1($address)
            ->setCdtrPstCd($postcode)
            ->setCdtrTwnNm($city)
            ->setCdtrCtry($country);
    }

    public function getAmt(): string
    {
        return $this->amt;
    }

    public function setAmt(string $amt): SwissQrCode
    {
        $this->amt = $amt;
        return $this;
    }

    public function getCcy(): string
    {
        return $this->ccy;
    }

    public function setCcy(string $ccy): SwissQrCode
    {
        $this->ccy = $ccy;
        return $this;
    }

    public function setAmount(float $amount, string $currency = 'CHF'): self
    {
        $this->setAmt($amount);
        $this->setCcy($currency);
        return $this;
    }

    public function getUltmtDbtrAdrTp(): string
    {
        return $this->ultmtDbtrAdrTp;
    }

    public function setUltmtDbtrAdrTp(string $ultmtDbtrAdrTp): SwissQrCode
    {
        $this->ultmtDbtrAdrTp = $ultmtDbtrAdrTp;
        return $this;
    }

    public function getUltmtDbtrName(): string
    {
        return $this->ultmtDbtrName;
    }

    public function setUltmtDbtrName(string $ultmtDbtrName): SwissQrCode
    {
        $this->ultmtDbtrName = $ultmtDbtrName;
        return $this;
    }

    public function getUltmtDbtrStrtNmOrAdrLine1(): ?string
    {
        return $this->ultmtDbtrStrtNmOrAdrLine1;
    }

    public function setUltmtDbtrStrtNmOrAdrLine1(?string $ultmtDbtrStrtNmOrAdrLine1): SwissQrCode
    {
        $this->ultmtDbtrStrtNmOrAdrLine1 = $ultmtDbtrStrtNmOrAdrLine1;
        return $this;
    }

    public function getUltmtDbtrBldgNbOrAdrLine2(): ?string
    {
        return $this->ultmtDbtrBldgNbOrAdrLine2;
    }

    public function setUltmtDbtrBldgNbOrAdrLine2(?string $ultmtDbtrBldgNbOrAdrLine2): SwissQrCode
    {
        $this->ultmtDbtrBldgNbOrAdrLine2 = $ultmtDbtrBldgNbOrAdrLine2;
        return $this;
    }

    public function getUltmtDbtrPstCd(): string
    {
        return $this->ultmtDbtrPstCd;
    }

    public function setUltmtDbtrPstCd(string $ultmtDbtrPstCd): SwissQrCode
    {
        $this->ultmtDbtrPstCd = $ultmtDbtrPstCd;
        return $this;
    }

    public function getUltmtDbtrTwnNm(): string
    {
        return $this->ultmtDbtrTwnNm;
    }

    public function setUltmtDbtrTwnNm(string $ultmtDbtrTwnNm): SwissQrCode
    {
        $this->ultmtDbtrTwnNm = $ultmtDbtrTwnNm;
        return $this;
    }

    public function getUltmtDbtrCtry(): string
    {
        return $this->ultmtDbtrCtry;
    }

    public function setUltmtDbtrCtry(string $ultmtDbtrCtry): SwissQrCode
    {
        $this->ultmtDbtrCtry = $ultmtDbtrCtry;
        return $this;
    }

    public function setDebtor(?string $name = null, ?string $address = null, ?string $postcode = null, ?string $city = null, ?string $country = 'CH'): self
    {
        return $this
            ->setUltmtDbtrAdrTp('S')
            ->setUltmtDbtrName($name)
            ->setUltmtDbtrStrtNmOrAdrLine1($address)
            ->setUltmtDbtrPstCd($postcode)
            ->setUltmtDbtrTwnNm($city)
            ->setUltmtDbtrCtry($country);
    }

    public function getReferenceType(): string
    {
        return $this->referenceType;
    }

    public function setReferenceType(string $referenceType): SwissQrCode
    {
        $this->referenceType = $referenceType;
        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): SwissQrCode
    {
        $this->reference = $reference;
        return $this;
    }

    public function getUstrd(): ?string
    {
        return $this->ustrd;
    }

    public function setUstrd(?string $ustrd): SwissQrCode
    {
        $this->ustrd = $ustrd;
        return $this;
    }

    public function getTrailer(): string
    {
        return $this->trailer;
    }

    public function getStrdBkgInf(): ?string
    {
        return $this->strdBkgInf;
    }

    public function setStrdBkgInf(?string $strdBkgInf): SwissQrCode
    {
        $this->strdBkgInf = $strdBkgInf;
        return $this;
    }

}