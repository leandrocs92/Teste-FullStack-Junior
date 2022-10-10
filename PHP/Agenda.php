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
      $this->filtrarEventosDia($dataHoraDia);
      
    }


    private function filtrarEventosDia($dataHoraDia){
      /*$eventoAssociado = $this->eventos->getEstadoEmArrayAssociativo();
      $dataHoraDia = is_string($dataHoraDia) ? new DateTime($dataHoraDia) : $dataHoraDia;
      $dataHoraDia = $dataHoraDia->format(DATE_ISO8601);*/
      $filtrados = [];
      
      for ($i = 0; $i < count($this->eventos); $i++){
        //$vetor = get_object_vars($this->eventos[$i]);
        $filtrados = $this->eventos[$i]->getDataHora();
        //var_dump($vetor);
        
        
        
      }
      if(in_array($dataHoraDia, $filtrados)){
        //$filtrados.array_push($this->eventos[$i]);
        //echo ("Existe");
      } 
      var_dump($filtrados);
      /*$filter = array_values(array_filter($this->eventos, function($value) use ($dataHoraDia){
        return $value == $dataHoraDia;
      }));*/
      // TODO implementar o método que filtrará os eventos do estado da Agenda,
      // retornando apenas os da data informada por parâmetro - sem alterar o estado
      // do objeto Agenda
    }
  }
?>
