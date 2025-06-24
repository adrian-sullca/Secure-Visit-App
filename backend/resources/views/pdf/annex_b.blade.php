<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justificant de recepció de documents de coordinació empresarial d'activitats no pròpies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 8pt;
            line-height: 1.2;
            margin: 0;
            padding: 20px;
            color: #000;
            background: white;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0;
        }

        h1 {
            font-size: 12pt;
            font-weight: bold;
            text-align: left;
            margin-top: 0;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .section {
            margin-bottom: 15px;
        }

        .section-title {
            font-weight: bold;
            font-size: 11pt;
        }

        .form-row {
            display: grid;
            grid-template-rows: 1fr 1fr;
            line-height: 1.4;
        }

        .form-label {
            margin-right: 10px;
            white-space: nowrap;
        }

        .form-input {
            border: none;
            border-bottom: 1px solid #000;
            background: transparent;
            font-family: Arial, sans-serif;
            font-size: 11pt;
            padding: 0 2px;
            min-width: 200px;
            flex: 1;
        }

        .form-input:focus {
            outline: none;
            border-bottom: 2px solid #000;
        }

        .form-input-short {
            min-width: 100px;
            flex: 0 0 100px;
        }

        .form-input-medium {
            min-width: 150px;
            flex: 0 0 150px;
        }

        .justification {
            margin-bottom: 7px;
        }

        .justification p {
            text-align: justify;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .checkbox-group {
            margin-top: 8px;
        }

        .checkbox-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .checkbox {
            margin-right: 8px;
            min-width: 12px;
            height: 12px;
            border: 1.5px solid #000;
            display: inline-block;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .checkbox-text {
            flex: 1;
        }

        .small-text {
            font-size: 9pt;
            line-height: 1.2;
        }

        .signature-section {
            margin-top: 25px;
            margin-bottom: 20px;
        }

        .signature-row {
            display: flex;
            margin-bottom: 15px;
        }

        .signature-box {
            flex: 1;
            margin-right: 20px;
        }

        .signature-box:last-child {
            margin-right: 0;
        }

        .signature-label {
            font-size: 10pt;
            line-height: 1.2;
            margin-bottom: 30px;
        }

        .signature-line {
            border-top: 1px solid #000;
            width: 100%;
        }

        .separator {
            border: none;
            border-top: 3px solid #000;
        }

        .footer {
            margin-top: 15px;
            font-size: 9pt;
            line-height: 1.3;
        }

        .reference {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .footer-text {
            margin-bottom: 5px;
        }

        .footnote {
            font-size: 8pt;
            font-style: italic;
            line-height: 1.2;
            margin-bottom: 8px;
        }

        .page-number {
            text-align: right;
            font-size: 9pt;
            margin-top: 5px;
        }

        .multi-line-label {
            line-height: 1.2;
            font-size: 10pt;
        }

        .title-anex {
            font-size: 17px;
            font-weight: bold
        }

        .form-two-cols {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px
        }

        input {
            font-size: 8pt
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title-anex">Annex B. Justificant de recepció de documents de coordinació empresarial<br>d'activitats
            no pròpies</div>

        <hr class="separator" style="margin-bottom: 25px">

        <div class="section">
            <div class="section-title">Dades del centre de treball</div>
            <hr class="separator" style="margin: 0px">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%">
                        <label>Nom del centre</label>
                        <input type="text" style="width: 100%" value="Institut Cirviànum de Torelló">
                    </td>
                    <td style="width: 50%">
                        <label>Adreça</label>
                        <input type="text" style="width: 100%" value="Carrer Ausiàs March, S/N">
                    </td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%">
                        <label>Codi postal</label>
                        <input type="text" style="width: 100%" value="08570">
                    </td>
                    <td style="width: 50%">
                        <label>Municipi</label>
                        <input type="text" style="width: 100%" value="Torelló">
                    </td>
                </tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Dades de l'empresa, entitat o persona física aliena que fa l'activitat</div>
            <hr class="separator" style="margin: 0px">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%">
                        <label>Nom</label>
                        <input type="text" style="width: 100%" value="{{ $visit->name . ' ' . $visit->surname }}">
                    </td>
                    <td style="width: 50%">
                        <label>NIF/CIF</label>
                        <input type="text" style="width: 100%" value="{{ $professional->NIF }}">
                    </td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 100%">
                        <label>Adreça electrònica</label>
                        <input type="text" style="width: 100%" value="{{ $visit->email }}">
                    </td>
                </tr>
            </table>
        </div>

        <div class="section justification">
            <div class="section-title">Justificació</div>
            <hr class="separator" style="margin: 0px">
            <p>Per tal de donar compliment al que disposen, en matèria de coordinació d'activitats empresarials, la Llei
                31/95, de 8 de novembre, i el Reial decret 171/2004, de desplegament de l'article 24 de la citada Llei,
                s'estableix una relació de documentació lliurada amb avís de recepció entre el centre de treball i el/la
                representant de l'empresa, entitat o persona física aliena que fa l'activitat.</p>
        </div>

        <div class="section">
            <table style="width: 100%;">
                <tr style="height: 20px">
                    <td style="width: 100%">
                        <label>Data de la recepció de la documentació</label>
                        <input type="text" style="width: 100%; height: 12px">
                    </td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr style="height: 20px">
                    <td style="width: 100%">
                        <label>Nom i cognoms de la persona que lliura la
                            documentació<br>(director o directora del centre de treball o
                            responsable
                            de la gestió de l'edifici dels serveis administratius detallat a dalt)</label>
                        <input type="text" style="width: 100%; height: 12px" value=" ">
                    </td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr style="height: 20px">
                    <td style="width: 50%">
                        <label>Nom i cognoms de la persona que rep la documentació<br>(persona de l'empresa, entitat o
                            persona
                            física aliena que realitza l'activitat detallada a dalt)</label>
                        <input type="text" style="width: 100%; height: 12px" value=" ">
                    </td>
                </tr>
                <tr style="height: 20px">
                    <td style="width: 50%">
                        <label>Càrrec</label>
                        <input type="text" style="width: 100%; height: 12px" value="">
                    </td>
                </tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Documentació (marqueu la documentació que es lliura)</div>
            <table style="width: 100%; border-collapse: collapse">
                <tr>
                    <td style="width: 20px; vertical-align: top;">
                        <input type="checkbox">
                    </td>
                    <td>
                        Avaluació de riscos laborals del centre de treball (s'ha d'adjuntar a aquest annex).
                    </td>
                </tr>
                <tr>
                    <td style="width: 20px; vertical-align: top;">
                        <input type="checkbox">
                    </td>
                    <td>
                        "Annex C". Instruccions que cal seguir en cas d'emergència en el centre de treball. Aquesta
                        instrucció
                        cal que sigui emplenada per la direcció del centre de treball o responsable de la gestió de
                        l'edifici
                        dels serveis administratius.
                    </td>
                </tr>
                <tr>
                    <td style="width: 20px; vertical-align: top;">
                        <input type="checkbox">
                    </td>
                    <td>
                        "Annex D".* Acreditació del compliment de la normativa vigent sobre coordinació d'activitats
                        empresarials.<br>
                        <small>(No és necessari per a aquelles activitats que es repeteixen de manera periòdica en el
                            centre de treball i que no canvien respecte de l'any anterior i que ja han estat lliurades
                            una primera vegada.)</small>
                    </td>
                </tr>
                <tr>
                    <td style="width: 20px; vertical-align: top;">
                        <input type="checkbox">
                    </td>
                    <td>
                        "Annex E".* Informació dels riscos específics i de la planificació de l'activitat no pròpia.<br>
                        <small>(No és necessari per a aquelles activitats que es repeteixen de manera periòdica en el
                            centre de treball i que no canvien respecte de l'any anterior i que ja han estat lliurades
                            una primera vegada.)</small>
                    </td>
                </tr>
            </table>
        </div>

        <hr class="separator" style="margin: 0px">
        <table style="width: 100%;">
            <tr>
                <td style="width: 100%">
                    <label>Lloc i data</label>
                    <input type="text" style="width: 100%" value="Torelló, {{ date('d/m/Y') }}">
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse;">
            <tr style="height: 35px">
                <td style="width: 50%; border: none;">
                    <label>
                        Signatura del director o directora del centre de treball<br>
                        o responsable de la gestió de l'edifici dels serveis administratius
                    </label>
                    <input type="text"
                        style="width: 100%; height: 12px; border: none; border-bottom: 1px solid #000;">
                </td>
                <td style="width: 50%; border: none;">
                    <label>Signatura del o de la representant de l'empresa aliena<br> </label>
                    <input type="text"
                        style="width: 100%; height: 12px; border: none; border-bottom: 1px solid #000;">
                </td>
            </tr>
        </table>

        <hr class="separator">

        <div class="footer">
            <div class="reference">G438-006/02-12</div>
            <div class="footer-text">Una còpia d'aquest document ha de quedar arxivada al centre de treball o serveis
                administratius amb la resta de documentació rebuda.</div>
            <div class="footnote">*Els annexos D i E es lliuren a títol de model per tal que siguin emplenats per
                l'empresa, entitat o persona física aliena que fa l'activitat i siguin retornats al centre de treball
                prèviament a l'inici dels treballs.</div>
            <div class="page-number">1/1</div>
        </div>
    </div>
</body>

</html>
