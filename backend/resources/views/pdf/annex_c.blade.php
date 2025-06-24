<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annex C. Instruccions que cal seguir en cas d'emergència en el centre de treball</title>
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
            min-width: 400px;
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

        .instructions-section {
            margin-bottom: 20px;
        }

        .instructions-section p {
            text-align: justify;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .alarm-section {
            margin-bottom: 20px;
        }

        .alarm-item {
            margin-bottom: 15px;
            border: 1px solid #000;
            padding: 10px;
        }

        .alarm-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .checkbox {
            margin-right: 8px;
            min-width: 12px;
            height: 12px;
            border: 1.5px solid #000;
            flex-shrink: 0;
        }

        .alarm-type {
            font-weight: bold;
            margin-right: 20px;
        }

        .alarm-details {
            margin-left: 20px;
        }

        .alarm-options {
            display: flex;
            gap: 30px;
            margin-top: 5px;
        }

        .evacuation-section {
            margin-bottom: 20px;
        }

        .evacuation-item {
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .bullet-point {
            margin-left: 15px;
            margin-bottom: 8px;
        }

        .other-info-section {
            margin-bottom: 20px;
        }

        .other-info-item {
            margin-bottom: 8px;
            line-height: 1.3;
            margin-left: 15px;
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

        .reference {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .page-number {
            text-align: right;
            font-size: 9pt;
            margin-top: 5px;
        }

        .roman-numeral {
            font-weight: bold;
            font-size: 12pt;
            margin: 15px 0 10px 0;
        }

        .subsection-number {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .page-break {
            page-break-before: always;
        }

        input {
            font-size: 8pt
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title-anex">Annex C. Instruccions que cal seguir en cas d'emergència en el centre de treball</div>

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
            <div class="section-title">Dades de l'empresa, entitat o persona física aliena que realitza l'activitat
            </div>
            <hr class="separator" style="margin: 0px">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%">
                        <label>Nom</label>
                        <input type="text" style="width: 100%" value="{{ $visit->name . ' ' . $visit->surname }}">
                    </td>
                    <td style="width: 50%">
                        <label>Adreça electrònica</label>
                       <input type="text" style="width: 100%" value="{{ $visit->email }}">
                    </td>
                </tr>
            </table>
        </div>

        <div class="section instructions-section">
            <div class="section-title">Instruccions</div>
            <hr class="separator" style="margin: 0px">
            <p>En el supòsit de situacions d'emergència que requereixin l'evacuació o el confinament en les dependències
                del centre de treball, les actuacions que cal seguir, tant pel personal visitant com pel personal del
                centre de treball s'han d'organitzar en termes de seguretat, rapidesa i efectivitat.</p>
        </div>

        <div class="roman-numeral">I. Sistema d'alarma que activa el Pla d'emergència per a l'evacuació i/o el
            confinament a l'edifici (quan esteu a les dependències del centre de treball)<sup>1</sup></div>

        <div class="alarm-section">
            <div class="alarm-item">
                <div class="alarm-header">
                    <input type="checkbox" class="checkbox">
                    <span class="alarm-type">Megafonia</span>
                </div>
                <div class="alarm-details">
                    <div>Missatge que indica la necessitat d'evacuació o confinament</div>
                    <div class="alarm-options">
                        <span>Per a evacuació <input type="text" class="form-input form-input-medium"></span>
                        <span>Per a confinament <input type="text" class="form-input form-input-medium"></span>
                    </div>
                </div>
            </div>

            <div class="alarm-item">
                <div class="alarm-header">
                    <input type="checkbox" class="checkbox">
                    <span class="alarm-type">Timbre</span>
                </div>
                <div class="alarm-details">
                    <div>Dibuix del senyal del timbre</div>
                    <div class="alarm-options">
                        <span>Per a evacuació <input type="text" class="form-input form-input-medium"></span>
                        <span>Per a confinament <input type="text" class="form-input form-input-medium"></span>
                    </div>
                </div>
            </div>

            <div class="alarm-item">
                <div class="alarm-header">
                    <input type="checkbox" class="checkbox">
                    <span class="alarm-type">Sirena</span>
                </div>
                <div class="alarm-details">
                    <div>Dibuix del senyal de la sirena</div>
                    <div class="alarm-options">
                        <span>Per a evacuació <input type="text" class="form-input form-input-medium"></span>
                        <span>Per a confinament <input type="text" class="form-input form-input-medium"></span>
                    </div>
                </div>
            </div>

            <div class="alarm-item">
                <div class="alarm-header">
                    <input type="checkbox" class="checkbox">
                    <span class="alarm-type">Altres sistemes</span>
                </div>
                <div class="alarm-details">
                    <div>Detall <input type="text" class="form-input form-input-long"></div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <!-- Página 2 -->
        <div class="page-break">
            <div class="section-title">II. Actuacions d'evacuació i de confinament</div>
            <hr class="separator" style="margin: 0px">
            <br>
            <div class="evacuation-section">
                <div class="evacuation-item">Deixeu el vostre lloc de treball en condicions segures (atureu el
                    funcionament i l'alimentació d'energia de les màquines i dels equips de treball que utilitzeu).
                </div>

                <div class="evacuation-item">Seguiu les instruccions que us donin els responsables de l'evacuació i/o
                    del confinament del centre de treball i mantingueu la calma en tot moment.</div>

                <div class="evacuation-item">En qualsevol cas:</div>

                <div class="bullet-point">-Seguiu els recorreguts i les sortides d'evacuació i/o confinament assignats
                    a la zona on us trobeu o realitzeu les vostres tasques.</div>
                <div class="bullet-point" style="margin-left: 50px">Vegeu plànols ubicats a: <input type="text"
                        class="form-input form-input-long"></div>

                <div class="bullet-point">-Dirigiu-vos al punt de reunió o a l'espai de confinament.</div>
                <div class="bullet-point" style="margin-left: 50px">Ubicació del punt de reunió a: <input
                        type="text" class="form-input form-input-long"></div>
                <div class="bullet-point" style="margin-left: 50px">Ubicació de l'espai de confinament a: <input
                        type="text" class="form-input form-input-long"></div>
                <div class="bullet-point">-En cas d'horari nocturn o festiu, si escau, ho comunicareu a: <input
                        type="text" class="form-input form-input-long"></input>

                    <div class="bullet-point" style="margin-top:8px">-Si sou la primera persona a detectar
                        l'emergència, aviseu immediatament a la persona del centre de treball que tingueu més a prop.
                    </div>

                    <div class="bullet-point">-Altres observacions: <input type="text"
                            class="form-input form-input-long"></div>
                    <br>
                </div>

                <div class="section-title">III. Altres informacions</div>
                <hr class="separator" style="margin: 0px">
                <br>
                <div class="other-info-section">
                    <div class="other-info-item">-No us atureu bloquejant la sortida i adreceu-vos al punt de reunió o
                        espai de confinament indicat.</div>
                    <div class="other-info-item">-No correu, conserveu la calma.</div>
                    <div class="other-info-item">-No retrocediu ni torneu enrere sota cap concepte.</div>
                    <div class="other-info-item">-No utilitzeu els ascensors.</div>
                    <div class="other-info-item">-Tanqueu les portes i finestres dels espais a mesura que els abandoneu
                        (no els tanqueu amb clau).</div>
                    <div class="other-info-item">-Si hi ha fum, camineu ajupits i poseu-vos un mocador, preferiblement
                        moll, per tapar la boca i el nas.</div>
                    <div class="other-info-item">-No baixeu mai al soterrani, si escau.</div>
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
                            <div class="signature-label">Signatura del director o directora del centre de treball o
                                responsable de la gestió de l'edifici dels serveis administratius:</div>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer" style="margin-top: 200px">
            <hr class="separator">
            <div class="page-number">2/2</div>
        </div>
</body>

</html>
