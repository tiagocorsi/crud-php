<main>
    <h2 class="mt-3">Excluir Vaga</h2>

    <form method="post">
        <div class="form-group">
            <p>Você deseja realmente excluir a vaga <strong><?=$obVaga->titulo?></strong>?</p>
        </div>

        <div class="form-group">
            <a href="index.php">
                <button class="btn btn-success mt-3" type="button">Cancelar</button>
            </a>

            <button type="submit" name="excluir" class="btn btn-danger mt-3">Excluir</button>
        </div>
    </form>

</main>