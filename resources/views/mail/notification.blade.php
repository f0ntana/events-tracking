<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 20px; min-width: 96%; width: 96% !important; height: 90% !important; background-color:darkslateblue; font-family: 'Roboto', sans-serif; }
        table { width: 80% }
        .table-center { width: 100%; display: flex; justify-content: center; align-items: center; background-color: rgb(147, 134, 233); border-radius: 5px;}
        table tr td { color: darkslateblue; font-size: 16px; padding: 5px;}
        .desc { width: 15%  }
        h2 { text-align: center; color: white }
        .title { font-size: 18px; font-weight: 500; text-align: center}
 	</style>
	<title>Notificação de Eventos</title>
</head>
<body>
    <h2>Notificação de Eventos - Hoje: {{ today()->format('d/m/Y')  }}</h2>
    @foreach($events as $event)
    <div class="table-center">
        <table>
            <tr>
                <td colspan="2" class="title">{{ $event->name }}</td>
            </tr>
            <tr>
                <td class="desc">Recorrência</td>
                <td>{{ $event->recurrencyName }}</td>
            </tr>
            <tr>
                <td class="desc">Data</td>
                <td>{{ $event->date->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td class="desc">Próximo Evento</td>
                <td>{{ $event->nextDate->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td class="desc">Descrição</td>
                <td>{{ $event->description }}</td>
            </tr>
        </table>
    </div>
    <br>
    @endforeach
</body>
</html>