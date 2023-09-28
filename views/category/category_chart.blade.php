<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>category Chart</title>
</head>
<body><br>
    <h3 class="text-xl font-bold text-black">กราฟสรุปมูลค่ารวมของสินค้าแต่ละหมวดหมู่</h3> <br>
    <canvas id="myChart" height="100px"></canvas>    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">
  
    var labels =  {{ Js::from($labels) }};
    var datas =  {{ Js::from($data) }};
  
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: [
      'rgba(255, 20, 147, 0.9)',
      'rgba(147, 0, 211, 0.9)',
      'rgba(255, 205, 86, 0.9)',
      'rgba(75, 192, 192, 0.9)',
      'rgba(54, 162, 235, 0.9)',
      'rgba(153, 102, 255, 0.9)',
      'rgba(201, 203, 207, 0.9)'
    ],
    borderColor: [
      'rgb(255, 20, 147)',
      'rgb(147, 0, 211)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
            data: datas,
        }]
    };
    
  
    const config = {
        type: 'bar',
        data: data,
        options: {}
    };
  
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
  
</script>
</html>
</x-app-layout>