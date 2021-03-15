<?php include('header.php'); ?>

<section id="VehiclesListTable">
    <table style="width:100%">
        <tr>
            <th>Year   </th>
            <th>Make   </th>
            <th>Model  </th>
            <th>Type   </th>
            <th>Class  </th>
            <th>Price  </th>
        </tr>
        <?php if ($all_vehicles){
            foreach ($all_vehicles as $vehicle){ ?>
                <tr>
                    <td> <?=$vehicle['year']; ?> </td>
                    <td> <?=$vehicle['make'];  ?> </td>
                    <td> <?=$vehicle['model']; ?> </td>
                    <td> <?=$vehicle['type'];  ?> </td>
                    <td> <?=$vehicle['class']; ?> </td>
                    <td> <?=$vehicle['price']; ?> </td> 
                </tr> <?php
            }
        } ?>
    </table>
</section>

<?php include('footer.php'); ?>
