<?php
$field = get_field('lite_pack');
$lite_button_text = $field['button_text'];
$lite_button_url = $field['button_url'];
$field = get_field('team_pack');
$team_button_text = $field['button_text'];
$team_button_url = $field['button_url'];
$field = get_field('enterprise_pack');
$enterprise_button_text = $field['button_text'];
$enterprise_button_url = $field['button_url'];


$field_data;
$data = get_field('pricing_table_settings');
if (gettype($data) === 'string') {
    $field_data = json_decode($data, true);
} else {
    $field_data = $data;
}
?>
<div class="tixioPTwrapperPublic">
    <!-- desktop -->
    <div class="container flex-container desktop">
        <div class="flex-row g-4 head">
            <div class="flex-col w-1-4 ">
                <!-- NAMES -->
                <?php foreach ($field_data as $item) { ?>
                    <div class="flex-item  <?php echo $item['id'] ?> <?php ($item['header']) ? printf('f-header') : printf(''); ?>">
                        <?php echo $item['name'] ?>
                    </div>
                <?php  } ?>
            </div>
            <div class="flex-col w-1-4">
                <a class="btn top " href="<?php echo $lite_button_url ?>"><?php echo $lite_button_text ?></a>
                <!-- LITE -->
                <?php foreach ($field_data as $item) { ?>
                    <div class="flex-item <?php echo $item['id'] ?>">
                        <?php
                        if ($item['lite'] === 'checked') {
                            printf('<i class="fas fa-check-circle"></i>');
                        } elseif ($item['lite'] === 'unchecked') {
                            printf('<i class="fas fa-times-circle"></i>');
                        } else {
                            printf($item['lite']);
                        }
                        ?>
                    </div>
                <?php  } ?>
                <a class="btn bottom " href="<?php echo $lite_button_url ?>"><?php echo $lite_button_text ?></a>
            </div>
            <div class="flex-col w-1-4">
                <a class="btn top filled" href="<?php echo $team_button_url ?>"><?php echo $team_button_text ?></a>
                <!-- TEAM -->
                <?php foreach ($field_data as $item) { ?>
                    <div class="flex-item  <?php echo $item['id'] ?>">
                        <?php
                        if ($item['team'] === 'checked') {
                            printf('<i class="fas fa-check-circle"></i>');
                        } elseif ($item['team'] === 'unchecked') {
                            printf('<i class="fas fa-times-circle"></i>');
                        } else {
                            printf($item['team']);
                        }
                        ?>
                    </div>
                <?php  } ?>
                <a class="btn bottom filled" href="<?php echo $team_button_url ?>"><?php echo $team_button_text ?></a>
            </div>
            <div class="flex-col w-1-4">
                <a class="btn top" href="<?php echo $enterprise_button_url ?>"><?php echo $enterprise_button_text ?></a>
                <!-- ENTERPRISE -->
                <?php foreach ($field_data as $item) { ?>
                    <div class="flex-item  <?php echo $item['id'] ?>">
                        <?php
                        if ($item['enterprise'] === 'checked') {
                            printf('<i class="fas fa-check-circle"></i>');
                        } elseif ($item['enterprise'] === 'unchecked') {
                            printf('<i class="fas fa-times-circle"></i>');
                        } else {
                            printf($item['enterprise']);
                        }
                        ?>
                    </div>
                <?php  } ?>
                <a class="btn bottom" href="<?php echo $enterprise_button_url ?>"><?php echo $enterprise_button_text ?></a>
            </div>
        </div>



    </div>

    <!-- mobile -->
    <div class="container flex-container mobile">
        <div class="flex-row g-4 head">
            <div class="flex-col w-half">

                <!-- NAMES -->
                <?php foreach ($field_data as $item) { ?>
                    <div class="flex-item  <?php echo $item['id'] ?> <?php ($item['header']) ? printf('f-header') : printf(''); ?>">
                        <?php echo $item['name'] ?>
                    </div>
                <?php  } ?>
            </div>
            <div class="flex-row w-half packs">
                <div class="flex-col w-1-3">

                    <p>Lite</p>
                    <!-- LITE -->
                    <?php foreach ($field_data as $item) { ?>
                        <div class="flex-item <?php echo $item['id'] ?>">
                            <?php
                            if ($item['lite'] === 'checked') {
                                printf('<i class="fas fa-check-circle"></i>');
                            } elseif ($item['lite'] === 'unchecked') {
                                printf('<i class="fas fa-times-circle"></i>');
                            } else {
                                printf($item['lite']);
                            }
                            ?>
                        </div>
                    <?php  } ?>
                </div>
                <div class="flex-col w-1-3">
                    <p>Team</p>
                    <!-- TEAM -->
                    <?php foreach ($field_data as $item) { ?>
                        <div class="flex-item  <?php echo $item['id'] ?>">
                            <?php
                            if ($item['team'] === 'checked') {
                                printf('<i class="fas fa-check-circle"></i>');
                            } elseif ($item['team'] === 'unchecked') {
                                printf('<i class="fas fa-times-circle"></i>');
                            } else {
                                printf($item['team']);
                            }
                            ?>
                        </div>
                    <?php  } ?>
                </div>
                <div class="flex-col w-1-3">
                    <p>Enterprise</p>
                    <!-- ENTERPRISE -->
                    <?php foreach ($field_data as $item) { ?>
                        <div class="flex-item  <?php echo $item['id'] ?>">
                            <?php
                            if ($item['enterprise'] === 'checked') {
                                printf('<i class="fas fa-check-circle"></i>');
                            } elseif ($item['enterprise'] === 'unchecked') {
                                printf('<i class="fas fa-times-circle"></i>');
                            } else {
                                printf($item['enterprise']);
                            }
                            ?>
                        </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
</div>