<?$this->load->view('./includes/header_user')?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-6">
        <div style="width:900px; height:900px; margin-top:100px;">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<?
$dates = array_keys($stress_data);
$values = array_values($stress_data);

$dates_array = '[';
foreach($dates as $row)
{   
    $formattedDate = date('y-M-d', strtotime($row));
    $dates_array = $dates_array."'$formattedDate'".',';
}
$dates_array = $dates_array.']';

$values_array = '[';
foreach($values as $row)
{   
    $val = 0;
    if($row != "")
        $val = $row;
    $values_array = $values_array.$val.',';
}
$values_array = $values_array.']';

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: <?=$dates_array?>,
      datasets: [{
        label: 'Stree Level',
        data: <?=$values_array?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<?$this->load->view('./includes/footer_user')?>