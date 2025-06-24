<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annex D. Acreditació del compliment de la normativa vigent sobre coordinació d'activitats empresarials
    </title>
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

        .header-info {
            text-align: right;
            font-size: 10pt;
            margin-bottom: 10px;
        }

        .title-anex {
            font-size: 17px;
            font-weight: bold
        }

        .section {
            margin-bottom: 15px;
        }

        .section-title {
            font-weight: bold;
            font-size: 10pt;
        }

        .form-row {
            display: grid;
            grid-template-rows: 1fr 1fr;
            line-height: 1.4;
        }

        .form-label {
            font-size: 9pt;
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

        .form-input-long {
            min-width: 300px;
        }

        .form-two-cols {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .separator {
            border: none;
            border-top: 3px solid #000;
        }

        .declaration-section {
            margin-bottom: 20px;
        }

        .declaration-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .declaration-table th {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-weight: bold;
            background-color: #f0f0f0;
        }

        .declaration-table td {
            border: 1px solid #000;
            padding: 8px;
            vertical-align: top;
        }

        .declaration-text {
            line-height: 1;
            font-size: 8pt;
        }

        .checkbox-cell {
            text-align: center;
            width: 50px;
        }

        .checkbox {
            margin: 0;
            width: 15px;
            height: 15px;
        }

        .inline-input {
            border: none;
            border-bottom: 1px solid #000;
            background: transparent;
            font-family: Arial, sans-serif;
            font-size: 10pt;
            padding: 0 2px;
            margin: 0 5px;
        }

        .data-protection {
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 9pt;
            line-height: 1.3;
        }

        .data-protection-title {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .data-protection-item {
            margin-bottom: 5px;
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

        .signature-label {
            font-size: 10pt;
            line-height: 1.2;
            margin-bottom: 30px;
        }

        .signature-line {
            border-top: 1px solid #000;
            width: 100%;
        }

        .footer {
            margin-top: 15px;
            font-size: 9pt;
            line-height: 1.3;
        }

        .page-number {
            text-align: right;
            font-size: 9pt;
            margin-top: 5px;
        }

        .footnote {
            font-size: 8pt;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title-anex">Annex D. Acreditació del compliment de la normativa vigent sobre coordinació d'activitats
            empresarials</div>
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
            <div class="section-title">Dades del/de la declarant</div>
            <hr class="separator" style="margin: 0px">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 60%">
                        <label>Nom de l'empresa, entitat que fa
                            l'activitat</label>
                        <input type="text" style="width: 100%" value="{{ $company->name }}">
                    </td>
                    <td style="width: 40%">
                        <label>CIF</label>
                        <input type="text" style="width: 100%" value="{{ $company->CIF }}">
                    </td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 60%">
                        <label>Nom i cognoms de la persona que representa l'empresa</label>
                        <input type="text" style="width: 100%" value="{{ $visit->name . ' ' . $visit->surname }}">
                    </td>
                    <td style="width: 40%">
                        <label>Adreça electrònica</label>
                        <input type="text" style="width: 100%" value="{{ $visit->email }}">
                    </td>
                </tr>
            </table>
        </div>

        <div class="section declaration-section">
            <div class="section-title">Declaració</div>
            <hr class="separator" style="margin: 0px">
            <div style="margin-bottom: 10px">Declaro que:</div>

            <table class="declaration-table">
                <thead>
                    <tr>
                        <th style="width: 60%;">Declaració</th>
                        <th>SÍ</th>
                        <th>No</th>
                        <th>NP*</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="declaration-text">Ha impartit la informació i la formació en matèria preventiva als
                            treballadors/ores que han de prestar serveis en el centre de treball.</td>
                        <td class="checkbox-cell"><input type="radio" name="q1" value="si" class="checkbox">
                        </td>
                        <td class="checkbox-cell"><input type="radio" name="q1" value="no" class="checkbox">
                        </td>
                        <td class="checkbox-cell"><input type="radio" name="q1" value="np" class="checkbox">
                        </td>
                    </tr>
                    <tr>
                        <td class="declaration-text">Ha lliurat als treballadors/ores els equips de protecció individual
                            (EPI) necessaris per dur a terme les tasques encomanades en el centre de treball.</td>
                        <td class="checkbox-cell"><input type="radio" name="q2" value="si" class="checkbox">
                        </td>
                        <td class="checkbox-cell"><input type="radio" name="q2" value="no" class="checkbox">
                        </td>
                        <td class="checkbox-cell"><input type="radio" name="q2" value="np" class="checkbox">
                        </td>
                    </tr>
                    <tr>
                        <td class="declaration-text">Els treballadors/ores que han de prestar els serveis al centre de
                            treball compleixen els requisits d'idoneïtat per desenvolupar les tasques que tenen
                            encomanades.</td>
                        <td class="checkbox-cell"><input type="radio" name="q3" value="si" class="checkbox">
                        </td>
                        <td class="checkbox-cell"><input type="radio" name="q3" value="no"
                                class="checkbox">
                        </td>
                        <td class="checkbox-cell"><input type="radio" name="q3" value="np"
                                class="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="declaration-text">Els equips de treball que els treballadors/ores de l'empresa o
                            entitat han d'utilitzar per desenvolupar la seva tasca en el centre de treball compleixen
                            els requisits establerts per la normativa vigent.</td>
                        <td class="checkbox-cell"><input type="radio" name="q4" value="si"
                                class="checkbox"></td>
                        <td class="checkbox-cell"><input type="radio" name="q4" value="no"
                                class="checkbox"></td>
                        <td class="checkbox-cell"><input type="radio" name="q4" value="np"
                                class="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="declaration-text">Disposa de contracte vigent amb la mútua d'accidents de treball i
                            malalties professionals.<br>
                            Nom de la mútua: <input type="text" class="inline-input" style="width: 200px;"></td>
                        <td class="checkbox-cell"><input type="radio" name="q5" value="si"
                                class="checkbox"></td>
                        <td class="checkbox-cell"><input type="radio" name="q5" value="no"
                                class="checkbox"></td>
                        <td class="checkbox-cell"><input type="radio" name="q5" value="np"
                                class="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="declaration-text">Està al corrent i disposa dels TC-1 i TC-2 dels treballadors/ores
                            que faran l'activitat en el centre de treball.</td>
                        <td class="checkbox-cell"><input type="radio" name="q6" value="si"
                                class="checkbox"></td>
                        <td class="checkbox-cell"><input type="radio" name="q6" value="no"
                                class="checkbox"></td>
                        <td class="checkbox-cell"><input type="radio" name="q6" value="np"
                                class="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="declaration-text">Està al corrent del pagament de la Seguretat Social.</td>
                        <td class="checkbox-cell"><input type="radio" name="q7" value="si"
                                class="checkbox"></td>
                        <td class="checkbox-cell"><input type="radio" name="q7" value="no"
                                class="checkbox"></td>
                        <td class="checkbox-cell"><input type="radio" name="q7" value="np"
                                class="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="declaration-text">Disposa de l'avaluació de riscos laborals feta i actualitzada.
                        </td>
                        <td class="checkbox-cell"><input type="radio" name="q8" value="si"
                                class="checkbox"></td>
                        <td class="checkbox-cell"><input type="radio" name="q8" value="no"
                                class="checkbox"></td>
                        <td class="checkbox-cell"><input type="radio" name="q8" value="np"
                                class="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="declaration-text">Ha fet arribar als treballadors/ores, la informació rebuda del Pla
                            d'emergència i d'avaluació de riscos laborals del centre de treball. Data de quan s'ha fet
                            arribar la informació: <input type="date" class="inline-input" style="width: 120px;">
                        </td>
                        <td class="checkbox-cell"><input type="radio" name="q9" value="si"
                                class="checkbox"></td>
                        <td class="checkbox-cell"><input type="radio" name="q9" value="no"
                                class="checkbox"></td>
                        <td class="checkbox-cell"><input type="radio" name="q9" value="np"
                                class="checkbox"></td>
                    </tr>
                </tbody>
            </table>
            <br><br><br><br><br><br><br><br>
            <div class="footnote">*NP: No és pertinent.</div>
            <hr class="separator" style="margin: 0px">
        </div>

        <div class="data-protection">
            <div class="data-protection-title">Informació bàsica sobre protecció de dades</div>
            <div class="data-protection-item"><strong>Denominació del tractament:</strong> Prevenció de riscos
                laborals.</div>
            <div class="data-protection-item"><strong>Responsable del tractament:</strong> La Secretaria General (Via
                Augusta, 202-226, 08021, Barcelona).</div>
            <div class="data-protection-item"><strong>Finalitat del tractament:</strong> La vigilància de la salut dels
                treballadors en relació amb els riscos derivats del treball.</div>
            <div class="data-protection-item"><strong>Legitimació:</strong> El compliment d'una obligació legal que
                s'aplica al responsable del tractament.</div>
            <div class="data-protection-item"><strong>Destinataris:</strong> Als encarregats de tractament que
                proveeixen les unitats de prevenció de riscos laborals per compte del responsable del tractament a
                partir de coordinació d'activitats empresarials. Les vostres dades personals no es comunicaran a
                tercers, llevat que hi obligui la normativa aplicable, o ho hàgiu consentit prèviament.</div>
            <div class="data-protection-item"><strong>Drets de les persones interessades:</strong> Accedir a les dades,
                rectificar-les, suprimir-les, oposar-se'n al tractament i sol·licitar-ne la limitació.</div>
            <div class="data-protection-item"><strong>Informació addicional:</strong> Podeu consultar la informació
                addicional i detallada sobre protecció de dades al web: Prevenció de riscos laborals. Departament
                d'Educació (gencat.cat)</div>
        </div>

        <hr class="separator">

        <table style="width: 100%;">
            <tr>
                <td style="width: 100%">
                    <label>Lloc i data</label>
                    <input type="text" style="width: 100%" value="Torelló, {{ date('d/m/Y') }}">
                </td>
            </tr>
        </table>

        <div class="signature-section">
            <div class="signature-row">
                <div class="signature-box">
                    <div class="signature-label">Signatura del/de la representant de l'empresa, entitat o persona
                        física aliena o administració</div>
                    <div class="signature-line"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
