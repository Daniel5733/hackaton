<div class="row">
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3 id="movimento_value">150</h3>
<p>Movimentos</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3 id="cred_value">50<sup style="font-size: 20px"><i class="fa fa-arrow-up"></i></sup></h3>
<p>Créditos</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3 id="debito_value">10<sup style="font-size: 20px"><i class="fa fa-arrow-down"></i></sup></h3>
<p>Débitos</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3 id="cliente_value">44</h3>
<p>Clientes</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
</div>
</div>

</div>
<script>
$(() => {
    $.ajax({
        method: "GET",
        headers: {
            "x-api-key":"Hackathonfaa09dsaadsl4j2idasoiasdoij3289dsahojkasdhiuoasd89kjhhaszxksakjsjk"
        },
        url: "http://api.hackathon.test/dashboard/cards",
        data: {}
    })
    .done(function(result) {
        $('#movimento_value').text(result.total_movimentos);
        $('#debito_value').text(result.total_debitos + ' ').append('<sup style="font-size: 20px"><i class="fa fa-arrow-down"></i></sup>');
        $('#cred_value').text(result.total_creditos + ' ').append('<sup style="font-size: 20px"><i class="fa fa-arrow-up"></i></sup>');
        $('#cliente_value').text(result.total_clientes);
    });
  
});
</script>