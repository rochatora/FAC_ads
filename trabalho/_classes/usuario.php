<?php

class usuario
{
    private $pdo;
    public $msgErro = ""; //ok
    public function conectar($nome,$host,$bdusuario,$senha)
    {
        global $pdo;
        try
        {
        $pdo    =   new PDO("mysql: dbname=$nome;host=$host",$bdusuario,$senha);
        }catch (PDOException $u){
            $msgErro    =   $u->getMessage();
        }
    }
    public function cadastrar($nome,$usuario,$email,$telefone,$senha,$rg,$cpf,$cep,$endereco,$complemento,$bairro,$cidade,$estado)
    {
        global $pdo;
        //Verificar se ja existe o email cadastrado
        $sql    =$pdo->prepare("SELECT id_usuario FROM usuario WHERE nm_usuario = :u");

        $sql->bindValue(":u",$usuario);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //Ja esta cadastrada
        }
        else
        {
            //Caso nao, Cadastrar
            $sql    =   $pdo->prepare("INSERT INTO usuario (nm_nome,nm_usuario,ds_email,nr_telefone,ds_senha,nr_rg,nr_cpf,nr_cep,ds_endereco,ds_complemento,ds_bairro,ds_cidade,ds_estado) VALUES (:n,:u,:e,:t,:s,:r,:c,:p,:l,:m,:b,:i,:o)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":u",$usuario);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":s",md5($senha));
            $sql->bindValue(":r",$rg);
            $sql->bindValue(":c",$cpf);
            $sql->bindValue(":p",$cep);
            $sql->bindValue(":l",$endereco);
            $sql->bindValue(":m",$complemento);
            $sql->bindValue(":b",$bairro);
            $sql->bindValue(":i",$cidade);
            $sql->bindValue(":o",$estado);
            $sql->execute();
            return true; //Tudo ok cadastrado com sucesso
        }


    }
    public function logar($usuario,$senha)
    {
        global $pdo;
        //Verificar se o usuario e senha estao cadsatrados, se sim
        $sql    =   $pdo->prepare("SELECT id_usuario FROM usuario WHERE nm_usuario = :u AND ds_senha = :s");
        $sql->bindValue(":u",$usuario);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            //Entrar no sistema (sessao)
            $dado   =   $sql->fetch();
            session_start()
            %$_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //Logado com sucesso
        }
        else
        {
            return false; //Não conseguiu logar
        }
    }
}

?>