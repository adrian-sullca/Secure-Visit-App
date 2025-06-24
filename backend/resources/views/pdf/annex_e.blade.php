<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annex E. Informació dels riscos específics i de la planificació de l'activitat no pròpia</title>
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
            font-size: 11pt;
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

        .form-two-cols {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .form-three-cols {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
        }

        .separator {
            border: none;
            border-top: 3px solid #000;
        }

        .radio-group {
            margin-bottom: 15px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #000;
        }

        .radio-option input[type="radio"] {
            margin-right: 10px;
        }

        .radio-content {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            flex: 1;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .data-table th {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-weight: bold;
            background-color: #f0f0f0;
            font-size: 8pt;
        }

        .data-table td {
            border: 1px solid #000;
            padding: 5px;
            vertical-align: top;
        }

        .table-input {
            border: none;
            background: transparent;
            font-family: Arial, sans-serif;
            font-size: 8pt;
            width: 100%;
            padding: 2px;
        }

        .table-input:focus {
            outline: 1px solid #000;
        }

        .checkbox-cell {
            text-align: center;
            width: 40px;
        }

        .checkbox {
            margin: 0;
            width: 15px;
            height: 15px;
        }

        .risks-section {
            margin-bottom: 20px;
        }

        .roman-numeral {
            font-weight: bold;
            font-size: 12pt;
            margin: 15px 0 10px 0;
        }

        .data-protection {
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 8pt;
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

        .page-number {
            text-align: right;
            font-size: 9pt;
            margin-top: 5px;
        }

        .footnote {
            font-size: 8pt;
            margin-top: 10px;
        }

        .page-break {
            page-break-before: always;
        }

        .workers-count {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .workers-count input[type="number"] {
            width: 60px;
        }

        span,
        p {
            font-size: 8pt;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title-anex">Annex E. Informació dels riscos específics i de la planificació de l'activitat no pròpia
        </div>
        <hr class="separator" style="margin-bottom: 25px">
        <div class="section">
            <div class="section-title">Dades de l'empresa, entitat o persona física que fa l'activitat</div>
            <hr class="separator" style="margin: 0px">
            <br>
            <div style="margin-bottom: 10px; font-style: italic;">(Escolliu el que correspongui)</div>

            <div class="radio-group">
                <div class="radio-option">
                    <input type="radio" name="entity_type" value="societat" id="societat">
                    <label for="societat" style="font-weight: bold; margin-right: 20px;">Societat</label>
                    <div class="radio-content">
                        <span>CIF <input type="text" class="form-input form-input-medium"></span>
                        <span>Nom de la societat <input type="text" class="form-input"></span>
                    </div>
                </div>

                <div class="radio-option">
                    <input type="radio" name="entity_type" value="autonom" id="autonom">
                    <label for="autonom" style="font-weight: bold; margin-right: 20px;">Autònom/a</label>
                    <div class="radio-content">
                        <span>NIF <input type="text" class="form-input form-input-medium"></span>
                        <span>Nom i cognoms <input type="text" class="form-input"></span>
                    </div>
                </div>

                <div class="radio-option">
                    <input type="radio" name="entity_type" value="administracio" id="administracio">
                    <label for="administracio" style="font-weight: bold; margin-right: 20px;">Administració</label>
                    <div class="radio-content">
                        <span>CIF <input type="text" class="form-input form-input-medium"></span>
                        <span>Nom de l'administració <input type="text" class="form-input"></span>
                    </div>
                </div>
            </div>

            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%">
                        <label>Adreça</label>
                        <input type="text" style="width: 100%" value="Institut Cirviànum de Torelló">
                    </td>
                    <td style="width: 50%">
                        <label>Municipi</label>
                        <input type="text" style="width: 100%" value="Carrer Ausiàs March, S/N">
                    </td>
                </tr>
            </table>

            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%">
                        <label>Telèfon Empresa</label>
                        <input type="text" style="width: 100%" value="{{ $company->telephone }}">
                    </td>
                    <td style="width: 50%">
                        <label>Adreça electrònica</label>
                        <input type="text" style="width: 100%" value="{{ $visit->email }}">
                    </td>
                </tr>
            </table>

            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%">
                        <label>Nom de la persona de contacte</label>
                        <input type="text" style="width: 100%" value="{{ $visit->name . ' ' . $visit->surname }}">
                    </td>
                    <td style="width: 50%">
                        <label>Càrrec</label>
                        <input type="text" style="width: 100%" value="Carrer Ausiàs March, S/N">
                    </td>
                </tr>
            </table>

            <table style="width: 100%;">
                <tr>
                    <td style="width: 100%">
                        <label>Nombre de treballadors/ores que desenvolupen l'activitat contractada</label>
                        <input type="text" style="width: 100%" value="{{ $visit->name . ' ' . $visit->surname }}">
                    </td>
                </tr>
            </table>

            <div class="workers-count">
                <span>Nombre de treballadors/ores que desenvolupen l'activitat contractada</span>
                <input type="number" class="form-input form-input-short">
                <label>
                    <input type="checkbox"> S'adjunta la llista amb els noms i cognoms dels treballadors/ores
                </label>
            </div>
        </div>

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

        <div class="section risks-section">
            <div class="section-title">Riscos generals i específics</div>
            <hr class="separator" style="margin: 0px">
            <p>Segons el que estableix l'article 24 de la Llei 31/1995, de 8 de novembre, de prevenció de riscos
                laborals, detallo els riscos generals i específics derivats de l'activitat que la nostra empresa,
                entitat o persona física aliena desenvoluparà en el centre de treball.</p>
        </div>

        <div class="section-title">I. Dades de l'activitat</div>
        <hr class="separator" style="margin: 0px">
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 25%;">Tasques</th>
                    <th style="width: 25%;">Ubicació en el centre de treball</th>
                    <th style="width: 15%;">Data d'inici</th>
                    <th style="width: 15%;">Data de finalització</th>
                    <th style="width: 20%;">Equips de treball utilitzats</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <textarea class="table-input" rows="3"></textarea>
                    </td>
                    <td>
                        <textarea class="table-input" rows="3"></textarea>
                    </td>
                    <td><input type="date" class="table-input"></td>
                    <td><input type="date" class="table-input"></td>
                    <td>
                        <textarea class="table-input" rows="3"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Página 2 -->
        <div class="page-break">
            <div class="section-title">II. Riscos generats pels treballadors/ores de l'empresa, entitat o persona
                física aliena</div>
            <hr class="separator" style="margin: 0px">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 35%;">Riscos generats pels treballadors/ores</th>
                        <th style="width: 35%;">Mesures preventives que cal aplicar</th>
                        <th colspan="3">Afecta els treballadors/ores del centre?</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th style="width: 10%;">No</th>
                        <th style="width: 10%;">Sí</th>
                        <th style="width: 10%;">No és procedent</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 15; $i++)
                        <tr>
                            <td>
                                <textarea class="table-input" rows="2"></textarea>
                            </td>
                            <td>
                                <textarea class="table-input" rows="2"></textarea>
                            </td>
                            <td class="checkbox-cell"><input type="radio" name="risk_{{ $i }}"
                                    value="no" class="checkbox"></td>
                            <td class="checkbox-cell"><input type="radio" name="risk_{{ $i }}"
                                    value="si" class="checkbox"></td>
                            <td class="checkbox-cell"><input type="radio" name="risk_{{ $i }}"
                                    value="np" class="checkbox"></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <!-- Página 3 -->
        <div class="page-break">
            <div class="section-title">III. Relació de productes químics que s'utilitzaran en els treballs
                previstos
            </div>
            <hr class="separator" style="margin: 0px">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 25%;">Producte químic</th>
                        <th style="width: 25%;">Nom comercial del producte</th>
                        <th style="width: 25%;">Empresa que el comercialitza</th>
                        <th colspan="2">Es disposa de fitxa de seguretat?</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="width: 12.5%;">No</th>
                        <th style="width: 12.5%;">Sí<sup>1</sup></th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 17; $i++)
                        <tr>
                            <td><input type="text" class="table-input"></td>
                            <td><input type="text" class="table-input"></td>
                            <td><input type="text" class="table-input"></td>
                            <td class="checkbox-cell"><input type="radio" name="chemical_{{ $i }}"
                                    value="no" class="checkbox"></td>
                            <td class="checkbox-cell"><input type="radio" name="chemical_{{ $i }}"
                                    value="si" class="checkbox"></td>
                        </tr>
                    @endfor
                </tbody>
            </table>

            <div class="footnote">1. En cas afirmatiu, adjunteu les fitxes de seguretat dels productes químics que
                s'utilitzaran.</div>

            <div class="data-protection">
                <div class="data-protection-title">Informació bàsica sobre protecció de dades</div>
                <div class="data-protection-item"><strong>Denominació del tractament:</strong> Prevenció de riscos
                    laborals.</div>
                <div class="data-protection-item"><strong>Responsable del tractament:</strong> La Secretaria
                    General
                    (Via Augusta, 202-226, 08021, Barcelona).</div>
                <div class="data-protection-item"><strong>Finalitat del tractament:</strong> La vigilància de la
                    salut
                    dels treballadors en relació amb els riscos derivats del treball.</div>
                <div class="data-protection-item"><strong>Legitimació:</strong> El compliment d'una obligació legal
                    que
                    s'aplica al responsable del tractament.</div>
                <div class="data-protection-item"><strong>Destinataris:</strong> Als encarregats de tractament que
                    proveeixen les unitats de prevenció de riscos laborals per compte del responsable del tractament
                    a
                    partir de coordinació d'activitats empresarials. Les vostres dades personals no es comunicaran a
                    tercers, llevat que hi obligui la normativa aplicable, o ho hàgiu consentit prèviament.</div>
                <div class="data-protection-item"><strong>Drets de les persones interessades:</strong> Accedir a
                    les
                    dades, rectificar-les, suprimir-les, oposar-se'n al tractament i sol·licitar-ne la limitació.
                </div>
                <div class="data-protection-item"><strong>Informació addicional:</strong> Podeu consultar la
                    informació
                    addicional i detallada sobre protecció de dades al web: Prevenció de riscos laborals.
                    Departament
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
                        <div class="signature-label">Signatura del/de la representant de l'empresa, entitat o
                            persona
                            física aliena</div>
                        <div class="signature-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
