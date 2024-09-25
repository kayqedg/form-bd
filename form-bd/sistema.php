<?php
session_start();
include_once('config.php');
print_r($_SESSION);
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header("Location: login.php");
}
$logado = $_SESSION['email'];

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    echo $data;
    echo "<br>";
    echo "contem algo, pesquisar";
    echo "<br>";
    $sql = "SELECT * FROM users WHERE id_user LIKE '%$data%' OR nome LIKE '%$data%' OR email LIKE '%$data%' ORDER BY id_user DESC ";
} else {

    $sql = "SELECT * FROM users ORDER BY id_user DESC";
}

$result = $conexao->query($sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KS - System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>

<style>
    .btn-exit {
        font-size: 2rem;
        text-decoration: none;
    }

    .table-bg {
        background: rgba(0, 0, 0, 0.5);
    }

    .confirm-overlay {
        position: absolute;
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

    .confirm-modal {
        z-index: 3;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(255, 255, 255, 0.9);
        font-size: 2rem;
    }

    .hidden {
        display: none;
    }

    .box-search {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2rem;
    }
</style>

<body style="text-align: center;">
    <h1>Acessou o Sistema</h1>
    <?php
    echo "<h2>Bem Vindo <u>$logado</u></h2>";
    echo "<br>";
    ?>

    <div class="box-search">
        <input type="search" class="search form-control w-25" placeholder="pesquisar" id="search">
        <button onclick="searchData()" class="btn btn-success btnsearch">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>
        </button>
    </div>


    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">id_user</th>
                    <th scope="col">nome</th>
                    <th scope="col">email</th>
                    <th scope="col">senha</th>
                    <th scope="col">sexo</th>
                    <th scope="col">Data Nascimento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['id_user'] . "</td>";
                    echo "<td>" . $user_data['nome'] . "</td>";
                    echo "<td>" . $user_data['email'] . "</td>";
                    echo "<td>" . $user_data['senha'] . "</td>";
                    echo "<td>" . $user_data['sexo'] . "</td>";
                    echo "<td>" . $user_data['data_nasc'] . "</td>";
                    echo "<td>" . $user_data['cidade'] . "</td>";
                    echo "<td>" . $user_data['estado'] . "</td>";
                    echo "<td>" . $user_data['endereco'] . "</td>";
                    echo "
                    <td>
                     <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id_user]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                        </svg>
                    </a>
                    <a class='btn btn-sm btn-danger btn-delete' href='#'> 
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                        </svg>
                    </a>   
                    </td>";
                    echo "</tr>";
                    echo "
                        <div class='confirm-overlay hidden'>
        <div class='confirm-modal p-5'>
            <p>Tem certeza que deseja deletar este conteúdo? Esta ação não poderá ser revertida</p>
            <a href='sistema.php' class='btn btn-success btn-voltar'>Voltar</a>
            <a href='delete.php?id=$user_data[id_user]' class='btn btn-danger btn-confirm-delete'>Deletar</a>
        </div>
    </div>
                    ";
                }
                ;
                ?>
            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-danger p-4 color"><a href="sair.php"
            class="btn-exit text-white">Sair</a></button>





</body>
<script>
    const backBtn = document.querySelector(".btn-voltar");
    const confirmBtn = document.querySelector(".btn-confirm-delete")
    const deleteBtns = document.querySelectorAll(".btn-delete")
    const modalDiv = document.querySelector(".confirm-overlay")


    const search = document.getElementById('search');
    for (let i = 0; i < deleteBtns.length; i++) {
        deleteBtns[i].addEventListener("click", function () {
            modalDiv.classList.remove('hidden')

        });
    }

    backBtn.addEventListener('click', function () {
        modalDiv.classList.add('hidden')
    })

    confirmBtn.addEventListener('click', function () {
        console.log('babuíno');

    })

    search.addEventListener('keydown', function (event) {
        if (event.key === "Enter") {
            if (search.value) {
                window.location = `sistema.php?search=${search.value}`;
                console.log(search.value);
            } else {
                window.location = `sistema.php`
            }
        }
    })

    function searchData() {
        if (search.value) {
            window.location = `sistema.php?search=${search.value}`;
            console.log(search.value);
        } else {
            window.location = `sistema.php`
        }
        console.log(search.value);


    }


</script>


</html>