<?php
require __DIR__ . '/db/ORM/instance.php';

$retrievedData = R::getAssocRow('SELECT * FROM cardetails LIMIT 5');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
</head>

<body>
    <main class="container mt-5">
        <section class="w-50 mt-5 mx-auto">
            <div class="">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="search" class="form-control" id="search" placeholder="Search" oninput="(() => {
                
                            $('#table').children('tr').map((ind, el) => { 
                                if(!$(el).children('td')[$('#brand').is(':checked')?1:2].innerText.match($('#search').val())) {
                                    $(el).addClass('d-none')
                                } else $(el).removeClass('d-none')
                            })
                        
                    })()">
                    <div class="d-flex justify-content-center align-items-center ps-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="searchOptions" id="brand" value="brand" checked>
                            <label class="form-check-label" for="inlineRadio2">Brand</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="searchOptions" id="name" value="name">
                            <label class="form-check-label" for="inlineRadio1">Name</label>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-5">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Year</th>
                    </tr>
                </thead>
                <tbody id="table">
                    <?php foreach ($retrievedData as $key => $row) : ?>
                        <tr>
                            <?php foreach ($row as $name => $data) : ?>

                                <td><?php echo $data; ?></td>

                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>