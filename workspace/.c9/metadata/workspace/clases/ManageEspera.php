{"filter":false,"title":"ManageEspera.php","tooltip":"/clases/ManageEspera.php","ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":10,"column":13},"end":{"row":10,"column":16},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":15,"state":"php-start","mode":"ace/mode/php"}},"hash":"9042d2e495b387115ba779e1c8643582aa6d21ba","undoManager":{"mark":44,"position":44,"stack":[[{"start":{"row":0,"column":0},"end":{"row":96,"column":0},"action":"insert","lines":["class ManageEspera {","","    private $bd = null;","    private $tabla = \"espera\";","    ","    function __construct(DataBase $bd) {","        $this->bd = $bd;","    }","    ","    function get($idEspera){","        //devuelve un objeto de la clase espera","        $parametros = array();","        $parametros[idEspera] = $idEspera;","        $this->bd->select($this->tabla, \"*\", \"idEspera=:idEspera\", $parametros);","        $fila=$this->bd->getRow();","        $espera = new Espera();","        $espera->set($fila);","        return $espera;","    }","    ","    function delete($idEspera){","        $parametros = array();","        $parametros['idEspera'] = $idEspera;","        return $this->bd->delete($this->tabla, $parametros);","    }","    ","    ","    function deleteEsperas($parametros){","        return $this->bd->delete($this->tabla, $parametros);","    }","    ","  ","    ","    function set(Espera $espera){","        //Update de todos los campos menos el id, el id se usara como el where para el update numero de filas modificadas","        $parametrosSet=array();","        $parametrosSet['idEspera']=$espera->getIdEspera();","        $parametrosSet['email']=$espera->getEmail();","        $parametrosSet['estado']=$espera->getEstado();","        ","        $parametrosWhere = array();","        $parametrosWhere['idEspera']=$espera->getIdEspera();","        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);","        ","    }","    ","    function insert(Espera $espera){","        //Se pasa un objeto espera y se inserta, se devuelve el id del elemento con el que se ha insertado","        $parametrosSet=array();","         $parametrosSet['idEspera']=$espera->getIdEspera();","        $parametrosSet['email']=$espera->getEmail();","        $parametrosSet['estado']=$espera->getEstado();","        return $this->bd->insert($this->tabla, $parametrosSet);","    }","    ","    function getList($pagina=1, $orden=\"\", $nrpp=Constant::NRPP, $condicion =\"1=1\", $parametros = array()){","        ","        $ordenPredeterminado = \"$orden,idEspera\";","        if($orden===\"\" || $orden === null){","            $ordenPredeterminado = \"idEspera\";","        }","         $registroInicial = ($pagina-1)*$nrpp;","         $this->bd->select($this->tabla, \"*\", $condicion, $parametros , $ordenPredeterminado , \"$registroInicial, $nrpp\");","         $r=array();","         while($fila =$this->bd->getRow()){","             $espera = new Espera();","             $espera->set($fila);","             $r[]=$espera;","         }","         return $r;","    }","    ","    function getListJson($pagina=1, $orden=\"\", $nrpp=Constant::NRPP, $condicion =\"1=1\", $parametros = array()){","        $lista = $this->getList($pagina, $orden, $nrpp, $condicion, $parametros);","        $r = \"[ \";","        foreach ($lista as $objeto){","            $r .= $objeto->getJson() . \",\";","        }","        $r = substr($r, 0, -1) . \"]\";","        return $r;","    }","    ","     function getValuesSelect(){","        $this->bd->query($this->tabla, \"ID, Name\", array(), \"Name\");","        $array = array();","        while($fila=$this->bd->getRow()){","            $array[$fila[0]] = $fila[1];","        }","        return $array;","    }","    ","    function count($condicion=\"1 = 1\", $parametros = array()){","        return $this->bd->count($this->tabla, $condicion, $parametros);","    }","}","",""],"id":1}],[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["",""],"id":2}],[{"start":{"row":0,"column":0},"end":{"row":0,"column":1},"action":"insert","lines":["<"],"id":3}],[{"start":{"row":0,"column":1},"end":{"row":0,"column":2},"action":"insert","lines":["?"],"id":4}],[{"start":{"row":0,"column":2},"end":{"row":0,"column":3},"action":"insert","lines":["p"],"id":5}],[{"start":{"row":0,"column":3},"end":{"row":0,"column":4},"action":"insert","lines":["h"],"id":6}],[{"start":{"row":0,"column":4},"end":{"row":0,"column":5},"action":"insert","lines":["p"],"id":7}],[{"start":{"row":0,"column":0},"end":{"row":95,"column":1},"action":"remove","lines":["<?php","class ManageEspera {","","    private $bd = null;","    private $tabla = \"espera\";","    ","    function __construct(DataBase $bd) {","        $this->bd = $bd;","    }","    ","    function get($idEspera){","        //devuelve un objeto de la clase espera","        $parametros = array();","        $parametros[idEspera] = $idEspera;","        $this->bd->select($this->tabla, \"*\", \"idEspera=:idEspera\", $parametros);","        $fila=$this->bd->getRow();","        $espera = new Espera();","        $espera->set($fila);","        return $espera;","    }","    ","    function delete($idEspera){","        $parametros = array();","        $parametros['idEspera'] = $idEspera;","        return $this->bd->delete($this->tabla, $parametros);","    }","    ","    ","    function deleteEsperas($parametros){","        return $this->bd->delete($this->tabla, $parametros);","    }","    ","  ","    ","    function set(Espera $espera){","        //Update de todos los campos menos el id, el id se usara como el where para el update numero de filas modificadas","        $parametrosSet=array();","        $parametrosSet['idEspera']=$espera->getIdEspera();","        $parametrosSet['email']=$espera->getEmail();","        $parametrosSet['estado']=$espera->getEstado();","        ","        $parametrosWhere = array();","        $parametrosWhere['idEspera']=$espera->getIdEspera();","        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);","        ","    }","    ","    function insert(Espera $espera){","        //Se pasa un objeto espera y se inserta, se devuelve el id del elemento con el que se ha insertado","        $parametrosSet=array();","         $parametrosSet['idEspera']=$espera->getIdEspera();","        $parametrosSet['email']=$espera->getEmail();","        $parametrosSet['estado']=$espera->getEstado();","        return $this->bd->insert($this->tabla, $parametrosSet);","    }","    ","    function getList($pagina=1, $orden=\"\", $nrpp=Constant::NRPP, $condicion =\"1=1\", $parametros = array()){","        ","        $ordenPredeterminado = \"$orden,idEspera\";","        if($orden===\"\" || $orden === null){","            $ordenPredeterminado = \"idEspera\";","        }","         $registroInicial = ($pagina-1)*$nrpp;","         $this->bd->select($this->tabla, \"*\", $condicion, $parametros , $ordenPredeterminado , \"$registroInicial, $nrpp\");","         $r=array();","         while($fila =$this->bd->getRow()){","             $espera = new Espera();","             $espera->set($fila);","             $r[]=$espera;","         }","         return $r;","    }","    ","    function getListJson($pagina=1, $orden=\"\", $nrpp=Constant::NRPP, $condicion =\"1=1\", $parametros = array()){","        $lista = $this->getList($pagina, $orden, $nrpp, $condicion, $parametros);","        $r = \"[ \";","        foreach ($lista as $objeto){","            $r .= $objeto->getJson() . \",\";","        }","        $r = substr($r, 0, -1) . \"]\";","        return $r;","    }","    ","     function getValuesSelect(){","        $this->bd->query($this->tabla, \"ID, Name\", array(), \"Name\");","        $array = array();","        while($fila=$this->bd->getRow()){","            $array[$fila[0]] = $fila[1];","        }","        return $array;","    }","    ","    function count($condicion=\"1 = 1\", $parametros = array()){","        return $this->bd->count($this->tabla, $condicion, $parametros);","    }","}"],"id":8}],[{"start":{"row":0,"column":0},"end":{"row":97,"column":0},"action":"insert","lines":["<?php","class ManageEspera {","","    private $bd = null;","    private $tabla = \"espera\";","    ","    function __construct(DataBase $bd) {","        $this->bd = $bd;","    }","    ","    function get($estado){","        //devuelve un objeto de la clase espera","        $parametros = array();","        $parametros[estado] = $estado;","        $this->bd->select($this->tabla, \"*\", \"estado=:estado\", $parametros);","        $fila=$this->bd->getRow();","        $espera = new Espera();","        $espera->set($fila);","        return $espera;","    }","    ","    function delete($estado){","        $parametros = array();","        $parametros['estado'] = $estado;","        return $this->bd->delete($this->tabla, $parametros);","    }","    ","    ","    function deleteEsperas($parametros){","        return $this->bd->delete($this->tabla, $parametros);","    }","    ","  ","    ","    function set(Espera $espera){","        //Update de todos los campos menos el id, el id se usara como el where para el update numero de filas modificadas","        $parametrosSet=array();       ","        $parametrosSet['estado']=$espera->getEstado();","        $parametrosSet['idEspera']=$espera->getIdEspera();","        $parametrosSet['email']=$espera->getEmail();","        ","        $parametrosWhere = array();","        $parametrosWhere['estado']=$espera->getEstado();","        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);","        ","    }","    ","    function insert(Espera $espera){","        //Se pasa un objeto espera y se inserta, se devuelve el id del elemento con el que se ha insertado","        $parametrosSet=array();","        $parametrosSet['estado']=$espera->getEstado();","        $parametrosSet['idEspera']=$espera->getIdEspera();","        $parametrosSet['email']=$espera->getEmail();","        return $this->bd->insert($this->tabla, $parametrosSet);","    }","    ","    function getList($pagina=1, $orden=\"\", $nrpp=Constant::NRPP, $condicion =\"1=1\", $parametros = array()){","        ","        $ordenPredeterminado = \"$orden,estado\";","        if($orden===\"\" || $orden === null){","            $ordenPredeterminado = \"estado\";","        }","         $registroInicial = ($pagina-1)*$nrpp;","         $this->bd->select($this->tabla, \"*\", $condicion, $parametros , $ordenPredeterminado , \"$registroInicial, $nrpp\");","         $r=array();","         while($fila =$this->bd->getRow()){","             $espera = new Espera();","             $espera->set($fila);","             $r[]=$espera;","         }","         return $r;","    }","    ","    function getListJson($pagina=1, $orden=\"\", $nrpp=Constant::NRPP, $condicion =\"1=1\", $parametros = array()){","        $lista = $this->getList($pagina, $orden, $nrpp, $condicion, $parametros);","        $r = \"[ \";","        foreach ($lista as $objeto){","            $r .= $objeto->getJson() . \",\";","        }","        $r = substr($r, 0, -1) . \"]\";","        return $r;","    }","    ","     function getValuesSelect(){","        $this->bd->query($this->tabla, \"ID, Name\", array(), \"Name\");","        $array = array();","        while($fila=$this->bd->getRow()){","            $array[$fila[0]] = $fila[1];","        }","        return $array;","    }","    ","    function count($condicion=\"1 = 1\", $parametros = array()){","        return $this->bd->count($this->tabla, $condicion, $parametros);","    }","}","",""],"id":9}],[{"start":{"row":71,"column":5},"end":{"row":72,"column":0},"action":"insert","lines":["",""],"id":10},{"start":{"row":72,"column":0},"end":{"row":72,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":72,"column":4},"end":{"row":82,"column":5},"action":"insert","lines":[" function getListWhere($condicion,$pagina=1, $nrpp=Constant::NRPP){","         $registroInicial = ($pagina-1)*$nrpp;","         $this->bd->select($this->tabla, \"*\", $condicion, array(), \"codigoCancion, titulo\", \"$registroInicial, $nrpp\");","         $r=array();","         while($fila =$this->bd->getRow()){","             $cancion = new Cancion();","             $cancion->set($fila);","             $r[]=$cancion;","         }","         return $r;","    }"],"id":11}],[{"start":{"row":74,"column":68},"end":{"row":74,"column":81},"action":"remove","lines":["codigoCancion"],"id":12},{"start":{"row":74,"column":68},"end":{"row":74,"column":69},"action":"insert","lines":["e"]}],[{"start":{"row":74,"column":69},"end":{"row":74,"column":70},"action":"insert","lines":["s"],"id":13}],[{"start":{"row":74,"column":70},"end":{"row":74,"column":71},"action":"insert","lines":["t"],"id":14}],[{"start":{"row":74,"column":71},"end":{"row":74,"column":72},"action":"insert","lines":["a"],"id":15}],[{"start":{"row":74,"column":72},"end":{"row":74,"column":73},"action":"insert","lines":["d"],"id":16}],[{"start":{"row":74,"column":73},"end":{"row":74,"column":74},"action":"insert","lines":["o"],"id":17}],[{"start":{"row":74,"column":74},"end":{"row":74,"column":82},"action":"remove","lines":[", titulo"],"id":18}],[{"start":{"row":77,"column":14},"end":{"row":77,"column":21},"action":"remove","lines":["cancion"],"id":19}],[{"start":{"row":77,"column":14},"end":{"row":77,"column":15},"action":"insert","lines":["e"],"id":20}],[{"start":{"row":77,"column":15},"end":{"row":77,"column":16},"action":"insert","lines":["s"],"id":21}],[{"start":{"row":77,"column":16},"end":{"row":77,"column":17},"action":"insert","lines":["p"],"id":22}],[{"start":{"row":77,"column":17},"end":{"row":77,"column":18},"action":"insert","lines":["e"],"id":23}],[{"start":{"row":77,"column":18},"end":{"row":77,"column":19},"action":"insert","lines":["r"],"id":24}],[{"start":{"row":77,"column":19},"end":{"row":77,"column":20},"action":"insert","lines":["a"],"id":25}],[{"start":{"row":77,"column":27},"end":{"row":77,"column":34},"action":"remove","lines":["Cancion"],"id":26},{"start":{"row":77,"column":27},"end":{"row":77,"column":28},"action":"insert","lines":["E"]}],[{"start":{"row":77,"column":28},"end":{"row":77,"column":29},"action":"insert","lines":["s"],"id":27}],[{"start":{"row":77,"column":27},"end":{"row":77,"column":29},"action":"remove","lines":["Es"],"id":28},{"start":{"row":77,"column":27},"end":{"row":77,"column":33},"action":"insert","lines":["Espera"]}],[{"start":{"row":78,"column":14},"end":{"row":78,"column":21},"action":"remove","lines":["cancion"],"id":29},{"start":{"row":78,"column":14},"end":{"row":78,"column":15},"action":"insert","lines":["e"]}],[{"start":{"row":78,"column":15},"end":{"row":78,"column":16},"action":"insert","lines":["s"],"id":30}],[{"start":{"row":78,"column":13},"end":{"row":78,"column":16},"action":"remove","lines":["$es"],"id":31},{"start":{"row":78,"column":13},"end":{"row":78,"column":20},"action":"insert","lines":["$espera"]}],[{"start":{"row":79,"column":19},"end":{"row":79,"column":26},"action":"remove","lines":["cancion"],"id":32},{"start":{"row":79,"column":19},"end":{"row":79,"column":20},"action":"insert","lines":["e"]}],[{"start":{"row":79,"column":20},"end":{"row":79,"column":21},"action":"insert","lines":["s"],"id":33}],[{"start":{"row":79,"column":18},"end":{"row":79,"column":21},"action":"remove","lines":["$es"],"id":34},{"start":{"row":79,"column":18},"end":{"row":79,"column":25},"action":"insert","lines":["$espera"]}],[{"start":{"row":58,"column":39},"end":{"row":58,"column":40},"action":"insert","lines":[" "],"id":36}],[{"start":{"row":58,"column":38},"end":{"row":58,"column":39},"action":"insert","lines":[" "],"id":37}],[{"start":{"row":58,"column":40},"end":{"row":58,"column":41},"action":"remove","lines":[" "],"id":38}],[{"start":{"row":58,"column":39},"end":{"row":58,"column":40},"action":"remove","lines":[","],"id":39}],[{"start":{"row":58,"column":38},"end":{"row":58,"column":39},"action":"remove","lines":[" "],"id":40}],[{"start":{"row":58,"column":37},"end":{"row":58,"column":38},"action":"remove","lines":["n"],"id":41}],[{"start":{"row":58,"column":36},"end":{"row":58,"column":37},"action":"remove","lines":["e"],"id":42}],[{"start":{"row":58,"column":35},"end":{"row":58,"column":36},"action":"remove","lines":["d"],"id":43}],[{"start":{"row":58,"column":34},"end":{"row":58,"column":35},"action":"remove","lines":["r"],"id":44}],[{"start":{"row":58,"column":33},"end":{"row":58,"column":34},"action":"remove","lines":["o"],"id":45}],[{"start":{"row":58,"column":32},"end":{"row":58,"column":33},"action":"remove","lines":["$"],"id":46}]]},"timestamp":1455984717000}