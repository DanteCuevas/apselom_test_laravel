<?php
//dd($clients, $clients->toArray());

    foreach ($clients as $key => $client) {
        echo $client->first_name . ', ' . $client->last_name . ', ' . $client->status . '<br>';
    }
    echo "CON PHP PURO";
    echo '<table border="1">';
        echo '<tr>';
            echo '<td>Nombre</td>';
            echo '<td>Apellido</td> ';
            echo '<td>Status</td> </';
        echo '</tr>';
    foreach ($clients as $key => $client) {
        //echo '<table><tr><td></td></tr></table>';
        //echo '<tr> <td>'.$client->first_name.'</td> <td>'.$client->last_name.'</td> <td>'.$client->status.'</td> </tr>';
        echo '<tr>';
            echo '<td>'.$client->first_name.'</td>';
            echo '<td>'.$client->last_name.'</td> ';
            echo '<td>'.$client->status.'</td>';
        echo '</tr>';
    }
    echo '</table>';
?>
    HTML con php incrustado (better for wordpress)
    <table border="1">
        <tr>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Status</td>
        </tr>
        <?php foreach ($clients as $key => $client) { ?>
            <tr>
                <td><?php echo $client->first_name; ?></td>
                <td><?php echo $client->last_name; ?></td>
                <td><?php echo $client->status; ?></td>
            </tr>
        <?php } ?>
    </table>

<style>
    .color-red {
        background-color: red;
    }
</style>
    BLADE (THE BETTER)
    <table border="1">
        <tr>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Status</td>
        </tr>
        @foreach ($clients as $client)
            @php
                $color = ($client->status) ? 'gris' : 'red';
                //$classColor = ($client->status) ? '' : 'color-red';
                $classColor = ($client->status) ?: 'color-red';
            @endphp
            <!--tr style='background-color: {{$color}};' -->
            <tr class="{{ $classColor }}">
                <td>{{ $client->first_name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client->status }}</td>
            </tr>
        @endforeach
    </table>

vista