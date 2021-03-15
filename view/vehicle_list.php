<?php include('header.php'); ?>

<!-- THIS DISPLAYS THE 3 DROP MENUS AND RADIO OPTIONS FOR PRICE/YEAR - ONE SUBMIT BUTTON FOR ALL-->
<form action="." method="get">
    <input type="hidden" name="action" value="list_all_vehicles"> <!-- MUDAR ESTE VALOR!!!!!!!! -->
    <select  name="make_id" required>
            <option value="make">View All Makes</option>
            <?php foreach ($all_makes as $make){ ?> 
                <?php if ($make_id == $make['make_id']) { ?>
                            <option value="<?=$make['make_id'] ?>" selected>
                <?php }else { ?>
                            <option value="<?=$make['make_id'] ?>">
                <?php } ?> <?= $make['make'] ?> </option> <?php
            } ?>
    </select>

    <select  name="type_id" required>
            <option value="type">View All Types</option>
            <?php foreach ($all_types as $type){ ?> 
                <?php if ($type_id == $type['type_id']) { ?>
                            <option value="<?=$type['type_id'] ?>" selected>
                <?php }else { ?>
                            <option value="<?=$type['type_id'] ?>">
                <?php } ?> <?= $type['type'] ?> </option> <?php

            } ?>
    </select>

    <select  name="class_id" required>
            <option value="class">View All Classes</option>
            <?php foreach ($all_classes as $class){ ?> 
                <?php if ($class_id == $class['class_id']) { ?>
                            <option value="<?=$class['class_id'] ?>" selected>
                <?php }else { ?>
                            <option value="<?=$class['class_id'] ?>">
                <?php } ?> <?= $class['class'] ?> </option> <?php

            } ?>
    </select>
    <input type="submit">
</form>

<!-- THIS DISPLAYS THE LIST  -->
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