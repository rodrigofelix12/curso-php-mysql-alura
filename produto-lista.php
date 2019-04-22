<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php"); ?>

<?php if(array_key_exists("removido", $_GET) && $_GET['removido']=='true'){?>
    <p class="alert-success">Produto removido com sucesso!</p>
<?php } ?>

<?php
$produtos = listaProdutos($conexao);
?>
<table class="table table-striped">

<?php
foreach($produtos as $produto) :
?>
<tr>
    <td><?=$produto['nome'] ?></td>
    <td><?=$produto['preco'] ?></td>
    <td><?=substr($produto['descricao'], 0, 40)?></td>
    <td><?=$produto['categoria_nome']?></td>
    <td>
        <form action="remove-produto.php" method="post">
        <input type="hidden" name="id" value="<?=$produto["id"]?>">
        <button class="btn btn-danger">Remover</button>
        </form>
    </td>
</tr>

<?php
endforeach
?>
</table>

<?php include("rodape.php"); ?>