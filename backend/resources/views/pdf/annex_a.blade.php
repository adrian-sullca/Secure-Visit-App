<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annex A. Informe de seguretat i salut del personal d'un centre de treball amb obres de reforma, ampliació o
        millora</title>
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

        .intro-text {
            margin-bottom: 20px;
            line-height: 1.3;
            text-align: justify;
        }

        .intro-paragraph {
            margin-bottom: 10px;
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
            margin: 15px 0;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 8px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .textarea-field {
            width: 100%;
            min-height: 40px;
            border: 1px solid #000;
            padding: 8px;
            font-family: Arial, sans-serif;
            font-size: 11pt;
            resize: vertical;
        }

        .textarea-field:focus {
            outline: 2px solid #000;
        }

        .question-section {
            margin-bottom: 15px;
            padding: 10px;
            border-left: 3px solid #000;
        }

        .question-text {
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-bottom: 10px;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .conditional-field {
            margin-top: 10px;
            margin-left: 20px;
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
            font-style: italic;
        }

        .page-break {
            page-break-before: always;
        }

        .responsible-section {
            margin-bottom: 20px;
        }

        .responsible-field {
            min-height: 60px;
        }

        span,
        p {
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title-anex">Annex A. Informe de seguretat i salut del personal d'un centre de treball amb obres de
            reforma, ampliació o millora</div>
        <hr class="separator" style="margin: 5px 0">
        <div class="intro-text">
            <div class="intro-paragraph">Abans de la realització de d'obres és un requisit imprescindible haver iniciat
                el procediment operatiu de coordinació d'activitats empresarials que no són pròpies.</div>

            <div class="intro-paragraph">Aquest document fa referència a l'afectació en els treballadors del centre de
                treball del Departament d'Educació de les obres de reforma, ampliació o millora, quan aquestes
                coexisteixin amb l'activitat normal del centre.</div>

            <div class="intro-paragraph">La unitat promotora de la contractació és l'encarregada d'emplenar, amb
                caràcter previ, aquest "Annex A" i de trametre'l al Servei o Secció de Prevenció de Riscos Laborals, el
                qual en valorarà la informació i consensuarà, si és possible, les mesures preventives i/o correctores
                que cal adoptar amb la unitat promotora de l'obra i el o la responsable del centre de treball.</div>
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
                    <td style="width:35%">
                        <label>Codi postal</label>
                        <input type="text" style="width: 100%" value="08570">
                    </td>
                    <td style="width: 35%">
                        <label>Municipi</label>
                        <input type="text" style="width: 100%" value="Torelló">
                    </td>
                    <td style="width: 30%">
                        <label>Serveis territorials / centrals</label>
                        <input type="text" style="width: 100%" value="-">
                    </td>
                </tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Tipus de dependències</div>
            <hr class="separator" style="margin: 0px">
            <div class="checkbox-group">
                <div class="checkbox-item">
                    <input type="checkbox" class="checkbox" id="edifici">
                    <label for="edifici">Edifici</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" class="checkbox" id="baixos">
                    <label for="baixos">Baixos</label>
                </div>
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 100%">
                            <label>Planta</label>
                            <input type="text" style="width: 100%" value="-">
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="section">
            <div class="form-two-cols">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 100%">
                            <label>Horari de treball</label>
                            <input type="text" style="width: 100%" value="-">
                        </td>
                    </tr>
                </table>
                <div class="checkbox-group">
                    <span class="form-label">Atenció al públic?</span>
                    <div class="checkbox-item">
                        <input type="radio" name="atencio_public" value="si" class="checkbox" id="atencio_si">
                        <label for="atencio_si">Sí</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="radio" name="atencio_public" value="no" class="checkbox" id="atencio_no">
                        <label for="atencio_no">No</label>
                    </div>
                </div>
            </div>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%">
                        <label>Nombre de persones al centre</label>
                        <input type="text" style="width: 100%" value="-">
                    </td>
                    <td style="width: 50%">
                        <label>Nombre de persones afectades</label>
                        <input type="text" style="width: 100%" value="-">
                    </td>
                </tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Descripció i durada de l'obra*</div>
            <hr class="separator" style="margin: 0px">
            <div style="margin-bottom: 10px;">Si l'obra té més d'una fase, descriviu-les i indiqueu-ne la data d'inici
                prevista i la durada de cadascuna.</div>
            <textarea class="textarea-field" rows="2"></textarea>
            <div class="footnote">* Si necessiteu més espai en aquest apartat, adjunteu un full amb la resta
                d'informació.</div>
        </div>
        <!-- Página 2 -->
        <div class="page-break">
            <div class="section">
                <div class="section-title">Llocs de treball afectats*</div>
                <hr class="separator" style="margin: 0px">
                <div style="margin-bottom: 10px;">Indiqueu els llocs de treball que es veuran afectats en cadascuna de
                    les fases previstes</div>
                <textarea class="textarea-field" rows="2"></textarea>
            </div>

            <div class="question-section">
                <div class="question-text">Les obres afecten les vies d'evacuació del centre?</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="vies_evacuacio" value="si" class="checkbox" id="vies_si">
                        <label for="vies_si">Sí</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="vies_evacuacio" value="no" class="checkbox" id="vies_no">
                        <label for="vies_no">No</label>
                    </div>
                </div>
            </div>

            <div class="question-section">
                <div class="question-text">En cas afirmatiu, queda garantida l'evacuació correcta dels usuaris tenint
                    en compte l'ocupació?</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="evacuacio_garantida" value="si" class="checkbox"
                            id="evacuacio_si">
                        <label for="evacuacio_si">Sí</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="evacuacio_garantida" value="no" class="checkbox"
                            id="evacuacio_no">
                        <label for="evacuacio_no">No</label>
                    </div>
                </div>
                <div class="conditional-field">
                    <div style="margin-bottom: 10px;">En cas afirmatiu, indiqueu-ho per a cadascuna de les fases de
                        l'obra:</div>
                    <textarea class="textarea-field" rows="2"></textarea>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Instal·lacions del centre que es veuran afectades</div>
                <textarea class="textarea-field" rows="2"></textarea>
            </div>

            <div class="section">
                <div class="section-title">Mesures adoptades per separar l'obra dels llocs de treball del centre</div>
                <textarea class="textarea-field" rows="2"></textarea>
            </div>

            <div class="question-section">
                <div class="question-text">Està senyalitzada la prohibició d'accés a persones alienes a l'obra?</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="senyalitzacio" value="si" class="checkbox"
                            id="senyalitzacio_si">
                        <label for="senyalitzacio_si">Sí</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="senyalitzacio" value="no" class="checkbox"
                            id="senyalitzacio_no">
                        <label for="senyalitzacio_no">No</label>
                    </div>
                </div>
            </div>

            <div class="footnote">* Si necessiteu més espai en aquest apartat, adjunteu un full amb la resta
                d'informació.</div>
        </div>

        <!-- Página 3 -->
        <div class="page-break">
            <div class="section-title">Riscos per als treballadors del centre aliens a l'obra*</div>
            <hr class="separator" style="margin: 5px 0px">
            <div class="question-section">
                <div class="question-text">Hi ha modificació dels accessos al centre? (tant si afecta les persones com
                    els vehicles d'emergència)</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="modificacio_accessos" value="si" class="checkbox">
                        <label>Sí</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="modificacio_accessos" value="no" class="checkbox">
                        <label>No</label>
                    </div>
                </div>
            </div>

            <div class="question-section">
                <div class="question-text">En alguna de les fases de l'obra es preveu la generació de pols que pugui
                    afectar els treballadors del centre?</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="generacio_pols" value="si" class="checkbox">
                        <label>Sí</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="generacio_pols" value="no" class="checkbox">
                        <label>No</label>
                    </div>
                </div>
            </div>

            <div class="question-section">
                <div class="question-text">S'aplicaran tractaments de pintures ignífugues en elements d'estructura,
                    pintures en estructures metàl·liques, envernissat, etc., amb pistola?</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="tractaments_pintura" value="si" class="checkbox">
                        <label>Sí (en cas afirmatiu adjunteu-hi les fitxes de seguretat)</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="tractaments_pintura" value="no" class="checkbox">
                        <label>No</label>
                    </div>
                </div>
            </div>

            <div class="question-section">
                <div class="question-text">S'utilitzarà maquinària que generi nivells alts de soroll (martells
                    pneumàtics, serres circulars, etc.)?</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="maquinaria_soroll" value="si" class="checkbox">
                        <label>Sí</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="maquinaria_soroll" value="no" class="checkbox">
                        <label>No</label>
                    </div>
                </div>
            </div>

            <div class="question-section">
                <div class="question-text">Hi ha risc de caiguda de materials en zones ocupades pels treballadors i
                    usuaris del centre?</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="caiguda_materials" value="si" class="checkbox">
                        <label>Sí</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="caiguda_materials" value="no" class="checkbox">
                        <label>No</label>
                    </div>
                </div>
            </div>

            <div class="question-section">
                <div class="question-text">En cas de disposar de grua torre o similar, està previst que aquesta es
                    desplaci per damunt de zones ocupades pels treballadors i usuaris del centre?</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="grua_torre" value="si" class="checkbox">
                        <label>Sí</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="grua_torre" value="no" class="checkbox">
                        <label>No</label>
                    </div>
                </div>
            </div>

            <div class="question-section">
                <div class="question-text">Hi ha previstos treballs amb riscos especialment greus per les
                    característiques particulars de l'activitat, els procediments o l'entorn del lloc de treball?</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="treballs_greus" value="si" class="checkbox">
                        <label>Sí</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="treballs_greus" value="no" class="checkbox">
                        <label>No</label>
                    </div>
                </div>
                <div class="conditional-field">
                    <div>En cas afirmatiu, indiqueu-ne quins:</div>
                    <input type="text" class="form-input" style="width: 100%; margin-top: 5px;">
                </div>
            </div>

            <div class="question-section">
                <div class="question-text">Hi ha previstos treballs en els quals l'exposició a agents químics suposi un
                    risc d'especial gravetat?</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="agents_quimics" value="si" class="checkbox">
                        <label>Sí</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="agents_quimics" value="no" class="checkbox">
                        <label>No</label>
                    </div>
                </div>
                <div class="conditional-field">
                    <div>En cas afirmatiu, indiqueu-ne quins:</div>
                    <input type="text" class="form-input" style="width: 100%; margin-top: 5px;">
                </div>
            </div>

            <div class="question-section">
                <div class="question-text">Hi ha prevista una comunicació si es produeix una emergència (incendi,
                    emanació de productes tòxics...) que pugui afectar el centre?</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="comunicacio_emergencia" value="si" class="checkbox">
                        <label>Sí</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="comunicacio_emergencia" value="no" class="checkbox">
                        <label>No</label>
                    </div>
                </div>
            </div>

            <div class="question-section">
                <div class="question-text">En cas de desenvolupar treballs amb risc d'exposició a l'amiant, el director
                    o directora del centre de treball o responsable de la gestió de l'edifici dels serveis
                    administratius garanteix la no presència de treballadors i/o d'usuaris del centre de treball durant
                    el desenvolupament de l'activitat contractada?</div>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" name="exposicio_amiant" value="si" class="checkbox">
                        <label>Sí</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="exposicio_amiant" value="no" class="checkbox">
                        <label>No</label>
                    </div>
                </div>
            </div>

            <div class="section responsible-section">
                <div class="section-title">Responsable de la unitat promotora</div>
                <hr class="separator" style="margin: 0px">
                <div style="margin-bottom: 10px;">Indiqueu el nom i cognoms, la unitat i el càrrec</div>
                <textarea class="textarea-field responsible-field" rows="2"></textarea>
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
                        <div class="signature-label">Signatura</div>
                        <div class="signature-line"></div>
                    </div>
                </div>
            </div>

            <div class="footnote">* Si necessiteu més espai en aquest apartat, adjunteu un full amb la resta
                d'informació.</div>
        </div>
    </div>
</body>

</html>
