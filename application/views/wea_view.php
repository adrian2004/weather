<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Weather</title>

</head>

<body>

  <h1>Clima</h1>

  <input type="text" id="txtLat" class="form-control" placeholder="Lat" aria-label="Recipient's username" aria-describedby="button-addon2">
  <input type="text" id="txtLon" class="form-control" placeholder="Lon" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="button" id="buscarWea">Pesquisar</button>

    <hr>

  <div class="">
    <label class="teste"></label>
    <p id="retornoTemp"></p>

    <hr>

    <label class="teste"></label>
    <p id="retornoSens"></p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/jquery/dist/jquery.js'); ?>"></script>
  <script src="<?= base_url('assets/jquery/dist/jquery.min.js'); ?>"></script>

</body>

</html>

<script type="text/javascript">

  var baseUrl = "<?= base_url('wea_controller'); ?>";

  $(document).ready(function() {

    $('#buscarWea').click(function() {

    const lon = $('#txtLon').val();
    const lat = $('#txtLat').val();

    $.post(baseUrl + '/get_weather', {
        lat,
        lon
    }, function(data) {

        if (data.status == 400) {

        alert(`Erro ao buscar dados: ${data.response}`);
        return;
        }

        $('#retornoTemp').html("Temperatura:".bold() + " " + (data.response.main.temp-273.15).toFixed(2));
        $('#retornoSens').html("Sensação térmica:".bold() + " " + (data.response.main.feels_like-273.15).toFixed(2));

    }, 'json');
    });
});

</script>