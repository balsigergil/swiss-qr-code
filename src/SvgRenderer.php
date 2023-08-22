<?php

namespace Balsigergil\SwissQrCode;

class SvgRenderer
{
    public function renderSVG(SwissQrCode $code): void
    {
        ?>
        <svg
                xmlns="http://www.w3.org/2000/svg"
                id="qr_bill_svg"
                width="210mm"
                height="110mm"
                font-family="Arial, Frutiger, Helvetica, Liberation Sans, sans-serif"
        >
            <rect width="100%" height="100%" fill="white" stroke="black"/>
            <line
                    x1="0mm"
                    y1="5mm"
                    x2="202.5mm"
                    y2="5mm"
                    stroke="black"
                    stroke-width="0.1mm"
            />
            <line
                    x1="204.8mm"
                    y1="5mm"
                    x2="210mm"
                    y2="5mm"
                    stroke="black"
                    stroke-width="0.1mm"
            />
            <line
                    x1="62mm"
                    y1="5mm"
                    x2="62mm"
                    y2="102.5mm"
                    stroke="black"
                    stroke-width="0.1mm"
            />
            <line
                    x1="62mm"
                    y1="104.8mm"
                    x2="62mm"
                    y2="110mm"
                    stroke="black"
                    stroke-width="0.1mm"
            />
            <!-- Scissors right -->
            <svg x="202mm" y="3.5mm" width="3mm" height="3mm" viewBox="0 0 12 12">
                <path
                        fill="#000"
                        transform="rotate(-180 6 6)"
                        d="M3 1a2 2 0 0 1 1.72 3L6 5.3L9.65 1.65a0.35 0.35 45 0 1 0.7 0.7L6.7 6h-1.4L4 4.72A2 2 0 1 1 3 1v1a1 1 0 0 0 -1 1a1 1 0 1 0 1 -1z"
                />
                <path
                        fill="#000"
                        transform="rotate(-180 6 6)"
                        d="M3 11a2 2 0 0 0 1.72 -3L6.7 6h-1.4L4 7.28A2 2 0 1 0 3 11v-1a1 1 0 0 1 -1 -1a1 1 0 1 1 1 1zM7.15 7.85L9.65 10.35a0.35 0.35 45 0 0 0.7 -0.7L7.85 7.15a0.35 0.35 45 0 0 -0.7 0.7z"
                />
            </svg>
            <!-- Scissors bottom -->
            <svg x="60.5mm" y="102mm" width="3mm" height="3mm" viewBox="0 0 12 12">
                <path
                        fill="#000"
                        transform="rotate(-90 6 6)"
                        d="M3 1a2 2 0 0 1 1.72 3L6 5.3L9.65 1.65a0.35 0.35 45 0 1 0.7 0.7L6.7 6h-1.4L4 4.72A2 2 0 1 1 3 1v1a1 1 0 0 0 -1 1a1 1 0 1 0 1 -1z"
                />
                <path
                        fill="#000"
                        transform="rotate(-90 6 6)"
                        d="M3 11a2 2 0 0 0 1.72 -3L6.7 6h-1.4L4 7.28A2 2 0 1 0 3 11v-1a1 1 0 0 1 -1 -1a1 1 0 1 1 1 1zM7.15 7.85L9.65 10.35a0.35 0.35 45 0 0 0.7 -0.7L7.85 7.15a0.35 0.35 45 0 0 -0.7 0.7z"
                />
            </svg>
            <svg x="0mm" y="5mm" class="qr-bill" width="210mm" height="105mm">
                <svg x="0mm" y="0mm" width="62mm" class="receipt">
                    <svg x="5mm" y="5mm" width="52mm" height="95mm" class="innerReceipt">
                        <!--                        <rect width="100%" height="100%" fill="white" stroke="black"/>-->
                        <text x="0mm" y="11pt" font-size="11pt" font-weight="bold">Récépissé</text>
                        <svg x="0mm" y="7mm" height="56mm" class="indications">
                            <!--                            <rect width="100%" height="100%" fill="white" stroke="black"/>-->
                            <text x="0mm" y="0mm">
                                <tspan x="0mm" y="6pt" font-size="6pt" font-weight="bold">
                                    Compte / Payable à
                                </tspan>
                                <tspan x="0mm" dy="9pt" font-size="8pt">
                                    <?= $this->formatIban($code->getIban()); ?>
                                </tspan>
                                <tspan x="0mm" dy="9pt" font-size="8pt"><?= $code->getCdtrName(); ?></tspan>
                                <?php if ($code->getCdtrStrtNmOrAdrLine1() !== null): ?>
                                    <tspan x="0mm" dy="9pt"
                                           font-size="8pt"><?= $code->getCdtrStrtNmOrAdrLine1(); ?></tspan>
                                <?php endif; ?>
                                <?php if ($code->getCdtrBldgNbOrAdrLine2() !== null): ?>
                                    <tspan x="0mm" dy="9pt"
                                           font-size="8pt"><?= $code->getCdtrBldgNbOrAdrLine2(); ?></tspan>
                                <?php endif; ?>
                                <tspan x="0mm" dy="9pt"
                                       font-size="8pt"><?= $code->getCdtrPstCd(); ?> <?= $code->getCdtrTwnNm(); ?></tspan>
                                <tspan x="0mm" dy="18pt" font-size="6pt" font-weight="bold">
                                    Payable par
                                </tspan>
                                <tspan x="0mm" dy="9pt" font-size="8pt"><?= $code->getUltmtDbtrName() ?></tspan>
                                <tspan x="0mm" dy="9pt"
                                       font-size="8pt"><?= $code->getUltmtDbtrStrtNmOrAdrLine1() ?></tspan>
                                <tspan x="0mm" dy="9pt"
                                       font-size="8pt"><?= $code->getUltmtDbtrPstCd() ?> <?= $code->getUltmtDbtrTwnNm() ?></tspan>
                            </text>
                        </svg>
                        <svg x="0mm" y="63mm" height="14mm" class="montant">
                            <!--                            <rect width="100%" height="100%" fill="white" stroke="black"/>-->
                            <text x="0mm" y="6pt" font-size="6pt" font-weight="bold">Monnaie</text>
                            <text x="0mm" y="16pt" font-size="8pt"><?= $code->getCcy(); ?></text>
                            <text x="22mm" y="6pt" font-size="6pt" font-weight="bold">Montant</text>
                            <text x="22mm" y="16pt" font-size="8pt"><?= $code->getAmt(); ?></text>
                        </svg>
                        <svg x="0mm" y="77mm" height="18mm" class="depot">
                            <!--                                                        <rect width="100%" height="100%" fill="white" stroke="black"/>-->
                            <text
                                    x="52mm"
                                    y="1em"
                                    text-anchor="end"
                                    font-size="6pt"
                                    font-weight="bold"
                            >
                                Point de dépôt
                            </text>
                        </svg>
                    </svg>
                </svg>
                <svg x="62mm" y="0mm" width="148mm" height="105mm" class="payment">
                    <svg x="5mm" y="5mm" width="138mm" height="95mm" class="innerPayment">
                        <text x="0mm" y="11pt" font-size="11pt" font-weight="bold">
                            Section paiement
                        </text>
                        <svg id="qr_code_svg" width="46mm" height="46mm" x="0mm" y="12mm">
                            <svg viewBox="0 0 61 61">
                                <path
                                        d="M0 0h7v7H0zm8 0h3v2H9v5h2V6h1v1h2V5h2v2h-1V6h3v1h2V5h-2V4h1V3h-1V1h1V0h2v1h-1v1h-3v1h-3v1h-3v1h1V0h2v2h-1V1h3V0h-1v2h1v2h1v5h-1v2h-1v3h4v4h1v2h-1v-1h2v2h-6v-1h-4v1h1v-2h5v3h-2v1h1v2h-1v-1h-1v4h1v-2h-3v1h1v4H9v1h5v-2H9v-1h2v-1h1v1h3v3h1v2h-1v7h3v-2h5v4h1v1h-1v1h-3v2h1v-3h1v-1h-2v1h-1v3h-2v2h1v-5h-1v-1h2v-1h-2v-2h4v-2h-1v3h-1v-3h-1v-1h-1v-3h1v-2h2v-2h1v1h1v1h1v-1h4v-2h-2v-2h2v-1h-1v2h4v-3h-1v2h3v1h1v-2h-1v-1h-1v1h-3v4h-2v8h-1v-1h2v-3h-2v1h3v-2h1v1h2v1h-2v2h-1v1h-1v1h4v1h6v1h-1v2h-2v-2h1v4h3v-1h1v2h-1v1h-1v-1h-3v1h-2v-1h1v-1h1v-1h2v3h-1v1h1v3h2v-2h3v-1h-2v2H29v-1h2v-1h-1v4h1v-1h2v-2h4v7h2v-1h-1v2h-1v1h-1v1h8v-1h1v2h-2v1h4v-1h6v-1h-1v-7h-4v3h1v1h2v1h-5v1h1v-2h1v3h2v-1h-1v3h2v-3h2v-1h2v1h-1v1h4v-3h-1v-1h1v-7h-1v3h2v-7h-2v-1h-1v-1h-1v-1h-1v2h1v1h1v1h1v1h3v2h1v1h-1v3h1v1h-1v3h-1v2h-2v-1h-1v3h-1v1h2v-1h3v-2h1v-3h-2v-3h-5v-4h-1v3h-1v-3h-3v1h-3v3h-1v-1h-2v-4h2v-1h6v4h-3v-2h-1v-1h1v-2h5v-1h1v1h1v1h-1v1h-1v-1h-1v-3h-1v-2H38v-4h2v1h2v-6h-2v-1h-1v-3h1v-2h1v-6h3v-1h2v-1h4v5h-1v-7h3v1h-7v-4h-1v-1h2v-1h4v4h-1v-3h-2v1h-1v1h6v-3h3v4h-2v1h1v1h4v-2h3v3h-2v-1h1v6h1v3h-9v-1h1v3h1v-1h-4v-1h-5v-1h1v3h5v-3h-4v-2h1v-3h-1v-1h1v-3h-1v-1h1v-2h3v6h2v-1h-1v2h1v1h5v1h-1v-3h-2v9h5v-1h1v4h-1v1h1v2h-1v-1h-1v-1h-1v-1h1v-1h1v-1h-3v-4h-3v-2h-3v1h5v-2h-2v-4h1v-2h1v-1h1v3h1v1h1v1h2v2h-2v1h-2v1h1v1h2v-1h-1v3h-1v3h-1v3h1v2h-2v-1h-4v3h-2v2h1v1h-3v3h2v-1h-1v2h-4v1h1v-2h-1v-1h2v-3h1v-7h-1v-2h1v-1h3v3h-2v4h2v-3H36v2h-1v4h-1v-1h-2v-1h-1v1h-2v2h-1v5h1v-2h-2v1h3v-2h7v1h1v-1h1v-3h-3v-1h3v-2h-3v1h-3v2h-1v4h1v-2h-2v5h-1v1h-2v-1h-3v-1h-1v2h3v-2h-1v3h-4v-2h-6v3h-1v-1h6v1h2v5h-1v-3h-1v-1h-1v1h-2v-1h-2v1h1v3h1v1h-5v2h-2v3H8v1h1v-2h1v-1H9v-1H8v-1h2v-2H9v-1h1v-3H8v-1H4v-4h4v3H3v-1H0v-1h1v3h2v1h2v-4h4v-1h1v2h2v-2h-1v-1h4v1h-2v1h-2v3h1v2H9v1h4v2h1v-4h-3v4h1v-1h3v1h1v2h-1v1h-1v-1h-3v-1H8v-3H6v1h1v-2H5v1H3v-1h1v2H0v-2h2v-1H0v-2h2v-4h3v-1H1v2h2v-3h2v-1h4v1h1v1H8v-3h1v-1H8v-1H6v1h1v1H6v2h1v1H6v1h1v6H6v-3h3v1h5v1h-1v2h2v1h4v2h1v-1h1v3h-2v-1h1v2h-4v4h2v-1h4v-1h-1v-1h-3v-2h-1v4h-2v-1h4v2h4v-3h1v1h2v1h1v1h2v-2h3v1h1v-2h-1v-1h1v-2h1v2h2v-4h13v1h2v1h-1v-2h1v-2h-1v-2h5v1h1v-3h5v-4h-3v-1h-1v-1h3v1h-1v-2h2v-1h-2v-1h-4v2h-3v1h1v-3h-4v-1h-2v-2h3v-1h-5v-2h-2v3h-2v-5h-3v-1h5v1h1v1h-2v-6h-2v-1h-2v1h-2v2h1v1h-2v1h-2v1h4v-1h-1v3h-1v-1h2v3h1v1h2v1h5v-1h1v-4h-1v-1h1v-1h1v-2h1v-3h-2v-1h-2v1h1v-6h-1v-1h-2v-2h-1v-2h-8v4h-1v2h2v-1h1v2h-4v-1h-2v1h1v-3h1v-1h1v-1h2v2h2v-5h1v3h1v-1h1v2h-2v1h3v1h3v3h3v1h-3v2h-1v-3h-2v-1h-1v2h1v1h-6v-1h-4v-1h-5v-1h-1v-3h1v-1h1v2h-5v-1h-3v-2h2v-1h1v-1h-4v4h-1v-5h-2v1H8v-1H3v-1H0v-1h2V9h1v1h2v3h2v-2H4v7H0v-6h1v2h2v-1H2v2H1v1h6v-2H6v-4h1V9H6V8h2V3h5v5h2v1h-2v3h-1v-1H8V9h1v3h1V1H8zm18 0h1v1h1v1h1V0h4v1h-2v1h-1v2h-1V3h3V2h4v2h1V1h2V0h2v1h-1v3h1V2h1v1h-3V2h-1V0h-2v1h-2V0h1v3h3v1h1v1h1v4h2V6h-3v2h2V5h1V4h2V3h1v1h1v4h1V4h1v6h-1V9h7v4h3v-2h4V8h-1v1h-1v1h1v3h-2v1h-5v-2h3V9h-1v1h3V8h-5V6h-1v1h-2V6h-1v4h2V5h1V3h-1v1h2V0h-2v2h-1V1h-1V0h-1v2h-1V0h-1v2h-1V0h-2v5h2v4h-2V8h1V6h-1v1h-5V5h-1v2h-2V4h-1V3h-1v2h1v2h-1V6h3v2h-1v2h-3V9h4v2h-1v3h-5v2h-1v1h-1v2h-1v-1h6v5h-1v-2h3v5h2v-2h-3v1h-1v-1h-3v-1h-4v1h-1v-1h-4v1h1v-2h-3v2h-1v-4h-2v-2h-3v3h1v2h-1v-1h-3v1H6v1h1v-3H5v6h2v-2H6v3h2v-2H4v2H3v2H1v2h1v-1h1v2h2v1h4v-1h1v1h4v1h-1v-2h6v-3h-1v1h-1v-4h3v-1h3v1h1v1h-1v2h1v-1h-5v-1h3v-1h-1v-2h4v1h-1v-2h-1v-4h-1v1h2v1h3v3h1v-1h1v-2h-1v-2h-2v-1h-3v-4h-2v1h1v-2h6v-1h1v2h-1v1h-1v-1h-1V8h2v2h3v1h2v1h-1v1h-2v-2h-1V9h-4V5h1v2h-2V5h-1v2h-2V2h2v1h-3v1h2V1h2v3h2V3h-1V2h1zm28 0h7v7h-7zM1 1h5v5H1zm54 0h5v5h-5zM2 2h3v3H2zm54 0h3v3h-3zM27 3h1v4h-1zm22 1h1v1h-1zM29 5h3v3h-3zM19 6h3v5h-1v-1h-1V8h1v1h-2v3h1v-1h-3v1h1V8h1zm11 0h1v1h-1zM0 8h1v1H0zm4 0h1v1H4zm19 1h1v2h-1zm14 0h2v1h3v1h-2v1h-1v-1h-2zm-12 1h2v1h-2zm18 0h1v1h-1zm-21 2h2v3h1v-3h2v1h-5zm37 0h2v2h-2zm-17 1h1v1h-1zM8 14h3v2h-1v1h3v-1h-1v2h-2v1H6v1h4v1H8v1H3v-2h2v-1H3v-2h6v1H5v-3h4v1H8zm4 0h2v1h-2zm2 2h1v1h-1zM1 17h1v3H1zm35 1h2v3h-1v1h-1zM0 21h2v2H1v-1H0zm47 0h4v1h-4zM3 23h1v2H3v1H2v3H0v-1h1v-1H0v-1h1v-2H0v1h2v-1h1zm9 1h1v1h-1zm-3 1h2v1H9zm9 0h1v1h-3v3h2zm25 0h1v1h-1zm1 3h1v1h-1zM5 29h3v3H5zm24 0h3v3h-3zm24 0h3v3h-3zM6 30h1v1H6zm24 0h1v1h-1zm19 0h1v1h-1zm5 0h1v1h-1zM1 33h1v2h1v-1H1zm5 0h1v2H5v3H4v2H3v1H1v-1h1v2H0v-4h2v-1H1v-1h3v1h10v-1h-1v4h3v2h-1v1h-2v-2h1v-3h-2v-3h-1v4h-1v-1H9v-3h1v1H6zm14 0h1v1h-2v2h-3v-1h5v1h-1zm2 0h1v1h1v2h-1v1h-1zm11 0h2v1h-2zm20 0h1v6h2v1h1v-1h1v-2h2v1h1v-3h-1v1h-3v1h-2v-2h-2zm-20 2h1v1h-1zm8 2h2v1h2v-1h1v2h-1v1h-2v2h-2v3h1v1h1v-1h1v-2h-1v1h-1v-1h-2v-3h1zm-19 1h2v2h1v-1h1v1h1v2h-3v-1h-3v1h1zm-11 2h1v2h-1zm14 1h1v2h-1zm15 5h1v1h1v2h3v1h2v5h-1v-1h-1v2h-1v1h-2v-5h-3v-1h1zm-13 2h1v3h-3v-1h2zm-3 1h2v3h2v1h-4v3h2v1h-1v-5h-1zm17 1h3v2h-1v3h-2zm-12 3h3v3h-3zm4 0h2v1h-2zm20 0h3v3h-3zM0 54h7v7H0zm26 0h1v1h-1zm4 0h1v1h-1zm24 0h1v1h-1zM1 55h5v5H1zm21 0h1v1h-1zM2 56h3v3H2zm39 0h2v2h-3v-1h-1v3h-2v1h4zm-14 1h1v2h-1zm2 0h2v1h-2zm-17 1h1v1h1v2h-1v-1h-1zm22 0h1v3h1v-1h-2zm25 1h2v2h-2zm-35 1h1v1h-1z"
                                        fill="black"
                                        stroke="none"
                                        fill-rule="evenodd"
                                />
                            </svg>
                            <!-- Swiss flag -->
                            <svg width="7mm" height="7mm" x="19.5mm" y="19.5mm" viewBox="0 0 36 36">
                                <path d="m0 0h36v36h-36z" fill="#fff"/>
                                <path d="m2 2h32v32h-32z" fill="#000"/>
                                <path d="m15 8h6v7h7v6h-7v7h-6v-7h-7v-6h7z" fill="#fff"/>
                            </svg>
                        </svg>
                        <svg x="0mm" y="63mm" width="51mm" height="22mm" class="montant">
                            <text x="0mm" y="8pt" font-size="8pt" font-weight="bold">Monnaie</text>
                            <text x="0mm" y="20pt" font-size="10pt"><?= $code->getCcy(); ?></text>
                            <text x="22mm" y="8pt" font-size="8pt" font-weight="bold">Montant</text>
                            <text x="22mm" y="20pt" font-size="10pt"><?= $code->getAmt(); ?></text>
                        </svg>
                        <svg x="51mm" y="0mm" width="87mm" height="85mm" class="indications">
                            <text x="0mm" y="0mm">
                                <tspan x="0mm" dy="11pt" font-size="8pt" font-weight="bold">
                                    Compte / Payable à
                                </tspan>
                                <tspan x="0mm" dy="11pt" font-size="10pt">
                                    <?= $this->formatIban($code->getIban()); ?>
                                </tspan>
                                <tspan x="0mm" dy="11pt" font-size="10pt">
                                    <?= $code->getCdtrName(); ?>
                                </tspan>
                                <?php if ($code->getCdtrStrtNmOrAdrLine1() !== null): ?>
                                    <tspan x="0mm" dy="11pt"
                                           font-size="10pt"><?= $code->getCdtrStrtNmOrAdrLine1(); ?></tspan>
                                <?php endif; ?>
                                <?php if ($code->getCdtrBldgNbOrAdrLine2() !== null): ?>
                                    <tspan x="0mm" dy="11pt"
                                           font-size="10pt"><?= $code->getCdtrBldgNbOrAdrLine2(); ?></tspan>
                                <?php endif; ?>
                                <tspan x="0mm" dy="11pt"
                                       font-size="10pt"><?= $code->getCdtrPstCd(); ?> <?= $code->getCdtrTwnNm(); ?></tspan>
                                <?php if ($code->getUstrd() !== null): ?>
                                <tspan x="0mm" dy="22pt" font-size="8pt" font-weight="bold">
                                    Informations supplémentaires
                                </tspan>
                                    <tspan x="0mm" dy="11pt" font-size="10pt">
                                        <?= $code->getUstrd(); ?>
                                    </tspan>
                                <?php endif; ?>
                                <tspan x="0mm" dy="22pt" font-size="8pt" font-weight="bold">
                                    Payable par
                                </tspan>
                                <tspan x="0mm" dy="11pt" font-size="10pt"><?= $code->getUltmtDbtrName() ?></tspan>
                                <tspan x="0mm" dy="11pt" font-size="10pt"><?= $code->getUltmtDbtrStrtNmOrAdrLine1() ?></tspan>
                                <tspan x="0mm" dy="11pt" font-size="10pt"><?= $code->getUltmtDbtrPstCd() ?> <?= $code->getUltmtDbtrTwnNm() ?></tspan>
                            </text>
                        </svg>
                        <!-- Alternative process -->
                        <!--                        <svg class="additional-info" x="0mm" y="85mm" width="138mm" height="10mm">-->
                        <!--                            <rect width="100%" height="100%" fill="white" stroke="black"/>-->
                        <!--                            <text>-->
                        <!--                                <tspan x="0mm" dy="7pt" font-size="7pt"><tspan font-weight="700">Nom AV1</tspan>: awdawd3ewd awdaw awdawdawda</tspan>-->
                        <!--                                <tspan x="0mm" dy="9pt" font-size="7pt"><tspan font-weight="700">Nom AV2</tspan>: awdawd3ewd awdaw awdawdawda</tspan>-->
                        <!--                            </text>-->
                        <!--                        </svg>-->
                    </svg>
                </svg>
            </svg>
        </svg>
        <?php
    }

    private function formatIban($iban): string
    {
        if (strlen($iban) !== 21 || (!str_starts_with($iban, 'CH') && !str_starts_with($iban, 'LI'))) {
            throw new \InvalidArgumentException('Malformed IBAN provided');
        }

        return join(array_map(function ($el, $index) {
            if ($index % 4 === 3) {
                return $el . ' ';
            } else {
                return $el;
            }
        }, str_split($iban), array_keys(str_split($iban))));
    }
}