<?php
require_once('../Connections/Conexao.php');
$ObjDB = new DB();
$link = $ObjDB->connecta_mysql();
$sql = "select id_estoque, descricao, quant, data_cadastro, user_cad, status, local_armazenado from Estoque";
$resultado = mysqli_query($link, $sql);
if ($resultado) {
    echo '<table class="table table-hover table-border">
                            <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Qtde</th>
                            <th scope="col">Dt Cadastro</th>
                            <th scope="col">Inserido</th>
                            <th scope="col">Status</th>
                            <th scope="col">Armazenado</th>
                            <th scope="col"></th>
                            </tr>
                            </thead>';
    while ($registro = mysqli_fetch_assoc($resultado)) {

        $id = $registro['id_estoque'];
        $txt_desc = $registro['descricao'];
        $txt_quant = $registro['quant'];
        $txt_data = $registro['data_cadastro'];
        $txt_user = $registro['user_cad'];
        $txt_status = $registro['status'];
        $txt_localArm = $registro['local_armazenado'];
        echo '
                                <tr>
                                  <td class"colorir">' . $id . '</td>
                                  <td>' . $txt_desc . '</td> 
                                  <td>' . $txt_quant . '</td>
                                  <td>' . $txt_data . '</td>
                                  <td>' . $txt_user . '</td>
                                  <td>' . $txt_status . '</td>
                                  <td>' . $txt_localArm . '</td>
                                  <td><a href="../Views/editar.php?id=' . $id . '"><img src="../imagens/editar.png"width="20"></a></td>
                                  <td><a href="../Views/retira-estoque.php?id=' . $id . '"><img src="../imagens/retirada.png"width="20" title="Retiradas"></a></td>
                                  <td><a href="#id=' . $id . '"><img src="../imagens/excluir.png" width="20"></a></td>
                                </tr>';
    }
} else {
    echo '
                                <div class="containner">
                                    <div class="col-md-8">
                                        <div class="row">
                                           <img src="../ErrorImg/notfound.jpg" alt="" left="50">
                                        </div>
                                    </div>
                                </div>';
}
?>