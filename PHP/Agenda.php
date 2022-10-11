<?php
  require_once __DIR__ . '/AgendaInterface.php';
  require_once __DIR__ . '/Evento.php';

  /*
    Classe que abstrai uma agenda; consiste de uma composição simples de eventos.
    Implemente o método privado para filtrar os eventos por dia e o método da AgendaInterface
    para gerar o json ordenado.
  */

  class Agenda implements AgendaInterface{

    private $eventos = [];
    public function __construct($eventos){
      $this->eventos = $eventos;
    }

    // TODO implementar o método "imprimirJsonEventosDiaOrdenados" da AgendaInterface
    // o faça utilizar o método privado filtrarEventosDia que você implementou para
    // obter os eventos do dia; para ordená los use a função nativa usort https://www.php.net/manual/en/function.usort
    // com uma closure para comparação; retorne uma string json com um array de
    // eventos formatados pelo método getEstadoEmArrayAssociativo na classe Evento

    public function imprimirJsonEventosDiaOrdenados ($dataHoraDia){
      $this->eventos = $this->filtrarEventosDia($dataHoraDia);
      $auxArray = [];
      //var_dump($this->eventos);
      for($i=0;$i<count($this->eventos);$i++){
        array_push($auxArray, $this->eventos[$i]->getEstadoEmArrayAssociativo());
      }
      //var_dump($auxArray);
      usort($auxArray, function($a, $b) {
        return $a['dataHora'] <=> $b['dataHora'];
      });
      
      return json_encode($auxArray);

      
    }


    private function filtrarEventosDia($dataHoraDia){
      $newArray = [];
      $obj = $this->eventos;
      for($i=0;$i<count($obj);$i++){
        if($obj[$i]->getDataHora()->format('Y-m-d') == $dataHoraDia){
          array_push($newArray, $this->eventos[$i]);
        }
      }
      //var_dump($newArray);
      return $newArray;
    }
  }
?>
