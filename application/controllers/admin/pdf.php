<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pdf extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('admin/head - pdf');
        $this->load->view('admin/pdf');
    }

    public function geraPDF() {
        $this->load->helper(array('dompdf', 'file'));
        $this->load->model('pdfmodel');
        $item = '';
        $query = $this->pdfmodel->obterCompras();
        $total = 0;

            $nome = '';
            $email = '';
            $dataCompra = '';

        foreach ($query->result() as $row) {
            $item .= "<tr>
                        <td>" . $row->item_nome . "</td>
                        <td>" . $row->item_qtd . "</td>
                        <td>" . number_format($row->item_preco_atual, 2, ',', '.') . "</td>
                        <td> R$ " . number_format($row->item_qtd * $row->item_preco_atual, 2, ',', '.') . "</td>
                        <td>" . $row->item_mercado . "</td>
                    </tr>";
            $total += $row->item_preco_atual;
            $codigo = $row->com_codigo;
            $nome = $row->cli_nome;
            $email = $row->cli_email;
            $dataCompra = $row->com_data;
        }

        date_default_timezone_set('America/Santiago');

        $nome_arquivo = 'Mando Entrega - ' . date('d/m/Y') . ' ' . date('H:i:s');
        $HTML = '<html>
                    <head>
                      <style="text/css">
                        body {
                          font-family: Calibri, DejaVu Sans, Arial;
                          margin: 0;
                          padding: 0;
                          border: none;
                          font-size: 10px;
                        }
                        #tabela {
                            align: center
                        }
                        #exemplo {
                          width: 100%;
                          height: auto;
                          overflow: hidden;
                          padding: 5px 0;
                          text-align: center;
                          background-color: #FF3333;
                          font-size: 17px;
                          color: #FFF;
                        }
                        
                        .Tabela {
                                margin:0px;padding:0px;
                                width:100%;
                                box-shadow: 10px 10px 5px #888888;
                                border:1px solid #000000;

                                -moz-border-radius-bottomleft:4px;
                                -webkit-border-bottom-left-radius:4px;
                                border-bottom-left-radius:4px;

                                -moz-border-radius-bottomright:4px;
                                -webkit-border-bottom-right-radius:4px;
                                border-bottom-right-radius:4px;

                                -moz-border-radius-topright:4px;
                                -webkit-border-top-right-radius:4px;
                                border-top-right-radius:4px;

                                -moz-border-radius-topleft:4px;
                                -webkit-border-top-left-radius:4px;
                                border-top-left-radius:4px;
                        }.Tabela table{
                                border-collapse: collapse;
                                        border-spacing: 0;
                                width:100%;
                                height:10%;
                                margin:0px;padding:0px;
                        }.Tabela tr:last-child td:last-child {
                                -moz-border-radius-bottomright:4px;
                                -webkit-border-bottom-right-radius:4px;
                                border-bottom-right-radius:4px;
                        }
                        .Tabela table tr:first-child td:first-child {
                                -moz-border-radius-topleft:4px;
                                -webkit-border-top-left-radius:4px;
                                border-top-left-radius:4px;
                        }
                        .Tabela table tr:first-child td:last-child {
                                -moz-border-radius-topright:4px;
                                -webkit-border-top-right-radius:4px;
                                border-top-right-radius:4px;
                        }.Tabela tr:last-child td:first-child{
                                -moz-border-radius-bottomleft:4px;
                                -webkit-border-bottom-left-radius:4px;
                                border-bottom-left-radius:4px;
                        }.Tabela tr:hover td{

                        }
                        .Tabela tr:nth-child(odd){ background-color:#e5e5e5; }
                        .Tabela tr:nth-child(even)    { background-color:#ffffff; }.Tabela td{
                                vertical-align:middle;

                                border:1px solid #000000;
                                border-width:0px 1px 1px 0px;
                                text-align:left;
                                padding:6px;
                                font-size:10px;
                                font-family:Arial;
                                font-weight:normal;
                                color:#000000;
                        }.Tabela tr:last-child td{
                                border-width:0px 1px 0px 0px;
                        }.Tabela tr td:last-child{
                                border-width:0px 0px 1px 0px;
                        }.Tabela tr:last-child td:last-child{
                                border-width:0px 0px 0px 0px;
                        }
                        .Tabela tr:first-child td{
                                        background:-o-linear-gradient(bottom, #333333 5%, #333333 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #333333), color-stop(1, #333333) );
                                background:-moz-linear-gradient( center top, #333333 5%, #333333 100% );
                                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#333333", endColorstr="#333333");	background: -o-linear-gradient(top,#333333,333333);

                                background-color:#333333;
                                border:0px solid #000000;
                                text-align:center;
                                border-width:0px 0px 1px 1px;
                                font-size:14px;
                                font-family:Arial;
                                font-weight:bold;
                                color:#ffffff;
                        }
                        .Tabela tr:first-child:hover td{
                                background:-o-linear-gradient(bottom, #333333 5%, #333333 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #333333), color-stop(1, #333333) );
                                background:-moz-linear-gradient( center top, #333333 5%, #333333 100% );
                                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#333333", endColorstr="#333333");	background: -o-linear-gradient(top,#333333,333333);

                                background-color:#333333;
                        }
                        .Tabela tr:first-child td:first-child{
                                border-width:0px 0px 1px 0px;
                        }
                        .Tabela tr:first-child td:last-child{
                                border-width:0px 0px 1px 1px;
                        }

                      </style>
                    </head>
                    <body>
                      <div id="exemplo">
                        <img src="assets\img\logo-pdf.png">
                        <b>  Sua compra a um clique de distância!</b>
                      </div>
                        <div>
                            <hr>
                            <p><b>Guia para entrega, gerado em ' . date('d/m/Y') . ' ' . date('H:i:s') . '<br>Código da compra: ' . $codigo . '</b></p>
                            <p><b>Informações do Cliente:</b></p>
                            <p>
                                Cliente: ' . $nome . '<br>
                                E-mail: ' . $email . '<br>
                                Endereço:' . '' . '<br>
                                Hora Compra:' . $dataCompra . '<br>
                                Prazo para entrega:' . $dataCompra . '<br>
                            </p>
                            <hr>
                        </div>
                        <div>
                        <p><b>Informações da Compra:</b></p>
                            <table class="Tabela">
                                <tr>
                                    <td>Item</td>
                                    <td>Quantidade</td>
                                    <td>(R$)Preço unitário</td>
                                    <td>(R$)Total</td>
                                    <td>Mercado</td>
                                </tr>' .
                $item
                . '</table>
                            <p><b>Total compra: R$ ' . number_format($row->item_qtd * $total, 2, ',', '.') . '</b></p>
                            <br>
                            <hr>
                            <p>
                            Agradecemos pela sua preferência!
                            </p>
                        </div>
                    </body>
                </html>';

        pdf_create($HTML, $nome_arquivo);
    }

}
