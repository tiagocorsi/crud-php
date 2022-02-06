<?php

    $mensagem = '';
    if (isset($_GET['status'])){
        switch ($_GET['status']){
            case 'success': 
                $mensagem = '<div class="alert-success mt-3">Ação executada com sucesso!</div>';
                break;
            
            case 'error': 
                    $mensagem = '<div class="alert-danger mt-3">Ação não executada!</div>';
                    break;

        }
    }

    $resultados = '';
    foreach($vagas as $vaga){
        $resultados .= '<tr>
                            <td>'.$vaga->id.'</td>
                            <td>'.$vaga->titulo.'</td>
                            <td>'.$vaga->descricao.'</td>
                            <td>'.($vaga->ativo == 's' ? 'Ativo' : 'Inativo').'</td>
                            <td>'.date('d/m/Y á\s H:i:s',strtotime($vaga->data)).'</td>
                            <td>
                                <a href="editar.php?id='.$vaga->id.'">
                                    <button type="button" class="btn btn-primary">Editar</button>
                                </a>
                                <a href="excluir.php?id='.$vaga->id.'">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                            </td>
                        </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr>
                                                            <td colspan="6" class="text-center">
                                                                Nenhuma vaga encontrada
                                                            </td>
                                                        </tr>';
?>

<main>
    <?=$mensagem?>

    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success mt-3" type="button">Nova Vaga</button>
        </a>
    </section>

    <section>
        <form method="get">
            <div class="row my-4">
                <div class="col">
                    <label>Buscar por título</label>
                    <input type="text" name="busca" class="form-control" value="<?=$busca?>">
                </div>

                <div class="col">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="">Ativa/Inativa</option>
                        <option value="s" <?=$filtroStatus == 's' ? 'selected' : ''?>>Ativa</option>
                        <option value="n" <?=$filtroStatus == 'n' ? 'selected' : ''?>>Inativa</option>
                </select>
            </div>

                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Título</td>
                    <td>Descrição</td>
                    <td>Status</td>
                    <td>Data</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>
    </section>
</main>